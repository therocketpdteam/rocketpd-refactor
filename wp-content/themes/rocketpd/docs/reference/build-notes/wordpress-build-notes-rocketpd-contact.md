# WordPress Build Notes — RocketPD Contact Page

**Stack:** WordPress + Salient theme + WPBakery Page Builder + Advanced Custom Fields (ACF Pro)
**Reference mockup:** `rocketpd-contact.png` (this folder)
**Audience:** In-house WordPress developer with copy and brand assets already in hand.
**Prerequisites:**
- Part 0 of `wordpress-build-notes.md` is in place (theme options, fonts, color palette, base ACF setup, RocketPD header & footer).
- Two real CTA destinations exist:
  - **Book Time with Jesse** → `http://rocketpd.com/jesse-schedule/`
  - **Join the Community** → community signup URL (mockup uses `https://community.rocketpd.com/` as a placeholder; wire to `theme_options.community_signup_url` so the global site setting is the single source of truth — appears 3× on this page: header, §2 Door 1, §7 final CTA)
- Three monitored inboxes:
  - `info@rocketpd.com` — general inquiries
  - `support@rocketpd.com` — existing-member support
  - Walkthrough form submissions — routed to the appropriate internal owner via the form's "I'm reaching out about" dropdown (see §5).

---

## Page intent

This page is the opposite of the IDG contact page — by design.

- **IDG contact** = selective, mutual evaluation, two narrow paths.
- **RocketPD contact** = welcoming, multi-audience, "come on in."

Three primary jobs:

1. **Route fast.** Most visitors arrive with a clear identity (educator, leader, member). Get them to the right door in under 5 seconds.
2. **Surface direct contact prominently.** Phone, email, and book-with-Jesse are visible above the fold — no scroll required.
3. **Catch everything else.** A flexible "tell us more" form handles partnerships, walkthroughs, press, and anything that doesn't fit the three audience cards.

Tone is warm, plain-spoken, slightly playful ("Honestly? Just come hang out.") — never corporate. Match the RocketPD homepage voice.

---

## Brand tokens (reuse from Part 0)

| Token | Hex | Use |
|---|---|---|
| `rpd-navy` | `#231F58` | Primary text, headlines |
| `rpd-navy-deep` | `#1a1744` | Footer, dark blocks |
| `rpd-navy-mid` | `#343465` | Nav text |
| `rpd-body` | `#45417c` | Body copy |
| `rpd-purple` | `#5552b1` | Primary accent, button fill |
| `rpd-purple-deep` | `#a154a1` | Hover, alt accent |
| `rpd-gold` | `#fdb933` | Secondary CTA, highlights |
| `rpd-blue-soft` | `#b6cfdc` | Hero gradient, footer text |
| `rpd-lavender-soft` | `#c4c4e5` | Borders, soft fills |
| `rpd-bg-soft` | `#f8f8fc` | Card backgrounds, form inputs |

**Type:** Poppins (headlines, weight 700/800), Inter (body, weight 400/500).
**Buttons:** `rounded-xl` (12px) for standard, `rounded-2xl` (16px) for cards, `rounded-full` for chips.
**Card pattern:** Most cards use a soft "lifted" effect — solid color background block translated +8/+8px behind, set to ~10–15% opacity. Don't lose this — it's a brand signature on RocketPD.
**Section rhythm:** `padding: 96px 0` desktop / `64px 0` mobile.

---

# Page outline (top to bottom)

| # | Section | Background | Notes |
|---|---|---|---|
| 1 | Hero + Quick-Reach Card | Soft purple/blue gradient | Phone, email, Jesse-booking visible above fold |
| 2 | Choose Your Door | White | 3 audience cards (Educator / Leader / Member) — leader card is dark navy + featured |
| 3 | Talk to Jesse (featured) | Purple→gold soft gradient | Long-form pitch for the 20-min call + "Jesse" profile card |
| 4 | Reach Us (Other Ways) | White | Phone / Email / Mailing Address grid + member-support callout |
| 5 | Walkthrough / Partnership Form | Dark navy `#1a1744` | Catch-all form with "reaching out about" dropdown |
| 6 | FAQ | White | 6-question grid (educator, district, IDG relationship, etc.) |
| 7 | Community Nudge / Final CTA | Purple→pink gradient | "Just come hang out." Community + Jesse buttons |

