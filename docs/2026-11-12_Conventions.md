# Conventions

The rules behind the starter, and why. If a rule has no reason, it does not belong here.

## 1. Principles

1. **Separation of concerns**: HTML = structure, CSS = looks, JS = behavior. Never mix them (no inline styles, no inline scripts).
2. **One source of truth**: every color, font and spacing value lives in `tokens.css`.
3. **Works without JavaScript**: JS enhances; it is never required to read content or navigate.
4. **Documented by default**: every file and every block starts with a comment saying what it is and when to use it.

## 2. Folder structure

| Folder / file | Holds | Rule |
|---|---|---|
| `index.php` | Front controller: every page comes through it | Do not put page content here |
| `pages/` | One PHP file per page (content only) | Shown through `index.php`, never opened directly |
| `partials/` | head, header, footer, chat bubble, scripts | Same on every page |
| `config/` | `site.php` (per-project settings), `site.local.php` (secrets) | The only files edited per project |
| `templates/` | Design-stage `.html` copies of the pages | Visual reference; open by double-click |
| `css/` | Stylesheets | Load order: tokens, base, layout, components, sections |
| `js/` | Scripts | `main.js` is the entry point; split by behavior when it grows |
| `assets/img`, `assets/video`, `assets/fonts`, `assets/icons`, `assets/lottie` | Static files | Lowercase, hyphenated file names |
| `php/` | `handlers/` (public form endpoints), `lib/` (engine), `vendor/` (libraries) | Never mixed into page markup; pages call it |
| `storage/` | Saved messages, subscribers, uploads, logs | Never served; back it up |
| `tools/` | `dev-router.php` for local testing | Not used on a real server |
| `docs/` | Project documentation | Dated names (see section 8) |

## 3. Naming

- **Files and folders** (code): lowercase, hyphen-separated: `contact-form.js`.
- **CSS classes**: `.component`, `.component__part`, `.component--variant`. Lowercase, hyphenated.
- **Sections**: `section--<content>` names a section by what it holds (`section--hero`, `section--about`). Style variants stay separate (`section--alt`).
- **IDs**: only for in-page anchors and ARIA links (`#about`, `#main`). Never for styling.
- **JavaScript hooks**: `data-js="name"`. JS never selects by styling class, so a designer can rename classes safely.

## 4. HTML rules

- Start with `<!DOCTYPE html>` and `<html lang="...">`.
- Every page has charset, viewport, `<title>` and meta description.
- One `<h1>` per page; headings go in order (h1, h2, h3), never skipping for looks.
- Use landmarks: `<header>`, `<nav>`, `<main>`, `<footer>`. Exactly one `<main>`.
- One `<section>` per content block, with an `id` and an `aria-labelledby` pointing to its heading.
- **Every section has two layers**: `<section class="section section--NAME">` (full-width band) containing `<div class="column">` (centered content). The header and footer reuse `.column` for the same width.
  - `.section` owns background and top/bottom padding (`--section-padding-block`).
  - `.column` owns max width, centering and side padding (`--column-max`, `--column-padding-inline`).
  - To tune one section, override those variables on its `section--NAME` class; never edit `.section` or `.column` for a single page block.
  - *Why*: content, background and spacing can change independently, and every section can be targeted by its content name.
- Every `<img>` has `alt` (empty `alt=""` if purely decorative).
- Skip link is the first focusable element.
- **Header and footer are sections too**: `<header class="section section--header">` and `<footer class="section section--footer">`, each with a `.column` inside. The header column uses `.thirds`: logo (left), navigation (middle), social icons (right). The footer column uses `.thirds` too: logo (left), sitemap (middle), company info (right, in two rows: details, then small social icons), followed by a legal line. Header and footer are repeated in every page's HTML; keep them identical.
- **Layouts inside a column**: `.thirds` (three parts: header, footer), `.halves` (two parts: image + text), `.grid` (repeating cards). Rows inside a column use `.stack stack--loose`; a row that is itself two parts uses `.halves` (`halves--top` for text-only halves). To invert the two halves, swap the two children in the HTML; there is no CSS reordering, so reading order and screen order always match.
- The logo sits upper left in the header, inside a link to the home page. Until the real file exists, `.logo__placeholder` holds the spot; the real `<img>` needs `alt`, `width` and `height`.

