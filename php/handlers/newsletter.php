<?php
/* Receives the "newsletter" form. Settings: config/site.php > forms > newsletter. */
require dirname(__DIR__) . '/bootstrap.php';
handle_form('newsletter');
