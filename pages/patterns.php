<?php
/* PATTERNS — Section patterns. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'patterns', 'title' => 'Section patterns', 'description' => 'Catalog of reusable page sections.', 'noindex' => true];
require SITE_ROOT . '/partials/head.php';
?>
<body>
  <svg xmlns="http://www.w3.org/2000/svg" hidden width="0" height="0" aria-hidden="true">
    <!-- Inline copy of assets/icons/sprite.svg (works when the page is opened as a plain file) -->
    <symbol id="icon-arrow-right" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
    <symbol id="icon-check" viewBox="0 0 24 24"><path d="M5 12.5l4.5 4.5L19 7"/></symbol>
    <symbol id="icon-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>
    <symbol id="icon-close" viewBox="0 0 24 24"><path d="M6 6l12 12M18 6L6 18"/></symbol>
    <symbol id="icon-menu" viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16"/></symbol>
    <symbol id="icon-play" viewBox="0 0 24 24"><path d="M8 5l11 7-11 7z"/></symbol>
    <symbol id="icon-pause" viewBox="0 0 24 24"><path d="M8 5v14M16 5v14"/></symbol>
    <symbol id="icon-external" viewBox="0 0 24 24"><path d="M14 4h6v6M20 4l-9 9M18 14v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h5"/></symbol>
    <symbol id="icon-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></symbol>
    <symbol id="icon-phone" viewBox="0 0 24 24"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></symbol>
    <symbol id="icon-map-pin" viewBox="0 0 24 24"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/></symbol>
    <symbol id="icon-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/></symbol>
    <symbol id="icon-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
    <symbol id="icon-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></symbol>
    <symbol id="icon-star" viewBox="0 0 24 24"><path d="M12 3l2.8 5.7 6.2.9-4.5 4.4 1 6.2L12 17.2l-5.5 3 1-6.2L3 9.6l6.2-.9z"/></symbol>
    <symbol id="icon-heart" viewBox="0 0 24 24"><path d="M12 20s-8-5-8-11a4.5 4.5 0 0 1 8-2.8A4.5 4.5 0 0 1 20 9c0 6-8 11-8 11z"/></symbol>
    <symbol id="icon-shield" viewBox="0 0 24 24"><path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/></symbol>
    <symbol id="icon-book" viewBox="0 0 24 24"><path d="M4 19V5a2 2 0 0 1 2-2h13v14H6a2 2 0 0 0-2 2zm0 0a2 2 0 0 0 2 2h13"/></symbol>
  <symbol id="icon-chat" viewBox="0 0 24 24"><path d="M21 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.5l1.6-4.9A8.5 8.5 0 1 1 21 11.5z"/></symbol>
  </svg>
  
  <!-- =====================================================================
       3. SKIP LINK
       First focusable element. Lets keyboard users jump past the menu.
       ===================================================================== -->
  
<?php require SITE_ROOT . '/partials/header.php'; ?>

  <main id="main">

    <!-- Page banner — top of every inner page: breadcrumb, h1, intro -->
    <section class="section section--page-banner" id="page-banner" aria-labelledby="page-title">
      <div class="column stack">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?= url('index') ?>">Home</a></li>
            <li aria-current="page">Section patterns</li>
          </ol>
        </nav>
        <h1 id="page-title">Section patterns</h1>
        <p class="lead">A catalog of reusable sections. Copy the block you need into any page, then replace the [placeholders].</p>
      </div>
    </section>

    <!-- Contents — jump links to every pattern on this page, A to Z -->
    <section class="section" id="contents" aria-labelledby="contents-title">
      <div class="column stack">
        <h2 id="contents-title">Contents</h2>
        <div class="halves halves--top">
          <ul class="list">
            <li><a href="#about-me">About me</a> (<a href="<?= url('about-me') ?>">page</a>)</li>
            <li><a href="#bento">Bento grid</a></li>
            <li><a href="#cta">Call to action</a></li>
            <li><a href="#contact-form">Contact split</a></li>
            <li><a href="#dark">Dark section</a></li>
            <li><a href="#rows">Editorial rows</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li><a href="#faq-numbered">FAQ numbered</a></li>
            <li><a href="#float-cards">Floating proof cards</a></li>
            <li><a href="#float-cards-mirrored">Floating proof cards mirrored</a></li>
            <li><a href="#float-cards-spotlight">Floating proof cards spotlight</a></li>
            <li><a href="#float-cards-stair">Floating proof cards stair</a></li>
            <li><a href="#float-cards-tall">Floating proof cards tall</a></li>
            <li><a href="<?= url('forms') ?>">Form kit</a> (all field types)</li>
            <li><a href="#gallery">Gallery viewer</a></li>
            <li><a href="#glass-form">Glass form</a></li>
            <li><a href="#hero-type">Hero giant type</a></li>
            <li><a href="#hero-image">Hero image</a></li>
          </ul>
          <ul class="list">
            <li><a href="#icons">Icons</a></li>
            <li><a href="#logo-bar">Logo bar</a></li>
            <li><a href="#logos">Logo strip</a></li>
            <li><a href="#lottie">Lottie</a></li>
            <li><a href="#news">News cards</a></li>
            <li><a href="#offerings">Offerings</a></li>
            <li><a href="#programs">Program cards</a> (<a href="<?= url('programs') ?>">page</a>)</li>
            <li><a href="#projects">Project cards</a> (<a href="<?= url('projects') ?>">page</a>, <a href="<?= url('project') ?>">detail</a>)</li>
            <li><a href="#quote">Pull quote</a></li>
            <li><a href="#stats-card">Stats card</a></li>
            <li><a href="#stats">Stats strip</a></li>
            <li><a href="#steps">Steps</a></li>
            <li><a href="#tiles">Tall tiles</a></li>
            <li><a href="#team">Team cards</a></li>
            <li><a href="#testimonials">Testimonials</a></li>
            <li><a href="#timeline-itinerary">Timeline itinerary</a></li>
            <li><a href="#timeline-process">Timeline process</a></li>
          </ul>
        </div>
      </div>
    </section>

    <!-- About me — portrait photo (stays in view while you read) + story.
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

    <!-- Bento grid — a mosaic of tiles in different sizes (4 columns on desktop,
         2 on tablet, 1 on phone). Sizes: --wide, --tall, --feature. Looks: default,
         --primary, --image. Keep text short: a tile is a glance, not a paragraph.
         This order fills the 4-column desktop grid exactly (rows of 4 cells); if you add or
         remove tiles, count cells so no hole is left.
         IMAGE TILE. Add the photo as the first child:
           <img class="bento__img" src="<?= e(asset('assets/img/tile.jpg')) ?>" alt="" width="1200" height="1200"> -->
    <section class="section section--bento" id="bento" aria-labelledby="bento-title">
      <div class="column stack stack--loose">
        <h2 id="bento-title">[Heading]</h2>
        <div class="bento">
          <article class="bento__tile bento__tile--feature bento__tile--image">
            <span class="badge">[Label]</span>
            <h3>[Big tile: your strongest message]</h3>
            <p>[One short sentence.]</p>
          </article>
          <article class="bento__tile">
            <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="<?= e(asset('assets/icons/sprite.svg')) ?>#icon-star"></use></svg>
            <h3>[Tile title]</h3>
            <p>[One short sentence.]</p>
          </article>
          <article class="bento__tile bento__tile--primary">
            <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="<?= e(asset('assets/icons/sprite.svg')) ?>#icon-heart"></use></svg>
            <h3>[Tile title]</h3>
            <p>[One short sentence.]</p>
          </article>
          <article class="bento__tile bento__tile--wide">
            <h3>[Wide tile title]</h3>
            <p>[One short sentence.]</p>
          </article>
          <article class="bento__tile bento__tile--tall bento__tile--primary">
            <h3>[Tall tile title]</h3>
            <p>[One or two short sentences.]</p>
          </article>
          <article class="bento__tile">
            <h3>[Tile title]</h3>
            <p>[One short sentence.]</p>
          </article>
          <article class="bento__tile bento__tile--image">
            <h3>[Tile title]</h3>
          </article>
          <article class="bento__tile">
            <h3>[Tile title]</h3>
            <p>[One short sentence.]</p>
          </article>
          <article class="bento__tile bento__tile--wide">
            <h3>[Wide tile title]</h3>
            <p>[One short sentence.]</p>
          </article>
          <article class="bento__tile bento__tile--primary">
            <h3>[Tile title]</h3>
          </article>
        </div>
      </div>
    </section>

    <!-- Call to action — one line, one button; sits right above the footer -->
    <section class="section section--cta" id="cta" aria-labelledby="cta-title">
      <div class="column stack">
        <h2 id="cta-title">[One-line invitation]</h2>
        <p>[One short sentence that removes doubt.]</p>
        <p><a class="btn btn--light" href="<?= url('contact') ?>">[Action label]</a></p>
      </div>
    </section>

    <!-- Contact split — two halves: form (left), details and map (right).
         BACKEND: the form posts to php/handlers/contact.php, which is built in the PHP stage.
         Until then, submitting leads nowhere. -->
    <section class="section section--contact-form" id="contact-form" aria-labelledby="contact-form-title">
      <div class="column halves halves--top">

        <!-- Left: heading + form -->
        <div class="stack">
          <h2 id="contact-form-title">[Heading]</h2>
          <form class="form" action="php/handlers/contact.php" method="post" data-js="form">
            <div class="form__field">
              <label class="form__label" for="cf-name">Name</label>
              <input class="form__control" id="cf-name" name="name" type="text" autocomplete="name" required>
            </div>
            <div class="form__field">
              <label class="form__label" for="cf-email">Email</label>
              <input class="form__control" id="cf-email" name="email" type="email" autocomplete="email" required>
            </div>
            <div class="form__field">
              <label class="form__label" for="cf-message">Message</label>
              <textarea class="form__control form__control--area" id="cf-message" name="message" required></textarea>
              <p class="form__hint">[Short note: when they will hear back.]</p>
            </div>
            <!-- Spam trap: hidden from people, bots tend to fill it. The PHP side
                 rejects any message where this field is not empty. -->
            <div class="visually-hidden" aria-hidden="true">
              <label>Leave this field empty <input name="website" type="text" tabindex="-1" autocomplete="off"></label>
            </div>
            <div class="form__status" role="status" data-js="form-status" hidden></div>
            <p><button class="btn btn--primary" type="submit" data-loading-label="Sending…">[Send message]</button></p>
          </form>
        </div>

        <!-- Right: company details (row 1) + map (row 2) -->
        <div class="company stack">
          <address class="company__info">
            <span class="company__name">[Company name]</span><br>
            [Street address, City, Country]<br>
            <a href="tel:[Phone]">[Phone]</a><br>
            <a href="mailto:[Email]">[Email]</a>
          </address>
          <!-- MAP SLOT. Replace the <figure> with the map embed from your map provider:
               <iframe title="Map: [Company name] location" src="[EMBED URL]"
                       width="600" height="450" loading="lazy"></iframe> -->
          <figure class="figure">
            <span class="figure__placeholder" data-size="1200 × 900">MAP</span>
          </figure>
        </div>

      </div>
    </section>

    <!-- Dark section — one class flips a whole band to a dark look.
         Add class="section--dark" to any section. Cards, buttons, steps, FAQ and forms adapt by
         themselves, because the color ROLES change (see --dark-* in css/tokens.css).
         Alternate dark and light bands for rhythm. Whole site dark: <body class="theme-dark">. -->
    <section class="section section--dark" id="dark" aria-labelledby="dark-title">
      <div class="column stack stack--loose">
        <div class="stack">
          <p class="hero__eyebrow">[Short label]</p>
          <h2 id="dark-title">[Heading for a dark band]</h2>
          <p class="lead">[One or two sentences. Light text on a dark band reads as premium and calm.]</p>
          <p><a class="btn btn--primary" href="<?= url('contact') ?>">[Primary action]</a> <a class="btn btn--outline" href="<?= url('projects') ?>">[Second action]</a></p>
        </div>
        <div class="grid">
          <article class="card">
            <h3 class="card__title">[Card title]</h3>
            <p>[One short sentence.]</p>
          </article>
          <article class="card">
            <h3 class="card__title">[Card title]</h3>
            <p>[One short sentence.]</p>
          </article>
          <article class="card">
            <h3 class="card__title">[Card title]</h3>
            <p>[One short sentence.]</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Editorial rows — a section label (03 / Selected work) and a list of thin-lined rows.
         Looks like a magazine page. Shown on a dark band; works on light too.
         Numbers in the rows come from CSS. The number inside .section-label is typed on purpose:
         it is the section's place on the page. ICON: on a real page use the sprite file:
         <use href="<?= e(asset('assets/icons/sprite.svg')) ?>#icon-arrow-right"> -->
    <section class="section section--dark" id="rows" aria-labelledby="rows-title">
      <div class="column stack stack--loose">
        <div class="stack">
          <p class="section-label"><span class="section-label__number">03</span> <span>[Label, e.g. Selected work]</span></p>
          <h2 id="rows-title">[Heading]</h2>
        </div>
        <ol class="rows">
          <li class="row">
            <a class="row__link" href="<?= url('projects') ?>">
              <h3 class="row__title">[Row title 1]</h3>
              <p class="row__text">[One line about it.]</p>
              <svg class="icon row__icon" aria-hidden="true" focusable="false"><use href="#icon-arrow-right"></use></svg>
            </a>
          </li>
          <li class="row">
            <a class="row__link" href="<?= url('projects') ?>">
              <h3 class="row__title">[Row title 2]</h3>
              <p class="row__text">[One line about it.]</p>
              <svg class="icon row__icon" aria-hidden="true" focusable="false"><use href="#icon-arrow-right"></use></svg>
            </a>
          </li>
          <li class="row">
            <a class="row__link" href="<?= url('projects') ?>">
              <h3 class="row__title">[Row title 3]</h3>
              <p class="row__text">[One line about it.]</p>
              <svg class="icon row__icon" aria-hidden="true" focusable="false"><use href="#icon-arrow-right"></use></svg>
            </a>
          </li>
          <li class="row">
            <a class="row__link" href="<?= url('projects') ?>">
              <h3 class="row__title">[Row title 4]</h3>
              <p class="row__text">[One line about it.]</p>
              <svg class="icon row__icon" aria-hidden="true" focusable="false"><use href="#icon-arrow-right"></use></svg>
            </a>
          </li>
        </ol>
      </div>
    </section>

    <!-- FAQ — opens and closes with no JavaScript -->
    <section class="section section--faq section--alt" id="faq" aria-labelledby="faq-title">
      <div class="column column--narrow stack stack--loose">
        <h2 id="faq-title">[Heading]</h2>
        <div class="faq">
          <details class="faq__item">
            <summary class="faq__question">[Question]</summary>
            <p>[Answer.]</p>
          </details>
          <details class="faq__item">
            <summary class="faq__question">[Question]</summary>
            <p>[Answer.]</p>
          </details>
          <details class="faq__item">
            <summary class="faq__question">[Question]</summary>
            <p>[Answer.]</p>
          </details>
          <details class="faq__item">
            <summary class="faq__question">[Question]</summary>
            <p>[Answer.]</p>
          </details>
        </div>
      </div>
    </section>

    <!-- FAQ numbered — the same no-JavaScript block as FAQ, with 01, 02, 03 in front.
         Add the class faq--numbered. Numbers come from CSS. -->
    <section class="section section--faq" id="faq-numbered" aria-labelledby="faq-numbered-title">
      <div class="column column--narrow stack stack--loose">
        <h2 id="faq-numbered-title">[Heading]</h2>
        <div class="faq faq--numbered">
          <details class="faq__item">
            <summary class="faq__question">[Question]</summary>
            <p>[Answer.]</p>
          </details>
          <details class="faq__item">
            <summary class="faq__question">[Question]</summary>
            <p>[Answer.]</p>
          </details>
          <details class="faq__item">
            <summary class="faq__question">[Question]</summary>
            <p>[Answer.]</p>
          </details>
          <details class="faq__item">
            <summary class="faq__question">[Question]</summary>
            <p>[Answer.]</p>
          </details>
          <details class="faq__item">
            <summary class="faq__question">[Question]</summary>
            <p>[Answer.]</p>
          </details>
        </div>
      </div>
    </section>

    <!-- Floating proof cards — text on one side; on the other a pale panel and small separate
         cards with a gap: a dark score card, a sources card with round logos, and a meter panel.
         Use for proof beside a headline. Put theme-dark on ONE card only.
         Meters: five spans per bar, the first N carry is-on; the aria-label says the same in words.
         RULE: every number, source name and level must come from a real check, with the date.
         No verified source? Write [NUMBER NEEDED - source required]. Logos only with permission.
         To add a meter row: copy one <li class="meter-row"> and change label, segments, status. -->
    <section class="section section--float-cards" id="float-cards" aria-labelledby="float-cards-title">
      <div class="column halves halves--top">
        <div class="stack">
          <p class="hero__eyebrow">[Short label]</p>
          <h2 id="float-cards-title">[The promise, in one line]</h2>
          <p class="lead">[One or two sentences that say how the proof below was checked.]</p>
          <p><a class="btn btn--primary" href="<?= url('contact') ?>">[Primary action]</a></p>
        </div>
        <div class="float-cluster">
          <div class="float-card theme-dark float-card--score">
            <p class="score">
              <span class="score__value">[Number]</span>
              <span class="score__note">
                <svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-check"></use></svg>
                <span>[What the number counts]</span>
              </span>
            </p>
          </div>
          <div class="float-card float-card--sources">
            <h3 class="float-card__title">[Sources]</h3>
            <ul class="avatar-row" aria-label="[Names of the sources]">
              <li class="avatar-row__item">[A]</li>
              <li class="avatar-row__item">[B]</li>
              <li class="avatar-row__item">[C]</li>
              <li class="avatar-row__item">[D]</li>
            </ul>
            <p class="stat__source">[Where the sources come from, date checked]</p>
          </div>
          <div class="float-card float-card--meters">
            <h3 class="float-card__title">[Check name]</h3>
            <ul class="meter-list">
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[4] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[5] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[3] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Floating proof cards mirrored — same cards, the wide meter panel on top and the score and sources card below it.
         Same markup as Floating proof cards; the only change is the class float-cluster--mirrored.
         Same RULE: every number, source name and level needs a real check and its date. -->
    <section class="section section--float-cards" id="float-cards-mirrored" aria-labelledby="float-cards-mirrored-title">
      <div class="column halves halves--top">
        <div class="stack">
          <p class="hero__eyebrow">[Short label]</p>
          <h2 id="float-cards-mirrored-title">[The promise, in one line]</h2>
          <p class="lead">[One or two sentences that say how the proof below was checked.]</p>
          <p><a class="btn btn--primary" href="<?= url('contact') ?>">[Primary action]</a></p>
        </div>
        <div class="float-cluster float-cluster--mirrored">
          <div class="float-card theme-dark float-card--score">
            <p class="score">
              <span class="score__value">[Number]</span>
              <span class="score__note">
                <svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-check"></use></svg>
                <span>[What the number counts]</span>
              </span>
            </p>
          </div>
          <div class="float-card float-card--sources">
            <h3 class="float-card__title">[Sources]</h3>
            <ul class="avatar-row" aria-label="[Names of the sources]">
              <li class="avatar-row__item">[A]</li>
              <li class="avatar-row__item">[B]</li>
              <li class="avatar-row__item">[C]</li>
              <li class="avatar-row__item">[D]</li>
            </ul>
            <p class="stat__source">[Where the sources come from, date checked]</p>
          </div>
          <div class="float-card float-card--meters">
            <h3 class="float-card__title">[Check name]</h3>
            <ul class="meter-list">
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[4] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[5] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[3] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- Floating proof cards spotlight — a wide score card on top; sources and meters share the row below.
         Same markup as Floating proof cards; the only change is the class float-cluster--spotlight.
         Same RULE: every number, source name and level needs a real check and its date. -->
    <section class="section section--float-cards" id="float-cards-spotlight" aria-labelledby="float-cards-spotlight-title">
      <div class="column halves halves--top">
        <div class="stack">
          <p class="hero__eyebrow">[Short label]</p>
          <h2 id="float-cards-spotlight-title">[The promise, in one line]</h2>
          <p class="lead">[One or two sentences that say how the proof below was checked.]</p>
          <p><a class="btn btn--primary" href="<?= url('contact') ?>">[Primary action]</a></p>
        </div>
        <div class="float-cluster float-cluster--spotlight">
          <div class="float-card theme-dark float-card--score">
            <p class="score">
              <span class="score__value">[Number]</span>
              <span class="score__note">
                <svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-check"></use></svg>
                <span>[What the number counts]</span>
              </span>
            </p>
          </div>
          <div class="float-card float-card--sources">
            <h3 class="float-card__title">[Sources]</h3>
            <ul class="avatar-row" aria-label="[Names of the sources]">
              <li class="avatar-row__item">[A]</li>
              <li class="avatar-row__item">[B]</li>
              <li class="avatar-row__item">[C]</li>
              <li class="avatar-row__item">[D]</li>
            </ul>
            <p class="stat__source">[Where the sources come from, date checked]</p>
          </div>
          <div class="float-card float-card--meters">
            <h3 class="float-card__title">[Check name]</h3>
            <ul class="meter-list">
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[4] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[5] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[3] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- Floating proof cards stair — three rows, cards stepping left, right, left.
         Same markup as Floating proof cards; the only change is the class float-cluster--stair.
         Same RULE: every number, source name and level needs a real check and its date. -->
    <section class="section section--float-cards" id="float-cards-stair" aria-labelledby="float-cards-stair-title">
      <div class="column halves halves--top">
        <div class="stack">
          <p class="hero__eyebrow">[Short label]</p>
          <h2 id="float-cards-stair-title">[The promise, in one line]</h2>
          <p class="lead">[One or two sentences that say how the proof below was checked.]</p>
          <p><a class="btn btn--primary" href="<?= url('contact') ?>">[Primary action]</a></p>
        </div>
        <div class="float-cluster float-cluster--stair">
          <div class="float-card theme-dark float-card--score">
            <p class="score">
              <span class="score__value">[Number]</span>
              <span class="score__note">
                <svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-check"></use></svg>
                <span>[What the number counts]</span>
              </span>
            </p>
          </div>
          <div class="float-card float-card--sources">
            <h3 class="float-card__title">[Sources]</h3>
            <ul class="avatar-row" aria-label="[Names of the sources]">
              <li class="avatar-row__item">[A]</li>
              <li class="avatar-row__item">[B]</li>
              <li class="avatar-row__item">[C]</li>
              <li class="avatar-row__item">[D]</li>
            </ul>
            <p class="stat__source">[Where the sources come from, date checked]</p>
          </div>
          <div class="float-card float-card--meters">
            <h3 class="float-card__title">[Check name]</h3>
            <ul class="meter-list">
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[4] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[5] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[3] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- Floating proof cards tall — a tall score card on the left; sources and meters stacked on the right.
         Same markup as Floating proof cards; the only change is the class float-cluster--tall.
         Same RULE: every number, source name and level needs a real check and its date. -->
    <section class="section section--float-cards" id="float-cards-tall" aria-labelledby="float-cards-tall-title">
      <div class="column halves halves--top">
        <div class="stack">
          <p class="hero__eyebrow">[Short label]</p>
          <h2 id="float-cards-tall-title">[The promise, in one line]</h2>
          <p class="lead">[One or two sentences that say how the proof below was checked.]</p>
          <p><a class="btn btn--primary" href="<?= url('contact') ?>">[Primary action]</a></p>
        </div>
        <div class="float-cluster float-cluster--tall">
          <div class="float-card theme-dark float-card--score">
            <p class="score">
              <span class="score__value">[Number]</span>
              <span class="score__note">
                <svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-check"></use></svg>
                <span>[What the number counts]</span>
              </span>
            </p>
          </div>
          <div class="float-card float-card--sources">
            <h3 class="float-card__title">[Sources]</h3>
            <ul class="avatar-row" aria-label="[Names of the sources]">
              <li class="avatar-row__item">[A]</li>
              <li class="avatar-row__item">[B]</li>
              <li class="avatar-row__item">[C]</li>
              <li class="avatar-row__item">[D]</li>
            </ul>
            <p class="stat__source">[Where the sources come from, date checked]</p>
          </div>
          <div class="float-card float-card--meters">
            <h3 class="float-card__title">[Check name]</h3>
            <ul class="meter-list">
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[4] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[5] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
              <li class="meter-row">
                <span class="meter-row__label">[Label]</span>
                <span class="meter" role="img" aria-label="[3] of [5]">
                  <span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment is-on"></span><span class="meter__segment"></span><span class="meter__segment"></span>
                </span>
                <span class="meter-row__status">[Status]</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- Gallery viewer — needs JavaScript for the viewer -->
    <section class="section section--gallery section--alt" id="gallery" aria-labelledby="gallery-title">
      <div class="column stack stack--loose">
        <h2 id="gallery-title">[Heading]</h2>
        <!-- IMAGE SLOTS. Replace each <span> with the real thumbnail:
             <img class="figure__img" src="assets/img/gallery-01.jpg" alt="[Describe the image]"
                  width="1200" height="900" loading="lazy">
             For a bigger file in the viewer add data-full="assets/img/gallery-01-large.jpg" on the <button>.
             Keep a meaningful alt: it names the button for screen readers. -->
        <ul class="grid grid--narrow gallery">
          <li>
            <button class="gallery__item" type="button" data-js="gallery-item"
                    aria-haspopup="dialog" aria-label="Open image 1">
              <span class="figure__placeholder" data-size="1600 × 1200">IMAGE 1</span>
            </button>
          </li>
          <li>
            <button class="gallery__item" type="button" data-js="gallery-item"
                    aria-haspopup="dialog" aria-label="Open image 2">
              <span class="figure__placeholder" data-size="1600 × 1200">IMAGE 2</span>
            </button>
          </li>
          <li>
            <button class="gallery__item" type="button" data-js="gallery-item"
                    aria-haspopup="dialog" aria-label="Open image 3">
              <span class="figure__placeholder" data-size="1600 × 1200">IMAGE 3</span>
            </button>
          </li>
          <li>
            <button class="gallery__item" type="button" data-js="gallery-item"
                    aria-haspopup="dialog" aria-label="Open image 4">
              <span class="figure__placeholder" data-size="1600 × 1200">IMAGE 4</span>
            </button>
          </li>
          <li>
            <button class="gallery__item" type="button" data-js="gallery-item"
                    aria-haspopup="dialog" aria-label="Open image 5">
              <span class="figure__placeholder" data-size="1600 × 1200">IMAGE 5</span>
            </button>
          </li>
          <li>
            <button class="gallery__item" type="button" data-js="gallery-item"
                    aria-haspopup="dialog" aria-label="Open image 6">
              <span class="figure__placeholder" data-size="1600 × 1200">IMAGE 6</span>
            </button>
          </li>
        </ul>
      </div>

      <!-- The viewer: ONE per page. Opened by main.js (initGallery). -->
      <dialog class="lightbox" data-js="lightbox" aria-label="Image viewer">
        <button class="lightbox__close" type="button" data-js="lightbox-close" aria-label="Close viewer">&times;</button>
        <div data-js="lightbox-stage"></div>
        <div class="lightbox__controls">
          <button class="lightbox__nav" type="button" data-js="lightbox-prev" aria-label="Previous image">&lsaquo;</button>
          <button class="lightbox__nav" type="button" data-js="lightbox-next" aria-label="Next image">&rsaquo;</button>
        </div>
      </dialog>
    </section>

    <!-- Glass form — a request form on a frosted panel over a photo.
         The panel is tinted dark, so white text stays readable on any photo. Fields stay white so
         people can see where to type. BACKEND: posts to php/handlers/contact.php, like Contact split.
         IMAGE SLOT. Put your photo inside .media-bg:
           <img class="media-bg__img" src="<?= e(asset('assets/img/glass-bg.jpg')) ?>" alt="" width="1920" height="1200">
         SIZE: master 1920 x 1200. Leave alt="" - the photo is decoration. -->
    <section class="section section--media section--glass" id="glass-form" aria-labelledby="glass-form-title">
      <div class="media-bg" aria-hidden="true"></div>
      <div class="column halves">
        <div class="stack">
          <h2 id="glass-form-title">[Heading: an invitation]</h2>
          <p class="lead">[One or two sentences: what happens after they send the request.]</p>
        </div>
        <div class="glass-card stack">
          <form class="form" action="php/handlers/contact.php" method="post" data-js="form">
            <div class="form__field">
              <label class="form__label" for="gl-name">Name</label>
              <input class="form__control" id="gl-name" name="name" type="text" autocomplete="name" required>
            </div>
            <div class="form__field">
              <label class="form__label" for="gl-email">Email</label>
              <input class="form__control" id="gl-email" name="email" type="email" autocomplete="email" required>
            </div>
            <div class="form__field">
              <label class="form__label" for="gl-message">Message</label>
              <textarea class="form__control form__control--area" id="gl-message" name="message" required></textarea>
              <p class="form__hint">[Short note: when they will hear back.]</p>
            </div>
            <div class="visually-hidden" aria-hidden="true">
              <label>Leave this field empty <input name="website" type="text" tabindex="-1" autocomplete="off"></label>
            </div>
            <div class="form__status" role="status" data-js="form-status" hidden></div>
            <p><button class="btn btn--primary" type="submit" data-loading-label="Sending…">[Send request]</button></p>
          </form>
        </div>
      </div>
    </section>

    <!-- Hero giant type — the headline is the picture: very large letters, and a photo that
         overlaps their lower part. Keep the headline to one or two SHORT words, so the part the
         photo covers never hides the meaning. The photo is decoration; the headline stays real text.
         How much the photo covers: --hero-type-overlap in css/tokens.css.
         IMAGE SLOT. Replace the placeholder with
           <img class="figure__img" src="<?= e(asset('assets/img/hero-type.jpg')) ?>" alt="" width="960" height="1200">
         SIZE: master 960 x 1200 (4:5). -->
    <section class="section section--hero-type" id="hero-type" aria-labelledby="hero-type-title">
      <div class="column stack stack--loose">
        <h2 class="hero__title hero__title--giant" id="hero-type-title">[Name]</h2>
        <figure class="figure figure--portrait hero-type__figure">
          <span class="figure__placeholder" data-size="960 × 1200">IMAGE</span>
        </figure>
        <p class="lead">[One or two sentences that say what you do and for whom.]</p>
        <p class="hero-type__action"><a class="btn btn--primary" href="<?= url('contact') ?>">[Primary action]</a></p>
      </div>
    </section>

    <!-- Hero image — big type over one still photo. No video, no pause button.
         The photo fills the section; the dark overlay keeps white text readable.
         IMAGE SLOT. Put your photo inside .media-bg:
           <img class="media-bg__img" src="<?= e(asset('assets/img/hero-image.jpg')) ?>" alt="" width="1920" height="1200">
         SIZE: master 1920 x 1200, subject near the centre (phones crop the sides).
         Leave alt="" - the photo is decoration; the headline carries the message. -->
    <section class="section section--hero section--hero-image section--media" id="hero-image" aria-labelledby="hero-image-title">
      <div class="media-bg" aria-hidden="true"></div>
      <div class="column stack">
        <p class="hero__eyebrow">[Short label: who you are or what you do]</p>
        <!-- On a real page this heading is a level-1 heading (one per page). Here it is level 2 because this catalog page already has its level-1 heading. -->
        <h2 class="hero__title" id="hero-image-title">[Main promise, in very few words]</h2>
        <p class="lead">[One or two sentences that support the promise.]</p>
        <p><a class="btn btn--primary" href="<?= url('contact') ?>">[Primary action]</a></p>
      </div>
    </section>

    <!-- Icons — the line-icon set. One sprite, one component (.icon).
         Spec: 24 x 24 grid, line style, 1.5 stroke, SVG only, color = text color. -->
    <section class="section" id="icons" aria-labelledby="icons-title">
      <div class="column stack">
        <h2 id="icons-title">Icons</h2>
        <p>Line style on a 24 &times; 24 grid. Sizes: small, normal, large. Color follows the text.</p>
        <ul class="grid grid--narrow icon-tiles">
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-arrow-right"></use></svg>
              <code>arrow-right</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-check"></use></svg>
              <code>check</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-plus"></use></svg>
              <code>plus</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-close"></use></svg>
              <code>close</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-menu"></use></svg>
              <code>menu</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-play"></use></svg>
              <code>play</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-pause"></use></svg>
              <code>pause</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-external"></use></svg>
              <code>external</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-mail"></use></svg>
              <code>mail</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-phone"></use></svg>
              <code>phone</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-map-pin"></use></svg>
              <code>map-pin</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-calendar"></use></svg>
              <code>calendar</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-clock"></use></svg>
              <code>clock</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-user"></use></svg>
              <code>user</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-star"></use></svg>
              <code>star</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-heart"></use></svg>
              <code>heart</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-shield"></use></svg>
              <code>shield</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-book"></use></svg>
              <code>book</code>
            </li>
            <li class="icon-tile">
              <svg class="icon icon--large" aria-hidden="true" focusable="false"><use href="#icon-chat"></use></svg>
              <code>chat</code>
            </li>
        </ul>
        <p>
          <a class="btn btn--primary" href="#icons">
            <svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-arrow-right"></use></svg>
            [Icon beside text]
          </a>
        </p>
      </div>
    </section>

    <!-- Logo bar — a thin band of logos right under the hero.
         Use it with Hero video or Hero image. Real logos only,
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

    <!-- Logo strip — partners, clients, press, accreditations -->
    <section class="section section--logos section--alt" id="logos" aria-labelledby="logos-title">
      <div class="column stack stack--loose">
        <h2 id="logos-title">[Heading]</h2>
        <!-- LOGO SLOTS. Replace each <span> with:
             <img class="logo-strip__img" src="assets/img/partner.svg" alt="[Partner name]" height="48"> -->
        <ul class="logo-strip">
          <li><span class="logo-strip__placeholder">LOGO</span></li>
          <li><span class="logo-strip__placeholder">LOGO</span></li>
          <li><span class="logo-strip__placeholder">LOGO</span></li>
          <li><span class="logo-strip__placeholder">LOGO</span></li>
          <li><span class="logo-strip__placeholder">LOGO</span></li>
        </ul>
      </div>
    </section>

    <!-- Lottie — small animations (animated icon, loader).
         Real markup (once a file exists):
           <div class="lottie"><dotlottie-wc data-js="lottie" src="assets/lottie/NAME.lottie" autoplay></dotlottie-wc></div>
         main.js loads the player only on pages that contain data-js="lottie". -->
    <section class="section section--alt" id="lottie" aria-labelledby="lottie-title">
      <div class="column stack">
        <h2 id="lottie-title">Lottie animations</h2>
        <p>Animated icons play once; loaders loop only while loading. Reduced-motion visitors get a still frame.</p>
        <div class="halves halves--top">
          <div class="stack">
            <div class="lottie"><span class="lottie__placeholder">ICON</span></div>
            <p>Animated icon: 256 &times; 256 master (displays at 4rem).</p>
          </div>
          <div class="stack">
            <div class="lottie lottie--large"><span class="lottie__placeholder">LOADER</span></div>
            <p>Large animation: 1024 &times; 1024 master (displays at 12rem).</p>
          </div>
        </div>
      </div>
    </section>

    <!-- News cards — cards with date, title, excerpt (static markup now; fed from a database in the PHP stage) -->
    <section class="section section--news" id="news" aria-labelledby="news-title">
      <div class="column stack stack--loose">
        <h2 id="news-title">[Heading]</h2>
        <div class="grid">
          <article class="card post">
            <time class="post__date" datetime="[YYYY-MM-DD]">[Date]</time>
            <h3 class="card__title"><a href="[URL]">[Headline]</a></h3>
            <p>[Short excerpt, one or two sentences.]</p>
            <a class="post__link" href="[URL]">Read more</a>
          </article>
          <article class="card post">
            <time class="post__date" datetime="[YYYY-MM-DD]">[Date]</time>
            <h3 class="card__title"><a href="[URL]">[Headline]</a></h3>
            <p>[Short excerpt, one or two sentences.]</p>
            <a class="post__link" href="[URL]">Read more</a>
          </article>
          <article class="card post">
            <time class="post__date" datetime="[YYYY-MM-DD]">[Date]</time>
            <h3 class="card__title"><a href="[URL]">[Headline]</a></h3>
            <p>[Short excerpt, one or two sentences.]</p>
            <a class="post__link" href="[URL]">Read more</a>
          </article>
        </div>
      </div>
    </section>

    <!-- Offerings — what you can do for the reader: number, title, text.
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

    <!-- Program cards — one block per level, cards inside a grid.
         Ages, schedules, fees and accreditations only from a document the school provides;
         otherwise leave the [bracket]. -->
    <section class="section section--programs" id="programs" aria-labelledby="programs-title">
      <div class="column stack stack--loose">
        <h2 id="programs-title">[Level heading, e.g. Early years]</h2>
        <div class="grid">
          <article class="card program">
            <span class="badge">[Level]</span>
            <h3 class="card__title">[Program name 1]</h3>
            <p>[Two lines: who it is for and what children learn.]</p>
            <dl class="facts">
              <div class="facts__row"><dt>Ages</dt><dd>[Ages - from the school]</dd></div>
              <div class="facts__row"><dt>Schedule</dt><dd>[Schedule - from the school]</dd></div>
            </dl>
            <a class="post__link" href="<?= url('admissions') ?>">Admissions<span class="visually-hidden">: [Program name 1]</span></a>
          </article>
          <article class="card program">
            <span class="badge">[Level]</span>
            <h3 class="card__title">[Program name 2]</h3>
            <p>[Two lines: who it is for and what children learn.]</p>
            <dl class="facts">
              <div class="facts__row"><dt>Ages</dt><dd>[Ages - from the school]</dd></div>
              <div class="facts__row"><dt>Schedule</dt><dd>[Schedule - from the school]</dd></div>
            </dl>
            <a class="post__link" href="<?= url('admissions') ?>">Admissions<span class="visually-hidden">: [Program name 2]</span></a>
          </article>
          <article class="card program">
            <span class="badge">[Level]</span>
            <h3 class="card__title">[Program name 3]</h3>
            <p>[Two lines: who it is for and what children learn.]</p>
            <dl class="facts">
              <div class="facts__row"><dt>Ages</dt><dd>[Ages - from the school]</dd></div>
              <div class="facts__row"><dt>Schedule</dt><dd>[Schedule - from the school]</dd></div>
            </dl>
            <a class="post__link" href="<?= url('admissions') ?>">Admissions<span class="visually-hidden">: [Program name 3]</span></a>
          </article>
        </div>
      </div>
    </section>

    <!-- Project cards — portfolio / case studies. Each card is one link to a project page.
         Make the first card .project--feature to make it bigger (2 columns on tablet, 2 x 2 cells on desktop).
         Six cards (feature + 5) fill the desktop grid exactly.
         One real page per project: copy pages/project.php to pages/NAME.php. -->
    <section class="section section--projects" id="projects" aria-labelledby="projects-title">
      <div class="column stack stack--loose">
        <h2 id="projects-title">[Heading, e.g. Selected work]</h2>
        <div class="grid grid--projects">
          <article class="project project--feature">
            <a class="project__link" href="<?= url('project') ?>">
              <figure class="figure figure--project">
                <span class="figure__placeholder" data-size="1200 × 800">IMAGE</span>
              </figure>
              <span class="badge">[Type of project]</span>
              <h3 class="project__title">[Project name 1]</h3>
              <p>[One line: the result for the client.]</p>
            </a>
          </article>
          <article class="project">
            <a class="project__link" href="<?= url('project') ?>">
              <figure class="figure figure--project">
                <span class="figure__placeholder" data-size="1200 × 800">IMAGE</span>
              </figure>
              <span class="badge">[Type of project]</span>
              <h3 class="project__title">[Project name 2]</h3>
              <p>[One line: the result for the client.]</p>
            </a>
          </article>
          <article class="project">
            <a class="project__link" href="<?= url('project') ?>">
              <figure class="figure figure--project">
                <span class="figure__placeholder" data-size="1200 × 800">IMAGE</span>
              </figure>
              <span class="badge">[Type of project]</span>
              <h3 class="project__title">[Project name 3]</h3>
              <p>[One line: the result for the client.]</p>
            </a>
          </article>
          <article class="project">
            <a class="project__link" href="<?= url('project') ?>">
              <figure class="figure figure--project">
                <span class="figure__placeholder" data-size="1200 × 800">IMAGE</span>
              </figure>
              <span class="badge">[Type of project]</span>
              <h3 class="project__title">[Project name 4]</h3>
              <p>[One line: the result for the client.]</p>
            </a>
          </article>
          <article class="project">
            <a class="project__link" href="<?= url('project') ?>">
              <figure class="figure figure--project">
                <span class="figure__placeholder" data-size="1200 × 800">IMAGE</span>
              </figure>
              <span class="badge">[Type of project]</span>
              <h3 class="project__title">[Project name 5]</h3>
              <p>[One line: the result for the client.]</p>
            </a>
          </article>
          <article class="project">
            <a class="project__link" href="<?= url('project') ?>">
              <figure class="figure figure--project">
                <span class="figure__placeholder" data-size="1200 × 800">IMAGE</span>
              </figure>
              <span class="badge">[Type of project]</span>
              <h3 class="project__title">[Project name 6]</h3>
              <p>[One line: the result for the client.]</p>
            </a>
          </article>
        </div>
      </div>
    </section>

    <!-- Pull quote — one large statement -->
    <section class="section section--quote section--alt" id="quote" aria-labelledby="quote-title">
      <div class="column column--narrow">
        <h2 id="quote-title" class="visually-hidden">[Quote heading]</h2>
        <figure class="pull-quote">
          <blockquote>
            <p class="pull-quote__text">[One powerful statement, in one or two lines.]</p>
          </blockquote>
          <figcaption class="pull-quote__author">[Name], [Role]</figcaption>
        </figure>
      </div>
    </section>

    <!-- Stats card — a card of figures that rises over the bottom of the hero.
         Put the second section right after ANY hero (Hero video, Hero image) and add
         the class section--hero-overlap to that hero (leaves room at its foot for the card).
         Below, a small hero is shown only so you can see the overlap.
         RULE: every number needs a primary source and the date it was checked.
         No verified source? Write [NUMBER NEEDED - source required]. -->
    <section class="section section--hero section--hero-image section--hero-overlap section--media" id="hero-overlap" aria-labelledby="hero-overlap-title">
      <div class="media-bg" aria-hidden="true"></div>
      <div class="column stack">
        <p class="hero__eyebrow">[Short label]</p>
        <h2 class="hero__title" id="hero-overlap-title">[Main promise]</h2>
        <p class="lead">[One sentence that supports the promise.]</p>
      </div>
    </section>
    <section class="section section--stats-card" id="stats-card" aria-label="[What these figures show]">
      <div class="column">
        <div class="stats-card">
          <div class="grid grid--narrow">
            <div class="stat">
              <p class="stat__value">[Number]</p>
              <p class="stat__label">[What it counts]</p>
              <p class="stat__source">[Source, date checked]</p>
            </div>
            <div class="stat">
              <p class="stat__value">[Number]</p>
              <p class="stat__label">[What it counts]</p>
              <p class="stat__source">[Source, date checked]</p>
            </div>
            <div class="stat">
              <p class="stat__value">[Number]</p>
              <p class="stat__label">[What it counts]</p>
              <p class="stat__source">[Source, date checked]</p>
            </div>
            <div class="stat">
              <p class="stat__value">[Number]</p>
              <p class="stat__label">[What it counts]</p>
              <p class="stat__source">[Source, date checked]</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats strip — big numbers with labels -->
    <section class="section section--stats section--alt" id="stats" aria-labelledby="stats-title">
      <div class="column stack stack--loose">
        <h2 id="stats-title">[Heading]</h2>
        <!-- RULE: every number needs a primary source and the date it was checked.
             No verified source? Write [NUMBER NEEDED - source required]. -->
        <div class="grid grid--narrow">
          <div class="stat">
            <p class="stat__value">[Number]</p>
            <p class="stat__label">[What it counts]</p>
            <p class="stat__source">[Source, date checked]</p>
          </div>
          <div class="stat">
            <p class="stat__value">[Number]</p>
            <p class="stat__label">[What it counts]</p>
            <p class="stat__source">[Source, date checked]</p>
          </div>
          <div class="stat">
            <p class="stat__value">[Number]</p>
            <p class="stat__label">[What it counts]</p>
            <p class="stat__source">[Source, date checked]</p>
          </div>
          <div class="stat">
            <p class="stat__value">[Number]</p>
            <p class="stat__label">[What it counts]</p>
            <p class="stat__source">[Source, date checked]</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Steps — numbers come from CSS, not the HTML -->
    <section class="section section--steps" id="steps" aria-labelledby="steps-title">
      <div class="column stack stack--loose">
        <h2 id="steps-title">[Heading]</h2>
        <ol class="steps">
          <li class="steps__item">
            <h3 class="steps__title">[Step title]</h3>
            <p>[One or two sentences about this step.]</p>
          </li>
          <li class="steps__item">
            <h3 class="steps__title">[Step title]</h3>
            <p>[One or two sentences about this step.]</p>
          </li>
          <li class="steps__item">
            <h3 class="steps__title">[Step title]</h3>
            <p>[One or two sentences about this step.]</p>
          </li>
          <li class="steps__item">
            <h3 class="steps__title">[Step title]</h3>
            <p>[One or two sentences about this step.]</p>
          </li>
        </ol>
      </div>
    </section>

    <!-- Tall tiles — tall photos with a caption laid over the foot of each.
         Phones: swipe sideways, each tile snaps into place. Wide screens: four fit side by side;
         with more than four, arrow buttons appear (JavaScript adds them; without it the row still scrolls).
         IMAGE SLOTS: replace each <figure> content with
           <img class="figure__img" src="<?= e(asset('assets/img/tile-1.jpg')) ?>" alt="[What the photo shows]" width="900" height="1200">
         SIZE: master 900 x 1200 (3:4). Keep the foot of the photo calm: the caption sits there.
         The tile link must say where it goes, in the caption text. -->
    <section class="section section--tiles" id="tiles" aria-labelledby="tiles-title">
      <div class="column stack stack--loose">
        <h2 id="tiles-title">[Heading]</h2>
        <div class="tiles-wrap">
          <ul class="tiles" data-js="tiles" tabindex="0" role="region" aria-label="[What the tiles show, e.g. Our tours]">
          <li class="tile">
            <a class="tile__link" href="<?= url('contact') ?>">
              <figure class="figure figure--tall">
                <span class="figure__placeholder" data-size="900 × 1200">IMAGE</span>
              </figure>
              <span class="tile__caption">
                <span class="badge">[Label 1]</span>
                <strong class="tile__title">[Tile title 1]</strong>
              </span>
            </a>
          </li>
          <li class="tile">
            <a class="tile__link" href="<?= url('contact') ?>">
              <figure class="figure figure--tall">
                <span class="figure__placeholder" data-size="900 × 1200">IMAGE</span>
              </figure>
              <span class="tile__caption">
                <span class="badge">[Label 2]</span>
                <strong class="tile__title">[Tile title 2]</strong>
              </span>
            </a>
          </li>
          <li class="tile">
            <a class="tile__link" href="<?= url('contact') ?>">
              <figure class="figure figure--tall">
                <span class="figure__placeholder" data-size="900 × 1200">IMAGE</span>
              </figure>
              <span class="tile__caption">
                <span class="badge">[Label 3]</span>
                <strong class="tile__title">[Tile title 3]</strong>
              </span>
            </a>
          </li>
          <li class="tile">
            <a class="tile__link" href="<?= url('contact') ?>">
              <figure class="figure figure--tall">
                <span class="figure__placeholder" data-size="900 × 1200">IMAGE</span>
              </figure>
              <span class="tile__caption">
                <span class="badge">[Label 4]</span>
                <strong class="tile__title">[Tile title 4]</strong>
              </span>
            </a>
          </li>
          <li class="tile">
            <a class="tile__link" href="<?= url('contact') ?>">
              <figure class="figure figure--tall">
                <span class="figure__placeholder" data-size="900 × 1200">IMAGE</span>
              </figure>
              <span class="tile__caption">
                <span class="badge">[Label 5]</span>
                <strong class="tile__title">[Tile title 5]</strong>
              </span>
            </a>
          </li>
          <li class="tile">
            <a class="tile__link" href="<?= url('contact') ?>">
              <figure class="figure figure--tall">
                <span class="figure__placeholder" data-size="900 × 1200">IMAGE</span>
              </figure>
              <span class="tile__caption">
                <span class="badge">[Label 6]</span>
                <strong class="tile__title">[Tile title 6]</strong>
              </span>
            </a>
          </li>
          </ul>
          <div class="tiles__controls" data-js="tiles-controls">
            <button class="tiles__button tiles__button--prev" type="button" data-js="tiles-prev" aria-label="Previous">
              <svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-arrow-right"></use></svg>
            </button>
            <button class="tiles__button tiles__button--next" type="button" data-js="tiles-next" aria-label="Next">
              <svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-arrow-right"></use></svg>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Team cards — round photo, name, role -->
    <section class="section section--team" id="team" aria-labelledby="team-title">
      <div class="column stack stack--loose">
        <h2 id="team-title">[Heading]</h2>
        <div class="grid grid--narrow">
          <article class="person">
            <figure class="figure figure--square">
              <span class="figure__placeholder" data-size="800 × 800">PHOTO</span>
            </figure>
            <h3 class="person__name">[Name]</h3>
            <p class="person__role">[Role]</p>
          </article>
          <article class="person">
            <figure class="figure figure--square">
              <span class="figure__placeholder" data-size="800 × 800">PHOTO</span>
            </figure>
            <h3 class="person__name">[Name]</h3>
            <p class="person__role">[Role]</p>
          </article>
          <article class="person">
            <figure class="figure figure--square">
              <span class="figure__placeholder" data-size="800 × 800">PHOTO</span>
            </figure>
            <h3 class="person__name">[Name]</h3>
            <p class="person__role">[Role]</p>
          </article>
          <article class="person">
            <figure class="figure figure--square">
              <span class="figure__placeholder" data-size="800 × 800">PHOTO</span>
            </figure>
            <h3 class="person__name">[Name]</h3>
            <p class="person__role">[Role]</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Testimonials — real quotes, with the person's permission -->
    <section class="section section--testimonials" id="testimonials" aria-labelledby="testimonials-title">
      <div class="column stack stack--loose">
        <h2 id="testimonials-title">[Heading]</h2>
        <div class="grid">
          <figure class="card testimonial">
            <blockquote class="testimonial__quote">
              <p>[A real quote, in the person's own words.]</p>
            </blockquote>
            <figcaption class="testimonial__author">
              <span class="testimonial__name">[Name]</span>
              <span class="testimonial__role">[Role or relation]</span>
            </figcaption>
          </figure>
          <figure class="card testimonial">
            <blockquote class="testimonial__quote">
              <p>[A real quote, in the person's own words.]</p>
            </blockquote>
            <figcaption class="testimonial__author">
              <span class="testimonial__name">[Name]</span>
              <span class="testimonial__role">[Role or relation]</span>
            </figcaption>
          </figure>
          <figure class="card testimonial">
            <blockquote class="testimonial__quote">
              <p>[A real quote, in the person's own words.]</p>
            </blockquote>
            <figcaption class="testimonial__author">
              <span class="testimonial__name">[Name]</span>
              <span class="testimonial__role">[Role or relation]</span>
            </figcaption>
          </figure>
        </div>
      </div>
    </section>

    <!-- Timeline itinerary — things in order over days or years:
         a trip, a school year, a career. The small label above each title holds the dates.
         Dates and durations only from a document or the client. -->
    <section class="section section--itinerary" id="timeline-itinerary" aria-labelledby="timeline-itinerary-title">
      <div class="column column--narrow stack stack--loose">
        <h2 id="timeline-itinerary-title">[Heading, e.g. The journey]</h2>
        <ol class="timeline">
          <li class="timeline__item">
            <p class="timeline__when">[Dates or stage]</p>
            <h3 class="timeline__title">[Title 1]</h3>
            <p>[One or two sentences about this stage.]</p>
          </li>
          <li class="timeline__item">
            <p class="timeline__when">[Dates or stage]</p>
            <h3 class="timeline__title">[Title 2]</h3>
            <p>[One or two sentences about this stage.]</p>
          </li>
          <li class="timeline__item">
            <p class="timeline__when">[Dates or stage]</p>
            <h3 class="timeline__title">[Title 3]</h3>
            <p>[One or two sentences about this stage.]</p>
          </li>
        </ol>
      </div>
    </section>

    <!-- Timeline process — how you work, in one row from tablets up.
         Phones stack it. Three to five stages read best. Numbers come from CSS. Shown on a dark band. -->
    <section class="section section--dark" id="timeline-process" aria-labelledby="timeline-process-title">
      <div class="column stack stack--loose">
        <h2 id="timeline-process-title">[Heading, e.g. How we work]</h2>
        <ol class="timeline timeline--numbered timeline--horizontal">
          <li class="timeline__item">
            <p class="timeline__when">[Phase]</p>
            <h3 class="timeline__title">[Title 1]</h3>
            <p>[One or two sentences about this stage.]</p>
          </li>
          <li class="timeline__item">
            <p class="timeline__when">[Phase]</p>
            <h3 class="timeline__title">[Title 2]</h3>
            <p>[One or two sentences about this stage.]</p>
          </li>
          <li class="timeline__item">
            <p class="timeline__when">[Phase]</p>
            <h3 class="timeline__title">[Title 3]</h3>
            <p>[One or two sentences about this stage.]</p>
          </li>
          <li class="timeline__item">
            <p class="timeline__when">[Phase]</p>
            <h3 class="timeline__title">[Title 4]</h3>
            <p>[One or two sentences about this stage.]</p>
          </li>
          <li class="timeline__item">
            <p class="timeline__when">[Phase]</p>
            <h3 class="timeline__title">[Title 5]</h3>
            <p>[One or two sentences about this stage.]</p>
          </li>
        </ol>
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
