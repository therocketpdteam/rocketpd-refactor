# RocketPD — LaunchPad page WordPress build notes

This document maps every section of the redesigned `/launchpad` mockup to the WordPress + Salient + WPBakery + ACF stack so the dev team can rebuild the page 1:1 in production.

The page is positioned as **"The Professional Learning System for Educator Growth"** — a district-ready SaaS product page (not a consumer/mobile-led course-marketplace page). It follows the strategic brief that frames RocketPD's three-layer ecosystem: **Free Community** (background only), **LaunchPad** (the sold product), and **LaunchPad+** (brief upgrade bridge).

## How to use this document

- Mockup file: `artifacts/mockup-sandbox/src/components/mockups/rocketpd-launchpad/Home.tsx`
- Static screenshot: `exports/rocketpd-launchpad.png` (1280 × 12,093 CSS px)
- All real product photography is reused from the existing `/launchpad` page — see "Asset inventory" at the bottom of this doc.
- Each section below describes: **visual intent → WPBakery row settings → ACF schema → assets → copy.**

### Mockup vs. production WordPress build

The React mockup is a **static visual reference** built with hard-coded seed data so designers and stakeholders can review the page in one screenshot. The **production WordPress build follows the ACF / CPT / repeater schemas in this document** — do not port the hard-coded arrays from the mockup as a final implementation. The mockup's static instructor list, partner names, trust-band stats, comparison-table rows, and copy defaults are all intended as **seed values** for the matching ACF groups, CPT entries, or repeaters described below.

### Out of scope for this page

- **Sticky top navigation** (logo, primary nav, login, "Schedule a Demo" button) — uses the **shared site header** documented in `wordpress-build-notes.md`. The LaunchPad nav item gets `class="active"` (purple, semibold).
- **Site footer** (5-column footer with social links, product/learn/company columns, copyright bar) — uses the **shared site footer** documented in `wordpress-build-notes.md`.
- The mockup re-renders both the header and footer locally so the page reads as a complete artboard; do not duplicate them in this WP page template.
- **LaunchPad+ product page** — the LaunchPad+ Bridge (§12) only links out to a separate `/launchpad-plus` page, which is **not in scope** for this build. Treat the "Learn More About LaunchPad+" CTA as a placeholder until that page is built.

### Brand tokens & typography

- Brand tokens (`Salient → Theme Options → Style → Colors`):
  - `$primary`: `#a154a1` (purple)
  - `$secondary`: `#5552b1` (indigo)
  - `$navy`: `#231F58` (navy)
  - `$navy-deep`: `#343465` (mid-navy)
  - `$gold`: `#fdb933` (CTA gold)
  - `$lavender-100`: `#c4c4e5` (border lavender)
  - `$cool-50`: `#f8fafc` (off-white surface)
- Body type: **Inter** 400/500/600/700. Headings: **Poppins** 600/700/800.
- Buttons: **gold** = primary CTA on dark sections; **outline-white** = secondary on dark; **purple-solid** = primary on light; **outline-purple** = secondary on light.
- Eyebrow labels: `text-[#a154a1] font-semibold uppercase tracking-wider text-sm` — used to introduce every section.

### Mobile responsiveness rules (≤ 768 px)

The mockup uses Tailwind responsive prefixes (`md:`, `lg:`) for a baseline mobile experience. The following sections need explicit attention from the WP dev team since they contain complex layouts that simply collapsing 2-col → 1-col will not handle gracefully:

