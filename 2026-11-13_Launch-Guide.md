# Launch a client site: step by step

Use this the day a client site goes from "ready on my computer" to "live on the internet".
Do the steps in order. Tick each box. Details behind each step are in `docs/2026-11-12_Conventions.md` section 21.

**Time:** plan about an hour for the first site. Later sites go faster.

---

## Before you start: what you need from the client

**Step 0. Discovery.** Send the client `2026-11-13_01_Client-Questionnaire_EN.md`, hold the call, and get the one-page brand brief approved (see `2026-11-13_02_Design-From-Questionnaire.md`). Do not design before the brief is approved.

- [ ] Hosting login (cPanel or similar) or FTP details, and which server type it runs (Apache, LiteSpeed, nginx, IIS): see `docs/2026-11-13_Hosting-Profiles.md`
- [ ] The domain name, already pointing at that hosting
- [ ] An email address on the client's domain for sending, for example `no-reply@clientdomain.com`
- [ ] The inbox where form messages should arrive (can be a normal Gmail)
- [ ] The SMTP details and password for the sending address (the host's "Email accounts" page shows them)
- [ ] Logo, company details, social links, WhatsApp number, final texts
- [ ] Google Analytics ID (`G-XXXX`) and Meta Pixel ID, only if the client uses them

> Plain English: **SMTP** is the "outgoing mail server". It lets your site send email as if it were the client's own mailbox, so the message is less likely to be treated as spam.

---

## Step 1. Fill in the site settings (on your computer)

Open `config/site.php` and change, in this order:

- [ ] `site_name`, `description`
- [ ] `logo` (put the file in `assets/img/`, set `src`)
- [ ] `company` (name, address, phone, email)
- [ ] `social` (empty a link to hide its icon)
- [ ] `whatsapp.number`: digits only, country code first, no `+`, no spaces. Example: `593991234567`
- [ ] `menu` (names and order)
- [ ] `features`: set unused sections to `false`
- [ ] `seo.site_url`: the live address, for example `https://clientdomain.com` (no slash at the end)
- [ ] `seo.indexable`: `false` while you build and test; you switch it to `true` in Step 9
- [ ] `analytics.ga4` and `analytics.meta_pixel`: the client's IDs, or leave empty. With an ID, a cookie banner appears and nothing loads until the visitor accepts
- [ ] `legal`: keep or remove the privacy and terms links (and fill in or delete those two pages)
- [ ] Look: colors and fonts in `css/tokens.css`; if the brief calls for dark bands or a dark site, use `section--dark` or `theme-dark` and set the `--dark-*` tokens (check contrast on every pair)
- [ ] Pictures in `assets/img/`: `favicon.png` (512 x 512), `apple-touch-icon.png` (180 x 180), `share.jpg` (1200 x 630, the picture shown when someone shares a link)
- [ ] Page content in `pages/*.php`: replace every `[bracket]` placeholder
- [ ] Prices, dates and fees: only figures the client confirmed in writing

Look for leftovers: search the project for `[` and `Site name`. The privacy and terms pages are an outline only: the client (or their lawyer) gives the final text.

## Step 2. Create the secrets file (on your computer)

1. Copy `config/site.local.example.php` and name the copy `config/site.local.php`.
2. Set `security.secret` to a long random text (30+ characters, letters and numbers, no meaning). Never reuse it for another client.
3. Set the mail block (see Step 3).

This file holds passwords. **Never send it to anyone, never put it in GitHub.** (`.gitignore` already protects it.)

## Step 3. Choose how email is sent

Pick ONE. Both are set in `config/site.local.php` under `mail`.

**Option A: simple (`'driver' => 'mail'`)**
- Uses the hosting's built-in sender. Nothing to install.
- Good for a first test. Messages are more likely to land in spam.
- Set `to` (where messages arrive) and `from` (an address on the client's domain).

**Option B: reliable (`'driver' => 'phpmailer'`)** (recommended for real clients)
1. Download PHPMailer from https://github.com/PHPMailer/PHPMailer (green "Code" button, "Download ZIP").
2. Open the ZIP. Copy the `src` folder into `php/vendor/phpmailer/` so you end up with `php/vendor/phpmailer/src/PHPMailer.php`, `SMTP.php` and `Exception.php`.
3. Keep PHPMailer's license file next to it (`php/vendor/phpmailer/`).
4. In `site.local.php` fill `smtp`: `host`, `port` (usually 587), `secure` (`'tls'`), `user`, `pass`.

Never use `'driver' => 'log'` on a live site: it only writes to a text file and sends nothing.

## Step 4. Check the hosting (5 minutes)

- [ ] PHP version is 8.0 or newer (cPanel: "Select PHP Version" / "MultiPHP Manager"). If older, change it there.
- [ ] Note the upload limits (same screen: `upload_max_filesize` and `post_max_size`). The contact form's file limit is in `config/site.php` under `uploads.max_bytes`. The server limit must be equal or higher.
- [ ] HTTPS works (the padlock). Most hosts offer a free certificate in cPanel ("SSL/TLS Status"). Turn it on before going live.

## Step 5. Upload the site

Upload everything in the project folder to the hosting's public folder (usually `public_html`) using File Manager or FTP.

Do **not** upload:
- `docs/` and `templates/` (design material; harmless but not needed)
- the guide files (`.md`)

Make sure these ARE uploaded, including the hidden dot files:
- [ ] `.htaccess` (root)
- [ ] `config/.htaccess`, `partials/.htaccess`, `pages/.htaccess`, `php/lib/.htaccess`, `php/vendor/.htaccess`, `storage/.htaccess`

> Tip: in File Manager, tick "Show hidden files (dotfiles)" in Settings, or those files seem to be missing.

Folder permissions: the `storage/` folder must be writable by PHP (cPanel: right-click, "Change Permissions", usually 750 or 755). If messages are not saved, this is the first thing to check.

## Step 6. Check the private folders are really private (do not skip)

In the browser, open each address below. **Every one must be refused** ("403 Forbidden" or "Not found"), never show code or data:

- [ ] `yourdomain.com/config/site.php`
- [ ] `yourdomain.com/config/site.local.php`
- [ ] `yourdomain.com/storage/`
- [ ] `yourdomain.com/storage/newsletter.csv`
- [ ] `yourdomain.com/php/lib/core/helpers.php`
- [ ] `yourdomain.com/php/bootstrap.php`
- [ ] `yourdomain.com/pages/contact.php`
- [ ] `yourdomain.com/partials/header.php`

If ANY of them opens: stop. The `.htaccess` rules are not working on that server (it may not be Apache, or `.htaccess` is disabled).
Fix: ask the host to enable `.htaccess`, or move `config/` and `storage/` above the public folder and set `storage_dir` in `site.php`, or have the folders blocked in the server settings. Do not launch until all eight are refused. On nginx and other servers that ignore `.htaccess`, use the server block in `docs/2026-11-13_Hosting-Profiles.md`.

## Step 7. Check the page addresses

1. Open `yourdomain.com`. The home page should show with all styles.
2. Click every menu link, including the dropdowns.
3. Open `yourdomain.com/robots.txt` and `yourdomain.com/sitemap.xml`. Robots shows a few lines; the sitemap lists your pages (it says "No sitemap" until `seo.site_url` is set). If either is "not found", the rewrite rules are not working: upload a plain `robots.txt` and `sitemap.xml` file instead (a real file always wins).
4. Optional, for nicer addresses (`/contact` instead of `index.php?p=contact`):
   - In `config/site.php` change `'routing' => 'query'` to `'routing' => 'pretty'`, upload, then click every link again.
   - **If any page says "not found", set it back to `'query'`.** (This rewrite rule is not tested on a real server yet: this is the first test.)

## Step 8. Test every form with real email

For each form (contact, admissions, newsletter):

- [ ] Fill it correctly and send. A success message appears.
- [ ] The email arrives in the client's inbox. Check the spam folder too.
- [ ] Press "Reply" on that email: the reply goes to the visitor's address.
- [ ] Send it empty: you see a clear error.
- [ ] Contact form with a PDF attached: works. With a `.exe` or a huge file: refused.
- [ ] Open `storage/submissions/` (through File Manager): the message was saved there.

If the message is saved but no email arrives: it is the mail settings (Step 3). Check `from` is on the client's domain, the SMTP password is right, then look at `storage/logs/error.log` (File Manager) for the reason.

Also test on a phone.

**If the client uses analytics (an ID is set):**

- [ ] First visit in a private window: the cookie banner appears
- [ ] Press Reject: the banner closes and no analytics request is made (browser developer tools, Network tab)
- [ ] Clear the site data, press Accept: the analytics tools load
- [ ] The footer link "Cookie settings" reopens the banner

## Step 9. Last checks

- [ ] `'debug' => false` in `config/site.php` (never `true` on a live site)
- [ ] `seo.indexable` is `true` (right-click the page, View page source, search for `noindex`: it must not be there on public pages)
- [ ] A link to the site pasted in WhatsApp shows the right title and picture
- [ ] `mail.driver` is not `log`
- [ ] The privacy policy and terms pages: every `[bracket]` replaced, final text confirmed by the client
- [ ] Open the site in a private window to see what a visitor sees
- [ ] Remove the `Library` menu item from `menu` in `config/site.php`. It holds the design catalog and the store, which is design only: its cart and checkout are not built. Then delete `pages/all-pages.php`, `pages/patterns.php`, `pages/forms.php` and `pages/store.php` unless the client should see them. The sample pages `projects`, `project`, `about-me`, `programs` and `post` hold only placeholders and are not marked `noindex`: keep and fill (and move into the main menu) only those the site needs, delete the rest

## Step 10. After launch (give this to the client or keep it yourself)

- [ ] Back up the whole site, especially `storage/` (the only place messages and subscribers are kept). Ask the host for automatic backups, or download `storage/` monthly.
- [ ] Check the inbox and the spam folder weekly during the first month.
- [ ] Tell the client where messages are stored and who can see them.

---

## When something goes wrong

| Problem | First thing to check |
|---|---|
| Blank white page | `storage/logs/error.log`; PHP version too old; a file was uploaded incompletely |
| Page has no styling | The `css/` and `js/` folders were not uploaded, or the site is in a sub-folder and `base_path` is wrong |
| Form says "session expired" | The visitor kept the page open for hours, or cookies are blocked; reload and try again |
| Form says "too many messages" | The rate limit worked (default 5 per 10 minutes per visitor). Wait, or raise `rate_max` |
| Message saved but no email | Mail settings (Step 3); `from` not on client's domain; wrong SMTP password |
| All pages say "not found" after `'pretty'` | Set `'routing'` back to `'query'`: the server ignores the rewrite rules |
| Cannot save files | `storage/` is not writable (Step 5) |

## Not covered yet

The store (cart, checkout, payments) is not built; `pages/store.php` is design only. When the store exists, this guide gets its own payment steps.
Decision: everything stays in English (site texts, form messages, banner). The `lang` setting only sets the page language tag.
