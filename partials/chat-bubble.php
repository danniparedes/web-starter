<?php
/* CHAT BUBBLE — floating WhatsApp button. Number and message come from config/site.php (whatsapp). */
$wa = config('whatsapp', []);
$link = 'https://wa.me/' . rawurlencode((string) ($wa['number'] ?? '')) . '?text=' . rawurlencode((string) ($wa['text'] ?? ''));
?>
  <a class="chat-bubble" data-feature="chatBubble" href="<?= e($link) ?>" target="_blank" rel="noopener">
    <svg class="icon icon--large" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
      <path d="M21 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.5l1.6-4.9A8.5 8.5 0 1 1 21 11.5z"/>
    </svg>
    <span class="chat-bubble__label">Chat with us on WhatsApp <span class="visually-hidden">(opens in a new tab)</span></span>
  </a>
