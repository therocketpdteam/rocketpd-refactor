# RocketPD Clean Theme Rebuild Docs

This documentation set replaces the earlier Salient-child-theme approach with a clean custom WordPress theme strategy.

## Strategic direction

RocketPD will be rebuilt as a custom ACF-powered WordPress theme located at:

```text
wp-content/themes/rocketpd/
```

The current production copy at `rocketgoeshigh.sftp.wpengine.com` should be treated as the reference/source site. Salient, WPBakery, and the existing production markup are legacy references only. New templates should be built in the clean RocketPD theme using ACF, PHP template parts, reusable components, and scoped CSS/JS.

## Included documents

- `rocketpd-brand-system.md`
- `rocketpd-clean-theme-architecture.md`
- `rocketpd-acf-architecture.md`
- `rocketpd-template-inventory.md`
- `rocketpd-two-week-build-plan.md`
- `rocketpd-codex-build-rules.md`
- `rocketpd-reference-assets-and-legacy-notes.md`
- `rocketpd-vscode-and-wpengine-sync.md`
- `rocketpd-qa-checklist.md`
- `rocketpd-first-codex-prompts.md`

## Working principle

Build the design system first, then templates. Do not begin page-by-page production work until the base theme, global components, ACF strategy, and QA protocol exist.
