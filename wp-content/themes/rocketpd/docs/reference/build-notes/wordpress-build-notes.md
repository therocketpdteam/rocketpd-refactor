# WordPress Build Notes — RocketPD & IDG Homepages

**Stack:** WordPress + Salient theme + WPBakery Page Builder + Advanced Custom Fields (ACF Pro)
**Reference mockups:** `rocketpd-homepage.png`, `idg-homepage.png` (in this same folder)
**Audience:** In-house WordPress developer with copy and brand assets already in hand.

---

## How to use this document

Each homepage is broken into the same sections you see in the PNG, top to bottom. For each section you'll find:

- **What it is** — one-line purpose
- **WPBakery structure** — rows, columns, and which Salient elements (or Raw HTML) to use
- **ACF fields** — so non-developers can update copy without touching the builder
- **Notes** — anything Salient doesn't do natively, or where custom CSS/JS is needed

A "Custom CSS" section per site sits at the end. Drop those into **Salient → Theme Options → Custom CSS** (or a child theme stylesheet — your call).

---

# PART 0 — Shared Foundations (do these once)

## 0.1 Theme Options

| Setting | RocketPD | IDG |
|---|---|---|
| Header layout | Centered or Left logo, transparent over hero | Left logo, solid white |
| Header height | 80px | 80px |
| Sticky header | On (shrink on scroll) | On (shrink on scroll) |
| Body font | Inter (Google Fonts) | Inter (Google Fonts) |
| Heading font | Poppins (Google Fonts) | Inter, weight 700/800 |
| H1 size | 56px desktop / 36px mobile | 56px desktop / 36px mobile |
| Container width | 1200px | 1200px |
| Button style | Rounded | Square (no border-radius) |

Both sites use **Inter** for body. RocketPD layers **Poppins** for headlines. IDG uses **Inter Bold (700/800)** for headlines — do not substitute a rounded font; the visual identity depends on Inter's geometric character.

## 0.2 Custom Fonts (Salient → Theme Options → Typography)

Add Google Fonts:
- `Inter` weights 400, 500, 600, 700
- `Poppins` weights 400, 600, 700, 800, 900 (RocketPD only — but loading on both is fine)

## 0.3 Color palette (Salient → Theme Options → Colors)

**RocketPD**
| Role | Hex |
|---|---|
| Primary purple | `#a154a1` |
| Secondary indigo | `#5552b1` |
| Deep navy (text) | `#231F58` |
| Mid navy | `#343465` |
| Body text muted | `#45417c` |
| Soft lilac | `#c4c4e5` |
| Light bg | `#f8fafc` |
| Accent gold | `#fdb933` |
| Accent orange | `#f99d33` |

**IDG**
| Role | Hex |
|---|---|
| Deep navy (primary) | `#111A4A` |
| Slate blue (accent) | `#5C84AA` |
| Cream (warm bg) | `#F4F1EC` |
| Cream alt | `#E8DFD2` |
| Body text dark | `#231F58` |

## 0.4 ACF setup

Create one ACF Field Group per page:
- `RocketPD Homepage` — assigned to Page = "Home" (RocketPD)
- `IDG Homepage` — assigned to Page = "Home" (IDG)

Pattern: each section gets a **Tab field** then sub-fields underneath. For repeating items (cards, FAQs, district logos, etc.) use **Repeater** fields. Render the field values in WPBakery via shortcodes (`[acf field="hero_headline"]`) inside Salient text blocks, OR — cleaner — build the section once as a custom shortcode template and place it as a single WPBakery row.

For the most repeated/complex sections (resource cards, partner tiers, district wall) **strongly recommend custom shortcodes** rather than fighting WPBakery + ACF nesting. WPBakery can't render ACF Repeaters natively, so building a shortcode like `[rocketpd_resources]` that loops the ACF Repeater is far less maintenance than a 6-deep column tree.

---

# PART 1 — RocketPD Homepage

12 sections, top-to-bottom mapping. Background colors come from the palette above.

## 1.1 — Sticky top navigation

**WPBakery:** Salient header (Theme Options) — not built in WPBakery. Use Salient's **Header Navigation Menu** with the RocketPD logo and a primary CTA button "Join the Community" (gold, navy text).

**ACF:** none (use WP menu).

**Notes:** Active link should underline in purple (`#a154a1`); login link is text-only with no button styling.

---

## 1.2 — Hero