## 5. CSS rules

- **Order of files**: `tokens` (values) -> `base` (elements) -> `layout` (arrangement) -> `components` (UI pieces) -> `sections` (styles for one named section). Later files may use earlier ones, never the reverse.
- Raw values (`#hex`, sizes) only in `tokens.css`. Everywhere else: `var(--token)`.
- Size text and spacing in `rem`, not `px`, so user font settings are respected.
- Mobile-first: base styles are for small screens; add `min-width` media queries to enlarge. (Exception: patterns that only collapse when JS is active, see `nav`.)
- Never remove the focus outline without replacing it.
- **Dark theme**: `section--dark` (or `theme-dark` on `<body>`) re-values the color ROLES (`--color-bg`, `--color-text`, `--color-primary`, ...) from the `--dark-*` tokens. Components never carry dark-specific colors; they adapt because they only read the roles. Change the dark look in `tokens.css` and re-check contrast.
- **Spacing**: sections and columns use padding; space between siblings uses `gap` (`.stack`, `.grid`, `.thirds`, `.halves`), so the parent owns the space. Margin is only for centering (`margin-inline: auto`) and small adjustments inside one component.

## 6. JavaScript rules

- Strict mode on. One small function per behavior, all called from `init()`.
- Find elements through `data-js` hooks. Guard against missing elements (`if (!el) return;`).
- Prefer `const`/`let` and modern syntax in new projects; the starter uses `var` only to stay readable for beginners and can be modernized.
- No behavior may be required for content to be visible.

## 7. Comment format

Every file opens with a header block: **What**, **Rule(s)**, **Loaded/Used when**.
Every block inside gets a one-line header with `Use when:` so the file can be scanned quickly.

```css
/* --------------------------------------------------------------------------
   COMPONENT: card
   Use when : a self-contained item inside a .grid.
   Markup   : <article class="card">...</article>
   -------------------------------------------------------------------------- */
```

## 8. Documents and file naming

- **Project docs** use `YYYY-MM-DD_Descriptive Name.ext`, no version words (`v2`, `final`).
- **Code files keep standard names** (`index.html`, `main.js`, `README.md`): browsers, servers and tools depend on them.
- Replaced docs move to `docs/_archive/`; nothing is deleted.

## 9. Background video (hero)

Pattern: `section--media` + `.media-bg` + `<video>`; styles in `layout.css` and `components.css`, behavior in `main.js`.

- **Poster = first frame.** Every background video has a `poster` image: it shows until the video loads, and stays if the video never plays. Export it from the video, e.g. `ffmpeg -i hero.mp4 -frames:v 1 hero-poster.jpg`.
- **Required attributes**: `autoplay muted loop playsinline`. Without `muted` browsers block autoplay; without `playsinline` iPhones open it fullscreen.
- **Two sources**: `.webm` first, `.mp4` second. The browser takes the first it supports.
- **Short, silent, compressed**: a short seamless loop with no audio track; compress it, since it loads on every visit.
- **Decorative**: wrap in `aria-hidden="true"`; the message lives in the text, never in the video.
- **Readable text**: the overlay (`--media-overlay`) darkens the video; light text uses `--color-on-media`. Check contrast over the brightest frame.
- **People control motion**: the pause/play button is the default, and `main.js` skips autoplay for reduced-motion and data-saver users.
- **Client option, no button**: if a client wants plain autoplay + loop, delete the `<button class="media-toggle">` line. Nothing else changes: `main.js` copes with a missing button, and reduced-motion and data-saver visitors still get the poster only. Trade-off: visitors can no longer stop the motion, and WCAG success criterion 2.2.2 (Pause, Stop, Hide, Level A) asks for a way to stop moving content shown alongside other content. Explain this to the client and record their decision in the project README. Source: https://www.w3.org/WAI/WCAG22/Understanding/pause-stop-hide, checked 2026-11-12.
- **Several videos**: every `section--media` (hero, divider...) has its own `<video data-js="bg-video">`, its own poster, and its own pause button inside that section. `main.js` handles all of them.
- **Fallback**: `--color-media-fallback` shows if poster and video are both missing.

## 10. Pages and content rules