Total: **7 sections + footer.** ~6,200px tall on desktop.

---

# Section-by-section build

## §1 — Hero + Quick-Reach Card

**What it is:** Warm welcoming hero, with a side card that surfaces phone, email, and Jesse-booking immediately. The fastest path off this page is right here.

**WPBakery structure:**
- Row, full-width, padding `80px 0 96px` mobile / `112px 0 128px` desktop
- Row background: linear gradient, `from-white via-#b6cfdc/15 to-#c4c4e5/30` (use Salient row backgrounds + custom CSS class `.rpd-hero-grad`)
- Add 2 absolute-positioned blur blobs as decoration (optional, can be done with CSS pseudo-elements):
  - top-right: 384×384px `#fdb933/10` blur(96px)
  - mid-left: 320×320px `#5552b1/10` blur(96px)
- Inner: 12-col grid

**Left column (7/12):**
- Pill badge: lavender fill `#5552b1/10`, purple text, `CONTACT ROCKETPD` (semibold, 12px, letter-spaced)
- H1 (Poppins ExtraBold, clamp `48–80px`, navy, line-height 1.05):<br>
  *We're <span style="color:#a154a1">here</span>.*<br>
  *What do you need?*
  - The word "here" is colored `#a154a1` — wrap in a span and color via inline style or class.
- Lead paragraph (Inter Regular, 18–20px, body color, max-width 36rem):
  *Whether you're an educator looking for a community, a school leader exploring options, or a current member who needs a hand — pick a door below and we'll meet you there.*
- Trust strip (flex, gap 24px, font-medium 14px):
  - ✓ Replies within 1 business day
  - ✓ Real humans, every time

**Right column (5/12) — Quick-Reach Card:**
- Container has the brand "lifted card" treatment: a `#5552b1` block translated +12/+12px behind, opacity 15%, rounded-2xl
- Foreground card: white, rounded-2xl, shadow-xl, border `#c4c4e5/40`, padding 32px
- Inside, small uppercase label `REACH US DIRECTLY` (purple, letter-spaced)
- 3 stacked rows, each a clickable link with hover bg `#5552b1/5`:

| Icon (chip color) | Label | Value | Action |
|---|---|---|---|
| Phone (gold chip) | CALL | `(855) 757-6253` | `tel:8557576253` |
| Mail (purple chip) | EMAIL | `info@rocketpd.com` | `mailto:info@rocketpd.com` |
| Calendar (purple-deep chip) | BOOK TIME | With Jesse, in 20 min | `http://rocketpd.com/jesse-schedule/` |

- Each row: 44×44 rounded-full chip + label/value column + right-arrow on the right
- Divider lines between rows: 1px `#c4c4e5/40`

**ACF fields (group: `rpd_contact_hero`):**

| Field | Type |
|---|---|
| `eyebrow` | Text |
| `headline_line_1` | Text (default: `We're here.`) |
| `headline_line_2` | Text (default: `What do you need?`) |
| `headline_accent_word` | Text (default: `here` — used to color-highlight) |
| `lead_paragraph` | Textarea |
| `trust_items` | Repeater (max 3) — sub-field: `text` (Text) |
| `quick_reach_label` | Text (default: `REACH US DIRECTLY`) |
| `quick_reach_items` | Repeater (max 4) — sub-fields: `icon` (Select: phone/mail/calendar), `chip_color` (Select: gold/purple/purple-deep), `label` (Text), `value` (Text), `url` (URL) |

---

## §2 — Choose Your Door

**What it is:** Three audience cards, side-by-side, each with a distinct visual treatment. The middle (leader) card is dark navy + has a "Most contact us here" badge — that's the card we want to draw the eye.

**WPBakery structure:**
- Row, white background, padding `96px 0` mobile / `112px 0` desktop
- Intro block (max-width 768px, mb-64px):
  - Pill badge (gold fill `#fdb933/20`, navy text): `CHOOSE YOUR DOOR`
  - H2 (Poppins ExtraBold, 36–48px, navy): *Tell us a bit about you, and we'll point you to the right spot.*
  - Subhead (18px, body): *Each path lands you with a real person on our team — no chatbot loops, no ticket purgatory.*
