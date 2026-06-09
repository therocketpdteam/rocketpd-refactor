# RocketPD Home — Codex QA Checklist

Run this checklist against the **WordPress staging** Home page, comparing every item to
this handoff package (PNGs + blueprint). The **Replit mockup is the source of truth** —
when staging differs, staging is wrong unless explicitly noted. Mark each: ✅ pass /
❌ fail / ⚠️ partial, and capture a note + screenshot for every ❌/⚠️.

---

## A. Section order (must match top-to-bottom)

- [ ] 1. Header / navigation
- [ ] 2. Hero
- [ ] 3. Stats bar (navy `#343465`)
- [ ] 4. Intro statement ("Learning, Meet Doing.")
- [ ] 5. Community value cards ("World's Most Engaged…", 3 cards)
- [ ] 6. LaunchPad feature band (navy `#231F58` + orb)
- [ ] 7. Membership / pricing cards (4 tiers)
- [ ] 8. More Than Professional Development
- [ ] 9. Resource library (chips + 6 cards + CTA bar)
- [ ] 10. Trust / partnerships (partner card + endorsers + district wall)
- [ ] 11. Testimonials (3 cards)
- [ ] 12. Final CTA
- [ ] 13. Footer

## B. Missing / extra section check

- [ ] No section from the list above is missing on staging.
- [ ] Staging has **no extra** sections not in this package.
- [ ] No section is merged into another (e.g. intro statement separate from value cards; resource CTA bar inside the resource section).
- [ ] Sub-blocks present: stats bar has 3 stats; trust has all 3 blocks (partner, endorsers, district wall).

## C. Header / nav checks

- [ ] Logo present, correct height (36px mobile / 44px desktop), not stretched.
- [ ] Desktop nav: Topics · Instructors · Solutions · About · Resources order & labels.
- [ ] Login link present (hidden < sm).
- [ ] Gold "Join the Community" button present, gold `#fdb933` with navy text.
- [ ] Header is sticky and translucent/blurred (not solid, not static).
- [ ] Hover color on nav = magenta `#a154a1`.
- [ ] Mobile: a working nav affordance exists (mockup lacks one — confirm WP adds a hamburger; see diff guide).

## D. Footer checks

- [ ] 4 columns: Brand (logo+blurb+social) · Product · Community · Company.
- [ ] Product: LaunchPad · For Districts · For Schools · Pricing.
- [ ] Community: Topics · Instructors · Events · Member Directory.
- [ ] Company: About Us · Careers · Blog · Contact.
- [ ] Footer bg is darkest navy `#1a1744`.
- [ ] Logo legible on dark (white chip behind it).
- [ ] Copyright shows current year (dynamic) + Privacy Policy / Terms of Service.
- [ ] Social icons present (in / X / fb) with accessible labels.

## E. Typography hierarchy checks

- [ ] Exactly **one `<h1>`** (hero).
- [ ] Section titles are `<h2>`; card titles `<h3>`; footer labels `<h4>` — no skipped levels.
- [ ] Headings render in **Poppins**; body in **Inter** (fonts actually load, no fallback flash).
- [ ] Hero H1 sizes up to 7xl on desktop, `font-extrabold`, navy.
- [ ] Two-tone heading preserved: "Real Resources. Real Classrooms. **Zero Cost.**" ("Zero Cost." magenta).

## F. Spacing checks

- [ ] Standard sections use ~96px vertical padding (`py-24`).
- [ ] Stats bar tighter (`py-8`); social proof `py-20`; footer `py-16`.
- [ ] Container horizontal padding scales 16→24→32px; content centered/constrained.
- [ ] No collapsed/duplicated margins making sections touch or overlap.

## G. Card / grid checks

- [ ] Value cards: 3-up desktop & tablet → 1 col mobile; distinct icon accent colors (purple/magenta/gold).
- [ ] Membership: 4-up (lg) → 2×2 (md) → 1 col (mobile).
- [ ] Featured tier (LaunchPad District): raised, `#5552b1` border, "Most Popular" badge on top edge, tinted header, **gold** checks, 4 list items.
- [ ] Resource cards: 3-up (lg) → 2-up (md) → 1 col; each unique gradient header; type pill (white) + FREE pill (gold); "Open →" link.
- [ ] District wall: 4 / 3 / 2 col grid with hairline dividers; 12 tiles with state codes.
- [ ] Testimonials: 3 (lg) → 2 (md, card 3 hidden) → 1 (mobile, all 3).
- [ ] All cards use `rounded-2xl` and correct shadows; hover lift/shadow on resource cards.