- **New page** = copy `pages/patterns.php` (or `templates/patterns.html` in the static stage): banner + sections. Change the `$page` values (title, description), breadcrumb and `h1`, then keep only the sections you need. Add it to the menu in `config/site.php`.
- **Header and footer are identical on every page.** Menu links use full page paths (`index.html#about`, `patterns.html`) so the same block works anywhere. `main.js` (`initCurrentPage`) marks the current page's link with `aria-current="page"`, so nobody edits the menu per page. When the header or footer changes, change it in `index.html` first and copy the block to every other page.
- **Numbers need sources.** Every statistic shows its source and the date it was checked. Unverified: write `[NUMBER NEEDED - source required]`.
- **Testimonials are real**, used with the person's permission. Never invent a quote.
- **Every image has `alt`**; in the gallery the `alt` also names the button for screen readers.
- **Forms**: every control has a visible `<label>`; the hidden spam-trap field stays empty for people; the PHP side rejects submissions where it is filled.

## 11. Growing the project

- **More JS**: split `main.js` into one file per behavior (`js/nav.js`), load each in `index.html`.
- **PHP / database**: put server code in `php/`. Pages talk to it through forms or `fetch()`. Keep credentials in a config file outside the public folder and never commit it.
- **More pages**: copy `index.html`; header, nav and footer stay identical.

## 12. Open decisions (to settle as we learn)

- When to introduce a build step (not needed yet).
- Image optimization and font loading policy.
- Form handling pattern (depends on the PHP stage).

## 13. Responsive rules

- Breakpoints (literal values; CSS cannot read tokens inside `@media`): **48em** for layout collapse (`.thirds`, `.halves`) and **60em** for the menu collapse. Below 48em is "phone". Components add their own steps: **36em** and **64em** (bento), **40em** and **64em** (project grid), **48em** (rows, horizontal timeline, sticky portrait), **64em** (four tiles in the swipe row).
- Mobile first where possible: base styles are the phone layout; `min-width` queries add columns.
- Grid children that hold fixed-width things (logo, images) get `min-width: 0` and `max-width: 100%` so they shrink instead of pushing neighbours out.
- Test at 360, 768, 1024 and 1440 px. Page width must equal viewport width (no horizontal scroll). Visually-hidden fields (honeypot) are not overflow.


## 14. Media, icons and Lottie

- **Sizes** live in `docs/2026-11-12_Media-Specs.md`. Ratio tokens (`--ratio-wide`, `--ratio-banner`, `--ratio-card`, `--ratio-square`, `--ratio-portrait`, `--ratio-project`, `--ratio-tall`) keep CSS and specs in step; placeholders show their size via `data-size`.
- **Video:** master 1920 x 1080 (hero) or 1920 x 800 (divider). Phones get a 1280 MP4 through `data-src-small` (main.js swaps it). Poster = first frame, same size.
- **Images:** always `width`/`height`; `loading="lazy"` except the first screen; WebP with JPG fallback.
- **Icons:** `assets/icons/sprite.svg` is the master (line style, 24 x 24 grid, 1.5 stroke, `currentColor`). Use `<svg class="icon"><use href="#icon-NAME">`. Opened as a plain file, browsers block an external sprite, so paste the sprite block at the top of `<body>` on pages that use icons (as patterns.html does); on a server `href="assets/icons/sprite.svg#icon-NAME"` also works.
- **Lottie:** player is the official `@lottiefiles/dotlottie-wc` (MIT licence, checked 2026-11-12 on its npm/GitHub pages). The old `@dotlottie/player-component` is deprecated; do not use it. Version is pinned in main.js; self-host it for production. Icons play once; loaders loop only while loading; a loop longer than 5 s needs a pause button; reduced motion removes autoplay and loop.
- Sources: https://github.com/LottieFiles/dotlottie-web ; https://www.npmjs.com/package/@lottiefiles/dotlottie-wc (checked 2026-11-12).

## 15. Shared header and footer
- In plain HTML the header and footer are copied into every page and must stay identical (see Checklist).
- Decision (2026-11-13): no sync script. Edit them once through the platform instead: PHP includes (`header.php`, `footer.php`) in the PHP stage, or theme parts / template parts in WordPress.

