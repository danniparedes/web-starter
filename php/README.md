# php/ — how this folder is organized

| Folder / file | What lives here | Public? |
|---|---|---|
| `bootstrap.php` | Loaded first by every page and handler: errors, config, libraries, session | No (never opened directly) |
| `handlers/` | **Public endpoints.** One small file per form: `contact.php`, `newsletter.php`, `admissions.php`. Forms post here. Also `robots.php` and `sitemap.php`, reached as `/robots.txt` and `/sitemap.xml`. | **Yes** |
| `lib/core/` | Basic helpers (`helpers.php`: `e()`, `config()`, `url()`, CSRF) and file storage (`storage.php`) | No |
| `lib/forms/` | The form engine (`forms.php`) and the answer shown to the visitor (`respond.php`) | No |
| `lib/mail/` | Sending email (`mailer.php`: log / mail() / PHPMailer) | No |
| `lib/views/` | Markup built from config: menu, footer sitemap, social icons, logo (`view.php`) | No |
| `vendor/` | Third-party libraries copied in by hand (PHPMailer goes in `vendor/phpmailer/src/`) | No |

## Rules
- Only `handlers/` is meant to be opened by the browser. Everything else is blocked by `.htaccess` (Apache) or must be blocked in the server config (nginx: see `docs/2026-11-13_Hosting-Profiles.md`).
- A handler is 3 lines: load `bootstrap.php`, call `handle_form('name')`. The rules for that form live in `config/site.php > forms`.
- **New form:** 1) add its entry in `config/site.php > forms`; 2) copy `handlers/contact.php` to `handlers/NAME.php` and change the name; 3) point the form's `action` to `php/handlers/NAME.php`.
- **New feature later** gets its own folder, not a loose file: for example `handlers/` + `lib/store/` for cart and checkout, `lib/admin/` for the login and the inquiries page.
- Libraries only define functions; they never run anything by themselves.