- **§1 Hero** — On mobile, the floating UI accent cards (Certificate, In-progress, New course) hide via `hidden md:block` / `hidden lg:block`. Only the browser-frame dashboard image renders below the copy. Stack the dashboard image **below** the headline + CTAs.
- **§3 Intro** — The center "→" arrow between the two sub-columns hides on mobile (`hidden lg:flex`). Stack the "Today: Disconnected" cards **above** the unified card with vertical spacing.
- **§7 Workflow timeline** — The 5 step badges drop from 5-up to 2-up on small screens (`grid-cols-2 md:grid-cols-5`). The connecting gradient line hides on mobile (`hidden md:block`).
- **§10 Community hub** — The square hub-and-spoke diagram uses absolute-positioned satellite cards. On mobile, the WP build should swap to a **simple 2-column grid** of the 6 satellites with the "Your district on LaunchPad" center node above as a heading card (do not render the full hub diagram below ~600 px wide).
- **§13 Comparison table** — The 12-col grid stays as a horizontal table on mobile but shrinks to ~340 px wide. Keep the LaunchPad+ column gold tint and ✓/✕ icons; reduce the capability label font to 13 px and pad cells more tightly. Do **not** convert to stacked cards — the side-by-side comparison is the value of the section.

---

## Section map

| # | Section | Slug |
|---|---|---|
| 1 | Hero — product-dashboard-led | `lp-hero` |
| 2 | Trust band | `lp-trust` |
| 3 | Intro / Problem — disconnected → unified visual | `lp-intro` |
| 4 | From Course Library to Professional Learning System (5 cards) | `lp-evolution` |
| 5 | Product Experience — SaaS UI panels collage | `lp-product` |
| 6 | What Districts Get with LaunchPad (3 product cards) | `lp-districts` |
| 7 | Designed for Real District Use — workflow timeline | `lp-implementation` |
| 8 | Why Districts Choose LaunchPad (5-up benefits) | `lp-why` |
| 9 | Hear from Districts — testimonial videos | `lp-testimonials` |
| 10 | Connected to a National Community of Educators — community hub-and-spoke | `lp-community` |
| 11 | Meet Your Instructors (instructor grid) | `lp-instructors` |
| 12 | When Professional Learning Becomes a System — LaunchPad+ transition | `lp-transition` |
| 13 | For Districts Ready to Go Further — LaunchPad+ comparison | `lp-bridge` |
| 14 | Trusted by 850+ districts — partner logos | `lp-partners` |
| 15 | Final CTA | `lp-cta` |

---

## §1 Hero — `lp-hero`

**Visual intent.** Premium SaaS hero. Left = headline + sub + two CTAs. Right = a real LaunchPad dashboard screenshot inside a "browser frame" (traffic-light dots + URL bar) with **three floating UI accent cards** overlaid (`Certificate · 3 earned this term`, `In progress · 78%`, `Recommended · AI in the Classroom`). Background = navy gradient with subtle 40 px grid + two purple/violet glow orbs.

**Do NOT** use the consumer-style "woman + phone" photo here. The page must read as a district SaaS product, not a Duolingo-style consumer app.

**WPBakery row.**
- Row layout: full-width, 2 columns (50/50 desktop, stacked mobile).
- Background: gradient `#231F58 → #343465`. Add `class="lp-hero"` on the row so the grid pattern + glow orbs can be applied via theme CSS.
- Padding: `pt-16 pb-24 lg:pt-24 lg:pb-32`.

**ACF group: `lp_hero` (Page-level).**
| Field | Type | Notes |
|---|---|---|
| `eyebrow_label` | Text | "RocketPD LaunchPad" (gold pill with bolt icon) |
| `headline` | Text | "LaunchPad" |
| `headline_secondary` | Textarea | "The Professional Learning System for Educator Growth" |
| `subheadline` | Textarea | Long-form sub paragraph |
| `primary_cta_label` | Text | "Explore LaunchPad" |
| `primary_cta_link` | URL | `#explore` (anchor or page) |
| `secondary_cta_label` | Text | "See It In Action" |
| `secondary_cta_link` | URL | demo video modal trigger |
| `dashboard_image` | Image | `teacher-1.jpg` (dashboard screenshot) |
| `dashboard_image_alt` | Text | "LaunchPad course library and progress dashboard" |
| `floating_cards` | Repeater (3 rows) | `icon`, `eyebrow`, `label`, `value` (e.g. progress %), `position` (top-left / center-right / bottom-left) |

