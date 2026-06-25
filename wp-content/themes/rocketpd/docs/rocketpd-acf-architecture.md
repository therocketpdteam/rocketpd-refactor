# RocketPD ACF Architecture

## Purpose

This document defines how ACF should power the clean RocketPD theme.

The goal is that non-developers can update page copy, cards, CTAs, resource content, and repeating content without touching PHP or CSS.

## ACF principles

1. Every major template has a dedicated ACF field group.
2. Each page field group is organized by section tabs.
3. Repeatable visual patterns use repeaters or cloned reusable field groups.
4. Global values live in ACF Options Pages.
5. ACF local JSON is enabled and committed to the repo.
6. No HTML-heavy WYSIWYG fields unless controlled formatting is required.
7. No layout styling fields unless the component truly requires them.

## Options pages

Create these ACF Options Pages:

```text
RocketPD Global
RocketPD Header
RocketPD Footer
RocketPD Contact & CTAs
RocketPD Social
RocketPD Integrations
```

## Global option fields

### RocketPD Contact & CTAs

```text
rpd_phone_display
rpd_phone_tel
rpd_general_email
rpd_support_email
rpd_jesse_schedule_url
rpd_community_signup_url
rpd_diagnostic_url
rpd_walkthrough_url
rpd_address_line_1
rpd_address_line_2
rpd_city_state_zip
```

### RocketPD Header

```text
rpd_logo
rpd_logo_alt
rpd_primary_nav_cta_label
rpd_primary_nav_cta_url
rpd_login_label
rpd_login_url
```

### RocketPD Footer

```text
rpd_footer_logo
rpd_footer_description
rpd_footer_columns repeater
rpd_footer_social_links repeater
rpd_footer_copyright
```

## Reusable field groups

Create cloneable groups for:

### Button

```text
label
url
style: gold | purple | outline-purple | outline-white | ghost
opens_new_tab
```

### Section header

```text
eyebrow
headline
body
alignment: left | center
theme: light | dark
```

### Icon card

```text
icon
title
body
cta_label
cta_url
style
```

### Media

```text
image
image_alt
caption
```

### FAQ item

```text
question
answer
```

### Comparison row

```text
label
column_1_included
column_2_included
notes
```

## Page-level field groups

Initial page-level groups:

```text
RocketPD Home
RocketPD About
RocketPD Community
RocketPD Contact
RocketPD LaunchPad
RocketPD LaunchPad Plus
RocketPD Lead Magnet
RocketPD Trust Cycle Guide
RocketPD Flexible Page
```

## Custom post types

Initial CPTs:

```text
lead_magnet
resource
instructor
testimonial
partner
```

Potential later CPTs:

```text
event
course
cohort
podcast
```

Do not create unnecessary CPTs until the content audit confirms need.

## ACF local JSON

Enable local JSON:

```php
add_filter('acf/settings/save_json', function () {
  return get_template_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
  $paths[] = get_template_directory() . '/acf-json';
  return $paths;
});
```

## Template content rules

Use ACF for:

- Editable copy
- Section cards
- CTA labels and URLs
- Stats
- FAQs
- Logos
- Resource metadata
- Guide PDFs
- Form IDs
- Reusable link destinations

Use PHP constants/components for:

- Structural wrappers
- CSS classes
- Accessibility logic
- Icon rendering
- Fallback behavior
- Section ordering for fixed templates

## When to use Flexible Content

Use Flexible Content for generic content pages only.

Do not use Flexible Content for fixed high-design templates like:

- Home
- Contact
- LaunchPad
- LaunchPad+
- Lead Magnet

Those pages should use fixed ACF groups and fixed PHP templates for reliable QA.

## WYSIWYG rules

Allowed WYSIWYG uses:

- Limited formatted body copy
- Legal/disclaimer copy
- FAQ answers
- One-off rich text sections

Avoid WYSIWYG for:

- Headlines
- Button labels
- Cards
- Comparison tables
- Structured content
- Image placement

## Three-state section mode

CPT templates and index page templates use a three-state `select` field at the top of each tab to control how a section renders. This replaces boolean show/hide toggles with a more flexible model.

### States

- **`hidden`** — skip the section entirely (no template part is loaded)
- **`defaults`** — render the section using hardcoded PHP fallback content (no ACF data required)
- **`custom`** — render the section using the ACF fields in that tab

### Implementation

Each tab gets a `select` field named `rpd_{post_type}_{section}_mode` with those three choices. All content fields in the tab get conditional logic so they only appear in the editor when mode is `custom`:

```json
"conditional_logic": [[{ "field": "field_rpd_cd_hero_mode", "operator": "==", "value": "custom" }]]
```

The PHP template reads each mode field and gates the `get_template_part()` call:

```php
$hero_mode = rocketpd_get_field( 'rpd_course_hero_mode', 'custom' );
if ( 'hidden' !== $hero_mode ) {
    get_template_part( 'template-parts/pages/course-detail/hero' );
}
```

Each template part checks `$mode === 'defaults'` vs `$mode === 'custom'` internally to decide whether to use fallback content or ACF fields.

### Default value strategy

The correct `default_value` depends on the template type:

- **Index page templates** → `"default_value": "defaults"` — sections display hardcoded fallback data that is already accurate; no per-post ACF data needed
- **Individual CPT templates** (course detail, instructor detail) → `"default_value": "custom"` — posts were built with saved ACF data before three-state mode was introduced; `custom` preserves existing content; editors on new posts can opt into `defaults`

## Fallback behavior

Every template should handle empty optional fields gracefully.

Rules:

- If optional CTA URL is empty, do not render the button.
- If optional image is empty, render no image unless a placeholder is intentionally specified.
- If a repeater is empty, do not render the section unless it is critical.
- If a global URL is missing, surface a visible admin-only warning in development, not a broken public link.

## Admin editing experience

Each field group should include:

- Tabs per section
- Clear field instructions
- Character guidance for fragile fields
- Default values where useful
- Min/max row counts for fixed design sections
- Required fields only when truly required

## Production safety

Before launch:

- Export/sync all ACF JSON.
- Confirm all global options are filled.
- Confirm no production page depends on WPBakery content.
- Confirm no new theme template reads from Salient theme options.
