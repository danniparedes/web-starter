<?php
/* DEV ONLY. Lets PHP's built-in server behave like the real site (clean URLs, blocked folders):
     php -S localhost:8000 tools/dev-router.php
   Run it from the project folder. Not used on a real server. */
$root = dirname(__DIR__);
$path = rawurldecode((string) parse_url((string) $_SERVER['REQUEST_URI'], PHP_URL_PATH));

foreach (['/config', '/storage', '/partials', '/pages', '/php/lib', '/php/vendor', '/tools'] as $blocked) {
    if ($path === $blocked || strpos($path, $blocked . '/') === 0) {
        http_response_code(403);
        echo 'Forbidden';
        return true;
    }
}
if ($path === '/php/bootstrap.php') {   // same as the root .htaccess rule
    http_response_code(403);
    echo 'Forbidden';
    return true;
}
$generated = ['/robots.txt' => 'robots', '/sitemap.xml' => 'sitemap'];   // same as the .htaccess rules
if (isset($generated[$path]) && !is_file($root . $path)) {
    chdir($root);
    require $root . '/php/handlers/' . $generated[$path] . '.php';
    return true;
}
if ($path !== '/' && is_file($root . $path)) {
    return false;                                   // real file (css, js, image, php handler): serve it
}
if ($path === '/' || preg_match('#^/([a-z0-9-]+)/?$#', $path, $m)) {
    if ($path !== '/') {
        $_GET['p'] = $m[1];
    }
    chdir($root);
    require $root . '/index.php';
    return true;
}
http_response_code(404);
echo 'Not found';
return true;