## 16. Forms
- Start from `pages/forms.php` (the form kit; static copy: `templates/forms.html`): eight optional groups (about you, request, details, preferences, address, attachment, consent, security) plus a newsletter signup. Delete what a project does not need.
- Every control has a visible `<label>`. Required = the `required` attribute + `form__label--required` on the label. No placeholder text as a label.
- Behavior comes from `data-js="form"` (main.js `initForms`): messages under each wrong field, focus on the first one, loading state, success and error message. Without JS the browser's own validation still works.
- Field names are the contract with PHP. Honeypot field is named `website`; the real web address field is `website_url`.
- Real forms never carry `data-demo`. A file field needs `enctype="multipart/form-data"`; size limits are decided per project and enforced on the server.
- Feedback colors (`--color-error`, `--color-success`) keep at least 4.5:1 contrast on their backgrounds (checked 2026-11-13).

## 17. Chat bubble (floating WhatsApp button)
- One `<a class="chat-bubble">` before the scripts on every page; identical everywhere, like header and footer. Pure HTML/CSS, no JavaScript.
- Link format: `https://wa.me/NUMBER?text=ENCODED_MESSAGE`. NUMBER is the full international number, digits only (country code first; no +, brackets, dashes or leading zeros). The message after `text=` is URL-encoded (space = `%20`). The link only opens the chat with the message typed in; nothing is sent until the visitor presses send. Sources: https://bird.com/explained/whatsapp/what-is-a-whatsapp-click-to-chat-link and https://sinch.com/?p=211777 (checked 2026-11-13).
- The icon is our own generic chat icon, not WhatsApp's logo. If a client wants the official badge, take it from Meta's brand resources and check their usage rules first.
- Position is bottom-right; the background-video pause button sits bottom-left so the two never collide. Colors: `--color-chat` (white text on it 5.47:1).
- Other chat tools (live chat, AI chatbot) are a later, separate decision: they load a third-party script and need privacy and consent review.

## 18. Feature switches (show / hide with true or false)
- `js/site-config.js` holds one `true`/`false` per switchable thing (chat bubble, each form group, newsletter band). Edit, save, refresh.
- An element is controlled by `data-feature="NAME"` in the HTML. Switched off: hidden before first paint (no flash) and removed when the page loads, so hidden form fields are never validated or sent.
- Not listed in the config = shown. Without JavaScript everything is shown.
- The content stays in the page source. For anything that must truly disappear, delete it from the HTML.
- Spam trap and hidden fields have no switch on purpose: they must always stay.
- Header, footer and layout pieces are not switched this way (the grid would need its own handling).
- In the PHP / WordPress stage the same switches move server-side (a config array read by the templates), and the HTML is then never sent.

## 19. Page templates: store, blog, post, admissions
- `store.html` (search + sort + category chips, product grid, product page pattern, cart summary, trust cards), `blog.html` (featured post, categories, grid, pagination, newsletter), `post.html` (article header, `.prose` text, author box, related posts), `admissions.html` (welcome, steps, key dates, requirements, tuition, FAQ, inquiry form).
- Every optional section has `data-feature` and a switch in `js/site-config.js` (`store.*`, `post.*`, `admissions.*`, `newsletter`). See section 18.
- Backend contract (PHP stage): store search/sort/chips send GET `q`, `sort`, `category`, `page` to the same page; add-to-cart posts `product_id` (+ `option`, `quantity`) to `php/cart.php`; checkout goes to `php/checkout.php`; admissions form posts to `php/handlers/admissions.php`; newsletter to `php/handlers/newsletter.php`. Lists (products, posts) are repeated from the database; the markup of ONE card is the template.
- Tables always sit in `.table-wrap` (scrolls sideways on phones, never the page). Row headers use `<th scope="row">`.
- Media sizes: product card 800 x 800 (square), product page 1200 x 1200, blog card 1200 x 900, article cover 1280 x 720 (16:9), author 800 x 800.
- Prices, dates and fees in the templates are placeholders. Publish only figures the client confirms in writing.
- Header menu is NOT changed per page template: add links to the menu per project (the footer sitemap lists them all).