- 3-column grid, gap 24–32px, equal-height (`grid-flow-row`)

### Card A — "I'm an educator." (white, purple accent)
- `#5552b1` lifted block behind, 10% opacity, +8/+8px translate
- White card, border `#c4c4e5/50`, rounded-2xl, padding 32px
- Icon chip: `#5552b1/10` fill, 56×56, GraduationCap icon in `#5552b1`
- H3 (Poppins Bold, 24px): *I'm an educator.*
- Body: *Teacher, instructional coach, or anyone who works with kids? Start with LaunchPad — or just come hang out in the Community for free.*
- Bullets (3, with purple checks):
  - Free Community access (no card)
  - 40,000+ educators already inside
  - LaunchPad self-serve from there
- CTA (full-width, purple fill, white text): **Join the Community →**

### Card B — "I lead a school or district." (DARK navy + featured) ★
- `#fdb933` lifted block behind, 25% opacity, +8/+8px translate
- **Card background: `#231F58` (navy), white text** — visually distinct from cards A and C
- **Floating badge top-right** (`-top-3`, gold fill, navy text, uppercase): *MOST CONTACT US HERE*
- Icon chip: `#fdb933/20` fill, 56×56, Building2 icon in gold
- H3 (Poppins Bold, 24px, white): *I lead a school or district.*
- Body (lavender body color `#c4c4e5`): *Looking at this for your team, building, or system? Book 20 minutes with Jesse — he'll listen first, then walk you through what fits.*
- Bullets (3, with gold checks):
  - 20-minute walkthrough (not a pitch)
  - Custom pilot + pricing options
  - Trusted by 850+ districts
- Primary CTA (full-width, gold fill, navy text): **Book Time with Jesse →** → `http://rocketpd.com/jesse-schedule/`
- Below CTA, small underline link: *Or fill out a form to learn more →* → `#walkthrough-form`

### Card C — "I'm already a member." (white, purple-deep accent)
- `#a154a1` lifted block behind, 15% opacity
- White card, border `#c4c4e5/50`
- Icon chip: `#a154a1/15` fill, 56×56, LifeBuoy icon in `#a154a1`
- H3: *I'm already a member.*
- Body: *Need help with your account, billing, a course, or your district rollout? Our support team's got you.*
- Bullets:
  - Account, login & billing questions
  - Course or LaunchPad access issues
  - Replies within 1 business day
- CTA (full-width, outline, purple-deep border): **Email Support →** → `mailto:support@rocketpd.com`

**ACF fields (group: `rpd_contact_doors`):**

| Field | Type |
|---|---|
| `eyebrow` | Text |
| `headline` | Text |
| `subhead` | Textarea |
| `doors` | Repeater (3 fixed) |
| `doors.icon` | Select |
| `doors.style` | Select (`light` / `dark-featured` / `light-alt`) |
| `doors.featured_badge` | Text (only used when style=`dark-featured`) |
| `doors.title` | Text |
| `doors.body` | Textarea |
| `doors.bullets` | Repeater (max 4) — sub-field: `text` |
| `doors.cta_label` | Text |
| `doors.cta_url` | URL |
| `doors.cta_style` | Select (`primary` / `gold` / `outline`) |
| `doors.subcta_label` | Text (optional) |
| `doors.subcta_url` | URL (optional) |

**Notes:**
- The dark navy treatment on Card B is **intentional and important** — it's how we draw the eye to the highest-conversion path without being pushy. Don't let an editor "make all three cards consistent" — that flattens the page's job.
- The "Most contact us here" badge is a soft signal, not a real metric. If anyone asks, it represents IDG's qualitative experience that this is the largest inbound segment.

---

## §3 — Talk to Jesse (featured)

**What it is:** Long-form support for the Jesse booking — for visitors who weren't ready to click in §2. Includes a "Jesse" profile card on the right.

**WPBakery structure:**
- Row, padding `96px 0` / `112px 0`, background: linear gradient `from-#5552b1/5 via-white to-#fdb933/10`
- 12-col grid, max-width 1152px

