# Name index

Every structure we built has ONE name. Use the name when you ask for it ("add Floating proof cards after Hero image on the Home page"). The list is A to Z. Class names in the code do not change; the name is how we talk about it.

## Rules

1. A name is short, Title Case and unique in this list. Families share a first word so they sit together: Hero (giant type, image, video), Timeline (itinerary, process), Contact (band, split), Logo (bar, strip), Stats (card, strip), FAQ (numbered).
2. Never rename a structure that is already used. If a rename is unavoidable, keep the old name in "Also called".
3. A new structure is not finished until it has a name here, a row in `docs/2026-11-12_Patterns.md`, and a block in the Patterns catalog. Keep every list in the template A to Z (menus for clients keep the visitor's order: Home first).
4. "Old" numbers (like 5.16) are the retired catalog numbers; they appear in earlier chats and notes only.

## Index

| Name | Kind | Class or file | What it is | Also called |
|---|---|---|---|---|
| 404 page | Page | `pages/404.php` | Page not found |  |
| About me | Section | `section--about-me` | Sticky portrait + story | About me (old 5.20) |
| About me page | Page | `pages/about-me.php` | Personal-brand page: portrait, story, offerings, logo bar |  |
| About text | Section | `section--about` (Home) | Heading + one paragraph | About (old Home 5.2) |
| Admissions page | Page | `pages/admissions.php` | Dates, tuition, FAQ, inquiry form |  |
| All-pages index | Page | `pages/all-pages.php` | Index of every page, grouped, A to Z | All pages |
| Author box | Component | `.author` | Small author box under an article |  |
| Avatar row | Component | `.avatar-row` | Row of round logos or initials |  |
| Badge | Component | `.badge` | Small label (New, Sale, ready) |  |
| Bento grid | Section | `section--bento` | Mosaic of tiles in different sizes | Bento (old 5.19) |
| Blog page | Page | `pages/blog.php` | Post list, categories, newsletter |  |
| Blog post page | Page | `pages/post.php` | Article template (copy per post) | Post |
| Breadcrumb | Component | `.breadcrumb` | Trail of links above the page title |  |
| Button | Component | `.btn` | Primary, light and other buttons |  |
| Call to action | Section | `section--cta` | Colored band: one line, one sentence, one button, above the footer | CTA band (old 5.15) |
| Card | Component | `.card` | Plain card |  |
| Chat bubble | Page frame | `.chat-bubble` | Floating WhatsApp button, bottom of every page |  |
| Chips | Component | `.chips` | Category links as small pills |  |
| Company details | Component | `.company` | Name, address, phone, email (footer) |  |
| Complete form | Component | `pages/forms.php` #complete-form | Form with every field type |  |
| Contact band | Section | `section--contact` (Home) | Closing heading, text, button | Contact / call to action (old Home 5.8) |
| Contact form | Component | `form[data-js=form]` in `pages/contact.php` | Short form: name, email, message |  |
| Contact page | Page | `pages/contact.php` | Contact split, steps, FAQ |  |
| Contact split | Section | `section--contact-form` | Form left; details and map right | Contact + form + map (old 5.14) |
| Cookie banner | Page frame | `partials/consent.php` | Accept / Reject banner; Reject loads nothing |  |
| Dark section | Section | `section--dark`, `.theme-dark` | Any band (or the whole site) flipped to the dark colors | Dark theme, theme switch (old 5.22) |
| Editorial rows | Section | `.rows` | Section label + thin-lined rows: number, title, text, arrow | Rows (old 5.24) |
| Facts | Component | `.facts` | Short label / value list (ages, dates, size) |  |
| FAQ | Section | `section--faq` | Questions that open and close, no JavaScript | (old 5.7) |
| FAQ numbered | Section | `section--faq` + `.faq--numbered` | The FAQ with 01, 02, 03 in front | Numbered FAQ (old 5.27b) |
| Featured post | Component | `.post--featured` | Big first post of a blog |  |
| Features grid | Section | `section--features` (Home) | Heading + card grid | Features (old Home 5.3) |
| Figure | Component | `.figure` | Image frame with fixed shape (4:3, portrait, tall) |  |
| Float card | Component | `.float-card` | One small card inside a Float cluster |  |
| Float cluster | Component | `.float-cluster` | Separate rounded cards over a centered pale panel smaller than the group; layout options: --mirrored, --spotlight, --stair, --tall |  |
| Floating proof cards | Section | `section--float-cards` | Dark score card, sources card with round logos, meter panel | (old 5.29) |
| Floating proof cards mirrored | Section | `section--float-cards` + `.float-cluster--mirrored` | Floating proof cards with another layout: the wide meter panel on top; score and sources below it |  |
| Floating proof cards spotlight | Section | `section--float-cards` + `.float-cluster--spotlight` | Floating proof cards with another layout: a wide score card on top; sources and meters share the row below |  |
| Floating proof cards stair | Section | `section--float-cards` + `.float-cluster--stair` | Floating proof cards with another layout: three rows, cards stepping left, right, left |  |
| Floating proof cards tall | Section | `section--float-cards` + `.float-cluster--tall` | Floating proof cards with another layout: a tall score card on the left; sources and meters stacked on the right |  |
| Footer | Page frame | `section--footer` | Logo, sitemap, company info, social, legal line |  |
| Form | Component | `.form` | Field, label, error and status styles |  |
| Form kit | Page | `pages/forms.php` | Complete form and Newsletter signup | Forms |
| Gallery viewer | Section | `section--gallery` | Photo grid that opens a large viewer | Gallery with viewer (old 5.11) |
| Glass card | Component | `.glass-card` | Frosted panel over a photo |  |
| Glass form | Section | `section--glass` | Request form on a frosted panel over a photo | Glass form card (old 5.27) |
| Header | Page frame | `section--header` | Logo, menu, social icons |  |
| Hero giant type | Section | `section--hero-type` | Huge headline with a portrait photo overlapping it | Giant-type hero (old 5.28) |
| Hero image | Section | `section--hero-image` | Big type over one still photo, no video | Image hero (big type) (old 5.16) |
| Hero video | Section | `section--hero` (Home) | Video background, promise, button, pause button | Hero (old Home 5.1) |
| Home page | Page | `pages/index.php` | Hero video through Contact band |  |
| Icons | Section | `.icon`, `assets/icons/sprite.svg` | The line-icon set | (old 5.12) |
| Image + text | Section | `section--image-text` (Home) | Image left, text right | (old Home 5.4) |
| Lead | Component | `.lead` | Larger intro paragraph |  |
| Legal links | Component | `.legal` | Privacy and terms links (footer line) |  |
| Lightbox | Component | `.lightbox` | Large-photo viewer (a `<dialog>`) |  |
| List | Component | `.list` | Plain bulleted list |  |
| Logo | Component | `.logo` | Site logo, placeholder until a real file exists |  |
| Logo bar | Section | `section--logo-bar` | Thin band of logos right under a hero | Hero + logo bar (old 5.17) |
| Logo strip | Section | `section--logos` | Row of partner, client or press logos | (old 5.9) |
| Lottie | Section | `.lottie` | Small animation: icon or loader | (old 5.13) |
| Media background | Component | `.media-bg` | Photo or video behind a section |  |
| Media toggle | Component | `.media-toggle` | Pause / play button for a moving background |  |
| Menu | Page frame | `.nav` | Main menu with one level of children |  |
| Meta line | Component | `.meta` | Author, date, reading time |  |
| Meter list | Component | `.meter-list` | Rows of label, five-segment bar, status word |  |
| News cards | Section | `section--news` | Cards with date, title, excerpt, link | News / events (old 5.10) |
| Newsletter signup | Component | `pages/forms.php` #newsletter | One field, one button |  |
| Offerings | Section | `section--offerings` | Numbered rows: what you do for the reader | (old 5.20b) |
| Page banner | Section | `section--page-banner` | Top of every inner page: breadcrumb, h1, intro | Inner-page banner (old 5.1) |
| Pagination | Component | `.pagination` | Previous / next page links |  |
| Patterns catalog | Page | `pages/patterns.php` | Every section, A to Z, ready to copy | Patterns |
| Person card | Component | `.person` | Round photo, name, role |  |
| Post card | Component | `.post` | Card with date, title, excerpt |  |
| Price | Component | `.price` | Price with optional old price |  |
| Privacy page | Page | `pages/privacy.php` | Structure only, not legal advice |  |
| Product card | Component | `.card.product` | One product in the store grid |  |
| Program cards | Section | `section--programs` | School program cards, one block per level | Program cards (schools) (old 5.21) |
| Programs page | Page | `pages/programs.php` | Program cards per level |  |
| Project cards | Section | `section--projects` | Portfolio cards, each linking to a project | (old 5.18) |
| Project page | Page | `pages/project.php` | Case-study template (copy per project) | Project |
| Prose | Component | `.prose` | Long article text at a readable width |  |
| Pull quote | Section | `section--quote` | One large statement with attribution | (old 5.5) |
| Score | Component | `.score` | One big figure with a short line and check icon |  |
| Section label | Component | `.section-label` | Small "03 / Selected work" tag above a heading |  |
| Sitemap block | Component | `.sitemap` | Footer links built from the menu |  |
| Social icons | Component | `.social` | Facebook, Instagram, LinkedIn icons |  |
| Stat | Component | `.stat` | One big number: value, label, source |  |
| Stats card | Section | `section--stats-card` | Card of figures rising over the hero above it | Stats card over the hero (old 5.23) |
| Stats strip | Section | `section--stats` | Big numbers with labels and sources | (old 5.3) |
| Steps | Section | `section--steps` | Numbered steps (numbers from CSS) | Steps / timeline (old 5.6) |
| Store page | Page | `pages/store.php` | Store design; cart and checkout not built |  |
| Summary box | Component | `.summary` | Order total box |  |
| Table | Component | `.table` | Data table that scrolls sideways on phones |  |
| Tall tiles | Section | `section--tiles` | Tall photo tiles in a swipe row, caption on the foot | Tall tiles + swipe row (old 5.25) |
| Team cards | Section | `section--team` | Round photo, name, role | (old 5.8) |
| Team page | Page | `pages/team.php` | People cards, testimonials |  |
| Terms page | Page | `pages/terms.php` | Structure only, not legal advice |  |
| Testimonial card | Component | `.testimonial` | One real quote with its author |  |
| Testimonials | Section | `section--testimonials` | Grid of testimonial cards | (old 5.4) |
| Text + image | Section | `section--text-image` (Home) | Text left, image right | (old Home 5.5) |
| Thumbs | Component | `.thumbs` | Small photos under a main product photo |  |
| Timeline | Component | `.timeline` | Line with markers; `--numbered`, `--horizontal` |  |
| Timeline itinerary | Section | `section--itinerary` | Vertical dotted timeline: days or years | Itinerary timeline (old 5.26b) |
| Timeline process | Section | `.timeline--numbered.timeline--horizontal` | How you work, one numbered row from tablets up | Process timeline (old 5.26a) |
| Toolbar | Component | `.toolbar` | Search and sort above a list |  |
| Triple lists | Section | `section--lists` (Home) | Three rows: heading / two bullet lists / text + button | Lists (old Home 5.7) |
| Video divider | Section | `section--divider` (Home) | Video band with a short message | Divider (old Home 5.6) |
| Work page | Page | `pages/projects.php` | Portfolio: project cards | Projects |

Kinds: **Component** = small building block used inside sections. **Page** = a file in `pages/`. **Page frame** = on every page. **Section** = a full-width band you copy into a page.
