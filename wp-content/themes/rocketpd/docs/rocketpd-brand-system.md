# RocketPD Brand System for the Clean Theme

## Purpose

This document defines the reusable RocketPD visual system for the custom `rocketpd` WordPress theme.

The old build notes reference Salient and WPBakery because those tools were part of the existing production stack. For the rebuild, those references are treated as legacy implementation notes. The new theme should express the same RocketPD brand through clean ACF templates and reusable components.

## Brand personality

RocketPD should feel:

- Warm
- Modern
- Clear
- Educator-friendly
- Professional without feeling corporate
- Playful in small moments, never gimmicky
- Product-aware, especially on LaunchPad and LaunchPad+

The Contact page notes describe the RocketPD tone well: welcoming, multi-audience, plain-spoken, and slightly playful. Keep that as the baseline voice for public-facing pages.

## Core colors

Use CSS custom properties in `assets/css/00-tokens.css`.

```css
:root {
  --rpd-navy: #231F58;
  --rpd-navy-deep: #1a1744;
  --rpd-navy-mid: #343465;

  --rpd-purple: #5552b1;
  --rpd-purple-deep: #a154a1;

  --rpd-gold: #fdb933;
  --rpd-orange: #f99d33;

  --rpd-body: #45417c;
  --rpd-lavender-soft: #c4c4e5;
  --rpd-bg-soft: #f8fafc;
  --rpd-bg-soft-alt: #f8f8fc;
  --rpd-blue-soft: #b6cfdc;

  --rpd-white: #ffffff;
  --rpd-black: #111111;
}
```

## Typography

Primary type:

- Headings: Poppins, 600/700/800
- Body: Inter, 400/500/600/700

Implementation:

```css
:root {
  --font-heading: "Poppins", system-ui, sans-serif;
  --font-body: "Inter", system-ui, sans-serif;
}
```

Heading rules:

- One H1 per page.
- H1 should typically use Poppins 700 or 800.
- Section headings should use Poppins 700 or 800.
- Body copy should use Inter.
- Eyebrows use Inter or Poppins, uppercase, letter-spaced, 11–14px.

## Layout system

Use a consistent layout wrapper:

```css
.rpd-container {
  width: min(100% - 40px, 1200px);
  margin-inline: auto;
}

.rpd-section {
  padding-block: clamp(64px, 8vw, 112px);
}
```

Do not hand-tune each section from scratch unless the design requires it.

## Buttons

Base button classes:

```text
.rpd-btn                  base styles — always required
.rpd-btn--gold            gold fill, navy text (primary CTA)
.rpd-btn--purple          purple fill, white text
.rpd-btn--outline-purple  purple border + text, fills on hover
.rpd-btn--outline-white   white border + text, fills white on hover (dark sections)
.rpd-btn--ghost           text-only, purple color
.rpd-btn--full            100% width modifier
```

Shape and sizing:

- `border-radius: var(--rpd-radius)` → `0.5rem` / `8px` — rounded rectangle, not pill
- `min-height: 44px` — meets touch target minimum
- `padding: 0.78rem 1.2rem`
- `font-weight: 700`
- Hover: `translateY(-1px)` lift on all variants
- Gold hover: shifts to `--rpd-orange` (`#f99d33`)
- Purple hover: shifts to `--rpd-purple-deep` (`#a154a1`)
- Outline-white hover: fills white, text becomes navy

Rules:

- Gold is the primary brand CTA color. Use `.rpd-btn--gold` on both light and dark backgrounds — gold fill with dark text reads well on white.
- Do not use gold-colored text (no fill) on white backgrounds due to contrast.
- On dark/navy sections, prefer `.rpd-btn--gold` or `.rpd-btn--outline-white`.
- CTA labels should be action-oriented.
- Avoid generic "Click Here."

## Eyebrow badges

Short label lines placed above section headings to name the section or highlight a feature. Use one per section maximum.

Classes:

```text
.rpd-home-pill          default — light purple tint, purple text (light sections)
.rpd-home-pill--gold    gold tint, amber text (gold-tinted sections)
.rpd-home-badge         magenta-pink fill, white text (dark/navy sections)
```

Shape and sizing:

- `border-radius: var(--rpd-radius)` → `0.5rem` / `8px` — rounded rectangle, matching buttons. Not pill-shaped.
- `padding: 0.4rem 0.8rem`
- `font-size: var(--rpd-font-size-xs)` → `0.75rem`, `font-weight: 700`
- `margin-bottom: 1rem` — consistent across all eyebrow variants (badge and plain text)
- `display: inline-flex; width: fit-content` — never full-width

