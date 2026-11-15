<?php
/* FOOTER — logo, sitemap, company details, social icons, legal line. All from config/site.php. */
$current = $page['id'] ?? '';
$co = config('company', []);
?>
  <footer class="section section--footer">
    <div class="column stack">

      <div class="thirds thirds--stack">

        <?= render_logo() ?>

        <nav class="sitemap" aria-label="Sitemap">
          <?= render_sitemap(config('menu', []), $current) ?>
        </nav>

        <div class="company stack">
          <address class="company__info">
            <span class="company__name"><?= e($co['name'] ?? '') ?></span><br>
            <?= e($co['address'] ?? '') ?><br>
            <a href="tel:<?= e(preg_replace('/[^0-9+]/', '', (string) ($co['phone'] ?? ''))) ?>"><?= e($co['phone'] ?? '') ?></a><br>
            <a href="mailto:<?= e($co['email'] ?? '') ?>"><?= e($co['email'] ?? '') ?></a>
          </address>
          <?= render_social(config('social', []), true) ?>
        </div>

      </div>

      <p class="legal">&copy; <span data-js="year"><?= e(date('Y')) ?></span> <?= e(config('site_name')) ?>. All rights reserved.<?php foreach (config('legal', []) as $l): ?> &middot; <a href="<?= e(url((string) $l['href'])) ?>"><?= e($l['label']) ?></a><?php endforeach; ?><?php if (analytics_enabled()): ?> &middot; <button class="consent-link" type="button" data-js="consent-open">Cookie settings</button><?php endif; ?></p>

    </div>
  </footer>