**Copy.**
- Headline (display-7xl): **LaunchPad**
- Sub-headline (gold, display-3xl): **The Professional Learning System for Educator Growth**
- Sub-paragraph: "LaunchPad helps districts move beyond disconnected professional development — giving teams one place to access high-quality learning, support educator growth, and turn professional learning into meaningful outcomes."
- Primary CTA: **Explore LaunchPad** (gold, dark text)
- Secondary CTA: **See It In Action** (outline white, with `play-circle` icon)

**Browser-frame mockup spec.** White rounded-2xl card, drop-shadow-2xl. Top bar `#f1f1f5` 12 px tall with three macOS dots (`#ff5f56`, `#ffbd2e`, `#27c93f`) and a faux URL pill reading `app.rocketpd.com/dashboard`. Image fills the card body at native aspect.

**Floating card spec.** White rounded-xl, shadow-xl, lavender border. Each contains a colored icon tile + 2-line text block (eyebrow uppercase 10 px + bold value 14 px). Arrange the three cards as: top-left (Certificate), middle-right with progress bar (In progress 78%), bottom-left (Recommended).

---

## §2 Trust band — `lp-trust`

**Visual.** Single row, mid-navy background `#343465`, three centered stats joined with `•` separators.

**ACF group: `lp_trust` (Page-level).**
| Field | Type | Notes |
|---|---|---|
| `stats` | Repeater (3 rows) | `icon` (FA / Lucide), `text` |

**Default seed values:**
- `users` icon — "40,000+ educators"
- `target` icon — "850+ districts"
- `sparkles` icon — "Nationally recognized instructors"

Icons render gold (`#fdb933`); body text is white.

---

## §3 Intro / Problem — `lp-intro`

**Visual intent.** Two-column layout illustrating the "disconnected PD → unified LaunchPad" story.

**Left column (col-span-6).**
- Eyebrow: `THE PROBLEM`
- H2: "Professional learning shouldn't live outside the work educators do every day." (Poppins 4xl, navy)
- 3 paragraphs of body copy
- Closing sentence in bold navy: "With LaunchPad, learning becomes part of the work — not separate from it."

**Right column (col-span-6).**
- Two sub-columns side by side:
  - **Left sub-col** (`Today: Disconnected`): a stack of 6 small white cards each containing a single label ("Annual workshops", "Onboarding binders", "Conference takeaways", "Faculty meetings", "Coaching notes", "PLC handouts") with a small red ✕ icon and a slight rotation (-2°, 1.5°, -0.8°, 2.2°, -1.4°, 0.8°) for the "messy stack" feeling.
  - **Right sub-col** (`With LaunchPad`): one tall purple-gradient card containing the inverted RocketPD logo at top, then a clean list of 6 capabilities with gold icons — "Course library", "Credit & certificates", "Implementation playbooks", "Progress dashboards", "Team learning", "Workbooks & resources" — and a footer label "ONE PROFESSIONAL LEARNING SYSTEM".
  - Center: a **gold circular arrow badge** absolutely positioned between the two sub-cols on desktop only.

**ACF group: `lp_intro`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | "The Problem" |
| `headline` | Text | H2 copy |
| `body_paragraphs` | Repeater | each row = one paragraph |
| `closing_callout` | Text | bold closing line |
| `today_cards` | Repeater | `label` only — rotation handled by CSS via `:nth-child` |
| `unified_logo` | Image | inverted RocketPD logo |
| `unified_capabilities` | Repeater | `icon`, `label` |
| `unified_footer_label` | Text | default: "One Professional Learning System" |

---

## §4 From Course Library to Professional Learning System — `lp-evolution`

**Visual intent.** Full-width navy gradient section with a tight 5-card grid showing the system's evolution from a video library into a structured PL system. Two background blur orbs (top-right purple, bottom-left indigo).

**Layout.**
- Eyebrow `THE EVOLUTION` (gold), H2 "From Course Library to Professional Learning System.", and intro paragraph centered, max-width 3xl.
- 5-up grid of glassmorphic cards (`bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl`), each with a gold icon tile, bold title, and 2-line description.
- Closing paragraph centered below.

