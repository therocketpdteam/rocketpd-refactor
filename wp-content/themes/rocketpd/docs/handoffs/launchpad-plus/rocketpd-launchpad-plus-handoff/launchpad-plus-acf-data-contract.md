# LaunchPad+ — WordPress / ACF Data Contract & Asset Handoff

Deliverables **6** (ACF plan + fallbacks) and **7** (asset handoff). Every field has an
**approved default** so the page renders complete even when all ACF fields are empty.

---

## Field group setup

| Item | Value |
| --- | --- |
| **Field group name** | `LaunchPad+ Landing` |
| **JSON file** | `wp-content/themes/rocketpd/acf-json/group_launchpad_plus.json` |
| **Location rule** | Page Template `is equal to` `page-launchpad-plus.php` (or Page `is equal to` the LaunchPad+ page) |
| **Style** | Seamless (no metabox), grouped by section via ACF Tabs |

> Use ACF **local JSON** (`acf-json/`) so the field group is version-controlled in the
> theme. Do not create fields via the DB/admin only.

**Implementation rule for fallbacks:** every output uses
`$value = get_field('x') ?: 'DEFAULT';` (or `have_rows()` guarded by a hardcoded default
array). If a repeater is empty, render the default item set. Never emit an empty section,
empty heading, empty card, or empty button.

---

## Section field groups (tabs)

Each section tab below lists fields + the **approved default** = the exact mockup copy
(from the blueprint). Defaults are the source of truth; ACF only allows overrides.

### Tab: Hero (`hero_`)
| Field | Type | Default |
| --- | --- | --- |
| `hero_eyebrow` | text | `RocketPD LaunchPad+` |
| `hero_heading` | text | `LaunchPad+` (theme renders `+` in gold) |
| `hero_subheading` | text | `A Branded Professional Learning Platform for Your District` |
| `hero_body` | textarea | `Bring your district's professional learning into one place — combining RocketPD's expert-led content with your own resources inside a fully branded platform.` |
| `hero_primary_btn` | group (label,url) | label `Schedule a LaunchPad+ Demo`, url `#` → real demo URL |
| `hero_secondary_btn` | group (label,url) | label `Explore LaunchPad`, url = LaunchPad page |

The district browser/dashboard mock is **static markup** — not ACF.

### Tab: Intro / Gap (`gap_`)
| Field | Type | Default |
| --- | --- | --- |
| `gap_eyebrow` | text | `The Gap` |
| `gap_heading` | text | `When Professional Learning Needs More Than Access.` |
| `gap_body` | wysiwyg | the 3 paragraphs from blueprint §03 (3rd bold) |

Diagram = static markup.

### Tab: Platform Positioning (`pos_`)
| Field | Type | Default |
| --- | --- | --- |
| `pos_eyebrow` | text | `What It Is` |
| `pos_heading` | text | `A Central Platform for District Professional Learning.` |
| `pos_intro` | textarea | `LaunchPad+ gives districts a structured way to manage professional learning across their organization.` |
| `pos_cards` | repeater (icon, title, body) | 5 cards from blueprint §04 |
| `pos_closing` | wysiwyg | `All within a platform customized to reflect your district's brand and priorities.` |

### Tab: System Overview (`sys_`)
| Field | Type | Default |
| --- | --- | --- |
| `sys_eyebrow` | text | `How It's Organized` |
| `sys_heading` | text | `One Platform for Learning and Resources.` |
| `sys_intro` | textarea | `LaunchPad+ brings together the key components districts need to support professional learning.` |
| `sys_pillars` | repeater (name, icon, color, bullets[icon,text]) | 3 pillars from blueprint §05 |
| `sys_foundation` | text | `All in one branded LaunchPad+ platform — one place for staff to learn` |
| `sys_closing` | textarea | `This helps reduce fragmentation and keeps professional learning organized in one place.` |

### Tab: What's Included (`inc_`)
| Field | Type | Default |
| --- | --- | --- |
| `inc_eyebrow` | text | `What's Included` |
| `inc_heading` | text | `What LaunchPad+ Includes.` |
| `inc_cards` | repeater (icon, title, body, highlight) | 3 cards from blueprint §06 |

### Tab: Admin Visibility (`vis_`)
| Field | Type | Default |
| --- | --- | --- |
| `vis_eyebrow` | text | `Built for Leaders` |
| `vis_heading` | text | `Visibility Into Participation and Progress.` |
| `vis_body` | textarea | `LaunchPad+ provides district leaders with a clearer view of how professional learning is being used across the district.` |
| `vis_checklist` | repeater (icon, text) | 3 items from blueprint §07 |
| `vis_closing` | textarea | `This helps districts better manage and support professional learning over time.` |

Dashboard = static markup + inline SVG.

### Tab: Value / Outcomes (`val_`)
| Field | Type | Default |
| --- | --- | --- |
| `val_eyebrow` | text | `Why It Matters` |
| `val_heading` | text | `Designed to Support District Implementation.` |
| `val_intro` | textarea | `LaunchPad+ helps districts build a more consistent approach to educator development — not just deliver another tool.` |
| `val_cards` | repeater (icon, title) | 5 items from blueprint §08 |
| `val_closing` | textarea (italic) | `Rather than relying on one-time sessions, districts can build a more consistent approach to educator development.` |