**Left (7/12):**
- Pill badge (purple-deep): `TALK TO A REAL HUMAN`
- H2 (Poppins ExtraBold, 36–48px): *Twenty minutes with Jesse beats a 50-page deck.*
- Body (18px, max-width 36rem): *Jesse's been inside more PD rollouts than just about anyone. Tell him what you're trying to do — he'll tell you what's worked, what hasn't, and whether RocketPD even fits.*
- 3-col mini-grid (icon + 2-line stat):
  - Clock — *20 minutes* / *No pitch deck*
  - Users — *Just you & Jesse* / *No SDR handoff*
  - Sparkles — *You leave with* / *A real next step*
- CTA group (flex):
  - Primary (gold): **Book Time with Jesse** → `http://rocketpd.com/jesse-schedule/`
  - Secondary (outline purple): **Send a Form Instead** → `#walkthrough-form`

**Right (5/12) — Jesse Profile Card:**
- Lifted card pattern (`#5552b1` block behind, 15% opacity, +12/+12)
- White card, rounded-2xl, shadow-xl, padding 28px
- Avatar: 64×64 round, gradient `from-#5552b1 to-#a154a1`, white "J" inside (Poppins Bold 24px). **Replace with a real headshot when available** — the placeholder gradient avatar is intentional for the mockup.
- Name + title: *Jesse* / *Co-founder, RocketPD*
- Inset block (`#f8f8fc` bg, rounded-xl, padding 20px):
  - Small uppercase purple label: `BEST FOR`
  - 3 bullets with purple checks:
    - School & district leaders exploring options
    - Coordinators planning next year's PD
    - Anyone trying to build a real PD program
- Footer row (calendar icon + text + clock icon + "20 min")

**ACF fields (group: `rpd_contact_jesse`):**

| Field | Type |
|---|---|
| `eyebrow` | Text |
| `headline` | Text |
| `body` | Textarea |
| `mini_stats` | Repeater (max 3) — sub-fields: `icon` (Select), `label` (Text), `caption` (Text) |
| `primary_cta_label` | Text |
| `primary_cta_url` | URL |
| `secondary_cta_label` | Text |
| `secondary_cta_url` | URL |
| `jesse_name` | Text |
| `jesse_title` | Text |
| `jesse_photo` | Image (use when ready; falls back to gradient avatar) |
| `best_for_items` | Repeater (max 4) — sub-field: `text` |

**Notes:**
- When Jesse's photo is uploaded, render it inside the same 64×64 round container with `object-cover`. If empty, render the gradient avatar fallback.
- The Jesse-schedule URL (`http://rocketpd.com/jesse-schedule/`) appears in §1 (quick-reach card), §2 (Door 2 / Card B primary), §3 (primary CTA), §7 (secondary CTA), and the footer. **Wire all five references to `theme_options.jesse_schedule_url`** so an editor can update once. Open in a new tab (`target="_blank" rel="noopener"`).

---

## §4 — Reach Us (Other Ways)

**What it is:** Old-school contact methods — phone, email, mailing address — plus a member-support callout strip.

**WPBakery structure:**
- Row, white, padding `96px 0`
- Intro: pill badge (purple): `OTHER WAYS TO REACH US` · H2 *Old-school works too.* · subhead *Phone, email, or actual mail — we read every one.*
- 3-col grid, gap 24px

### Card 1 — Phone
- Background: `from-#fdb933/10 to-#fdb933/5` gradient, gold border at 30%
- Hover: shadow-lg, border 60%
- Square icon chip 48×48 gold fill, navy phone icon
- Eyebrow: `PHONE` (purple-deep, letter-spaced, 12px)
- Big number: `(855) 757-6253` (Poppins Bold, 24px, navy)
- Body: *Call or leave a voicemail — someone real will get back to you.*
- Wrap in `<a href="tel:8557576253">`

### Card 2 — Email
- Background: `from-#5552b1/10 to-#5552b1/5` gradient, purple border 30%
- Square chip 48×48 purple fill, white mail icon
- Eyebrow: `EMAIL` (purple)
- Big address: `info@rocketpd.com` (allow word-break)
- Body: *General inquiries, hello, or you just want to say hi.*
- Wrap in `<a href="mailto:info@rocketpd.com">`

### Card 3 — Mailing Address
- Background: `from-#a154a1/10 to-#a154a1/5` gradient, purple-deep border 30%
- Square chip 48×48 purple-deep fill, white map-pin icon
- Eyebrow: `MAILING ADDRESS` (purple-deep)
- Address (Poppins Bold, 18px):
  *1055 Howell Mill Rd.*
  *8th Floor*
  *Atlanta, GA 30318*
