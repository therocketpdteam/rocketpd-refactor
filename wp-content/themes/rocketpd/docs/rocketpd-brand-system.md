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
.rpd-btn
.rpd-btn--gold
.rpd-btn--purple
.rpd-btn--outline-purple
.rpd-btn--outline-white
.rpd-btn--ghost
```

Rules:

- Gold buttons work best on dark/navy sections.
- Do not use gold text on white backgrounds due to contrast.
- CTA labels should be action-oriented.
- Avoid generic "Click Here."

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

## Gradients

Common gradients:

```css
--gradient-purple: linear-gradient(135deg, #5552b1, #a154a1);
--gradient-navy: linear-gradient(135deg, #1a1744, #231F58, #343465);
--gradient-navy-deep: linear-gradient(135deg, #0f0d2e, #1a1744, #231F58);
--gradient-soft: linear-gradient(135deg, #ffffff, #f8fafc, rgba(196,196,229,.25));
```

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
