# RocketPD First Codex Prompts

## Prompt 1: Audit current workspace

```text
We are beginning the RocketPD clean theme rebuild.

Important:
- The new theme must be a clean custom WordPress theme named `rocketpd`.
- Do not build inside `salient-child`.
- Do not modify production pages yet.
- Do not activate the new theme.

The production copy/reference server is:
rocketgoeshigh.sftp.wpengine.com

Task:
Audit the current VS Code workspace.

Look for:
- WordPress root
- wp-content/themes/
- active or existing themes
- salient-child
- plugins
- mu-plugins
- ACF local JSON
- Gravity Forms
- existing page templates
- existing custom CSS/JS
- uploads/media structure
- Git repo status

Create or update:
wp-content/themes/rocketpd/docs/build/workspace-audit.md

Report:
1. Whether this appears to be the RocketPD production copy.
2. Key files/folders present.
3. Expected files/folders missing.
4. Whether ACF local JSON exists.
5. Whether Gravity Forms appears installed.
6. Whether the workspace is a Git repo.
7. Files/folders that should be excluded from Git.
8. Risks before starting the clean theme.
Do not edit theme files yet.
```

## Prompt 2: Create clean theme scaffold

```text
Read:
wp-content/themes/rocketpd/docs/rocketpd-clean-theme-architecture.md
wp-content/themes/rocketpd/docs/rocketpd-codex-build-rules.md

Task:
Create the clean RocketPD theme scaffold at:

wp-content/themes/rocketpd/

Create the folder structure described in the architecture doc.

Create:
- style.css with a valid WordPress theme header for "RocketPD"
- functions.php with minimal include-loader
- inc/setup.php
- inc/enqueue.php
- inc/acf.php
- inc/acf-options.php
- inc/post-types.php
- inc/helpers.php
- inc/icons.php
- inc/template-tags.php
- inc/nav.php
- inc/gravity-forms.php
- assets/css/00-tokens.css
- assets/css/01-base.css
- assets/css/02-typography.css
- assets/css/03-layout.css
- assets/css/04-components.css
- assets/css/05-forms.css
- assets/css/06-header.css
- assets/css/07-footer.css
- assets/js/main.js
- placeholder index.php files where appropriate

Do not activate the theme.
Do not modify salient-child.
Do not build page templates yet.

After changes, report:
- Changed files
- Theme scaffold summary
- Any warnings
```

## Prompt 3: Add brand tokens and global CSS foundation

```text
Read:
wp-content/themes/rocketpd/docs/rocketpd-brand-system.md
wp-content/themes/rocketpd/docs/rocketpd-clean-theme-architecture.md

Task:
Implement the RocketPD global CSS foundation.

Update:
- assets/css/00-tokens.css
- assets/css/01-base.css
- assets/css/02-typography.css
- assets/css/03-layout.css
- assets/css/04-components.css
- assets/css/05-forms.css

Include:
- CSS custom properties
- base reset
- body typography
- heading typography
- container classes
- section spacing
- button classes
- card classes
- lifted-card pattern
- icon-chip classes
- section-header classes
- dark/light section utilities
- accessibility focus styles

Do not style a specific page yet.
Do not add page templates yet.

Report changed files and any assumptions.
```

## Prompt 4: Configure ACF foundation

```text
Read:
wp-content/themes/rocketpd/docs/rocketpd-acf-architecture.md

Task:
Implement the ACF foundation for the RocketPD clean theme.

Update:
- inc/acf.php
- inc/acf-options.php
- inc/post-types.php if needed

Add:
- ACF local JSON save/load paths
- ACF options pages:
  - RocketPD Global
  - RocketPD Header
  - RocketPD Footer
  - RocketPD Contact & CTAs
  - RocketPD Social
  - RocketPD Integrations

Register initial CPTs:
- lead_magnet
- resource
- instructor
- testimonial
- partner

Do not create all field groups yet unless using code-based ACF registration is already the chosen project pattern.
Do not activate the theme.

Report changed files, registered option pages, and registered CPTs.
```

## Prompt 5: Build header/footer shell

```text
Read:
wp-content/themes/rocketpd/docs/rocketpd-brand-system.md
wp-content/themes/rocketpd/docs/rocketpd-clean-theme-architecture.md
wp-content/themes/rocketpd/docs/rocketpd-acf-architecture.md

Task:
Build the global header and footer shell for the clean RocketPD theme.

Create/update:
- header.php
- footer.php
- template-parts/global/header.php
- template-parts/global/footer.php
- template-parts/global/mobile-menu.php
- assets/css/06-header.css
- assets/css/07-footer.css
- assets/js/navigation.js
- inc/nav.php
- inc/enqueue.php

Requirements:
- Accessible desktop nav
- Accessible mobile nav
- Header CTA from global option fallback
- Footer contact details from global options fallback
- Social links support
- No dependency on Salient
- No dependency on WPBakery

Do not build page templates yet.

Report changed files and what should be checked in browser.
```

## Prompt 6: Build Contact page first section only

```text
Read:
wp-content/themes/rocketpd/docs/rocketpd-codex-build-rules.md
wp-content/themes/rocketpd/docs/reference/build-notes/wordpress-build-notes-rocketpd-contact.md

Task:
Build only the Contact page template scaffold and Section 1: Hero + Quick Reach.

Create/update:
- page-templates/template-contact.php
- template-parts/pages/contact/hero.php
- assets/css/pages/contact.css
- relevant ACF field group or code registration if field groups are stored in PHP

Use the legacy build note as visual/content reference, but implement with clean theme PHP/ACF/CSS. Do not use WPBakery or Salient.

Stop after Section 1.
Report changed files and browser QA notes.
```