- Body: *Send us a postcard. Seriously, we love them.*
- **Not** a clickable card — render as a plain `<div>`.

### Member-support callout strip (below the 3 cards, mt-40px)
- `#f8f8fc` background, border `#c4c4e5/40`, rounded-2xl, padding 24–28px
- Flex row (stacks on mobile):
  - Left: 48×48 white-bg chip with purple-deep LifeBuoy icon + headline *Already a member?* + body *Account, billing, or course questions go straight to* `support@rocketpd.com` *— typically answered within 1 business day.*
  - Right: outline button (purple-deep): **Email Support** → `mailto:support@rocketpd.com`

**ACF fields (group: `rpd_contact_reach`):**

| Field | Type |
|---|---|
| `eyebrow` | Text |
| `headline` | Text |
| `subhead` | Textarea |
| `reach_cards` | Repeater (3 fixed) — sub-fields: `icon` (Select), `accent_color` (Select: gold/purple/purple-deep), `eyebrow` (Text), `value` (WYSIWYG — supports multi-line for address), `body` (Text), `url` (URL, optional — if empty, card is non-clickable) |
| `member_support_headline` | Text |
| `member_support_body` | WYSIWYG (allow `<a>`) |
| `member_support_email` | Email |

---

## §5 — Walkthrough / Partnership Form

**What it is:** The catch-all form. Routes to the right person based on the dropdown. Anchor target `#walkthrough-form` — referenced by §2 Card B's secondary link and §3's "Send a Form Instead" button.

**WPBakery structure:**
- Row, ID = `walkthrough-form`, padding `96px 0` / `112px 0`
- Background: `#1a1744` (deepest navy), white text, with two large blur blobs (gold top-right, purple bottom-left) for depth
- 12-col grid, max-width 1152px

**Left (5/12):**
- Pill badge (gold-on-dark): `TELL US MORE`
- H2 (Poppins ExtraBold, 36–48px, white): *Walkthrough, partnership, or something we haven't thought of yet?*
- Body (lavender `#c4c4e5`): *Drop the details and we'll route it to the right person on our team. Schools, districts, education associations, ed-tech partners, conference organizers — all welcome here.*
- 4-item bullet list with gold-circle check chips:
  - **School / district walkthroughs** — get a tailored look
  - **Association partnerships** — bring RocketPD to your members
  - **Ed-tech partner inquiries** — tap into our network
  - **Press / speaking** — we'd love to chat

**Right (7/12) — Form (white card, navy text, rounded-2xl, padding 32–40px, shadow-2xl):**

Fields, in order (build all six in Gravity Forms — these map 1:1 to the form fields, NOT to ACF):
1. Your name (text, required)
2. Work email (email, required) — soft-warn on free-mail blocklist (gmail/yahoo/outlook personal)
3. Organization (text, required)
4. Your role (text, required)
5. **I'm reaching out about** (select, required) — options:
   - School or district walkthrough
   - Association partnership
   - Ed-tech / vendor partnership
   - Press, speaking, or media
   - Something else
6. What's on your mind? (textarea, 4 rows, required, placeholder *"A sentence or two is plenty — we'll follow up to learn more."*)

Submit button (full-width, purple fill, white text, 56px tall): **Send It Over** + Send icon

Below button (12px, body color, centered): *Replies typically within 1 business day. We don't add you to a drip sequence — promise.*

**Form routing logic:**

| Dropdown value | Routes to | Notify |
|---|---|---|
| School or district walkthrough | Jesse + sales inbox | Slack `#walkthroughs` |
| Association partnership | Founders inbox | Slack `#partnerships` |
| Ed-tech / vendor partnership | **IDG team** (`info@indemand.group`) — see note below | Slack `#idg-handoff` |
| Press, speaking, or media | Marketing inbox | Slack `#press` |
| Something else | `info@rocketpd.com` | Slack `#general-inbound` |

**On submit:**
- Send notification(s) per the table above
- Send submitter an auto-acknowledgement (template: `rpd_inquiry_acknowledgement.html`):
  > Thanks for reaching out — someone from the RocketPD team will be in touch within one business day. We don't add inbound contacts to any marketing list.
