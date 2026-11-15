/* ==========================================================================
   SITE CONFIG — switches you can edit
   What   : true = show, false = hide. Edit a value, save, refresh the page.
   How    : an element is controlled when it carries data-feature="NAME" in
            the HTML. Switched off = hidden at once and removed from the page
            when it loads (so a hidden form field is never checked or sent).
   Rules  : - Not listed here = shown.
            - Names are case-sensitive.
            - Want to control something new? Add data-feature="myName" to the
              element and add  myName: true  below.
   Note   : the content stays in the page's source code. To remove something
            for good (legal text, private notes) delete it from the HTML.
   Loaded : in <head>, before the page is drawn (then js/features.js applies it).
   PHP    : on .php pages these switches come from config/site.php instead;
            this file is used by the static .html templates.
   ========================================================================== */
window.SITE_CONFIG = {
  features: {
    /* Floating chat button (every page) */
    chatBubble: true,

    /* Form kit (forms.html): one switch per group of fields */
    'form.aboutYou':     true,
    'form.request':      true,
    'form.details':      true,
    'form.preferences':  true,
    'form.address':      true,
    'form.attachment':   true,
    'form.consent':      true,
    'form.antispam':     true,

    /* Newsletter signup band (forms.html, blog.html) */
    newsletter: true,

    /* Store (store.html) */
    'store.filters': true,
    'store.cart':    true,
    'store.trust':   true,

    /* Blog post (post.html) */
    'post.author':  true,
    'post.related': true,

    /* School admissions (admissions.html) */
    'admissions.dates':   true,
    'admissions.tuition': true,
    'admissions.faq':     true,
    'admissions.form':    true
  }
};
