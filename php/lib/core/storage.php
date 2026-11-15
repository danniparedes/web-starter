<?php
declare(strict_types=1);

/* Files the site writes: submissions, subscribers, logs, rate-limit counters.
   Everything lives in the storage/ folder, which the web server must not serve. */

function storage_path(string $relative = ''): string
{
    $base = rtrim((string) config('storage_dir'), '/\\');
    $path = $relative === '' ? $base : $base . '/' . ltrim($relative, '/');
    $dir  = ($relative === '' || substr($relative, -1) === '/') ? $path : dirname($path);
    if (!is_dir($dir)) {
        @mkdir($dir, 0750, true);
    }
    return $path;
}

/** Add one line of JSON to a file (safe when two visitors write at the same time). */
function append_jsonl(string $relative, array $row): bool
{
    $line = json_encode($row, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n";
    return file_put_contents(storage_path($relative), $line, FILE_APPEND | LOCK_EX) !== false;
}

/** Delete counters not touched for a day: they hold only a hash and timestamps, and should not pile up. */
function rate_limit_cleanup(): void
{
    foreach (glob(storage_path('ratelimit/') . '*.json') ?: [] as $file) {
        if ((int) @filemtime($file) < time() - 86400) {
            @unlink($file);
        }
    }
}

/** Returns true if this visitor may submit this form now; records the attempt. */
function rate_limit_ok(string $form): bool
{
    rate_limit_cleanup();
    $max    = (int) config('security.rate_max', 5);
    $window = (int) config('security.rate_window', 600);
    $file   = storage_path('ratelimit/' . preg_replace('/[^a-z0-9_-]/i', '', $form) . '-' . visitor_hash() . '.json');

    $fh = @fopen($file, 'c+');
    if (!$fh) {
        return true;                       // cannot count: do not block real visitors
    }
    flock($fh, LOCK_EX);
    $times = json_decode((string) stream_get_contents($fh), true);
    $now   = time();
    $times = array_values(array_filter(is_array($times) ? $times : [], fn($t) => $t > $now - $window));
    $ok    = count($times) < $max;
    if ($ok) {
        $times[] = $now;
    }
    ftruncate($fh, 0);
    rewind($fh);
    fwrite($fh, json_encode($times));
    flock($fh, LOCK_UN);
    fclose($fh);
    return $ok;
}
