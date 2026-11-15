<?php
/* STORE — Store. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>.
   DESIGN ONLY: the cart and checkout are NOT built (php/cart.php and php/checkout.php do not exist),
   so the "Add to cart" buttons lead nowhere. Do not launch this page: remove it from the menu and
   delete the file, or build the store first. It stays out of search engines (noindex) meanwhile. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'store', 'title' => 'Store', 'description' => '[One sentence: what the store sells.]', 'noindex' => true];
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
            <li aria-current="page">Store</li>
          </ol>
        </nav>
        <h1 id="page-title">Store</h1>
        <p class="lead">[One sentence about what you sell and who it is for.]</p>
      </div>
    </section>

    <!-- STORE TOOLS: search, sort, categories (switch: store.filters)
         BACKEND: this form sends ?q=...&sort=... to this same page; the PHP stage reads them and queries the database. -->
    <section class="section section--store-tools" id="store-tools" data-feature="store.filters" aria-label="Search and filter products">
      <div class="column stack">
        <form class="toolbar" role="search" action="<?= url('store') ?>" method="get">
          <div class="form__field">
            <label class="form__label" for="st-q">Search</label>
            <input class="form__control" id="st-q" name="q" type="search" autocomplete="off">
          </div>
          <div class="form__field">
            <label class="form__label" for="st-sort">Sort by</label>
            <select class="form__control" id="st-sort" name="sort">
              <option value="new">Newest</option>
              <option value="price-asc">Price: low to high</option>
              <option value="price-desc">Price: high to low</option>
            </select>
          </div>
          <button class="btn btn--primary" type="submit">Apply</button>
        </form>
        <ul class="chips" aria-label="Categories">
          <li><a class="chip" href="<?= url('store') ?>" aria-current="true">All</a></li>
          <li><a class="chip" href="<?= url('store?category=[category-1]') ?>">[Category 1]</a></li>
          <li><a class="chip" href="<?= url('store?category=[category-2]') ?>">[Category 2]</a></li>
          <li><a class="chip" href="<?= url('store?category=[category-3]') ?>">[Category 3]</a></li>
        </ul>
      </div>
    </section>

    <!-- PRODUCT GRID: one .product card per item (the PHP stage repeats it from the database).
         Photos: square, 800 x 800. -->
    <section class="section section--products" id="products" aria-labelledby="products-title">
      <div class="column stack stack--loose">
        <h2 id="products-title" class="visually-hidden">Products</h2>
        <div class="grid grid--narrow">
    <article class="card product">
      <a href="#product-detail" tabindex="-1" aria-hidden="true">
        <figure class="figure figure--square">
          <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
        </figure>
      </a>
      <span class="badge">New</span>
      <h3 class="card__title"><a href="#product-detail">[Product name 1]</a></h3>
      <p class="price"><span class="price__now">[$00.00]</span></p>
      <form class="product__buy" action="php/cart.php" method="post">
        <input type="hidden" name="product_id" value="[SKU-001]">
        <button class="btn btn--primary" type="submit">Add to cart<span class="visually-hidden">: [Product name 1]</span></button>
      </form>
    </article>
    <article class="card product">
      <a href="#product-detail" tabindex="-1" aria-hidden="true">
        <figure class="figure figure--square">
          <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
        </figure>
      </a>
      <h3 class="card__title"><a href="#product-detail">[Product name 2]</a></h3>
      <p class="price"><span class="price__now">[$00.00]</span></p>
      <form class="product__buy" action="php/cart.php" method="post">
        <input type="hidden" name="product_id" value="[SKU-002]">
        <button class="btn btn--primary" type="submit">Add to cart<span class="visually-hidden">: [Product name 2]</span></button>
      </form>
    </article>
    <article class="card product">
      <a href="#product-detail" tabindex="-1" aria-hidden="true">
        <figure class="figure figure--square">
          <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
        </figure>
      </a>
      <span class="badge badge--sale">Sale</span>
      <h3 class="card__title"><a href="#product-detail">[Product name 3]</a></h3>
      <p class="price"><span class="price__was"><span class="visually-hidden">Was </span>[$00.00]</span> <span class="price__now">[$00.00]</span></p>
      <form class="product__buy" action="php/cart.php" method="post">
        <input type="hidden" name="product_id" value="[SKU-003]">
        <button class="btn btn--primary" type="submit">Add to cart<span class="visually-hidden">: [Product name 3]</span></button>
      </form>
    </article>
    <article class="card product">
      <a href="#product-detail" tabindex="-1" aria-hidden="true">
        <figure class="figure figure--square">
          <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
        </figure>
      </a>
      <h3 class="card__title"><a href="#product-detail">[Product name 4]</a></h3>
      <p class="price"><span class="price__now">[$00.00]</span></p>
      <form class="product__buy" action="php/cart.php" method="post">
        <input type="hidden" name="product_id" value="[SKU-004]">
        <button class="btn btn--primary" type="submit">Add to cart<span class="visually-hidden">: [Product name 4]</span></button>
      </form>
    </article>
    <article class="card product">
      <a href="#product-detail" tabindex="-1" aria-hidden="true">
        <figure class="figure figure--square">
          <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
        </figure>
      </a>
      <h3 class="card__title"><a href="#product-detail">[Product name 5]</a></h3>
      <p class="price"><span class="price__now">[$00.00]</span></p>
      <form class="product__buy" action="php/cart.php" method="post">
        <input type="hidden" name="product_id" value="[SKU-005]">
        <button class="btn btn--primary" type="submit">Add to cart<span class="visually-hidden">: [Product name 5]</span></button>
      </form>
    </article>
    <article class="card product">
      <a href="#product-detail" tabindex="-1" aria-hidden="true">
        <figure class="figure figure--square">
          <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
        </figure>
      </a>
      <h3 class="card__title"><a href="#product-detail">[Product name 6]</a></h3>
      <p class="price"><span class="price__now">[$00.00]</span></p>
      <form class="product__buy" action="php/cart.php" method="post">
        <input type="hidden" name="product_id" value="[SKU-006]">
        <button class="btn btn--primary" type="submit">Add to cart<span class="visually-hidden">: [Product name 6]</span></button>
      </form>
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

    <!-- PRODUCT PAGE PATTERN: photos on the left, details and buy box on the right.
         Main photo 1200 x 1200; thumbnails 800 x 800. -->
    <section class="section section--alt section--product-detail" id="product-detail" aria-labelledby="product-title">
      <div class="column halves halves--top">

        <div class="stack">
          <figure class="figure figure--square">
  <span class="figure__placeholder" data-size="1200 × 1200">IMAGE</span>
</figure>
          <ul class="thumbs" aria-label="More photos">
            <li><figure class="figure figure--square">
  <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
</figure></li>
            <li><figure class="figure figure--square">
  <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
</figure></li>
            <li><figure class="figure figure--square">
  <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
</figure></li>
            <li><figure class="figure figure--square">
  <span class="figure__placeholder" data-size="800 × 800">IMAGE</span>
</figure></li>
          </ul>
        </div>

        <div class="stack">
          <span class="badge badge--success">In stock</span>
          <h2 id="product-title">[Product name]</h2>
          <p class="price"><span class="price__now">[$00.00]</span></p>
          <p>[Two or three sentences: what it is, who it is for, why it is good.]</p>
          <form class="form" action="php/cart.php" method="post" data-js="form">
            <input type="hidden" name="product_id" value="[SKU-000]">
            <div class="form__field">
              <label class="form__label form__label--required" for="pd-option">[Option: size, color...]</label>
              <select class="form__control" id="pd-option" name="option" required data-error="Please choose an option.">
                <option value="">Choose one&hellip;</option>
                <option value="[option-1]">[Option 1]</option>
                <option value="[option-2]">[Option 2]</option>
              </select>
            </div>
            <div class="form__field">
              <label class="form__label form__label--required" for="pd-qty">Quantity</label>
              <input class="form__control" id="pd-qty" name="quantity" type="number" min="1" max="10" value="1" required>
            </div>
            <div class="visually-hidden" aria-hidden="true">
              <label>Leave this field empty <input name="website" type="text" tabindex="-1" autocomplete="off"></label>
            </div>
            <div class="form__status" role="status" data-js="form-status" hidden></div>
            <div class="form__actions">
              <button class="btn btn--primary" type="submit" data-loading-label="Adding&hellip;">Add to cart</button>
            </div>
          </form>
          <ul class="list">
            <li>[Detail: material, size, weight]</li>
            <li>[Detail: what is in the box]</li>
            <li>[Detail: care or warranty]</li>
          </ul>
        </div>

      </div>
    </section>

    <!-- CART SUMMARY PATTERN (switch: store.cart)
         BACKEND: rows come from the cart in the PHP stage; "Checkout" goes to php/checkout.php. -->
    <section class="section section--cart" id="cart" data-feature="store.cart" aria-labelledby="cart-title">
      <div class="column stack">
        <h2 id="cart-title">Your cart</h2>
        <div class="table-wrap" tabindex="0" role="region" aria-label="Cart items">
          <table class="table">
            <thead>
              <tr><th scope="col">Product</th><th scope="col" class="table__num">Price</th><th scope="col" class="table__num">Qty</th><th scope="col" class="table__num">Total</th></tr>
            </thead>
            <tbody>
              <tr><th scope="row">[Product name 1]</th><td class="table__num">[$00.00]</td><td class="table__num">1</td><td class="table__num">[$00.00]</td></tr>
              <tr><th scope="row">[Product name 2]</th><td class="table__num">[$00.00]</td><td class="table__num">2</td><td class="table__num">[$00.00]</td></tr>
            </tbody>
          </table>
        </div>
        <div class="halves halves--top">
          <p>[Short note: delivery times, returns, accepted payment methods.]</p>
          <div class="stack">
            <dl class="card summary">
              <div class="summary__row"><dt>Subtotal</dt><dd>[$00.00]</dd></div>
              <div class="summary__row"><dt>Shipping</dt><dd>[$00.00]</dd></div>
              <div class="summary__row summary__row--total"><dt>Total</dt><dd>[$00.00]</dd></div>
            </dl>
            <a class="btn btn--primary" href="php/checkout.php">Checkout</a>
          </div>
        </div>
      </div>
    </section>

    <!-- TRUST CARDS (switch: store.trust): reassurance before buying -->
    <section class="section section--alt section--trust" id="trust" data-feature="store.trust" aria-labelledby="trust-title">
      <div class="column stack">
        <h2 id="trust-title">[Why buy from us]</h2>
        <div class="grid">
          <div class="card"><h3 class="card__title">[Delivery]</h3><p>[One sentence.]</p></div>
          <div class="card"><h3 class="card__title">[Returns]</h3><p>[One sentence.]</p></div>
          <div class="card"><h3 class="card__title">[Secure payment]</h3><p>[One sentence.]</p></div>
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
