<?php
declare(strict_types=1);

/* Small helpers used everywhere. */

/** Escape text for HTML. Use on EVERYTHING that is printed from data. */
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Read a setting: config('mail.to'). Top-level keys only for names that contain dots (features). */
function config(?string $path = null, $default = null)
{
    static $cfg = null;
    if ($cfg === null) {
        $cfg = require SITE_ROOT . '/config/site.php';
        $local = SITE_ROOT . '/config/site.local.php';
        if (is_file($local)) {
            $cfg = array_replace_recursive($cfg, require $local);
        }
    }
    if ($path === null) {
        return $cfg;
    }
    $cur = $cfg;
    foreach (explode('.', $path) as $key) {
        if (!is_array($cur) || !array_key_exists($key, $cur)) {
            return $default;
        }
        $cur = $cur[$key];
    }
    return $cur;
}

/** Analytics IDs from config, checked for shape (anything else is dropped). Both empty = no tracking, no banner. */
function analytics_ids(): array
{
    $an    = config('analytics', []);
    $ga4   = (string) ($an['ga4'] ?? '');
    $pixel = (string) ($an['meta_pixel'] ?? '');
    return [
        'ga4'        => preg_match('/^G-[A-Z0-9]{4,20}$/', $ga4) ? $ga4 : '',
        'meta_pixel' => preg_match('/^[0-9]{5,20}$/', $pixel) ? $pixel : '',
    ];
}

function analytics_enabled(): bool
{
    $ids = analytics_ids();
    return $ids['ga4'] !== '' || $ids['meta_pixel'] !== '';
}

/** Is a feature switch on? (not listed = on) */
function feature(string $name): bool
{
    $features = config('features', []);
    return ($features[$name] ?? true) !== false;
}

/** Folder the site lives in, as seen from the browser: '' when the site is at the domain root. */
function base_path(): string
{
    static $base = null;
    if ($base === null) {
        $base = config('base_path');
        if ($base === null) {
            $doc  = realpath((string) ($_SERVER['DOCUMENT_ROOT'] ?? ''));
            $root = realpath(SITE_ROOT);
            $base = ($doc && $root && strpos($root, $doc) === 0) ? str_replace('\\', '/', substr($root, strlen($doc))) : '';
        }
        $base = rtrim((string) $base, '/');
    }
    return $base;
}

/** Page name -> link. Same call in every template: url('contact'), url('index#about').
 *  routing 'pretty': /contact      routing 'query': index.php?p=contact (works on any server) */
function url(string $target): string
{
    if ($target === '' || preg_match('#^([a-z][a-z0-9+.-]*:|//|\#|/)#i', $target)) {
        return $target;
    }
    $hash = $query = '';
    if (($p = strpos($target, '#')) !== false) {
        $hash = substr($target, $p);
        $target = substr($target, 0, $p);
    }
    if (($q = strpos($target, '?')) !== false) {
        $query = substr($target, $q + 1);
        $target = substr($target, 0, $q);
    }
    if (config('routing', 'query') === 'pretty') {
        $path = base_path() . '/' . ($target === 'index' ? '' : $target);
        return $path . ($query !== '' ? '?' . $query : '') . $hash;
    }
    $params = ($target === 'index' ? [] : ['p=' . $target]);
    if ($query !== '') {
        $params[] = $query;
    }
    return base_path() . ($params ? '/index.php?' . implode('&', $params) : '/') . $hash;
}

/** File link with a version stamp, so browsers load the new file after an edit. */
function asset(string $path): string
{
    $file = SITE_ROOT . '/' . $path;
    return $path . (is_file($file) ? '?v=' . filemtime($file) : '');
}

function is_https(): bool
{
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['SERVER_PORT'] ?? '') === '443');
}

/** Token that proves a form was loaded from THIS site (stops forged posts). */
function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_check(string $sent): bool
{
    return $sent !== '' && !empty($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $sent);
}

/** Visitor id for rate limiting: a hash, never the raw address. */
function visitor_hash(): string
{
    return hash_hmac('sha256', (string) ($_SERVER['REMOTE_ADDR'] ?? ''), (string) config('security.secret', ''));
}

/** "parent_name" -> "Parent name" */
function field_label(string $name): string
{
    return ucfirst(str_replace('_', ' ', $name));
}
