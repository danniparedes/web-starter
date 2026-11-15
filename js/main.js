/* ==========================================================================
   MAIN.JS
   What   : Site-wide behavior. Entry point loaded by every page.
   Rules  : - Find elements ONLY through data-js="..." hooks, never styling
              classes. (Designers can rename classes without breaking code.)
            - One small function per behavior, called from init().
            - The page must still work if this file fails to load.
   Growing: when this file gets long, move each behavior to its own file
            in js/ (e.g. js/nav.js) and load them in index.html.
   ========================================================================== */

'use strict';

/* --------------------------------------------------------------------------
   HELPER: select one element by its data-js hook
   -------------------------------------------------------------------------- */
function hook(name) {
  return document.querySelector('[data-js="' + name + '"]');
}

/* --------------------------------------------------------------------------
   BEHAVIOR: mark that JavaScript is available
   CSS uses the .js class to enable enhancements safely.
   -------------------------------------------------------------------------- */
function markJsEnabled() {
  document.documentElement.classList.add('js');
}

/* --------------------------------------------------------------------------
   BEHAVIOR: mobile navigation toggle
   Needs : data-js="nav-toggle" (button) and data-js="nav-list" (menu)
   -------------------------------------------------------------------------- */
function initNavToggle() {
  var toggle = hook('nav-toggle');
  var list = hook('nav-list');
  if (!toggle || !list) return;

  toggle.addEventListener('click', function () {
    var isOpen = list.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });
}

/* --------------------------------------------------------------------------
   BEHAVIOR: current year in the footer
   Needs : data-js="year"
   -------------------------------------------------------------------------- */
function initYear() {
  var el = hook('year');
  if (el) el.textContent = new Date().getFullYear();
}

/* --------------------------------------------------------------------------
   BEHAVIOR: background videos (hero, divider, any .section--media)
   Needs : data-js="bg-video" on each <video>. Optionally, a
           data-js="bg-video-toggle" button INSIDE the same section.
   Does  : - does NOT autoplay for people who asked for less motion
             or turned on data saver (the poster image stays visible);
           - keeps each toggle button label in sync with its video.
   -------------------------------------------------------------------------- */
function initBackgroundVideos() {
  var videos = document.querySelectorAll('[data-js="bg-video"]');
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var saveData = navigator.connection && navigator.connection.saveData;

  var isPhone = window.matchMedia('(max-width: 47.99em)').matches;

  Array.prototype.forEach.call(videos, function (video) {
    // Phones get the smaller file when the markup provides one (data-src-small).
    var smallSrc = video.getAttribute('data-src-small');
    if (isPhone && smallSrc) {
      Array.prototype.forEach.call(video.querySelectorAll('source'), function (s) { s.remove(); });
      var source = document.createElement('source');
      source.src = smallSrc;
      source.type = 'video/mp4';
      video.appendChild(source);
      video.load();
    }

    var section = video.closest('.section--media');
    var toggle = section ? section.querySelector('[data-js="bg-video-toggle"]') : null;

    if (reduceMotion || saveData) {
      video.removeAttribute('autoplay');
      video.pause();
    }

    if (!toggle) return;

    function updateLabel() {
      toggle.textContent = video.paused ? 'Play video' : 'Pause video';
    }

    toggle.addEventListener('click', function () {
      if (video.paused) {
        var attempt = video.play();
        if (attempt && attempt.catch) attempt.catch(function () {});  // play can be refused
      } else {
        video.pause();
      }
    });

    video.addEventListener('play', updateLabel);
    video.addEventListener('pause', updateLabel);
    updateLabel();
  });
}

/* --------------------------------------------------------------------------
   BEHAVIOR: submenus (dropdowns in the main menu)
   Needs : markup from the nav component (li.nav__item--has-sub with a
           button[data-js="sub-toggle"]).
   Does  : the arrow button opens/closes its submenu (aria-expanded kept in
           step); Escape or a click elsewhere closes all. Hover and keyboard
           focus open the submenu on desktop through CSS alone.
   -------------------------------------------------------------------------- */
