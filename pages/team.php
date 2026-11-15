<?php
/* TEAM — Team. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'team', 'title' => 'Team', 'description' => '[One sentence about the people behind the site.]'];
require SITE_ROOT . '/partials/head.php';
?>
<body>

<?php require SITE_ROOT . '/partials/header.php'; ?>

  <main id="main">

    <!-- INNER-PAGE BANNER: breadcrumb, h1, intro -->
    <section class="section section--page-banner" id="page-banner" aria-labelledby="page-title">
      <div class="column stack">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?= url('index') ?>">Home</a></li>
            <li aria-current="page">Team</li>
          </ol>
        </nav>
        <h1 id="page-title">Our team</h1>
        <p class="lead">[One sentence about the people and what they stand for.]</p>
      </div>
    </section>

    <!-- IMAGE + TEXT — two columns: image (left), text (right).
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
          <p><a class="btn btn--primary" href="<?= url('contact') ?>">[Button label]</a></p>
        </div>

      </div>
    </section>
    <!-- TEAM CARDS — round photo, name, role -->
    <section class="section section--team section--alt" id="team" aria-labelledby="team-title">
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
    <!-- TESTIMONIALS — real quotes, with the person's permission -->
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
    <!-- CALL-TO-ACTION BAND — one line, one button; sits right above the footer -->
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
