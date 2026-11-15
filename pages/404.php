<?php
/* 404 — page not found. Shown by index.php when the requested page does not exist. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => '404', 'title' => 'Page not found', 'description' => '', 'noindex' => true];
require SITE_ROOT . '/partials/head.php';
?>
<body>
<?php require SITE_ROOT . '/partials/header.php'; ?>

  <main id="main">
    <section class="section section--page-banner" id="page-banner" aria-labelledby="page-title">
      <div class="column stack">
        <h1 id="page-title">Page not found</h1>
        <p class="lead">The page you are looking for does not exist or has moved.</p>
        <p><a class="btn btn--primary" href="<?= e(url('index')) ?>">Go to the home page</a></p>
      </div>
    </section>
  </main>

<?php
require SITE_ROOT . '/partials/footer.php';
require SITE_ROOT . '/partials/chat-bubble.php';
require SITE_ROOT . '/partials/scripts.php';
?>
</body>
</html>
