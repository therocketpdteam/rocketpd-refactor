# LaunchPad+ — Responsive & Accessibility Notes

Deliverables **8** (responsive) and **9** (accessibility). Breakpoints follow Tailwind:
`sm` 640 · `md` 768 · `lg` 1024. Reference crops: `png/full/*-{1440,768,390}.png` and
per-section `-390` crops.

---

## 8. Responsive behavior

### Global
- **Container padding:** `px-4` (mobile) → `sm:px-6` → `lg:px-8`. Content max `max-w-7xl`.
- **Section padding** holds at `py-24` across breakpoints (hero shrinks top: `lg:pt-24` → `pt-16`).
- **No horizontal overflow at any width** — the dashboards/tables are the main risk; they must scale or scroll within their card, never push the page wide.

### Per-section stacking

| Section | Desktop | Tablet (768) | Mobile (390) |
| --- | --- | --- | --- |
| Header | logo + 6-link nav + actions | nav hidden (`md:flex`) → only logo + gold button show | same as tablet |
| Hero | 2-col (copy / dashboard) | stacks to 1-col; dashboard below copy | 1-col; floating accent cards **hidden** (`hidden md:block` / `hidden lg:block`); buttons stack full-width |
| Intro/Gap | 2-col (copy / diagram) | 1-col | 1-col; tool chips remain 3-up small grid |
| Platform positioning | 5-col cards | 2-col (`sm:grid-cols-2`) | 1-col |
| System overview | 3-col pillars | stacks toward 1-col (`md:grid-cols-3` only ≥768) | 1-col |
| What's Included | 3-col | 1-col (<768) | 1-col |
| Admin visibility | 5/7 split (copy/dashboard) | 1-col; dashboard below | 1-col; KPI row stays 4-up tiny — watch overflow, allow shrink |
| Value/Outcomes | 5-col | 2-col | 1-col |
| Creator's Package | 6/6 split | 1-col | 1-col; 6 course tiles stay 3-up |
| Connected to RocketPD | 3-col | 1-col | 1-col |
| Comparison | 5/7 split (copy/table) | 1-col; table full-width | 1-col; table keeps 3 columns — capability column flexes, check columns stay narrow |
| Final CTA | centered | centered | centered; button full-width-ish |
| Footer | 5-col grid | 4-col → 2-col | 2-col link columns + stacked legal row |

### Typography scaling
- H1 hero: `text-5xl` (mobile) → `sm:text-6xl` → `lg:text-7xl`.
- Section H2: `text-3xl` → `md:text-4xl` → `lg:text-[44px]` (feature H2s `text-4xl → 5xl`).
- Body stays `text-lg`; small UI text unchanged.

### Buttons
- Hero button row: `flex-col` on mobile → `sm:flex-row`. Each button full-width on mobile.
- Trailing arrows stay inline; never let a button wrap its label awkwardly — keep labels on one line.

### Dashboard / browser-mock scaling
- The hero + admin dashboards are fixed internal layouts inside a `rounded-2xl` card.
  On mobile they **shrink with the column** (the card is fluid width); inner text is
  intentionally tiny (illustrative). Do **not** rebuild them as separate mobile layouts —
  just let them scale. Ensure they never exceed viewport width (cap at 100%).
- The completion donut is inline SVG with `viewBox` — scales automatically.

### Hidden / simplified at small widths
- Hero floating accent cards: hidden `< md` / `< lg`.
- Header center nav: hidden `< md`.
- "Login" link: hidden `< sm`.
- District header inner nav words ("My Learning", etc.): hidden `< sm` inside the mock.

> **WP recommendation:** the mockup has no mobile hamburger. Use the theme's existing
> mobile menu for `< md` so nav is still reachable — do not ship a page where nav links
> simply disappear with no replacement.

---

## 9. Accessibility notes

### Heading hierarchy
- Exactly **one `<h1>`** — the hero "LaunchPad+".
- Each major section uses **`<h2>`** for its headline.
- Card / pillar / package titles → **`<h3>`** (don't skip levels).
- The decorative gold `+` in headings: keep as text inside the heading (e.g.
  `LaunchPad<span class="lpp-plus">+</span>`) so it's read as "LaunchPad plus".

### Buttons / links semantics
- All CTAs are navigational → render as `<a>` with real `href`. Never an empty `href` or
  a `<button>` with no action. Omit entirely if no URL (see ACF rule).
- Outline "Explore LaunchPad" buttons link to the LaunchPad page.

### Decorative icon handling
- All lucide glyphs inside cards/tiles/diagrams are decorative → `aria-hidden="true"`
  and `focusable="false"` on the SVG.
- The hero dashboard, intro diagram, admin dashboard, and creator card are illustrative
  → wrap each in a container with `aria-hidden="true"` (they convey nothing a screen
  reader user needs that the surrounding copy doesn't already state).

### Comparison table semantics (critical)
- Use a real `<table>`:
  - `<thead>` with `<th scope="col">Capability</th>`, `<th scope="col">LaunchPad</th>`, `<th scope="col">LaunchPad+</th>`.
  - `<tbody>` rows with `<th scope="row">` for the capability name and `<td>` for each boolean.
- Boolean cells: the ✓/✗ icon is `aria-hidden`; include visually-hidden text so meaning
  is announced: `<span class="sr-only">Included</span>` / `<span class="sr-only">Not included</span>`.
- The two footer captions belong in a final row spanning the table (or `<tfoot>`).

### Alt text
- RocketPD logo: `alt="RocketPD"` (header) — footer instance may be `alt=""` if redundant.
- No other images; decorative mocks need no alt (they're `aria-hidden` containers).

### Color contrast warnings
- **Pass:** white / lavender `#c4c4e5` / gold `#fdb933` on navy gradients; navy `#231F58`
  and body `#45417c` on white/`#f8fafc`.
- **Watch:** `white/80` body on dark sections is fine for large text; keep small print at
  `white/80`+ (avoid going below). Muted `#7670b3` on white passes for normal text.
- **Below AA but acceptable (decorative only):** the tiny 8–10px labels inside the
  illustrative dashboards (e.g. `white/60`, `#7670b3` micro-labels). They are part of a
  non-essential UI illustration that is `aria-hidden`; do not rely on them for meaning.
  Do **not** copy those low-contrast values into real page content.

### Keyboard / focus
- All links/buttons keyboard reachable in DOM order (top→bottom matches visual order).
- Provide a visible focus ring (theme default or `:focus-visible` outline) — don't remove
  outlines on the gold/outline buttons.
- Logical tab order: header → hero CTAs → section CTAs → comparison button → final CTA →
  footer links.
