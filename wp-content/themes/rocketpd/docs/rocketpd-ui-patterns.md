# RocketPD UI Patterns

## Typography

Use the shared RocketPD type hierarchy consistently across page templates.

Headings:
- H1/H2/H3 should use the heading family, `var(--font-heading)`, with navy text on light surfaces.
- H1 and H2 may use responsive `clamp()` sizing to match the page design, but should keep tight line-height around `1.06-1.12`.
- H3 and card headings should stay visibly below section headings and should not use hero-scale type.

Section eyebrows:
- Use one canonical section-eyebrow treatment for standard section labels.
- Preferred class: `.rpd-section-header__eyebrow` for shared components; page-specific templates should match the same values when using scoped classes such as `.rpd-course-section-kicker`.
- Font family: `var(--font-heading)`.
- Font size: `var(--rpd-font-size-xs)` / `0.75rem` / `12px`.
- Font weight: `800`.
- Line height: `1.15-1.2`.
- Letter spacing: `0.14em`.
- Text transform: uppercase.
- Color on light surfaces: `var(--rpd-purple-deep)` / `#a154a1`.
- Dark or inverted sections may use white or gold only when needed for contrast or when the approved design explicitly calls for it.
- Eyebrows must remain subordinate to headings; they should not look like small headings.

Paragraph/body text:
- Use `var(--font-body)` through inherited body styles.
- Use navy/body tones for primary copy and muted purple for supporting text.
- Avoid letting body paragraph rules override eyebrow classes; scoped eyebrow selectors should be at least as specific as local body-copy selectors.

## Circular Icon Link

Use `.rpd-icon-link` for compact icon-only links or buttons that need the standard RocketPD circular hover interaction.

Classes:
- `.rpd-icon-link`
- `.rpd-icon-link--circle`
- `.rpd-icon-link--social`

Default state:
- Circular white or near-white surface.
- Lavender border.
- Navy or purple icon color.
- Soft contextual shadow when appropriate.

Hover and focus state:
- Subtle `translateY(-2px)` lift.
- Purple border.
- Light lavender background tint.
- Magenta or purple icon color.
- Soft shadow, not a heavy card shadow.
- Transition should stay near 160-220ms ease.

Accessibility:
- Icon-only links must keep a visible accessible name, such as screen-reader text or `aria-label`.
- Keyboard users must receive the same visual affordance through focus and a visible `:focus-visible` ring.
- Motion must respect `prefers-reduced-motion`.
- Do not rely on hover as the only signal of interactivity.

Use for:
- Social links.
- Compact icon-only external links.
- Utility icon buttons.

Do not use for:
- Primary CTAs.
- Large feature cards.
- Main navigation text links.

## Interactive Image Card

Use `.rpd-interactive-card` for cards that combine an image/media crop, supporting text, and a CTA link.

Classes:
- `.rpd-interactive-card`
- `.rpd-interactive-card__media`
- `.rpd-interactive-card__image`
- `.rpd-interactive-card__cta`

Standard behavior:
- The card lifts subtly and receives a slightly stronger shadow on hover and `:focus-within`.
- The image zooms inside a clipped media container without layout shift.
- The CTA color deepens and its arrow shifts slightly to the right.
- Transition timing should stay near 180-220ms ease.

Accessibility:
- `:focus-within` must mirror hover so keyboard users get equivalent feedback.
- Focusable elements inside the card must keep a visible `:focus-visible` ring.
- Motion must respect `prefers-reduced-motion`.

Use for:
- Instructor cards.
- Related expert cards.
- Topic cards.
- Course, cohort, and resource cards where image plus CTA are present.

Do not use for:
- Primary CTA buttons.
- Icon-only buttons.
- Static stat tiles.
- FAQ accordions.
- Testimonial quote cards unless they are intentionally clickable.

## Offering Icon Tile

Use `.rpd-offering-card__icon` for non-clickable icon tiles that introduce an offering, value, feature, or pricing-style card.

Standard treatment:
- Center a simple line icon inside a rounded square tile.
- Use a solid RocketPD palette color for the icon.
- Use a low-opacity tint of the same hue for the tile background.
- Keep tile sizing consistent across sibling cards.
- Decorative SVGs must use `aria-hidden="true"` on the wrapper or SVG.

Use for:
- Offering cards.
- Value cards.
- Feature cards.
- Non-clickable pricing or program cards.

Do not use for:
- Social icon links.
- Primary CTA buttons.
- Breadcrumbs.
- Navigation links.
