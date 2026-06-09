# LaunchPad+ — Full Page Blueprint & Exact Content Inventory

> Deliverables **2** (blueprint) and **3** (content inventory) combined per section so
> Codex has structure + every word in one place. Order is **true visual order**
> (top → bottom). All copy below is verbatim from the mockup — reproduce exactly,
> including capitalization and punctuation.

Container convention: `container mx-auto px-4 sm:px-6 lg:px-8`, most content blocks
capped at `max-w-7xl`; centered intro text capped at `max-w-3xl`. Standard section
rhythm is `py-24` (hero and a couple of bands differ — noted per section).

---

## 01 — Header / Sticky Nav

- **Order:** 1 · **Layout:** sticky top bar, logo left / nav center-right / actions right.
- **Background:** `bg-white/95` + `backdrop-blur-sm`, bottom border `#c4c4e5`/30, subtle shadow. Height `h-20`. `sticky top-0 z-50`.
- **Logo:** RocketPD PNG, `h-9` mobile / `h-11` desktop.
- **Nav links (desktop only, hidden < md):** `Topics` · `Instructors` · `LaunchPad` · `LaunchPad+` · `Resources` · `About`
  - **Active item:** `LaunchPad+` rendered in magenta `#a154a1`, `font-semibold` (this is the current page).
  - Other links: `#343465`, hover → `#a154a1`.
- **Right actions:** `Login` text link (hidden < sm) + gold button **"Schedule a Demo"** (`#fdb933` bg, navy text).
- **Responsive:** below `md` the center nav hides (intended; no hamburger in mockup — see responsive notes for the WP recommendation). `Login` hides below `sm`; the gold button always shows.

---

## 02 — Hero (branded district platform)

- **Order:** 2 · **Layout:** 2-column grid (`lg:grid-cols-2`), copy left / browser mockup right. Stacks on mobile.
- **Background:** dark gradient `from-#0f0d2e via-#1a1744 to-#231F58`; faint gold **architectural grid** overlay (56px, opacity .06); two blurred orbs (gold top-right, purple bottom-left). `overflow-hidden`, `pt-16 pb-24 lg:pt-24 lg:pb-32`.
- **Eyebrow badge:** `Building2` icon + text **"RocketPD LaunchPad+"** — gold-tinted pill, uppercase, tracking-wider, 11px.
- **H1:** **"LaunchPad+"** — Poppins extrabold, up to `text-7xl`; the `+` is gold `#fdb933`.
- **Sub-headline (Poppins, semibold, ~32px, white/95):** **"A Branded Professional Learning Platform for Your District"** (line break before "Platform" on ≥ sm).
- **Body (white/80, text-lg):** "Bring your district's professional learning into one place — combining RocketPD's expert-led content with your own resources inside a fully branded platform."
- **Buttons (2, stack on mobile):**
  1. **"Schedule a LaunchPad+ Demo"** + `ArrowRight` — gold solid, h-14.
  2. **"Explore LaunchPad"** — outline, white/40 border, transparent.
- **Right visual — browser-framed district dashboard (CSS/HTML, not an image):**
  - Browser chrome: 3 traffic-light dots + URL pill **"pd.riverside-usd.org"**.
  - District header bar in **district green** gradient (`#094c40 → #0d6b5a`) with orange `RU` avatar, **"Riverside Unified"** / "Professional Learning", and nav words: My Learning · Library · Resources.
  - Sub-nav: **Dashboard** (active, green underline) · Course Library · District Resources · Cohorts · right-aligned magenta **"Powered by RocketPD"**.
  - **Stat tiles (3):** "Active learners **1,247** +8%" · "Courses in progress **412** +12%" · "Certificates earned **318** +22%".
  - **Library panel** with two source chips: `ROCKETPD` (magenta) + `RU DISTRICT` (green). 6 mini course tiles: School Culture (RPD) · Reading Inst. (RPD) · RU Onboarding (RU) · Family Engage (RPD) · MTSS at RU (RU) · UDL Basics (RPD).
  - **District Resources sidebar (4 items, each with icon):** Strategic Plan 2026 · MTSS Framework · Supt. PD Webinar · Onboarding Hub.
  - **Progress bar:** "Onboarding Cohort · Fall '26" — **68% complete** (green→orange fill).
  - **Floating accent cards (desktop only):** ① Globe icon — "Subdomain / pd.riverside-usd.org"; ② Layers icon — "Library / RocketPD + 11 internal courses".

> The district name/colors (Riverside Unified, green/orange) are intentionally
> **non-RocketPD** to read as "your district's brand." Keep them distinct from RocketPD purple.

