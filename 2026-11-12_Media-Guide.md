# Media guide (quick reference)

One page for creating any media file for the starter: images, video, icons, SVG, Lottie. Exact sizes per slot are in `docs/2026-11-12_Media-Specs.md` (the sheet you send to clients). This page is for you.

Quality numbers below (CRF, quality 80, etc.) are **starting points**, not rules. Tune them per project and note the result.

---

## 1. At a glance

| Media | Master size | Format | Folder | Name example |
|---|---|---|---|---|
| Hero video | 1920 x 1080 (16:9) | MP4 + WebM, no audio | `assets/video/` | `hero.mp4`, `hero.webm` |
| Hero video, phone | 1280 x 720 | MP4 | `assets/video/` | `hero-1280.mp4` |
| Hero poster | 1920 x 1080 | JPG or WebP | `assets/img/` | `hero-poster.jpg` |
| Divider video | 1920 x 800 (12:5) | MP4 + WebM | `assets/video/` | `divider.mp4` |
| Divider video, phone | 1280 x 534 | MP4 | `assets/video/` | `divider-1280.mp4` |
| Divider poster | 1920 x 800 | JPG or WebP | `assets/img/` | `divider-poster.jpg` |
| Image hero (no video) | 1920 x 1200 (16:10) | JPG or WebP | `assets/img/` | `hero-image.jpg` |
| Project card / project image | 1200 x 800 (3:2) | JPG or WebP | `assets/img/` | `project-name.jpg` |
| Project cover (detail page) | 1280 x 720 (16:9) | JPG or WebP | `assets/img/` | `project-name-cover.jpg` |
| About-me portrait | 960 x 1200 (4:5) | JPG or WebP | `assets/img/` | `portrait.jpg` |
| Bento tile photo | 1600 x 1600 (1:1) | JPG or WebP | `assets/img/` | `bento-1.jpg` |
| Tall tile photo (swipe row) | 900 x 1200 (3:4) | JPG or WebP | `assets/img/` | `tile-1.jpg` |
| Glass-form background | 1920 x 1200 (16:10) | JPG or WebP | `assets/img/` | `glass-bg.jpg` |
| Giant-type hero photo | 960 x 1200 (4:5) | JPG or WebP | `assets/img/` | `hero-type.jpg` |
| Source logo (floating proof card) | 96 x 96 (1:1) | PNG, SVG or WebP | `assets/img/` | `source-1.svg` |
| Card / news image | 1200 x 900 (4:3) | JPG or WebP | `assets/img/` | `news-spring-fair.jpg` |
| Gallery image | 1600 x 1200 (4:3) | JPG or WebP | `assets/img/` | `gallery-01.jpg` |
| Team photo | 800 x 800 (1:1) | JPG or WebP | `assets/img/` | `team-ana-lopez.jpg` |
| Logo | vector | SVG (+ PNG for email) | `assets/img/` | `logo.svg` |
| Partner logos | height 48 | SVG or PNG, transparent | `assets/img/` | `partner-name.svg` |
| Favicon / app icon | 512 x 512 | PNG | `assets/img/` | `favicon.png` |
| iPhone home-screen icon | 180 x 180 | PNG | `assets/img/` | `apple-touch-icon.png` |
| Share image (social preview) | 1200 x 630 | JPG or PNG | `assets/img/` | `share.jpg` |
| Icons | 24 x 24 grid | SVG, line, 1.5 stroke | `assets/icons/` | `sprite.svg` |
| Lottie icon | 256 x 256 | `.lottie` (or `.json`) | `assets/lottie/` | `icon-check.lottie` |
| Lottie large | 1024 x 1024 | `.lottie` (or `.json`) | `assets/lottie/` | `loader.lottie` |

**File names:** lowercase, words separated by hyphens, no spaces, no accents (`team-ana-lopez.jpg`, never `Foto Ana 2.JPG`).

---

## 2. Images

**Rules**
1. Crop to the slot's shape first (see table), then export at the master size.
2. Keep the subject near the center: the CSS crops with `object-fit: cover`, so edges can disappear on other screens.
3. Every `<img>` gets `width`, `height` and `alt`. Decorative image: `alt=""`.
4. Below the first screen add `loading="lazy"`. The hero image does not get it.

**Create**
- Photos: export JPG (starting point: quality 80), then make WebP from it.
- Convert with Squoosh (free, in the browser) or the command line:
  ```
  cwebp -q 80 input.jpg -o output.webp
  ```
- AVIF is optional per project (see Media-Specs, "Decided per project").

**Markup**
```html
<figure class="figure">
  <img class="figure__img" src="assets/img/news-spring-fair.jpg"
       alt="Students planting trees at the spring fair"
       width="1200" height="900" loading="lazy">
</figure>
```
With formats fallback (WebP, then JPG):
```html
<picture>
  <source srcset="assets/img/news-spring-fair.webp" type="image/webp">
  <img class="figure__img" src="assets/img/news-spring-fair.jpg"
       alt="Students planting trees at the spring fair"
       width="1200" height="900" loading="lazy">
</picture>
```
Variants: `figure--square` (1:1), `figure--wide` (16:9), `figure--banner` (12:5), `figure--portrait` (4:5), `figure--project` (3:2), `figure--tall` (3:4).

Photos behind text (image hero, glass form) go inside `.media-bg` as `<img class="media-bg__img" alt="">`. Text over them is white on a dark overlay: avoid very bright photos and re-check contrast with the real photo.