## 20. Dropdown menu (submenus)
- A menu item with children is `li.nav__item--has-sub`: parent link + `button.nav__sub-toggle[data-js="sub-toggle"]` + `ul.nav__sub`. Copy the pattern from the header (copy the WHOLE header to every page).
- Desktop (60em and wider): opens on hover, keyboard focus or the arrow button; Escape closes. Phone: the submenu sits indented under its parent and the arrow button opens it. Without JavaScript it still opens on hover/focus (desktop) and is always visible (phone).
- The parent link goes to a real page (never `#`), so it works without JavaScript and for search engines.
- When the current page is inside a submenu, `initCurrentPage` marks the parent link `aria-current="true"` too.
- One level only. Deeper menus are hard to use on phones; reorganize instead.
- Current grouping (About: About us, Team, Admissions; Library: All pages, Patterns, Forms, Store, Work, Project, About me, Programs, Blog post) is a sample: regroup per project. The footer sitemap stays flat.

## 21. PHP stage (no WordPress, no database yet)
**Two kinds of pages.** `templates/*.html` are the design-stage templates (open them by double-click, no server needed; they load CSS/JS from the folders above). `pages/*.php` are the same pages for production: identical content, but header, footer, menu, social icons, company details and chat bubble come from `partials/` and ONE settings file. From now on edit `pages/*.php`; keep `templates/` as the visual reference.

**How pages are served.** Visitors never open `pages/` directly. Everything goes through `index.php` in the root (front controller): `index.php?p=contact` shows `pages/contact.php`; no `p` shows `pages/index.php`; an unknown name shows `pages/404.php`. Links are always written `url('contact')` (the menu in `config/site.php` uses the same names). `config/site.php > routing`: `'query'` = `index.php?p=contact` (default, works on any server); `'pretty'` = `/contact` (needs the `.htaccess` rewrite on Apache, or an equivalent nginx rule; the Apache rules are not tested on a real host yet). **New page:** copy `pages/contact.php` to `pages/NAME.php`, change `$page`, write the content, add it to the menu.

**Run locally with clean URLs:** `php -S localhost:8000 tools/dev-router.php` (from the project folder), then set `'routing' => 'pretty'` in `config/site.local.php`.

**Folders**
| Folder | What | Served to visitors? |
|---|---|---|
| `config/site.php` | Everything you edit per project: name, contact details, logo, menu, social, switches, mail, form rules, search and sharing (`seo`), legal links | No |
| `config/site.local.php` | Secrets (SMTP password, random secret). Copy `site.local.example.php`. Never committed | No |
| `pages/` | One PHP file per page (content only) | No (shown through `index.php`) |
| `partials/` | `head`, `header`, `footer`, `chat-bubble`, `scripts` | No |
| `php/handlers/` | Form handlers (`contact`, `newsletter`, `admissions`): 3 lines each; plus `robots.php` and `sitemap.php` | Yes (they receive the forms; robots and sitemap are reached as `/robots.txt` and `/sitemap.xml`) |
| `php/lib/` | The engine, in subfolders: `core/` (helpers, storage), `forms/` (form engine, answers), `mail/`, `views/` (menu, footer, social) | No |
| `php/vendor/` | Third-party libraries copied in by hand (PHPMailer) | No |
| `storage/` | Saved messages (`submissions/*.jsonl`), subscribers (`newsletter.csv`), uploads, logs | No |
| `tools/` | `dev-router.php`: local testing only | Not needed on a live site |

Full map and the "new form" steps: `php/README.md`.

**New project, in order:** 1) edit `config/site.php` (name, company, menu, social, WhatsApp, switches); 2) copy `config/site.local.example.php` to `site.local.php` and set a long random `security.secret` and the mail settings; 3) set `mail.driver` (`log` = test, writes `storage/logs/mail.log`; `mail` = PHP mail(); `phpmailer` = real SMTP); 4) edit page content; 5) send a test message through each form.

**Form handler rules** (`php/lib/forms/forms.php`, settings in `config/site.php > forms`)
- Field names in the HTML are the contract. Fields listed in `required` are checked on the server; every other field is added to the email automatically, with a readable label (`parent_name` becomes "Parent name").
- Always present in the HTML: honeypot `website` (must stay empty), `csrf_token` (value printed by PHP: `<?= e(csrf_token()) ?>`), `source_page`. On `.php` pages `data-demo` is removed so forms really send.
- Protections: only POST from the same site, CSRF token, spam trap, rate limit per visitor (default 5 per 10 minutes), server-side checks, header-injection cleanup, upload checks by extension AND real file type, files stored outside public reach. Visitor IPs are never stored raw (hash only).
- Newsletter: unique emails in `storage/newsletter.csv`; a repeated email gets the same friendly answer (does not reveal who is subscribed). No confirmation email yet.
- Answers: with JavaScript the message appears inside the form; without JavaScript the visitor gets a small page in the site design.

