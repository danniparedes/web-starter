# Good practices: sections, columns, naming and order

A portable summary of how we build and name things. It does not depend on one tool: use it as a brief for a developer, for another AI assistant, or as a checklist when you start a new project (also WordPress or Elementor, where "section" and "column" map to the same ideas). The full rules and reasons are in `docs/2026-11-12_Conventions.md`.

## 1. The five ideas behind everything

1. **Separate the jobs.** HTML holds structure, CSS holds looks, JavaScript holds behavior. No inline styles, no inline scripts.
2. **One source of truth for values.** Every color, font and spacing value lives in one tokens file. Everywhere else uses the token name.
3. **It works without JavaScript.** JavaScript improves things; nobody needs it to read content or move through the site.
4. **Everything is documented where it lives.** Each file and each block starts with a short comment: what it is and when to use it.
5. **One name per thing.** Every structure has one name, written in one list (the Name Index). People and tools use that name, never a new one.

## 2. Sections and columns (the two-layer rule)

Every block of a page has two layers:

- **Section** = the full-width band. It owns the background and the top and bottom space.
- **Column** = the centered content area inside the section. It owns the maximum width, the centering and the side space.

```html
<section class="section section--about" id="about" aria-labelledby="about-title">
  <div class="column">
    <h2 id="about-title">...</h2>
  </div>
</section>
```

Rules:
- One section per content block, with an `id` and an `aria-labelledby` pointing to its heading.
- To tune one section, change the spacing and width variables on that section's own class (`section--about`). Never edit the shared `.section` or `.column` for one block.
- Header and footer are sections too, with a column inside, and they are identical on every page.
- Why: background, width and spacing can change independently, and every block can be targeted by what it contains.

## 3. Layouts inside a column

Use only these arrangements, and name them the same way every time:

| Layout | Use it for |
|---|---|
| Grid | Repeating cards; columns fill by available width, no media query needed |
| Halves | Two parts side by side (image + text); stacks on small screens |
| Stack | Even vertical space between rows |
| Thirds | Three parts (header and footer: logo, menu, social) |

Rules:
- To swap the two halves, swap the two children in the HTML. Do not reorder with CSS, so reading order and screen order always match.
- Reading-width content (FAQ, quotes, forms) uses the narrow column variant.
- Cards in a group stay separate with a clear gap; if a backdrop sits behind them, it is smaller than the group and centered.

## 4. Naming

| Thing | Rule | Example |
|---|---|---|
| Code files and folders | lowercase, hyphens | `contact-form.js` |
| CSS classes | `.component`, `.component__part`, `.component--variant` | `.card__title`, `.section--dark` |
| Sections | `section--<what it holds>` | `section--faq` |
| Style variants | separate from the content name | `section--alt` |
| IDs | only for in-page anchors and accessibility links | `#about` |
| JavaScript hooks | `data-js="name"`, never a styling class | `data-js="menu-toggle"` |
| Documents | `YYYY-MM-DD_Descriptive Name.ext`, no version words (v2, final, copy) | `2026-11-25_Good-Practices.md` |
| Language pairs | end with `_EN` / `_ES` | `Questionnaire_ES.md` |

Why: a designer can rename a styling class safely because JavaScript never uses it, and a section is always found by its content name.

## 5. CSS order and values

- File order: tokens (values), base (plain elements), layout (arrangement), components (UI pieces), sections (one named section). A later file may use an earlier one, never the reverse.
- Raw values (`#hex`, sizes) only in the tokens file. Elsewhere: `var(--token)`.
- Colors in components use roles (`--color-text`, `--color-bg`), not raw colors. A dark section or card is made by giving those roles new values, not by writing new colors.
- Text and spacing in `rem`, so the visitor's font settings are respected.
- Mobile first: base styles are for small screens; `min-width` queries enlarge.
- When a group is too narrow for its wide layout (for example in a half-width column), stack it. Do not shrink text to fit.

## 6. HTML and accessibility basics

- One `<h1>` per page; headings in order, never skipped for looks.
- Landmarks: header, nav, main (exactly one), footer. A skip link is the first focusable element.
- Every image has `alt` (empty `alt=""` if purely decorative).
- Color contrast follows WCAG 1.4.3 (normal text and large text have separate minimums). Check it before the client sees the design, and again when real photos replace placeholders.
- Meaning is never carried by color alone: a status word or label says the same thing.

## 7. Names and order (how we stay organized)

- Every section, component and page has one Title-Case name in the Name Index. Related structures share the first word (Hero giant type, Hero image, Hero video).
- Never rename a name already in use. Keep the old name in an "Also called" column.
- Every list is A to Z: menus in the design library, page indexes, catalog contents, tables in docs.
- Exceptions: a client's real menu follows the visitor's journey (Home first), and steps in a process keep their order.
- A new structure is finished only when it has: a name in the Name Index, a row in the Patterns table, a block in the Patterns catalog (in A-to-Z place), and a checklist line if it needs a check.

## 8. Content honesty

- No number, price, date or statistic without a checked source. If it is missing, write a visible placeholder (`[NUMBER NEEDED - source required]`).
- Company marketing claims are labeled as claims, not facts.
- A feature that is not built is offered as a separate project, never promised as included.

## 9. Workflow habits

- Change and test locally, then push to the repository, which is the source of truth.
- Keep the design-stage static pages (`templates/`) in step with the PHP pages.
- Never put client content, secrets or saved data into the shared template.
- Tick the checklist before delivery.