---

## 3. Background video (hero and divider)

**Rules**
1. No audio. Short loop. Calm footage (text must stay readable; the dark overlay helps).
2. The poster is the video's **first frame**, same size as the video.
3. Always two formats (WebM + MP4) and a 1280 MP4 for phones.
4. A pause button is required (moving content that starts by itself). The starter already has one.
5. Visitors with "reduce motion" or data-saver on see the poster only.

**Create** (needs ffmpeg; these commands are starting points)
```
# Hero MP4, 1920 x 1080
ffmpeg -i source.mov -vf "scale=1920:1080:force_original_aspect_ratio=increase,crop=1920:1080" -an -c:v libx264 -crf 23 -preset veryfast -pix_fmt yuv420p -movflags +faststart hero.mp4

# Hero WebM
ffmpeg -i source.mov -vf "scale=1920:1080:force_original_aspect_ratio=increase,crop=1920:1080" -an -c:v libvpx-vp9 -crf 32 -b:v 0 hero.webm

# Phone version, 1280 x 720
ffmpeg -i source.mov -vf "scale=1280:720:force_original_aspect_ratio=increase,crop=1280:720" -an -c:v libx264 -crf 26 -preset veryfast -pix_fmt yuv420p -movflags +faststart hero-1280.mp4

# Poster = first frame
ffmpeg -i hero.mp4 -frames:v 1 -q:v 2 hero-poster.jpg
```
Divider: same commands with `1920:800` (phone `1280:534`).

**Markup:** already in `index.html` (hero and divider). The attribute `data-src-small` points to the phone file.

---

## 4. Icons (line set)

**Rules**
- Line style, 24 x 24 grid, 1.5 stroke, round ends, no fill, SVG only.
- Colored by the text color (`currentColor`): never hard-code a color inside an icon.
- Sizes: `.icon--small` (1rem), `.icon` (1.25rem), `.icon--large` (2rem).

**Add a new icon**
1. Draw it on a 24 x 24 grid (Figma, Illustrator, Affinity).
2. Export SVG, keep only the `<path>`, `<circle>`, `<rect>` shapes.
3. In `assets/icons/sprite.svg` add `<symbol id="icon-NAME" viewBox="0 0 24 24"> ... </symbol>`.
4. Paste the same symbol into the sprite block at the top of each page that uses it (needed when opening files directly; on a server you can link the file instead).

**Markup**
```html
<svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-mail"></use></svg>
```
An icon that carries meaning alone (no text beside it): use `role="img" aria-label="Email"` instead of `aria-hidden`.

---

## 5. SVG (logos and illustrations)

- Logos: always SVG. Keep a PNG copy for email and social.
- Clean before use (removes editor leftovers): `npx svgo logo.svg`.
- Give the `<svg>` or `<img>` explicit `width` and `height`.
- Inline an SVG only when CSS must change its color; otherwise use `<img src="...svg">`.
- Never rely on text inside an SVG: convert text to outlines, or keep it as real HTML text.

---

## 6. Lottie animations

**Use for:** small animated icons and loaders. A banner animation is possible later.

**Rules**
1. Prefer `.lottie` (dotLottie, smaller) over `.json`.
2. Icons play **once**. Loaders loop only while loading.
3. A looping animation longer than 5 seconds needs a pause button.
4. With "reduce motion" on, the starter removes autoplay and loop (still frame).
5. Keep the file light: few layers, no embedded raster images when avoidable.

**Create**
- After Effects: export with the Bodymovin/LottieFiles plugin.
- Figma: LottieFiles plugin.
- Existing animations: LottieFiles library (check each animation's licence before client use).
- Convert `.json` to `.lottie` in the LottieFiles tools.

**Markup**
```html
<div class="lottie">
  <dotlottie-wc data-js="lottie" src="assets/lottie/icon-check.lottie" autoplay></dotlottie-wc>
</div>
```
`js/main.js` loads the player only on pages that contain `data-js="lottie"`. The player is pinned to one version there; self-host it for production (see Conventions section 14).

---

## 7. Before you publish: media checklist

- [ ] Each file matches its slot (shape and master size)
- [ ] File names: lowercase, hyphens, no spaces
- [ ] Every `<img>` has `width`, `height`, `alt`; below the fold uses `loading="lazy"`
- [ ] Videos: no audio, poster = first frame, 1280 phone version present
- [ ] Icons come from the sprite, line style, no stray emoji or PNG icons
- [ ] Lottie: icons play once; any loop over 5 s has a pause button
- [ ] Rights: client confirmed they own or may use every photo, video and animation

---

## Sources (checked 2026-11-12)
- Pause/stop/hide rule for moving content: https://www.w3.org/WAI/WCAG22/Understanding/pause-stop-hide
- Lottie player: https://www.npmjs.com/package/@lottiefiles/dotlottie-wc and https://github.com/LottieFiles/dotlottie-web
- AVIF in WordPress: https://make.wordpress.org/core/2024/02/23/wordpress-6-5-adds-avif-support/
- Share image size (checked 2026-11-13): Facebook says at least 1200 x 630 for the best display, minimum 200 x 200, up to 8 MB: https://developers.facebook.com/docs/sharing/webmasters/images
- iPhone touch icon 180 x 180 (checked 2026-11-13; Apple's page is in its archive, not updated): https://developer.apple.com/library/archive/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html
