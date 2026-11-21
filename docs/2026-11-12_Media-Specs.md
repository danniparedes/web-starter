# Media specs (send this to clients)

Every image, video and animation has one master size. Send files at these sizes or larger in the same shape; we resize and compress.

| Slot | Shape | Master size | Format | Notes |
|---|---|---|---|---|
| Hero video | 16:9 | 1920 x 1080 | MP4 (H.264) + WebM | Also a 1280 x 720 MP4 for phones. No audio. |
| Hero poster | 16:9 | 1920 x 1080 | JPG or WebP | Exactly the video's first frame. |
| Divider / banner video | 12:5 | 1920 x 800 | MP4 + WebM | Phone version 1280 x 534 MP4. |
| Divider poster | 12:5 | 1920 x 800 | JPG or WebP | First frame. |
| Image hero (no video) | 16:10 | 1920 x 1200 | JPG or WebP | Subject near the center; phones crop the sides. Text is white over a dark overlay, so avoid very bright photos. |
| Project card / project image | 3:2 | 1200 x 800 | JPG or WebP | Same crop for every project so the grid looks even. |
| Project cover (detail page) | 16:9 | 1280 x 720 | JPG or WebP | Same as the blog cover. |
| About-me portrait | 4:5 | 960 x 1200 | JPG or WebP | Face in the upper half. |
| Tall tile photo (swipe row) | 3:4 | 900 x 1200 | JPG or WebP | Keep the foot of the photo calm: the caption sits there. |
| Glass-form background | 16:10 | 1920 x 1200 | JPG or WebP | Landscape or interior; the panel and an overlay keep text readable. |
| Giant-type hero photo | 4:5 | 960 x 1200 | JPG or WebP | Overlaps the headline: subject in the middle, simple background. |
| Source logo (proof card) | 1:1 | 96 x 96 | PNG, SVG or WebP | Shown as a circle: keep the logo centered with margin. Only with the owner's permission. |
| Bento tile photo | 1:1 | 1600 x 1600 | JPG or WebP | Tiles have different shapes, so keep the subject in the middle. |
| Card / news / content image | 4:3 | 1200 x 900 | JPG or WebP | Subject kept near the center (edges may be cropped). |
| Gallery image | 4:3 | 1600 x 1200 | JPG or WebP | Opens large in the viewer. |
| Team photo | 1:1 | 800 x 800 | JPG or WebP | Same crop and background for the whole team. |
| Logo | any | vector | SVG | Plus a PNG for email. |
| Partner logos | any | height 48 | SVG or PNG | Transparent background. |
| Favicon / app icon | 1:1 | 512 x 512 | PNG | Simple shape, readable at tiny sizes. |
| Share image (social preview) | 1.91:1 | 1200 x 630 | JPG or PNG | Text kept away from the edges. |
| Icons | 1:1 | 24 x 24 grid | SVG | Line style, 1.5 stroke. |
| Lottie icon | 1:1 | 256 x 256 | .lottie (or .json) | Plays once. |
| Lottie large | 1:1 | 1024 x 1024 | .lottie (or .json) | Loops only if shorter than 5 s, or add a pause button. |

## Rules
1. Same shape as the table, or we crop to it.
2. Every `<img>` carries `width`, `height` and meaningful `alt` text (empty `alt=""` when purely decorative).
3. Everything below the first screen uses `loading="lazy"`.
4. Fonts: WOFF2 only.

## Decided per project
- **Formats:** JPG and WebP are the standard. AVIF is an optional upgrade, used when the host supports it (WordPress 6.5 or newer plus an ImageMagick build with AVIF) and the site is photo-heavy. Serve AVIF, then WebP, then JPG through `<picture>`.
- **File-size limits per slot:** set after the first real build, from measured file weights and page speed. Until then: [DECIDE per project].