## H. CTA checks

- [ ] Hero: "Join the Community" (gold) + "Explore LaunchPad" (outline purple).
- [ ] LaunchPad band: "Learn about LaunchPad →" (gold text link, not a filled button).
- [ ] Tier buttons: Join Free / Browse Courses / Get a Quote (gold) / Contact Us.
- [ ] Resource CTA bar: "Join the Community Free →" (gold) + "Browse All Resources" (outline white).
- [ ] Final CTA: "Join the Community" (gold) + "Book a Conversation" (outline white).
- [ ] All CTAs point to real URLs (no leftover `#`), correct labels, correct variants/colors.

## I. Image / fallback checks

- [ ] Hero, LaunchPad, More-Than-PD images present, correct aspect ratios (4:3 / 16:9 / square→4:3), `object-cover`.
- [ ] Hero offset purple shadow-block + floating "40,000+" stat card present (≥ md).
- [ ] LaunchPad glass frame + "Upcoming Cohort" mini-card present (≥ sm).
- [ ] Testimonial avatars: 2 colored initials circles (JB, MR) + 1 photo (Sarah Jenkins).
- [ ] All images have alt text; broken-image fallbacks don't show.
- [ ] Endorser & district names render as styled text (or intentional real logos), not blank.

## J. Overflow checks

- [ ] No horizontal scrollbar at any width (1440/1280/1024/768/390/375).
- [ ] Decorative orbs/gradients clipped by `overflow-hidden`; don't spill or cause scroll.
- [ ] Long district/endorser names don't break the grid.
- [ ] Floating cards don't overflow viewport on small screens (should be hidden there).

## K. Console / error checks

- [ ] No JS console errors on load.
- [ ] No 404s for images/fonts/CSS (check network tab).
- [ ] No layout-shift (CLS) from late-loading fonts/images.
- [ ] No mixed-content or CORS warnings.

## L. Accessibility checks

- [ ] Single h1, logical heading order (see §E).
- [ ] All images have meaningful alt (decorative ones empty alt / aria-hidden).
- [ ] Buttons/links keyboard-focusable with visible focus.
- [ ] Decorative orbs/overlays `aria-hidden`.
- [ ] Color contrast acceptable, esp. muted `#7670b3` text.
- [ ] Social icon glyphs have `aria-label`.
- [ ] Mobile nav is operable by keyboard + screen reader.

## M. Per-breakpoint visual QA

**Desktop (1440 & 1280)** — compare to `png/full/home-full-1440.png`, `…-1280.png`
- [ ] 2-col hero, 4-up tiers, 3-up resources, 3-up testimonials, 5-col footer.
- [ ] Featured tier raised; floating cards visible.

**Tablet (1024 & 768)** — compare to `…-1024.png`, `…-768.png`
- [ ] Value cards still 3-up at md; tiers 2×2; resources 2-up; testimonials show 2 (card 3 hidden at md).
- [ ] Footer 4-col; nav collapses below md.

**Mobile (390 & 375)** — compare to `…-390.png`, `…-375.png`
- [ ] Everything single-column; hero image below text; More-Than-PD shows **text then image**.
- [ ] Floating stat/cohort cards hidden; nav links hidden (hamburger expected).
- [ ] Footer 2-col; all 3 testimonials shown; chips wrap; CTA bars stacked.

---

## N. Objective correction criteria (when to fail an item)

Fail (❌) and require a fix if **any** of these are true:
- A section is **missing, extra, reordered, or merged**.
- **Copy differs** from the blueprint (wording, punctuation incl. em-dashes, the two-tone "Zero Cost.").
- A **brand color is wrong** (off by hex) — verify against `home-design-tokens.md`.
- **Wrong font** (not Poppins headings / Inter body) or fonts fail to load.
- A **CTA label, variant, or destination** is wrong or still `#`.
- **Card count is wrong** (must be 3 value cards, 4 tiers, 6 resources, 12 districts, 7 endorsers, 3 testimonials at desktop).
- **Featured tier styling missing** (raise, badge, gold checks, tinted header).
- **Responsive behavior differs** from the breakpoint notes (wrong column counts, wrong visibility).
- **Horizontal overflow** at any tested width.
- **Console errors / 404s / broken images.**
- **Heading hierarchy broken** (multiple h1, skipped levels).

Pass (✅) only when the staging section is visually and structurally indistinguishable
from the matching PNG crop and blueprint entry at all six tested widths.
