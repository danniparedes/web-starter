<?php
/* COOKIE BANNER — shown only when config/site.php > analytics has an ID.
   Hidden until js/main.js (initConsent) decides: first visit = show; saved choice = stay hidden.
   Accept starts the tools; Reject loads nothing. "Cookie settings" in the footer reopens it. */
if (!analytics_enabled()) {
    return;
}
$ids   = analytics_ids();
$tools = [];
if ($ids['ga4'] !== '') {
    $tools[] = 'Google Analytics to understand how visitors use this site';
}
if ($ids['meta_pixel'] !== '') {
    $tools[] = 'the Meta (Facebook) Pixel to measure our advertising';
}
?>
  <section class="consent" data-js="consent" role="region" aria-label="Cookie choices" hidden>
    <p class="consent__text">
      With your permission we use <?= e(implode(' and ', $tools)) ?>. Nothing starts unless you accept.
<?php if (is_file(SITE_ROOT . '/pages/privacy.php')): ?>
      <a href="<?= e(url('privacy')) ?>">Privacy policy</a>
<?php endif; ?>
    </p>
    <div class="consent__actions">
      <button class="btn btn--primary" type="button" data-js="consent-accept">Accept</button>
      <button class="btn btn--outline" type="button" data-js="consent-reject">Reject</button>
    </div>
  </section>
