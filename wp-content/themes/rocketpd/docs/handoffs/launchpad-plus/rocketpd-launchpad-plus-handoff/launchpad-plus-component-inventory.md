# LaunchPad+ — Component Inventory (Template Parts)

Maps each visual block to a WordPress PHP template part, the data it needs, repeated
item structure, CSS naming, and accessibility considerations. All parts live under
`wp-content/themes/rocketpd/template-parts/launchpad-plus/`.

Naming convention: `lpp-<block>` for CSS root class; `template-parts/launchpad-plus/<name>.php`.

---

## 01 — Header (shared chrome)

- **Purpose:** sticky site nav with active "LaunchPad+" state + gold "Schedule a Demo".
- **Reuse the theme's existing `header.php`** if it already renders the RocketPD nav. Only ensure the LaunchPad+ menu item gets an `aria-current="page"` / active class. **Do not** build a new header just for this page.
- **CSS:** existing header styles; add `.is-active` magenta state if missing.
- **A11y:** `<nav aria-label="Primary">`; active link `aria-current="page"`; logo `<img alt="RocketPD">`.

## 02 — Hero

- **Part:** `hero.php` · **Root class:** `lpp-hero`.
- **Data:** eyebrow, h1 (with gold `+`), sub-headline, body, 2 buttons (label + url). The browser/dashboard mock is **static markup** (not ACF-driven) — ship as a fixed partial `hero-district-mock.php`.
- **A11y:** single `<h1>`; decorative dashboard wrapped in `aria-hidden="true"`; orbs/grid are CSS (no DOM alt needed).

## 03 — Intro / The Gap

- **Part:** `intro-gap.php` · **Root class:** `lpp-gap`.
- **Data:** eyebrow, h2, 3 body paragraphs (rich text). Right "fragmented → unified" diagram is **static markup** (`gap-diagram.php`).
- **A11y:** `<h2>`; diagram `aria-hidden="true"` (decorative illustration of the concept).

## 04 — Platform Positioning (5 cards)

- **Part:** `platform-positioning.php` · **Root class:** `lpp-positioning`.
- **Data:** eyebrow, h2, intro body, **repeater of 5 cards** `{ icon, title, body }`, closing line (rich text).
- **Repeated item:** `.lpp-positioning__card` → icon tile + title + body.
- **A11y:** `<h2>` + card titles as `<h3>`; icons decorative (`aria-hidden`).

## 05 — System Overview (3 pillars)

- **Part:** `system-overview.php` · **Root class:** `lpp-system`.
- **Data:** eyebrow, h2, intro body, **repeater of 3 pillars** `{ name, icon, color, bullets[] (icon+text) }`, foundation bar text, closing line.
- **Repeated item:** `.lpp-system__pillar` (header strip + bullet list).
- **A11y:** pillar names `<h3>`; bullet lists `<ul>`.

## 06 — What's Included (3 feature cards, dark)

- **Part:** `features-included.php` · **Root class:** `lpp-included`.
- **Data:** eyebrow, h2, **repeater of 3 cards** `{ icon, title, body, highlight }`.
- **Repeated item:** `.lpp-included__card` (icon tile, title, body, check + highlight footer).
- **A11y:** dark section — white headings; card titles `<h3>`; `Check` icon decorative.

## 07 — Admin Visibility (dashboard)

- **Part:** `admin-visibility.php` · **Root class:** `lpp-visibility`.
- **Data:** eyebrow, h2, body, **checklist repeater (3)** `{ icon, text }`, closing body. The analytics dashboard (KPIs, bar chart, donut, table) is **static markup + inline SVG** (`visibility-dashboard.php`) — not ACF-driven.
- **A11y:** `<h2>`; checklist `<ul>`; dashboard `aria-hidden="true"` (illustrative); the SVG donut has no semantic role (decorative).

## 08 — Value / Outcomes (5 title cards)

- **Part:** `value-outcomes.php` · **Root class:** `lpp-value`.
- **Data:** eyebrow, h2, intro body, **repeater of 5** `{ icon, title }`, italic closing line.
- **Repeated item:** `.lpp-value__card` (icon tile + title only).
- **A11y:** card titles `<h3>` or `<p>` (no body); icons decorative.

## 09 — Creator's Package

- **Part:** `creator-package.php` · **Root class:** `lpp-creator`.
- **Data:** eyebrow, h2, 2 body paragraphs, **checklist repeater (3)** `{ text }`, closing line. Right "Example Package" card: ribbon label, package title, **3 feature rows** `{ icon, label }`, eyebrow, **6 example course tiles** `{ title }`, footer note. These can be ACF-driven or static (default static).
- **A11y:** `<h2>`; checklists `<ul>`; package card title `<h3>`.

## 10 — Connected to RocketPD (3 cards, dark)

- **Part:** `connected-rocketpd.php` · **Root class:** `lpp-connected`.
- **Data:** eyebrow, h2, intro body, **repeater of 3 cards** `{ icon, title, body }`, italic closing line.
- **A11y:** dark section; card titles `<h3>`; icons decorative.

## 11 — Comparison Table

- **Part:** `comparison.php` · **Root class:** `lpp-compare`.
- **Data:** eyebrow, h2 (gold `+`), 2 body paragraphs, button `{ label, url }`, **rows repeater** `{ capability, in_launchpad (bool), in_launchpad_plus (bool) }`, 2 footer captions, LaunchPad+ sub-label.
- **Repeated item:** table row → capability cell + 2 boolean cells (✓/✗).
- **A11y (critical — real table semantics):** use `<table>` with `<thead>`/`<th scope="col">` and `<tbody>` rows; boolean cells must convey meaning to screen readers — render `<span class="sr-only">Included</span>` / `Not included` alongside the ✓/✗ icon (icon alone `aria-hidden`). See responsive/a11y doc.

## 12 — Final CTA

- **Part:** `final-cta.php` · **Root class:** `lpp-cta`.
- **Data:** eyebrow, h2, body, button `{ label, url }`.
- **A11y:** `<h2>`; one clear CTA link; orbs/grid decorative CSS.

## 13 — Footer (shared chrome)

- **Reuse the theme's existing `footer.php`.** Do not rebuild. Ensure the Product column includes LaunchPad+ if the live footer is ACF/menu-driven; otherwise leave the global footer as-is.
- **A11y:** social chips need accessible names (`aria-label="LinkedIn"` etc.) if rebuilt; legal links keyboard reachable.

---

## Page template

- **Part:** the page assembles via a custom page template `page-launchpad-plus.php` (or a template named "LaunchPad+ Landing") that `get_template_part()`s each block in order 02→12 between the shared header (01) and footer (13).
- **Root wrapper:** `<main class="lpp">` so all `lpp-*` CSS is scoped under `.lpp`.
- **Order is fixed** — see blueprint. Each `get_template_part()` call must be guarded so an empty ACF group still renders the section with fallback content (never a blank gap).
