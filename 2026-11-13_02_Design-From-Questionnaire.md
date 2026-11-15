# From questionnaire to design

For Daniel. How to run the interview, turn the answers into design choices, and get the client's yes before building. Use it with `2026-11-13_01_Client-Questionnaire_EN.md`.

## 1. Run the interview

1. Send the questionnaire 2 to 3 days before a call. Let the client answer in writing, voice notes or on the call.
2. Hold a 30 minute call. Read the answers first. Ask only about vague answers: "Can you give me an example?"
3. Listen for repeated words. Words the client uses 3 times or more become the site's voice.
4. Anything with a number, date, price or award: ask for a document. No document, no publication.
5. Write the brand brief (section 6) within 2 days and send it for approval.

## 2. Answers to design choices

| Questionnaire | What you decide | Where it goes |
|---|---|---|
| Part 4 sliders | Overall style (see section 3) | whole design |
| Q10, Q14 (words, feelings) | Tone of headlines | `config/site.php`, page copy |
| Q23 to Q24 (colors) | Palette | `css/tokens.css` color variables |
| Q25 to Q26 (sites liked and disliked) | Layout density, photo use | page structure |
| Q27 to Q28 | Image style, light or dark | assets, `tokens.css` (dark: section 6b) |
| Q30 to Q32 (voice) | Voice rules (section 5) | all copy |
| Q8 (one action) | Main button on every page | `config/site.php` |
| Q40 (analytics) | Tracking IDs | `config/site.php > analytics` |

## 3. Sliders to style

Read each slider as a direction, not a rule. Average the six answers and look for strong ends (1 or 5).

| Slider | Low (1 to 2) | High (4 to 5) |
|---|---|---|
| Formal / Relaxed | Serif headings, wide margins, restrained color | Rounded shapes, friendly sans-serif, more color |
| Traditional / Modern | Classic type, symmetric layout | Large type, asymmetric layout, plenty of white space |
| Serious / Playful | Few colors, no illustration | Bright accents, illustration, light motion |
| Quiet / Energetic | Soft colors, slow or no animation | Strong contrast, bold headings |
| Premium / Accessible | Dark or muted palette, thin lines, little text | Warm colors, clear buttons, more photos of people |
| Classic / Bold | Neutral palette, one accent | Saturated palette, big shapes |

## 4. Color and type: starting points

These are working hypotheses from common design practice. They are not proven facts and they change with culture and context. Always confirm with the client's reaction to a real mock-up.

**Color starting points**

- Blue and green: calm, trust, stability. Common for schools and professional services.
- Red and orange: energy, warmth, urgency. Use as accent, rarely as the main color.
- Yellow: optimism. Hard to read as text, so use for shapes and highlights.
- Purple: creativity, dignity. Depends strongly on the shade.
- Black, white and one accent: authority, premium feel.
- Earth tones: natural, human, grounded.

**Type starting points**

- Serif headings: tradition, authority, legacy.
- Geometric sans-serif: modern, clear, friendly.
- Rounded sans-serif: approachable, playful.
- Very light weights: elegant but weak on small screens. Test first.

**Pairing rule:** one font for headings, one for body text, maximum. Set them in `--font-heading` and `--font-body` in `css/tokens.css`.

**Fonts and licences:** use Google Fonts or other open fonts, host the files yourself (WOFF2) as the Media Guide explains, and read the licence of each font before using it. Never assume a font is free for commercial use.

## 5. Voice rules

Write 5 to 8 rules from the client's own words and put them at the top of the copy document. Example format:

- We say "families", not "customers". (Q31)
- Short sentences. Active verbs. (Q30)
- Never use "world-class" or "cutting-edge". (Q32)
- Greeting style: warm and direct, like in Q30.

Copy checks: every claim has a document behind it, every page has one clear action, and the text sounds like Q34 when read aloud.

## 6. Contrast check (required)

Before the client sees colors, test every text and background pair.

- Normal text needs a contrast ratio of at least 4.5 to 1.
- Large text (18 pt or 24 px and up, or 14 pt bold and up) needs at least 3 to 1.

Source: W3C, WCAG 2.2 Understanding "Contrast (Minimum)", https://www.w3.org/wai/wcag22/understanding/contrast-minimum.html (also https://w3c.github.io/wcag/understanding/contrast-minimum.html), checked 2026-11-13.

Check the light palette and, if the site uses dark bands (section 6b), the dark palette too.

Use any contrast checker with the two hex codes. If a brand color fails, keep it for shapes and logos, and use a darker shade for text and buttons.

## 6b. Dark bands and dark theme

When the brief points to Premium or Quiet (sliders, section 3) or the client chose dark in Q28:

- Add `section--dark` to chosen sections (alternate dark and light bands), or `class="theme-dark"` on `<body>` for a fully dark site.
- Set the dark look only in the `--dark-*` tokens in `css/tokens.css`. Do not set colors inside a dark section.
- Re-run the contrast check (section 6) on every dark pair: text, muted text, the primary color on dark, and the error and success colors. The shipped values were checked on 2026-11-15; any value you change must be checked again.
- Photos on dark bands: avoid pure white backgrounds in images; they glare against the band.

## 7. One-page brand brief (template)

Send this to the client. Do not build until they approve it in writing (an email "approved" is enough).

```
BRAND BRIEF: [Client name]
Date: [date]            Approved by: [name, date]

1. In one sentence: [what they do and for whom]
2. Main goal of the site: [from Q7]  |  Main action: [from Q8]
3. Essence: [5 words] | Values: [3] | Feeling in 10 seconds: [word]
4. Personality: [sliders summary in one line]
5. Look: palette [hex codes and roles] | headings [font] | body [font]
   Light or dark: [choice] | Images: [style]
6. Voice rules: [5 to 8 lines]
7. Pages: [list from the menu]
8. Facts we will publish and their documents: [list]
9. Open items from the client: [list]
```

## 8. Order of work

1. Questionnaire back.
2. Call.
3. Brand brief sent and approved.
4. Edit `css/tokens.css` and `config/site.php`, write the copy, build the pages.
5. Contrast check, then the Checklist, then the Launch Guide.