**Security checklist before going live**
- Hosting differences (Apache, LiteSpeed, nginx, IIS) and an untested nginx starting block: `docs/2026-11-13_Hosting-Profiles.md`.
- Apache: the `.htaccess` files block `config/`, `partials/`, `php/lib/`, `storage/`. On nginx or any server that ignores `.htaccess`, block those folders in the server config, or move `storage/` and `config/` above the public folder and update `storage_dir`.
- Set `debug` to `false`, a real `security.secret`, and a `mail.from` address on the client's own domain.
- HTTPS on (session cookie is marked secure automatically).
- The privacy policy (`pages/privacy.php`) must say that messages and subscribers are stored; the client confirms the final text.
- Decide `uploads.max_bytes` per project and check the server's `upload_max_filesize` / `post_max_size`.
- Back up `storage/` (it is the only place the messages live).

**Real SMTP (driver `phpmailer`):** download PHPMailer from https://github.com/PHPMailer/PHPMailer and copy its `src/` folder to `php/vendor/phpmailer/src/` (files `PHPMailer.php`, `SMTP.php`, `Exception.php`; the library's license is LGPL, keep its license file). Then fill `mail.smtp` in `site.local.php`. Not bundled here because the build environment could not download it.

**Search, sharing and legal (head tags, robots, sitemap, privacy)**
- All settings live in `config/site.php > seo`: `site_url` (full address, no slash at the end), `indexable`, `favicon`, `apple_touch`, `share_image`. Files go in `assets/img/` (`favicon.png` 512 x 512, `apple-touch-icon.png` 180 x 180, `share.jpg` 1200 x 630); a tag whose file is missing is simply left out.
- `partials/head.php` prints, per page: title, description, canonical link, favicon, link-preview tags (Open Graph, so WhatsApp, Facebook and LinkedIn show a title and picture) and `noindex` when needed. A page can override with `$page['description']`, `$page['image']`, `$page['canonical']` (`''` = none) or `$page['noindex'] = true`.
- `indexable => false` on every test or staging copy: adds `noindex` to all pages, and `/robots.txt` says "keep out". Set it back to `true` at launch (Launch Guide step 9).
- Library pages (`all-pages`, `patterns`, `forms`, `store`) and the 404 page are always `noindex`. The sample pages (`projects`, `project`, `about-me`, `programs`, `post`) are left out of the sitemap (`'footer' => false`) but are NOT marked `noindex`: delete the ones a client does not use, and fill in the ones kept.
- `/robots.txt` and `/sitemap.xml` are built by `php/handlers/robots.php` and `sitemap.php` (rewrite rules in the root `.htaccess`, untested on a real host: check on the first one). The sitemap lists the menu pages plus the legal pages, skips items marked `'footer' => false`, and answers 404 until `site_url` is set. A real `robots.txt` or `sitemap.xml` file in the root replaces the generated one (use it for blog posts).
- Legal pages: `pages/privacy.php` and `pages/terms.php` are a **structure only**, not legal advice. The client or their lawyer gives the final text. Replace every `[bracket]`. What the site stores (form messages, newsletter emails, a hashed visitor code for spam protection that is deleted after a day, one technical session cookie) is already written to match the code, so change the text if the code changes. Footer links come from `config/site.php > legal`. They exist only as PHP pages (no `templates/*.html` copy).
- The store is design only (see below): it sits in the menu's Library group, which is removed before launch (with `all-pages`, `patterns` and `forms`).

**Analytics and cookie consent (opt-in)**
- Settings: `config/site.php > analytics` (`ga4` like `G-XXXXXXXX`, `meta_pixel` digits only). Both empty means no banner, no footer link and nothing loaded. An ID in the wrong format is ignored.
- PHP checks the IDs and hands them to `js/main.js` (`window.SITE_CONFIG.analytics`). `initConsent()` shows the banner (`partials/consent.php`) and keeps the choice in the browser (`localStorage`, key `site-consent`). Nothing from Google or Meta loads before Accept. Reject loads nothing.
- Withdrawing consent (footer button "Cookie settings") deletes the analytics cookies and reloads the page.
- `pages/privacy.php` lists the tools in use. If you add another tool, add it to the banner text, the privacy page and `initConsent()`.
- Consent rules differ by country: the client or their lawyer confirms the final wording.

