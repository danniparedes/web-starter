<?php
/* ==========================================================================
   FRONT CONTROLLER — every page of the site comes through this file.
   /            -> pages/index.php
   /contact     -> pages/contact.php      (routing 'pretty', via .htaccess)
   index.php?p=contact -> pages/contact.php   (routing 'query', works anywhere)
   Add a page: put NAME.php in pages/ (copy pages/contact.php) and link it with url('NAME').
   ========================================================================== */
require_once __DIR__ . '/php/bootstrap.php';

$name = $_GET['p'] ?? 'index';
if (!is_string($name) || !preg_match('/^[a-z0-9-]{1,60}$/', $name) || !is_file(SITE_ROOT . '/pages/' . $name . '.php')) {
    http_response_code(404);
    $name = '404';
}
require SITE_ROOT . '/pages/' . $name . '.php';
