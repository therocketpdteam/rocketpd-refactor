# RocketPD UI Patterns

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