function initSubmenus() {
  var toggles = document.querySelectorAll('[data-js="sub-toggle"]');
  if (!toggles.length) return;

  function closeAll(except) {
    Array.prototype.forEach.call(toggles, function (btn) {
      var item = btn.parentNode;
      if (item === except) return;
      item.classList.remove('is-open');
      btn.setAttribute('aria-expanded', 'false');
    });
  }

  Array.prototype.forEach.call(toggles, function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.parentNode;
      var open = !item.classList.contains('is-open');
      closeAll(item);
      item.classList.toggle('is-open', open);
      btn.setAttribute('aria-expanded', String(open));
    });
  });

  document.addEventListener('click', function (e) {
    if (!e.target.closest || !e.target.closest('.nav__item--has-sub')) closeAll();
  });
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    var openItem = document.querySelector('.nav__item--has-sub.is-open')
      || document.querySelector('.nav__item--has-sub:focus-within, .nav__item--has-sub:hover');
    closeAll();
    if (openItem) {
      // is-dismissed keeps the hover/focus rule from re-opening it until the pointer or focus leaves.
      openItem.classList.add('is-dismissed');
      openItem.querySelector('[data-js="sub-toggle"]').focus();
    }
  });
  Array.prototype.forEach.call(document.querySelectorAll('.nav__item--has-sub'), function (item) {
    function reset() { item.classList.remove('is-dismissed'); }
    item.addEventListener('mouseleave', reset);
    item.addEventListener('focusout', function (e) { if (!item.contains(e.relatedTarget)) reset(); });
  });
}

/* --------------------------------------------------------------------------
   BEHAVIOR: feature switches
   Needs : js/site-config.js (loaded in <head>) and data-feature="NAME" on the
           elements it controls.
   Does  : removes every element whose switch is false, BEFORE the other
           behaviors run, so a hidden form group is never validated or sent.
           (site-config.js already hid them with CSS so nothing flashes.)
   -------------------------------------------------------------------------- */
function initFeatures() {
  var features = (window.SITE_CONFIG && window.SITE_CONFIG.features) || {};
  Object.keys(features).forEach(function (name) {
    if (features[name] !== false) return;
    Array.prototype.forEach.call(document.querySelectorAll('[data-feature="' + name + '"]'), function (el) {
      el.remove();
    });
  });
}

/* --------------------------------------------------------------------------
   BEHAVIOR: forms (validation, messages, sending)
   Needs : <form data-js="form" action="..." method="post"> and, inside it,
           <div class="form__status" role="status" data-js="form-status" hidden>.
   Does  : checks the fields when the form is sent and shows a message under
           each wrong field (aria-invalid + aria-describedby), moves focus to
           the first one, sends the form with fetch, and shows a success or
           error message. Without JS the browser's own validation and a normal
           page-reload submit still work.
   Options on <form>:
     data-demo            pretend to send (for catalog pages and testing)
     data-success="..."   success message (default below)
     data-error-message   failure message
   Options on a field:
     data-error="..."     your own message instead of the browser's
     data-counter="ID"    id of an element that shows "typed / maxlength"
   Spam trap: a field named "website" must stay empty; if a bot fills it the
   form pretends to succeed and sends nothing (the PHP side rejects it too).
   -------------------------------------------------------------------------- */
