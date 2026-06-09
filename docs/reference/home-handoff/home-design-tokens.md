# RocketPD Home — Design Tokens

Extracted from the mockup `Home.tsx`. Values are Tailwind utility classes resolved to
raw CSS. Use these as the canonical design variables for the WordPress build (map to
CSS custom properties / theme.json / ACF).

---

## Colors

| Token | Hex | Where used |
| --- | --- | --- |
| Navy (primary brand / headings) | `#231F58` | H1/H2 text, LaunchPad band bg, gold-button text, dark gradient stop |
| Navy (body/mid) | `#343465` | Stats bar bg, nav link text, gradient mid-stop, quote body text |
| Navy (footer darkest) | `#1a1744` | Footer background only |
| Gold (primary CTA) | `#fdb933` | Buttons, "FREE" pill, icon accents, stat icons |
| Gold (deep, gradient end) | `#f99d33` | Playbook card gradient, seal gradient |
| Gold (badge text, on tint) | `#92580d` | Resource-library badge text on gold tint |
| Purple (secondary) | `#5552b1` | Outline buttons, featured tier border, orbs, prices, icon tiles |
| Magenta (accent) | `#a154a1` | Hover color, checks, eyebrows, "Zero Cost.", quote/avatars |
| Magenta (light, gradient) | `#b467b4` | Podcast card gradient start |
| Lavender (light) | `#c4c4e5` | Borders, body text on navy, bullet/dividers |
| Muted purple-grey | `#7670b3` | Meta text, footnotes, eyebrow labels |
| Body text (default) | `#45417c` | Paragraph copy throughout |
| Soft blue (gradient tint) | `#b6cfdc` | Hero/section gradient tints, footer text |
| Off-white (section bg) | `#f8fafc` | Membership, social-proof, testimonial-card bg |
| White | `#ffffff` | Page bg, cards, header |
| Muted purple (helper) | `#7670b3` | Resource meta, district state codes |

> All tints written `color/NN` in the source are opacity modifiers, e.g. `#5552b1/10` =
> `#5552b1` at 10% alpha. Common alphas used: `/5 /10 /20 /30 /40 /60 /80 /90 /95`.

---

## Typography

- **Heading font:** **Poppins** (applied via `font-['Poppins']`) — used on all H1/H2/H3 display headings, prices, card titles.
- **Body font:** **Inter** (set on the page root `font-['Inter']`) — all body, nav, labels, lists.
- **Accent faces (social proof only):** `font-serif` and `font-sans` are deliberately mixed on endorser wordmarks and district names to simulate distinct logotypes. These are presentation-only, not brand fonts.

### Heading scale (Poppins)

| Element | Classes | Resolved (desktop) |
| --- | --- | --- |
| H1 (hero) | `text-5xl sm:text-6xl lg:text-7xl font-extrabold` leading `1.1` | up to 72px / 800 |
| H2 (section, large) | `text-4xl lg:text-5xl font-bold` | 36 → 48px / 700 |
| H2 (section, standard) | `text-4xl font-bold` | 36px / 700 |
| H3 (card title) | `text-xl font-bold` | 20px / 700 |
| H3 (partner / district headers) | `text-2xl md:text-[28px] font-bold` | 24–28px / 700 |
| H4 (footer column) | `font-bold` (base) | 16px / 700 white |

### Body / supporting scale (Inter)

| Element | Classes | Resolved |
| --- | --- | --- |
| Lead paragraph | `text-lg sm:text-xl` / `text-lg lg:text-xl` | 18–20px |
| Standard paragraph | `text-lg` | 18px |
| Card description | `text-[15px]` | 15px |
| Small / meta | `text-sm` `text-xs` `text-[11px]` | 14 / 12 / 11px |
| Eyebrow label | `text-xs`/`text-sm` `font-bold uppercase tracking-widest` | 12–14px, letter-spaced |
| Nav links | `text-[15px] font-medium` | 15px |

Line-height: headings tight (`leading-tight` / `leading-[1.1]` / `leading-snug`); body `leading-relaxed`.

---

## Buttons

| Variant | Style |
| --- | --- |
| **Primary (gold)** | `bg-[#fdb933]` text `#231F58` `font-semibold`/`font-bold`, no border, hover `#fdb933/90`, shadow on large. Heights: `h-14` hero/CTA, default in header. |
| **Outline (purple)** | transparent bg, `border-[#5552b1]` text `#5552b1`, hover `bg-[#5552b1]/5`, `font-semibold`. |
| **Outline (white, on dark)** | transparent, `border-white/30` text white, hover `bg-white/10`. |
| **Text link CTA** | inline gold `#fdb933` `font-bold` with `ArrowRight`; magenta `#a154a1` "Open →" / footer links. Hover animates gap/translate. |
| **Filter chip (active)** | `bg-[#231F58]` text white, `rounded-full`, `text-sm font-medium`. |
| **Filter chip (inactive)** | `bg-white` `border-[#c4c4e5]` text `#45417c`, hover border+text `#a154a1`. |

Button radius follows the shadcn `Button` default (rounded-md). Pills/chips use `rounded-full`.

---

## Border radius

| Token | Value | Use |
| --- | --- | --- |
| `rounded-md` | 6px | default buttons, footer logo chip |
| `rounded-xl` | 12px | icon tiles, floating mini-cards, inner image, district grid wrapper |
| `rounded-2xl` | 16px | **cards, images, CTA bars, partner card** (primary card radius) |
| `rounded-3xl` | 24px | LaunchPad glass image frame |
| `rounded-full` | pill | badges, chips, avatars, social icons, "Most Popular" tag |