Contrast:

| Variant | Background | Text color | Notes |
|---|---|---|---|
| `.rpd-home-pill` | `rgba(85, 82, 177, 0.1)` on white | `var(--rpd-purple)` #5552b1 | Passes AA |
| `.rpd-home-pill--gold` | `rgba(161, 84, 161, 0.15)` on `#fff9e8` | `#6d2f6d` (deep pink) | ~6.5:1 — passes AA; matches `--rpd-purple-deep` accent in section |
| `.rpd-home-badge` | `#7a2f7a` (deep magenta-pink) | `var(--rpd-white)` | ~8.2:1 — passes AAA |

## Cards

RocketPD has a recurring lifted-card pattern: a foreground card with a soft colored block offset behind it.

Component classes:

```text
.rpd-lifted-card
.rpd-lifted-card__shadow
.rpd-card
.rpd-icon-chip
```

The lifted effect is part of the RocketPD visual signature. Use it on contact cards, resource cards, lead magnet cards, and selected CTAs.

People/team cards use `--gradient-purple` (`linear-gradient(135deg, #5552b1, #a154a1)`) as their background. This is the canonical treatment for instructor, team member, and expert cards where a photo is not available or the design calls for a branded tile.

## Gradients

Common gradients:

```css
--gradient-purple: linear-gradient(135deg, #5552b1, #a154a1);
--gradient-navy: linear-gradient(135deg, #1a1744, #231F58, #343465);
--gradient-navy-deep: linear-gradient(135deg, #0f0d2e, #1a1744, #231F58);
--gradient-soft: linear-gradient(135deg, #ffffff, #f8fafc, rgba(196,196,229,.25));
```

## Section backgrounds

Map background tokens to section types consistently:

| Section type | Background |
|---|---|
| Hero / default content | White (`--rpd-white`) |
| Soft alternating sections | `--rpd-bg-soft` or `--rpd-bg-soft-alt` |
| Dark CTA / feature sections | `--gradient-navy` or `--gradient-navy-deep` |
| Gold accent sections | `--rpd-gold` (`#fdb933`) — use sparingly, max one per page |
| People / team cards | `--gradient-purple` |

Note on `--rpd-purple-deep`: this token (`#a154a1`) is a magenta-pink, not a dark navy-purple. It is used as the endpoint of `--gradient-purple` and as the eyebrow label color on light surfaces. Do not use it as a section background or confuse it with the navy dark backgrounds.

## Iconography

Icons are inline SVGs — there is no icon font or external icon library.

Standard spec:

- `viewBox="0 0 24 24"`
- `fill="none"`
- `stroke="currentColor"`
- `stroke-width="2"` (use `2.15` only when extra weight is needed for small sizes)
- `stroke-linecap="round"` and `stroke-linejoin="round"` where applicable
- Always add `focusable="false"` to prevent IE/Edge focus issues
- Decorative icons must have `aria-hidden="true"` on the `<svg>` or its wrapper
- Functional icons (icon-only buttons) must have an accessible label on the parent element via `aria-label` or screen-reader text

Icon source: paths match the [Lucide](https://lucide.dev) icon set. Copy inline from Lucide — do not import the library.

## Decorative patterns

Use CSS/SVG patterns rather than baked-in background images where possible.

Patterns to support:

- Subtle dot pattern
- Gold grid pattern
- Soft radial blur blobs
- Dashed concentric rings for community visuals

All decorative patterns must be non-essential and should not interfere with text contrast.

## Accessibility

Minimum standards:

- WCAG AA contrast for all body text and buttons.
- Visible focus states on links, buttons, forms, and controls.
- Keyboard-accessible accordions, tabs, menus, filters, and modals.
- Meaningful alt text for content images.
- Empty alt text for decorative imagery.
- No autoplay video.
- No essential content inside background images.

## Brand guardrails

Avoid:

- Overly corporate SaaS language
- Hype language like "revolutionize," "unleash," or "transform"
- AI claims unless explicitly approved
- Claims about SSO, integrations, Clever, ClassLink, LMS sync, or APIs unless the product actually supports them
- Generic stock-photo-heavy treatments on product pages

Product pages should feel like polished SaaS/product pages. Community and Contact pages may feel warmer and more human.
