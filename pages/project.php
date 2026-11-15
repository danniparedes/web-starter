<?php
/* PROJECT — [Project name] (case study). Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>.
   One real file per project: copy this page to pages/NAME.php. 'canonical' => '' leaves the canonical link out while this stays a template; for a real project delete that key. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'project', 'title' => '[Project name]', 'description' => '[One sentence: what this project was and its result.]', 'canonical' => ''];
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
            <li><a href="<?= url('projects') ?>">Work</a></li>
            <li aria-current="page">[Project name]</li>
          </ol>
        </nav>
        <h1 id="page-title">[Project name]</h1>
        <p class="lead">[One sentence: what the client needed and what changed.]</p>
      </div>
    </section>

    <!-- PROJECT DETAIL: cover image, quick facts beside the story, two more images, next project -->
    <article class="section section--project-detail" id="project-detail" aria-label="Project">
      <div class="column stack stack--loose">
        <figure class="figure figure--wide">
          <span class="figure__placeholder" data-size="1280 × 720">IMAGE</span>
        </figure>
        <div class="halves halves--top">
          <aside aria-labelledby="facts-title">
            <h2 id="facts-title" class="visually-hidden">Project facts</h2>
            <!-- Facts only from the client or a document. No document? Leave the [bracket]. -->
            <dl class="facts">
              <div class="facts__row"><dt>Client</dt><dd>[Client name]</dd></div>
              <div class="facts__row"><dt>Type</dt><dd>[Type of project]</dd></div>
              <div class="facts__row"><dt>Year</dt><dd>[Year]</dd></div>
              <div class="facts__row"><dt>My role</dt><dd>[What you did]</dd></div>
            </dl>
          </aside>
          <div class="prose">
            <h2>[The need]</h2>
            <p>[What the client needed, in their words.]</p>
            <h2>[The approach]</h2>
            <p>[What you did and why. Plain words, no jargon.]</p>
            <h2>[The result]</h2>
            <p>[What changed. Any number needs a source and the date it was checked: write [NUMBER NEEDED - source required] until you have one.]</p>
          </div>
        </div>
        <div class="halves">
          <figure class="figure">
            <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
          </figure>
          <figure class="figure">
            <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
          </figure>
        </div>
      </div>
    </article>

    <!-- NEXT PROJECT — keeps visitors browsing -->
    <section class="section section--alt" id="next-project" aria-labelledby="next-project-title">
      <div class="column stack">
        <h2 id="next-project-title">Next project</h2>
        <div class="grid">
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
        </div>
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