---

## 03 — Intro / The Gap

- **Order:** 3 · **Layout:** 12-col grid, copy left (6) / visual right (6). `py-20 lg:py-24`, white bg.
- **Eyebrow:** **"The Gap"** (magenta, uppercase).
- **H2:** **"When Professional Learning Needs More Than Access."**
- **Body (3 paragraphs, text-lg `#45417c`; 3rd is bold navy):**
  1. "Access to high-quality professional learning is important — but many districts need a better way to organize and deliver it across teams."
  2. "LaunchPad+ provides a centralized, branded platform where districts can bring together professional learning content, internal resources, and educator growth in one place."
  3. **(bold)** "Built on RocketPD's LaunchPad platform, LaunchPad+ helps districts move beyond one-time PD and create a more consistent, accessible learning experience for staff."
- **Right visual — "fragmented → unified" diagram (CSS/HTML):**
  - Label (red, uppercase): **"Today: Scattered Across Tools"**.
  - 6 slightly-rotated tool chips, each `TAG · label`: `PDF` PD Day slides · `Drive` Onboarding folder · `YouTube` Webinar recording · `LMS` Compliance modules · `Email` Conference notes · `Doc` Coaching protocols.
  - Gold circular down-arrow connector (`ArrowRight` rotated 90°).
  - **Unified branded platform card:** district-green header "Riverside Unified Professional Learning" + "Powered by RocketPD"; 6 module tiles w/ icons: Courses · Resources · Certificates · Users & Roles · Analytics · Branding; footer strip **"One Branded Platform · One Place · One Library"**.

---

## 04 — Platform Positioning ("What It Is")

- **Order:** 4 · **Layout:** centered intro + 5-card grid (`sm:grid-cols-2 lg:grid-cols-5`) + closing line. Background band `#f8fafc` with top/bottom borders. `py-24`.
- **Eyebrow:** **"What It Is"**.
- **H2:** **"A Central Platform for District Professional Learning."**
- **Intro body:** "LaunchPad+ gives districts a structured way to manage professional learning across their organization."
- **5 cards** (navy icon tile w/ gold glyph, Poppins bold title, body):
  1. **RocketPD course library** — "Provide access to RocketPD's expert-led professional learning library."
  2. **District content hosting** — "Host your own asynchronous professional learning content alongside it."
  3. **Resource organization** — "Organize internal guides, webinars, and training materials in one place."
  4. **User management** — "Manage users and permissions across schools, departments, and roles."
  5. **Participation tracking** — "Track enrollment, participation, and course completion across teams."
- **Closing line (centered):** "All within a platform **customized to reflect your district's brand and priorities**." (last phrase bold navy).

---

## 05 — System Overview ("How It's Organized")

- **Order:** 5 · **Layout:** centered intro + 3-column pillar diagram (`md:grid-cols-3`) + foundation bar + closing line. White bg, `py-24`.
- **Eyebrow:** **"How It's Organized"**.
- **H2:** **"One Platform for Learning and Resources."**
- **Intro body:** "LaunchPad+ brings together the key components districts need to support professional learning."
- **3 pillar columns** (gradient header strip with "Pillar" eyebrow + name + gold icon; body = 3 bullet rows each with icon):
  - **Learning** (`#5552b1`): RocketPD expert-led courses · District-created courses · Legacy district content.
  - **Resources** (`#a154a1`): Strategic documents & frameworks · Guides and webinars · Training materials.
  - **Management** (`#231F58`): User roles & permissions · Participation tracking · Completion tracking.
- **Foundation bar (navy gradient, centered, Zap icon):** "All in one branded LaunchPad+ platform — one place for staff to learn".
- **Closing line:** "This helps reduce fragmentation and keeps professional learning organized in one place."

---

## 06 — What's Included (feature cards)

- **Order:** 6 · **Layout:** centered intro + 3 big cards (`md:grid-cols-3`). **Dark** navy gradient bg (`from-#231F58 via-#343465 to-#231F58`) with blurred orbs. `py-24`. White text.
- **Eyebrow (gold):** **"What's Included"**.
- **H2 (white):** **"What LaunchPad+ Includes."**
- **3 cards** (translucent white card, gold icon tile, title, body, gold check + highlight footer):
  1. **Custom-Branded Platform** — "A district-specific environment with your logo, colors, and subdomain — creating a consistent experience for staff." · highlight: **"Your brand, your subdomain"**.
  2. **RocketPD Content Library Included** — "Full access to RocketPD's expert-led video courses, workbooks, and certificates — already in your platform on day one." · highlight: **"100s of courses, ready to go"**.
  3. **District Content Hosting** — "Upload and organize your own training materials, courses, and resources alongside RocketPD content." · highlight: **"Combine internal + external content"**.