**WPBakery row settings**
- Full-width row, padding `120px top / 80px bottom`
- Background: light lilac gradient (`#f8fafc` to `#fff`)
- Two columns: 1/2 + 1/2 (stack on mobile)

**Left column elements (top to bottom)**
1. Salient Text Block — pill badge "For K-12 Educators & Leaders" (light purple bg, navy text)
2. Salient Heading — H1 "The Community for Educator Growth." (Poppins 800, navy `#231F58`)
3. Salient Text Block — subhead paragraph (~3 lines)
4. Salient Buttons — primary gold "Join the Community" + outlined navy "Explore LaunchPad"

**Right column**
- Image with rounded corners (radius 16px)
- Overlapping floating "stat pill" — small white card, absolute-positioned, with user icon + "40,000+ Educators joined". This **needs custom CSS** (Salient's image element doesn't support overlays cleanly).

**ACF fields**
| Name | Type |
|---|---|
| `hero_eyebrow` | Text |
| `hero_headline` | Text |
| `hero_subhead` | Textarea |
| `hero_cta_primary_label` | Text |
| `hero_cta_primary_url` | URL |
| `hero_cta_secondary_label` | Text |
| `hero_cta_secondary_url` | URL |
| `hero_image` | Image |
| `hero_stat_number` | Text |
| `hero_stat_label` | Text |

---

## 1.3 — Trust band (small dark stat strip)

**WPBakery:** Single full-width row, navy background `#343465`, 32px padding. Three text+icon blocks in a 3-column row, white text. Centered.

**Content:** "40,000+ educators · 850+ districts · Nationally recognized experts"

**ACF:** Repeater `trust_stats` with `icon` (Salient icon picker or text value), `label`.

---

## 1.4 — Value Proposition ("Learning, Meet Doing.")

**WPBakery:** Single centered row, white bg, 100px padding top/bottom. One column, max-width 720px, centered. Salient Heading + Text Block.

**ACF:** `value_prop_headline`, `value_prop_body`.

---

## 1.5 — How RocketPD Helps (4-card grid)

**WPBakery row**
- White bg, 100px padding
- Header text (heading + subhead, centered, max-width 720)
- 4-column row of feature cards (stack to 2x2 on tablet, 1 col on mobile)

**Card structure (each)**
- Salient "Fancy Box" or custom shortcode
- Icon at top (gold circle background)
- Title (Poppins bold, navy)
- Description (Inter, muted purple)

**ACF**
- `helps_headline`, `helps_subhead`
- Repeater `helps_cards` with: `icon`, `title`, `description`

---

## 1.6 — LaunchPad positioning

**WPBakery row**
- Light bg, 2-col layout (text left, screenshot/illustration right)
- Salient "Image with Animation" element on the right works fine here

**ACF**: `launchpad_eyebrow`, `launchpad_headline`, `launchpad_body`, `launchpad_image`, `launchpad_cta_label`, `launchpad_cta_url`.

---

## 1.7 — Membership tiers

**WPBakery row**
- White bg, 3-column layout
- Each card = bordered box with header tier name, price, feature list (✓ icons), CTA button at bottom
- **Middle card** has elevated styling (gradient border, "Most Popular" ribbon, scale slightly larger)

**Implementation tip:** Salient's Pricing Table element can do this but is rigid. Recommend a **custom shortcode** `[rocketpd_tiers]` reading an ACF Repeater. This keeps editing simple and styling exact.

**ACF Repeater `tiers`** (3 rows expected)
- `name`, `price`, `price_period`, `audience`, `features` (Repeater of text), `cta_label`, `cta_url`, `is_featured` (true/false)

---

## 1.8 — Community differentiation

**WPBakery row**
- Purple gradient background (`#5552b1` → `#a154a1`), white text
- 2-column: left = headline + body + CTA; right = image (smiling educator)
- Padding 100px

**Custom CSS required** for the gradient background — use VC row inline style or Custom CSS targeting a row class.

**ACF**: `community_headline`, `community_body`, `community_cta_label`, `community_cta_url`, `community_image`.

---

## 1.9 — Free Resources Library

**This is the most complex section.** Recommend a custom shortcode `[rocketpd_resources]` rather than building in WPBakery directly.

**Layout**
- Header: eyebrow + H2 + subhead (centered)
- Filter chips row (7 chips, scroll horizontally on mobile)
- 6-card grid (3-col desktop / 2-col tablet / 1-col mobile)
- Bottom CTA bar (gradient purple-gold)

