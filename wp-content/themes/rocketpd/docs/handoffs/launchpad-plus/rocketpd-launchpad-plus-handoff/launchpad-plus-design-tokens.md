# LaunchPad+ — Design Tokens

Exact values pulled from the mockup. Translate these to scoped theme CSS (e.g. CSS
custom properties under a page wrapper like `.lpp`). Do not approximate colors.

---

## Colors

| Token | Hex | Usage |
| --- | --- | --- |
| Navy (primary) | `#231F58` | Headings, body base text, icon tiles, dark-section base |
| Mid-navy | `#343465` | Nav link text, gradient stop |
| Deep navy (hero/CTA top) | `#1a1744` | Hero/CTA gradient + footer bg |
| Darkest navy (hero/CTA top) | `#0f0d2e` | Hero/CTA gradient start |
| Gold (accent) | `#fdb933` | Primary buttons, `+` glyph, gold icon tiles, eyebrows on dark, ribbon |
| Purple | `#5552b1` | Pillar "Learning", LaunchPad column checks, chart bars, outline button |
| Magenta | `#a154a1` | Active nav, eyebrows on light, pillar "Resources", LaunchPad+ checks |
| Lavender | `#c4c4e5` | Borders (low-opacity), x-marks, lavender body text on dark |
| Body text | `#45417c` | Paragraph copy on light backgrounds |
| Muted | `#7670b3` | Captions, small labels, table secondary text |
| Soft blue | `#b6cfdc` | Footer body text |
| Off-white band | `#f8fafc` | Alternating section bands + inner tile fills |
| Light chrome | `#f1f1f5` | Browser-frame bar, table footer strip |
| Border grey | `#e4e4ea` / `#eee` | Inner card/tile borders, dividers |
| Success green | `#0d8f5a` / `#0d6b5a` | Positive trend text in dashboards |

**District demo palette (intentionally non-RocketPD — keep distinct):** primary `#0d6b5a`, primary-dark `#094c40`, accent `#e76f3c`. Used only inside the hero + intro mock UIs to read as "your district's brand."

**Red (problem accent, intro section only):** text `#a23e3e`, chip bg `#f1e5e5`, chip border `#e4d4d4`.

---

## Gradients

| Name | Definition |
| --- | --- |
| Hero / Final CTA bg | `linear-gradient(to bottom right, #0f0d2e, #1a1744, #231F58)` |
| Dark section bg (Included / Connected) | `linear-gradient(to bottom right, #231F58, #343465, #231F58)` |
| Foundation bar / table header | `linear-gradient(to right, #231F58, #343465)` |
| Pillar header strips | `linear-gradient(135deg, <pillarColor>, <pillarColor>dd)` |
| Value-card icon tile | `linear-gradient(to bottom right, #231F58, #5552b1)` |
| Creator package card | `linear-gradient(to bottom right, #1a1744, #231F58, #343465)` |
| District header bar | `linear-gradient(90deg, #094c40, #0d6b5a)` |
| Progress fill (hero) | `linear-gradient(90deg, #0d6b5a, #e76f3c)` |

**Grid overlay (hero + CTA):** two `linear-gradient` lines in `rgba(253,185,51,0.6)`, `background-size: 56px 56px`, opacity `.04–.06`.

**Blurred orbs:** large `rounded-full` divs with `blur-3xl`/`blur-[100px]`, gold `/10–/15`, purple `/20–/30`, magenta `/20` — purely decorative.

---

## Typography

- **Body font:** Inter. **Heading font:** Poppins. (Both already loaded in theme; ensure weights 400–800.)
- **Base text color:** `#231F58`; paragraph copy `#45417c`.

| Element | Size (desktop) | Weight | Notes |
| --- | --- | --- | --- |
| H1 (hero) | `text-5xl → 7xl` (clamp ~48–72px) | 800 extrabold | Poppins, `leading-[1.05]`, tracking-tight |
| Hero sub-headline | ~32px (`text-2xl → [32px]`) | 600 | Poppins, white/95 |
| H2 (section) | `text-3xl → [44px]` (~30–44px) | 700 bold | Poppins, `leading-[1.15]` |
| H2 (dark feature sections) | `text-4xl → 5xl` | 700 | Poppins |
| Card title | `text-base → xl` | 700 | Poppins |
| Body / lead | `text-lg` (18px) | 400 | Inter, `leading-relaxed` |
| Small body | `text-sm / text-base` | 400–500 | Inter |
| Eyebrow | `text-sm` (14px) | 600 | uppercase, `tracking-wider` |
| Badge / micro-label | 9–11px | 600–700 | uppercase, `tracking-wider` |

