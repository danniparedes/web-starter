<?php
/* PRIVACY — Privacy policy. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   STRUCTURE ONLY: this is a starting outline, not legal advice. The client (or their lawyer) confirms the
   final text; replace every [bracket] and delete what does not apply. Linked from the footer through
   config/site.php > legal. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'privacy', 'title' => 'Privacy policy', 'description' => 'How we handle the information you send us.'];
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
            <li aria-current="page">Privacy policy</li>
          </ol>
        </nav>
        <h1 id="page-title">Privacy policy</h1>
        <p class="lead">What we collect through this website, why, and what you can ask of us.</p>
      </div>
    </section>

    <article class="section section--article" id="article" aria-label="Privacy policy">
      <div class="column stack stack--loose">
        <div class="prose">
          <p>Last updated: [Date]</p>

          <h2>Who we are</h2>
          <p>This website belongs to <?= e(config('company.name')) ?>, <?= e(config('company.address')) ?>. You can reach us at <a href="mailto:<?= e(config('company.email')) ?>"><?= e(config('company.email')) ?></a>.</p>

          <h2>What we collect, and why</h2>
          <ul>
            <li><strong>Contact form:</strong> your name, email, phone, message and any file you attach. We use it to answer your request.</li>
            <li><strong>Admissions form:</strong> [list the details the form asks for: parent, student, level, message]. We use it to reply to your inquiry and to plan the admissions process.</li>
            <li><strong>Newsletter:</strong> your email address. We use it to send you our news. You can leave at any time by writing to us.</li>
            <li><strong>Spam protection:</strong> a scrambled code made from your internet address (never the address itself), kept for a short time to stop automatic abuse.</li>
          </ul>

          <h2>How we store it</h2>
          <p>Each message is emailed to [Email] and a copy is saved on our web server, in a folder that visitors cannot open. We keep messages for [how long, for example 12 months] and the newsletter list until you ask to be removed.</p>

          <h2>Who can see it</h2>
          <p>Our staff who answer messages ([roles]), and the companies that run our website and email ([hosting company], [email provider]). We do not sell your information.</p>

          <h2>Cookies</h2>
          <p>The site uses one technical cookie that keeps our forms safe. It is deleted when you close your browser.</p>
<?php $an = analytics_ids(); ?>
<?php if (analytics_enabled()): ?>
          <p>With your permission we also use:</p>
          <ul>
<?php if ($an['ga4'] !== ''): ?>
            <li><strong>Google Analytics</strong>, run by Google, to count visits and see which pages are used.</li>
<?php endif; ?>
<?php if ($an['meta_pixel'] !== ''): ?>
            <li><strong>Meta (Facebook) Pixel</strong>, run by Meta, to measure our advertising.</li>
<?php endif; ?>
          </ul>
          <p>They start only after you press Accept in the cookie banner. You can change your mind at any time with "Cookie settings" at the bottom of every page: Reject removes them. [Add what the tools keep and for how long, from the client's analytics settings.]</p>
<?php endif; ?>

          <h2>Information about children</h2>
          <p>Admissions inquiries may include details about a student. We ask that a parent or guardian sends them, and we use them only for the admissions process. [Add the school's own rules.]</p>

          <h2>Your rights</h2>
          <p>You can ask to see, correct or delete the information we hold about you by writing to <a href="mailto:<?= e(config('company.email')) ?>"><?= e(config('company.email')) ?></a>. [Name the data-protection law that applies in the client's country and the authority people can contact.]</p>

          <h2>Changes</h2>
          <p>If we change this page, we update the date at the top.</p>
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