**Card structure**
- Top half: gradient header (varies by category) with category icon
- "FREE" badge top-right corner (gold pill)
- Type label (e.g. "GUIDE")
- Title
- Description
- Meta row (clock icon + duration)
- "Access free →" link

**ACF**
- `resources_eyebrow`, `resources_headline`, `resources_subhead`
- Repeater `resource_categories` (used for filter chips): `name`, `slug`
- Repeater `resources` with: `category` (taxonomy or text), `type_label`, `title`, `description`, `duration`, `gradient_preset` (Select: Purple, Indigo, Gold, Teal...), `url`
- `resources_cta_headline`, `resources_cta_button_label`, `resources_cta_button_url`

**Filter behavior**
- Pure JS, no page reload — clicking a chip hides cards whose `data-category` doesn't match
- Salient has no native filter UI; write ~30 lines of vanilla JS in a child theme JS file or Theme Options → Custom JS

---

## 1.10 — Social proof block (3 sub-bands)

This section took the place of a small partner-logo strip. Recommend **one custom shortcode `[rocketpd_social_proof]`** rendering all three bands. Or three separate WPBakery rows if you prefer editor visibility.

### 1.10a — Featured State Partnership card (CASB)
- Premium horizontal card on light cream bg
- Top edge: thin gradient strip (purple → indigo → gold) — Custom CSS
- 3 sub-areas inside: gold seal/icon (left) | name + descriptor (middle) | stat (right, with vertical divider)

**ACF group `featured_partner`**: `eyebrow`, `name`, `descriptor`, `stat_number`, `stat_label`, `seal_icon`

### 1.10b — Endorser wordmarks (text-as-logos)
- Centered eyebrow "Endorsed by leaders in education"
- Flex-wrap row of 7 stylized wordmarks (60% opacity, grayscale, hover restores color)

**Custom CSS** is required for the grayscale → color hover. Each wordmark is a styled `<span>` with its own font / weight / size — defined in CSS. Can also use real PNG logos via ACF Repeater `endorsers` (image field) — recommended once your dev gets real partner logos.

### 1.10c — District wall
- Section eyebrow "District Community" + headline + stat line ("850+ districts in 47 states")
- 4-col grid (3-col on tablet, 2-col on mobile) of district name cards
- Each cell: stylized name + state code, white bg, hairline border
- Bottom note: "Want your district featured? → Bring RocketPD to your team"

**ACF Repeater `districts`**: `name`, `state` (2-char), optional `logo` (Image)

If logos exist, render the image instead of the styled text. The grid CSS stays the same.

---

## 1.11 — Testimonials

**WPBakery:** White bg, 3-column row, 100px padding. Three testimonial cards.

**Card structure**
- Quote icon (colored — varies per card)
- Italic quote text
- Avatar (40x40 round) + name + role + district

**ACF Repeater `testimonials`**: `quote`, `author_name`, `author_role`, `author_district`, `avatar` (Image), `accent_color` (Color picker — purple / gold / indigo).

Salient's Testimonials element works but is hard to style exactly. Custom shortcode `[rocketpd_testimonials]` recommended.

---

## 1.12 — Final CTA

**WPBakery row**
- Gradient navy background (`#343465` → `#231F58`)
- Soft purple/gold radial blurs (decorative blobs, absolute-positioned)
- Centered: H2 (white, Poppins) + subhead + 2 buttons (gold primary + outlined ghost)

**Custom CSS** for the radial blur overlays (use ::before / ::after on the row).

**ACF**: `final_cta_headline`, `final_cta_subhead`, `final_cta_primary_label`, `final_cta_primary_url`, `final_cta_secondary_label`, `final_cta_secondary_url`.

---

## 1.13 — Footer

Salient's footer in Theme Options handles this. 4-column layout with logo + descriptor (col 1), then three link columns. Newsletter signup not in current mock — add later if desired.

---

## RocketPD — Required Custom CSS snippets