### Tab: Creator's Package (`cre_`)
| Field | Type | Default |
| --- | --- | --- |
| `cre_eyebrow` | text | `Creator's Package` |
| `cre_heading` | text | `Create and Scale Your Own Professional Learning Content.` |
| `cre_body` | wysiwyg | the 2 paragraphs from blueprint §09 |
| `cre_checklist` | repeater (text) | 3 items §09 |
| `cre_card_title` | text | `Six-course district build` |
| `cre_card_rows` | repeater (icon, label) | 3 rows §09 |
| `cre_card_courses` | repeater (title) | 6 example titles §09 |
| `cre_card_note` | text | `Final scope and pricing tailored per district during onboarding.` |
| `cre_closing` | wysiwyg | `This allows districts to build a reusable library of professional learning aligned to their goals.` |

### Tab: Connected to RocketPD (`con_`)
| Field | Type | Default |
| --- | --- | --- |
| `con_eyebrow` | text | `Beyond the Platform` |
| `con_heading` | text | `Connected to RocketPD Learning Experiences.` |
| `con_intro` | textarea | `LaunchPad+ extends access to RocketPD's broader learning ecosystem.` |
| `con_cards` | repeater (icon, title, body) | 3 cards §10 |
| `con_closing` | textarea (italic) | `These experiences complement the platform and extend learning beyond asynchronous content.` |

### Tab: Comparison (`cmp_`)
| Field | Type | Default |
| --- | --- | --- |
| `cmp_eyebrow` | text | `How They Compare` |
| `cmp_heading` | text | `Start with LaunchPad. Expand with LaunchPad+.` |
| `cmp_body` | wysiwyg | the 2 paragraphs §11 |
| `cmp_button` | group (label,url) | label `Explore LaunchPad`, url = LaunchPad page |
| `cmp_col_a_label` | text | `LaunchPad` |
| `cmp_col_b_label` | text | `LaunchPad+` |
| `cmp_col_b_sublabel` | text | `Branded edition` |
| `cmp_rows` | repeater (capability, in_a bool, in_b bool) | 6 rows §11 |
| `cmp_footer_a` | text | `For districts that want immediate access to RocketPD's library` |
| `cmp_footer_b` | text | `For districts ready to centralize their entire PL environment` |

### Tab: Final CTA (`cta_`)
| Field | Type | Default |
| --- | --- | --- |
| `cta_eyebrow` | text | `Get Started` |
| `cta_heading` | text | `Build a More Organized Approach to Professional Learning.` |
| `cta_body` | textarea | `LaunchPad+ helps districts bring professional learning into one place — making it easier to access, manage, and sustain over time. Schedule a demo to see how LaunchPad+ can support your team.` |
| `cta_button` | group (label,url) | label `Schedule a LaunchPad+ Demo`, url → real demo URL |

---

## Icon field convention

Icons are lucide glyphs. Use an ACF **select** (or text) whose value maps to an inline
SVG partial: e.g. value `library` → `get_template_part('template-parts/launchpad-plus/icon', null, ['name'=>'library'])`. Ship an `icons.php` map covering the glyph list in the
design-tokens doc. Default each repeater row's icon to the mockup's icon for that position.

---

## Button rendering rule (no empty hrefs)

```php
$btn = get_field('cta_button') ?: ['label' => 'Schedule a LaunchPad+ Demo', 'url' => '#'];
if ( ! empty($btn['label']) && ! empty($btn['url']) ) {
    printf('<a class="lpp-btn lpp-btn--gold" href="%s">%s</a>',
        esc_url($btn['url']), esc_html($btn['label']));
}
```

Never print a button when either label or url is missing.

---

## 7. Asset Handoff

| Visual | Type | Action | Export size | Alt text |
| --- | --- | --- | --- | --- |
| RocketPD logo (header/footer) | **Real PNG** | Use theme's existing logo; no new export needed | native (display 36–44px tall) | `RocketPD` |
| Hero district dashboard | **CSS/HTML mock** | Build in markup — do **not** export as flat image | — | decorative (`aria-hidden`) |
| Intro "fragmented → unified" diagram | **CSS/HTML mock** | Build in markup | — | decorative |
| Admin analytics dashboard (KPIs, bars, donut, table) | **CSS/HTML + inline SVG** | Build in markup; donut is inline `<svg>` | — | decorative |
| Creator "Example Package" card | **CSS/HTML mock** | Build in markup | — | decorative |
| Comparison ✓ / ✗ marks | **lucide SVG icons** | Inline SVG + sr-only text | 20px | "Included" / "Not included" |
| Section/card glyphs | **lucide SVG icons** | Inline SVG | 13–26px | decorative (`aria-hidden`) |
| Gradient orbs / grid overlay | **CSS only** | Pure CSS (gradients + blur) | — | decorative |
| District avatars (RU/RPD tiles) | **CSS colored boxes** | Build with bg-color + initials | — | decorative |

**Bottom line:** the only real raster asset is the RocketPD logo. Everything else is
recreated in HTML/CSS/SVG — there are **no flat images to export** from this page. This
keeps the page light, crisp at all DPIs, and fully editable in the theme.