---

## Buttons

| Variant | Style |
| --- | --- |
| **Primary (gold)** | bg `#fdb933`, text `#231F58`, `font-semibold/bold`, no border, hover `bg/90`, shadow. Sizes: header default; hero/CTA `h-14 px-8/10`. Trailing `ArrowRight`. |
| **Outline (on dark)** | transparent, border `white/40`, white text, hover `bg-white/10`. |
| **Outline (purple, on light)** | border + text `#5552b1`, hover bg `#5552b1` + white text. |

Buttons in the mockup are visual `<button>`s. In WP render as `<a class="lpp-btn …">` when a URL exists; if no URL, **do not render** (no empty `href`).

---

## Cards, radius, shadow, borders

- **Card radius:** `rounded-2xl` (1rem) for primary cards/dashboards; `rounded-xl` (.75rem) inner panels; `rounded-lg` tiles; `rounded` mini-tiles.
- **Card border:** `1px` `#c4c4e5`/40 on light cards; `white/10` on dark cards; `#e4e4ea` on inner tiles.
- **Shadows:** `shadow-sm` (cards), `shadow-md` (hover lift), `shadow-lg` (tables/CTA button), `shadow-2xl` (browser/dashboard mockups), `shadow-xl` (floating accent cards).
- **Hover:** light cards `hover:shadow-md`; dark feature cards `hover:bg-white/[0.07]`.

---

## Spacing & layout

- **Section padding:** `py-24` standard; hero `pt-16 pb-24 lg:pt-24 lg:pb-32`; intro `py-20 lg:py-24`; footer `py-16`.
- **Container:** `mx-auto px-4 sm:px-6 lg:px-8`, content `max-w-7xl`; centered intros `max-w-3xl`.
- **Grid gaps:** feature/card grids `gap-4 / gap-5 / gap-6`; 2-col content grids `gap-12 lg:gap-16`; dashboard inner grids `gap-2 / gap-2.5 / gap-3`.
- **Intro block bottom margin:** `mb-14`; heading `mb-6`; eyebrow `mb-4`.

---

## Icons (lucide-react → inline SVG)

- **Default sizes:** section card glyphs `20–26px`; checklist/bullet `13–16px`; dashboard micro-icons `9–14px`; hero arrow `16–20px`.
- **Icon colors:** gold `#fdb933` on navy tiles; purple `#5552b1` on light tiles; white on gradient tiles.

**Icon-per-section map** (so Codex picks the right glyph):

| Section | Icons (in order) |
| --- | --- |
| Header | (gold) Schedule button — no icon |
| Hero | `Building2` (badge), `ArrowRight`, floating: `Globe`, `Layers`; dashboard: `FileText, BookOpen, Video, Folder` |
| Intro/Gap | `ArrowRight` (rotated); platform card: `Library, Folder, Award, Users2, BarChart3, Palette` |
| Platform positioning | `Library, Upload, Folder, Users2, BarChart3` |
| System overview | pillars `GraduationCap, BookOpen, Settings`; bullets `Library, Upload, Archive, FileText, Video, Folder, Users2, Eye, ClipboardCheck`; bar `Zap` |
| What's Included | `Palette, Library, Upload` + `Check` |
| Admin visibility | `BarChart3, Eye, TrendingUp`, `Calendar` |
| Value/Outcomes | `Library, Network, Workflow, Compass, BookOpen` |
| Creator's Package | `Check`, `Sparkles, Video, Building2, ShieldCheck` |
| Connected to RocketPD | `Users2, Sparkles, BookOpen` |
| Comparison | `ArrowRight, Check, X` |
| Final CTA | `ArrowRight` |

---

## Dark-section contrast rules

- On dark gradient sections: headings **white**, body **white/80** or lavender `#c4c4e5`, eyebrows **gold** `#fdb933`.
- Cards on dark: `bg-white/[0.04]` with `border-white/10`; icon tiles stay gold-on-navy or gold-filled.
- Never place navy `#231F58` text on a dark background; never place white text on the `#f8fafc` bands.
- Maintain ≥ 4.5:1 contrast for body text (see accessibility notes — a couple of micro-labels in the decorative dashboards fall below this but are non-essential UI illustration).
