<?php
/* robots.txt, built from config/site.php > seo. Reached as /robots.txt (see .htaccess).
   indexable false  -> tells search engines to stay out (test / staging copies).
   Put a real robots.txt file in the root if a project needs its own rules: the file wins. */
define('SITE_NO_SESSION', true);
require dirname(__DIR__) . '/bootstrap.php';

header('Content-Type: text/plain; charset=utf-8');
$seo = config('seo', []);

if (($seo['indexable'] ?? true) === false) {
    echo "User-agent: *\nDisallow: /\n";
    return;
}

echo "User-agent: *\n";
echo 'Disallow: ' . base_path() . "/php/\n";

$site = rtrim((string) ($seo['site_url'] ?? ''), '/');
if ($site !== '') {
    echo "\nSitemap: " . $site . base_path() . "/sitemap.xml\n";
}
