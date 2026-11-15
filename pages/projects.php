<?php
/* PROJECTS — Projects / portfolio. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'projects', 'title' => 'Work', 'description' => '[One sentence about the work shown here.]'];
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
            <li aria-current="page">Work</li>
          </ol>
        </nav>
        <h1 id="page-title">Our work</h1>
        <p class="lead">[One sentence about the kind of work you are proud of.]</p>
      </div>
    </section>

    <!-- PROJECT CARDS (5.18 in the patterns catalog) — portfolio / case studies. Each card is one link to a project page.
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
