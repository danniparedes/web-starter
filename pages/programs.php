<?php
/* PROGRAMS — Programs (schools). Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'programs', 'title' => 'Programs', 'description' => '[One sentence about the school programs.]'];
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
            <li aria-current="page">Programs</li>
          </ol>
        </nav>
        <h1 id="page-title">Programs</h1>
        <p class="lead">[One sentence about how learning is organised at the school.]</p>
      </div>
    </section>

    <!-- Program cards (in the patterns catalog): one block per level. Ages, schedules, fees and
         accreditations only from a document the school provides; otherwise leave the [bracket]. -->
    <section class="section section--programs" id="level-1" aria-labelledby="level-1-title">
      <div class="column stack stack--loose">
        <h2 id="level-1-title">[Level one]</h2>
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

    <section class="section section--programs section--alt" id="level-2" aria-labelledby="level-2-title">
      <div class="column stack stack--loose">
        <h2 id="level-2-title">[Level two]</h2>
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

    <section class="section section--programs" id="level-3" aria-labelledby="level-3-title">
      <div class="column stack stack--loose">
        <h2 id="level-3-title">[Level three]</h2>
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

    <section class="section section--cta" id="cta" aria-labelledby="cta-title">
      <div class="column stack">
        <h2 id="cta-title">[Invitation to visit or apply]</h2>
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
