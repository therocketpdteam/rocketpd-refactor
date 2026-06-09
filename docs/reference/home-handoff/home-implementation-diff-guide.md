# RocketPD Home — Implementation Diff Guide

A compact list of what commonly goes wrong when translating this mockup into
WordPress/PHP/ACF, with the correct target. Use this to pre-empt the most frequent
regressions before running the full QA checklist.

---

## 1. Section order & completeness

| Common mistake | Correct |
| --- | --- |
| Reusing the existing staging order | Match this package's order exactly (13 zones, see blueprint) |
| Dropping the **intro statement** ("Learning, Meet Doing.") | It's a standalone section — keep it |
| Merging the **resource CTA bar** into a separate section or dropping it | It lives at the bottom of the resource library section |
| Omitting one of the 3 trust sub-blocks (partner / endorsers / district wall) | All three render, in that order |
| Collapsing the stats bar into the hero | Separate full-width navy band |

## 2. Color fidelity

| Common mistake | Correct |
| --- | --- |
| Using one "navy" everywhere | Three distinct navies: `#231F58` (brand/LaunchPad), `#343465` (stats/mid), `#1a1744` (footer) |
| Flattening gradients to solid fills | Recreate every gradient + orb (see tokens doc) |
| Wrong gold | CTA gold is `#fdb933`; gradient-deep gold `#f99d33` |
| Making all checks one color | Featured tier uses **gold** checks; others **magenta** `#a154a1` |
| Hover color = navy | Hover/active is **magenta** `#a154a1` |

## 3. Typography

| Common mistake | Correct |
| --- | --- |
| Fonts not enqueued → fallback serif/sans | Load **Poppins** (headings) + **Inter** (body); verify no FOUT/CLS |
| Card titles promoted to h2 | Card titles are h3; only section titles are h2; one h1 (hero) |
| Single-color resource heading | "Zero Cost." must be magenta within the H2 |
| Losing letter-spacing on eyebrows | Eyebrows are `uppercase tracking-widest font-bold` |
| Straight-quoting / dropping em-dashes | Preserve exact copy incl. "—" and curly punctuation |

## 4. Featured pricing tier

| Common mistake | Correct |
| --- | --- |
| All 4 tiers identical | Tier 3 (LaunchPad District) is featured |
| Missing "Most Popular" badge | Pill badge straddles the top border, `#5552b1` bg |
| No raised position | `md:-translate-y-4` lift at md+ |
| Flat header | Featured header has `#5552b1/5` tint + bottom divider |
| 3 list items | Featured has **4** items + gold checks |

## 5. Responsive visibility (don't delete nodes)

| Common mistake | Correct |
| --- | --- |
| Deleting testimonial #3 to get 2 on tablet | Use `md:hidden lg:block` — it returns on desktop & mobile |
| Showing floating cards on mobile | Hero stat `hidden md:block`; cohort card `hidden sm:block` |
| Leaving desktop nav visible on mobile | `hidden md:flex`; **add a hamburger** (mockup has none) |
| Stats-bar bullets shown on mobile | `hidden sm:block` |

## 6. The order-swap section

| Common mistake | Correct |
| --- | --- |
| "More Than PD" image above text on mobile | Mobile order is **text first, then image** (`order-1/order-2` swap); desktop is image left |

## 7. "Logos" that are actually text

| Common mistake | Correct |
| --- | --- |
| Leaving endorser/district areas blank waiting for logo files | They are **styled text wordmarks** with mixed typefaces — render as text (or intentionally swap to real logo images) |
| Normalizing all to one font | Preserve the per-item varied fonts (serif/sans/Poppins, some italic/uppercase) |
| Dropping the 2-letter state codes on district tiles | Keep state code under each district name |

## 8. Images & media

| Common mistake | Correct |
| --- | --- |
| Wrong aspect ratios | Hero 4:3→16:9 (lg); LaunchPad 4:3; community-2 square→4:3 (md); avatars 48px circle |
| Stretching/`object-fill` | Use `object-cover` (photos), `object-contain` (logo) |
| Footer logo invisible on navy | Keep the white rounded chip behind it |
| Missing depth devices | Hero offset purple block; LaunchPad glass frame; floating overlap cards |
| Mixing avatar types | 2 colored **initials** circles (JB, MR) + 1 **photo** (Sarah Jenkins) |

## 9. Decorative orbs & overflow

| Common mistake | Correct |
| --- | --- |
| Orbs cause horizontal scroll | Parents must be `overflow-hidden`; orbs absolutely positioned, blurred |
| Orbs focusable / in tab order | Mark decorative layers `aria-hidden`, `pointer-events-none` |
| Radial card-header highlights dropped | Keep the subtle white radial overlay on gradient card headers |

## 10. CTAs & links

| Common mistake | Correct |
| --- | --- |
| Leaving `href="#"` placeholders live | Wire every CTA/nav/footer link to a real URL |
| LaunchPad CTA built as a filled button | It's a **gold text link with arrow**, not a button |
| Wrong button variants | Match gold-filled vs purple-outline vs white-outline per blueprint |
| Social glyphs with no label | `in / X / fb` need real icons + `aria-label` |

## 11. Dynamic / behavioral

| Common mistake | Correct |
| --- | --- |
| Hardcoding the footer year | Use `date('Y')` (dynamic) |
| Wiring chip filtering incorrectly | Mockup chips are visual only; if WP adds real filtering, "All" is the default active state |
| Hardcoding stat numbers in markup with no CMS field | Stats (40,000+, 850+, 178, 47 states, 120+, 600+, 24-state) should be editable |

## 12. Spacing & container

| Common mistake | Correct |
| --- | --- |
| Uniform padding on every band | Standard `py-24`; stats `py-8`; social proof `py-20`; footer `py-16` |
| Full-bleed content | Use the container + responsive `px-4/6/8`; constrain text blocks (`max-w-3xl` etc.) |
| Wrong card radius | Primary cards/images are `rounded-2xl` (16px) |
