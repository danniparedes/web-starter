<?php
declare(strict_types=1);

/* ==========================================================================
   FORM HANDLER — one function runs every form on the site.
   handle_form('contact') reads config forms.contact and then:
     1. accepts only POST from this site
     2. checks the security token (CSRF) and the hidden spam-trap field
     3. limits how often one visitor can send
     4. cleans and checks the fields (required, email, web address)
     5. (contact only) checks the optional file
     6. saves a copy and/or the subscriber, emails the owner
     7. answers the visitor
   ========================================================================== */

/** Fields the form sends for security, never shown in the email. */
const FORM_SECURITY_FIELDS = ['website', 'csrf_token', 'source_page'];

function clean_text(string $value): string
{
    $value = mb_scrub($value);
    $value = str_replace("\r\n", "\n", $value);
    // remove control characters except new line and tab
    $value = (string) preg_replace('/[^\P{C}\n\t]/u', '', $value);
    return trim($value);
}

/** Collect posted fields: name => text or list of text. */
function collect_fields(): array
{
    $fields = [];
    $count  = 0;
    foreach ($_POST as $key => $value) {
        $name = rtrim((string) $key, '[]');
        if (in_array($name, FORM_SECURITY_FIELDS, true) || !preg_match('/^[a-z0-9_-]{1,60}$/i', $name)) {
            continue;
        }
        if (++$count > 60) {
            break;
        }
        if (is_array($value)) {
            $list = [];
            foreach (array_slice($value, 0, 20) as $item) {
                if (is_string($item) && trim($item) !== '') {
                    $list[] = mb_substr(clean_text($item), 0, 200);
                }
            }
            $fields[$name] = $list;
        } elseif (is_string($value)) {
            $fields[$name] = mb_substr(clean_text($value), 0, 5000);
        }
    }
    return $fields;
}

function field_is_empty($value): bool
{
    return is_array($value) ? count($value) === 0 : $value === '';
}

/** @return array<string,string> field => message */
function validate_fields(array $fields, array $required): array
{
    $errors = [];
    foreach ($required as $name) {
        if (!array_key_exists($name, $fields) || field_is_empty($fields[$name])) {
            $errors[$name] = 'This field is required.';
        }
    }
    foreach ($fields as $name => $value) {
        if (isset($errors[$name]) || is_array($value) || $value === '') {
            continue;
        }
        if (($name === 'email' || substr($name, -6) === '_email') && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $errors[$name] = 'Please enter a valid email address.';
        } elseif (substr($name, -4) === '_url' && !preg_match('#^https?://[^\s]+$#i', $value)) {
            $errors[$name] = 'Please enter a web address that starts with http:// or https://';
        } elseif ($name === 'accept_terms' && $value !== 'yes') {
            $errors[$name] = 'Please accept to continue.';
        }
    }
    return $errors;
}

