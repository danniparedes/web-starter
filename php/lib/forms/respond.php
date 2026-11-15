<?php
declare(strict_types=1);

/* Answering the visitor after a form is sent.
   - JavaScript (js/main.js) asks for JSON and shows the message inside the form.
   - Without JavaScript the visitor gets a small page in the site's own design. */

function wants_json(): bool
{
    return stripos((string) ($_SERVER['HTTP_ACCEPT'] ?? ''), 'application/json') !== false
        || strtolower((string) ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '')) === 'xmlhttprequest';
}

/** Where "Go back" leads: the page the form was on, only if it is on this same site. */
function safe_back_url(): string
{
    $ref  = (string) ($_SERVER['HTTP_REFERER'] ?? '');
    $host = parse_url($ref, PHP_URL_HOST);
    if ($ref !== '' && $host && strcasecmp($host, (string) parse_url('//' . ($_SERVER['HTTP_HOST'] ?? ''), PHP_URL_HOST)) === 0) {
        return $ref;
    }
    return url('index');
}

function form_respond(bool $ok, string $message, array $errors = [], int $status = 200): void
{
    http_response_code($status);
    header('Cache-Control: no-store');

    if (wants_json()) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => $ok, 'message' => $message, 'errors' => (object) $errors], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $page = [
        'id'          => 'form-result',
        'title'       => $ok ? 'Thank you' : 'Something went wrong',
        'description' => '',
    ];
    $back = safe_back_url();
    require SITE_ROOT . '/partials/head.php';
    echo "<body>\n";
    require SITE_ROOT . '/partials/header.php';
    ?>
  <main id="main">
    <section class="section section--page-banner" aria-labelledby="page-title">
      <div class="column stack">
        <h1 id="page-title"><?= e($page['title']) ?></h1>
        <p class="lead"><?= e($message) ?></p>
        <p><a class="btn btn--primary" href="<?= e($back) ?>"><?= $ok ? 'Continue' : 'Go back' ?></a></p>
      </div>
    </section>
  </main>
<?php
    require SITE_ROOT . '/partials/footer.php';
    require SITE_ROOT . '/partials/scripts.php';
    echo "</body>\n</html>\n";
    exit;
}
