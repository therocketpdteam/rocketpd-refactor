# RocketPD — Instructors Directory (Global Hub)

**Page purpose:** Top-level discovery hub for RocketPD's network of K-12 thought leaders. Visitors land here, filter by topic or search by name, then click into individual instructor pages.

**Route (mockup):** `/__mockup/preview/rocketpd-instructors/Home`
**Source file:** `artifacts/mockup-sandbox/src/components/mockups/rocketpd-instructors/Home.tsx`
**Reference PNG:** `exports/RocketPD/Page Images/rocketpd-instructors-directory.jpg`

---

## Page structure (top → bottom)

1. **Sticky white header** — RocketPD logo + nav (Topics / **Instructors** active / Solutions / Resources / About) + Login + gold "Join the Community" CTA. Active nav uses `text-[#a154a1] border-b-2 border-[#a154a1] pb-1`.
2. **Hero** (lavender gradient, 2-col):
   - Left: "Trusted Expert Network" eyebrow pill, H1 "Learn From the Nation's Leading K-12 Experts" (Poppins, navy with magenta `Leading` accent), subhead, gold "Explore Experts" + outline "Browse by Topic" CTAs.
   - Right: 6-up rounded headshot collage (3×2) with a magenta ring on Kim's tile + floating "FEATURED THIS MONTH — Kim Marshall" pill below.
3. **Navy trust band** (`#231F58`) — three inline stats: 40,000+ educators · 850+ districts · 18+ nationally recognized experts.
4. **"Find the right expert for your challenge"** discovery section:
   - 14 topic filter chips driven by `useState` (`activeTopic`). "All Experts" is the default. Selected chip = navy fill + white text; unselected = white card + lavender border + magenta hover. Includes `aria-pressed` for screen readers.
   - Search input (currently visual-only — has `<label>` + `id` + `type="search"` for a11y; not yet wired to the filter array).
   - Filtered grid of 9 instructor cards (`sm:grid-cols-2 lg:grid-cols-3`, gap-6).
5. **Instructor card** — square headshot (`object-cover`), name (Poppins bold), authority statement, **transformation line** (sparkles icon + magenta one-liner — the conversion-driving promise), topic tag pills, "AVAILABLE FORMATS" row (Guide / Podcast / Webinar / LaunchPad / Cohort / Workshop icons), bottom-aligned "Explore [FirstName]" link. Card hover: shadow-md + image scale-105.
6. **"Multiple ways to learn"** ecosystem (3-column):
   - Left: "Free Resources" card (lavender icon).
   - Middle: "Flexible PL" card — translated up `md:-translate-y-4`, ringed `ring-2 ring-[#5552b1]`, "MOST POPULAR" badge.
   - Right: "Custom District" card.
7. **Social proof split** — 4 stat tiles (avg rating / district NPS / completion rate / hours of PL delivered) + Joe Baeta navy testimonial card with attribution.
8. **Final CTA band** — gradient navy with blurred orb backgrounds, "Find the right expert for your district" headline, gold + outline-white CTAs.
9. **Footer** — `#1a1744` dark, 4-column link list + RocketPD logo + legal row.

## Data contract (`INSTRUCTORS` array)

Each entry:
```ts
{
  slug: string;           // route segment, e.g. "kim-marshall"
  name: string;
  authority: string;      // 1-line positioning statement
  transformation: string; // 1-line outcome promise (sparkles row)
  tags: string[];         // topic chips — must match TOPICS array
  formats: FormatKey[];   // controls icon row
  headshot: string;       // hosted URL (currently rocketpd.com /wp-content/...)
  featured?: boolean;
}
```
The 9 instructors in the mockup: Kim Marshall, Dr. Luvelle Brown, Dr. Catlin Tucker, Eric Sheninger, Dr. John Spencer, Angela Watson, Matt Miller, Dr. Ross Greene, A.J. Juliani.

## Brand tokens (locked, do not change)

- Navy: `#231F58` (primary), `#1a1744` (footer)
- Purple: `#5552b1` (interactive), `#a154a1` (magenta accent + active nav)
- Gold: `#fdb933` (primary CTA)
- Lavender: `#c4c4e5` (borders), `#c4c4e5/40` (card borders)
- Body text: `#45417c`, supporting: `#7670b3`, deep body: `#343465`
- Fonts: Poppins (headings), Inter (body)
- Card border radius: shadcn `Card` default; chips & CTAs: `rounded-full`

## Production notes / open items

- **Search wiring:** input is a11y-labeled but not yet bound to a `searchQuery` state. Easy add when CMS data lands — combine with topic filter via `INSTRUCTORS.filter(i => matchesTopic && matchesQuery)`.
- **Headshots:** Currently reference live rocketpd.com hosted URLs. For production, either keep the same URLs (CDN-served) or migrate to local `attached_assets/instructors/` and update `headshot` paths.
- **Card CTA routing:** "Explore [Name]" currently uses an inert anchor. Wire to `/instructors/${slug}` once routing is in place.
- **No CMS today:** `INSTRUCTORS` is a hardcoded const. When the directory becomes CMS-driven, the same shape can be returned by an API endpoint with no UI changes.

## Accessibility

- Topic filter chips expose `aria-pressed`.
- Search input has explicit `<label htmlFor>` (sr-only) and `type="search"`.
- Decorative icons (Search, Sparkles) use `aria-hidden="true"`.
- All headshots have descriptive `alt` text.

## Reuses / shares with

- Visual system from `rocketpd-home/Home.tsx` (header, footer, navy CTA band patterns).
- Standalone — does NOT import from `idg-trust-cycle-guide/_shared.tsx` (single-file mock).
