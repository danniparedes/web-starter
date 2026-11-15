<?php /* SCRIPTS — last thing before </body>. Also prints the cookie banner (only when analytics is set up). */
require SITE_ROOT . '/partials/consent.php';
?>
  <script src="<?= e(asset('js/main.js')) ?>" defer></script>
