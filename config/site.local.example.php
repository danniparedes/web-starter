<?php
/* Copy this file to site.local.php (same folder) and fill it in.
   site.local.php is NEVER committed or shared. Only list what you change:
   values here replace the ones in site.php. */
return [
    'security' => ['secret' => 'PASTE-A-LONG-RANDOM-TEXT-HERE'],
    'mail' => [
        'driver'    => 'mail',                    // 'mail' or 'phpmailer'
        'to'        => 'owner@client-domain.com',
        'from'      => 'no-reply@client-domain.com',
        'smtp'      => ['host' => 'smtp.client-domain.com', 'port' => 587, 'secure' => 'tls',
                        'user' => 'no-reply@client-domain.com', 'pass' => 'PASSWORD'],
    ],
    // 'debug' => true,
];