---

## 07 — Admin Visibility (analytics dashboard)

- **Order:** 7 · **Layout:** 12-col grid, copy left (5) / dashboard right (7). White bg, `py-24`.
- **Eyebrow:** **"Built for Leaders"**.
- **H2:** **"Visibility Into Participation and Progress."**
- **Body:** "LaunchPad+ provides district leaders with a clearer view of how professional learning is being used across the district."
- **Checklist (3, navy icon tiles):** "Track course enrollment and completion" · "Monitor participation across schools and teams" · "Understand which content is being used".
- **Closing body:** "This helps districts better manage and support professional learning over time."
- **Right visual — analytics dashboard (CSS/HTML + inline SVG):**
  - Browser chrome URL: **"pd.riverside-usd.org/admin/analytics"**.
  - Title: eyebrow "Admin · Analytics" + **"Professional Learning Activity"**; "Last 30 days" date chip (Calendar icon).
  - **KPI row (4):** Active learners **1,247** +8.2% · Enrollments **2,894** +14% · Completions **1,142** +22% · Avg. progress **64%** +5pt.
  - **Bar chart** "Course Activity by Week" — legend Enrollments (purple) / Completions (gold); 6 week bars W1–W6.
  - **Completion ring** (inline SVG donut) — **78%** "avg. completion rate".
  - **"Top Courses by Participation" table (4 rows):** School Culture & Engagement (RPD, 312 enrolled, 81%) · RU New Teacher Onboarding 2026 (RU, 248, 92%) · Reading Instruction Foundations (RPD, 196, 64%) · MTSS Implementation at RU (RU, 174, 58%).

---

## 08 — Value / Outcomes ("Why It Matters")

- **Order:** 8 · **Layout:** centered intro + 5-card grid (`sm:grid-cols-2 lg:grid-cols-5`, title-only cards) + italic closing line. Band `#f8fafc` with borders, `py-24`.
- **Eyebrow:** **"Why It Matters"**.
- **H2:** **"Designed to Support District Implementation."**
- **Intro body:** "LaunchPad+ helps districts build a more consistent approach to educator development — not just deliver another tool."
- **5 cards (gradient icon tile + bold title only, no body):**
  1. Bring PL into one accessible platform
  2. Reduce fragmentation across tools and resources
  3. Support consistent learning experiences across teams
  4. Provide flexible access to training and materials
  5. Maintain and grow a reusable content library
- **Closing line (centered, italic):** "Rather than relying on one-time sessions, districts can build a more consistent approach to educator development."

---

## 09 — Creator's Package

- **Order:** 9 · **Layout:** 12-col grid, copy left (6) / example package card right (6). White bg, `py-24`.
- **Eyebrow:** **"Creator's Package"**.
- **H2:** **"Create and Scale Your Own Professional Learning Content."**
- **Body (2 paragraphs):**
  1. "Many districts have strong internal expertise but limited ways to scale it."
  2. "With LaunchPad+ and RocketPD's **Creator's Package**, districts can:" (phrase bold navy)
- **Checklist (3, gold check tiles):** "Produce high-quality asynchronous courses" · "Align content to district initiatives" · "Host and reuse that content over time".
- **Right visual — "Example Package" card (dark navy gradient):**
  - Gold ribbon (top-right): **"Example Package"**.
  - Header: Sparkles icon + eyebrow "Creator's Package" + title **"Six-course district build"**.
  - 3 feature rows (gold icon tiles): "Six custom courses produced with RocketPD" · "Hosted inside your LaunchPad+ platform" · "Ongoing access and support".
  - Eyebrow "Example district-built courses" + 6 mini course tiles (all `RU` avatar): RU Strategic Plan · MTSS at RU · RU Onboarding · RU Coaching · RU Family Engage · RU Tech Stack.
  - Footer strip (italic): "Final scope and pricing tailored per district during onboarding."
- **Closing line (centered):** "This allows districts to **build a reusable library of professional learning aligned to their goals**." (phrase bold navy).

---

## 10 — Connected to RocketPD (Learning Experiences)

- **Order:** 10 · **Layout:** centered intro + 3 cards (`md:grid-cols-3`) + italic closing line. **Dark** navy gradient bg with orbs, `py-24`. White text.
- **Eyebrow (gold):** **"Beyond the Platform"**.
- **H2 (white):** **"Connected to RocketPD Learning Experiences."**
- **Intro body (lavender `#c4c4e5`):** "LaunchPad+ extends access to RocketPD's broader learning ecosystem."
- **3 cards (gold icon tile, title, body):**
  1. **Live-virtual cohorts** — "Join expert-led cohorts and learning experiences offered throughout the year."
  2. **New course releases** — "Get continuous access to new RocketPD courses as they're added to the library."
  3. **Guides and PL resources** — "Access ongoing guides, frameworks, and professional learning resources."
