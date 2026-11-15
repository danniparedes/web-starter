# Hosting profiles

What changes from one host to another, and what to do about it. Read this at Launch Guide Step 0 (ask the client which host they use) and again at Steps 6 and 7.

> Plain English: our site needs the server to do three things. (1) Run PHP. (2) Keep private folders private. (3) Optionally, show clean addresses like `/contact`. On Apache the file `.htaccess` does (2) and (3). Other servers ignore that file, so the same rules must be written in the server's own settings.

**Status: nothing in this document has been tested on a real host yet.** The nginx and IIS parts are written from public documentation (sources at the end). Test each one on the first real client and record the result in section 6.

## 1. The safe default

- Keep `'routing' => 'query'` in `config/site.php` (addresses look like `?p=contact`). It needs no rewrite rules and works on every PHP host.
- Switch to `'pretty'` only after the host passes the Step 7 check.
- The private-folder protection is **not optional**. Step 6 of the Launch Guide tests it on every host.

## 2. Find out the host type

Ask the client or look at the host's panel:

| You see | Likely profile |
|---|---|
| cPanel, shared hosting | Apache or LiteSpeed: section 3 |
| VPS or "server with root access", no panel | Often nginx: section 4 |
| Windows hosting | IIS: section 5 |
| Not sure | Upload the site, run Launch Guide Step 6. If the private URLs open, it is not honoring `.htaccess` |

## 3. Apache and LiteSpeed (cPanel and similar)

Use the project `.htaccess` files as they are. Nothing to change.

- LiteSpeed reads `.htaccess` files and supports the standard rewrite rules (stated by hosts that run it, for example Kualo; see sources). It is not identical to Apache in every detail, so still run Steps 6 and 7.
- **OpenLiteSpeed** (common on VPS panels) is different: its own FAQ says it understands rewrite rules but does not read `.htaccess` files by default. Treat it like nginx for the private folders (section 4, the `deny` lines) and paste the rewrite rules from the root `.htaccess` into the panel's Rewrite settings, or stay on `'query'`.
- Site in a subfolder (`clientdomain.com/site/`): `'pretty'` will probably need `RewriteBase /site/` under `RewriteEngine On` in the root `.htaccess`. Not tested. Prefer a subdomain, or stay on `'query'`.
- Things that depend on the host, not on our files: PHP version (choose 8 or newer in the panel), the PHP upload limit (the contact form accepts attachments), and a free SSL certificate (turn on HTTPS before launch).
- Optional HTTPS redirect, only if the host does not offer one: add these lines under `RewriteEngine On` in the root `.htaccess` after you confirm HTTPS works.

```apache
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## 4. nginx (usually a VPS)

nginx ignores every `.htaccess` file, so the folder protection disappears. This server block replaces them. Change `server_name`, `root` and the PHP socket path (the path depends on the PHP version installed). It is a starting point: have the host check it, then run Launch Guide Steps 6 and 7.

```nginx
server {
    listen 80;
    server_name clientdomain.com;
    root /var/www/clientdomain;
    index index.php index.html;

    # Private folders (replaces the .htaccess files)
    location ~ ^/(config|pages|partials|storage)/ { deny all; }
    location ~ ^/php/(lib|vendor)/              { deny all; }
    location = /php/bootstrap.php                { deny all; }
    location ~ /\.                               { deny all; }
    location ~* (site\.local\.php|\.log|\.jsonl|\.csv)$ { deny all; }

    # Generated robots.txt and sitemap.xml (a real file with the same name wins)
    location = /robots.txt  { try_files $uri /php/handlers/robots.php; }
    location = /sitemap.xml { try_files $uri /php/handlers/sitemap.php; }

    # Clean addresses: /contact -> index.php?p=contact (only needed for 'pretty')
    location ~ ^/([a-z0-9-]+)$ {
        try_files $uri $uri/ /index.php?p=$1&$args;
    }

    # Front controller
    location = /index.php {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
    }

    # Form handlers and the robots/sitemap scripts: the only other PHP files visitors may reach
    location ~ ^/php/handlers/[a-z]+\.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
    }

    # Any other .php file: refuse
    location ~ \.php$ { return 404; }

    # Contact form attachments: raise if the client needs larger files
    client_max_body_size 10m;
}
```

Notes:
- The "any other .php file: refuse" rule follows the common pattern from nginx PHP-FPM guides (only run PHP files you meant to expose).
- The rules for the private folders must stay **above** the PHP rules.
- With this block, `'query'` routing works too, because `/index.php?p=contact` goes to the front controller.
- `client_max_body_size 10m` is an example value, not a recommendation: match it to the upload limit chosen in `config/site.php` and the PHP settings.

## 5. IIS (Windows hosting)

We do not ship a `web.config`, because the site has not been tried on IIS. If a client is on IIS:
1. Stay on `'query'` routing.
2. Ask the host to block the private folders (`config`, `pages`, `partials`, `storage`, `php/lib`, `php/vendor`, and the files named in the root `.htaccess`). Run Launch Guide Step 6 to confirm.
3. If the client wants clean addresses, install Microsoft's URL Rewrite module. It can import Apache rewrite rules from the root `.htaccess` (Microsoft documents this) and turn them into IIS rules. Review and test the result.

## 6. Record per client

After each launch, add one line to the client's notes (or the project README):

```
Host: [name]  |  Type: [Apache / LiteSpeed / OpenLiteSpeed / nginx / IIS]  |  PHP: [version]
Private folders blocked: [yes/no]  |  Pretty URLs: [works / not tested / failed]
robots.txt and sitemap.xml: [generated / real files]  |  Mail driver that worked: [mail / phpmailer]
```

A host that worked once will probably work for the next client on the same plan. Still run Steps 6 and 7.

## Sources (checked 2026-11-13)

- nginx with PHP-FPM, front controller and "only run the files you mean to run": https://nginx-wiki.getpagespeed.com/config/recipes/php-fpm/
- nginx `try_files` front-controller pattern: https://linuxcapable.com/nginx-try-files-directive-explained/
- LiteSpeed and `.htaccess` rewrite support, as described by one host: https://www.kualo.com/knowledgebase/cpanel-php/how-can-i-enable-modrewrite
- OpenLiteSpeed rewrite rules and no `RewriteBase`: https://docs.openlitespeed.org/config/rewriterules/
- OpenLiteSpeed FAQ (does not read `.htaccess` files): https://openlitespeed.org/?p=1039
- IIS importing Apache rewrite rules: https://learn.microsoft.com/en-GB/iis/extensions/url-rewrite-module/importing-apache-modrewrite-rules
