# LaunchPad+ — Codex Implementation Brief

Deliverables **10** (implementation instructions) and **12** (deliverables list + the
copy-paste Codex prompt).

---

## Project constraints (non-negotiable)

- **Theme path:** `wp-content/themes/rocketpd/`. All work stays inside it.
- **Build with:** PHP template parts, scoped CSS, ACF local JSON, minimal vanilla JS
  (only if strictly needed — the page needs **no JS** to function).
- **Do NOT use** Salient, WPBakery / Visual Composer, or any page builder.
- **Do NOT edit:** plugins, `uploads/`, `mu-plugins/`, `salient/`, `salient-child/`,
  the database, or WordPress page content.
- **Escape all output:** `esc_html()` (text), `esc_attr()` (attributes), `esc_url()`
  (URLs), `wp_kses_post()` (rich text / wysiwyg).
- **Never output:** empty buttons, empty headings, empty cards, empty `href`s, broken
  image placeholders, visible submenu dumps, or horizontal overflow.
- **Source of truth:** the Replit mockup (this package). **Not** the current
  WordPress/staging page. Do not redesign, simplify, omit, or invent sections.

---

## What to build

A LaunchPad+ landing page that reproduces the mockup exactly: **13 blocks** in fixed
order (Header → 11 content sections → Footer). Reuse the theme's shared header/footer;
build the 11 content sections as template parts driven by ACF with **hardcoded approved
fallbacks** so the page is complete even with empty fields.

Read in this order: `README.md` → `launchpad-plus-section-blueprint.md` (structure +
exact copy) → `launchpad-plus-design-tokens.md` (visuals) →
`launchpad-plus-component-inventory.md` + `launchpad-plus-acf-data-contract.md`
(structure/fields) → `launchpad-plus-responsive-a11y.md` → `launchpad-plus-qa-checklist.md`.

---

## Files Codex should CREATE

```
wp-content/themes/rocketpd/
├── page-launchpad-plus.php                         # page template: header + <main class="lpp"> + parts + footer
├── acf-json/
│   └── group_launchpad_plus.json                   # ACF local JSON field group (see data contract)
├── assets/css/
│   └── launchpad-plus.css                          # scoped styles under .lpp (enqueued only on this template)
└── template-parts/launchpad-plus/
    ├── hero.php              + hero-district-mock.php
    ├── intro-gap.php         + gap-diagram.php
    ├── platform-positioning.php
    ├── system-overview.php
    ├── features-included.php
    ├── admin-visibility.php  + visibility-dashboard.php
    ├── value-outcomes.php
    ├── creator-package.php
    ├── connected-rocketpd.php
    ├── comparison.php
    ├── final-cta.php
    └── icon.php                                     # lucide SVG map helper (icons.php-style)
```

## Files Codex may MODIFY (minimal, additive only)

```
wp-content/themes/rocketpd/functions.php            # conditionally enqueue launchpad-plus.css on the template
```

- Enqueue scoped CSS only when `is_page_template('page-launchpad-plus.php')` to avoid
  leaking styles site-wide.
- Do **not** modify the shared `header.php` / `footer.php` beyond ensuring the
  LaunchPad+ nav item can show an active state (skip if already supported).

---

## Implementation guidance

1. **Scope all CSS under `.lpp`.** Use CSS custom properties for the token palette
   (design-tokens doc). Mirror Tailwind values exactly (colors, radius, spacing).
2. **Reproduce the dark/light section rhythm** exactly (blueprint rhythm table).
3. **Mock UIs (hero dashboard, gap diagram, admin analytics, creator card)** are static
   markup + inline SVG — no flat images, no ACF. Keep them `aria-hidden` and fluid so
   they scale without overflow.
4. **Fallbacks:** `get_field('x') ?: 'DEFAULT'`; repeaters fall back to the default item
   arrays from the data contract. Never render an empty section.
5. **Comparison section** must be a real `<table>` with proper scope + sr-only
   "Included/Not included" text (a11y doc).
6. **Buttons** render only when both label and URL exist; always `esc_url()` the href.
7. **No JS required.** If a mobile menu is needed, use the theme's existing one — do not
   add a bespoke script.
8. **Icons:** inline lucide SVGs via `icon.php` map; decorative ones get
   `aria-hidden="true" focusable="false"`.

---

