<?php
/* TERMS — Terms of use. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   STRUCTURE ONLY: this is a starting outline, not legal advice. The client (or their lawyer) confirms the
   final text; replace every [bracket] and delete what does not apply. Linked from the footer through
   config/site.php > legal. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'terms', 'title' => 'Terms of use', 'description' => 'The rules for using this website.'];
require SITE_ROOT . '/partials/head.php';
?>
<body>

<?php require SITE_ROOT . '/partials/header.php'; ?>

  <main id="main">

    <section class="section section--page-banner" id="page-banner" aria-labelledby="page-title">
      <div class="column stack">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?= url('index') ?>">Home</a></li>
            <li aria-current="page">Terms of use</li>
          </ol>
        </nav>
        <h1 id="page-title">Terms of use</h1>
        <p class="lead">The simple rules for using this website.</p>
      </div>
    </section>

    <article class="section section--article" id="article" aria-label="Terms of use">
      <div class="column stack stack--loose">
        <div class="prose">
          <p>Last updated: [Date]</p>

          <h2>Using this website</h2>
          <p>By using this website you agree to these terms. If you do not agree, please do not use it.</p>

          <h2>Our content</h2>
          <p>The texts, images, logos and designs on this website belong to <?= e(config('company.name')) ?> or are used with permission. Please ask us before you copy or republish them.</p>

          <h2>Messages and inquiries</h2>
          <p>Sending a message or an admissions inquiry does not guarantee a reply by a set date, and an admissions inquiry is not an enrollment. We handle your information as described in our <a href="<?= e(url('privacy')) ?>">privacy policy</a>.</p>

          <h2>Information on this site</h2>
          <p>We work to keep the information correct, but fees, dates and services can change. Please confirm with us before you decide. [Add specifics for the client: for example, "Fees shown are for the [school year]."]</p>

          <h2>Links to other websites</h2>
          <p>We link to other websites for your convenience. We are not responsible for their content.</p>

          <h2>Limits of liability</h2>
          <p>[Text from the client's lawyer.]</p>

          <h2>Governing law</h2>
          <p>[Country and courts that apply.]</p>

          <h2>Contact</h2>
          <p>Questions about these terms: <a href="mailto:<?= e(config('company.email')) ?>"><?= e(config('company.email')) ?></a>.</p>
        </div>
      </div>
    </article>

  </main>

<?php
require SITE_ROOT . '/partials/footer.php';
require SITE_ROOT . '/partials/chat-bubble.php';
require SITE_ROOT . '/partials/scripts.php';
?>
</body>
</html>
