# RocketPD Reference Assets and Legacy Notes

## Purpose

This document explains how to use existing screenshots, build notes, and the production copy during the clean theme rebuild.

## Production copy

The server:

```text
rocketgoeshigh.sftp.wpengine.com
```

is a copy of RocketPD production.

Use it as the source/reference site for:

- Existing page content
- Media assets
- Current URLs
- Menus
- Forms
- SEO metadata
- Legacy layout behavior
- Current plugins and settings

Do not treat it as the destination architecture.

## Reference folders

Place reference files inside the clean theme docs folder:

```text
wp-content/themes/rocketpd/docs/reference/
  screenshots/
  build-notes/
  templates/
```

These files are for Codex/developer reference only. They should never be enqueued or rendered publicly.

## Required reference screenshots

Initial screenshots:

```text
rocketpd-homepage.png
rocketpd-about.png
rocketpd-community.png
rocketpd-contact.png
rocketpd-lead-magnet.png
rocketpd-trust-cycle-guide.png
rocketpd-launchpad.png
rocketpd-launchpad-plus.png
```

## Required legacy build notes

Initial legacy build notes:

```text
wordpress-build-notes.md
wordpress-build-notes-rocketpd-contact.md
wordpress-build-notes-rocketpd-lead-magnet.md
wordpress-build-notes-launchpad.md
wordpress-build-notes-launchpad-plus.md
```

## How to translate legacy notes

Old notes may say:

```text
WPBakery row
Salient button
Salient heading
Theme options custom CSS
Raw HTML element
```

New implementation should use:

```text
PHP template part
ACF field group
Reusable component partial
Scoped CSS file
Vanilla JS module when required
```

## How to use screenshots

Screenshots are visual QA references, not implementation instructions.

Use them to compare:

- Section order
- Spacing
- Hierarchy
- Color balance
- Card styling
- Image proportions
- Mobile stacking
- General visual feel

Do not use screenshots to invent undocumented behavior.

## How to use production assets

When pulling assets from production:

1. Download only what is needed.
2. Preserve useful filenames when possible.
3. Optimize large images.
4. Store theme-owned assets in `assets/img/`.
5. Leave media-library content in uploads if it belongs to editors.
6. Do not commit the entire uploads folder.

## Media handling

Commit to Git:

- Theme SVGs
- Pattern images
- Small icons
- Placeholder images
- Critical theme UI assets

Do not commit:

- Full uploads folder
- User-uploaded PDFs unless they are theme/reference docs
- Cache files
- Backups
- SQL dumps

## Legacy cleanup

During audit, identify:

- WPBakery pages still active
- Salient-specific shortcodes
- Theme option dependencies
- Custom CSS in the Customizer
- Code snippets
- Must-use plugins
- Gravity Forms
- ACF field groups
- Redirects
- SEO metadata

Record findings in:

```text
docs/build/legacy-audit.md
```

## Activation readiness

Before activating the new theme, confirm:

- Critical templates are built.
- Menus are mapped.
- ACF options are populated.
- Forms render.
- Global CSS/JS loads correctly.
- No fatal PHP errors.
- No broken public links.
- SEO metadata is preserved or migrated.
- Old WPBakery content is not needed for rebuilt pages.