```css
/* Hero floating stat pill */
.rocketpd-hero-image-wrap { position: relative; }
.rocketpd-stat-pill {
  position: absolute; left: -32px; bottom: 64px;
  background: #fff; border-radius: 12px;
  padding: 12px 20px; box-shadow: 0 8px 30px -8px rgba(35,31,88,.2);
  display: flex; align-items: center; gap: 12px;
}

/* Endorser wordmark band */
.rocketpd-endorsers { opacity: .6; filter: grayscale(1); transition: all .5s; }
.rocketpd-endorsers:hover { opacity: 1; filter: none; }

/* CASB featured card top accent strip */
.casb-card { position: relative; overflow: hidden; }
.casb-card::before {
  content: ""; position: absolute; top:0; left:0; right:0; height:4px;
  background: linear-gradient(90deg, #a154a1 0%, #5552b1 50%, #fdb933 100%);
}

/* Final CTA radial blobs */
.rocketpd-final-cta { position: relative; overflow: hidden; }
.rocketpd-final-cta::before,
.rocketpd-final-cta::after {
  content:""; position:absolute; border-radius:50%; filter: blur(100px); opacity:.3;
}
.rocketpd-final-cta::before { background:#5552b1; top:-20%; right:-10%; width:70%; height:140%; }
.rocketpd-final-cta::after  { background:#a154a1; bottom:-20%; left:-10%; width:60%; height:120%; opacity:.2; }

/* District wall */
.district-grid { display: grid; gap: 1px; background: rgba(196,196,229,.4);
  border: 1px solid rgba(196,196,229,.4); border-radius: 12px; overflow: hidden; }
.district-cell { background:#fff; padding:24px 16px; text-align:center;
  display:flex; flex-direction:column; justify-content:center; min-height:96px; }
```

---

# PART 2 — IDG Homepage

Visual language is intentionally distinct: deep navy, square edges, no border-radius, hard 8px offset shadows on featured elements ("brutalist" feel). 8 main sections.

## 2.1 — Sticky nav

Salient header — left logo (use the BLU PNG logo file the team has), nav links centered, two CTAs on the right ("Request Assessment" text + "Apply to Partner" navy button). Solid white background, slim border-bottom on scroll.

---

## 2.2 — Hero

**WPBakery row**
- Cream bg `#F4F1EC`, full-width, 100px padding top / 80px bottom
- 2-col: text left (60%) / image right (40%)

**Left column**
- Tiny eyebrow with horizontal divider line ("— IN-DEMAND GROUP / K-12 GROWTH PARTNERS")
- Massive H1 "Get Into District Budgets — Before They're Written." (Inter 800, navy, tight leading)
- Subhead paragraph
- Two CTAs: navy square button + underlined link with arrow
- Italic disclaimer block at the bottom-left ("We don't push products onto educators...")

**Right column**
- Full-bleed image (executive at window with city skyline) — square corners

**ACF**: `hero_eyebrow`, `hero_headline`, `hero_subhead`, `cta_primary_*`, `cta_secondary_*`, `hero_image`, `hero_disclaimer`.

---

## 2.3 — Trust strip ("Built inside RocketPD")

**WPBakery row**
- Navy bg `#111A4A`, white text, 60px padding
- Single line of intro text centered (max-width 800)
- 4-column stat row underneath: 40,000+ EDUCATORS · 850+ DISTRICTS REACHED · $4M+ PD REVENUE SUPPORTED · TRUST → ENGAGEMENT → ADOPTION PIPELINE

**ACF**: `trust_intro` (textarea), Repeater `trust_stats` (number, label).

---

## 2.4 — Not a Funnel (5-step + procurement card)

**WPBakery row**
- White bg, 100px padding, 2-col layout (text left, card right)

**Left column**
- Heading: Two-tone treatment — "Not a Funnel." (navy, dark) on top, "A System Built for How Schools Actually Buy." (slate blue lighter) below — single H2 with a `<br>` and span class
- Body text
- 5-item numbered list with hairline divider between items, each item: number (slate blue) + bold step name + indented description

**Right column**
- Pale cream card "THE REALITY OF K-12 PROCUREMENT"
- 4 row items: icon + season name + description
- Last item highlighted in pale red with × icon ("July+ — Most vendors arrive. Far too late.")

**ACF**
- `not_funnel_headline_top`, `not_funnel_headline_bottom`, `not_funnel_body`
- Repeater `funnel_steps` with: `step_title`, `step_description`
- Repeater `procurement_seasons` with: `icon` (Select), `name`, `description`, `is_warning` (true/false)

---

## 2.5 — Buying Cycle ("From Awareness to Adoption")

**WPBakery row**
- Navy bg `#111A4A`, white text, 100px padding
- Centered heading + subhead at top
- Then either: a horizontal timeline OR a 4-step process row (the mock uses a 4-step horizontal flow)

**Implementation:** Each step = column with month/season label, icon, title, description. Use connecting line between steps via Custom CSS pseudo-elements.