/** Check the optional "attachment" file. Returns [info|null, error|null]. */
function check_upload(): array
{
    if (empty($_FILES['attachment']) || ($_FILES['attachment']['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return [null, null];
    }
    $f = $_FILES['attachment'];
    if ($f['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($f['tmp_name'])) {
        return [null, 'The file could not be uploaded. It may be too large.'];
    }
    if ($f['size'] > (int) config('uploads.max_bytes')) {
        return [null, 'The file is too large.'];
    }
    $ext     = strtolower(pathinfo((string) $f['name'], PATHINFO_EXTENSION));
    $allowed = (array) config('uploads.extensions');
    $mimes   = ['pdf' => ['application/pdf'], 'jpg' => ['image/jpeg'], 'jpeg' => ['image/jpeg'], 'png' => ['image/png']];
    $real    = (new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']);
    if (!in_array($ext, $allowed, true) || !isset($mimes[$ext]) || !in_array($real, $mimes[$ext], true)) {
        return [null, 'This file type is not accepted.'];
    }
    return [['tmp' => $f['tmp_name'], 'ext' => $ext, 'original' => mail_clean((string) $f['name']), 'size' => (int) $f['size']], null];
}

function origin_ok(): bool
{
    if (!config('security.check_origin', true)) {
        return true;
    }
    $origin = (string) ($_SERVER['HTTP_ORIGIN'] ?? '');
    if ($origin === '') {
        return true;                       // some browsers omit it on same-site posts
    }
    return strcasecmp((string) parse_url($origin, PHP_URL_HOST), (string) parse_url('//' . ($_SERVER['HTTP_HOST'] ?? ''), PHP_URL_HOST)) === 0;
}

function handle_form(string $name): void
{
    $spec = config('forms', [])[$name] ?? null;
    if (!$spec) {
        form_respond(false, 'This form is not set up.', [], 404);
    }
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
        header('Allow: POST');
        form_respond(false, 'Please use the form on the website.', [], 405);
    }
    if (!origin_ok()) {
        form_respond(false, 'This request was not accepted.', [], 403);
    }
    if (!csrf_check((string) ($_POST['csrf_token'] ?? ''))) {
        form_respond(false, 'Your session expired. Please reload the page and try again.', [], 403);
    }

    // Spam trap: a person never fills it. Pretend it worked, do nothing.
    if (trim((string) ($_POST['website'] ?? '')) !== '') {
        form_respond(true, (string) $spec['success']);
    }

    if (!rate_limit_ok($name)) {
        form_respond(false, 'Too many messages in a short time. Please try again later.', [], 429);
    }

    $fields = collect_fields();
    $errors = validate_fields($fields, (array) ($spec['required'] ?? []));

    $upload = null;
    if (!empty($spec['uploads'])) {
        [$upload, $uploadError] = check_upload();
        if ($uploadError) {
            $errors['attachment'] = $uploadError;
        }
    }

    if ($errors) {
        $names = array_map('field_label', array_keys($errors));
        form_respond(false, 'Please check: ' . implode(', ', $names) . '.', $errors, 422);
    }

    $stamp  = date('c');
    $source = mb_substr(clean_text((string) ($_POST['source_page'] ?? '')), 0, 100);

    // ---- save the upload ----
    $savedFile = null;
    if ($upload) {
        $savedFile = 'uploads/' . date('Ymd-His') . '-' . bin2hex(random_bytes(6)) . '.' . $upload['ext'];
        if (!move_uploaded_file($upload['tmp'], storage_path($savedFile))) {
            form_respond(false, 'The file could not be saved. Please try again.', [], 500);
        }
    }

    // ---- subscribe type: keep a unique list ----
    $isNew = true;
    if (($spec['type'] ?? '') === 'subscribe') {
        $email = strtolower((string) $fields['email']);
        $csv   = storage_path('newsletter.csv');
        $known = [];
        if (is_file($csv)) {
            foreach (file($csv, FILE_IGNORE_NEW_LINES) ?: [] as $line) {
                $known[strtolower((string) (str_getcsv($line)[0] ?? ''))] = true;
            }
        }
        if (isset($known[$email])) {
            $isNew = false;            // same answer to the visitor: do not reveal who is subscribed
        } else {
            $fh = fopen($csv, 'a');
            flock($fh, LOCK_EX);
            fputcsv($fh, [$email, $stamp, $source]);
            flock($fh, LOCK_UN);
            fclose($fh);
        }
    }

    // ---- keep a copy ----
    if (!empty($spec['store'])) {
        $row = ['time' => $stamp, 'form' => $name, 'source' => $source, 'visitor' => substr(visitor_hash(), 0, 16), 'fields' => $fields];
        if ($savedFile) {
            $row['file'] = $savedFile;
        }
        if (!append_jsonl('submissions/' . $name . '-' . date('Y-m') . '.jsonl', $row)) {
            error_log("handle_form($name): could not save the submission");
        }
    }

    // ---- email the owner ----
    $mustMail = ($spec['type'] ?? '') !== 'subscribe' || (!empty($spec['notify']) && $isNew);
    if ($mustMail) {
        $body = '';
        foreach ($fields as $key => $value) {
            $body .= field_label($key) . ': ' . (is_array($value) ? implode(', ', $value) : $value) . "\n\n";
        }
        $body .= "---\nSent from: " . ($source !== '' ? $source : 'unknown page') . "\nTime: $stamp\n";
        if ($upload) {
            $body .= 'File: ' . $upload['original'] . ' (' . $upload['size'] . " bytes), saved on the server as $savedFile\n";
        }
        $sent = send_mail([
            'to'         => (string) ($spec['to'] ?? config('mail.to')),
            'subject'    => (string) $spec['subject'],
            'body'       => $body,
            'reply_to'   => (string) ($fields['email'] ?? ''),
            'reply_name' => trim(($fields['first_name'] ?? '') . ' ' . ($fields['last_name'] ?? '') . ($fields['name'] ?? '') . ($fields['parent_name'] ?? '')),
        ]);
        // The visitor's message is already saved when 'store' is on, so only fail if nothing kept it.
        if (!$sent && empty($spec['store']) && ($spec['type'] ?? '') !== 'subscribe') {
            form_respond(false, 'Sorry, we could not send your message. Please try again or contact us directly.', [], 500);
        }
        if (!$sent) {
            error_log("handle_form($name): email not sent");
        }
    }

    form_respond(true, (string) $spec['success']);
}
