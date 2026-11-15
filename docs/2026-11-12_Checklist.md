# Project Checklist

Run through this before calling any page done. Each item is verifiable.

## Structure
- [ ] Folder matches the standard structure (README.md).
- [ ] CSS files load in order: tokens, base, layout, components, sections.
- [ ] Every file opens with its header comment.

## HTML
- [ ] `lang`, charset, viewport, `<title>`, meta description present.
- [ ] Exactly one `<h1>`; heading order has no skips.
- [ ] One `<main>`; header, nav, footer landmarks present.
- [ ] Every `<section>` has an `id` and a heading.
- [ ] Every `<img>` has `alt`.
- [ ] No `[PLACEHOLDER]` text left.
- [ ] No inline `style=` and no inline `<script>` code.

## CSS
- [ ] No raw `#hex` or pixel values outside `tokens.css`.
- [ ] Focus outline visible when tabbing.
- [ ] Layout holds from narrow phone width to wide desktop.

## JavaScript
- [ ] Elements found via `data-js` hooks only.
- [ ] No errors in the browser console.
- [ ] Page content and links still work with JavaScript disabled.

## Background video (only if used)
- [ ] `poster` image exists and matches the video's first frame.
- [ ] Video has `muted`, `loop`, `playsinline`, and both `.webm` and `.mp4` sources.
- [ ] Text stays readable over the brightest frame.
- [ ] Pause/play button works (or its removal is recorded in the README as a client decision); with reduced motion on, the video does not autoplay.

## Patterns (only those used)
- [ ] Stats: every number has a source and the date checked (or `[NUMBER NEEDED]`).
- [ ] Testimonials: real quotes, with permission.
- [ ] Stats card over the hero: the hero above has `section--hero-overlap`; every number has a source and the date checked.
- [ ] Timelines: dates and durations come from a document or the client.
- [ ] Tall tiles: every photo has `alt`; the link text says where it goes; the row swipes on a phone and the arrows work (desktop).
- [ ] Giant-type hero: headline is one or two short words; exactly one `h1` on the page (use `h1` on the real home page); the photo is decoration.
- [ ] Glass form card: white text readable over the real photo (check it, not the placeholder); form tested like any other form.
- [ ] Dark bands: every dark color pair checked for contrast (text, muted text, primary, error, success); changes made in the `--dark-*` tokens only.
- [ ] Gallery: every image has `alt`; the viewer opens, closes with Esc, and arrows move between images.
- [ ] Form: labels present, spam-trap field empty, `php/handlers/contact.php` exists and was tested.
- [ ] Menu links use full page paths and the header/footer match every other page.

## Accessibility
- [ ] Whole page usable with keyboard only (Tab, Enter).
- [ ] Skip link appears on first Tab press.
- [ ] Text/background contrast checked with a contrast tool.

## Delivery
- [ ] Docs named `YYYY-MM-DD_Name.ext`; old versions in `_archive/`.
- [ ] Any statistic or figure on the site has a primary source.


## Media
- [ ] Every image/video matches its slot in the Media-Specs sheet (shape and master size)
- [ ] Every `<img>` has width, height and alt; below-the-fold images are lazy
- [ ] Each background video has a poster (first frame) and a 1280 phone version
- [ ] Icons come from the sprite (line, 1.5 stroke); no stray emoji or PNG icons
- [ ] Lottie files: icons play once; any loop over 5 s has a pause button

## Forms
- [ ] Every control has a label; required fields have `required` and the marker class
- [ ] `autocomplete` values set (name, email, tel, address)
- [ ] `data-demo` removed; `action` points to the real handler
- [ ] Spam trap present; CSRF token filled by PHP
- [ ] Tested: empty submit, wrong email, success, failure message

## Chat bubble
- [ ] `[WHATSAPP-NUMBER]` replaced: international format, digits only
- [ ] Prefilled message written for the project and URL-encoded
- [ ] Opens the right chat on a phone and on desktop
- [ ] Same block on every page (or deliberately removed on some)

## Switches
- [ ] Every optional block has `data-feature` and an entry in `js/site-config.js`
- [ ] Tested with a switch set to false: nothing flashes, form still sends correctly
- [ ] Anything that must be gone for good is deleted, not switched off

## Page templates (store, blog, admissions)
- [ ] Unused sections switched off (or deleted) in `js/site-config.js`
- [ ] Placeholder prices, dates and fees replaced with client-confirmed figures
- [ ] Menu links added for the pages the project uses
- [ ] Product / post / admissions images at the sizes in Conventions section 19
- [ ] Forms post to the real PHP handlers; honeypot and CSRF kept

## PHP stage
- [ ] `config/site.php` edited (name, company, menu, social, WhatsApp, switches)
- [ ] `config/site.local.php` created with a random secret and mail settings (never committed)
- [ ] `mail.driver` is not `log`; a test message arrived in the real inbox from each form
- [ ] `debug` is false; HTTPS is on
- [ ] `config/`, `partials/`, `php/lib/`, `storage/` are not reachable in the browser (try the URLs)
- [ ] Privacy policy mentions stored messages and subscribers
- [ ] Upload limit decided and matches the server settings
- [ ] `storage/` is included in the backups

## Search, sharing and legal
- [ ] `seo.site_url` set to the live address (no slash at the end)
- [ ] `seo.indexable` is `false` while testing and `true` on the live site (view the page source: no `noindex` on public pages)
- [ ] `favicon.png`, `apple-touch-icon.png` and `share.jpg` are in `assets/img/` (512, 180 and 1200 x 630)
- [ ] A shared link shows the right title and picture (try it in WhatsApp)
- [ ] `/robots.txt` and `/sitemap.xml` open and list the right pages
- [ ] `pages/privacy.php` and `pages/terms.php`: every `[bracket]` replaced and the text confirmed by the client; or removed from `config/site.php > legal` and deleted
- [ ] Library menu group removed; `pages/all-pages.php`, `pages/patterns.php`, `pages/forms.php` and `pages/store.php` deleted unless the client should see them (the store is design only)
- [ ] Sample pages (`projects`, `project`, `about-me`, `programs`, `post`): the ones used are filled in and in the menu; the rest are deleted (they are not marked `noindex`)

## Discovery and analytics
- [ ] Questionnaire answered and brand brief approved by the client before design started
- [ ] Every text and background color pair passes the contrast check (4.5 to 1 normal text, 3 to 1 large text)
- [ ] Analytics IDs set only if the client uses them (`config/site.php > analytics`)
- [ ] With an ID set: banner appears on first visit, Reject loads nothing, Accept loads the tools, footer "Cookie settings" reopens it
- [ ] Privacy page text matches the tools actually in use
