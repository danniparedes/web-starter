<?php
/* sitemap.xml, built from the menu and legal links in config/site.php. Reached as /sitemap.xml (see .htaccess).
   Left out: menu items with 'footer' => false (the Library group), and any page not in the menu or legal list.
   Blog posts and other extra pages: add them to a real sitemap.xml file in the root (the file wins). */
define('SITE_NO_SESSION', true);
require dirname(__DIR__) . '/bootstrap.php';

$seo  = config('seo', []);
$site = rtrim((string) ($seo['site_url'] ?? ''), '/');

if ($site === '' || ($seo['indexable'] ?? true) === false) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo "No sitemap: set seo.site_url in config/site.php and leave seo.indexable on true.\n";
    return;
}

$pages = [];
$add = function (array $item) use (&$pages): void {
    $href = page_base((string) ($item['href'] ?? ''));
    if ($href === '' || ($item['footer'] ?? true) === false || preg_match('#^([a-z][a-z0-9+.-]*:|//|/)#i', $href)) {
        return;
    }
    $pages[$href] = true;
};
foreach (config('menu', []) as $item) {
    $add($item);
    foreach ($item['children'] ?? [] as $kid) {
        $add($kid);
    }
}
foreach (config('legal', []) as $item) {
    $add($item);
}

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach (array_keys($pages) as $name) {
    echo '  <url><loc>' . htmlspecialchars($site . url($name), ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</loc></url>\n";
}
echo "</urlset>\n";
