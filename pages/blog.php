<?php
/* BLOG — Blog. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'blog', 'title' => 'Blog', 'description' => '[One sentence: what the blog covers.]'];
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
            <li aria-current="page">Blog</li>
          </ol>
        </nav>
        <h1 id="page-title">Blog</h1>
        <p class="lead">[One sentence: what this blog covers and for whom.]</p>
      </div>
    </section>

    <!-- FEATURED POST: the newest or most important post -->
    <section class="section section--featured-post" id="featured-post" aria-labelledby="featured-title">
      <div class="column">
        <article class="card post post--featured">
          <figure class="figure">
  <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
</figure>
          <div class="post__body">
            <ul class="meta"><li><time datetime="[YYYY-MM-DD]">[Date]</time></li><li>[Category]</li></ul>
            <h2 class="card__title" id="featured-title"><a href="<?= url('post') ?>">[Featured post title]</a></h2>
            <p>[Three lines that make people want to read on.]</p>
            <a class="post__link" href="<?= url('post') ?>">Read more<span class="visually-hidden">: [Featured post title]</span></a>
          </div>
        </article>
      </div>
    </section>

    <!-- LATEST POSTS: categories + grid + pagination
         BACKEND: chips link to ?category=...; the PHP stage lists posts from the database. -->
    <section class="section section--posts" id="posts" aria-labelledby="posts-title">
      <div class="column stack stack--loose">
        <h2 id="posts-title">Latest posts</h2>
        <ul class="chips" aria-label="Categories">
          <li><a class="chip" href="<?= url('blog') ?>" aria-current="true">All</a></li>
          <li><a class="chip" href="<?= url('blog?category=[category-1]') ?>">[Category 1]</a></li>
          <li><a class="chip" href="<?= url('blog?category=[category-2]') ?>">[Category 2]</a></li>
          <li><a class="chip" href="<?= url('blog?category=[category-3]') ?>">[Category 3]</a></li>
        </ul>
        <div class="grid">
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
          <article class="card post">
            <figure class="figure">
  <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
</figure>
            <ul class="meta"><li><time datetime="[YYYY-MM-DD]">[Date]</time></li><li>[Category]</li></ul>
            <h3 class="card__title"><a href="<?= url('post') ?>">[Post title 4]</a></h3>
            <p>[Two lines that make people want to read on.]</p>
            <a class="post__link" href="<?= url('post') ?>">Read more<span class="visually-hidden">: [Post title 4]</span></a>
          </article>
          <article class="card post">
            <figure class="figure">
  <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
</figure>
            <ul class="meta"><li><time datetime="[YYYY-MM-DD]">[Date]</time></li><li>[Category]</li></ul>
            <h3 class="card__title"><a href="<?= url('post') ?>">[Post title 5]</a></h3>
            <p>[Two lines that make people want to read on.]</p>
            <a class="post__link" href="<?= url('post') ?>">Read more<span class="visually-hidden">: [Post title 5]</span></a>
          </article>
          <article class="card post">
            <figure class="figure">
  <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
</figure>
            <ul class="meta"><li><time datetime="[YYYY-MM-DD]">[Date]</time></li><li>[Category]</li></ul>
            <h3 class="card__title"><a href="<?= url('post') ?>">[Post title 6]</a></h3>
            <p>[Two lines that make people want to read on.]</p>
            <a class="post__link" href="<?= url('post') ?>">Read more<span class="visually-hidden">: [Post title 6]</span></a>
          </article>
          <article class="card post">
            <figure class="figure">
  <span class="figure__placeholder" data-size="1200 × 900">IMAGE</span>
</figure>
            <ul class="meta"><li><time datetime="[YYYY-MM-DD]">[Date]</time></li><li>[Category]</li></ul>
            <h3 class="card__title"><a href="<?= url('post') ?>">[Post title 7]</a></h3>
            <p>[Two lines that make people want to read on.]</p>
            <a class="post__link" href="<?= url('post') ?>">Read more<span class="visually-hidden">: [Post title 7]</span></a>
          </article>
        </div>
        <nav aria-label="Pagination">
          <ul class="pagination">
          <li><a class="pagination__link" href="?page=1" aria-current="page">1</a></li>
          <li><a class="pagination__link" href="?page=2">2</a></li>
          <li><a class="pagination__link" href="?page=3">3</a></li>
            <li><a class="pagination__link" href="?page=2" rel="next">Next</a></li>
          </ul>
        </nav>
      </div>
    </section>

    <!-- NEWSLETTER BAND (switch: newsletter) -->
    <section class="section section--alt" id="newsletter" data-feature="newsletter" aria-labelledby="newsletter-title">
      <div class="column column--narrow stack">
        <h2 id="newsletter-title">[Newsletter heading]</h2>
        <p>[One sentence: what they get and how often.]</p>
        <form class="form form--inline" action="php/handlers/newsletter.php" method="post" data-js="form"
              data-success="Thanks for subscribing!">
          <div class="form__field">
            <label class="form__label form__label--required" for="bl-nl-email">Email</label>
            <input class="form__control" id="bl-nl-email" name="email" type="email" autocomplete="email" required>
          </div>
          <div class="visually-hidden" aria-hidden="true">
            <label>Leave this field empty <input name="website" type="text" tabindex="-1" autocomplete="off"></label>
          </div>
          <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
          <input type="hidden" name="source_page" value="<?= e($page['id']) ?>.php">
          <button class="btn btn--primary" type="submit" data-loading-label="Subscribing&hellip;">[Subscribe]</button>
          <div class="form__status" role="status" data-js="form-status" hidden></div>
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
