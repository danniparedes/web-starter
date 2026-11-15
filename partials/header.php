<?php
/* HEADER — skip link + site header. Menu, logo and social icons come from config/site.php. */
$current = $page['id'] ?? '';
?>
  <a class="skip-link" href="#main">Skip to main content</a>

  <header class="section section--header">
    <div class="column thirds">

      <?= render_logo() ?>

      <nav class="nav" aria-label="Main">
        <button class="nav__toggle" type="button"
                aria-expanded="false" aria-controls="nav-list"
                data-js="nav-toggle">Menu</button>
        <?= render_menu(config('menu', []), $current) ?>
      </nav>

      <?= render_social(config('social', [])) ?>

    </div>
  </header>
