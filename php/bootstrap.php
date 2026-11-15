<?php
/* ==========================================================================
   BOOTSTRAP — loaded first by every page and every handler.
   Does: sets up errors, loads config and helpers, starts the session.
   ========================================================================== */
declare(strict_types=1);

define('SITE_ROOT', dirname(__DIR__));

require __DIR__ . '/lib/core/helpers.php';
require __DIR__ . '/lib/core/storage.php';
require __DIR__ . '/lib/mail/mailer.php';
require __DIR__ . '/lib/views/view.php';
require __DIR__ . '/lib/forms/respond.php';
require __DIR__ . '/lib/forms/forms.php';

mb_internal_encoding('UTF-8');
ini_set('display_errors', config('debug') ? '1' : '0');
ini_set('log_errors', '1');
ini_set('error_log', storage_path('logs/error.log'));
error_reporting(E_ALL);

// robots.txt and sitemap.xml define SITE_NO_SESSION first: no cookie for crawlers.
if (!defined('SITE_NO_SESSION') && session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'secure'   => is_https(),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}
