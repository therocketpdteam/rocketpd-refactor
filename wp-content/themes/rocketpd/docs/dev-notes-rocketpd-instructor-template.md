# RocketPD — Individual Instructor Page (Kim Marshall — template)

**Page purpose:** "Thought Leader Knowledge Hub" — the deep-dive page for a single RocketPD instructor. Kim Marshall is the worked example; this is the template every other instructor will use.

**Route (mockup):** `/__mockup/preview/rocketpd-instructor-kim-marshall/Home`
**Source file:** `artifacts/mockup-sandbox/src/components/mockups/rocketpd-instructor-kim-marshall/Home.tsx`
**Reference PNG:** `exports/RocketPD/Page Images/rocketpd-instructor-kim-marshall.jpg`

---

## Page structure (top → bottom)

1. **Sticky white header** — same shell as the Instructors directory; `Instructors` nav item active.
2. **Breadcrumb bar** — `RocketPD / Instructors / Kim Marshall` (lavender bg, navy text, magenta current).
3. **Hero** (lavender gradient, 5/7-col split):
   - Left (5): "RocketPD Instructor · Featured Expert" eyebrow → H1 "Kim Marshall" (Poppins, navy) → magenta authority headline → 4 topic-tag pills → gold "Explore Free Resources" + outline "View Professional Learning" CTAs → "FOLLOW KIM" with LinkedIn / Twitter / Globe icons.
   - Right (7): rounded portrait with floating gold "30+ years" award pill (top-right) and overlapping white stats card at bottom (3 stats: 30+ Years in Education / 10K+ Marshall Memo Readers / 850+ Districts Reached).
4. **"Why educators learn from Kim"** authority section (5/7 split, white bg):
   - Left: AUTHORITY POSITIONING eyebrow + H2 (Poppins).
   - Right: 2-paragraph bio + "HIS WORK FOCUSES ON" 6-item grid (2 columns) of CheckCircle2-prefixed focus areas.
5. **"Start exploring Kim's work — free."** Free Resources block (light-lavender bg). Each block reads its data from the `KIM` object and **conditionally renders** based on an `enabled: boolean` flag — turning blocks off is a one-line CMS toggle.
   - **A. Featured Guide** (`KIM.guide.enabled`): Half-bleed purple card. Left = book icon + "FEATURED GUIDE · FREE" eyebrow + Poppins title + meta. Right = white panel with summary + 3 deliverable bullets + gold "Get the Free Guide" + outline "Preview a sample chapter" CTAs (both link to `KIM.guide.href`, target `_blank`).
   - **B + C. Podcast & Webinar** (`KIM.podcast.enabled` + `KIM.webinar.enabled`): two-up grid. Each card: real YouTube embed via `<YouTubeEmbed id={embedId}>` + magenta/purple eyebrow + title + summary + meta + "Listen on YouTube" / "Watch the webinar" external link. Embed IDs in mock: `AME1I5sUJFQ` (podcast), `wIV-j4nt_ms` (webinar).
   - **D. Blog** (`KIM.blog.enabled`): 2-up grid of article cards (real "Rethinking Teacher Evaluation: 3 Keys" article + dashed "More articles coming soon" placeholder card). Each card: category eyebrow + Poppins title + excerpt + meta + "Read article" external link.
6. **"Work with Kim through RocketPD"** Professional Learning offerings (3-column):
   - Left: **LaunchPad** ($49 self-paced) — outline "Learn More" CTA → `KIM.offerings.launchpad.href`.
   - Middle: **Live-Virtual Cohort** ($750) — translated up `md:-translate-y-4`, "MOST POPULAR" magenta badge, gold "Register for Cohort" CTA → `KIM.offerings.cohort.href`.
   - Right: **Custom District Workshop** (Inquire) — outline "Request a Quote" CTA → `KIM.offerings.workshop.href`.
7. **Community trust split** (white bg, 5/7-col):
   - Left: Dave Baugh testimonial in navy `#231F58` card with quote + attribution.
   - Right: 3 stat tiles in a 3-up grid (12K+ educators trained / 98% would recommend / 4.9 average rating).
