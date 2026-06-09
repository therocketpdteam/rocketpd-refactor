# RocketPD Home — Implementation Notes

Guidance for translating the React/Tailwind mockup into WordPress (PHP / theme template
/ ACF or block patterns). Read alongside `home-section-blueprint.md`.

---

## How the mockup is structured

- **Single component:** `Home()` exported from
  `artifacts/mockup-sandbox/src/components/mockups/rocketpd-home/Home.tsx`. ~748 lines, no child page components — everything is inline JSX.
- **One small local sub-component:** `Logo` (renders the `<img>` logo). Reused in header + footer.
- **Primitives:** shadcn-style `Button`, `Card`/`CardHeader`/`CardTitle`/`CardContent`/`CardFooter`, `Badge` from `@/components/ui/*`. Icons from `lucide-react`.
- **Styling:** 100% Tailwind utility classes inline (no CSS modules). Brand colors are hard-coded hex in arbitrary-value classes (e.g. `bg-[#231F58]`).
- **DOM skeleton:** `div.min-h-screen` → `header` (sticky) → `main` (11 `section`s) → `footer`. Section crops in this package map to `header`, `main > section:nth-of-type(1..11)`, `footer`.

> ⚠️ The in-code `{/* N. */}` comment numbers do **not** match visual order. Use the
> blueprint's order (header, hero, stats, intro, value cards, LaunchPad, tiers, more-than-PD,
> resources, trust, testimonials, final CTA, footer).

---

## Data arrays / constants

Three sections are **data-driven** (map over arrays). These are the natural CMS repeaters:

1. **Filter chips** — `["All","Guides","Webinars","Playbooks","Podcasts","Videos","Templates"]`. First item is the active state. Presentation only (no filtering logic wired in the mockup).
2. **Resource cards** — array of 6 objects, each: `{ type, Icon, bg (gradient classes), title, desc, meta }`. Full descriptions:
   - **Guide / The First-Year Principal's Playbook** — *"Twenty-four pages of practical advice from veteran school leaders on navigating your first year in the corner office."* · meta `24-page PDF · 15 min read` · gradient `from-[#a154a1] to-[#5552b1]`
   - **Webinar / What's Actually Working in MTSS This Year** — *"Three district leaders share what they've learned from a full year of implementation — including what they'd do differently."* · `On-demand · 45 min` · `from-[#5552b1] to-[#343465]`
   - **Playbook / Designing Coaching Cycles That Stick** — *"A field-tested framework for instructional coaches working with K-12 teachers across content areas."* · `Playbook · 18 pages` · `from-[#fdb933] to-[#f99d33]`
   - **Podcast / Inside the Lounge** — *"Weekly conversations with the educators, leaders, and thinkers shaping K-12 — recorded with the lights on and the polish off."* · `Weekly · 32 min episodes` · `from-[#b467b4] to-[#a154a1]`
   - **Video Series / 5-Minute Classroom Reset** — *"Quick, practical strategies you can use tomorrow morning. Eight short episodes from teachers in the room."* · `Video Series · 8 episodes` · `from-[#7670b3] to-[#5552b1]`
   - **Template / PLC Agenda + Reflection Template** — *"A ready-to-use Google Doc structure for high-impact professional learning communities. Used by 600+ schools."* · `Editable Doc · Free` · `from-[#343465] to-[#231F58]`
3. **District wall** — array of 12 `{ name, state, font }`. The `font` field intentionally varies the typeface per district (serif/sans/Poppins, some uppercase/italic) to simulate distinct logos. Denver Public Schools (CO), Cherry Creek Schools (CO), Boulder Valley SD (CO), Jeffco Public Schools (CO), Aurora Public Schools (CO), Adams 12 Five Star (CO), Stoughton Public Schools (MA), Austin ISD (TX), Fairfax County Public Schools (VA), Wake County Public Schools (NC), Mesa Public Schools (AZ), Tulsa Public Schools (OK).

The **membership tiers** (4) and **testimonials** (3) are written as repeated JSX blocks
rather than arrays, but are structurally uniform and should also become repeaters.

---

## Reusable patterns

- **Section shell:** `<section class="py-24 [bg]"><div class="container mx-auto px-4 sm:px-6 lg:px-8">…`.
- **Centered section header:** `max-w-3xl mx-auto text-center mb-16` with Poppins H2 + body.
- **Icon tile:** `w-14 h-14 rounded-xl bg-[ACCENT]/10 text-[ACCENT] flex items-center justify-center`.
- **Eyebrow label:** `text-xs/sm font-bold uppercase tracking-widest text-[#7670b3 | #a154a1]`.
- **Pill badge:** `rounded-full px-4 py-1.5 font-semibold` with tinted bg.
- **Card hover:** `hover:shadow-xl hover:-translate-y-1 hover:border-[#a154a1]/40 transition-all`.
- **Decorative orb:** absolutely-positioned blurred circle inside an `overflow-hidden relative` section.

