# RocketPD — Individual Course Detail Page (Kim Marshall — template)

**Page purpose:** The deep-dive template for any single RocketPD course. The same template supports **all three formats** — Free Webinar, Self-Paced Course, Live-Virtual Cohort — via the `COURSE.format` field plus conditional rendering. Worked example here is Kim Marshall's "Rethinking Teacher Supervision, Coaching & Evaluation" ($49 self-paced).

**Route (mockup):** `/__mockup/preview/rocketpd-course-kim-marshall/Home`
**Source file:** `artifacts/mockup-sandbox/src/components/mockups/rocketpd-course-kim-marshall/Home.tsx`
**Reference PNG:** `exports/RocketPD/Page Images/rocketpd-course-kim-marshall-detail.jpg`

---

## Page structure (top → bottom)

1. **Sticky white header** — same shell as the gallery; `Courses` nav active (`aria-current="page"`).
2. **Breadcrumb bar** — `RocketPD / Courses / {COURSE.title}` (lavender bg, navy text, magenta current item, `aria-label="Breadcrumb"`).
3. **Hero** (white→lavender gradient, blue + magenta orbs, 6/6-col split):
   - Left (6): format badge with topic ("Self-Paced Course · Teacher Evaluation") → H1 (Poppins extrabold, ~5xl) → instructor row (round headshot + "with Kim Marshall" + role line) → promise paragraph → **price card** (white tile with `$49` + meta) + gold "Start Learning" + outline "Watch Trailer" CTAs → meta-icon row (~1 hour / 5 modules / Workbook PDF / Certificate).
   - Right (6): real YouTube trailer embed `1lOJDsHcCPQ` in `rounded-2xl` ring with floating gold "Official Trailer" pill at top-right.
4. **What You'll Learn** (3-card grid, white bg) — each card has a numbered `1/2/3` gradient pill (`#5552b1 → blue-500`), Poppins title, and outcome paragraph. Cards rebuild the live page's "In this course, Kim Marshall challenges you to…" three-up.
5. **Who This Is For** (lavender bg, 5/7-col split) — "Built for the people who run schools" headline + audience-chip cloud (5 chips with checkmark icons) + supporting paragraph.
6. **What's Included** (white bg, 6/6-col split) — **conditional on `COURSE.format`**. Renders the matching `included[format]` block:
   - **self-paced** → 6 items (60-min course, 5 modules, Workbook PDF, Certificate, Portal access, Community)
   - **webinar** → 4 items (recorded conversation, practical ideas, related resources, next-step recs)
   - **cohort** → 5 items (live sessions, recordings, materials, collaborative implementation, priority access)
   Right column shows the `RPD-LaunchPad_Devices_Marshall.png` device mockup on a navy gradient card.
7. **Instructor Authority Block** (lavender gradient bg) — single big white `rounded-3xl` card. 4/8-col split: square portrait with floating gold "Featured Expert" pill / right column = "Meet your instructor" eyebrow + name + title + bio + 4 specialty pills + outline "View Kim Marshall's Instructor Page" CTA → `/instructors/kim-marshall`.
8. **Free Resources** (`hasResources` gate — only renders if any `enabled`):
   - **A. Featured Guide** (full-width, `enabled`): `<ResourceFeaturedCard>` — 5/7 split, purple half-bleed left (eyebrow + title + meta + "Most-downloaded" footer) and white right (summary + 3 deliverable bullets + gold "Get the Free Guide" + outline "Preview a sample chapter" CTAs, both linking to `KIM.guide.href`, `target="_blank"`).
   - **B. Podcast + Webinar 2-up** (each independently toggleable): `<ResourceCard>` with eyebrow pill, title, summary, meta + "Open" link → `target="_blank"`. Real YouTube URLs (`AME1I5sUJFQ`, `wIV-j4nt_ms`).
   - **C. Blog + Playbook 2-up**: blog rendered (real article URL); playbook is `enabled:false` to **demonstrate the conditional rendering pattern** — the second card simply doesn't render. Layout self-heals.
9. **Pricing / Registration** (`#f8f8fc` bg) — title + subhead + grid of `<PricingCard>` tiers from `pricing[COURSE.format]`. For self-paced Kim renders 3 tiers (Single $49 / Full Library $245 *Most Popular* / Teams Custom). For webinar this renders 1 tier (`max-w-md mx-auto`); for cohort this renders 1 tier ($795/8-session). Highlighted tier translates up + ring + gold CTA; others use outline-purple CTA. Bullets are check-prefixed.
10. **Related Courses** (white bg) — 3-up `<RelatedCourseCard>` grid that **mixes formats** (self-paced + cohort + webinar) to prove the format badge system works across cards. "Browse all courses →" link top-right.
11. **FAQ** (`#f8f8fc` bg, 5/7-col split, AEO/schema-ready) — left = "Common questions" + paragraph + link to RocketPD team; right = 6 `<FaqItem>` accordions. First open by default. `aria-expanded` + `aria-controls` + panels are `role="region"` with `aria-labelledby`. Designed for `FAQPage` schema injection.
12. **Final CTA** (gradient navy with blurred orbs) — centered "Ready to rethink teacher evaluation?" headline + gold "Start Learning — $49" + outline "Talk About District Pricing" CTAs.
13. **Footer** — same shell as gallery.