---

## Shadows

| Token | Use |
| --- | --- |
| `shadow-sm` | header, default cards, badges |
| `shadow-md` | partner seal |
| `shadow-lg` | featured tier card, community-2 image, gold CTA button |
| `shadow-xl` | hero image, CTA bars |
| `shadow-2xl` | LaunchPad glass frame |
| custom | partner card `shadow-[0_8px_30px_-12px_rgba(35,31,88,0.15)]` (soft navy-tinted) |
| hover | resource cards gain `hover:shadow-xl` + `-translate-y-1` |

---

## Section spacing

- **Standard section vertical padding:** `py-24` (96px top & bottom).
- **Tighter bands:** stats bar `py-8`; social proof `py-20`; footer `py-16`.
- **Hero:** asymmetric `pt-20 pb-24` → `lg:pt-32 lg:pb-36`.
- **Inter-block spacing inside sections:** heading blocks use `mb-16` / `mb-12`; intra-card gaps `gap-6` / `gap-8` / `gap-10` / `gap-16`.
- **Container:** `container mx-auto` + horizontal padding `px-4 sm:px-6 lg:px-8` (16 → 24 → 32px). Constrained content uses `max-w-3xl` / `max-w-4xl` / `max-w-6xl` centered.

---

## Grid rules

| Section | Grid |
| --- | --- |
| Hero | `lg:grid-cols-2` (stack below lg) |
| Community value cards | `md:grid-cols-3` |
| LaunchPad band | `lg:grid-cols-2` |
| Membership tiers | `md:grid-cols-2 lg:grid-cols-4` |
| More Than PD | `md:grid-cols-2` (with order swap) |
| Resource cards | `md:grid-cols-2 lg:grid-cols-3` |
| Partner card | `md:grid-cols-12` (2 / 7 / 3 split) |
| District wall | `grid-cols-2 sm:grid-cols-3 lg:grid-cols-4` |
| Testimonials | `md:grid-cols-2 lg:grid-cols-3` (3rd card `md:hidden lg:block`) |
| Footer | `grid-cols-2 md:grid-cols-4 lg:grid-cols-5` |

---

## Responsive breakpoints (Tailwind defaults)

| Name | Min width |
| --- | --- |
| `sm` | 640px |
| `md` | 768px |
| `lg` | 1024px |
| `xl` | 1280px |

Design widths exported for QA: **1440, 1280, 1024, 768, 390, 375**.
Primary design width is **1440**. Major layout shifts happen at `md` (768) and `lg` (1024).

---

## Icon style

- **Library:** `lucide-react` — thin, rounded line icons. Default stroke; some use `strokeWidth={1.5}` (resource card icons) or `{2}` (partner seal).
- **Sizes:** nav/inline 16–24; card tiles 28; resource header icons 56; stat icons 20.
- **Treatment:** icons sit in soft tinted rounded tiles (`w-14 h-14 rounded-xl bg-COLOR/10`) or circles; color matches section accent. On dark gradients icons are white/95.
- Icons used: Users, Sparkles, Target, GraduationCap, BookOpen, Calendar, MessageCircle, ArrowRight, Check, Quote, PlayCircle, Headphones, Video, FileText, Clock, Award.

---

## Image treatment

- **Radius:** images are `rounded-2xl` (hero, community, partner) or `rounded-full` (avatars).
- **Aspect ratios:** hero `4/3` → `lg:16/9`; LaunchPad image `4/3`; community-2 `square` → `md:4/3`; avatars `48px` circle.
- **Fit:** `object-cover` for photos, `object-contain` for the logo.
- **Depth devices:** offset color block behind hero image (10% opacity); glass frame around LaunchPad image; floating white stat/cohort cards overlapping image corners (`hidden md:block`/`sm:block`).
- **Logo:** transparent PNG; on dark footer it sits on a white rounded chip so it remains legible.

---

## Gradient / orb / background treatments

| Treatment | Definition |
| --- | --- |
| Hero bg | `bg-gradient-to-br from-white via-[#b6cfdc]/10 to-[#c4c4e5]/20` |
| Value-cards bg | `bg-gradient-to-b from-[#b6cfdc]/10 to-white` |
| LaunchPad band | solid `#231F58` + orb: `#5552b1` 800px circle, `blur-[120px]` opacity 20%, top-right offset |
| Resource section | `from-white via-[#c4c4e5]/10 to-white` + 2 orbs: gold `/10` top-right, magenta `/10` bottom-left, 480px `blur-3xl` |
| Resource CTA bar | `from-[#231F58] via-[#343465] to-[#5552b1]` + gold radial highlight |
| Card gradient headers | per-card `bg-gradient-to-br` (see blueprint §9 table) + radial white highlight overlay |
| Final CTA | `from-[#343465] to-[#231F58]` + 2 orbs (`#5552b1` 30%, `#a154a1` 20%, `blur-[100–120px]`) |
| Partner accent strip | `from-[#a154a1] via-[#5552b1] to-[#fdb933]` 1px-tall top strip |
| Radial highlights | `bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.18),transparent_60%)]` over card headers |

> **Orbs are decorative only.** They live in `overflow-hidden` parents and must never
> introduce horizontal scroll or be focusable/interactive.
