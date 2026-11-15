<?php
/* HEAD — everything inside <head>, same on every page.
   Needs $page = ['id' => 'contact', 'title' => 'Contact', 'description' => '...'] */
$seo      = config('seo', []);
$siteUrl  = rtrim((string) ($seo['site_url'] ?? ''), '/');
$noindex  = (($seo['indexable'] ?? true) === false) || !empty($page['noindex']);
$title    = $page['title'] . ' | ' . config('site_name');
$desc     = $page['description'] !== '' ? $page['description'] : config('description');
// Canonical address of this page: only when site_url is set; $page['canonical'] overrides ('' = none).
$canon    = array_key_exists('canonical', $page) ? (string) $page['canonical'] : ($siteUrl !== '' ? $siteUrl . url($page['id']) : '');
if ($noindex) {
    $canon = '';
}
// Share image: $page['image'] overrides the site one. Needs site_url (must be a full address) and the file.
$img      = (string) ($page['image'] ?? ($seo['share_image'] ?? ''));
$imgUrl   = ($img !== '' && $siteUrl !== '' && is_file(SITE_ROOT . '/' . $img)) ? $siteUrl . base_path() . '/' . ltrim($img, '/') : '';
$icon     = function (string $key) use ($seo): string {
    $f = (string) ($seo[$key] ?? '');
    return ($f !== '' && is_file(SITE_ROOT . '/' . $f)) ? $f : '';
};
$favicon  = $icon('favicon');
$touch    = $icon('apple_touch');
$iconType = ['svg' => 'image/svg+xml', 'png' => 'image/png', 'ico' => 'image/x-icon', 'jpg' => 'image/jpeg'];
?>
<!DOCTYPE html>
<html lang="<?= e(config('lang', 'en')) ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($title) ?></title>
  <meta name="description" content="<?= e($desc) ?>">
<?php if ($noindex): ?>
  <meta name="robots" content="noindex, nofollow">
<?php endif; ?>
<?php if ($canon !== ''): ?>
  <link rel="canonical" href="<?= e($canon) ?>">
<?php endif; ?>
<?php if ($favicon !== ''): ?>
  <link rel="icon" type="<?= e($iconType[strtolower(pathinfo($favicon, PATHINFO_EXTENSION))] ?? 'image/png') ?>" href="<?= e(asset($favicon)) ?>">
<?php endif; ?>
<?php if ($touch !== ''): ?>
  <link rel="apple-touch-icon" sizes="180x180" href="<?= e(asset($touch)) ?>">
<?php endif; ?>

  <!-- Link preview (WhatsApp, Facebook, LinkedIn) -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e(config('site_name')) ?>">
  <meta property="og:title" content="<?= e($title) ?>">
  <meta property="og:description" content="<?= e($desc) ?>">
<?php if ($canon !== ''): ?>
  <meta property="og:url" content="<?= e($canon) ?>">
<?php endif; ?>
<?php if ($imgUrl !== ''): ?>
  <meta property="og:image" content="<?= e($imgUrl) ?>">
<?php endif; ?>
  <meta name="twitter:card" content="<?= $imgUrl !== '' ? 'summary_large_image' : 'summary' ?>">

  <link rel="stylesheet" href="<?= e(asset('css/tokens.css')) ?>">
  <link rel="stylesheet" href="<?= e(asset('css/base.css')) ?>">
  <link rel="stylesheet" href="<?= e(asset('css/layout.css')) ?>">
  <link rel="stylesheet" href="<?= e(asset('css/components.css')) ?>">
  <link rel="stylesheet" href="<?= e(asset('css/sections.css')) ?>">

  <!-- Switches come from config/site.php; js/features.js hides what is off before the page is drawn. -->
  <?php $ids = analytics_ids(); ?>
  <script>window.SITE_CONFIG = { features: <?= json_encode(config('features', []), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>, analytics: <?= json_encode(['ga4' => $ids['ga4'], 'metaPixel' => $ids['meta_pixel']], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?> };</script>
  <script src="<?= e(asset('js/features.js')) ?>"></script>
</head>