**ACF**: `cycle_headline`, `cycle_subhead`, Repeater `cycle_steps` (`when`, `title`, `description`, `icon`).

---

## 2.6 — Partner Tiers ("Three Ways to Build Inside the System")

**This is the most complex IDG section.** Custom shortcode `[idg_tiers]` strongly recommended.

**Layout**
- Centered header: H2 + subhead, max-width 760
- 2-col grid for the **top two tiers** (Strategic Growth Partnership + Market Entry Sprint)
- Below that, **full-width Growth Package card** spanning 100% — deliberately styled as subordinate

**Top two tier cards**
- Square corners, 2px navy border
- Featured tier ("Strategic Growth Partnership"): 8px hard offset shadow (`8px 8px 0 #111A4A`) + "RECOMMENDED" badge top-right
- Header section: tier name (Inter bold), price + period, outcome description
- Body: checkmark feature list (slate blue checks for featured, faded navy for secondary)
- Footer: full-width CTA button

**Growth Package card (third tier)**
- Lighter navy-tinted bg (`rgba(17,26,74,0.03)`)
- Single thin border, no offset shadow
- Internal 5-col grid: left 2 cols = positioning panel | right 3 cols = inclusions + CTA
- Eyebrow "Best for emerging companies · $250K–$1M ARR" in slate blue
- Right side has 2-col checklist (6 inclusions) + 2-button row at bottom

**ACF**
- `tiers_headline`, `tiers_subhead`
- Repeater `tiers_top` (max 2 rows): `name`, `price`, `period`, `outcome`, `features` (sub-Repeater of text), `cta_label`, `cta_url`, `is_featured`
- Group `tier_growth`: `eyebrow`, `name`, `price`, `outcome`, `positioning_note`, Repeater `inclusions` (text), `cta_primary_label`, `cta_primary_url`, `cta_secondary_label`, `cta_secondary_url`

---

## 2.7 — Fit / Not Fit (two-column comparison)

**WPBakery row**
- White bg, 100px padding, centered header
- 2-col grid: "WE'RE A FIT FOR" (left) vs "WE'RE NOT A FIT FOR" (right)
- Each column = 4–6 bulleted items with check (left) or × (right) icons

**ACF**: `fit_headline`, `fit_subhead`, Repeater `fit_yes` (text), Repeater `fit_no` (text).

---

## 2.8 — Insights (article cards)

**WPBakery row**
- Cream alt bg `#E8DFD2`
- Centered header
- 3-column row of article cards: image top, category label, title, excerpt, "Read article →"

**ACF**: Use the WP **Posts custom post type** with category "Insights" and let the section auto-pull the latest 3. OR use Repeater `insights` with `image`, `category`, `title`, `excerpt`, `url` for full editorial control.

---

## 2.9 — FAQ

**WPBakery:** Use Salient's Toggles element OR a custom shortcode rendering an ACF Repeater for cleaner styling.

**Visual**: Square corners, full-width, navy border-bottom on each row, navy chevron icon, slow expand animation.

**ACF Repeater `faqs`**: `question`, `answer` (WYSIWYG).

---

## 2.10 — Final CTA

**WPBakery row**
- Navy bg `#111A4A`, 100px padding, white text, centered
- H2 + subhead + single primary CTA button + secondary text link

**ACF**: `final_cta_headline`, `final_cta_body`, `final_cta_button_label`, `final_cta_button_url`, `final_cta_link_label`, `final_cta_link_url`.

---

## 2.11 — Footer

Salient footer. 4-column: logo + descriptor + contact, then 3 link columns. White text on navy `#111A4A` bg.

---

## IDG — Required Custom CSS snippets

```css
/* Square corners everywhere */
.idg-page .vc_btn3, .idg-page .nectar-button, .idg-page input, .idg-page .card { border-radius: 0 !important; }

/* Featured tier card hard offset shadow */
.idg-tier-featured {
  border: 2px solid #111A4A;
  box-shadow: 8px 8px 0 0 #111A4A;
}

/* "Recommended" badge */
.idg-tier-badge {
  position: absolute; top: 0; right: 0;
  background: #111A4A; color: #fff;
  font-size: 11px; font-weight: 700;
  letter-spacing: 0.2em; text-transform: uppercase;
  padding: 4px 16px;
}

/* Growth package full-width card */
.idg-tier-growth {
  background: rgba(17,26,74,0.03);
  border: 1px solid rgba(17,26,74,0.2);
}
.idg-tier-growth .grid-inner {
  display: grid; grid-template-columns: 2fr 3fr; gap: 0;
}
.idg-tier-growth .left {
  padding: 40px; border-right: 1px solid rgba(17,26,74,0.1);
}
.idg-tier-growth .right { padding: 40px; }
.idg-tier-growth .inclusions {
  display: grid; grid-template-columns: 1fr 1fr; gap: 12px 24px;
}
@media (max-width: 768px) {
  .idg-tier-growth .grid-inner { grid-template-columns: 1fr; }
  .idg-tier-growth .left { border-right: none; border-bottom: 1px solid rgba(17,26,74,0.1); }
}

/* Procurement reality card warning row */
.procurement-warning { background: rgba(220,38,38,0.05); padding: 16px; }
```

