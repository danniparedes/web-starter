<?php
/* POST — [Post title]. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>.
   One real file per post: copy this page to pages/NAME.php. 'canonical' => '' leaves the canonical link out
   while this stays a template; for a real post delete that key (the address is then built from 'id'). */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'post', 'title' => '[Post title]', 'description' => '[One sentence: summary of the post.]', 'canonical' => ''];
require SITE_ROOT . '/partials/head.php';
?>
<body>

<?php require SITE_ROOT . '/partials/header.php'; ?>

  <main id="main">

    <!-- ARTICLE HEADER: breadcrumb, category, title, meta -->
    <section class="section section--page-banner" id="page-banner" aria-labelledby="page-title">
      <div class="column stack">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?= url('index') ?>">Home</a></li>
            <li><a href="<?= url('blog') ?>">Blog</a></li>
            <li aria-current="page">[Post title]</li>
          </ol>
        </nav>
        <span class="badge">[Category]</span>
        <h1 id="page-title">[Post title]</h1>
        <p class="lead">[One-sentence summary of the post.]</p>
        <ul class="meta">
          <li>By [Author name]</li>
          <li><time datetime="[YYYY-MM-DD]">[Date]</time></li>
          <li>[0] min read</li>
        </ul>
      </div>
    </section>

    <!-- ARTICLE: cover photo (1280 x 720) + readable text column -->
    <article class="section section--article" id="article" aria-label="Article">
      <div class="column stack stack--loose">
        <figure class="figure figure--wide">
  <span class="figure__placeholder" data-size="1280 × 720">IMAGE</span>
</figure>
        <div class="prose">
          <p>[Opening paragraph: say what the reader will learn.]</p>
          <h2>[Subheading]</h2>
          <p>[Paragraph.]</p>
          <ul>
            <li>[Point one]</li>
            <li>[Point two]</li>
            <li>[Point three]</li>
          </ul>
          <blockquote><p>[A short quote worth remembering.]</p></blockquote>
          <h2>[Subheading]</h2>
          <p>[Paragraph.]</p>
          <figure class="figure">
            <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
            <figcaption>[Caption]</figcaption>
          </figure>
          <h2>[Closing]</h2>
          <p>[Closing paragraph with the next step for the reader.]</p>
        </div>

        <!-- AUTHOR BOX (switch: post.author) -->
        <aside class="card author" data-feature="post.author" aria-label="About the author">
          <figure class="figure figure--square">
  <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
</figure>
          <div>
            <p class="author__name">[Author name]</p>
            <p>[One or two sentences about the author.]</p>
          </div>
        </aside>
      </div>
    </article>

    <!-- RELATED POSTS (switch: post.related) -->
    <section class="section section--alt section--related" id="related" data-feature="post.related" aria-labelledby="related-title">
      <div class="column stack">
        <h2 id="related-title">Keep reading</h2>
        <div class="grid">
          <article class="card post">
            <figure class="figure">
  <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
</figure>
            <ul class="meta"><li><time datetime="[YYYY-MM-DD]">[Date]</time></li><li>[Category]</li></ul>
            <h3 class="card__title"><a href="<?= url('post') ?>">[Post title 1]</a></h3>
            <p>[Two lines that make people want to read on.]</p>
            <a class="post__link" href="<?= url('post') ?>">Read more<span class="visually-hidden">: [Post title 1]</span></a>
          </article>
          <article class="card post">
            <figure class="figure">
  <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
</figure>
            <ul class="meta"><li><time datetime="[YYYY-MM-DD]">[Date]</time></li><li>[Category]</li></ul>
            <h3 class="card__title"><a href="<?= url('post') ?>">[Post title 2]</a></h3>
            <p>[Two lines that make people want to read on.]</p>
            <a class="post__link" href="<?= url('post') ?>">Read more<span class="visually-hidden">: [Post title 2]</span></a>
          </article>
          <article class="card post">
            <figure class="figure">
  <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
</figure>
            <ul class="meta"><li><time datetime="[YYYY-MM-DD]">[Date]</time></li><li>[Category]</li></ul>
            <h3 class="card__title"><a href="<?= url('post') ?>">[Post title 3]</a></h3>
            <p>[Two lines that make people want to read on.]</p>
            <a class="post__link" href="<?= url('post') ?>">Read more<span class="visually-hidden">: [Post title 3]</span></a>
          </article>
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