- **Closing line (centered, italic, lavender):** "These experiences complement the platform and extend learning beyond asynchronous content."

---

## 11 — Comparison Table (LaunchPad vs LaunchPad+)

- **Order:** 11 · **Layout:** 12-col grid, copy left (5) / comparison table right (7). White bg, `py-24`.
- **Eyebrow:** **"How They Compare"**.
- **H2:** **"Start with LaunchPad. Expand with LaunchPad+."** (line break before "Expand"; the `+` is gold).
- **Body (2 paragraphs):**
  1. "Many districts begin with LaunchPad to provide immediate access to high-quality professional learning."
  2. "**LaunchPad+** builds on that foundation — adding a branded environment and the ability to organize district-specific content and resources." (lead phrase bold navy).
- **Button:** **"Explore LaunchPad"** + ArrowRight (outline, purple `#5552b1`).
- **Comparison table (3 columns: Capability / LaunchPad / LaunchPad+):**
  - Header: navy gradient; **LaunchPad+** column header is gold with sub-label "Branded edition".
  - Rows (✓ = check, ✗ = x):

    | Capability | LaunchPad | LaunchPad+ |
    | --- | :---: | :---: |
    | RocketPD Courses | ✓ | ✓ |
    | Workbooks & Certificates | ✓ | ✓ |
    | Searchable Learning | ✓ | ✓ |
    | District Branding | ✗ | ✓ |
    | District Content Hosting | ✗ | ✓ |
    | Central Resource Hub | ✗ | ✓ |

  - LaunchPad checks = purple `#5552b1`; LaunchPad+ checks = magenta `#a154a1`; x marks = lavender `#c4c4e5`. LaunchPad+ column has a faint gold tint background.
  - **Footer row (2 captions):** "For districts that want immediate access to RocketPD's library" / "For districts ready to centralize their entire PL environment".

---

## 12 — Final CTA

- **Order:** 12 · **Layout:** centered single column (`max-w-3xl`). **Dark** navy gradient bg with large blurred orbs + faint gold grid overlay. `py-24`.
- **Eyebrow (gold):** **"Get Started"**.
- **H2 (white):** **"Build a More Organized Approach to Professional Learning."**
- **Body (lavender, text-xl):** "LaunchPad+ helps districts bring professional learning into one place — making it easier to access, manage, and sustain over time. Schedule a demo to see how LaunchPad+ can support your team."
- **Button (centered):** **"Schedule a LaunchPad+ Demo"** + ArrowRight (gold solid, h-14, large).

---

## 13 — Footer

- **Order:** 13 · **Layout:** brand column (logo + blurb + 3 social chips) + 3 link columns; bottom legal row. Bg `#1a1744`, text `#b6cfdc`, `py-16`.
- **Brand blurb:** "The world's most engaged professional learning community for K-12 educators, school leaders, and district leaders."
- **Social chips (text placeholders):** `in` · `X` · `fb` (hover → gold).
- **Column "Product":** LaunchPad · LaunchPad+ · Free Community · Pricing.
- **Column "Learn":** Topics · Instructors · Events · Resources.
- **Column "Company":** About Us · Careers · Blog · Contact.
- **Legal row:** "© {currentYear} RocketPD. All rights reserved." + Privacy Policy · Terms of Service.

---

## Vertical rhythm summary

| Block | Padding | Background |
| --- | --- | --- |
| Hero | `pt-16 pb-24 lg:pt-24 lg:pb-32` | dark gradient + grid |
| Intro/Gap | `py-20 lg:py-24` | white |
| Platform positioning | `py-24` | `#f8fafc` band (borders) |
| System overview | `py-24` | white |
| What's Included | `py-24` | dark gradient |
| Admin visibility | `py-24` | white |
| Value/Outcomes | `py-24` | `#f8fafc` band (borders) |
| Creator's Package | `py-24` | white |
| Connected to RocketPD | `py-24` | dark gradient |
| Comparison | `py-24` | white |
| Final CTA | `py-24` | dark gradient + grid |
| Footer | `py-16` | `#1a1744` |

Alternation reads: **dark hero → white → grey band → white → dark → white → grey band → white → dark → white → dark CTA → deep-navy footer.** Preserve this rhythm.
