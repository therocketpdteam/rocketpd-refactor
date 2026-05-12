# RocketPD Two-Week Clean Theme Build Plan

## Purpose

This is a realistic two-week plan for building a clean custom RocketPD WordPress theme powered by ACF.

The goal is not to perfect every page in isolation. The goal is to build a reusable theme system and approximately 20 templates/template families quickly, with each first pass close enough to require minimal cleanup.

## Assumptions

- `rocketgoeshigh.sftp.wpengine.com` is a copy of RocketPD production and will be used as the reference/source site.
- The new theme will live at `wp-content/themes/rocketpd/`.
- Salient/WPBakery are legacy reference only.
- ACF Pro is available.
- Gravity Forms is available or will be confirmed early.
- Current assets can be pulled from the production copy.
- Reference screenshots and build notes are stored in the repo for Codex access.
- The team will QA each template before moving too far ahead.

## Success criteria

By the end of two weeks:

- Custom `rocketpd` theme exists and can be activated on staging.
- Global header/footer are rebuilt.
- ACF options pages exist.
- ACF local JSON is working.
- Core CSS tokens/components are complete.
- Primary marketing pages are rebuilt.
- Product pages are rebuilt or at least structurally complete.
- Lead magnet system is reusable.
- Resource/blog templates exist.
- No new production layout depends on WPBakery.
- The first pass of each page is close to the mockup/reference and needs only focused cleanup.

## Daily plan

### Day 1: Environment, audit, and theme scaffold

Goals:

- Pull production copy into VS Code.
- Confirm repo state.
- Create `wp-content/themes/rocketpd/`.
- Add docs and reference folders.
- Scaffold theme files.
- Add Git ignore rules.
- Identify current content/build dependencies.

Deliverables:

- Theme folder created.
- Base `style.css`, `functions.php`, `inc/` files.
- Docs committed.
- Production copy audited at a high level.

### Day 2: Global foundation

Goals:

- Add CSS tokens, typography, layout, components.
- Add enqueue logic.
- Add ACF local JSON.
- Add ACF options pages.
- Add helper functions and icon map.
- Build global button/card/section-header components.

Deliverables:

- Global design system working.
- ACF options visible in admin.
- No page template work yet.

### Day 3: Header and footer

Goals:

- Build accessible header.
- Build mobile nav.
- Build footer.
- Wire global contact/CTA options.
- Test across desktop/mobile.

Deliverables:

- Header/footer production-ready.
- Navigation menus registered.
- Footer columns editable.

### Day 4: Contact page

Goals:

- Build Contact page fixed template.
- Build sections:
  - Hero + Quick Reach
  - Choose Your Door
  - Talk to Jesse
  - Reach Us
  - Form
  - FAQ
  - Final CTA
- Wire Gravity Forms placeholder/form ID.

Deliverables:

- Contact page first pass complete.
- Global URL/email options proven.

### Day 5: Lead Magnet system

Goals:

- Register `lead_magnet` CPT.
- Build `single-lead_magnet.php`.
- Build reusable lead magnet sections.
- Wire guide PDF + form ID fields.
- Build thank-you page pattern or confirmation block.

Deliverables:

- First campaign page working.
- Template reusable for future campaigns.

### Day 6: Homepage

Goals:

- Build homepage template.
- Build hero, trust band, value prop, help cards, LaunchPad positioning, tiers, community, resources, social proof, testimonials, CTA.
- Reuse components from Contact/Lead Magnet.

Deliverables:

- Homepage first pass complete.

### Day 7: Community and About

Goals:

- Build Community template.
- Build About template.
- Reuse shared section/card/CTA components.
- Confirm mobile behavior.

Deliverables:

- Community and About first passes complete.

### Day 8: LaunchPad

Goals:

- Build LaunchPad template.
- Implement product dashboard hero, trust band, intro, product experience, district cards, implementation timeline, community hub, instructors, comparison bridge, partners, CTA.
- Prioritize structure and responsive behavior over micro-polish.

Deliverables:

- LaunchPad first pass complete.
- Product visuals implemented as HTML/CSS where possible.

### Day 9: LaunchPad+ and resource/editorial templates

Goals:

- Build LaunchPad+ template.
- Build resource archive/single.
- Build blog archive/single.
- Build podcast archive/single if required.
- Confirm no hard-coded demo district values except controlled defaults.

Deliverables:

- LaunchPad+ first pass complete.
- Resource/editorial templates exist.

### Day 10: Full QA, cleanup, and launch prep

Goals:

- Visual QA.
- Mobile QA.
- Accessibility QA.
- Form QA.
- Link QA.
- SEO metadata check.
- Performance pass.
- Remove unused files.
- Prepare activation/deployment plan.

Deliverables:

- Launch candidate theme.
- Punch list with only focused cleanup items.
- Activation checklist complete.

## Daily QA rule

Every day must end with:

- `git status`
- changed files summary
- desktop screenshots
- mobile screenshots
- known issues list
- next-day priorities

## Build cadence

Codex should work in small implementation units:

1. One component or section
2. Screenshot/check
3. Fix
4. Commit
5. Continue

Avoid broad prompts like "build the homepage." Use prompts like "build Contact §1 and stop."

## Risk areas

- Existing production content may depend on WPBakery shortcodes.
- Header/footer behavior may currently depend on Salient.
- Forms may have unknown routing logic.
- Some image assets may be stored in uploads with unclear naming.
- Product dashboard mockups need HTML/CSS implementation, not flat screenshots.
- LaunchPad and LaunchPad+ mobile tables/diagrams need explicit CSS.

## Scope discipline

Do not:

- Redesign pages while rebuilding.
- Reinterpret copy without approval.
- Build unnecessary customizer settings.
- Overbuild flexible sections where fixed templates are enough.
- Wait until the end for mobile QA.
