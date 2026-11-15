<?php
declare(strict_types=1);

/* Pieces of page markup built from config: menu, social icons, footer sitemap.
   The markup is identical to the static HTML templates, so the same CSS and JS apply. */

function page_base(string $href): string
{
    $p = strpos($href, '#');
    return $p === false ? $href : substr($href, 0, $p);
}

/** Is this menu link the page being viewed? (links with #anchors never count) */
function menu_is_current(string $href, string $current): bool
{
    return strpos($href, '#') === false && $href === $current;
}

function menu_slug(string $label): string
{
    return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($label)), '-');
}

function render_menu(array $menu, string $current): string
{
    $out = '<ul class="nav__list" id="nav-list" data-js="nav-list">' . "\n";
    foreach ($menu as $item) {
        $href = (string) $item['href'];
        $kids = $item['children'] ?? [];
        if (!$kids) {
            $cur = menu_is_current($href, $current) ? ' aria-current="page"' : '';
            $out .= '  <li class="nav__item"><a class="nav__link" href="' . e(url($href)) . '"' . $cur . '>' . e($item['label']) . "</a></li>\n";
            continue;
        }
        $id = 'sub-' . menu_slug((string) $item['label']);
        $branch = false;
        $sub = '';
        foreach ($kids as $kid) {
            $isCur = menu_is_current((string) $kid['href'], $current);
            $branch = $branch || $isCur;
            $sub .= '      <li><a class="nav__link" href="' . e(url((string) $kid['href'])) . '"' . ($isCur ? ' aria-current="page"' : '') . '>' . e($kid['label']) . "</a></li>\n";
        }
        $parentCur = menu_is_current($href, $current) ? ' aria-current="page"' : ($branch ? ' aria-current="true"' : '');
        $out .= '  <li class="nav__item nav__item--has-sub">' . "\n"
              . '    <a class="nav__link" href="' . e(url($href)) . '"' . $parentCur . '>' . e($item['label']) . "</a>\n"
              . '    <button class="nav__sub-toggle" type="button" aria-expanded="false" aria-controls="' . e($id) . '" data-js="sub-toggle">'
              . '<span class="visually-hidden">Show ' . e($item['label']) . " submenu</span></button>\n"
              . '    <ul class="nav__sub" id="' . e($id) . '">' . "\n" . $sub . "    </ul>\n  </li>\n";
    }
    return $out . '</ul>';
}

/** Footer sitemap: every menu link once, flat. */
function render_sitemap(array $menu, string $current): string
{
    $seen = [];
    $out  = '<ul class="sitemap__list" data-js="sitemap-list">' . "\n";
    $add = function (array $item) use (&$out, &$seen, $current) {
        $href = (string) $item['href'];
        if (($item['footer'] ?? true) === false || isset($seen[$href])) {
            return;
        }
        $seen[$href] = true;
        $cur = menu_is_current($href, $current) ? ' aria-current="page"' : '';
        $out .= '  <li><a class="sitemap__link" href="' . e(url($href)) . '"' . $cur . '>' . e($item['label']) . "</a></li>\n";
    };
    foreach ($menu as $item) {
        $add($item);
        foreach ($item['children'] ?? [] as $kid) {
            $add($kid);
        }
    }
    return $out . '</ul>';
}

function social_icon_paths(string $network): string
{
    switch ($network) {
        case 'facebook':
            return '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>';
        case 'instagram':
            return '<rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>';
        case 'linkedin':
            return '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>';
    }
    return '';
}

function render_social(array $social, bool $small = false): string
{
    $items = '';
    foreach ($social as $network => $link) {
        $paths = social_icon_paths((string) $network);
        if ($paths === '' || trim((string) $link) === '') {
            continue;
        }
        $items .= '  <li><a class="social__link" href="' . e($link) . '" aria-label="' . e(ucfirst((string) $network)) . '">'
                . '<svg class="social__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'
                . $paths . "</svg></a></li>\n";
    }
    if ($items === '') {
        return '';
    }
    return '<ul class="social' . ($small ? ' social--small' : '') . '" aria-label="Social media">' . "\n" . $items . '</ul>';
}

/** Logo link: real image if config logo.src is set, otherwise the LOGO placeholder. */
function render_logo(): string
{
    $logo = config('logo', []);
    $inner = !empty($logo['src'])
        ? '<img src="' . e($logo['src']) . '" alt="' . e($logo['alt'] ?? '') . '" width="' . (int) ($logo['width'] ?? 160) . '" height="' . (int) ($logo['height'] ?? 48) . '">'
        : '<span class="logo__placeholder">LOGO</span>';
    return '<a class="logo" href="' . e(url('index')) . '" aria-label="' . e(config('site_name')) . ' home">' . $inner . '</a>';
}