**ACF group: `lp_evolution`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "The Evolution" |
| `headline` | Text | H2 |
| `intro` | Textarea | sub-paragraph |
| `cards` | Repeater (5 rows) | `icon`, `title`, `body` |
| `closing` | Textarea | summary paragraph |

**Default 5 cards (seed values, in order):**
1. Compass — "Align learning to strategic priorities" — Anchor every course and pathway to your district's strategic plan and instructional focus.
2. Trending Up — "Support growth across teams & roles" — Pathways for new hires, veteran teachers, coaches, and leadership.
3. Layers — "Flexible, on-demand access" — Expert-led video content available the moment educators need it.
4. Clipboard Check — "Streamline credit & documentation" — Cut the paperwork around professional credit and PDP tracking.
5. Workflow — "Connect learning to practice" — Tied directly to classroom and leadership routines.

**Closing paragraph:** "District leaders gain a clearer view of how professional learning is being used — while educators gain access to meaningful, practical support when and where they need it."

---

## §5 Product Experience — `lp-product`

**Visual intent.** SaaS UI **panel collage** — NOT photography. This is the page's "see-the-product" moment. Brief explicitly asked for: course card, progress bar, certificate status, search/topic filter, continue learning module.

**Layout.** 12-col grid; left col-span-5 = copy + 5-bullet checklist; right col-span-7 = 5-panel SaaS UI mockup grid.

**Right grid layout (2-col internal grid).**
- Top row, full width (col-span-2): **Search & Filter** panel — search input + 6 topic chips (`Reading` active in solid purple, the rest as outlined chips).
- Row 2 left: **Course Card** — gradient thumbnail with play icon, "0%" badge, course title "Closing Learning Gaps with Beth Estill", meta "5 modules · 1 hr", "Start Course →" link.
- Row 2 right: **Continue Learning** — 3 progress rows: Blended Learning 78%, Family Engagement 45%, School Culture 22% — each with a purple gradient progress bar.
- Row 3 left: **Certificates** — dark navy panel with gold accent blur, white inner card showing Award icon + "Earned this term: 3 of 5" + 60% progress bar + "Latest: Reading Instruction · 2 PD credits".
- Row 3 right: **Workbook** — white card with FileText icon + "Reflection Workbook · Step 4 of 6 · Last edited yesterday" + "Continue →" link.

**ACF group: `lp_product_experience`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "Product Experience" |
| `headline` | Text | "A Better Learning Experience for Educators." |
| `intro` | Textarea | "LaunchPad is designed around how educators actually learn and work…" |
| `bullets` | Repeater | `text` — 5 rows |
| `closing` | Textarea | summary paragraph |
| `panel_search_chips` | Repeater | `label`, `is_active` (bool) |
| `panel_course` | Group | `title`, `meta`, `cta_label` |
| `panel_continue_learning` | Repeater | `course_name`, `pct` (0-100) |
| `panel_certificates` | Group | `earned_count`, `total_count`, `latest_label` |
| `panel_workbook` | Group | `title`, `step`, `cta_label` |

These five panels can also be implemented as a **single illustrative SVG/PNG** if devs prefer, but ACF-driven HTML is recommended so values stay editable.

---

## §6 What Districts Get with LaunchPad — `lp-districts`

**Visual intent.** Three product cards with **real product photography** at the top of each card and a bullet list at the bottom. Brief specified: Card 1 = Expert-Led Video Courses, Card 2 = Mastery-Based Credit Pathways, Card 3 = **Flexible Team-Based Learning** (renamed from "District Implementation Support" per the brief).

**Card structure:**
- Aspect-16/10 image at top
- Colored icon tile under the image
- H3 title (Poppins xl)
- Body paragraph
- 3 checkmark bullets at the bottom (mt-auto so all cards align)

**ACF group: `lp_districts_get`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "What's Inside" |
| `headline` | Text | "What Districts Get with LaunchPad." |
| `cards` | Repeater (3 rows) | `image`, `image_alt`, `icon`, `icon_color` (purple/indigo/gold), `title`, `body`, `bullets` (sub-repeater of `text`) |

