# RocketPD LaunchPad+ — Codex / WordPress Implementation Handoff

This package is the **complete implementation handoff** for rebuilding the RocketPD
**LaunchPad+** marketing page inside the custom WordPress RocketPD theme
(`wp-content/themes/rocketpd/`).

> **Source of truth:** the approved **Replit mockup** documented below — **NOT** the
> current WordPress/staging implementation. Do **not** redesign, simplify, omit, or
> invent sections. Rebuild the page exactly as the mockup specifies.

---

## 1. Source Information

| Item | Value |
| --- | --- |
| **Mockup route** | `/__mockup/preview/rocketpd-launchpad-plus/Home` |
| **Source component / file** | `artifacts/mockup-sandbox/src/components/mockups/rocketpd-launchpad-plus/Home.tsx` |
| **Exported component** | `Home` (default page export) |
| **Reference PNGs** | `png/full/` (full page, 6 widths) + `png/sections/` (per-section crops) |
| **Screenshot dimensions** | Full-page: 1440, 1280, 1024, 768, 390, 375 px wide @2× retina. Crops: 1440 (all sections) + 390 (mobile reflow) |
| **Export date** | June 9, 2026 |

### Assets used by the mockup

| Asset | Path in mockup | Type | Notes |
| --- | --- | --- | --- |
| RocketPD logo | `/__mockup/images/rocketpd-logo.png` | Real PNG | Header + footer. Only real raster asset on the page. |
| RocketPD logo (light) | `/__mockup/images/rocketpd-logo-light.png` | Real PNG | Available; the mockup currently uses the standard logo in both header and footer. |

> **There are no other real images on this page.** Every "dashboard", "browser
> window", "course tile", chart, and ribbon is built from **HTML + CSS + inline SVG**,
> not a flat exported image. See `launchpad-plus-asset-handoff.md`.

### Icons / libraries

- **Icons:** `lucide-react` (inline SVG). Full icon-per-section map in
  `launchpad-plus-design-tokens.md`.
- **UI primitives:** shadcn/ui `Button` and `Badge` (`@/components/ui/*`). These are
  Tailwind-styled `<button>` / `<span>` elements — reproduce as plain styled markup in
  WordPress; no React runtime required.
- **CSS:** Tailwind utility classes in the mockup. Translate to scoped theme CSS
  (`launchpad-plus-design-tokens.md` lists exact values).
- **Fonts:** Inter (body), Poppins (headings).

---

## ⚠️ Important: comment numbers in the source are NOT the visual order

The source file's section comments are numbered `1 … 11`, but they **start at the hero
and skip the header**. This handoff uses **true visual top-to-bottom order** (Header = 01,
Footer = 13). Always trust the order in `launchpad-plus-section-blueprint.md`, not the
inline `{/* N. ... */}` comments.

---

## What's in this package

```
rocketpd-launchpad-plus-handoff/
├── README.md                                  ← you are here (source info + index)
├── launchpad-plus-section-blueprint.md        ← deliverables 2, 3 (blueprint + full content inventory)
├── launchpad-plus-design-tokens.md            ← deliverable 4 (colors, type, spacing, icons)
├── launchpad-plus-component-inventory.md       ← deliverable 5 (template parts + a11y)
├── launchpad-plus-acf-data-contract.md        ← deliverables 6, 7 (ACF plan + fallbacks + assets)
├── launchpad-plus-responsive-a11y.md          ← deliverables 8, 9 (responsive + accessibility)
├── launchpad-plus-codex-brief.md              ← deliverables 10, 12 (impl brief, file list, COPY-PASTE PROMPT)
├── launchpad-plus-qa-checklist.md             ← deliverable 11 (QA / acceptance criteria)
├── launchpad-plus-section-metadata.json       ← machine-readable section index
└── png/
    ├── full/      launchpad-plus-full-{1440,1280,1024,768,390,375}.png
    └── sections/  {01..13}-<name>-1440.png  and  -390.png (mobile reflow)
```

### Reading order for Codex
1. This README (source + constraints).
2. `launchpad-plus-section-blueprint.md` — what to build, in order, with exact copy.
3. `launchpad-plus-design-tokens.md` — how it should look.
4. `launchpad-plus-component-inventory.md` + `launchpad-plus-acf-data-contract.md` — how to structure it in the theme.
5. `launchpad-plus-codex-brief.md` — the build brief + the copy-paste prompt.
6. `launchpad-plus-responsive-a11y.md` + `launchpad-plus-qa-checklist.md` — verify before done.

---

## Page at a glance (13 blocks, top → bottom)

| # | Block | Background | Reference crop |
| --- | --- | --- | --- |
| 01 | Header / sticky nav | White, blur, bottom border | `01-header` |
| 02 | Hero — branded district platform | Dark navy gradient + grid | `02-hero` |
| 03 | Intro / The Gap (fragmented → unified) | White | `03-intro-problem` |
| 04 | Platform positioning (What It Is) — 5 cards | `#f8fafc` band | `04-platform-positioning` |
| 05 | System overview (How It's Organized) — 3 pillars | White | `05-system-overview` |
| 06 | What's Included — 3 feature cards | Dark navy gradient | `06-features-included` |
| 07 | Admin visibility — analytics dashboard | White | `07-admin-visibility` |
| 08 | Value / Outcomes (Why It Matters) — 5 cards | `#f8fafc` band | `08-value-outcomes` |
| 09 | Creator's Package | White | `09-creator-package` |
| 10 | Connected to RocketPD — 3 cards | Dark navy gradient | `10-learning-experiences` |
| 11 | Comparison table (LaunchPad vs LaunchPad+) | White | `11-comparison-table` |
| 12 | Final CTA | Dark navy gradient + grid | `12-final-cta` |
| 13 | Footer | `#1a1744` deep navy | `13-footer` |

---

## Hard constraints (from the brief — repeated for safety)

- Theme path: `wp-content/themes/rocketpd/`. Stay inside it.
- PHP template parts, scoped CSS, ACF JSON, minimal vanilla JS only if needed.
- **No Salient. No WPBakery / Visual Composer.** Do not touch plugins, uploads,
  mu-plugins, salient, salient-child, DB content, or WP page content.
- Escape all output: `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`.
- Never output empty buttons, empty headings, empty cards, empty `href`s, broken image
  placeholders, submenu dumps, or horizontal overflow.
- Page must look complete **even when every ACF field is empty** — every section ships
  with approved fallback content (see `launchpad-plus-acf-data-contract.md`).

**Stop after preparing this handoff. Do NOT implement the WordPress page.**
