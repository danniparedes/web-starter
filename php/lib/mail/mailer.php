<?php
declare(strict_types=1);

/* Sending email. One function: send_mail(). The driver is set in config (mail.driver). */

/** Remove line breaks so a visitor cannot inject extra email headers. */
function mail_clean(string $value): string
{
    return trim(preg_replace('/[\r\n]+/', ' ', $value));
}

/**
 * @param array{to:string,subject:string,body:string,reply_to?:string,reply_name?:string} $msg
 */
function send_mail(array $msg): bool
{
    $driver   = (string) config('mail.driver', 'log');
    $from     = mail_clean((string) config('mail.from'));
    $fromName = mail_clean((string) config('mail.from_name'));
    $to       = mail_clean($msg['to']);
    $subject  = mail_clean($msg['subject']);
    $replyTo  = isset($msg['reply_to']) && filter_var($msg['reply_to'], FILTER_VALIDATE_EMAIL) ? $msg['reply_to'] : '';
    $replyNm  = mail_clean($msg['reply_name'] ?? '');

    if (!filter_var($to, FILTER_VALIDATE_EMAIL) || !filter_var($from, FILTER_VALIDATE_EMAIL)) {
        error_log('send_mail: invalid "to" or "from" address in config/mail');
        return false;
    }

    if ($driver === 'log') {
        $entry = "==== " . date('c') . " ====\nTo: $to\nFrom: $fromName <$from>\n"
               . ($replyTo ? "Reply-To: $replyTo\n" : '') . "Subject: $subject\n\n" . $msg['body'] . "\n\n";
        return file_put_contents(storage_path('logs/mail.log'), $entry, FILE_APPEND | LOCK_EX) !== false;
    }

    if ($driver === 'phpmailer') {
        $dir = SITE_ROOT . '/php/vendor/phpmailer/src/';
        if (!is_file($dir . 'PHPMailer.php')) {
            error_log('send_mail: PHPMailer not found in php/vendor/phpmailer/src/');
            return false;
        }
        require_once $dir . 'Exception.php';
        require_once $dir . 'PHPMailer.php';
        require_once $dir . 'SMTP.php';
        $smtp = (array) config('mail.smtp', []);
        try {
            $m = new PHPMailer\PHPMailer\PHPMailer(true);
            $m->CharSet = 'UTF-8';
            $m->isSMTP();
            $m->Host       = (string) ($smtp['host'] ?? '');
            $m->Port       = (int) ($smtp['port'] ?? 587);
            $m->SMTPSecure = (string) ($smtp['secure'] ?? 'tls');
            $m->SMTPAuth   = ($smtp['user'] ?? '') !== '';
            $m->Username   = (string) ($smtp['user'] ?? '');
            $m->Password   = (string) ($smtp['pass'] ?? '');
            $m->setFrom($from, $fromName);
            $m->addAddress($to);
            if ($replyTo) {
                $m->addReplyTo($replyTo, $replyNm);
            }
            $m->Subject = $subject;
            $m->Body    = $msg['body'];
            $m->isHTML(false);
            return $m->send();
        } catch (Throwable $err) {
            error_log('send_mail (phpmailer): ' . $err->getMessage());
            return false;
        }
    }

    // driver 'mail': PHP's built-in mail()
    $headers = [
        'From: ' . ($fromName !== '' ? '=?UTF-8?B?' . base64_encode($fromName) . '?= ' : '') . "<$from>",
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'Content-Transfer-Encoding: 8bit',
    ];
    if ($replyTo) {
        $headers[] = 'Reply-To: ' . $replyTo;
    }
    return mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $msg['body'], implode("\r\n", $headers));
}