## Data contract — the `COURSE` object (this IS the CMS contract)

```ts
const COURSE = {
  slug, title, format,          // 'webinar' | 'self-paced' | 'cohort'
  price, priceMeta,
  promise, trailerYouTubeId, courseImage,

  instructor: { name, slug, headshot, title, bio, specialties[], href },
  topic, audiences: string[],

  outcomes: [{ title, summary, image }, ...],   // 3 items

  // Conditional WHATS INCLUDED — keyed by format
  included: {
    "self-paced": { heading, visual, items: [{icon, label}, ...] },
    webinar:      { ... },
    cohort:       { ... },
  },

  // Modular Free Resources — each block has .enabled
  resources: {
    guide:    { enabled, title, meta, summary, href },
    podcast:  { enabled, title, meta, summary, href },
    webinar:  { enabled, title, meta, summary, href },
    blog:     { enabled, title, meta, summary, href },
    playbook: { enabled, title, meta, summary, href },
  },

  // Conditional pricing — keyed by format
  pricing: {
    "self-paced": [{ eyebrow, title, price, priceMeta, bullets, ctaLabel, ctaHref, highlighted }, ...],
    webinar:      [...],
    cohort:       [...],
  },

  related: [{ slug, title, instructor, format, price, topic, image }, ...],
  faqs: [{ q, a }, ...],
};
```

**This is the contract every other course page satisfies.** Adding A.J. Juliani's AI course = filling out the same shape — no design work. Switching the worked example from self-paced to live-cohort = changing `COURSE.format = "cohort"` and providing the matching `included.cohort` + `pricing.cohort` data; everything else (hero, instructor block, FAQ, related, final CTA) renders identically.

## Format → behavior matrix

| Section | Self-Paced | Webinar | Cohort |
|---|---|---|---|
| Hero badge | "Self-Paced Course" (gold) | "Free Webinar" (emerald) | "Live-Virtual Cohort" (blue) |
| Hero price card | `$49 annually` | `Free no card required` | `$795 per person · 8 sessions` |
| What's Included items | 6 (course + workbook + cert + portal + community) | 4 (recording + ideas + resources + next-steps) | 5 (live + recordings + materials + collab + priority) |
| Pricing tiers | 3 (Single / Library / Teams) | 1 (Free, centered) | 1 ($795 cohort, centered) |
| Final CTA copy | "Start Learning — $49" | "Watch Now — Free" | "Register for Cohort" |

## Brand tokens

Identical to the global Courses gallery (see `dev-notes-rocketpd-courses.md`). Locked RocketPD palette + new blue accent `#3b82f6`, `rounded-2xl` everywhere, `py-24` whitespace, soft gradient hero/CTA backgrounds.

## Accessibility

- FAQ buttons expose `aria-expanded` + `aria-controls`; panels have `role="region"` + `aria-labelledby`.
- Breadcrumb wrapped in `<nav aria-label="Breadcrumb">` with semantic `<ol>`.
- Decorative orbs/icons (Sparkles, ChevronUp/Down, Star) use `aria-hidden="true"`.
- YouTube iframe has descriptive `title` + `loading="lazy"`.
- All buttons that are real navigation use shadcn `<Button asChild>` + `<a>` so they're keyboard- and screen-reader-friendly.
- External links carry `target="_blank" rel="noopener noreferrer"`.

## Schema readiness (production checklist)

- `BreadcrumbList` — wire from breadcrumb `<ol>`.
- `Course` — title, description, provider (RocketPD), instructor (`Person`), offers (`Offer` from pricing tiers).
- `Person` — instructor block (name, jobTitle, image, sameAs links).
- `VideoObject` — trailer iframe (id `1lOJDsHcCPQ`, embedUrl, name, description).
- `FAQPage` — direct mapping from `COURSE.faqs[]`.
- `Event` — for cohort format only (use cohort schedule when present).

## Reuses / shares with

- `FORMAT_META` is duplicated locally (kept identical to the gallery's). When this becomes a real lib, lift `FORMAT_META` + `Course` type into a shared module.
- Header + Footer shells match the gallery + instructor pages.
- All sub-components (`ResourceFeaturedCard`, `ResourceCard`, `PricingCard`, `RelatedCourseCard`, `FaqItem`) live in this file. Each is small enough to lift into a shared `course-template/` folder when the next course page lands.

## How to spin up the next course (interim, pre-CMS)

1. Copy `rocketpd-course-kim-marshall/` → `rocketpd-course-{instructor-slug}-{format}/`.
2. Replace the `COURSE` const with the new course's data.
3. Set `COURSE.format` to the right format key — included/pricing render automatically.
4. Toggle `resources.{block}.enabled` to control which Free Resources render.
5. Update `related` to point at 3 sibling courses.
6. The mock auto-discovers at `/__mockup/preview/{dir}/Home` after a sandbox restart.