function initForms() {
  var forms = document.querySelectorAll('form[data-js="form"]');

  Array.prototype.forEach.call(forms, function (form) {
    var status = form.querySelector('[data-js="form-status"]');
    var submit = form.querySelector('[type="submit"]');
    var submitLabel = submit ? submit.textContent : '';

    form.setAttribute('novalidate', '');          // we show the messages ourselves
    if (status) status.setAttribute('tabindex', '-1');

    function container(control) {
      return control.closest('.form__choices') || control.closest('.form__field') || control.parentNode;
    }

    function errorElement(control) {
      var box = container(control);
      var id = (control.id || control.name) + '-error';
      var el = box.querySelector('.form__error');
      if (!el) {
        el = document.createElement('p');
        el.className = 'form__error';
        el.id = id;
        el.hidden = true;
        box.appendChild(el);
      }
      return el;
    }

    function showError(control) {
      var el = errorElement(control);
      el.textContent = control.getAttribute('data-error') || control.validationMessage;
      el.hidden = false;
      control.setAttribute('aria-invalid', 'true');
      var ids = (control.getAttribute('aria-describedby') || '').split(' ').filter(Boolean);
      if (ids.indexOf(el.id) === -1) ids.push(el.id);
      control.setAttribute('aria-describedby', ids.join(' '));
    }

    function clearError(control) {
      var box = container(control);
      var el = box.querySelector('.form__error');
      if (el) { el.hidden = true; el.textContent = ''; }
      control.removeAttribute('aria-invalid');
      var ids = (control.getAttribute('aria-describedby') || '').split(' ').filter(function (id) {
        return id && !(el && id === el.id);
      });
      if (ids.length) control.setAttribute('aria-describedby', ids.join(' '));
      else control.removeAttribute('aria-describedby');
    }

    function check(control) {
      if (!control.willValidate) return true;
      if (control.checkValidity()) { clearError(control); return true; }
      showError(control);
      return false;
    }

    function fields() {
      var seen = {};
      return Array.prototype.filter.call(form.elements, function (c) {
        if (!c.name || c.type === 'hidden' || c.type === 'submit' || c.type === 'reset' || c.type === 'button') return false;
        if (c.type === 'radio' || c.type === 'checkbox') {
          if (c.type === 'radio') { if (seen[c.name]) return false; seen[c.name] = true; }
        }
        return true;
      });
    }

    function say(kind, text) {
      if (!status) return;
      status.className = 'form__status form__status--' + kind;
      status.textContent = text;
      status.hidden = false;
    }

    function loading(on) {
      if (!submit) return;
      submit.disabled = on;
      if (on) {
        submit.setAttribute('aria-busy', 'true');
        submit.textContent = submit.getAttribute('data-loading-label') || 'Sending…';
      } else {
        submit.removeAttribute('aria-busy');
        submit.textContent = submitLabel;
      }
    }

    function succeeded() {
      loading(false);
      form.reset();
      fields().forEach(clearError);
      say('success', form.getAttribute('data-success') || 'Thank you! Your message was sent.');
      if (status) status.focus();
    }

    function failed(serverMessage) {
      loading(false);
      say('error', serverMessage || form.getAttribute('data-error-message') ||
        'Sorry, we could not send your message. Please try again or contact us directly.');
      if (status) status.focus();
    }

    // Character counters
    Array.prototype.forEach.call(form.querySelectorAll('[data-counter]'), function (box) {
      var out = document.getElementById(box.getAttribute('data-counter'));
      if (!out) return;
      function update() { out.textContent = box.value.length + ' / ' + box.maxLength; }
      box.addEventListener('input', update);
      form.addEventListener('reset', function () { setTimeout(update, 0); });
      update();
    });

    // Fix a field as soon as it is right again; check a field when leaving it.
    form.addEventListener('input', function (e) {
      if (e.target.getAttribute && e.target.getAttribute('aria-invalid')) check(e.target);
    });
    form.addEventListener('change', function (e) {
      if (e.target.getAttribute && e.target.getAttribute('aria-invalid')) check(e.target);
    });
    form.addEventListener('focusout', function (e) {
      if (e.target.matches && e.target.matches('input, select, textarea') && e.target.value !== '') check(e.target);
    });
    form.addEventListener('reset', function () {
      fields().forEach(clearError);
      if (status) status.hidden = true;
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (status) status.hidden = true;

      var trap = form.querySelector('[name="website"]');
      if (trap && trap.value !== '') { succeeded(); return; }   // a bot: pretend, send nothing

      var bad = fields().filter(function (c) { return !check(c); });
      if (bad.length) {
        say('error', 'Please check the ' + bad.length + (bad.length === 1 ? ' field' : ' fields') + ' marked below.');
        bad[0].focus();
        return;
      }

      loading(true);
      if (form.hasAttribute('data-demo')) { setTimeout(succeeded, 600); return; }

      fetch(form.action, { method: (form.method || 'post').toUpperCase(), body: new FormData(form), headers: { 'Accept': 'application/json' } })
        .then(function (res) {
          if (res.ok) { succeeded(); return; }
          // The PHP handler answers with { ok:false, message:"..." }: show that message.
          return res.json().catch(function () { return {}; }).then(function (data) { failed(data && data.message); });
        })
        .catch(function () { failed(); });
    });
  });
}

/* --------------------------------------------------------------------------
   BEHAVIOR: Lottie animations
   Needs : <dotlottie-wc data-js="lottie" src="..." autoplay> in the markup.
   Does  : loads the player ONLY on pages that contain one (no cost elsewhere);
           with "reduce motion" on, removes autoplay and loop first.
   Player: official @lottiefiles/dotlottie-wc (MIT), version pinned on purpose.
           For production, download dist/dotlottie-wc.js and the .wasm file to
           assets/js/vendor/ and point LOTTIE_PLAYER_URL there (setWasmUrl, see docs).
   -------------------------------------------------------------------------- */
var LOTTIE_PLAYER_URL = 'https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.28/dist/dotlottie-wc.js';

function initLottie() {
  var items = document.querySelectorAll('[data-js="lottie"]');
  if (!items.length) return;

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    Array.prototype.forEach.call(items, function (el) {
      el.removeAttribute('autoplay');
      el.removeAttribute('loop');
    });
  }

  var script = document.createElement('script');
  script.type = 'module';
  script.src = LOTTIE_PLAYER_URL;
  document.head.appendChild(script);
}

