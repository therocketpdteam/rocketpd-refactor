# RocketPD — Global Courses & Learning Experiences (Gallery)

**Page purpose:** Replaces the legacy `/cohorts/` page. Unified marketplace where educators discover the right RocketPD learning experience by **format** (Free Webinar / Self-Paced / Live Cohort), **topic**, **instructor**, and **audience**.

**Route (mockup):** `/__mockup/preview/rocketpd-courses/Home`
**Source file:** `artifacts/mockup-sandbox/src/components/mockups/rocketpd-courses/Home.tsx`
**Reference PNG:** `exports/RocketPD/Page Images/rocketpd-courses-gallery.jpg`

---

## Page structure (top → bottom)

1. **Sticky white header** — RocketPD logo + nav (Topics / Instructors / **Courses** active / Solutions / About) + Login + gold "Join the Community" CTA. Active nav uses `text-[#a154a1] border-b-2 border-[#a154a1]`.
2. **Hero** (white→lavender soft gradient with blue + magenta blurred orbs):
   - Left: "Courses & Learning Experiences" eyebrow → H1 "Expert-Led K-12 Professional Learning, Built Around the Way Educators Actually Learn." (Poppins, navy, gradient `#5552b1 → blue-500` accent on the second clause) → subhead → gold "Browse Courses" + outline "Explore Free Webinars" CTAs → trust strip (18+ instructors / 40K+ educators / 850+ districts).
   - Right: 3 floating modular `<FloatingCard>` previews (Kim self-paced, Eric Sheninger cohort, Kim webinar) at staggered rotations + dot-grid background. Cards reuse the same data shape as the gallery — `aria-hidden`.
3. **"Choose your learning format"** (3-card section, white bg):
   - Free Webinars (emerald accent, "Free" badge, "Watch Free Webinars" CTA).
   - Self-Paced Courses (gold accent, "$49 / course" badge, "Browse Self-Paced Courses" CTA, **translated up + ringed as Most Popular**).
   - Live-Virtual Cohorts (blue accent, "Starting at $295 / person" badge, "View Live Cohorts" CTA).
4. **Filterable Learning Gallery** (light `#f8f8fc` bg):
   - **Filter card** (white, `rounded-2xl`, shadow): search input + 4 format pills (All Formats / Free Webinar / Self-Paced / Live Cohort) + 3 dropdowns (Topic / Instructor / Audience).
   - **Active filter status row** appears only when `activeFilterCount > 0`: shows "N courses matching X filters" + "Clear all" button.
   - **Course grid** (`sm:grid-cols-2 lg:grid-cols-3`, gap-6) of filtered `CourseCard` components.
   - **Auto-grouping when "All Formats" is selected:** the grid splits into 3 labelled sections — `Free Webinars · N` (emerald), `Self-Paced Courses · N` (gold), `Live-Virtual Cohorts · N` (blue). Each header shows a format-color icon, count, and one-line subtitle ("On-demand expert conversations…", "Expert-led video modules + workbook…", "Multi-session live programs…"). Other filters (search/topic/instructor/audience) still apply within groups. Empty groups are hidden. When a single format pill is active, the grid renders flat (no group headers).
   - **Empty state** when zero matches: dashed-border lavender card with "No courses match" + Clear all button.
5. **"Not sure where to start?"** Decision Guide (3 color-coded cards on white bg) — emerald/gold/blue accent stripes match format palette. Each card carries an icon, eyebrow ("Choose a Webinar if"), copy, and "Time commitment" meta.
6. **District CTA** (gradient navy `#231F58 → #2c2870 → #1a1744` with blue + magenta blurred orbs):
   - Left (7-col): "Want to bring RocketPD to your school or district?" + 2 CTAs (gold "Talk With RocketPD" + outline-white "See District Pricing").
   - Right (5-col): 2×2 perk grid (Unlimited team access / Certificates / Custom cohort scheduling / Dedicated success partner) — each in glassmorphic `bg-white/5` `rounded-2xl` card with gold icons.
7. **Footer** — `#1a1744` dark, 4-col link grid (Learn / Explore / Company / brand block) — same shell as the instructor pages.

## Format differentiation system (instant visual signal)

Every `CourseCard` reads its format **at a glance**, not just by reading the badge text. Five reinforcing signals — all driven from the single `FORMAT_META` record — keep the rules consistent across the whole gallery:

1. **4px solid top accent bar** in the format color (`emerald-500` / `#fdb933` / `blue-500`) — instant peripheral-vision grouping.
2. **Large translucent format glyph centered on the image** (~56px, white at 85% with drop-shadow over a soft black scrim): `<PlayCircle>` for webinar, `<Layers>` for self-paced, `<Calendar>` for cohort. Scales on hover with the image.
3. **Format-colored meta pill bottom-left of the image** carrying `course.meta` (e.g. "Webinar · 56 min · On-demand", "5 modules · 1 hour · Workbook included", "8 live sessions · Starts Jan 15"). Emerald/gold/blue background matches the accent bar.
4. **Format badge top-left + price chip top-right** (preserved from the prior design).
5. **Format-specific CTA verb** in the card footer (replaces the old shared "View Course"): **"Watch Free →"** (emerald), **"Start Course →"** (gold), **"Reserve a Seat →"** (blue). Arrow color is also format-tinted.