Build these once as ACF flexible-content layouts / block patterns / partials and reuse.

---

## CMS-editable vs static fallback

| Section | Recommendation |
| --- | --- |
| Header nav + CTA | **Static** (WP menu for links); CTA label/URL as theme options. |
| Hero | **CMS** — heading, body, 2 CTA labels+URLs, image, badge text, floating-stat number/label. |
| Stats bar | **CMS** (3 stat items repeater) — numbers change over time. |
| Intro statement | **CMS** (heading + paragraph). |
| Community value cards | **CMS repeater** (3 items: icon, accent, title, body) — keep exactly 3 for layout. |
| LaunchPad band | **CMS** — badge, heading, body, link label/URL, image, mini-card text. |
| Membership tiers | **CMS repeater** (4 items + a "featured" boolean). Footer CTA per tier. |
| More Than PD | **CMS** — heading, 2 paragraphs, image. |
| Resource cards | **CMS repeater** (the primary content engine) — type, icon, gradient, title, desc, meta, link. |
| Resource CTA bar | **CMS** — heading, subtext, 2 buttons. |
| Trust: partner card | **CMS** — eyebrow, name, descriptor, stat number/label, seal. |
| Trust: endorsers | **CMS repeater** of names (with optional logo image upload to replace text wordmarks). |
| Trust: district wall | **CMS repeater** (name, state) — provide a sensible **static fallback list** if empty. |
| Testimonials | **CMS repeater** (quote, name, role, org, avatar image OR initials+color). |
| Final CTA | **CMS** — heading, subtext, 2 buttons. |
| Footer | **Static** (WP menus for the 3 link columns) + theme options for blurb/social. |

**Static fallback content** (must render even with empty CMS): header, footer, intro
statement, the 3 value-card pillars, and the district wall sample list.

---

## Conditional rendering behavior

- **Testimonial card #3** is `md:hidden lg:block` — hidden on tablet, shown desktop+mobile. Replicate with responsive utility classes, **not** by deleting the node.
- **Floating cards** (hero stat `hidden md:block`; LaunchPad cohort `hidden sm:block`) — hidden on small screens.
- **Nav links** `hidden md:flex`; **Login** `hidden sm:block`; **stats-bar bullets** `hidden sm:block`.
- **Footer year** is computed at render (`new Date().getFullYear()`) — use PHP `date('Y')`.
- No data fetching, auth, or interactivity beyond hover/visual states. Filter chips do not actually filter.

---

## Accessibility details

- All `<img>` have `alt` text (logo "RocketPD"; hero "Educator in classroom"; community images described; principal avatar "Sarah").
- Filter chips are real `<button type="button">` elements.
- Links are `<a>`; nav and footer links currently `href="#"` placeholders (give real targets + discernible text — several footer links are fine, but social icons are text glyphs `in/X/fb` and need `aria-label`s when made real).
- **To improve in WP:** add a mobile nav (hamburger) with proper ARIA; ensure focus-visible states on chips/buttons; the decorative orbs and radial overlays should be `aria-hidden`; ensure color contrast on muted text (`#7670b3` on white is borderline for small text).

---

## Semantic heading structure

- **One `<h1>`** — hero "The Community for Educator Growth." Keep exactly one h1.
- **`<h2>`** for every major section title (Learning Meet Doing; World's Most Engaged…; Professional Growth That Fits…; A Membership for Every Stage; Real Resources…; More Than Professional Development; Hear from the Community; final CTA).
- **`<h3>`** for card titles, partner name, district-wall subheader, resource titles, CTA-bar heading.
- **`<h4>`** for footer column labels.
- Preserve this hierarchy in WP (do not promote card titles to h2 or skip levels).

---

## Pitfalls for WP/PHP/ACF translation

See `home-implementation-diff-guide.md` for the full list. Top items:

1. Don't drop sections or reorder to match current staging — match this package's order.
2. Recreate gradients/orbs with real CSS; don't flatten to solid colors.
3. Keep the featured-tier treatment (raised, badge, gold checks, tinted header).
4. Endorser/district "logos" are styled **text** — keep mixed typefaces (or swap to real logos intentionally).
5. Respect responsive visibility rules instead of deleting nodes.
6. Preserve exact copy, including em-dashes and the two-tone "Zero Cost." heading.