/* --------------------------------------------------------------------------
   BEHAVIOR: gallery viewer (lightbox)
   Needs : data-js="gallery-item" on each thumbnail button, and one
           <dialog data-js="lightbox"> containing data-js="lightbox-stage",
           "lightbox-close", "lightbox-prev", "lightbox-next".
   Does  : opens the clicked image large; previous/next buttons and the
           arrow keys move through the images; Esc or a click on the
           dark backdrop closes it (the browser's <dialog> handles Esc
           and returning focus).
   Large image: data-full="path" on the button, else the thumbnail's own src.
   -------------------------------------------------------------------------- */
function initGallery() {
  var dialog = hook('lightbox');
  var stage = hook('lightbox-stage');
  var items = document.querySelectorAll('[data-js="gallery-item"]');
  if (!dialog || !stage || !items.length || typeof dialog.showModal !== 'function') return;

  var current = 0;

  function show(index) {
    current = (index + items.length) % items.length;
    var item = items[current];
    var thumb = item.querySelector('img');
    stage.textContent = '';
    if (thumb) {
      var big = document.createElement('img');
      big.className = 'lightbox__img';
      big.src = item.getAttribute('data-full') || thumb.currentSrc || thumb.src;
      big.alt = thumb.alt;
      stage.appendChild(big);
    } else if (item.firstElementChild) {
      stage.appendChild(item.firstElementChild.cloneNode(true));  // placeholder box
    }
  }

  Array.prototype.forEach.call(items, function (item, index) {
    item.addEventListener('click', function () {
      show(index);
      dialog.showModal();
    });
  });

  var close = hook('lightbox-close');
  var prev = hook('lightbox-prev');
  var next = hook('lightbox-next');
  if (close) close.addEventListener('click', function () { dialog.close(); });
  if (prev) prev.addEventListener('click', function () { show(current - 1); });
  if (next) next.addEventListener('click', function () { show(current + 1); });

  dialog.addEventListener('click', function (event) {
    if (event.target === dialog) dialog.close();   // click on the backdrop
  });
  dialog.addEventListener('keydown', function (event) {
    if (event.key === 'ArrowLeft') show(current - 1);
    if (event.key === 'ArrowRight') show(current + 1);
  });
}

/* --------------------------------------------------------------------------
   BEHAVIOR: mark the current page in the menu and sitemap
   Needs : data-js="nav-list" and data-js="sitemap-list" (the <ul> elements).
   Does  : sets aria-current="page" on the link whose page matches the
           address bar. Links with a #hash are skipped (they point inside
           a page, not to the page itself).
   Why   : keeps the header and footer IDENTICAL on every page.
   -------------------------------------------------------------------------- */
function initCurrentPage() {
  // A page is identified by its name: ?p=contact (query routing), /contact (clean URLs) or contact.html (plain files).
  function pageKey(a) {
    var m = /(?:^|[?&])p=([a-z0-9-]+)/.exec(a.search);
    if (m) return m[1];
    if (/\/$/.test(a.pathname)) return 'index';
    return a.pathname.split('/').pop().replace(/\.(php|html)$/, '') || 'index';
  }
  var here = pageKey(window.location);
  var links = document.querySelectorAll('[data-js="nav-list"] a, [data-js="sitemap-list"] a');

  Array.prototype.forEach.call(links, function (link) {
    if (link.hash) return;
    if (pageKey(link) === here) {
      link.setAttribute('aria-current', 'page');
      // A link inside a submenu: mark its parent link too, so the menu shows which branch you are in.
      var branch = link.closest ? link.closest('.nav__sub') : null;
      if (branch) branch.parentNode.querySelector('.nav__link').setAttribute('aria-current', 'true');
    }
  });
}

/* --------------------------------------------------------------------------
   BEHAVIOR: cookie banner and analytics (opt-in)
   Needs : data-js="consent" (banner, hidden), "consent-accept", "consent-reject",
           and "consent-open" (footer link). Settings: window.SITE_CONFIG.analytics
           ({ ga4, metaPixel }) printed by partials/head.php.
   Does  : no saved choice = show the banner. Accept = save "granted" and load the
           tools. Reject = save "denied" (nothing loads). A returning visitor who
           accepted gets the tools loaded; one who rejected sees nothing.
           Changing from accepted to rejected removes the tool cookies and reloads.
   Why   : analytics cookies need permission first; the choice stays in this browser.
   -------------------------------------------------------------------------- */
