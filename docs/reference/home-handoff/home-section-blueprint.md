# RocketPD Home — Section Blueprint

Source of truth: `artifacts/mockup-sandbox/src/components/mockups/rocketpd-home/Home.tsx`
Documented in **exact visual top-to-bottom order**. (Note: the in-code section
comment numbers are out of order — trust this document's order, not the comments.)

Page wrapper: `min-h-screen bg-white`, base font **Inter**, base text color **`#231F58`**.
Container pattern used throughout: `container mx-auto px-4 sm:px-6 lg:px-8` (centered,
max-width container with responsive horizontal padding).

---

## 1. Header / Navigation

- **Visual purpose:** Persistent brand bar + primary nav + conversion CTA.
- **Layout:** Sticky bar (`sticky top-0 z-50`), full width. Row is 3 zones:
  logo (left) · nav links (center, desktop only) · Login + CTA (right). Row height `h-20` (80px).
- **Background:** `bg-white/95` with `backdrop-blur-sm`; bottom border `border-[#c4c4e5]/30`; subtle `shadow-sm`.
- **Typography:** Nav links `text-[15px] font-medium`, color `#343465`, hover `#a154a1`.
- **Logo:** image `rocketpd-logo.png`, height `36px` mobile / `44px` desktop, `object-contain`.
- **Nav links (desktop, hidden < md):** `Topics` · `Instructors` · `Solutions` · `Resources` · `About`.
- **Right cluster:** `Login` text link (hidden < sm) + gold button **"Join the Community"**.
  - Button: `bg-[#fdb933]`, text `#231F58`, `font-semibold`, hover `#fdb933/90`.
- **Desktop:** full nav visible.
- **Tablet/Mobile (< md):** center nav links hidden; `Login` hidden < sm. Logo + gold CTA remain.
  **No hamburger menu exists in the mockup** — see caveat in diff guide.
- **Easy to miss:** translucent/blurred background (not solid white); active/hover color is magenta `#a154a1`, not navy.

---

## 2. Hero

- **Visual purpose:** Primary value statement + dual CTA + proof.
- **Layout:** 2-column grid on `lg` (`lg:grid-cols-2`), text left / image right; stacks to single column below `lg`. Padding `pt-20 pb-24` (mobile) → `lg:pt-32 lg:pb-36`.
- **Background:** diagonal gradient `bg-gradient-to-br from-white via-[#b6cfdc]/10 to-[#c4c4e5]/20` (white → faint blue-grey → faint lavender).
- **Typography:**
  - Badge: "For K-12 Educators & Leaders" — `bg-[#5552b1]/10 text-[#5552b1]`, pill, `font-semibold`.
  - H1 (**Poppins**, `font-extrabold`): `text-5xl sm:text-6xl lg:text-7xl`, color `#231F58`, line-height `1.1`. Copy: **"The Community for Educator Growth."** (intentional `<br/>` after "Community").
  - Body: `text-lg sm:text-xl`, color `#45417c`. Copy: *"RocketPD helps schools support educator growth, strengthen retention, and turn professional learning into real outcomes for teachers and students."*
- **Buttons:** stack on mobile, row on `sm`.
  - Primary: **"Join the Community"** — gold (`#fdb933` / text `#231F58`), `h-14 px-8`.
  - Secondary: **"Explore LaunchPad"** — outline, border + text `#5552b1`, transparent bg.
- **Media:** `rocketpd-hero.png` (classroom educator). Rounded `rounded-2xl`, `shadow-xl`. Aspect `4/3` mobile → `16/9` on `lg`. Behind it: an offset `#5552b1` block at 10% opacity (depth shadow).
- **Floating stat card** (overlaps image bottom-left, `hidden md:block`): white card, gold-tinted user icon, **"40,000+ / Educators joined"**.
- **Desktop:** side-by-side, floating stat visible.
- **Tablet:** still 2-col until `lg`; below `lg` it stacks.
- **Mobile:** stacked, image below text, floating stat card **hidden** (`md:block`).
- **Easy to miss:** the offset purple shadow-block behind the image; the `<br/>` line break; floating stat only shows ≥ md.

---

## 3. Stats Bar (trust / network band)

- **Visual purpose:** Immediate quantified credibility.
- **Layout:** Single centered horizontal row, wraps on small screens (`flex flex-wrap justify-center`). Vertical padding `py-8`.
- **Background:** solid navy **`#343465`**, top+bottom border `border-[#c4c4e5]/30`.
- **Typography:** white, `font-medium`, centered. Icons gold `#fdb933`.
- **Content (3 stats, gold icon + label):**
  - 👥 **40,000+ educators**  •  🎯 **850+ districts**  •  ✨ **Nationally recognized experts**
  - Bullet separators `•` colored `#5552b1`, `hidden sm:block`.
- **Desktop/Tablet:** single row.
- **Mobile:** items wrap; bullet separators hidden, stacking the three stats. *(No separate mobile crop — only wrapping changes.)*
- **Easy to miss:** the band background is `#343465` (lighter navy), distinct from the `#231F58` used in the LaunchPad band and footer.

---

## 4. Intro Statement (value proposition)

- **Visual purpose:** Brand thesis / positioning line.
- **Layout:** centered single column, `max-w-3xl mx-auto text-center`. Section padding `py-24`.
- **Background:** white.
- **Typography:**
  - H2 (**Poppins**, `font-bold`): `text-4xl lg:text-5xl`, color `#231F58`. Copy: **"Learning, Meet Doing."**
  - Body: `text-lg lg:text-xl`, color `#45417c`. Copy: *"Professional learning shouldn't happen in a vacuum. It should happen inside the work. RocketPD connects you with peers, experts, and resources to solve real challenges in your school today."*
- **No buttons / media / cards.**
- **All breakpoints:** centered single column; only type scale changes.
- **Easy to miss:** this is a standalone statement section — do not merge it into the cards section that follows.

---

## 5. Community Value Cards ("World's Most Engaged…")

- **Visual purpose:** Three pillars of the offering.
- **Layout:** centered heading, then 3-column card grid (`md:grid-cols-3 gap-10`). Section `py-24`.
- **Background:** vertical gradient `bg-gradient-to-b from-[#b6cfdc]/10 to-white`.
- **Typography:** H2 (**Poppins** `font-bold`, `text-4xl`, `#231F58`): **"The World's Most Engaged Professional Learning Community"**. Card H3 `text-xl font-bold #231F58`; body `#45417c`.
- **Cards (3, white, `rounded-2xl`, `shadow-sm`, border `#c4c4e5/30`, padding `p-8`):** each has a `w-14 h-14` rounded-xl tinted icon tile, title, paragraph.
  1. **Explore Resources** — icon `BookOpen`, tile `#5552b1/10` / icon `#5552b1`. *"Discover topical resources, ongoing learning, and fresh ideas tailored to the challenges you face in your classroom or district."*
  2. **Expert-led Upskilling** — icon `GraduationCap`, tile `#a154a1/10` / icon `#a154a1`. *"Deliver practical, engaging upskilling and career growth opportunities led by top educational experts and practitioners."*
  3. **Measurable Outcomes** — icon `Target`, tile `#fdb933/10` / icon `#fdb933`. *"Turn learning into action with structures designed to produce measurable outcomes for both staff development and student success."*
- **Desktop:** 3 across. **Tablet (md):** 3 across. **Mobile:** 1 column stacked.
- **Easy to miss:** each card uses a **different accent color** (purple / magenta / gold) for its icon tile — keep them distinct.

---

## 6. LaunchPad Feature Band

- **Visual purpose:** Spotlight the LaunchPad product upsell.
- **Layout:** 2-column on `lg` (`lg:grid-cols-2 gap-16`), text left / image right. Section `py-24`, `overflow-hidden relative`.
- **Background:** solid **`#231F58`** (deep navy), text white. Decorative blurred orb: `#5552b1`, 800×800, `blur-[120px]`, opacity 20%, anchored top-right and pushed off-canvas.
- **Typography:**
  - Badge: "Introducing LaunchPad" — solid `bg-[#a154a1]` white text.
  - H2 (**Poppins** `font-bold`, `text-4xl lg:text-5xl`, white): **"Professional Growth That Fits Your School's Reality."**
  - Body `text-lg` color `#c4c4e5`: *"LaunchPad is our comprehensive platform for district-wide professional learning. It combines our vibrant community with powerful tools to track progress, align with district goals, and foster meaningful collaboration among your staff."*
- **Link (not a button):** **"Learn about LaunchPad →"** — gold `#fdb933`, `font-bold`, arrow icon, hover widens gap.
- **Media:** `rocketpd-community-1.png` inside a glassy frame (`bg-white/10 p-4 rounded-3xl backdrop-blur-sm border border-white/10`), image `rounded-2xl aspect-4/3`.
  - **Floating mini-card** bottom-left (`hidden sm:block`): white, calendar icon in `#5552b1` circle, **"Upcoming Cohort / School Leadership"**.
- **Desktop/Tablet (≥lg):** side by side. **Below lg:** stacks, text then image.
- **Mobile:** stacked; floating cohort card hidden < sm.
- **Easy to miss:** the glass frame around the image (not just a plain image); the CTA here is a **text link with arrow**, not a filled button; orb is purely decorative (must not add scroll/overflow).

---

## 7. Membership / Pricing Stage Cards

- **Visual purpose:** Present the 4 membership tiers; steer toward the district tier.
- **Layout:** centered heading + subhead, then responsive card grid: `md:grid-cols-2 lg:grid-cols-4 gap-6`. Section `py-24`.
- **Background:** `#f8fafc` (near-white grey).
- **Heading:** H2 (**Poppins** `font-bold text-4xl #231F58`): **"A Membership for Every Stage"**. Subhead `#45417c`: *"Join as an individual or bring your whole district."*
- **Card anatomy:** vertical flex card (`flex flex-col`) with `CardHeader` (title + price label + descriptor), `CardContent` (checklist, `flex-1` so footers align), `CardFooter` (single button). Check icons sized 16.
- **Tier 1 — Community:** price **"Free"**, descriptor "Join the conversation". List (magenta `#a154a1` checks): Access to free events · Community forums · Weekly newsletter. CTA: **"Join Free"** (outline `#5552b1`).
- **Tier 2 — Pro Learning:** price **"A la carte"**, "Per course or cohort". Checks (magenta): Everything in Community · Expert-led workshops · Certificate of completion. CTA: **"Browse Courses"** (outline).
- **Tier 3 — LaunchPad District (FEATURED):** visually lifted (`md:-translate-y-4`), border `#5552b1`, `shadow-lg`. **"Most Popular"** pill badge centered on top edge (`#5552b1` bg, white, uppercase). Header has tinted bg `#5552b1/5` with bottom divider. Price **"Annual"**, "For schools & districts". Checks use **gold `#fdb933`**: Unlimited staff access · Private district cohorts · Engagement analytics · Dedicated success manager (4 items). CTA: **"Get a Quote"** (gold filled).
- **Tier 4 — LaunchPad+:** price **"Premium"**, "Custom implementation". Checks (magenta): Everything in District · Custom course creation · Executive coaching. CTA: **"Contact Us"** (outline).
- **Desktop (lg):** 4 across, tier 3 raised. **Tablet (md):** 2×2 grid. **Mobile:** single column; featured card's negative translate still applies (minor).
- **Easy to miss:** featured card has the **"Most Popular" badge straddling the top border**, raised position, tinted header, gold checks, and 4 list items (others have 3); the lift (`-translate-y-4`) only applies at `md`+.

---

## 8. More Than Professional Development

- **Visual purpose:** Narrative differentiation — community over generic PD.
- **Layout:** 2-column `md:grid-cols-2 gap-16`, image + text. **Order swaps:** image is `order-2 md:order-1` (image left on desktop, but **below** text on mobile); text is `order-1 md:order-2`. Section `py-24`.
- **Background:** white.
- **Media:** `rocketpd-community-2.png`, `rounded-2xl shadow-lg`, aspect `square` on mobile → `4/3` on `md`.
- **Typography:** H2 (**Poppins** `font-bold text-4xl #231F58`): **"More Than Professional Development."** Two body paragraphs `text-lg #45417c`:
  1. *"Most PD is a generic event—something you attend once and forget. RocketPD is a connected ecosystem. We believe that the best professional learning feels like a vibrant teacher's lounge crossed with a serious professional society."*
  2. *"Here, you're not just taking courses. You're joining a nationwide network of passionate educators sharing what works, wrestling with what doesn't, and pushing the boundaries of what's possible in our schools."*
- **No buttons.**
- **Desktop:** image left, text right. **Mobile:** **text first, image second** (because of the order utilities) — verify this ordering in WP.
- **Easy to miss:** the **order swap** between mobile and desktop; the em-dash in "generic event—something"; image aspect changes square→4:3.

---

## 9. Resource Library

- **Visual purpose:** Showcase free content + drive free signup. The most complex section.
- **Layout:** centered header → filter chip row → 3-column card grid (`md:grid-cols-2 lg:grid-cols-3 gap-6`) → full-width gradient CTA bar. Section `py-24`, `relative overflow-hidden` with two large blurred decorative orbs (gold top-right, magenta bottom-left, each `480px blur-3xl`).
- **Background:** vertical gradient `from-white via-[#c4c4e5]/10 to-white`.
- **Header:** Badge **"Start Exploring — Free for Educators"** (`#fdb933/20` bg, text `#92580d`). H2 (**Poppins** `font-bold text-4xl lg:text-5xl`): **"Real Resources. Real Classrooms. "** + **"Zero Cost."** (the phrase "Zero Cost." colored magenta `#a154a1`). Body `#45417c`: *"Dive into our growing library of guides, playbooks, webinars, podcasts, videos, and templates — created by educators, for educators. No paywall. No fluff. Just the practical resources you need to lead, teach, and grow."*
- **Filter chips (7, pill buttons):** `All` (active — navy `#231F58` bg, white) · `Guides` · `Webinars` · `Playbooks` · `Podcasts` · `Videos` · `Templates` (inactive — white, border `#c4c4e5`, text `#45417c`, hover magenta). Visual only in mockup (no JS filtering wired).
- **Resource cards (6, data-driven array):** each card = gradient header strip (`h-40`) with centered lucide icon (size 56) + radial highlight + two badges (top-left = type pill white/navy, top-right = gold **"FREE"** pill) + body (title in **Poppins** `font-bold text-xl`, description, footer row with clock+meta on left and **"Open →"** magenta link on right). Hover: lift `-translate-y-1`, shadow, border magenta, title turns magenta.

  | # | Type badge | Icon | Header gradient | Title | Meta |
  |---|---|---|---|---|---|
  | 1 | Guide | BookOpen | `#a154a1`→`#5552b1` | The First-Year Principal's Playbook | 24-page PDF · 15 min read |
  | 2 | Webinar | PlayCircle | `#5552b1`→`#343465` | What's Actually Working in MTSS This Year | On-demand · 45 min |
  | 3 | Playbook | FileText | `#fdb933`→`#f99d33` | Designing Coaching Cycles That Stick | Playbook · 18 pages |
  | 4 | Podcast | Headphones | `#b467b4`→`#a154a1` | Inside the Lounge | Weekly · 32 min episodes |
  | 5 | Video Series | Video | `#7670b3`→`#5552b1` | 5-Minute Classroom Reset | Video Series · 8 episodes |
  | 6 | Template | FileText | `#343465`→`#231F58` | PLC Agenda + Reflection Template | Editable Doc · Free |

  (Full descriptions live in the source array — see `home-implementation-notes.md`.)
- **Bottom CTA bar:** full-width rounded `rounded-2xl` card, gradient `from-[#231F58] via-[#343465] to-[#5552b1]` + gold radial highlight. Left: H3 (**Poppins** white) **"Join free to unlock the full library."** + subtext `#c4c4e5` *"120+ guides, webinars, podcasts, and templates — plus weekly drops curated for educators and school leaders."* Right: two buttons — **"Join the Community Free →"** (gold filled) + **"Browse All Resources"** (outline white). Stacks vertically below `lg`.
- **Desktop:** 3-col cards, CTA bar horizontal. **Tablet (md):** 2-col cards. **Mobile:** 1-col cards, chips wrap, CTA bar fully stacked.
- **Easy to miss:** the two-tone H2 (magenta "Zero Cost."); each card's header gradient is unique; the **"FREE" pill is gold**, the **type pill is white**; decorative orbs must not cause horizontal scroll; the CTA bar is part of this section, not separate.

---

## 10. Trust / Partnerships (social proof)

- **Visual purpose:** Institutional credibility — featured partner, endorsers, district wall.
- **Layout:** constrained `max-w-6xl`. Three stacked blocks. Section `py-20`, bg `#f8fafc`, top+bottom border `#c4c4e5/30`.
- **10a. Featured State Partnership card:** white `rounded-2xl` card with top accent strip (gradient `#a154a1 → #5552b1 → #fdb933`). 12-col grid: gold seal circle (Award icon) · name block (eyebrow **"FEATURED STATE PARTNERSHIP"** magenta uppercase tracked; H3 **Poppins** **"Colorado Association of School Boards"**; descriptor *"Statewide partner for board-level professional learning — bringing RocketPD into districts across Colorado."*) · stat (**178** in `#5552b1`, label "Colorado school boards served", left divider on md).
- **10b. Endorsers wordmark band:** centered eyebrow **"ENDORSED BY LEADERS IN EDUCATION"** (`#7670b3`). Row of 7 **text wordmarks** (mixed serif/sans/Poppins to mimic distinct logos), `opacity-60 grayscale`, hover → color: **Digital Promise · Center for Educational Leadership · Modern Classrooms Project · Cult of Pedagogy · Marshall Memo · NESDEC · Building Thinking Classrooms**.
- **10c. District wall:** header row — eyebrow **"DISTRICT COMMUNITY"** (magenta) + H3 **"Districts learning with RocketPD"**; right side stat *"**850+** districts in 47 states · and counting"* (Target icon). Then a bordered grid `grid-cols-2 sm:grid-cols-3 lg:grid-cols-4` of **12 district name tiles** (each name styled in a varied font + 2-letter state code), separated by `gap-px` on a `#c4c4e5/40` background (hairline-divider look). Districts: Denver Public Schools (CO) · Cherry Creek Schools (CO) · Boulder Valley SD (CO) · Jeffco Public Schools (CO) · Aurora Public Schools (CO) · Adams 12 Five Star (CO) · Stoughton Public Schools (MA) · Austin ISD (TX) · Fairfax County Public Schools (VA) · Wake County Public Schools (NC) · Mesa Public Schools (AZ) · Tulsa Public Schools (OK). Footnote (centered, italic): *"A representative sample. Want your district featured?"* + link **"Bring RocketPD to your team →"** (`#5552b1`).
- **Desktop:** partner card 3-zone, wordmarks single row, district wall 4-col. **Tablet:** district wall 3-col. **Mobile:** partner card stacks (seal, name, stat), wordmarks wrap, district wall 2-col, header row stacks.
- **Easy to miss:** endorser and district "logos" are **styled text, not images** — preserve the mixed-typeface look; the top accent strip on the partner card; the hairline grid effect (gap-px over a tinted bg); 47-states stat.

---

## 11. Testimonials

- **Visual purpose:** Human social proof from named members.
- **Layout:** centered H2, then 3-column card grid (`md:grid-cols-2 lg:grid-cols-3 gap-8`). Section `py-24`, bg white.
- **Heading:** H2 (**Poppins** `font-bold text-4xl` centered `#231F58`): **"Hear from the Community"**.
- **Cards (3, bg `#f8fafc`, no border, `shadow-sm`):** each has a colored `Quote` icon (50% opacity), italic quote `#343465`, then an avatar + name/role/org row.
  1. Quote icon magenta. *"RocketPD has completely transformed how we approach professional learning in our district. It's not just checking boxes anymore; it's active, ongoing, and deeply relevant to our staff."* — avatar **initials "JB"** in `#5552b1` circle — **Joe Baeta**, Superintendent, Stoughton Public Schools, MA.
  2. Quote icon gold. *"The quality of the instructors and the depth of the conversations in the cohorts are unmatched. I finally found a space where I feel challenged and supported as a leader."* — avatar **image** `rocketpd-principal.png` — **Sarah Jenkins**, Middle School Principal, Denver Public Schools, CO.
  3. Quote icon purple. *"LaunchPad gave us the data we needed to understand what our teachers actually wanted to learn. The engagement rates are through the roof compared to our old system."* — avatar **initials "MR"** in `#a154a1` circle — **Marcus Rivera**, Director of Curriculum, Austin ISD, TX. **This 3rd card is `md:hidden lg:block`** (hidden at tablet, shown at desktop & mobile).
- **Desktop (lg):** 3 cards. **Tablet (md):** **2 cards** (3rd hidden). **Mobile:** 1 column, all 3 shown.
- **Easy to miss:** card 3 visibility rule (`md:hidden lg:block`); two avatars are colored **initials circles**, one is a **photo**; quote icons are three different colors.

---

## 12. Final CTA

- **Visual purpose:** Closing conversion push.
- **Layout:** centered single column `text-center`. Section `py-24`, `relative overflow-hidden`.
- **Background:** diagonal gradient `from-[#343465] to-[#231F58]` with two large blurred orbs (`#5552b1` top-right opacity 30%, `#a154a1` bottom-left opacity 20%).
- **Typography:** H2 (**Poppins** `font-bold text-4xl lg:text-5xl` white, `max-w-3xl`): **"Join the RocketPD Professional Learning Community Today — It's Free."** Subtext `text-xl #c4c4e5`: *"Start exploring resources, connecting with peers, and taking control of your professional growth."*
- **Buttons (centered, stack on mobile):** **"Join the Community"** (gold filled, `h-14 px-10 text-lg`) + **"Book a Conversation"** (outline white, transparent).
- **All breakpoints:** centered; buttons stack < sm.
- **Easy to miss:** the two decorative orbs; em-dash in headline; outline button has `border-white/30`.

---

## 13. Footer

- **Visual purpose:** Global navigation, brand, legal.
- **Layout:** multi-column link grid (`grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8`) then a divider row with copyright + legal links. Section `py-16`.
- **Background:** **`#1a1744`** (darkest navy), text `#b6cfdc`, top border `border-white/10`.
- **Brand column (spans 2):** logo `rocketpd-logo.png` (32px, on a white rounded chip), blurb *"The world's most engaged professional learning community for K-12 educators, school leaders, and district leaders."*, then 3 round social placeholders (`in`, `X`, `fb`) that turn gold on hover.
- **Link columns:**
  - **Product:** LaunchPad · For Districts · For Schools · Pricing
  - **Community:** Topics · Instructors · Events · Member Directory
  - **Company:** About Us · Careers · Blog · Contact
  - Column headers white `font-bold`; links `text-sm` hover→white.
- **Bottom bar:** divider `border-white/10`; left **"© {current year} RocketPD. All rights reserved."** (year is dynamic); right **Privacy Policy** · **Terms of Service**.
- **Desktop (lg):** 5-col (brand=2 + 3 link cols). **Tablet (md):** 4-col. **Mobile:** 2-col, brand spans both; bottom bar stacks.
- **Easy to miss:** logo sits on a **white chip** (so the dark logo stays visible on navy); social icons are text placeholders, not real icons; footer navy `#1a1744` is darker than every other navy on the page; year is dynamic.
