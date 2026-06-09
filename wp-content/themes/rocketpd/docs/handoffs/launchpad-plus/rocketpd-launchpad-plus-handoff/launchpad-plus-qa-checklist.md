# LaunchPad+ — QA / Acceptance Criteria

Run after implementation, before sign-off. Compare against `png/full/` and
`png/sections/` reference images. Test at **1440×1200**, **768×1200**, **390×1200**.

---

## Viewport passes

- [ ] **Desktop 1440×1200** — matches `launchpad-plus-full-1440.png`.
- [ ] **Tablet 768×1200** — matches `launchpad-plus-full-768.png`; multi-col grids collapse correctly.
- [ ] **Mobile 390×1200** — matches `launchpad-plus-full-390.png`; everything single-column, readable.

## Section order (top → bottom, exactly)

- [ ] 01 Header → 02 Hero → 03 Intro/Gap → 04 Platform Positioning → 05 System Overview → 06 What's Included → 07 Admin Visibility → 08 Value/Outcomes → 09 Creator's Package → 10 Connected to RocketPD → 11 Comparison → 12 Final CTA → 13 Footer.
- [ ] No section missing, duplicated, reordered, or invented.
- [ ] Dark/light rhythm correct: dark hero → white → grey → white → dark → white → grey → white → dark → white → dark CTA → deep-navy footer.

## Content fidelity

- [ ] Every headline, eyebrow, paragraph, card title/body, checklist item, button label, table label, and caption matches the blueprint verbatim.
- [ ] Hero H1 shows "LaunchPad+" with the `+` in gold.
- [ ] Comparison rows + ✓/✗ pattern exactly match (3 shared, 3 LaunchPad+-only).
- [ ] All 5/5/3/3/5/3 card counts present (positioning 5, value 5, included 3, pillars 3, connected 3).

## Header / footer

- [ ] Shared header renders; "LaunchPad+" nav item shows active (magenta) state.
- [ ] Gold "Schedule a Demo" button present in header.
- [ ] Shared footer renders with Product / Learn / Company columns + legal row + current year.

## CSS / styling

- [ ] `launchpad-plus.css` loads **only** on this page template (not site-wide).
- [ ] All styles scoped under `.lpp`; no bleed into other pages.
- [ ] Colors match tokens exactly (navy `#231F58`, gold `#fdb933`, magenta `#a154a1`, purple `#5552b1`, bands `#f8fafc`, footer `#1a1744`).
- [ ] Fonts: Poppins headings, Inter body. Radii `rounded-2xl`/`xl`/`lg`. Section `py-24`.
- [ ] Gradients + blurred orbs + gold grid overlay render on hero/CTA/dark sections.

## Integrity (no empties / no breakage)

- [ ] No empty headings.
- [ ] No empty CTA `href`s (buttons omitted when URL missing).
- [ ] No empty cards or empty repeater rows rendered.
- [ ] No hero overlap (sticky header doesn't cover hero content).
- [ ] No broken images / placeholder icons (only real asset is the logo).
- [ ] **No horizontal overflow at 1440 / 768 / 390** — dashboards/tables stay within their cards.
- [ ] Page renders complete with **all ACF fields empty** (fallback content shows everywhere).

## Accessibility

- [ ] Exactly one `<h1>`; sections `<h2>`; card/pillar titles `<h3>` (no skipped levels).
- [ ] Comparison is a real `<table>` with `<th scope>` + sr-only "Included/Not included".
- [ ] Decorative icons + mock UIs are `aria-hidden`; logo has alt text.
- [ ] All CTAs are focusable `<a>` with visible focus ring; logical tab order.
- [ ] Body text meets AA contrast (ignore the intentionally-tiny decorative dashboard labels).

## Console

- [ ] No JS errors in console.
- [ ] No PHP notices/warnings in output or debug log.
- [ ] No missing-asset 404s.

## Visual diff

- [ ] Side-by-side each section crop (`png/sections/<NN>-*-1440.png` and `-390.png`) against the build — spacing, colors, copy, icon choice all match.

---

### Fail conditions (any → not done)
Missing/extra/reordered section · altered copy · wrong colors/fonts · empty button or
heading or card · empty href · horizontal scrollbar at any tested width · comparison not
a semantic table · console errors · CSS leaking site-wide · page looks broken with empty
ACF fields.
