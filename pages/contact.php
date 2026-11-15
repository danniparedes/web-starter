<?php
/* CONTACT — Contact. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'contact', 'title' => 'Contact', 'description' => '[One sentence: how to reach us.]'];
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
            <li aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 id="page-title">Contact</h1>
        <p class="lead">[One sentence that invites people to write, call or visit.]</p>
      </div>
    </section>

    <!-- CONTACT + FORM + MAP — two halves: form (left), details and map (right).
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
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="source_page" value="<?= e($page['id']) ?>.php">
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
    <!-- STEPS / TIMELINE — numbers come from CSS, not the HTML -->
    <section class="section section--steps section--alt" id="steps" aria-labelledby="steps-title">
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
    <!-- FAQ — opens and closes with no JavaScript -->
    <section class="section section--faq" id="faq" aria-labelledby="faq-title">
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
  </main>

<?php
require SITE_ROOT . '/partials/footer.php';
require SITE_ROOT . '/partials/chat-bubble.php';
require SITE_ROOT . '/partials/scripts.php';
?>
</body>
</html>