**Default 3 cards (seed values):**
1. **Expert-Led Video Courses** (`teacher-1.jpg`) — Short, practical courses led by nationally recognized K–12 thought leaders — focused on real classroom and leadership application.
   - Self-paced video modules · Practical, immediate application · Taught by leaders you know & respect
2. **Mastery-Based Credit Pathways** (`teacher-2.jpg`) — Educators demonstrate learning through structured reflection and application — earning professional credit without unnecessary paperwork.
   - Downloadable course workbooks · Mastery-Based PDP worksheets · Up to 3 credits per course
3. **Flexible Team-Based Learning** (`love-img-2.png`) — Use LaunchPad across onboarding, PLCs, PD days, and individual growth plans without disrupting schedules.
   - Use in PLCs and PD days · Onboarding-ready content · Individual growth pathways

---

## §7 Designed for Real District Use — `lp-implementation`

**Visual intent.** Two-part section.

**Top half (12-col grid).**
- Left col-span-6: copy block (eyebrow, H2 "Designed for Real District Use.", 2 paragraphs).
- Right col-span-6: a "Where LaunchPad Fits" card — gradient header bar + 5-row list (each row = icon tile + label) for: New teacher onboarding, PLC learning cycles, PD days and in-service sessions, Individual growth plans, Department and leadership meetings.

**Bottom half: Implementation workflow timeline card.**
- White rounded-2xl card containing the 5-step **Plan → Launch → Use → Track → Improve** workflow.
- Each step: a circular white badge (border-2 purple) with a Lucide icon, plus a small gold numbered badge in the corner (1–5). Step name (Poppins bold) + 2-line description below.
- A horizontal gradient line (`from-#5552b1 via-#a154a1 to-#fdb933`) connects all 5 badges at the centerline of the icons.
- Footer line in indigo: "This ensures LaunchPad becomes part of daily practice — not just another tool."

**ACF group: `lp_implementation`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "Implementation" |
| `headline` | Text | "Designed for Real District Use." |
| `intro_paragraphs` | Repeater | `text` — 2 rows |
| `where_fits_title` | Text | default: "Where LaunchPad Fits" |
| `where_fits_items` | Repeater | `icon`, `label` — 5 rows |
| `workflow_eyebrow` | Text | default: "Implementation Workflow" |
| `workflow_title` | Text | default: "From day one to district-wide impact." |
| `workflow_steps` | Repeater | `icon`, `step` (Plan/Launch/Use/Track/Improve), `body` — 5 rows |
| `workflow_footer` | Textarea | closing emphasis line |

---

## §8 Why Districts Choose LaunchPad — `lp-why`

**Visual intent.** Outcome-focused section with a 5-up gradient-tile card grid.

**Card structure:** white card, lavender border, padded `p-6`. Each card contains a 12 × 12 gradient icon tile (different gradient per card to add subtle visual rhythm) + a one-line outcome statement.

**ACF group: `lp_why`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "Outcomes" |
| `headline` | Text | "Why Districts Choose LaunchPad." |
| `intro` | Textarea | "Professional learning becomes a strategic asset — not a compliance requirement." |
| `cards` | Repeater (5 rows) | `icon`, `gradient_class` (purple-indigo / indigo-navy / navy-indigo / indigo-purple / gold-purple), `title` |

**Default 5 outcomes:**
1. Support educator morale and retention
2. Provide high-quality PD without disrupting schedules
3. Reduce administrative burden for professional credit
4. Align professional learning to district initiatives
5. Create flexible growth opportunities for staff

---

## §9 Hear from Districts — testimonial videos — `lp-testimonials`

**Visual intent.** Light cool-50 background. Section heading "Real stories from district leaders." A grid with **one featured 2-col video card** + **one open-slot placeholder** (1-col). The placeholder makes it explicit to the WP team that more district videos will be added later.

**Featured card.**
- Anchor wraps the entire card; opens YouTube/Vimeo URL.
- 16:9 thumbnail with overlay gradient (transparent → black 60%), centered white play button (80 px circle, purple play icon), top-left "Featured" pill (gold), bottom-right duration badge (`2:14`).
- Body section: large purple-tinted Quote icon, blockquote (Poppins xl semibold), name + role row, "Watch story →" link aligned right.

