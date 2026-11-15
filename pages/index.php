<?php
/* INDEX — [Page title]. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'index', 'title' => '[Page title]', 'description' => '[One sentence describing this page.]'];
require SITE_ROOT . '/partials/head.php';
?>
<body>

<?php require SITE_ROOT . '/partials/header.php'; ?>

  <main id="main">

    <!-- 5.1 HERO — first impression: one promise, one action.
         Video background: remove the .media-bg block, the toggle button and
         the class "section--media" if you want a hero without media. -->
    <section class="section section--hero section--media" id="hero" aria-labelledby="hero-title">

      <!-- Background video (decorative).
           - poster = first frame of the video: shown until the video loads.
           - muted + playsinline are REQUIRED for autoplay on phones.
           - Two formats: the browser uses the first one it supports.
           SIZE: master 1920 x 1080 (16:9). Poster = same size, JPG or WebP.
           Phones: data-src-small points to a 1280 x 720 MP4 that main.js uses on small screens.
           Files: assets/img/hero-poster.jpg, assets/video/hero.webm, assets/video/hero.mp4,
                  assets/video/hero-1280.mp4 -->
      <div class="media-bg" aria-hidden="true">
        <video class="media-bg__video" data-js="bg-video" data-src-small="assets/video/hero-1280.mp4"
               autoplay muted loop playsinline preload="metadata"
               poster="assets/img/hero-poster.jpg">
          <source src="assets/video/hero.webm" type="video/webm">
          <source src="assets/video/hero.mp4" type="video/mp4">
        </video>
      </div>

      <div class="column stack">
        <h1 id="hero-title">[Main promise of the page]</h1>
        <p class="lead">[One or two sentences that support the promise.]</p>
        <p><a class="btn btn--primary" href="#contact">[Primary action]</a></p>
      </div>

      <!-- Pause/play for the moving background. Visible only when JS runs.
           CLIENT OPTION (plain autoplay + loop, no button): delete this
           <button> line. Nothing else needs to change. Trade-off: visitors can
           no longer stop the motion (see docs/Conventions, section 9). -->
      <button class="media-toggle" type="button" data-js="bg-video-toggle">Pause video</button>
    </section>

    <!-- 5.2 ABOUT — who/what, in plain words -->
    <section class="section section--about" id="about" aria-labelledby="about-title">
      <div class="column stack">
        <h2 id="about-title">[About heading]</h2>
        <p>[Short paragraph.]</p>
      </div>
    </section>

    <!-- 5.3 FEATURES — repeating cards in a responsive grid -->
    <section class="section section--features section--alt" id="features" aria-labelledby="features-title">
      <div class="column stack">
        <h2 id="features-title">[Features heading]</h2>
        <div class="grid">
          <article class="card">
            <h3 class="card__title">[Card title]</h3>
            <p>[Card text.]</p>
          </article>
          <article class="card">
            <h3 class="card__title">[Card title]</h3>
            <p>[Card text.]</p>
          </article>
          <article class="card">
            <h3 class="card__title">[Card title]</h3>
            <p>[Card text.]</p>
          </article>
        </div>
      </div>
    </section>

    <!-- 5.4 IMAGE + TEXT — two columns: image (left), text (right).
         Invert the columns by swapping the two children (see 5.5). -->
    <section class="section section--image-text" id="image-text" aria-labelledby="image-text-title">
      <div class="column halves">

        <!-- IMAGE SLOT. To use a real image, replace the <span> with:
             <img class="figure__img" src="assets/img/NAME.jpg" alt="[Describe the image]"
                  width="1200" height="900" loading="lazy"> -->
        <figure class="figure">
          <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
        </figure>

        <div class="stack">
          <h2 id="image-text-title">[Heading]</h2>
          <p>[Short text that supports the heading.]</p>
          <p><a class="btn btn--primary" href="#contact">[Button label]</a></p>
        </div>

      </div>
    </section>

    <!-- 5.5 TEXT + IMAGE — same pattern, columns inverted: text (left), image (right) -->
    <section class="section section--text-image section--alt" id="text-image" aria-labelledby="text-image-title">
      <div class="column halves">

        <div class="stack">
          <h2 id="text-image-title">[Heading]</h2>
          <p>[Short text that supports the heading.]</p>
          <p><a class="btn btn--primary" href="#contact">[Button label]</a></p>
        </div>

        <!-- IMAGE SLOT. To use a real image, replace the <span> with:
             <img class="figure__img" src="assets/img/NAME.jpg" alt="[Describe the image]"
                  width="1200" height="900" loading="lazy"> -->
        <figure class="figure">
          <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
        </figure>

      </div>
    </section>

    <!-- 5.6 DIVIDER — a band with a video background and a short message.
         Same video pattern as the hero (see 5.1). Own poster, own video,
         own pause button.
         Files: assets/img/divider-poster.jpg, assets/video/divider.webm, assets/video/divider.mp4 -->
    <section class="section section--divider section--media" id="divider" aria-labelledby="divider-title">

      <!-- SIZE: master 1920 x 800 (12:5). Phone version: 1280 x 534 MP4 (data-src-small). -->
      <div class="media-bg" aria-hidden="true">
        <video class="media-bg__video" data-js="bg-video" data-src-small="assets/video/divider-1280.mp4"
               autoplay muted loop playsinline preload="metadata"
               poster="assets/img/divider-poster.jpg">
          <source src="assets/video/divider.webm" type="video/webm">
          <source src="assets/video/divider.mp4" type="video/mp4">
        </video>
      </div>

      <!-- Two rows: heading, then text -->
      <div class="column stack">
        <h2 id="divider-title">[Divider heading]</h2>
        <p>[Short dummy text that supports the heading. Keep it brief: the video is the star of this band.]</p>
      </div>

      <button class="media-toggle" type="button" data-js="bg-video-toggle">Pause video</button>
    </section>

    <!-- 5.7 LISTS — three rows inside one column:
         row 1 = heading | row 2 = two columns of bullets | row 3 = text + action -->
    <section class="section section--lists" id="lists" aria-labelledby="lists-title">
      <div class="column stack stack--loose">

        <!-- Row 1: heading -->
        <h2 id="lists-title">[Heading]</h2>

        <!-- Row 2: two columns, each with a bulleted list -->
        <div class="halves halves--top">
          <ul class="list">
            <li>[List item one]</li>
            <li>[List item two]</li>
            <li>[List item three]</li>
          </ul>
          <ul class="list">
            <li>[List item one]</li>
            <li>[List item two]</li>
            <li>[List item three]</li>
          </ul>
        </div>

        <!-- Row 3: closing text + call to action -->
        <div class="stack">
          <p>[Closing text that leads to the action.]</p>
          <p><a class="btn btn--primary" href="#contact">[Call to action]</a></p>
        </div>

      </div>
    </section>

    <!-- 5.8 CONTACT / CALL TO ACTION — the page's closing action -->
    <section class="section section--contact section--alt" id="contact" aria-labelledby="contact-title">
      <div class="column stack">
        <h2 id="contact-title">[Contact heading]</h2>
        <p>[What happens when they get in touch.]</p>
        <p><a class="btn btn--primary" href="mailto:[email]">[Action label]</a></p>
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
