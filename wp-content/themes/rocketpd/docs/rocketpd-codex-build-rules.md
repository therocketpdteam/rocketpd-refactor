# RocketPD Codex Build Rules

## Primary directive

Build a clean custom WordPress theme named `rocketpd`.

Do not build new production architecture inside `salient-child`.

## Source of truth priority

1. Current user instructions
2. Clean theme docs in `wp-content/themes/rocketpd/docs/`
3. Reference build notes in `docs/reference/build-notes/`
4. Reference screenshots in `docs/reference/screenshots/`
5. Existing production site at `rocketgoeshigh.sftp.wpengine.com`
6. Legacy Salient/WPBakery implementation

## Legacy interpretation rule

If an old build note says:

- Salient row
- WPBakery structure
- Salient theme option
- child theme custom CSS
- shortcode inside WPBakery

Translate that into the clean theme equivalent:

- PHP template part
- ACF field group
- CSS component class
- global ACF option
- reusable component partial

## Hard rules

Do not:

- Modify `salient-child` unless explicitly asked.
- Activate the new theme unless explicitly asked.
- Build with WPBakery.
- Put production CSS in the Customizer or admin theme options.
- Use page-builder shortcodes in new templates.
- Hard-code editable copy.
- Hard-code global URLs/email addresses.
- Add heavy JS libraries without approval.
- Use screenshots as production substitutes for interface mockups.
- Continue building new sections when the current section has obvious desktop/mobile issues.

## Required workflow

For every task:

1. Read relevant docs.
2. Inspect existing files.
3. Identify the smallest safe implementation unit.
4. Make the change.
5. Run available checks.
6. Report changed files and what to review.

## Required report after each Codex task

Use this format:

```text
Completed:
- ...

Changed files:
- ...

Checks:
- ...

Needs review:
- ...

Next recommended task:
- ...
```

## CSS rules

- Use global token variables.
- Keep page-specific CSS scoped.
- Avoid `!important` unless fixing third-party legacy leakage.
- Prefer CSS Grid/Flexbox.
- Use responsive CSS from the start.
- Do not rely on editor-generated class names.

## PHP rules

- Escape output.
- Use `esc_html`, `esc_url`, `wp_kses_post`, `esc_attr`.
- Use `get_template_part()` for sections/components.
- Keep functions small.
- Put helper functions in `inc/helpers.php`.
- Put ACF setup in `inc/acf.php` and `inc/acf-options.php`.
- Put CPTs in `inc/post-types.php`.

## ACF rules

- Use local JSON.
- Add field instructions.
- Use tabs by page section.
- Use repeaters for card grids and structured lists.
- Use clone fields for buttons and section headers when helpful.
- Do not use WYSIWYG where plain text or textarea is safer.

## QA rules

Every template must be checked at:

- 1440px desktop
- 1280px desktop
- 768px tablet
- 414px mobile
- 375px mobile

At minimum, check:

- Header
- Footer
- Hero
- Forms
- Cards
- Tables
- Accordions
- CTA buttons
- Overflow
- Text contrast

## Commit rules

Commit after stable milestones:

- Theme scaffold
- Global foundation
- Header/footer
- Each completed page template
- Each major QA cleanup pass

Commit messages should be plain:

```text
Build RocketPD theme scaffold
Add RocketPD global design tokens
Build Contact page template
Add Lead Magnet CPT and template
```

## Stop conditions

Stop and report before continuing if:

- A required plugin is missing.
- ACF fields cannot be found or created.
- The current workspace is not the production copy or expected theme.
- A template depends on unknown content structure.
- A form routing decision is unclear.
- The implementation would require modifying production data.