- Redirect to `/contact/thank-you`

**IDG handoff note:** When an ed-tech partner inquiry comes in via this form, RocketPD passes the lead to the IDG team. The brand intent is to keep the RocketPD page warm + non-corporate while still capturing IDG-relevant prospects. The handoff happens silently in operations — the visitor stays on RocketPD.

**ACF fields (group: `rpd_contact_walkthrough`):**

| Field | Type |
|---|---|
| `eyebrow` | Text |
| `headline` | Text |
| `body` | Textarea |
| `bullets` | Repeater (max 5) — sub-fields: `bold_lead` (Text), `body` (Text) |
| `form_promise` | Textarea (the "no drip sequence" line) |
| `form_categories` | Repeater (read-only after first save) — sub-fields: `label` (Text), `route_inbox` (Email), `slack_channel` (Text) |

**Notes:**
- Build the form in **Gravity Forms** (consistent with IDG Assessment build).
- The form's "I'm reaching out about" dropdown is the primary routing mechanism — confirm the routing table is wired correctly with the team before launch.

---

## §6 — FAQ

**What it is:** 6-question grid of preempts. Reduces inbound volume by handling common questions inline.

**WPBakery structure:**
- Row, white, padding `96px 0`
- Intro centered, max-width 768px:
  - Pill badge (purple): `QUICK ANSWERS`
  - H2 (Poppins ExtraBold, 36–48px): *Before you reach out…*
  - Subhead: *We get these a lot. If your question's here, you might not even need to email.*
- 2-column grid, gap 20px, max-width 1024px

Each card:
- Background `#f8f8fc`, border `#c4c4e5/40`, rounded-2xl, padding 24px
- Hover: white background, shadow-md, border `#5552b1/30`
- Top row: MessageCircle icon (purple) + H3 question (Poppins Bold, 18px)
- Body answer (15px, body color, indented 28px to align with question text)

**Questions + answers:**

| # | Q | A |
|---|---|---|
| 1 | Can a single teacher use RocketPD? | Yes — the Community is free for any educator, no credit card required. LaunchPad is also available for individuals on a self-serve plan. |
| 2 | Do you offer a free trial for schools? | We don't run trials in the classic sense, but the Community is free to explore. For schools and districts, Jesse will walk you through pilot options on a 20-minute call. |
| 3 | How do district-wide rollouts work? | We've onboarded districts of every size — from 50 educators to 5,000+. Pricing scales by seat band, and we plan the rollout (kickoff, content, support cadence) with your team. |
| 4 | Is RocketPD related to In Demand Group (IDG)? | Yes — RocketPD is the educator-facing community we built. IDG is the parent strategy company that brings what we learned here to a small number of mission-aligned ed-tech partners. |
| 5 | What's your typical response time? | Within one business day for emails and form submissions. Booked calls happen at a time you pick. |
| 6 | Can I speak at a RocketPD event? | Yes — fill out the form above, choose 'Press, speaking, or media,' and we'll be in touch. |

**ACF fields (group: `rpd_contact_faq`):**

| Field | Type |
|---|---|
| `eyebrow` | Text |
| `headline` | Text |
| `subhead` | Textarea |
| `faqs` | Repeater (max 8) — sub-fields: `question` (Text), `answer` (Textarea) |

**Notes:**
- The IDG-relationship FAQ is intentional. There **will be** confusion (people see Jesse on both sites, see overlapping content, etc.) — better to address it head-on than have it become a credibility hit. Don't let an editor remove this one without consulting brand strategy.

---

## §7 — Community Nudge / Final CTA

**What it is:** Last big swing — most warm-leaning visitors should join the Community. Pairs with the Jesse-booking option as a fallback.

**WPBakery structure:**
- Row, padding `96px 0` / `112px 0`
- Background: linear gradient `from-#5552b1 to-#a154a1`, white text
- Decorative dot pattern overlay at 10% opacity (radial-gradient at 60×60px tile — use inline style)
- Inner: max-width 768px, centered text
- Pill badge (white/15 backdrop-blur): `THE FASTEST WAY TO MEET US`
- H2 (Poppins ExtraBold, 40–60px, white): *Honestly? Just come hang out.*
- Body (18–20px, lavender `#c4c4e5`, max-width 42rem): *40,000 educators are already inside the RocketPD Community swapping lessons, asking questions, and figuring it out together. The door's open — and it's free.*
- CTA group (flex, justify-center):
  - Primary (gold, navy text): **Join the Community →**
  - Secondary (outline white, fills white-on-hover with purple text): **Or Book Time with Jesse**