**Open-slot card.**
- Dashed lavender border with light purple→white→purple gradient background.
- Centered: white circle icon + "Add district testimonial" title + helper text + "Open slot" eyebrow label.

**Section CTA.** Small "See all customer stories →" link below the grid.

**ACF group: `lp_testimonials`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "Hear from Districts" |
| `headline` | Text | "Real stories from district leaders." |
| `intro` | Textarea | sub-paragraph |
| `videos` | Repeater | `featured` (bool), `thumbnail`, `thumbnail_alt`, `duration_label`, `quote`, `name`, `role`, `video_url` |
| `placeholder_slots` | Number | how many empty slots to render (default: 1) |
| `see_all_label` | Text | default: "See all customer stories" |
| `see_all_link` | URL | |

**Seed video.** The first repeater row should be pre-populated with the existing district leader testimonial: thumbnail = `testimonial-1-thumb.jpg`, video URL = `https://youtu.be/RQ8chrTTjIo`, quote = "We have professional learning that is personalized to our professional learning goals.", role = "Professional Learning Director", duration = "2:14".

**Recommended WP video block.** Use ACF + an `oEmbed` field, or use an HTML field that wraps the thumbnail in `<a class="lp-video-card" data-video-id="...">` and lazy-loads a YouTube/Vimeo iframe in a modal on click — avoids loading multiple iframes upfront.

---

## §10 Connected to a National Community of Educators — community hub-and-spoke — `lp-community`

**Visual intent.** 12-col grid; left col-span-5 = copy + 4-bullet checklist; right col-span-7 = a square hub-and-spoke diagram.

**Hub diagram spec.**
- Square aspect, max-width 520 px, centered.
- Two concentric dashed lavender rings (outer 8 px inset, inner 20 px inset).
- Center node: 160 × 160 px purple-gradient circle with gold bolt icon, two-line label "Your district / on LaunchPad" (Poppins base bold). White 4 px border, drop-shadow-2xl.
- 6 satellite nodes positioned around the ring at top-center, top-right, bottom-right, bottom-center, mid-left, top-left. Each = white rounded-2xl card with lavender border, holding an icon tile + label.

**ACF group: `lp_community`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "Community" |
| `headline` | Text | "Connected to a National Community of Educators." |
| `intro` | Textarea | "LaunchPad connects your team to the broader RocketPD community, where educators can:" |
| `bullets` | Repeater | `text` — 4 rows (Expert insights / Virtual learning experiences / Peer districts / Live cohorts and events) |
| `closing` | Textarea | "This keeps professional learning relevant, collaborative, and continuously evolving." |
| `center_label_line1` | Text | default: "Your district" |
| `center_label_line2` | Text | default: "on LaunchPad" |
| `satellites` | Repeater (6 rows) | `icon`, `label`, `position` (top / top-right / bottom-right / bottom / mid-left / top-left) |

**Default 6 satellites:** Expert Insights (lightbulb), Virtual Experiences (play-circle), Peer Districts (building-2), Live Cohorts (users-2), Best Practices (book-open), Events (calendar).

**Brief guardrail.** This section reframes the previous "RocketPD ecosystem" of product features into the **community** the district connects into. Do **not** revert satellite labels to product features (Courses / Workbooks / Certificates etc.) — those belong inside §6 ("What Districts Get") and §5 ("Product Experience"). Do **not** add Free Community as a positioned tier; the page is district-SaaS, not consumer.

---

## §11 Meet Your Instructors — `lp-instructors`

**Visual intent.** Same 11-instructor grid already in production. Each card = portrait image + "Watch trailer" overlay strip + focus eyebrow + name + 3-line description. The 12th tile is a gradient "More courses coming soon" CTA tile.