**Client discovery**
- Before design: questionnaire (`2026-11-13_01_Client-Questionnaire_EN.md`), then a one-page brand brief approved by the client (`2026-11-13_02_Design-From-Questionnaire.md`).

**Language:** everything stays in English. `lang` in `config/site.php` only sets the page language tag.

**In the PHP stage:** where sections 10 to 15 say to edit `index.html` or copy a block to every page, edit `partials/` (shared parts) and `config/site.php` (menu and settings) instead.

**Run locally:** install PHP 8 (for example Laragon or XAMPP on Windows) and run `php -S localhost:8000 tools/dev-router.php` inside the project folder, then open http://localhost:8000/.

**Not built yet:** store cart and checkout (`php/cart.php` and `php/checkout.php` do not exist, so the store's Add to cart buttons lead nowhere: `pages/store.php` is design only, marked `noindex`, and sits in the Library menu group), blog posts from a database, admin area, server-side removal of switched-off sections (switches still hide them in the browser).

## 22. Newer patterns: rules (added 2026-11-15)
Markup and class names are in `docs/2026-11-12_Patterns.md`; image sizes in `docs/2026-11-12_Media-Specs.md`. Layouts are inspired by examples seen on boards; they are built from our own tokens, never copied from a specific design.
- **Dark theme (`section--dark`, `theme-dark`)**: see section 5. Alternate dark and light bands; never set colors inside a dark section.
- **Stats card over the hero (`.stats-card`)**: goes in its own `section--stats-card` right after a hero; the hero gets `section--hero-overlap` so the card never covers its text. The rise is `--stats-card-overlap`. Every number needs a source (section 10).
- **Editorial rows and section label**: row numbers come from CSS counters. The number inside `.section-label` is typed on purpose (the section's place on the page). A row without its own page uses `<div class="row__link">` instead of `<a>`.
- **Tall tiles + swipe row (`.tiles`)**: the row scrolls and snaps without JavaScript. The arrow buttons exist only with JS (`data-js="tiles"`, `tiles-controls`, `tiles-prev`, `tiles-next`; `initTiles` in `main.js`); the row is focusable (`tabindex="0"`, `role="region"`, label) so keyboard users can scroll it.
- **Timelines (`.timeline`)**: `--numbered` markers use CSS counters; `--horizontal` is one row from 48em, phones always stack. Dates and durations only from a document or the client.
- **Glass card (`.glass-card`)**: tinted dark on purpose so white text stays readable on any photo (worst case worked out on 2026-11-15, white photo under the media overlay: white text about 8 to 1). Fields keep their white look. Browsers without `backdrop-filter` get a darker solid panel. Test contrast again with the real photo.
- **Numbered FAQ (`.faq--numbered`)**: same `<details>` markup as the FAQ; numbers from CSS.
- **Floating proof cards (`.float-cluster`, `.float-card`, `.score`, `.avatar-row`, `.meter-list`)**: every number, source name and meter level must come from a real check, with the date; no source = `[NUMBER NEEDED - source required]`. Show a logo only with the owner's permission. Put `theme-dark` on one card only. The status word carries the meaning, the bar only pictures it (the `aria-label` says the same in words). The lime figure (`--color-highlight`) is for dark cards only: never use it as text on a light background.
- **Giant-type hero (`.hero__title--giant`, `.hero-type__figure`)**: one or two short words, because the photo covers part of the lower letters (`--hero-type-overlap`). The headline stays real text and the photo is decoration. On a real page the headline is the page's one `h1`.

## 23. Names and order (added 2026-11-21)

- Every structure has one NAME, listed in `docs/2026-11-21_Name-Index.md`. Use the name in requests, comments and notes. Class names stay as they are.
- Every list in the template is A to Z: Library menu, All-pages index, Patterns contents and catalog blocks, tables in the docs, media tables. Add a new item in its alphabetical place.
- Exception: a client's real menu follows the visitor's journey (Home first), and steps in a process keep their order.
- A new structure is finished only when it has: a name in the Name Index, a row in `docs/2026-11-12_Patterns.md`, a block in the Patterns catalog (in A-to-Z place) and a line in the Checklist if it needs a check.

