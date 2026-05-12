# RocketPD — LaunchPad+ page WordPress build notes

This document maps every section of the `/launchpad-plus` mockup to the WordPress + Salient + WPBakery + ACF stack so the dev team can rebuild the page 1:1 in production.

The page is positioned as **"A Branded Professional Learning Platform for Your District"** — a higher-tier SaaS product page that builds on the LaunchPad foundation by adding district branding, internal content hosting, and admin visibility. The audience is **superintendents and cabinet leaders** evaluating an enterprise PL solution, so the page leans deeper navy + gold (less of LaunchPad's purple-to-pink lifestyle palette) and uses **system / dashboard / architecture visuals instead of photography**.

## How to use this document

- Mockup file: `artifacts/mockup-sandbox/src/components/mockups/rocketpd-launchpad-plus/Home.tsx`
- Static screenshot: `exports/rocketpd-launchpad-plus.png` (1280 × 8,952 CSS px)
- Shared chrome (header + footer + brand tokens) — see `wordpress-build-notes.md`.
- Sister product page (LaunchPad) — see `wordpress-build-notes-launchpad.md`.
- Each section below describes: **visual intent → WPBakery row settings → ACF schema → assets → copy.**

### Mockup vs. production WordPress build

The React mockup is a **static visual reference** built with hard-coded seed data (the demo district `Riverside Unified` and its green/orange palette) so designers and stakeholders can review the page in one screenshot. The **production WordPress build follows the ACF / repeater schemas in this document** — do not port the demo district name, palette, course tiles, or analytics figures as a final implementation. They are seed values only.

> **Important — the "Riverside Unified" demo district is a fictional placeholder.** Its name, initials (`RU`), green primary (`#0d6b5a`), darker green (`#094c40`), and orange accent (`#e76f3c`) appear repeatedly across the hero dashboard, fragmented-tools diagram (§2), creator package preview (§8), and admin analytics (§6). Production should either (a) keep a generic placeholder district when the page is rendered to prospects, or (b) drive the demo district from a single ACF group so a sales rep can swap in a real prospect's name/colors before a meeting. **Do not ship with "Riverside Unified" hard-coded into the WP template.**

### Out of scope for this page

- **Sticky top navigation** — uses the **shared site header** documented in `wordpress-build-notes.md`. On this page the **LaunchPad+** nav item gets `class="active"` (purple, semibold). The LaunchPad item should remain a sibling link, not a parent — both are first-class products.
- **Site footer** — uses the **shared site footer** documented in `wordpress-build-notes.md`.
- The mockup re-renders both the header and footer locally so the page reads as a complete artboard; do not duplicate them in this WP page template.
- **The LaunchPad product page** itself is built separately in `wordpress-build-notes-launchpad.md`. The "Explore LaunchPad" CTAs in §10 link to that page.

### Brand tokens & typography

All inherited from the shared system in `wordpress-build-notes.md`. Page-specific notes:

- LaunchPad+ leans on **navy + gold first**, with purple as a tertiary accent. Where LaunchPad uses `bg-gradient-to-br from-[#231F58] via-[#5552b1] to-[#a154a1]`, this page uses `bg-gradient-to-br from-[#0f0d2e] via-[#1a1744] to-[#231F58]` — a deeper, more institutional navy.
- Hero gold accent on the headline `+`: the trailing `+` glyph uses `text-[#fdb933]` to visually mark this as the "plus" tier.
- New token introduced for this page: `$navy-deep-2` = `#0f0d2e`. Add to `Salient → Style → Colors → Custom`. Used only as the start of the hero/CTA gradient.
- Architectural grid pattern (used in §1 Hero and §11 CTA): 56 px cell, `rgba(253,185,51,0.6)` 1 px lines at `opacity-[0.06]` (hero) / `opacity-[0.04]` (CTA). This is denser than LaunchPad's 40 px grid so the page reads more "system / blueprint."

### Mobile responsiveness rules (≤ 768 px)

- **§1 Hero** — The two floating accent cards (`Subdomain`, `Library`) hide via `hidden md:block` / `hidden lg:block`. The branded dashboard mockup (browser frame + district header bar + KPIs + library + sidebar + progress bar) stacks **below** the headline + CTAs.
- **§2 Intro** — The fragmented-tools 3×2 grid + arrow + unified branded card stack vertically. The 3×2 stays as 3×2 (do not collapse to 2×3 — the visual messiness of "many tools" is the point). The arrow is rotated 90° on desktop too, so no change needed.
- **§4 System Overview** — The 3-pillar columns (`Learning · Resources · Management`) collapse to single-column. The "Foundation bar" beneath stays full-width.
- **§6 Admin Visibility** — The dashboard mockup is the largest mobile risk. The 3-col chart row (bar chart `col-span-2` + completion ring) collapses to single-column. The KPI 4-up grid drops to 2×2. The "Top Courses by Participation" table keeps all columns but reduces to `text-[10px]` on mobile and right-aligns the percent column tightly.
- **§8 Creator Package** — The two-column layout collapses; the example-package card stacks below the copy. The 6-tile course grid inside the card stays as 3×2.
- **§10 Comparison table** — Same rule as the LaunchPad page: keep as a horizontal table (do **not** convert to stacked cards). The capability column gets `text-[13px]`; the two product columns shrink the `Check`/`X` icons to 16 px.

---

## Section map

| # | Section | Slug |
|---|---|---|
| 1 | Hero — branded district platform mockup | `lpp-hero` |
| 2 | Intro — fragmented tools → unified branded platform | `lpp-intro` |
| 3 | Platform Positioning — 5-bullet checklist | `lpp-positioning` |
| 4 | One Platform for Learning and Resources — 3-pillar system overview | `lpp-system` |
| 5 | What LaunchPad+ Includes — 3 feature cards | `lpp-features` |
| 6 | Visibility Into Participation and Progress — admin analytics dashboard | `lpp-admin` |
| 7 | Designed to Support District Implementation — 5-up outcomes | `lpp-value` |
| 8 | Creator's Package — example 6-course package card | `lpp-creator` |
| 9 | Connected to RocketPD Learning Experiences — 3 connection cards | `lpp-ecosystem` |
| 10 | Start with LaunchPad. Expand with LaunchPad+ — comparison table | `lpp-compare` |
| 11 | Final CTA | `lpp-cta` |

---

## §1 Hero — `lpp-hero`

**Visual intent.** Enterprise SaaS hero. Left = eyebrow `RocketPD LaunchPad+` (gold pill with `Building2` icon), giant `LaunchPad+` headline (the `+` glyph in gold), subhead "A Branded Professional Learning Platform for Your District," 3-line body, and two CTAs (`Schedule a LaunchPad+ Demo` gold-primary + `Explore LaunchPad` outline-white). Right = a **branded district dashboard** inside a browser frame at `pd.riverside-usd.org`, with two floating UI accent cards (`Subdomain · pd.riverside-usd.org`, `Library · RocketPD + 11 internal courses`).

The dashboard mockup must visually demonstrate the value prop: a district-themed header bar (using the demo district's green/orange palette — **NOT** RocketPD purple), a dashboard with KPIs, a course library mixing RocketPD + district-built tiles, a "District Resources" sidebar, and a cohort progress bar. A small `Powered by RocketPD` label sits in the sub-nav as a quiet attribution.

**Background.** Deep navy gradient `from-[#0f0d2e] via-[#1a1744] to-[#231F58]` + 56 px gold architectural grid at 6 % opacity + a warm gold blur orb (top-right) + an indigo blur orb (bottom-left). No purple/pink glow.

**WPBakery row.**
- Row layout: full-width, 2 columns (50/50 desktop, stacked mobile).
- Row settings: full-width stretched, padding `top: 64px` / `bottom: 96px` (mobile: `top: 48px` / `bottom: 64px`).
- Row background: gradient via Salient row settings or custom CSS class `.lpp-hero-bg`.
- Custom inline SVG / div for grid pattern (insert via Raw HTML element).

**ACF group: `lpp_hero`** (Page-level field group, location rule = `Page → Page Template = LaunchPad+`)
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | Default: `RocketPD LaunchPad+` |
| `eyebrow_icon` | Select | Default: `building` (Lucide name) |
| `headline` | Text | Default: `LaunchPad+` (the `+` is auto-styled gold by the template) |
| `subheadline` | Text | Default: `A Branded Professional Learning Platform for Your District` |
| `body` | Textarea | 1–2 short paragraphs |
| `primary_cta_label` | Text | Default: `Schedule a LaunchPad+ Demo` |
| `primary_cta_url` | URL | Default: `/demo?product=launchpad-plus` |
| `secondary_cta_label` | Text | Default: `Explore LaunchPad` |
| `secondary_cta_url` | URL | Default: `/launchpad` |
| `demo_district` | Group (see below) | Drives all "branded" treatments on the page |

**ACF group: `demo_district`** (shared / used in §1 hero, §2 unified card, §6 admin URL, §8 creator example)
| Field | Type | Default |
|---|---|---|
| `name` | Text | `Riverside Unified` |
| `initials` | Text (max 2) | `RU` |
| `subdomain` | Text | `pd.riverside-usd.org` |
| `primary_color` | Color picker | `#0d6b5a` |
| `primary_dark_color` | Color picker | `#094c40` |
| `accent_color` | Color picker | `#e76f3c` |

> **Implementation note.** Pass `demo_district` values as CSS custom properties on a wrapper div: `style="--dd-primary:{{primary}};--dd-primary-dark:{{primary_dark}};--dd-accent:{{accent}};"`. Then style every "branded" element with `var(--dd-primary)` etc. so a sales rep can change a district name and palette in one ACF group and have the entire page reflect it.

**Floating accent cards.** Two cards positioned absolutely:
- Card 1 (left, top-32): `Globe` icon, eyebrow `Subdomain`, body `pd.riverside-usd.org`. Hidden `<md`.
- Card 2 (right, bottom-4): `Layers` icon, eyebrow `Library`, body `RocketPD + 11 internal courses`. Hidden `<lg`.

Both pull copy from `lpp_hero` ACF (`accent_card_1_*`, `accent_card_2_*`).

**Asset.** No photographic assets. The dashboard is a pure CSS/HTML mockup — the production build should rebuild it as a Salient HTML element / Raw HTML block so it stays crisp at any viewport.

---

## §2 Intro — `lpp-intro`

**Visual intent.** Two-column section. Left = copy block (eyebrow `The Gap`, headline `When Professional Learning Needs More Than Access.`, 3 paragraphs). Right = a **fragmented-to-unified visual diagram**:
1. Top label `Today: Scattered Across Tools` (red).
2. 3×2 grid of slightly-rotated tool cards: `PDF · PD Day slides`, `Drive · Onboarding folder`, `YouTube · Webinar recording`, `LMS · Compliance modules`, `Email · Conference notes`, `Doc · Coaching protocols`.
3. Centered gold down-arrow connector.
4. Below: a unified branded platform card (district-colored header strip + 6-icon module grid: `Courses · Resources · Certificates · Users & Roles · Analytics · Branding`) + bottom strip `One Branded Platform · One Login · One Library`.

**WPBakery row.**
- 2 columns (`vc_col-md-6`).
- Background: solid white.
- Padding: `top: 80px` / `bottom: 80px`.

**ACF group: `lpp_intro`**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | Default: `The Gap` |
| `headline` | Text | Default: `When Professional Learning Needs More Than Access.` |
| `paragraphs` | Repeater (Textarea, max 4) | Each row is one paragraph. The last paragraph is rendered semibold/dark. |
| `fragmented_tools` | Repeater (max 8) | Sub-fields: `tag` (Text, e.g. `PDF`), `label` (Text, e.g. `PD Day slides`). Default seed = the 6 above. |
| `unified_modules` | Repeater (max 8) | Sub-fields: `icon` (Lucide select), `label`. Default seed = `Library/Courses`, `Folder/Resources`, `Award/Certificates`, `Users2/Users & Roles`, `BarChart3/Analytics`, `Palette/Branding`. |
| `unified_footer_text` | Text | Default: `One Branded Platform · One Place · One Library`. **Avoid the phrase "One Login"** — it can be misread as enterprise SSO, which LaunchPad+ does not currently provide. See the SSO/integration callout under §11 guardrails. |

> The branded header strip on the unified card uses the same `demo_district` colors from §1.

---

## §3 Platform Positioning — `lpp-positioning`

**Visual intent.** Centered intro (eyebrow `What It Is`, headline `A Central Platform for District Professional Learning.`, 1-line body) → **5-card horizontal grid** of platform capabilities (each card: navy/gold icon chip + bold title + 2-line body) → 1-line closing statement.

**Cards (default seed):**
| Icon (Lucide) | Title | Body |
|---|---|---|
| `Library` | RocketPD course library | Provide access to RocketPD's expert-led professional learning library. |
| `Upload` | District content hosting | Host your own asynchronous professional learning content alongside it. |
| `Folder` | Resource organization | Organize internal guides, webinars, and training materials in one place. |
| `Users2` | User management | Manage users and permissions across schools, departments, and roles. |
| `BarChart3` | Participation tracking | Track enrollment, participation, and course completion across teams. |

**WPBakery row.** Background `#f8fafc` with `border-y` lavender. 5-col grid (collapses to 2-col on tablet, 1-col mobile).

**ACF group: `lpp_positioning`**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` / `headline` / `intro_body` | Text / Text / Textarea | — |
| `capabilities` | Repeater (max 6) | `icon`, `title`, `body` |
| `closing_text` | Textarea | Default: "All within a platform **customized to reflect your district's brand and priorities**." Bold the second clause via inline `<strong>`. |

---

## §4 System Overview — `lpp-system`

**Visual intent.** Centered intro → **3-pillar layered diagram**. Each pillar is a card with a colored gradient header strip (`Learning` purple, `Resources` magenta, `Management` navy), a "Pillar" eyebrow + name, and 2–3 bullet rows below (each row = small icon chip + label in a light surface). Below the 3 cards: a single "Foundation bar" — navy gradient pill with a gold `Zap` icon and the text `All running on your branded LaunchPad+ platform — one system, one login`.

**Bullets (default seed):**
- **Learning** (color `#5552b1`, icon `GraduationCap`): `RocketPD expert-led courses` (`Library`), `District-created courses` (`Upload`), `Legacy district content` (`Archive`).
- **Resources** (color `#a154a1`, icon `BookOpen`): `Strategic documents & frameworks` (`FileText`), `Guides and webinars` (`Video`), `Training materials` (`Folder`).
- **Management** (color `#231F58`, icon `Settings`): `User roles & permissions` (`Users2`), `Participation tracking` (`Eye`), `Completion tracking` (`ClipboardCheck`).

**ACF group: `lpp_system`**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` / `headline` / `intro_body` | — | — |
| `pillars` | Repeater (max 4) | `name`, `icon`, `color` (Color picker), `bullets` (sub-repeater of `icon` + `text`) |
| `foundation_text` | Text | Default: `All in one branded LaunchPad+ platform — one place for staff to learn`. Same SSO caution as §2 — avoid phrases like `one login`, `single sign-on`, `one identity`. |
| `closing_text` | Textarea | — |

**Implementation note.** The colored header strip uses `linear-gradient(135deg, {color}, {color}dd)` — concatenate the column hex with `dd` opacity for a subtle gradient. Build via inline style in the template.

---

## §5 What LaunchPad+ Includes — `lpp-features`

**Visual intent.** Dark navy section (matching the LaunchPad page's "Why Districts Choose" treatment). Centered intro (gold eyebrow `What's Included`, white headline) → 3 large feature cards on the navy background. Each card: gold icon chip → title → 3-line body → bottom border-top with a gold checkmark + uppercase highlight phrase.

**Cards (default seed):**
| Icon | Title | Body | Highlight |
|---|---|---|---|
| `Palette` | Custom-Branded Platform | A district-specific environment with your logo, colors, and subdomain — creating a consistent experience for staff. | Your brand, your subdomain |
| `Library` | RocketPD Content Library Included | Full access to RocketPD's expert-led video courses, workbooks, and certificates — already in your platform on day one. | 100s of courses, ready to go |
| `Upload` | District Content Hosting | Upload and organize your own training materials, courses, and resources alongside RocketPD content. | Combine internal + external content |

**WPBakery row.** Full-width, navy gradient background `from-[#231F58] via-[#343465] to-[#231F58]` + gold + indigo glow orbs (decorative absolute divs). Card backgrounds `bg-white/[0.04]` with `border border-white/10`.

**ACF group: `lpp_features`**
| Field | Type |
|---|---|
| `eyebrow` / `headline` | — |
| `cards` | Repeater (max 3): `icon`, `title`, `body`, `highlight_phrase` |

---

## §6 Admin Visibility — `lpp-admin`

**Visual intent.** The most product-detailed section. Two columns: left = copy (eyebrow `Built for Leaders`, headline `Visibility Into Participation and Progress.`, body, 3-bullet list with navy/gold icon chips, 1-line closer). Right = a **realistic admin analytics dashboard mockup**:

1. Browser frame: `pd.riverside-usd.org/admin/analytics`
2. Title bar: eyebrow `Admin · Analytics` + `Professional Learning Activity` + `Last 30 days` chip.
3. **KPI row** — 4 cards: `Active learners 1,247 +8.2%`, `Enrollments 2,894 +14%`, `Completions 1,142 +22%`, `Avg. progress 64% +5pt`.
4. **Chart row** — Left (`col-span-2`): "Course Activity by Week" stacked bar chart, 6 weeks, two series (`Enrollments` `#5552b1`, `Completions` `#fdb933`). Right: completion donut showing `78%` (`#5552b1` arc on `#e4e4ea` track).
5. **Top Courses table** — 4 rows mixing `RPD` and `RU` source badges, course title, enrolled count, mini progress bar, completion %.

**WPBakery row.**
- 2 columns (`vc_col-lg-5` + `vc_col-lg-7`).
- Background: white. Padding `top: 96px` / `bottom: 96px`.
- The dashboard mockup is rebuilt as a Salient HTML element. **Use real Recharts / Chart.js charts only if pulling live data**; otherwise keep as static SVG / div bars to avoid script weight.

**ACF group: `lpp_admin`**
| Field | Type | Notes |
|---|---|---|
| `eyebrow` / `headline` / `body` / `closing_text` | — | — |
| `bullets` | Repeater (max 4) | `icon`, `text` |
| `dashboard_kpis` | Repeater (max 4) | `label`, `value`, `trend`, `positive` (boolean). Drives the 4-up KPI row. |
| `dashboard_chart_data` | Repeater (max 6) | `period_label` (e.g. `W1`), `enrollments` (Number), `completions` (Number) |
| `dashboard_completion_pct` | Number | Donut % |
| `dashboard_top_courses` | Repeater (max 4) | `source` (Select: `RPD` / `District`), `title`, `enrolled` (Number), `completion_pct` (Number) |

> All of the above values are **for visual demonstration only**. They should not be presented to prospects as RocketPD case-study data.

---

## §7 Designed to Support District Implementation — `lpp-value`

**Visual intent.** Light surface (`#f8fafc`) section. Centered intro (eyebrow `Why It Matters`, headline, 1-line body) → **5-up outcomes grid**. Each card: navy-to-indigo gradient icon chip with gold icon → bold title (no body). Below the grid: a single italic line summarizing the value.

**Cards (default seed):**
| Icon | Title |
|---|---|
| `Library` | Bring PL into one accessible platform |
| `Network` | Reduce fragmentation across tools and resources |
| `Workflow` | Support consistent learning experiences across teams |
| `Compass` | Provide flexible access to training and materials |
| `BookOpen` | Maintain and grow a reusable content library |

**ACF group: `lpp_value`**
| Field | Type |
|---|---|
| `eyebrow` / `headline` / `intro_body` / `closing_italic` | — |
| `outcomes` | Repeater (max 6): `icon`, `title` |

---

## §8 Creator's Package — `lpp-creator`

**Visual intent.** Two columns. Left = copy (eyebrow `Creator's Package`, headline `Create and Scale Your Own Professional Learning Content.`, 2 paragraphs, 3-bullet checklist with gold-on-purple check chips). Right = a **dark navy "Example Package" card** with a gold ribbon, header (`Sparkles` icon + `Six-course district build`), 3 inclusion rows (each = gold icon + label), and a bottom mini-grid of 6 example district course tiles (using the demo district's color and initials). Closing italic line beneath the card frame.

**Inclusion rows (default):**
- `Video` — Six custom courses produced with RocketPD
- `Building2` — Hosted inside your LaunchPad+ platform
- `ShieldCheck` — Ongoing access and support

**Course tile examples (default — demo district seed):**
`RU Strategic Plan`, `MTSS at RU`, `RU Onboarding`, `RU Coaching`, `RU Family Engage`, `RU Tech Stack`. All tiles use the `demo_district.primary` color background with `demo_district.initials` text.

**ACF group: `lpp_creator`**
| Field | Type |
|---|---|
| `eyebrow` / `headline` / `intro_paragraphs` (Repeater of textarea) / `bullets` (Repeater of text) | — |
| `package_ribbon_label` | Text | Default: `Example Package` |
| `package_title` | Text | Default: `Six-course district build` |
| `package_inclusions` | Repeater (max 4): `icon`, `label` |
| `example_courses` | Repeater (max 6): `title` (the demo district color/initials are inherited from `demo_district`) |
| `package_disclaimer` | Text | Default: `Final scope and pricing tailored per district during onboarding.` |
| `closing_text` | Textarea | — |

---

## §9 Connected to RocketPD Learning Experiences — `lpp-ecosystem`

**Visual intent.** Dark navy section. Centered intro (gold eyebrow `Beyond the Platform`, white headline `Connected to RocketPD Learning Experiences.`, body). Below: a 3-up grid of glass-style cards on the navy background, each with a gold icon chip → title → 3-line body. Closing italic line beneath in soft lavender.

**Cards (default seed):**
| Icon | Title | Body |
|---|---|---|
| `Users2` | Live-virtual cohorts | Join expert-led cohorts and learning experiences offered throughout the year. |
| `Sparkles` | New course releases | Get continuous access to new RocketPD courses as they're added to the library. |
| `BookOpen` | Guides and PL resources | Access ongoing guides, frameworks, and professional learning resources. |

**ACF group: `lpp_ecosystem`**
| Field | Type |
|---|---|
| `eyebrow` / `headline` / `intro_body` / `closing_italic` | — |
| `cards` | Repeater (max 4): `icon`, `title`, `body` |

> ⚠️ Per V1 guardrails — **no AI claims, no transformation language, no "operating system" claims, no deep integrations**. Keep copy descriptive of what's offered (cohorts, courses, guides) without promising outcomes.

---

## §10 Start with LaunchPad. Expand with LaunchPad+. — `lpp-compare`

**Visual intent.** Two columns. Left = copy (eyebrow `How They Compare`, headline `Start with LaunchPad. Expand with LaunchPad+.` — note the gold `+` again, and a `<br>` between sentences, 2 paragraphs explaining the relationship, outline-purple `Explore LaunchPad` CTA). Right = a **comparison table**.

**Table structure:**
- Header row: navy gradient, 3 cells (`Capability` 6-col, `LaunchPad` 3-col, `LaunchPad+` 3-col with gold background and a "Branded edition" sublabel).
- 6 capability rows alternating white / `#f8fafc`, each with a `Check` (`#5552b1` for LaunchPad, `#a154a1` for LaunchPad+) or `X` (`#c4c4e5`).
- LaunchPad+ column has a `bg-[#fdb933]/10` tint to keep it visually featured.
- Bottom strip: 2-cell footer with a 1-line audience tagline for each product.

**Default rows:**
| Capability | LaunchPad | LaunchPad+ |
|---|---|---|
| RocketPD Courses | ✓ | ✓ |
| Workbooks & Certificates | ✓ | ✓ |
| Searchable Learning | ✓ | ✓ |
| District Branding | — | ✓ |
| District Content Hosting | — | ✓ |
| Central Resource Hub | — | ✓ |

**Audience taglines (footer):**
- LaunchPad: `For districts that want immediate access to RocketPD's library`
- LaunchPad+: `For districts ready to centralize their entire PL environment`

**ACF group: `lpp_compare`**
| Field | Type |
|---|---|
| `eyebrow` / `headline_html` (Wysiwyg, accepts the `<br>` and gold `<span>`) / `intro_paragraphs` | — |
| `cta_label` / `cta_url` | Text / URL |
| `comparison_rows` | Repeater (max 10): `capability`, `lp_included` (Boolean), `lpp_included` (Boolean) |
| `lp_audience_tagline` / `lpp_audience_tagline` | Text |

---

## §11 Final CTA — `lpp-cta`

**Visual intent.** Deep navy gradient section matching the hero (`from-[#0f0d2e] via-[#1a1744] to-[#231F58]`) + the same 56 px gold grid pattern at 4 % opacity + indigo glow + warm gold glow. Centered: gold eyebrow `Get Started` → white headline `Build a More Organized Approach to Professional Learning.` → 2-line body → **single gold CTA** `Schedule a LaunchPad+ Demo →`.

> Per the user's revised v1 spec, the final CTA is a **single button** — do not add a secondary CTA here.

**ACF group: `lpp_cta`**
| Field | Type |
|---|---|
| `eyebrow` | Text |
| `headline` | Text |
| `body` | Textarea |
| `cta_label` | Text |
| `cta_url` | URL |

---

## Asset inventory

**No photographic assets are required for this page.** Every visual element is built with HTML/CSS and Lucide icons. This is intentional — the page reads as a system/product, not an editorial/lifestyle page.

| Asset | Type | Used in | Source |
|---|---|---|---|
| RocketPD logo (`rocketpd-logo.png`) | PNG | Header + Footer | Shared brand asset |
| Lucide icon set | SVG (inline) | All sections | Already used across the site; no new icons |
| Demo district palette (`#0d6b5a`, `#094c40`, `#e76f3c`) | CSS color | §1, §2, §6, §8 | **Placeholder — see "demo district" callout above** |

Charts in §6 are hand-rolled CSS bars + an SVG donut. If the team prefers a real charting library (e.g. for a future "live demo" mode), Recharts is already a project dependency on the React mockup side; the WP build can use Chart.js with a tiny static-config initializer.

---

## V1 copy guardrails — confirmation checklist

This page was built specifically against the user's v1 guardrails. Before publishing, verify the production copy still passes all four checks:

- [ ] **No AI claims.** Search the page for `AI`, `artificial intelligence`, `machine learning`, `predictive`, `recommend`. Should find no matches outside of the Lucide icon name `Sparkles` (which is purely decorative here).
- [ ] **No transformation language.** Search for `transform`, `revolutionize`, `unleash`, `unlock`, `reimagine`, `breakthrough`. Should find no matches. The strongest active verbs on the page are `bring`, `organize`, `host`, `support`, `centralize`, `manage`, `track`.
- [ ] **No deep integration / SSO claims.** Search for `integrate`, `integration`, `SSO`, `single sign-on`, `one login`, `one identity`, `federate`, `Clever`, `ClassLink`, `Canvas LMS`, `Schoology`, `API`. Should find no matches. The page positions LaunchPad+ as a **standalone branded environment**, not as something that plugs into existing district identity providers or systems. "One Place" / "One Library" / "One Experience" are safe substitutes for the unifying message; "one login" reads as enterprise SSO and must be avoided in v1.
- [ ] **No "operating system" claims.** Search for `operating system`, `OS`, `platform of platforms`, `single source of truth`. Should find no matches. The page consistently uses the softer phrasing "platform" / "central platform" / "one place" / "branded environment."

If any check fails, fix the offending copy before pushing live.

---

## Page template registration

- **Template name:** `LaunchPad+ Page`
- **Template file:** `wp-content/themes/salient-child/page-launchpad-plus.php`
- **Permalink:** `/launchpad-plus/`
- **Default page metadata:**
  - SEO title: `LaunchPad+ — A Branded Professional Learning Platform for K-12 Districts | RocketPD`
  - Meta description: `LaunchPad+ gives districts a branded, centralized platform for professional learning — combining RocketPD's expert-led library with your own internal content, resources, and admin tools.`
  - OG image: 1200 × 630 export of §1 hero (regenerate from the mockup before launch).
- **Nav linkage:** Add `LaunchPad+` to the primary nav between `LaunchPad` and `Resources`. On the LaunchPad page, the existing "LaunchPad+ Bridge" CTA (§13 of `wordpress-build-notes-launchpad.md`) should point here.