- Below CTAs (mt-40px, inline-flex with Users icon): *40K+ educators · 850+ districts · 48+ countries*

**ACF fields (group: `rpd_contact_final`):**

| Field | Type |
|---|---|
| `eyebrow` | Text |
| `headline` | Text |
| `body` | Textarea |
| `primary_cta_label` | Text |
| `primary_cta_url` | URL |
| `secondary_cta_label` | Text |
| `secondary_cta_url` | URL |
| `proof_strip` | Text |

---

## Footer

Reuse the RocketPD footer from `wordpress-build-notes.md` (Part 0). Update the **Contact column** for this page (and globally — the footer is shared site-wide):

| Heading | Items |
|---|---|
| Contact | (855) 757-6253 (`tel:`) · info@rocketpd.com (`mailto:`) · support@rocketpd.com (`mailto:`) · Book with Jesse (`http://rocketpd.com/jesse-schedule/`) |

Update the copyright line to include the address inline:
*© [year] RocketPD. 1055 Howell Mill Rd. 8th Floor, Atlanta, GA 30318. All rights reserved.*

---

# Cross-page guardrails (must not break)

1. **Three audience cards stay distinct.** Card A (educator, light), Card B (leader, **dark navy + featured badge**), Card C (member, light). Don't let an editor "unify the design" — Card B's dark treatment is a deliberate visual hierarchy choice.

2. **Phone number formatting is consistent.** Display: `(855) 757-6253`. `tel:` URL: `tel:8557576253` (no spaces, no parens, no dashes). Wire to `theme_options.rpd_phone_display` and `theme_options.rpd_phone_tel` so both update in one place.

3. **Three email addresses, three roles.** Don't merge them.
   - `info@rocketpd.com` — general inquiries (hero, §4 email card, footer)
   - `support@rocketpd.com` — existing-member support (§2 Card C, §4 callout, footer)
   - `info@indemand.group` — receives ed-tech/vendor partnership inquiries from §5 form via routing logic (NOT displayed on this page)

4. **Jesse-schedule URL.** Used in §1 quick-reach, §2 Card B (primary), §3 (primary CTA), §7 (secondary CTA), and footer — 5 references total. **Source-of-truth: `theme_options.jesse_schedule_url`.** All anchor tags should open in a new tab (`target="_blank" rel="noopener"`).

5. **No "demo" language.** RocketPD does walkthroughs, not demos. The word "demo" reads SaaS-corporate; "walkthrough" reads warmer. If marketing wants to A/B test, do it intentionally — don't drift.

6. **The IDG FAQ stays.** Question 4 ("Is RocketPD related to IDG?") explicitly addresses the relationship. Don't remove without brand-strategy sign-off — confusion is more costly than the dedicated answer.

7. **Form routing matters more than the form design.** The dropdown in §5 is the actual product here. Confirm the routing table (school → Jesse, partner → IDG, etc.) is wired correctly with operations before launch.

8. **No drip sequences.** The line *We don't add you to a drip sequence — promise.* under the form is a real promise — must match operational reality across all three inboxes.

9. **Pre-publish checklist:**
   - [ ] All `tel:` and `mailto:` links work on mobile (tap to call, tap to email)
   - [ ] `http://rocketpd.com/jesse-schedule/` opens in a new tab (`target="_blank" rel="noopener"`)
   - [ ] §5 form routes correctly per the routing table — test each dropdown value
   - [ ] Auto-acknowledgement email fires from §5 form
   - [ ] Mobile QA at 375 / 414 / 768 — Card B's floating "Most contact us here" badge stays visible
   - [ ] Anchor `#walkthrough-form` jumps to §5 from §2 Card B sub-link and §3 secondary CTA
   - [ ] Address in §4 wraps cleanly on narrow viewports
   - [ ] FAQ Question 4 (IDG relationship) is present
   - [ ] Footer Contact column reflects current emails + phone + Jesse link
   - [ ] Footer copyright includes the Atlanta address