8. **"Related experts you might explore"** — 3-up grid (Dr. Catlin Tucker, Eric Sheninger, George Couros). Same card shape as directory but compact (no format icon row).
9. **AEO-optimized FAQ** (5/7 split):
   - Left (5): "FAQ" eyebrow + H2 + 1-line subhead with link to RocketPD team.
   - Right (7): Custom `<FaqItem>` accordion (4 Q&A pairs, first open by default). Each toggle exposes `aria-expanded` + `aria-controls`; panels are `role="region"` with `aria-labelledby`. Designed for transcript-ready / AI-readable surfacing.
10. **Final CTA band** — gradient navy with blurred orbs, "Bring Kim's work to your district" headline, gold + outline-white CTAs.
11. **Footer** — `#1a1744` dark, same shell as directory.

## Data contract (`KIM` object — the per-instructor CMS contract)

```ts
const KIM = {
  name: "Kim Marshall",
  // ...hero fields: authority, tags, stats, headshot, follow URLs

  guide: {
    enabled: boolean,      // toggle the entire Featured Guide block
    title, summary, meta, href, deliverables: string[]
  },

  podcast: {
    enabled: boolean,
    title, summary, meta, embedId, href
  },

  webinar: {
    enabled: boolean,
    title, summary, meta, embedId, href
  },

  blog: {
    enabled: boolean,
    posts: [{ title, category, excerpt, meta, href }, ...]
  },

  playbook: { enabled, ... }, // reserved for future block

  offerings: {
    launchpad: { enabled, title, price, bullets: string[], href },
    cohort:    { enabled, title, price, bullets: string[], href },
    workshop:  { enabled, title, price, bullets: string[], href }
  },

  faqs: [{ q, a }, ...],
  relatedExperts: [{ name, title, headshot, href }, ...],
}
```

**This is the contract every future instructor page satisfies.** Adding A.J. Juliani or Dr. Luvelle Brown means filling out the same shape — no design work.

## Brand tokens

Identical to the directory page (see `dev-notes-rocketpd-instructors-directory.md`). Locked palette: navy `#231F58` / `#1a1744`, purple `#5552b1` / `#a154a1`, gold `#fdb933`, lavender `#c4c4e5`, Poppins headings + Inter body.

## Production notes / open items

- **All resource blocks are conditional** — set `.enabled = false` on guide / podcast / webinar / blog / any offering and that section disappears from the page. Layout self-heals (e.g. if podcast is off, webinar takes the full row).
- **YouTube embeds** load lazily via `<iframe loading="lazy">`. No tracking pixel beyond YouTube's own.
- **Hero portrait:** currently `rocketpd.com/wp-content/uploads/2024/04/kim-marshall-...jpg`. Migrate to local assets per project asset strategy if needed.
- **Authority paragraphs** are intentionally explanatory + entity-rich (Marshall Memo, Boston principal, etc.) for AI search surfacing (AEO).
- **CTAs are wired to data URLs** via shadcn `Button asChild` + `<a target="_blank" rel="noopener noreferrer">`. The CMS contract drives behavior, not just copy.

## Accessibility

- FAQ accordion buttons expose `aria-expanded` + `aria-controls`; panels carry `role="region"` + `aria-labelledby`.
- Decorative icons (chevrons, sparkles, check circles) use `aria-hidden="true"`.
- All YouTube iframes have descriptive `title` attributes.
- Strong H1 → H2 → H3 → H4 hierarchy throughout (no skipped levels).
- Topic-tag pills inside the hero use the same `rounded-full` pill style as the directory for visual consistency.

## Reuses / shares with

- Same brand shell as `rocketpd-instructors/Home.tsx` (header, footer, navy CTA band).
- Standalone — does NOT import from any `_shared.tsx`. Three local helpers live in this file: `<YouTubeEmbed>`, `<FaqItem>`, and the `KIM` data const.

## How to add a new instructor (interim, pre-CMS)

1. Copy `rocketpd-instructor-kim-marshall/` to `rocketpd-instructor-{slug}/`.
2. Replace the `KIM` const with the new instructor's data (same shape).
3. Toggle `enabled` flags off for any blocks that don't apply.
4. Update `relatedExperts` to point to 3 different colleagues.
5. The mock will auto-discover at `/__mockup/preview/rocketpd-instructor-{slug}/Home` after a workflow restart.
