<?php
/* ADMISSIONS — Admissions. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'admissions', 'title' => 'Admissions', 'description' => '[One sentence: how families apply.]'];
require SITE_ROOT . '/partials/head.php';
?>
<body>

<?php require SITE_ROOT . '/partials/header.php'; ?>

  <main id="main">

    <!-- PAGE BANNER: breadcrumb, h1, intro -->
    <section class="section section--page-banner" id="page-banner" aria-labelledby="page-title">
      <div class="column stack">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?= url('index') ?>">Home</a></li>
            <li aria-current="page">Admissions</li>
          </ol>
        </nav>
        <h1 id="page-title">Admissions</h1>
        <p class="lead">[One sentence: welcome families and invite them to start.]</p>
      </div>
    </section>

    <!-- WELCOME: short message + photo -->
    <section class="section section--welcome" id="welcome" aria-labelledby="welcome-title">
      <div class="column halves">
        <div class="stack">
          <h2 id="welcome-title">[Welcome heading]</h2>
          <p>[Two or three sentences: who you welcome and what makes the school a good place to learn.]</p>
          <p><a class="btn btn--primary" href="#inquiry">Start your inquiry</a></p>
        </div>
        <figure class="figure">
  <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
</figure>
      </div>
    </section>

    <!-- HOW TO APPLY: the steps, in order -->
    <section class="section section--alt section--steps" id="how-to-apply" aria-labelledby="how-title">
      <div class="column stack">
        <h2 id="how-title">How to apply</h2>
        <ol class="steps">
          <li class="steps__item"><h3 class="steps__title">[Inquire]</h3><p>[One sentence.]</p></li>
          <li class="steps__item"><h3 class="steps__title">[Visit the school]</h3><p>[One sentence.]</p></li>
          <li class="steps__item"><h3 class="steps__title">[Submit documents]</h3><p>[One sentence.]</p></li>
          <li class="steps__item"><h3 class="steps__title">[Meet the team]</h3><p>[One sentence.]</p></li>
          <li class="steps__item"><h3 class="steps__title">[Enroll]</h3><p>[One sentence.]</p></li>
        </ol>
      </div>
    </section>

    <!-- KEY DATES (switch: admissions.dates). Fill from the school's official calendar. -->
    <section class="section section--dates" id="dates" data-feature="admissions.dates" aria-labelledby="dates-title">
      <div class="column column--narrow stack">
        <h2 id="dates-title">Key dates</h2>
        <div class="table-wrap" tabindex="0" role="region" aria-label="Key admissions dates">
          <table class="table">
            <thead><tr><th scope="col">What</th><th scope="col">When</th></tr></thead>
            <tbody>
              <tr><th scope="row">[Applications open]</th><td>[Date]</td></tr>
              <tr><th scope="row">[Open house]</th><td>[Date]</td></tr>
              <tr><th scope="row">[Application deadline]</th><td>[Date]</td></tr>
              <tr><th scope="row">[Decisions sent]</th><td>[Date]</td></tr>
              <tr><th scope="row">[First day of classes]</th><td>[Date]</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- REQUIREMENTS: documents and ages -->
    <section class="section section--alt section--requirements" id="requirements" aria-labelledby="req-title">
      <div class="column stack">
        <h2 id="req-title">What you need</h2>
        <div class="halves halves--top">
          <div class="stack">
            <h3>Documents</h3>
            <ul class="list">
              <li>[Document 1]</li>
              <li>[Document 2]</li>
              <li>[Document 3]</li>
              <li>[Document 4]</li>
            </ul>
          </div>
          <div class="stack">
            <h3>Entry ages</h3>
            <div class="table-wrap" tabindex="0" role="region" aria-label="Entry ages by level">
              <table class="table">
                <thead><tr><th scope="col">Level</th><th scope="col">Age on [date]</th></tr></thead>
                <tbody>
                  <tr><th scope="row">[Level 1]</th><td>[Age]</td></tr>
                  <tr><th scope="row">[Level 2]</th><td>[Age]</td></tr>
                  <tr><th scope="row">[Level 3]</th><td>[Age]</td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- TUITION AND FEES (switch: admissions.tuition). Only publish figures the school confirms in writing. -->
    <section class="section section--tuition" id="tuition" data-feature="admissions.tuition" aria-labelledby="tuition-title">
      <div class="column column--narrow stack">
        <h2 id="tuition-title">Tuition and fees</h2>
        <div class="table-wrap" tabindex="0" role="region" aria-label="Tuition and fees">
          <table class="table">
            <thead><tr><th scope="col">Item</th><th scope="col" class="table__num">Amount</th></tr></thead>
            <tbody>
              <tr><th scope="row">[Enrollment fee]</th><td class="table__num">[Amount]</td></tr>
              <tr><th scope="row">[Monthly tuition, level 1]</th><td class="table__num">[Amount]</td></tr>
              <tr><th scope="row">[Monthly tuition, level 2]</th><td class="table__num">[Amount]</td></tr>
              <tr><th scope="row">[Materials]</th><td class="table__num">[Amount]</td></tr>
            </tbody>
          </table>
        </div>
        <p class="form__hint">[Note: payment plans, siblings discount, scholarships.]</p>
      </div>
    </section>

    <!-- FAQ (switch: admissions.faq) -->
    <section class="section section--alt section--faq" id="faq" data-feature="admissions.faq" aria-labelledby="faq-title">
      <div class="column column--narrow stack">
        <h2 id="faq-title">Questions families ask</h2>
        <div class="faq">
          <details class="faq__item"><summary class="faq__question">[Question]</summary><p>[Answer.]</p></details>
          <details class="faq__item"><summary class="faq__question">[Question]</summary><p>[Answer.]</p></details>
          <details class="faq__item"><summary class="faq__question">[Question]</summary><p>[Answer.]</p></details>
          <details class="faq__item"><summary class="faq__question">[Question]</summary><p>[Answer.]</p></details>
        </div>
      </div>
    </section>

    <!-- INQUIRY FORM (switch: admissions.form)
         BACKEND: posts to php/handlers/admissions.php (built in the PHP stage).
         Children's data is sensitive: collect only what is needed to start the conversation. -->
    <section class="section section--inquiry" id="inquiry" data-feature="admissions.form" aria-labelledby="inquiry-title">
      <div class="column column--narrow stack">
        <h2 id="inquiry-title">Start your inquiry</h2>
        <p>[One sentence: when the school will reply.]</p>
        <form class="form form--groups" action="php/handlers/admissions.php" method="post" data-js="form"
              data-success="Thank you! The admissions team will contact you soon.">

          <fieldset class="form__group">
            <legend class="form__legend">Parent or guardian</legend>
            <div class="form__row">
              <div class="form__field">
                <label class="form__label form__label--required" for="ad-name">Full name</label>
                <input class="form__control" id="ad-name" name="parent_name" type="text" autocomplete="name" required>
              </div>
              <div class="form__field">
                <label class="form__label form__label--required" for="ad-email">Email</label>
                <input class="form__control" id="ad-email" name="email" type="email" autocomplete="email" required>
              </div>
            </div>
            <div class="form__field">
              <label class="form__label form__label--required" for="ad-phone">Phone</label>
              <input class="form__control" id="ad-phone" name="phone" type="tel" autocomplete="tel" required aria-describedby="ad-phone-hint">
              <p class="form__hint" id="ad-phone-hint">Include the country code.</p>
            </div>
          </fieldset>

          <fieldset class="form__group">
            <legend class="form__legend">Student</legend>
            <div class="form__row">
              <div class="form__field">
                <label class="form__label form__label--required" for="ad-student">Student's first name</label>
                <input class="form__control" id="ad-student" name="student_name" type="text" required>
              </div>
              <div class="form__field">
                <label class="form__label form__label--required" for="ad-level">Level of interest</label>
                <select class="form__control" id="ad-level" name="level" required data-error="Please choose a level.">
                  <option value="">Choose one&hellip;</option>
                  <option value="[level-1]">[Level 1]</option>
                  <option value="[level-2]">[Level 2]</option>
                  <option value="[level-3]">[Level 3]</option>
                </select>
              </div>
            </div>
            <div class="form__field">
              <label class="form__label" for="ad-school">Current school (if any)</label>
              <input class="form__control" id="ad-school" name="current_school" type="text">
            </div>
          </fieldset>

          <fieldset class="form__group">
            <legend class="form__legend">Visit</legend>
            <div class="form__field">
              <label class="form__label" for="ad-visit">Preferred visit date</label>
              <input class="form__control" id="ad-visit" name="visit_date" type="date">
            </div>
            <div class="form__field">
              <label class="form__label" for="ad-message">Anything we should know?</label>
              <textarea class="form__control form__control--area" id="ad-message" name="message" maxlength="500"
                        data-counter="ad-count" aria-describedby="ad-count"></textarea>
              <p class="form__hint" id="ad-count">0 / 500</p>
            </div>
          </fieldset>

          <fieldset class="form__group">
            <legend class="form__legend">Consent</legend>
            <div class="form__field">
              <label class="form__choice"><input type="checkbox" name="accept_terms" value="yes" required data-error="Please accept to continue."> <span>I accept the <a href="[Privacy policy URL]">privacy policy</a>.</span></label>
            </div>
          </fieldset>

          <div class="visually-hidden" aria-hidden="true">
            <label>Leave this field empty <input name="website" type="text" tabindex="-1" autocomplete="off"></label>
          </div>
          <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
          <input type="hidden" name="source_page" value="<?= e($page['id']) ?>.php">

          <div class="form__status" role="status" data-js="form-status" hidden></div>
          <div class="form__actions">
            <button class="btn btn--primary" type="submit" data-loading-label="Sending&hellip;">Send inquiry</button>
          </div>
        </form>
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