Combined with the auto-grouping in the gallery (3 labelled sections when "All Formats" is selected), the user can identify a webinar / course / cohort from across the page, not just by reading the small badge.

## Data contracts

```ts
type FormatKey = "webinar" | "self-paced" | "cohort";

type Course = {
  slug, title, instructor, instructorSlug, headshot, image, format,
  price,                 // display string ("Free", "$49", "$795/person")
  priceTier?,            // 3 | 5 | 8 — cohort sessions when applicable
  topic,
  audiences: string[],   // multi-tag
  description, meta, href
};
```

`COURSES` is a 12-row hardcoded const that demonstrates: 4 free webinars, 6 self-paced courses, and 2 live cohorts (incl. Kim's 8-session $795 cohort — the only 8-session in the system). All instructor headshots and course images reference live `rocketpd.com /wp-content/uploads/` URLs.

`FORMAT_META` (single source of truth for format styling):
- **Free Webinar** → emerald (`bg-emerald-50`, `text-emerald-700`, `bg-emerald-500` dot)
- **Self-Paced Course** → gold (`bg-[#fdb933]/15`, `text-[#8a5a00]`, `bg-[#fdb933]` dot)
- **Live-Virtual Cohort** → blue (`bg-blue-50`, `text-blue-700`, `bg-blue-500` dot)

Both course pages (gallery + detail) consume this map — change once, propagates everywhere.

## Filter logic

Single `useMemo` on `(format, topic, audience, instructor, query)`:
- format: exact match against `c.format` (or `"all"`)
- topic: exact match against `c.topic` (or `"All Topics"`)
- audience: `c.audiences.includes(audience)` (or `"All Audiences"`)
- instructor: exact name match (or `"All Instructors"`)
- query: lowercase substring match across title + instructor + topic + description

`clearFilters()` resets all 5 + clears search input. `activeFilterCount` drives the status banner + counts every dimension that's been narrowed away from default.

## Brand evolution (modern-SaaS refinement)

The locked RocketPD palette is preserved (navy `#231F58`, gold `#fdb933`, purple `#5552b1`/`#a154a1`, lavender `#c4c4e5`). New additions:
- **Blue accent** `#3b82f6` (Tailwind blue-500): used in soft radial gradient orbs, Live Cohort format coding, gradient text on "Built Around the Way Educators Actually Learn", numbered outcome cards, and decorative dot strokes.
- **`rounded-2xl` everywhere**: cards, buttons-as-pills, format chips. No square corners.
- **Soft layered gradients**: `from-white via-[#f5f4fb] to-[#ecebf6]` for the hero bg, `from-[#231F58] via-[#2c2870] to-[#1a1744]` for the navy CTA band, `from-[#5552b1] to-blue-500` for the H1 accent and outcome-number pills.
- **Generous py-24 sections** on white/light backgrounds — more whitespace than the older RocketPD pages.

## Accessibility

- Filter pills + format pills expose `aria-pressed`.
- Search input has `<label>` + `htmlFor` (sr-only) + `type="search"`.
- All `<select>` filters have visible labels via `<label htmlFor>`.
- Decorative orbs/icons use `aria-hidden="true"`.
- Floating hero cards are `aria-hidden` (purely decorative — same data appears in the gallery below).
- Active nav uses `aria-current="page"`.

## Production notes / open items

- **CMS contract:** the `COURSE` shape above is what a future Course CMS endpoint should return. Adding a course = appending one object — no UI changes.
- **Routing:** course-card "View Course" links currently target `/courses/{slug}`. Wire to actual router once routes exist.
- **Course images:** Cards without a true course-art asset (most non-Kim courses) currently fall back to the instructor headshot zoomed-in. When real course-art assets exist, swap `course.image` to a `kim-marshall-video-course.png`-style asset.
- **Audience multi-select:** today the audience filter is single-select for simplicity. If product wants multi-select, swap `<select>` for a chip-based picker — the filter logic already calls `.includes(audience)` so it's a 2-line change.
- **Pagination:** Not yet implemented. With ~12 courses today the grid is fine; once the catalog grows past ~24, paginate or add infinite scroll.
- **SEO/Schema:** This is a category/marketplace page. Wire `BreadcrumbList` + `ItemList` (of `Course` schema entries) on the production build.

## Production implementation

Three-state section mode is **not currently implemented** on the Courses Gallery page. It was added in PR #38 and immediately reverted — the `group_rocketpd_courses.json` field group has no mode fields.

**Naming note:** "Courses" and "LaunchPad" are used interchangeably in this project's conversations. The **LaunchPad page** (`group_rocketpd_launchpad.json`) is a separate template — an index/landing page hybrid — and it **does** have full three-state mode implemented (11+ sections, all defaulting to `defaults`). Do not confuse the two.

## Reuses / shares with

- `FORMAT_META` constant + the hero floating-card visual language are reused on the course detail template (`rocketpd-course-kim-marshall/Home.tsx`).
- Header + Footer shells match `rocketpd-instructors/Home.tsx` and `rocketpd-instructor-kim-marshall/Home.tsx`.
- Standalone — does NOT import from any `_shared.tsx`.