function initConsent() {
  var cfg = (window.SITE_CONFIG && window.SITE_CONFIG.analytics) || {};
  if (!cfg.ga4 && !cfg.metaPixel) return;

  var banner = hook('consent');
  var KEY = 'site-consent';
  var loaded = false;

  function read() { try { return window.localStorage.getItem(KEY); } catch (e) { return null; } }
  function write(value) { try { window.localStorage.setItem(KEY, value); } catch (e) {} }

  function addScript(src) {
    var s = document.createElement('script');
    s.async = true;
    s.src = src;
    document.head.appendChild(s);
  }

  function loadTools() {
    if (loaded) return;
    loaded = true;
    if (cfg.ga4) {
      window.dataLayer = window.dataLayer || [];
      window.gtag = function () { window.dataLayer.push(arguments); };
      window.gtag('js', new Date());
      window.gtag('config', cfg.ga4);
      addScript('https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(cfg.ga4));
    }
    if (cfg.metaPixel) {
      var n = window.fbq = function () {
        if (n.callMethod) { n.callMethod.apply(n, arguments); } else { n.queue.push(arguments); }
      };
      if (!window._fbq) window._fbq = n;
      n.push = n; n.loaded = true; n.version = '2.0'; n.queue = [];
      addScript('https://connect.facebook.net/en_US/fbevents.js');
      window.fbq('init', cfg.metaPixel);
      window.fbq('track', 'PageView');
    }
  }

  function clearToolCookies() {
    var host = window.location.hostname.split('.');
    var domains = [''];
    for (var i = 0; i < host.length - 1; i++) domains.push('; domain=.' + host.slice(i).join('.'));
    document.cookie.split(';').forEach(function (pair) {
      var name = pair.split('=')[0].replace(/^\s+/, '');
      if (!/^(_ga|_gid|_gat|_fbp|_fbc)/.test(name)) return;
      domains.forEach(function (d) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/' + d;
      });
    });
  }

  function show(focus) {
    if (!banner) return;
    banner.hidden = false;
    if (focus) { var first = hook('consent-accept'); if (first) first.focus(); }
  }
  function hide() { if (banner) banner.hidden = true; }

  var saved = read();
  if (saved === 'granted') loadTools();
  else if (saved === null) show(false);

  var accept = hook('consent-accept');
  var reject = hook('consent-reject');
  var open = hook('consent-open');
  if (accept) accept.addEventListener('click', function () { write('granted'); hide(); loadTools(); });
  if (reject) reject.addEventListener('click', function () {
    var was = read();
    write('denied');
    hide();
    if (was === 'granted') { clearToolCookies(); window.location.reload(); }
  });
  if (open) open.addEventListener('click', function () { show(true); });
}

/* --------------------------------------------------------------------------
   BEHAVIOR: swipe row with arrow buttons (.tiles)
   Needs : data-js="tiles" on the scrolling <ul>; inside the same wrapper
           data-js="tiles-controls" (the button group) holding
           data-js="tiles-prev" and data-js="tiles-next".
   Does  : each click scrolls one tile; a button is disabled at its end; the
           whole button group hides when every tile already fits.
   Why   : the row scrolls and swipes without this file; the arrows are an extra
           (CSS only shows the buttons when JavaScript runs).
   -------------------------------------------------------------------------- */
function initTiles() {
  var rows = document.querySelectorAll('[data-js="tiles"]');
  Array.prototype.forEach.call(rows, function (row) {
    var wrap = row.parentNode;
    var controls = wrap.querySelector('[data-js="tiles-controls"]');
    var prev = wrap.querySelector('[data-js="tiles-prev"]');
    var next = wrap.querySelector('[data-js="tiles-next"]');
    if (!controls || !prev || !next) return;

    function stepSize() {
      var tile = row.firstElementChild;
      var gap = parseFloat(window.getComputedStyle(row).columnGap) || 0;
      return tile ? tile.getBoundingClientRect().width + gap : row.clientWidth;
    }
    function update() {
      controls.hidden = row.scrollWidth <= row.clientWidth + 1;
      prev.disabled = row.scrollLeft <= 1;
      next.disabled = row.scrollLeft + row.clientWidth >= row.scrollWidth - 1;
    }
    prev.addEventListener('click', function () { row.scrollBy({ left: -stepSize() }); });
    next.addEventListener('click', function () { row.scrollBy({ left: stepSize() }); });
    row.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
    update();
  });
}

/* --------------------------------------------------------------------------
   INIT: run every behavior once
   -------------------------------------------------------------------------- */
function init() {
  initFeatures();
  markJsEnabled();
  initNavToggle();
  initSubmenus();
  initCurrentPage();
  initYear();
  initBackgroundVideos();
  initGallery();
  initForms();
  initLottie();
  initConsent();
  initTiles();
}

init();
