# AGENTS.md — RocketPD Clean Theme Rebuild

## Project Goal

Rebuild RocketPD as a clean custom WordPress theme using ACF, PHP template parts, scoped CSS, and minimal vanilla JavaScript.

The new theme lives here:

wp-content/themes/rocketpd/

Do not build new production architecture inside:

wp-content/themes/salient-child/

Salient and WPBakery / Visual Composer are legacy reference only.

## Dev / Reference Site

The WP Engine development/reference site is connected by SFTP:

rocketgoeshigh.sftp.wpengine.com

Treat this as a production-copy reference site.

## Source of Truth Order

1. Current user request
2. AGENTS.md
3. Docs in wp-content/themes/rocketpd/docs/
4. Reference screenshots in wp-content/themes/rocketpd/docs/reference/screenshots/
5. Reference build notes in wp-content/themes/rocketpd/docs/reference/build-notes/
6. Existing production/legacy site files
7. Salient/WPBakery legacy implementation

## Hard Rules

- Do not modify wp-content/themes/salient-child/ unless explicitly instructed.
- Do not modify wp-content/themes/salient/.
- Do not activate the new theme unless explicitly instructed.
- Do not edit WordPress core files.
- Do not commit or expose credentials.
- Do not commit .vscode/sftp.json.
- Do not commit uploads, cache folders, database dumps, or backups.
- Do not build new layouts with WPBakery.
- Do not put production CSS in the Customizer or admin theme options.
- Do not hard-code editable page content that belongs in ACF.
- Do not hard-code global contact URLs, emails, or CTA URLs when a global option should be used.

## Build Approach

Build in small units.

Preferred cycle:

1. Read relevant docs and reference files.
2. Implement the smallest safe section, component, or template.
3. Upload changed theme files to WP Engine via SFTP.
4. Use Playwright/browser inspection to check the result on the dev site.
5. Compare against the user request and reference screenshot/build notes.
6. Make up to 3 correction passes.
7. Stop and report results.

Do not continue endlessly. After 3 correction passes, report what is still imperfect.

## Visual QA Target

The first pass should match the request and reference by at least 90%.

Evaluate:

- Section order
- Content accuracy
- Typography hierarchy
- Color usage
- Spacing
- Card styling
- Button styling
- Mobile layout
- Header/footer behavior
- Image usage
- Form behavior
- No horizontal overflow

## Playwright QA Rule

After uploading changes, use Playwright to inspect the page at desktop, tablet, and mobile widths.

Minimum viewport checks:

- 1440 x 1200
- 768 x 1200
- 390 x 1200

For each checked page:

- Capture screenshots.
- Check console errors.
- Check horizontal overflow.
- Check obvious layout breaks.
- Compare against the relevant reference screenshot when available.

## Correction Loop

For each task, make no more than 3 QA correction passes.

Use this format:

Pass 1:
- Uploaded changes.
- Checked with Playwright.
- Issues found:
- Fixes made:

Pass 2:
- Uploaded changes.
- Checked with Playwright.
- Issues found:
- Fixes made:

Pass 3:
- Uploaded changes.
- Checked with Playwright.
- Remaining issues:

After pass 3, stop and report.

## Deployment Rule

Upload only changed files inside:

wp-content/themes/rocketpd/

Do not upload the whole project unless explicitly instructed.

Do not upload:

- .vscode/
- wp-content/uploads/
- wp-content/plugins/
- wp-content/mu-plugins/
- wp-content/themes/salient/
- wp-content/themes/salient-child/

## Required Report After Every Task

Use this format:

Completed:
- ...

Changed files:
- ...

Uploaded to WP Engine:
- Yes/No
- Files uploaded:

Playwright QA:
- Desktop:
- Tablet:
- Mobile:
- Console errors:
- Overflow issues:

Correction passes used:
- 0/3, 1/3, 2/3, or 3/3

Needs review:
- ...

Next recommended task:
- ...

## Coding Standards

PHP:
- Escape output with esc_html, esc_url, esc_attr, or wp_kses_post.
- Use get_template_part() for reusable sections.
- Keep helper functions in inc/.
- Keep templates readable and section-based.

CSS:
- Use theme tokens from assets/css/00-tokens.css.
- Keep page CSS scoped.
- Avoid !important unless fixing unavoidable third-party leakage.
- Use responsive CSS from the beginning.

JavaScript:
- Use minimal vanilla JS.
- Load page-specific JS only where needed.
- Avoid heavy libraries unless approved.

ACF:
- Use ACF local JSON.
- Use page-specific field groups.
- Use tabs by section.
- Use repeaters for structured cards, FAQs, stats, and comparison rows.
- Use global options for shared phone/email/CTA values.

## Build Order

1. Theme scaffold
2. Global CSS foundation
3. ACF foundation
4. Header/footer
5. Home page
6. Contact page
7. Lead Magnet template
8. Community page
9. About page
10. LaunchPad
11. LaunchPad+
12. Resource/blog templates

## Visual QA and Staging Review Loop

For any task that changes a page template, page-specific CSS, global header, global footer, or visual layout, the task is not complete until the work has been reviewed in-browser on the staging site.

### Required workflow

1. Complete the local implementation.
2. Run local validation:
   - `git diff --check -- wp-content/themes/rocketpd`
   - JSON validation for any changed ACF JSON files.
   - Syntax checks where available.
3. Deploy or upload the changed RocketPD theme files to the staging environment.
4. Clear staging caches where available.
5. Open the affected staging URL in Playwright.
6. Capture a full-page screenshot.
7. Compare the staging screenshot against the approved reference screenshot or design direction.
8. Self-correct visual issues.
9. Repeat the deploy/review/correction loop up to 3 times, or until the page is approximately 90% aligned with the approved reference.

### Visual comparison criteria

When comparing against the reference, check:

- Overall section order and page structure.
- Header and footer rendering.
- Hero layout, headline scale, and spacing.
- Section rhythm and vertical spacing.
- Background color bands and contrast.
- Card layouts, grids, and image treatments.
- Typography hierarchy.
- Button styling and hover/focus states.
- Mobile responsiveness.
- Whether any legacy content, old ACF fields, or broken menu output is visible.
- Whether the page feels polished enough for client-facing QA.

### Important staging rules

- Only deploy to staging/QA, never production.
- Do not modify WordPress database content unless the prompt explicitly asks for it.
- Do not delete legacy themes, plugins, uploads, or old ACF field groups unless explicitly instructed.
- Keep file changes inside `wp-content/themes/rocketpd/` unless the task explicitly says otherwise.
- If the staging site does not update after deployment, stop and diagnose deployment/caching before continuing design work.
- Do not report a visual task as complete based only on local file validation.

### Reporting requirements

For visual tasks, always report:

- Files changed.
- Whether files were deployed/uploaded to staging.
- Staging URL reviewed.
- Whether Playwright was used.
- Screenshot path or confirmation that a screenshot was captured.
- Number of correction passes completed.
- Remaining visual gaps, if any.
- Whether the result is ready for human QA.
- Final git status.