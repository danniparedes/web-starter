# Web Starter

Standard skeleton for any client website. Plain HTML, CSS and JavaScript on the front, small PHP on the back (forms, email, shared header and footer). No WordPress, no database, no build step.

## Structure

```
index.php             Front controller: every page of the site comes through here
pages/                One PHP file per page (content only): index, patterns, contact, team,
                      forms, store*, blog, post, admissions, projects, project, about-me,
                      programs, all-pages, privacy, terms, 404
partials/             Shared pieces: head, header, footer, chat bubble, scripts
config/
  site.php            The ONE file you edit per project (name, menu, social, switches, mail, forms, SEO)
  site.local.php      Secrets (copy site.local.example.php). Never shared or committed
css/                  tokens (only place for raw values, dark theme included), base, layout, components, sections
js/                   main.js (behavior), features.js + site-config.js (on/off switches)
php/
  handlers/           Public endpoints: contact, newsletter, admissions, robots, sitemap
  lib/                The engine (core, forms, mail, views). Not served to visitors
  vendor/             Third-party libraries copied in by hand (PHPMailer)
storage/              Saved messages, subscribers, uploads, logs. Not served. Back it up
assets/               img, video, fonts, icons, lottie
templates/            Design-stage copies of the pages (double-click to open; visual reference)
tools/                dev-router.php (local testing only)
docs/                 Conventions, Patterns catalog, Checklist, Media specs
```

*`store` is design only: the cart and checkout are not built. Do not launch it.

## See every page and layout

Open the **Library** menu. **All pages** lists every page of the starter (status, one line each); **Patterns** is the catalog of sections to copy, including the dark theme (`section--dark`), stats card over the hero, editorial rows, tall tiles with a swipe row, timelines, glass form card, numbered FAQ, giant-type hero and floating proof cards. Both are design reference: remove them before launch (Launch Guide, step 9).

## Run it

Install PHP 8 (for example Laragon or XAMPP), then from this folder:

```
php -S localhost:8000 tools/dev-router.php
```

Open http://localhost:8000/. To see the plain design templates, double-click any file in `templates/`.

## New client site

Follow `2026-11-13_Launch-Guide.md` (step 0 discovery, then 10 steps from settings to going live).
For discovery: `2026-11-13_01_Client-Questionnaire_EN.md` (send to the client) and `2026-11-13_02_Design-From-Questionnaire.md` (how to turn answers into design).

## Read first

- `docs/2026-11-12_Conventions.md`: the rules (sections 18 to 21 cover switches, page templates, menu, and the PHP stage including search, sharing and legal)
- `docs/2026-11-12_Patterns.md`: catalog of sections to copy
- `docs/2026-11-12_Checklist.md`: tick before delivery
- `docs/2026-11-13_Hosting-Profiles.md`: what changes per host (Apache, LiteSpeed, nginx, IIS)
- `2026-11-12_Media-Guide.md`: how to make images, video, icons, Lottie
