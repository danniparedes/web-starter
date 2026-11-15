<?php
/* ABOUT-ME — About me (personal brand). Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'about-me', 'title' => 'About me', 'description' => '[One sentence about you and what you do.]'];
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
            <li aria-current="page">About me</li>
          </ol>
        </nav>
        <h1 id="page-title">About me</h1>
        <p class="lead">[One sentence that sounds like you.]</p>
      </div>
    </section>

    <!-- ABOUT ME (5.20 in the patterns catalog) — portrait photo (stays in view while you read) + story.
         The story uses .prose for comfortable line length. -->
    <section class="section section--about-me" id="about-me" aria-labelledby="about-me-title">
      <div class="column halves halves--top">
        <figure class="figure figure--portrait">
          <span class="figure__placeholder" data-size="960 × 1200">IMAGE</span>
        </figure>
        <div class="stack">
          <h2 id="about-me-title">[Heading: a human sentence, not "About me"]</h2>
          <div class="prose">
            <p>[Opening: who you are, in the first person.]</p>
            <p>[The story: where you started, the turning point, what you believe.]</p>
            <p>[Today: what you do and who you do it for.]</p>
          </div>
          <p><a class="btn btn--primary" href="<?= url('contact') ?>">[Action label]</a></p>
        </div>
      </div>
    </section>

    <!-- OFFERINGS (5.20b) — what you can do for the reader: number, title, text.
         Numbers come from CSS. Three to five items; more feels like a menu. -->
    <section class="section section--offerings section--alt" id="offerings" aria-labelledby="offerings-title">
      <div class="column stack stack--loose">
        <h2 id="offerings-title">[Heading, e.g. How I can help]</h2>
        <ol class="offers">
          <li class="offer"><h3>[Offer one]</h3><p>[Who it is for and what changes for them.]</p></li>
          <li class="offer"><h3>[Offer two]</h3><p>[Who it is for and what changes for them.]</p></li>
          <li class="offer"><h3>[Offer three]</h3><p>[Who it is for and what changes for them.]</p></li>
        </ol>
      </div>
    </section>

    <!-- LOGO BAR (5.17) — a thin band of logos right under the hero.
         Use it with 5.1 (video hero) or 5.16 (image hero). Real logos only,
         and only with the owner's permission. -->
    <section class="section section--logo-bar" id="logo-bar" aria-label="[Who trusts us]">
      <div class="column stack">
        <p class="logo-bar__caption">[Short caption, e.g. Trusted by]</p>
        <!-- LOGO SLOTS. Replace each <span> with:
             <img class="logo-strip__img" src="<?= e(asset('assets/img/partner.svg')) ?>" alt="[Partner name]" height="48"> -->
        <ul class="logo-strip">
          <li><span class="logo-strip__placeholder">LOGO</span></li>
          <li><span class="logo-strip__placeholder">LOGO</span></li>
          <li><span class="logo-strip__placeholder">LOGO</span></li>
          <li><span class="logo-strip__placeholder">LOGO</span></li>
          <li><span class="logo-strip__placeholder">LOGO</span></li>
        </ul>
      </div>
    </section>

    <section class="section section--cta" id="cta" aria-labelledby="cta-title">
      <div class="column stack">
        <h2 id="cta-title">[One-line invitation]</h2>
        <p>[One short sentence that removes doubt.]</p>
        <p><a class="btn btn--light" href="<?= url('contact') ?>">[Action label]</a></p>
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
