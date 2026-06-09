# RocketPD Home — WordPress Implementation Handoff Package

This package is the **approved design source of truth** for the RocketPD Home page.
It exists so the Codex/WordPress implementation process can make another pass and
match the approved design **section by section**.

> ⚠️ **Source of truth:** the Replit React mockup listed below — **NOT** the current
> WordPress staging build. Where staging and this package disagree, **this package wins.**

---

## What this package contains

| Item | Path | Notes |
| --- | --- | --- |
| Full-page PNG exports (6 widths) | `png/full/` | Header → footer, no early crop |
| Section PNG crops (desktop) | `png/sections/*-1440.png` | All 13 sections @ 1440px |
| Section PNG crops (mobile) | `png/sections/*-390.png` | Only sections that visibly reflow |
| Section blueprint | `home-section-blueprint.md` | Top-to-bottom spec, every section |
| Design tokens | `home-design-tokens.md` | Colors, type, spacing, radius, shadows |
| Implementation notes | `home-implementation-notes.md` | Structure, data arrays, CMS vs static |
| Codex QA checklist | `home-codex-qa-checklist.md` | Checklist to run against staging |
| Section metadata | `home-section-metadata.json` | Machine-readable section table |
| Diff guide | `home-implementation-diff-guide.md` | What commonly breaks in WP translation |

---

## Source

| | |
| --- | --- |
| **Source mockup route** | `/__mockup/preview/rocketpd-home/Home` |
| **Local preview URL** | `http://localhost:80/__mockup/preview/rocketpd-home/Home` |
| **Source component / file path** | `artifacts/mockup-sandbox/src/components/mockups/rocketpd-home/Home.tsx` |
| **Exported component** | `Home` (React functional component) |
| **Export date** | June 9, 2026 |
| **Render stack** | React + Tailwind CSS (utility classes), lucide-react icons, shadcn `Button` / `Card` / `Badge` primitives |

---

## Full-page PNG files

Captured full-page (header through footer) at 2× device pixel ratio (retina).
Pixel dimensions below are the actual exported image size (CSS width × 2).

| File | CSS width | Use |
| --- | --- | --- |
| `png/full/home-full-1440.png` | 1440px | Desktop (primary design width) |
| `png/full/home-full-1280.png` | 1280px | Desktop |
| `png/full/home-full-1024.png` | 1024px | Small desktop / large tablet |
| `png/full/home-full-768.png` | 768px | Tablet |
| `png/full/home-full-390.png` | 390px | Mobile |
| `png/full/home-full-375.png` | 375px | Mobile |

## Section PNG crops

Numbered in exact top-to-bottom page order. `-1440` = desktop, `-390` = mobile.

| Section | Desktop | Mobile (reflow) |
| --- | --- | --- |
| Header / navigation | `png/sections/01-header-1440.png` | `png/sections/01-header-390.png` |
| Hero | `png/sections/02-hero-1440.png` | `png/sections/02-hero-390.png` |
| Stats bar | `png/sections/03-stats-bar-1440.png` | — (no meaningful reflow) |
| Intro statement | `png/sections/04-intro-statement-1440.png` | — (no meaningful reflow) |
| Community value cards | `png/sections/05-community-value-cards-1440.png` | `png/sections/05-community-value-cards-390.png` |
| LaunchPad feature band | `png/sections/06-launchpad-band-1440.png` | `png/sections/06-launchpad-band-390.png` |
| Membership / pricing cards | `png/sections/07-membership-tiers-1440.png` | `png/sections/07-membership-tiers-390.png` |
| More Than Professional Development | `png/sections/08-more-than-pd-1440.png` | `png/sections/08-more-than-pd-390.png` |
| Resource library | `png/sections/09-resource-library-1440.png` | `png/sections/09-resource-library-390.png` |
| Trust / partnerships | `png/sections/10-trust-partnerships-1440.png` | `png/sections/10-trust-partnerships-390.png` |
| Testimonials | `png/sections/11-testimonials-1440.png` | `png/sections/11-testimonials-390.png` |
| Final CTA | `png/sections/12-final-cta-1440.png` | — (no meaningful reflow) |
| Footer | `png/sections/13-footer-1440.png` | `png/sections/13-footer-390.png` |

**Total: 26 PNGs** (6 full-page + 13 desktop section crops + 7 mobile section crops).

---

## Known caveats

- **Placeholder links.** Nearly all nav, footer, and CTA links in the mockup point to
  `#`. They are intentional placeholders — wire them to real URLs during WP build.
- **Images are demo assets** served from the mockup at `/__mockup/images/…`
  (`rocketpd-logo.png`, `rocketpd-hero.png`, `rocketpd-community-1.png`,
  `rocketpd-community-2.png`, `rocketpd-principal.png`). Replace with production media;
  preserve aspect ratios noted in the blueprint.
- **Endorser & district names are representative sample content**, rendered as **styled
  text wordmarks** (mixed serif/sans), not logo image files. See blueprint §10.
- **Pricing tiers show qualitative labels** ("Free", "A la carte", "Annual", "Premium"),
  not dollar amounts. Do not invent prices.
- **Footer year is dynamic** (`new Date().getFullYear()`).
- **Section source-comment numbering ≠ visual order.** The code comments are out of order
  (e.g. the navy stats band is commented `{/* 9. */}` but renders 3rd). This package uses
  **true visual top-to-bottom order**. Trust the order in the blueprint, not the comments.
- Mobile section crops are provided only where the layout meaningfully changes. Sections
  omitted from the mobile column are single-column at every width.
