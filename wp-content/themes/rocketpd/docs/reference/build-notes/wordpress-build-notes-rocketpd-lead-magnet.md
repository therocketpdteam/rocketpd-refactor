# RocketPD — Lead Magnet Landing Page

**WordPress build notes for the reusable RocketPD Lead Magnet template**
Stack: WordPress · Salient theme · WPBakery Page Builder · ACF Pro · Gravity Forms

This template is **reusable**. Each new campaign (guide, playbook, webinar download, resource report) reuses the same page structure, ACF schema, and Gravity Forms feed — only the content fields and the guide PDF change.

The walkthrough page is at `/resources/learning-meet-doing/` for the **first** campaign. Future campaigns get a slug like `/resources/<campaign-slug>/`.

---

## Part 0 — Prerequisites

Before building this page:

1. **`wordpress-build-notes.md` Part 0 is in place** — theme options, fonts (Poppins headlines + Inter body), full color palette (`#231F58`, `#5552b1`, `#a154a1`, `#fdb933`, `#c4c4e5`, `#f8f8fc`, `#1a1744`), shared header & footer.
2. **Real CTA destinations exist:**
   - Walkthrough → `https://rocketpd.com/jesse-schedule/` (`theme_options.jesse_schedule_url`)
   - Diagnostic → `https://readinessreport.indemand.group/` (`theme_options.diagnostic_url`)
   - Video → set per-campaign (see ACF `video_url`)
