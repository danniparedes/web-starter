<?php
/* ALL PAGES — index of every page in the starter, grouped by purpose. Design reference only:
   delete this page (and its menu line) before launch. When you add a page, add one line here. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'all-pages', 'title' => 'All pages', 'description' => 'Index of every page in the starter.', 'noindex' => true];
require SITE_ROOT . '/partials/head.php';

/* group => [ [page name, label, what it is, status] ]. status: ready | design only */
$groups = [
    'Core site' => [
        ['index',      'Home',       'Hero, about, features, image + text, divider, lists, contact', 'ready'],
        ['contact',    'Contact',    'Form, details, map, steps, FAQ', 'ready'],
        ['team',       'Team',       'People cards, testimonials', 'ready'],
        ['blog',       'Blog',       'Post list, categories, newsletter', 'ready'],
        ['post',       'Blog post',  'Article template (copy per post)', 'ready'],
    ],
    'Schools' => [
        ['admissions', 'Admissions', 'Dates, tuition, FAQ, inquiry form', 'ready'],
        ['programs',   'Programs',   'Program cards per level', 'ready'],
    ],
    'Personal brand and portfolio' => [
        ['about-me',   'About me',   'Portrait, story, offerings, logo bar', 'ready'],
        ['projects',   'Work',       'Project cards (portfolio)', 'ready'],
        ['project',    'Project',    'Case-study template (copy per project)', 'ready'],
    ],
    'Library (design reference)' => [
        ['patterns',   'Patterns',   'Catalog of every reusable section, including the dark theme', 'reference'],
        ['forms',      'Forms',      'Form kit with all field types', 'reference'],
        ['store',      'Store',      'Store design; cart and checkout not built', 'design only'],
    ],
    'Legal' => [
        ['privacy',    'Privacy policy', 'Structure only, not legal advice', 'ready'],
        ['terms',      'Terms of use',   'Structure only, not legal advice', 'ready'],
    ],
];
?>
<body>

<?php require SITE_ROOT . '/partials/header.php'; ?>

  <main id="main">

    <section class="section section--page-banner" id="page-banner" aria-labelledby="page-title">
      <div class="column stack">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?= url('index') ?>">Home</a></li>
            <li aria-current="page">All pages</li>
          </ol>
        </nav>
        <h1 id="page-title">All pages</h1>
        <p class="lead">Every page in the starter, grouped by purpose. Design reference only: remove before launch.</p>
      </div>
    </section>

<?php foreach ($groups as $title => $items): $gid = 'g-' . strtolower(preg_replace('/[^a-z]+/i', '-', $title)); ?>
    <section class="section<?= array_key_last($groups) !== $title && array_search($title, array_keys($groups)) % 2 ? ' section--alt' : '' ?>" aria-labelledby="<?= e($gid) ?>">
      <div class="column stack">
        <h2 id="<?= e($gid) ?>"><?= e($title) ?></h2>
        <div class="grid">
<?php foreach ($items as [$name, $label, $about, $status]): ?>
          <article class="card post">
            <span class="badge<?= $status === 'ready' ? ' badge--success' : '' ?>"><?= e($status) ?></span>
            <h3 class="card__title"><a href="<?= url($name) ?>"><?= e($label) ?></a></h3>
            <p><?= e($about) ?></p>
          </article>
<?php endforeach; ?>
        </div>
      </div>
    </section>

<?php endforeach; ?>
  </main>

<?php
require SITE_ROOT . '/partials/footer.php';
require SITE_ROOT . '/partials/chat-bubble.php';
require SITE_ROOT . '/partials/scripts.php';
?>
</body>
</html>
