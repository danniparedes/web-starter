/* ==========================================================================
   FEATURES — applies the true/false switches before the page is drawn.
   Needs : window.SITE_CONFIG = { features: { name: true|false } } loaded first
           (js/site-config.js on static pages, an inline script on .php pages).
   Does  : adds CSS that hides every [data-feature="name"] whose switch is false.
           (js/main.js then removes those elements: initFeatures.)
   Not deferred on purpose: it must run in <head> so nothing flashes.
   ========================================================================== */
(function () {
  var features = (window.SITE_CONFIG && window.SITE_CONFIG.features) || {};
  var css = '';
  Object.keys(features).forEach(function (name) {
    if (features[name] === false) css += '[data-feature="' + name + '"]{display:none!important}';
  });
  if (css) {
    var style = document.createElement('style');
    style.textContent = css;
    document.head.appendChild(style);
  }
})();
