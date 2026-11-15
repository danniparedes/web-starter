<?php
/* ==========================================================================
   SITE CONFIG — the one place you edit per project (PHP stage)
   What    : site name, contact details, menu, switches, mail, forms.
   Secrets : do NOT put passwords here. Put them in config/site.local.php
             (copy site.local.example.php). That file is never shared or
             committed, and its values replace the ones below.
   Pages   : in menu and links write the page name WITHOUT extension
             ('contact', not 'contact.php'). The page file is pages/contact.php.
   ========================================================================== */
return [

    'site_name'   => '[Site name]',
    'description' => '[One sentence describing the site.]',
    'lang'        => 'en',
    /* How page links look:
       'query'  index.php?p=contact   works on ANY server (default)
       'pretty' /contact              needs the .htaccess rewrite (Apache) or an equivalent nginx rule */
    'routing'     => 'query',
    'base_path'   => null,            // null = detected. Set '/folder' only if detection is wrong

    /* ---- Search engines and link previews (all optional) ----
       site_url     Full address of the live site, no slash at the end: 'https://clientdomain.com'.
                    Needed for the canonical link, the share image and /sitemap.xml.
       indexable    true = search engines may list the site. Set false on test/staging copies:
                    adds noindex to every page and makes /robots.txt say "keep out".
       favicon      Browser tab icon: PNG or SVG in assets/img/ (tag is left out if the file is missing).
       apple_touch  iPhone home-screen icon: PNG, 180 x 180.
       share_image  Picture shown when a link is shared on WhatsApp, Facebook, LinkedIn: 1200 x 630. */
    'seo' => [
        'site_url'    => '',
        'indexable'   => true,
        'favicon'     => 'assets/img/favicon.png',
        'apple_touch' => 'assets/img/apple-touch-icon.png',
        'share_image' => 'assets/img/share.jpg',
    ],

    /* ---- Logo. Leave src empty to show the LOGO placeholder ---- */
    'logo' => ['src' => '', 'alt' => '[Site name]', 'width' => 160, 'height' => 48],

    /* ---- Company details (footer) ---- */
    'company' => [
        'name'    => '[Company name]',
        'address' => '[Street address, City, Country]',
        'phone'   => '[Phone]',
        'email'   => '[Email]',
    ],

    /* ---- Analytics (optional). An empty ID = that tool is off. Both empty = no tracking and no cookie banner.
          The tools start ONLY after the visitor presses Accept in the cookie banner (Reject = nothing loads).
          ga4         Google Analytics 4 measurement ID, like 'G-XXXXXXXXXX'
          meta_pixel  Meta (Facebook) pixel ID, digits only
          Put the client's own IDs in config/site.local.php if you prefer to keep them out of the shared file. ---- */
    'analytics' => [
        'ga4'        => '',
        'meta_pixel' => '',
    ],

    /* ---- Legal links (footer line). Pages: pages/privacy.php, pages/terms.php.
          Remove a line if the client does not need that page (and delete the page). ---- */
    'legal' => [
        ['label' => 'Privacy policy', 'href' => 'privacy'],
        ['label' => 'Terms of use',   'href' => 'terms'],
    ],

    /* ---- Social profiles (header + footer). Empty URL = icon not shown.
          Supported keys: facebook, instagram, linkedin ---- */
    'social' => [
        'facebook'  => '[Facebook URL]',
        'instagram' => '[Instagram URL]',
        'linkedin'  => '[LinkedIn URL]',
    ],

    /* ---- Chat bubble (WhatsApp). number: digits only, country code first ---- */
    'whatsapp' => [
        'number' => '[WHATSAPP-NUMBER]',
        'text'   => 'Hello, I have a question.',
    ],

    /* ---- Main menu. One level of children only.
          'footer' => false keeps an item out of the footer sitemap. ---- */
    'menu' => [
        ['label' => 'Home', 'href' => 'index'],
        ['label' => 'About', 'href' => 'index#about', 'children' => [
            ['label' => 'About us',   'href' => 'index#about'],
            ['label' => 'Team',       'href' => 'team'],
            ['label' => 'Admissions', 'href' => 'admissions'],
        ]],
        ['label' => 'Blog',    'href' => 'blog'],
        ['label' => 'Contact', 'href' => 'contact'],
        ['label' => 'Library', 'href' => 'all-pages', 'footer' => false, 'children' => [
            ['label' => 'All pages',           'href' => 'all-pages', 'footer' => false],
            ['label' => 'Patterns',            'href' => 'patterns', 'footer' => false],
            ['label' => 'Forms',               'href' => 'forms', 'footer' => false],
            ['label' => 'Store', 'href' => 'store', 'footer' => false],
            ['label' => 'Work',                'href' => 'projects', 'footer' => false],
            ['label' => 'Project','href' => 'project', 'footer' => false],
            ['label' => 'About me', 'href' => 'about-me', 'footer' => false],
            ['label' => 'Programs',          'href' => 'programs', 'footer' => false],
            ['label' => 'Blog post','href' => 'post', 'footer' => false],
        ]],
    ],

    /* ---- Switches: true = show, false = hide (same names as data-feature in the HTML) ---- */
    'features' => [
        'chatBubble'         => true,
        'form.aboutYou'      => true,
        'form.request'       => true,
        'form.details'       => true,
        'form.preferences'   => true,
        'form.address'       => true,
        'form.attachment'    => true,
        'form.consent'       => true,
        'form.antispam'      => true,
        'newsletter'         => true,
        'store.filters'      => true,
        'store.cart'         => true,
        'store.trust'        => true,
        'post.author'        => true,
        'post.related'       => true,
        'admissions.dates'   => true,
        'admissions.tuition' => true,
        'admissions.faq'     => true,
        'admissions.form'    => true,
    ],

    /* ---- Mail ----
       driver: 'log'       writes emails to storage/logs/mail.log (testing; sends nothing)
               'mail'      PHP mail(): works on most shared hosting, weakest deliverability
               'phpmailer' real SMTP through the PHPMailer library (see docs, Conventions 21)
       from  : an address on YOUR domain (mail from other domains is often rejected). */
    'mail' => [
        'driver'    => 'log',
        'to'        => '[Email]',                 // where form messages arrive
        'from'      => 'no-reply@example.com',
        'from_name' => '[Site name]',
        'smtp'      => ['host' => '', 'port' => 587, 'secure' => 'tls', 'user' => '', 'pass' => ''],
    ],

    /* ---- Forms: one entry per handler in php/. Any other field in the form is
          included in the email automatically (field names are the contract). ---- */
    'forms' => [
        'contact' => [
            'required' => ['email', 'message'],
            'subject'  => 'New message from the website',
            'success'  => 'Thank you! We received your message and will reply soon.',
            'store'    => true,        // keep a copy in storage/submissions/
            'uploads'  => true,        // accept the optional "attachment" file
        ],
        'admissions' => [
            'required' => ['parent_name', 'email', 'phone', 'student_name', 'level', 'accept_terms'],
            'subject'  => 'New admissions inquiry',
            'success'  => 'Thank you! The admissions team will contact you soon.',
            'store'    => true,
            'uploads'  => false,
            // 'to'    => 'admissions@example.com',   // optional: a different recipient
        ],
        'newsletter' => [
            'type'     => 'subscribe', // saves unique emails to storage/newsletter.csv
            'required' => ['email'],
            'subject'  => 'New newsletter subscriber',
            'success'  => 'Thanks for subscribing!',
            'notify'   => false,       // true = also email each new subscriber to mail.to
        ],
    ],

    /* ---- Uploads (contact form "attachment") ---- */
    'uploads' => [
        'max_bytes'  => 2097152,       // DECIDE per project (2 MB here); also check the server's upload_max_filesize
        'extensions' => ['pdf', 'jpg', 'jpeg', 'png'],
    ],

    /* ---- Protection ---- */
    'security' => [
        'secret'       => 'change-me-in-site.local.php',   // random text; hashes visitor IPs
        'rate_max'     => 5,           // max submissions per visitor...
        'rate_window'  => 600,         // ...in this many seconds
        'check_origin' => true,        // reject forms posted from another website
    ],

    'debug' => false,                  // true only while developing: shows PHP errors
    'storage_dir' => dirname(__DIR__) . '/storage',
];