---

# PART 3 — Cross-Cutting Notes

## 3.1 Responsive

Both designs were built mobile-first in the mock. Targets:
- **Desktop:** ≥1024px (full layouts as in PNG)
- **Tablet:** 768–1023px (most 3-col grids → 2-col, hero stacks)
- **Mobile:** <768px (everything single column, hero image moves below text, district grid → 2-col)

Salient handles a lot of this automatically with row breakpoints. The ones to watch:
- **RocketPD Resources Library** — chip filter row needs horizontal scroll on mobile (`overflow-x:auto; -webkit-overflow-scrolling:touch`)
- **IDG Growth Package card** — the 5-col internal grid must collapse to single column on mobile (CSS provided above)
- **IDG Buying Cycle horizontal flow** — collapses to vertical timeline on mobile

## 3.2 Performance

- Optimize all images via Salient's lazy loading (Theme Options) and a plugin like ShortPixel or Imagify
- The hero images on both sites are the largest assets — serve as WebP, target <200KB each
- Custom Google Fonts: limit to weights actually used (listed above) to avoid bloat
- District wall, resource cards, FAQ — all benefit from being below-the-fold lazy-rendered

## 3.3 Accessibility checks before launch

- Color contrast: gold text on white in RocketPD (`#fdb933` on `#fff`) is borderline — only use it on dark backgrounds
- Heading hierarchy: one H1 per page, no skipped levels
- Filter chips, FAQ toggles, accordions all need keyboard support — Salient's defaults usually pass
- All CTA buttons need accessible names (avoid "Click here" — use action verbs as written in the mock)

## 3.4 Animation

The mock uses subtle motion only:
- Fade/slide-in on scroll for sections (Salient supports this natively via row "Animation" setting)
- Hover lift on cards (`transform: translateY(-4px); transition: 200ms`)
- Wordmark grayscale → color hover transition (CSS above)
- No autoplay videos, no parallax — keep it calm

## 3.5 Recommended plugins

| Plugin | Why |
|---|---|
| Advanced Custom Fields PRO | Already required |
| WPBakery Page Builder | Already required (bundled with Salient) |
| Yoast SEO or RankMath | Meta titles/descriptions per page |
| ShortPixel / Imagify | Image optimization |
| WP Rocket / Salient's built-in cache | Performance |
| Code Snippets | Holds the custom shortcode PHP without a child theme |

## 3.6 Launch checklist (high level)

1. Build both pages following section maps above
2. Wire all ACF fields and pre-populate with copy
3. Replace all stylized text wordmarks with real partner/district logos as they become available
4. Mobile QA on iPhone + Android (Safari + Chrome)
5. Test all forms (Apply to Partner, Request Assessment, newsletter, contact) end-to-end
6. SEO meta + Open Graph images for social sharing
7. Performance pass: Lighthouse score targets ≥85 on Performance, ≥95 on Accessibility
8. 301 redirects from any old URLs being replaced

---

## Questions for the developer to flag back to you

If your dev runs into anything ambiguous, these are the areas most likely to need your call:

1. **CASB stat ("178 Colorado school boards served")** — placeholder; confirm actual number
2. **District wall logos** — currently stylized text; replace with real PNG logos when available
3. **Insights section source** — auto-pull from a Posts CPT, or manual curation via ACF?
4. **Forms back-end** — Gravity Forms? Contact Form 7? HubSpot embed? Each form (Apply to Partner, Request Assessment) needs to route somewhere
5. **RocketPD Free Resources Library** — gating? (Email-gated download vs open download)
6. **Cookie/consent banner** — required if you collect any analytics

Send these answers along with this doc and your dev should be able to scope the build cleanly.