3. **Gravity Forms is installed** with at least one notification feed configured (we'll add a per-campaign feed below).
4. **A WP custom post type `lead_magnet`** is registered to hold reusable campaigns. (See "Custom Post Type Setup" below.) If you'd rather build the first campaign as a one-off page, the ACF schema below still applies — just attach it to the page instead of a CPT.

---

## Custom Post Type Setup (one-time)

Register a `lead_magnet` CPT so each guide is its own post with its own URL, fields, and PDF asset. This is what makes the template **reusable** — the WP editor can launch a new campaign in ~15 minutes by duplicating an existing post and updating the ACF fields.

```php
// functions.php (or a small mu-plugin)
register_post_type('lead_magnet', [
  'label'       => 'Lead Magnets',
  'public'      => true,
  'has_archive' => false,
  'rewrite'     => ['slug' => 'resources', 'with_front' => false],
  'supports'    => ['title', 'editor', 'thumbnail'],
  'menu_icon'   => 'dashicons-download',
  'show_in_rest'=> true,
]);
```

Each post URL becomes `/resources/<post-slug>/`. The first campaign post: `Learning Meet Doing` → `/resources/learning-meet-doing/`.

**Templating:** Create `single-lead_magnet.php` in the Salient child theme. The template renders the 9 sections below by reading the ACF fields off the current post.

---

## Reusable section CSS classes

Apply these classes to the WPBakery row containers so styles cascade cleanly. They mirror the React mockup so the agency dev and WP dev see the same structure.

```
.rpd-lm-hero         §1 Hero
.rpd-lm-problem      §2 The Problem
.rpd-lm-shift        §3 The Shift (Old vs New)
.rpd-lm-learn        §4 What You'll Learn
.rpd-lm-outcomes     §5 Why It Matters (outcomes flow)
.rpd-lm-proof        §6 Proof
.rpd-lm-form         §7 Primary CTA + Form
.rpd-lm-next-steps   §8 Secondary Path
.rpd-lm-footer-cta   §9 Footer CTA
```

Add baseline styles in the child theme:

```css
.rpd-lm-hero        { background: linear-gradient(135deg, #fff 0%, #f8f8fc 50%, rgba(196,196,229,.25) 100%); padding: 80px 0 96px; }
.rpd-lm-problem     { background: #f8f8fc; border-block: 1px solid rgba(196,196,229,.3); padding: 96px 0; }
.rpd-lm-shift       { background: #fff; padding: 96px 0; }
.rpd-lm-learn       { background: linear-gradient(135deg, rgba(85,82,177,.05), #fff 50%, rgba(253,185,51,.08)); padding: 96px 0; }
.rpd-lm-outcomes    { background: #fff; padding: 96px 0; }
.rpd-lm-proof       { background: #f8f8fc; border-block: 1px solid rgba(196,196,229,.3); padding: 80px 0; }
.rpd-lm-form        { background: linear-gradient(135deg, #1a1744, #231F58, #343465); color: #fff; padding: 96px 0; }
.rpd-lm-next-steps  { background: #fff; padding: 96px 0; }
.rpd-lm-footer-cta  { background: linear-gradient(135deg, #5552b1, #a154a1); color: #fff; padding: 96px 0; }
```

---

## ACF Field Group — `Lead Magnet Page`

Attach to: Post Type = `lead_magnet`. Position: high.

> All text fields below are per-campaign. The WP editor swaps these to launch a new lead magnet.

### Group: `hero` (Group field)

| ACF field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | Default: "Free Guide for District Leaders" |
| `headline_html` | WYSIWYG (limited) | Allow `<span class="accent">` for the deep-purple highlight word(s). |
| `subheadline` | Textarea | |
| `support_label` | Text | Default: "DOWNLOAD THE GUIDE" |
| `support_title` | Text | Guide name (e.g. "Learning Meet Doing") |
| `support_body` | Textarea | The long support line |
| `cta_primary_label` | Text | Default: "Download the Guide" |
| `cta_secondary_label` | Text | Default: "See What This Looks Like in Practice" |
| `trust_lines` | Repeater (max 2) — sub-field: `text` | Each item shows with a checkmark |

### Group: `cover` (Group field)

| ACF field | Type | Notes |
|---|---|---|
| `cover_label` | Text | Default: "THE ROCKETPD GUIDE" |
| `cover_title_html` | Text | Allow inline `<span class="accent-gold">` for the gold word |
| `cover_body` | Textarea | |
| `cover_meta` | Text | e.g. "28-page guide · PDF" |
| `proof_top_label` | Text | Default: "ENGAGED" |
| `proof_top_value` | Text | Default: "40,000+ educators" |
| `proof_bottom_label` | Text | Default: "TRUSTED BY" |
| `proof_bottom_value` | Text | Default: "850+ districts" |

### Group: `problem` (§2)

| ACF field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | "The challenge" |
| `headline` | Text | |
| `intro_paragraph` | Textarea | |
| `pivot_line_1` | Text | "Not because educators aren't committed —" |
| `pivot_line_2` | Text | (bold) "But because the model doesn't support them." |
| `card_label` | Text | "WHAT DISTRICT LEADERS ARE SEEING" |
| `items` | Repeater (max 6) — sub-fields: `title` (text), `body` (textarea) | The 4 problem rows |

### Group: `shift` (§3)

| ACF field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | "The shift" |
| `headline` | Text | |
| `body_html` | WYSIWYG (limited) | Allow `<em class="accent">…</em>` |
| `old_eyebrow` | Text | "OLD MODEL" |
| `old_title` | Text | "Isolated PD events" |
| `old_bullets` | Repeater (max 6) — sub-field: `text` | 4 items |
| `new_eyebrow` | Text | "NEW MODEL" |
| `new_title` | Text | "Continuous learning system" |
| `new_bullets` | Repeater (max 6) — sub-field: `text` | 4 items |
| `cycle_steps` | Repeater (max 7) — sub-field: `text` | "Learn / Apply / Reflect / Refine / Repeat" |

### Group: `learn` (§4)

| ACF field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | "Inside this guide" |
| `headline` | Text | "What you'll learn." |
| `body` | Textarea | |
| `items` | Repeater (max 6) — sub-fields: `icon` (select), `title` (text), `body` (textarea), `palette` (select: purple / gold / deep-purple) | 5 cards |

Icon select options (Lucide-equivalent in WP — use a small icon-name → SVG map in the theme): `Compass`, `Zap`, `HeartHandshake`, `TrendingUp`, `Target`, `BookOpen`, `Sparkles`, `Users`, `Building2`.

### Group: `outcomes` (§5)

| ACF field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | "Why it matters" |
| `headline` | Text | |
| `body` | Textarea | |
| `stages` | Repeater (max 6) — sub-fields: `label` (text), `body` (text), `color_hex` (text, default supplied) | 5 stages — color gradient runs purple → gold |
| `closing_html` | WYSIWYG (limited) | Allow `<strong>` |

### Group: `proof` (§6)

| ACF field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | "Proof" |
| `headline` | Text | "Built from real district experience." |
| `body` | Textarea | |
| `stats` | Repeater (max 4) — sub-fields: `stat` (text), `label` (text), `body` (textarea), `icon` (select), `color_hex` (text) | 3 stat cards |
| `credibility_quote` | Textarea | The italic line under the stats |

### Group: `form` (§7)

| ACF field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | "Get the guide" |
| `headline` | Text | "Download the Guide." |
| `body` | Textarea | |
| `bullets` | Repeater (max 6) — sub-field: `text` | The 3 ✓ items |
| `card_label` | Text | "SEND ME THE GUIDE" |
| `card_title` | Text | "Where should we send it?" |
| `gravity_form_id` | Number | The Gravity Forms ID for **this campaign** |
| `submit_label` | Text | "Download the Guide" |
| `trust_line` | Textarea | "We don't add you to a drip sequence — promise." |
| `guide_pdf` | File upload | The actual guide PDF — used in the Gravity Forms confirmation download link |

### Group: `next_steps` (§8) — exactly 3 cards

| ACF field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | "Want to go a step further?" |
| `headline` | Text | "A few ways to dig deeper." |
| `body` | Textarea | |
| `cards` | Repeater (max 3, min 3) — sub-fields: `icon` (select), `title` (text), `body` (textarea), `cta_label` (text), `cta_url` (URL), `style` (select: outline-purple / outline-deep-purple / filled-gold) | Card 3 (walkthrough) is the **featured** style by default |

Default values for the 3 cards (these are the current "Learning Meet Doing" defaults — copy them when launching new campaigns):
1. PlayCircle · "Watch how districts are implementing this model" · `outline-purple` · URL set per campaign (typically a Vimeo/Wistia link)
2. ClipboardCheck · "Take the Readiness Diagnostic" · `outline-deep-purple` · `https://readinessreport.indemand.group/`
3. Calendar · "Schedule a LaunchPad Walkthrough" · `filled-gold` · `https://rocketpd.com/jesse-schedule/`

### Group: `footer_cta` (§9)

| ACF field | Type | Notes |
|---|---|---|
| `eyebrow` | Text | "Start with clarity" |
| `headline` | Text | "Start with clarity." |
| `body` | Textarea | "Download the guide and see what's possible." |
| `cta_label` | Text | "Download the Guide" |
| `meta_line` | Text | "28-page PDF · Free · No follow-up sales sequence" |

---

## Section-by-section build notes

### §1 — `rpd-lm-hero`

**Layout:** WPBakery row · 12-col grid · 7/5 split (text left / cover right).

- Eyebrow: small badge — purple-on-purple (`bg: rgba(85,82,177,.10); color: #5552b1; padding: 6px 14px; border-radius: 999px; font-size: 11px; letter-spacing: .08em; text-transform: uppercase`).
- Headline: Poppins 800, 56–58px desktop, 36–40px tablet, 32px mobile. Render `headline_html` so the editor can wrap one or two words in `<span class="accent">…</span>` (deep purple `#a154a1`).
- Support card: white, rounded 16px, border `1px solid rgba(196,196,229,.5)`, soft shadow. Internal label `#a154a1` uppercase.
- Buttons:
  - Primary — gold `#fdb933`, navy text, h=56px, anchor target `#rpd-lm-form`. Always opens the on-page form (no page jump tracking pixel needed).
  - Secondary — outline purple, anchor target `#rpd-lm-next-steps`.
- Trust lines: row of two ✓ items, `#5552b1` icons.
- Cover (right):
  - Outer aspect-ratio container `3 / 4`, max width 28rem, centered.
  - Background = navy gradient `#231F58 → #1a1744 → #0f0d2e` with a subtle 44px gold grid pattern at 7% opacity, plus two blurred radial glows (gold top-right, deep-purple bottom-left).
  - Cover title accepts `<span class="accent-gold">` to color one word gold.
  - Two floating proof badges absolutely positioned on the cover (top-right and bottom-left), each is a small white card with a colored icon chip + label/value.

**WPBakery shortcut:** Build §1 as a single Custom Heading + Raw HTML row to keep the cover/badge positioning controllable. The cover block is a small custom Salient template part `template-parts/lead-magnet/cover.php`.

### §2 — `rpd-lm-problem`

- Background: `#f8f8fc` with thin top/bottom border `rgba(196,196,229,.3)`.
- Layout: 5/7 split (text / checklist card).
- Checklist card: white with offset `#5552b1` block at 10% opacity translated +12,+12 behind it (matches RocketPD pattern across the site).
- Each item: round chip (deep-purple at 10% opacity) holding a Lucide `X`, title in Poppins bold, body in Inter.
- The 4 items are `problem.items` repeater. Cap at 6 in the schema, but the design works best with 4.

### §3 — `rpd-lm-shift`

- Centered intro with eyebrow / headline / body.
- 2-col comparison: left = light card (Old Model), right = featured navy card (New Model) with gold offset block behind, gold accents inside.
- Cycle pill: pill with rounded-full background `#f8f8fc`, items separated by small `→` arrows (`#a154a1`).

### §4 — `rpd-lm-learn`

- Background gradient: very soft purple → white → very soft gold.
- 5 cards in a single row on desktop (`grid-template-columns: repeat(5, 1fr)`), 2-col on tablet, 1-col on mobile.
- Each card: white, rounded 16px, border `rgba(196,196,229,.4)`, hover `border-color: rgba(85,82,177,.3)` + lift shadow.
- Card icon palette rotates: purple → gold → deep-purple → purple → gold (from `palette` field).

### §5 — `rpd-lm-outcomes`

- 5-stage flow with arrow connectors between cards (use a small `<span>` absolutely positioned on `right: -12px` per card; hide the connector on the last card and on mobile).
- Stage colors run a deliberate gradient: `#5552b1 → #7048a0 → #a154a1 → #c54b81 → #fdb933` to visually move "purple to gold" (learning → goals).
- Numbered chip (1–5) at top-center of each card.
- Closing line below allows `<strong>` for the run-on bold list of outcomes.

### §6 — `rpd-lm-proof`

- 3 large stat cards in a row.
- Stat in Poppins 800 / 48px, label in `#a154a1` small caps, body in Inter regular.
- Icon chip color is set by `stats[].color_hex` to keep stat cards visually differentiated.
- Italic credibility quote sits centered below the stats.

### §7 — `rpd-lm-form` — primary conversion block

**The most important section.** Every choice here optimizes for filling out the form.

- Background: dark navy gradient `#1a1744 → #231F58 → #343465`. Two blurred radial glows: `#fdb933/15` top-right, `#5552b1/30` bottom-left.
- Layout: 5/7 split (pitch left / form card right).
- Form card: white, rounded 16px, hard shadow `0 25px 50px -12px rgba(0,0,0,.25)`.
- Fields **in this order** (must match Gravity Forms IDs):
  1. Your name — required
  2. Your role — required
  3. District / organization — required
  4. Work email — required, validated
- Submit button: full-width gold, h=56px, label = "Download the Guide".
- Trust line below the form is the single most-tested phrase on the page. **Keep it short and remove it last** in any redesign.

**Gravity Forms wiring:**

1. Build a Gravity Form with the 4 fields above. Assign it a known ID (e.g. 7).
2. The ID goes into ACF field `form.gravity_form_id` so each campaign can use its own form (lets you keep clean conversion analytics per guide).
3. **Confirmation:** redirect to `/resources/<post-slug>/thank-you/` (a child page that renders the §9 footer-cta block + a fresh download link to `form.guide_pdf`). Or, if you prefer, render the confirmation as text and provide an immediate `<a>` to the PDF.
4. **Notification feed:** send to `info@rocketpd.com` + the campaign owner. Subject: `[Lead Magnet] {form_title} — {Name}, {Organization}`.
5. **Hidden tracking field** on the form: `campaign_slug` populated from `{post_name}` (Gravity merge tag) so the CRM can attribute the lead to the right guide automatically.

Render the form inside the section with the Gravity Forms shortcode:

```html
[gravityform id="{form.gravity_form_id}" title="false" description="false" ajax="true"]
```

Wrap it in a `<div class="rpd-lm-form-card">…</div>` so the Salient styles don't leak through.

### §8 — `rpd-lm-next-steps`

- 3 equal cards. By design, the third card (walkthrough) is the **filled gold** style and the first two are outline. Don't let all three become filled — the visual hierarchy is intentional.
- Each card has the same offset-block pattern as the rest of the site (color matches the card's accent: purple / deep-purple / gold).
- The diagnostic URL (`https://readinessreport.indemand.group/`) and walkthrough URL (`https://rocketpd.com/jesse-schedule/`) come from `theme_options.diagnostic_url` and `theme_options.jesse_schedule_url` respectively. Populate the ACF `cta_url` defaults from those theme options when a new lead magnet is created.

### §9 — `rpd-lm-footer-cta`

- Purple gradient background `#5552b1 → #a154a1` with a faint dot pattern overlay at 10% opacity.
- Single CTA — gold button, anchor to `#rpd-lm-form` (does NOT take you off-page).
- Meta line under the button keeps the guide value-prop visible.

---

## Mobile-first / responsive notes

| Section | Mobile (<640) | Tablet (640–1024) | Desktop (≥1024) |
|---|---|---|---|
| §1 Hero | Stack 1-col, cover below copy, hide floating proof badges | 2-col, badges visible | 7/5 grid, badges absolute on cover |
| §2 Problem | 1-col stack; checklist card below copy | 5/7 stack | 5/7 grid |
| §3 Shift | 1-col cards, cycle pill wraps | 2-col cards | 2-col cards |
| §4 Learn | 1-col cards | 2-col grid | 5-col grid |
| §5 Outcomes | 2-col stages, hide arrow connectors | 5-col tightly packed | 5-col with arrow connectors |
| §6 Proof | 1-col | 1-col | 3-col |
| §7 Form | Stack pitch above form | 5/7 stack | 5/7 grid |
| §8 Next Steps | 1-col | 1-col | 3-col |
| §9 Footer CTA | Always centered single column | same | same |

**Sticky on scroll:** consider a small "📥 Download the Guide" sticky button on mobile that anchors to `#rpd-lm-form`. It should only appear after the user scrolls past the hero. Keep it ≤ 44px tall so it doesn't fight the OS UI. Implementation is optional for v1.

---

## Salient / WPBakery implementation tips

1. **Build sections as nested rows.** Each `rpd-lm-*` row is one full-width WPBakery row with a custom CSS class. Use Salient's "Full Width Section" + "Boxed (Container)" inner row pattern so internal padding stays consistent.
2. **Disable Salient's default heading scaling on this template.** The headline weights on the lead magnet are tighter than Salient defaults. Add a `body.single-lead_magnet` scope to the child theme CSS so changes don't bleed elsewhere.
3. **Don't use a Salient form module here.** Use Gravity Forms directly — Salient's form widget can't be wired to the per-campaign confirmation/PDF flow we need.
4. **Image asset paths.** Upload the guide cover background pattern as a tiled SVG in the child theme (`/img/grid-44.svg`). Keep the navy gradient + glow overlays in CSS — don't bake them into images, otherwise they look bad on hi-DPI.
5. **Editor experience.** Add ACF "Tabs" inside the field group for each section (`Hero` / `Cover` / `Problem` / `Shift` / `Learn` / `Outcomes` / `Proof` / `Form` / `Next Steps` / `Footer CTA`) so the campaign owner can navigate quickly. Add character-count hints in the field instructions where copy length is fragile (hero headline, support title, stat cards).

---

## CTA destinations / link matrix

Five distinct CTA destinations live on this page. Wire the first three to `theme_options` so updates propagate across all campaigns; the next two are per-campaign.

| CTA | Where it appears | Source of truth |
|---|---|---|
| `#rpd-lm-form` | Header (Download), §1 Hero (Primary), §9 Footer CTA | (anchor — hard-coded) |
| `#rpd-lm-next-steps` | §1 Hero (Secondary) | (anchor — hard-coded) |
| Walkthrough URL | §8 Card 3 | `theme_options.jesse_schedule_url` (default `https://rocketpd.com/jesse-schedule/`) |
| Diagnostic URL | §8 Card 2 | `theme_options.diagnostic_url` (default `https://readinessreport.indemand.group/`) |
| Video URL | §8 Card 1 | Per-campaign — ACF `next_steps.cards[0].cta_url` |
| PDF download | Gravity Forms confirmation, post-submit | Per-campaign — ACF `form.guide_pdf` |

---

## Reusable-template pre-publish checklist

Before launching a new lead-magnet campaign:

- [ ] Created a new `lead_magnet` post (or duplicated the previous one with [Yoast Duplicate Post]).
- [ ] Slug set (e.g. `learning-meet-doing` → `/resources/learning-meet-doing/`).
- [ ] All ACF tabs filled out (no defaults left over from the previous campaign).
- [ ] Hero headline ≤ ~70 characters; support title ≤ ~30 characters.
- [ ] Guide cover title set; gold accent word wrapped in `<span class="accent-gold">`.
- [ ] Proof badge values reflect current numbers.
- [ ] §4 Learn has exactly 5 cards.
- [ ] §5 Outcomes has exactly 5 stages with the purple-to-gold color order preserved.
- [ ] §6 Proof has 3 stat cards.
- [ ] Gravity Form created for this campaign with the 4 standard fields, hidden `campaign_slug` field populated, notification feed added, confirmation set to either redirect or download link.
- [ ] `form.gravity_form_id` ACF field is the new form's ID.
- [ ] `form.guide_pdf` uploaded — open the PDF link from the WP admin and verify it downloads.
- [ ] §8 cards: video URL filled in or card hidden if no video exists yet (don't ship a placeholder URL to production).
- [ ] All 6 link destinations in the link matrix open the correct URL.
- [ ] Mobile preview: hero buttons stack, form is reachable, sticky CTA (if implemented) appears after the hero.
- [ ] Page indexed (or noindex'd intentionally — for paid campaigns, sometimes you want noindex to keep the URL clean).
- [ ] Add the guide to a "Resources" archive page so the CPT actually surfaces somewhere on the site.

---

## What changes between campaigns vs what stays

**Always changes (per campaign):**
- All ACF text fields
- Guide cover (title accent, body, page count)
- §4 cards' icons & content
- §5 outcome labels & body
- §6 stat values
- Gravity Form (new form, new ID, new feed)
- Guide PDF
- Page slug

**Almost never changes (template-locked):**
- Brand tokens, fonts, header & footer
- Section structure & order
- Section IDs (`#rpd-lm-form`, `#rpd-lm-next-steps`)
- Reusable section CSS classes
- §8 secondary-path destinations (walkthrough + diagnostic) — pulled from `theme_options`
- Trust-line phrasing on §1 and §7 (these are tested copy — change with intent, not by accident)

---

## File-level handoff manifest

The agency should deliver:

```
exports/
  rocketpd-lead-magnet.png                       full-page reference (this page)
  rocketpd-lead-magnet-copy.txt                  text-only copy (for proofing/QA)
  wordpress-build-notes-rocketpd-lead-magnet.md  this file
```

The WP dev should produce:

```
wp-content/themes/<salient-child>/
  single-lead_magnet.php
  template-parts/lead-magnet/
    hero.php
    cover.php
    problem.php
    shift.php
    learn.php
    outcomes.php
    proof.php
    form.php
    next-steps.php
    footer-cta.php
  assets/
    css/lead-magnet.css       (the rpd-lm-* styles)
    img/grid-44.svg           (cover background pattern)
```

---

End of build notes.