**CPT: `instructor` (already documented in `wordpress-build-notes.md`).**
| Field | Type | Notes |
|---|---|---|
| `name` | Title | |
| `headshot` | Image (featured image) | square / 4:5 portrait |
| `focus_topic` | Text | uppercase eyebrow ("Reading Instruction", "AI & Technology", etc.) |
| `description` | Textarea | 2-3 sentence bio, focused on what educators will learn |
| `is_new` | Toggle | render gold "NEW" pill |
| `course_meta` | Text | default: "5 modules · 1 hr" |
| `trailer_url` | URL | optional — opens video modal |

**Section ACF:** `lp_instructors` (page-level) provides eyebrow, H2, intro, "see all" link target, and an `instructor_query_count` field (default 11).

**Default 11 instructors** (already loaded into the mockup): Robert Barnett, Dr. Luvelle Brown, Dr. Steve Constantino, Beth P. Estill, Jennifer Gonzalez (NEW pill), Dr. Michael Hinojosa, A.J. Juliani, Kim Marshall, Carla Tantillo Philibert, Veronica V. Sopher, Dr. Catlin Tucker.

---

## §12 When Professional Learning Becomes a System — LaunchPad+ Transition — `lp-transition`

**Visual intent.** Centered, narrow (max-width ~5xl) section with a soft cool-to-lavender gradient background and two large blurred orbs (purple top-left, indigo bottom-right). Acts as the **bridge into LaunchPad+** — establishes why districts grow beyond LaunchPad before the comparison table appears.

**Layout.**
- Centered eyebrow + headline + intro paragraph.
- 2-column grid (collapses to 1-col on mobile) of 4 reason cards. Each card = white-translucent rounded-xl with lavender border, indigo icon tile + bold navy label.
- Closing statement (semibold) below the grid: "That's where LaunchPad can evolve even further."

**ACF group: `lp_transition`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "The Next Step" |
| `headline` | Text | "When Professional Learning Becomes a System." |
| `intro` | Textarea | "For many districts, access to high-quality learning is just the beginning. As teams grow, leaders often need more:" |
| `reasons` | Repeater (4 rows) | `icon` (compass / library / chart / network), `text` |
| `closing` | Textarea | bold lead-in to the next section |

**Brief guardrail.** This is a **bridging** section, not a sales pitch. Keep it short (4 reason chips, no images, no CTA button). The LaunchPad+ CTA lives in §13 below.

---

## §13 For Districts Ready to Go Further — LaunchPad+ Bridge — `lp-bridge`

**Visual intent.** 12-col grid; left col-span-5 = LaunchPad+ intro copy + 4-bullet checklist + "Learn More" CTA; right col-span-7 = comparison table.

**Comparison table spec.**
- Header row: navy gradient `from-#231F58 to-#343465`, white uppercase 12 px text. 3 columns: `Capability` (col-span-6), `LaunchPad` (col-span-3, centered), `LaunchPad+` (col-span-3, centered, **gold background** with "Branded edition" sublabel).
- 7 body rows alternating white / cool-50:
  | Capability | LaunchPad | LaunchPad+ |
  |---|---|---|
  | RocketPD expert course library | ✓ | ✓ |
  | Workbooks and certificates | ✓ | ✓ |
  | Searchable, organized content | ✓ | ✓ |
  | Implementation support | ✓ | ✓ |
  | District-branded platform | ✕ | ✓ |
  | District-created content hosting | ✕ | ✓ |
  | Custom resource hub | ✕ | ✓ |
- LaunchPad checks render in indigo (`#5552b1`); LaunchPad+ checks render in purple (`#a154a1`); ✕ marks render in light lavender (`#c4c4e5`).
- LaunchPad+ column has a soft gold tint (`bg-[#fdb933]/10`) to keep the visual emphasis on the upgrade column.
- Footer row (cool-100): two positioning lines side-by-side — "For districts that want immediate access to RocketPD's library" / "For districts ready to centralize their entire PL environment" (semibold indigo).

