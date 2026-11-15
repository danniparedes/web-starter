<?php
/* FORMS — Form kit. Header, footer, menu and chat bubble come from partials/ and config/site.php.
   Edit the content between <main> and </main>. */
require_once dirname(__DIR__) . '/php/bootstrap.php';
$page = ['id' => 'forms', 'title' => 'Form kit', 'description' => 'Every form field type, ready to keep or delete.', 'noindex' => true];
require SITE_ROOT . '/partials/head.php';
?>
<body>

<?php require SITE_ROOT . '/partials/header.php'; ?>

  <main id="main">

    <!-- INNER-PAGE BANNER -->
    <section class="section section--page-banner" id="page-banner" aria-labelledby="page-title">
      <div class="column stack">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?= url('index') ?>">Home</a></li>
            <li aria-current="page">Form kit</li>
          </ol>
        </nav>
        <h1 id="page-title">Form kit</h1>
        <p class="lead">Every field type a project usually needs. Keep the groups you need, delete the rest.</p>
      </div>
    </section>

    <!-- HOW TO TRIM -->
    <section class="section" id="how-to-use" aria-labelledby="how-to-use-title">
      <div class="column column--narrow stack">
        <h2 id="how-to-use-title">How to use this kit</h2>
        <ol class="list">
          <li>Copy the whole <code>&lt;form&gt;</code> into your page.</li>
          <li>To hide a group without deleting it, set its switch to <code>false</code> in <code>js/site-config.js</code> (for example <code>'form.address': false</code>). Set it back to <code>true</code> to show it again.</li>
          <li>Each block between <code>GROUP n</code> comments is one <code>&lt;fieldset class="form__group"&gt;</code>. Delete the blocks you do not need; a single field can be deleted on its own too.</li>
          <li>Required fields: add <code>required</code> to the control and <code>form__label--required</code> to its label.</li>
          <li>Field names (<code>name="..."</code>) are what the PHP side receives. Keep them stable once PHP exists.</li>
          <li>The spam-trap field is named <code>website</code>, so the real web address field is called <code>website_url</code>.</li>
        </ol>
      </div>
    </section>

    <!-- COMPLETE FORM -->
    <section class="section section--alt" id="complete-form" aria-labelledby="complete-form-title">
      <div class="column column--narrow stack">
        <h2 id="complete-form-title">Complete form</h2>
        <p class="form__hint">Fields marked * are required. This demo does not send anything (data-demo); remove that attribute on a real form.</p>

        <!-- enctype="multipart/form-data" is only needed when the form has a file field (GROUP 6). -->
        <form class="form form--groups" action="php/handlers/contact.php" method="post" enctype="multipart/form-data" data-js="form"
              data-success="Thank you! We received your message and will reply soon.">

          <!-- GROUP 1 — ABOUT YOU -->
          <fieldset class="form__group" data-feature="form.aboutYou">
            <legend class="form__legend">About you</legend>
            <div class="form__row">
              <div class="form__field">
                <label class="form__label form__label--required" for="fk-first-name">First name</label>
                <input class="form__control" id="fk-first-name" name="first_name" type="text" autocomplete="given-name" required>
              </div>
              <div class="form__field">
                <label class="form__label form__label--required" for="fk-last-name">Last name</label>
                <input class="form__control" id="fk-last-name" name="last_name" type="text" autocomplete="family-name" required>
              </div>
            </div>
            <div class="form__row">
              <div class="form__field">
                <label class="form__label form__label--required" for="fk-email">Email</label>
                <input class="form__control" id="fk-email" name="email" type="email" autocomplete="email" required>
              </div>
              <div class="form__field">
                <label class="form__label" for="fk-phone">Phone</label>
                <input class="form__control" id="fk-phone" name="phone" type="tel" autocomplete="tel" aria-describedby="fk-phone-hint">
                <p class="form__hint" id="fk-phone-hint">Include the country code.</p>
              </div>
            </div>
            <div class="form__row">
              <div class="form__field">
                <label class="form__label" for="fk-organization">Organization</label>
                <input class="form__control" id="fk-organization" name="organization" type="text" autocomplete="organization">
              </div>
              <div class="form__field">
                <label class="form__label" for="fk-website-url">Website</label>
                <input class="form__control" id="fk-website-url" name="website_url" type="url" autocomplete="url" aria-describedby="fk-website-hint">
                <p class="form__hint" id="fk-website-hint">Start with https://</p>
              </div>
            </div>
          </fieldset>

          <!-- GROUP 2 — YOUR REQUEST -->
          <fieldset class="form__group" data-feature="form.request">
            <legend class="form__legend">Your request</legend>
            <div class="form__field">
              <label class="form__label form__label--required" for="fk-subject">Subject</label>
              <select class="form__control" id="fk-subject" name="subject" required data-error="Please choose a subject.">
                <option value="">Choose one&hellip;</option>
                <option value="[option-1]">[Option 1]</option>
                <option value="[option-2]">[Option 2]</option>
                <option value="[option-3]">[Option 3]</option>
              </select>
            </div>
            <div class="form__field">
              <label class="form__label form__label--required" for="fk-message">Message</label>
              <textarea class="form__control form__control--area" id="fk-message" name="message" maxlength="500" required
                        data-counter="fk-count" aria-describedby="fk-count"></textarea>
              <p class="form__hint" id="fk-count">0 / 500</p>
            </div>
          </fieldset>

          <!-- GROUP 3 — DETAILS (dates, numbers, slider) -->
          <fieldset class="form__group" data-feature="form.details">
            <legend class="form__legend">Details</legend>
            <div class="form__row">
              <div class="form__field">
                <label class="form__label" for="fk-date">Preferred date</label>
                <input class="form__control" id="fk-date" name="date" type="date">
              </div>
              <div class="form__field">
                <label class="form__label" for="fk-time">Preferred time</label>
                <input class="form__control" id="fk-time" name="time" type="time">
              </div>
            </div>
            <div class="form__row">
              <div class="form__field">
                <label class="form__label" for="fk-quantity">Number of people</label>
                <input class="form__control" id="fk-quantity" name="quantity" type="number" min="1" max="10" step="1" inputmode="numeric">
              </div>
              <div class="form__field">
                <label class="form__label" for="fk-importance">Importance (1 = low, 5 = high)</label>
                <input class="form__control form__control--range" id="fk-importance" name="importance" type="range" min="1" max="5" step="1" value="3">
              </div>
            </div>
          </fieldset>

          <!-- GROUP 4 — CHOICES (radio buttons and checkboxes) -->
          <fieldset class="form__group" data-feature="form.preferences">
            <legend class="form__legend">Your preferences</legend>
            <fieldset class="form__choices form__choices--inline">
              <legend class="form__label form__label--required">How should we contact you?</legend>
              <label class="form__choice"><input type="radio" name="contact_method" value="email" required> Email</label>
              <label class="form__choice"><input type="radio" name="contact_method" value="phone"> Phone</label>
              <label class="form__choice"><input type="radio" name="contact_method" value="whatsapp"> WhatsApp</label>
            </fieldset>
            <fieldset class="form__choices">
              <legend class="form__label">What are you interested in?</legend>
              <label class="form__choice"><input type="checkbox" name="interests[]" value="option-a"> [Option A]</label>
              <label class="form__choice"><input type="checkbox" name="interests[]" value="option-b"> [Option B]</label>
              <label class="form__choice"><input type="checkbox" name="interests[]" value="option-c"> [Option C]</label>
            </fieldset>
          </fieldset>

          <!-- GROUP 5 — ADDRESS -->
          <fieldset class="form__group" data-feature="form.address">
            <legend class="form__legend">Address</legend>
            <div class="form__field">
              <label class="form__label" for="fk-street">Street address</label>
              <input class="form__control" id="fk-street" name="street" type="text" autocomplete="street-address">
            </div>
            <div class="form__row form__row--trio">
              <div class="form__field">
                <label class="form__label" for="fk-city">City</label>
                <input class="form__control" id="fk-city" name="city" type="text" autocomplete="address-level2">
              </div>
              <div class="form__field">
                <label class="form__label" for="fk-region">State / province</label>
                <input class="form__control" id="fk-region" name="region" type="text" autocomplete="address-level1">
              </div>
              <div class="form__field">
                <label class="form__label" for="fk-postal">Postal code</label>
                <input class="form__control" id="fk-postal" name="postal_code" type="text" autocomplete="postal-code">
              </div>
            </div>
            <div class="form__field">
              <label class="form__label" for="fk-country">Country</label>
              <select class="form__control" id="fk-country" name="country" autocomplete="country-name">
                <option value="">Choose one&hellip;</option>
                <option value="[country-1]">[Country 1]</option>
                <option value="[country-2]">[Country 2]</option>
              </select>
            </div>
          </fieldset>

          <!-- GROUP 6 — ATTACHMENT (needs enctype="multipart/form-data" on the form) -->
          <fieldset class="form__group" data-feature="form.attachment">
            <legend class="form__legend">Attachment</legend>
            <div class="form__field">
              <label class="form__label" for="fk-file">Upload a file</label>
              <input class="form__control" id="fk-file" name="attachment" type="file" accept=".pdf,.jpg,.jpeg,.png" aria-describedby="fk-file-hint">
              <p class="form__hint" id="fk-file-hint">PDF, JPG or PNG. Maximum size: [DECIDE per project; the PHP side must enforce it].</p>
            </div>
          </fieldset>

          <!-- GROUP 7 — CONSENT -->
          <fieldset class="form__group" data-feature="form.consent">
            <legend class="form__legend">Consent</legend>
            <div class="form__field">
              <label class="form__choice"><input type="checkbox" name="accept_terms" value="yes" required data-error="Please accept to continue."> <span>I accept the <a href="[Privacy policy URL]">privacy policy</a>.</span></label>
            </div>
            <div class="form__field">
              <label class="form__choice"><input type="checkbox" name="newsletter" value="yes"> <span>Send me news and updates by email.</span></label>
            </div>
          </fieldset>

          <!-- GROUP 8 — SECURITY (invisible fields + optional widget) -->
          <!-- Spam trap: hidden from people, bots tend to fill it. The PHP side rejects any message where it is not empty. -->
          <div class="visually-hidden" aria-hidden="true">
            <label>Leave this field empty <input name="website" type="text" tabindex="-1" autocomplete="off"></label>
          </div>
          <!-- Filled by PHP in the PHP stage (protects against forged requests). -->
          <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
          <!-- Where the visitor came from (useful in the notification email). -->
          <input type="hidden" name="source_page" value="<?= e($page['id']) ?>.php">
          <!-- OPTIONAL anti-spam widget (a CAPTCHA or similar). Delete this slot if not used. -->
          <div class="form__slot" data-slot="antispam" data-feature="form.antispam">[Anti-spam widget goes here, if the project needs one]</div>

          <div class="form__status" role="status" data-js="form-status" hidden></div>
          <div class="form__actions">
            <button class="btn btn--primary" type="submit" data-loading-label="Sending&hellip;">[Send]</button>
            <button class="btn btn--outline" type="reset">Clear form</button>
          </div>
        </form>
      </div>
    </section>

    <!-- NEWSLETTER SIGNUP — one field, one button -->
    <section class="section" id="newsletter" data-feature="newsletter" aria-labelledby="newsletter-title">
      <div class="column column--narrow stack">
        <h2 id="newsletter-title">Newsletter signup</h2>
        <p>One field and one button. Works in a band, a footer or a sidebar.</p>
        <form class="form form--inline" action="php/handlers/newsletter.php" method="post" data-js="form"
              data-success="Thanks for subscribing!">
          <div class="form__field">
            <label class="form__label form__label--required" for="nl-email">Email</label>
            <input class="form__control" id="nl-email" name="email" type="email" autocomplete="email" required>
          </div>
          <div class="visually-hidden" aria-hidden="true">
            <label>Leave this field empty <input name="website" type="text" tabindex="-1" autocomplete="off"></label>
          </div>
          <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
          <input type="hidden" name="source_page" value="<?= e($page['id']) ?>.php">
          <button class="btn btn--primary" type="submit" data-loading-label="Subscribing&hellip;">[Subscribe]</button>
          <div class="form__status" role="status" data-js="form-status" hidden></div>
        </form>
      </div>
    </section>

  </main>

<?php
require SITE_ROOT . '/partials/footer.php';
require SITE_ROOT . '/partials/chat-bubble.php';
require SITE_ROOT . '/partials/scripts.php';
?>
</body>
</html>