## 12. Deliverables recap (this package)

- ✅ Markdown handoff document — `README.md`
- ✅ Section-by-section content/data contract — `launchpad-plus-section-blueprint.md` + `launchpad-plus-acf-data-contract.md`
- ✅ Exported reference images / section slices — `png/full/` + `png/sections/`
- ✅ Exact files to create/modify — this doc (above)
- ✅ Copy-paste Codex prompt — below

---

## ✂️ COPY-PASTE CODEX PROMPT

```
You are implementing a new landing page in the custom WordPress theme at
wp-content/themes/rocketpd/. Build the RocketPD "LaunchPad+" page to exactly match the
approved mockup described in the handoff package (rocketpd-launchpad-plus-handoff/).
The mockup — NOT the current WordPress/staging page — is the sole source of truth.

DO NOT redesign, simplify, omit, or invent sections. Reproduce all 13 blocks in order:
01 Header (shared), 02 Hero, 03 Intro/The Gap, 04 Platform Positioning (5 cards),
05 System Overview (3 pillars), 06 What's Included (3 cards, dark),
07 Admin Visibility (analytics dashboard), 08 Value/Outcomes (5 cards),
09 Creator's Package, 10 Connected to RocketPD (3 cards, dark),
11 Comparison Table (LaunchPad vs LaunchPad+), 12 Final CTA, 13 Footer (shared).

Use the handoff docs for exact copy (launchpad-plus-section-blueprint.md), colors/type/
spacing (launchpad-plus-design-tokens.md), component structure
(launchpad-plus-component-inventory.md), ACF fields + approved fallbacks
(launchpad-plus-acf-data-contract.md), and responsive/accessibility rules
(launchpad-plus-responsive-a11y.md). Verify against png/ reference images.

CONSTRAINTS:
- Stay inside wp-content/themes/rocketpd/. Do NOT touch plugins, uploads, mu-plugins,
  salient, salient-child, the database, or WP page content.
- Use PHP template parts, scoped CSS (all under .lpp), ACF local JSON, and NO JS unless
  strictly required. No Salient, no WPBakery/Visual Composer.
- Escape everything: esc_html(), esc_attr(), esc_url(), wp_kses_post().
- Never output empty buttons, empty headings, empty cards, empty hrefs, broken images,
  submenu dumps, or horizontal overflow.
- The page MUST look complete even when every ACF field is empty — ship the approved
  default content (the mockup copy) as hardcoded fallbacks for every field and repeater.

FILES TO CREATE:
- page-launchpad-plus.php (template: shared header + <main class="lpp"> + the 11 parts +
  shared footer, in order)
- acf-json/group_launchpad_plus.json (field group "LaunchPad+ Landing", location =
  page template page-launchpad-plus.php, tabs per section per the data contract)
- assets/css/launchpad-plus.css (scoped under .lpp; mirror the design tokens exactly)
- template-parts/launchpad-plus/{hero, hero-district-mock, intro-gap, gap-diagram,
  platform-positioning, system-overview, features-included, admin-visibility,
  visibility-dashboard, value-outcomes, creator-package, connected-rocketpd, comparison,
  final-cta, icon}.php

FILES TO MODIFY (additive only):
- functions.php — enqueue assets/css/launchpad-plus.css ONLY when
  is_page_template('page-launchpad-plus.php').

DETAILS:
- Mock UIs (hero district dashboard, the fragmented→unified diagram, the admin analytics
  dashboard with KPIs/bar chart/SVG donut/table, the creator example-package card) are
  static HTML/CSS + inline SVG — NOT flat images and NOT ACF-driven. Mark them
  aria-hidden and keep them fluid (max-width:100%) so nothing overflows.
- The only real image on the page is the existing RocketPD logo in header/footer.
- The comparison section must be a real <table> with <thead>/<th scope> and sr-only
  "Included"/"Not included" text next to each aria-hidden ✓/✗ icon.
- Exactly one <h1> (hero); section headlines are <h2>; card/pillar/package titles <h3>.
- Reproduce the dark/light section rhythm exactly: dark hero → white → grey band → white
  → dark → white → grey band → white → dark → white → dark CTA → deep-navy footer.

When done, self-check against launchpad-plus-qa-checklist.md at 1440x1200, 768x1200, and
390x1200. Do not deploy.
```
