# RocketPD Clean Theme Architecture

## Purpose

This document defines the target architecture for the custom RocketPD WordPress theme.

The rebuild should not be implemented inside `salient-child`. Salient and WPBakery are legacy dependencies from the existing site and should be treated as reference only.

## Theme location

```text
wp-content/themes/rocketpd/
```

## Initial folder structure

```text
rocketpd/
  style.css
  functions.php
  screenshot.png

  assets/
    css/
      00-tokens.css
      01-base.css
      02-typography.css
      03-layout.css
      04-components.css
      05-forms.css
      06-header.css
      07-footer.css
      pages/
        home.css
        about.css
        community.css
        contact.css
        launchpad.css
        launchpad-plus.css
        lead-magnet.css
        resource.css
        blog.css
    js/
      main.js
      navigation.js
      accordions.js
      filters.js
      video-modal.js
    img/
      patterns/
      icons/
      placeholders/

  inc/
    setup.php
    enqueue.php
    acf.php
    acf-options.php
    post-types.php
    taxonomies.php
    helpers.php
    icons.php
    template-tags.php
    nav.php
    shortcodes.php
    gravity-forms.php

  acf-json/

  docs/
    brand/
    build/
    reference/
      screenshots/
      build-notes/
      templates/

  template-parts/
    global/
      header.php
      footer.php
      mobile-menu.php
      announcement-bar.php
    components/
      section-header.php
      button.php
      card.php
      lifted-card.php
      icon-chip.php
      testimonial-card.php
      resource-card.php
      comparison-table.php
      video-card.php
      faq-grid.php
      form-wrapper.php
      final-cta.php
    pages/
      home/
      about/
      community/
      contact/
      launchpad/
      launchpad-plus/
      lead-magnet/
      resources/

  page-templates/
    template-home.php
    template-about.php
    template-community.php
    template-contact.php
    template-launchpad.php
    template-launchpad-plus.php
    template-flexible-page.php

  archive-resource.php
  single-resource.php
  single-lead_magnet.php
  archive.php
  single.php
  page.php
  index.php
```

## Theme bootstrap

`functions.php` should be minimal and only load files from `inc/`.

Example pattern:

```php
<?php
/**
 * RocketPD Theme functions.
 */

$rocketpd_includes = [
  'setup',
  'enqueue',
  'acf',
  'acf-options',
  'post-types',
  'taxonomies',
  'helpers',
  'icons',
  'template-tags',
  'nav',
  'gravity-forms',
];

foreach ($rocketpd_includes as $file) {
  $path = get_template_directory() . '/inc/' . $file . '.php';
  if (file_exists($path)) {
    require_once $path;
  }
}
```

## CSS strategy

Do not put production CSS in the WordPress Customizer or page editors.

Use:

- Global token/base/component files for shared styles.
- Page-specific CSS files for complex page templates.
- Strict page body classes to prevent bleed.

Example enqueue structure:

```text
global:
  00-tokens.css
  01-base.css
  02-typography.css
  03-layout.css
  04-components.css
  05-forms.css
  06-header.css
  07-footer.css

conditional:
  pages/contact.css on Contact template
  pages/launchpad.css on LaunchPad template
  pages/launchpad-plus.css on LaunchPad+ template
  pages/lead-magnet.css on single lead_magnet
```

## JavaScript strategy

Use minimal vanilla JavaScript.

Use JS for:

- Mobile navigation
- Accordions/FAQ
- Resource filters
- Video modals
- Form enhancements only when necessary

Avoid:

- Heavy animation libraries
- DOM manipulation that duplicates rendered HTML
- Inline scripts in ACF fields
- Page-specific JS loaded globally

## ACF strategy

The site should be ACF-driven, not builder-driven.

Use:

- ACF Options Pages for global brand/contact/navigation/footer values.
- Page-level field groups for unique page templates.
- Flexible Content only where necessary.
- Repeaters for card grids, FAQs, stats, comparison rows, resource cards, and CTA collections.
- Local JSON in `acf-json/`.

Do not use WPBakery for new template layout.

## Template strategy

Build PHP templates and partials.

Preferred pattern:

```php
get_header();

while (have_posts()) {
  the_post();
  get_template_part('template-parts/pages/contact/hero');
  get_template_part('template-parts/pages/contact/doors');
  get_template_part('template-parts/pages/contact/jesse');
  get_template_part('template-parts/pages/contact/reach');
  get_template_part('template-parts/pages/contact/form');
  get_template_part('template-parts/pages/contact/faq');
  get_template_part('template-parts/pages/contact/final-cta');
}

get_footer();
```

## What not to do

Do not:

- Build new pages in WPBakery.
- Place new architecture in `salient-child`.
- Add production CSS to theme options.
- Hard-code content that belongs in ACF.
- Hard-code URLs that should be global options.
- Use screenshots as production substitutes for HTML/CSS interface mockups.
- Build all pages before QAing the first few sections.

## Migration posture

During the two-week rebuild, the old production copy remains a reference. The new theme is developed separately until the core pages and templates are ready for activation.