**ACF group: `lp_bridge`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "LaunchPad+" |
| `headline` | Text | "For Districts Ready to Go Further." |
| `intro` | Textarea | "LaunchPad+ extends the LaunchPad experience into a fully customized, district-wide professional learning environment." |
| `bullets` | Repeater (4 rows) | `text` — Branded platform / Internal documents / Combine RocketPD + district content / Centralized PL system |
| `cta_label` | Text | default: "Learn More About LaunchPad+" |
| `cta_link` | URL | LaunchPad+ page (out of scope) |
| `comparison_rows` | Repeater (7 rows) | `capability`, `lp_included` (bool), `lpp_included` (bool) |
| `footer_left` | Text | LaunchPad positioning |
| `footer_right` | Text | LaunchPad+ positioning |

**Brief guardrail.** No pricing on this page. LaunchPad+ is **only** described as the enterprise extension that includes branding, district-content hosting, and a centralized resource hub. The 4 bullets + comparison table are the entire LaunchPad+ story on this page — full pricing and feature drilldowns belong on the dedicated LaunchPad+ landing page (out of scope).

---

## §14 Trusted partners — `lp-partners`

**Visual intent.** 5 partner-district logos in a single horizontal flex row, grayscale @ 70% opacity, hover to full color. H2 above: "Join school leaders in 850+ districts that partner with RocketPD."

**ACF group: `lp_partners`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "Trusted Partners" |
| `headline` | Text | H2 |
| `subheadline` | Text | "From single buildings to statewide rollouts." |
| `logos` | Repeater | `image`, `district_name` (used as alt) |

**Asset note.** Real partner logos are placeholders (`partner-1.png` … `partner-5.png`) using generic district names. **Confirm with client which districts/logos can be used publicly** before launch.

---

## §15 Final CTA — `lp-cta`

**Visual.** Full-width navy gradient `from-#343465 to-#231F58` with two large blurred orbs (purple + violet). Centered headline + paragraph + a single primary CTA.

**ACF group: `lp_final_cta`.**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | default: "See It In Action" |
| `headline` | Text | "See LaunchPad in Action." |
| `body` | Textarea | "LaunchPad helps districts turn professional learning into a continuous system for educator growth and engagement. Schedule a walkthrough to see how LaunchPad can support your team." |
| `primary_cta_label` | Text | "Schedule a LaunchPad Demo" |
| `primary_cta_link` | URL | demo booking |

**Brief guardrail.** This section was simplified to a **single** CTA in the latest copy revision — do not re-add a secondary "Explore LaunchPad+" button. The LaunchPad+ path already lives in §13 above; the final CTA stays focused on demo conversion.

---

## Asset inventory

All images live under `artifacts/mockup-sandbox/public/images/launchpad/` in the mockup. In production, they should be uploaded to the WordPress media library and referenced via ACF Image fields.

**Real product photography (already on the live `/launchpad` page — re-use existing media library entries where possible):**
- `teacher-1.jpg` — Course library / "My Dashboard" screenshot. Used in §1 hero and §6 card 1.
- `teacher-2.jpg` — Workbook + certificate close-up. §6 card 2.
- `love-img-2.png` — Two educators at a laptop together. §6 card 3.
- `inst-*.png` / `inst-gonzalez.jpeg` — 11 instructor headshots. §11.
- `partner-1.png` … `partner-5.png` — Placeholder partner-district logos. §13. **Confirm rights/wording with client.**
- `rocketpd-logo.png` — Main logo (also inverted in §3 unified card).

**New/updated assets:**
- `testimonial-1-thumb.jpg` — YouTube thumbnail for the seed district leader testimonial video (`https://youtu.be/RQ8chrTTjIo`). §9.

**Assets removed from this build (vs. previous mockup):**
- `launch-banner.jpg` (woman + phone consumer hero) — removed; was setting the wrong "consumer mobile app" tone.
- `teacher-3.jpg` (two-phone mobile photo) — removed; mobile is no longer a standalone section.
- `pursue.png` (mobile My Courses screen) — removed for the same reason.
- `love-img.png` (admins + tablet + enrollment dashboard) — temporarily unused on this page; keep in media library for the LaunchPad+ page.
- `love-img-3.png` (admin team meeting) — temporarily unused.

Re-evaluate whether to surface the unused admin/dashboard photography on the future LaunchPad+ page rather than re-adding it to LaunchPad.
