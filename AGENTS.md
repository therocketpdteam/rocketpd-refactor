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

The staging/dev URL is used for review and QA only. Do not treat the current staging page as the design source unless the user explicitly says to.

## Source of Truth Order

Use this order when sources conflict:

1. Current user request
2. Approved page blueprint for the current task
3. AGENTS.md
4. Docs in wp-content/themes/rocketpd/docs/
5. Reference screenshots in wp-content/themes/rocketpd/docs/reference/screenshots/
6. Reference build notes in wp-content/themes/rocketpd/docs/reference/build-notes/
7. Existing clean RocketPD theme patterns
8. Existing production/legacy site files
9. Salient/WPBakery legacy implementation

For page builds, the approved reference screenshot and approved blueprint are the design source of truth.

Do not use the current staging page, older implementation attempts, or legacy Salient/WPBakery layouts as the design source unless explicitly instructed.

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
- Do not modify plugins, mu-plugins, uploads, salient, or salient-child unless explicitly instructed.
- Do not modify database content or WordPress page content unless explicitly instructed.
- Keep implementation changes for the clean theme inside wp-content/themes/rocketpd/.

## Branching Workflow

Every new page build must happen on its own clean feature branch from the latest origin/main.

Use clear page-specific branch names:

- feature/home-page-template
- feature/contact-page-template
- feature/community-page-template
- feature/about-page-template
- feature/launchpad-page-template
- feature/launchpad-plus-page-template
- feature/lead-magnet-template

Do not stack a new page on top of another unmerged feature branch.

Before implementation, report:

- Current branch
- Latest main commit
- Whether the working tree is clean
- Whether the page branch was created from latest origin/main
- Commits ahead of main
- Files differing from main
- Whether unrelated page work is included

If work is accidentally done on the wrong branch:

1. Stop.
2. Do not merge.
3. Do not rename the dirty branch as the new page branch.
4. Create a clean branch from latest origin/main.
5. Cherry-pick only the relevant page commit.
6. Resolve conflicts by keeping only the intended page changes.
7. Confirm no unrelated page files are included.

## RocketPD Page Build Workflow

This applies to the Home page and every RocketPD page-template build.

Do not implement a new page directly from a broad instruction such as “match this screenshot” or “improve this page.”

Use this workflow for every page:

1. Use the approved reference PNG as the only visual/design source.
2. Perform a design/source audit first.
3. Create or request a section-by-section implementation blueprint.
4. Wait for blueprint approval.
5. Implement the approved blueprint exactly.
6. Upload only changed RocketPD theme files to staging.
7. Review a cache-busted staging URL.
8. Use Playwright at desktop, tablet, and mobile.
9. Self-correct up to 3 times for objective mismatches only.
10. Stop and report.

The audit step should happen before writing code.

During the audit, inspect:

- Approved reference screenshot
- Existing theme structure
- Existing naming conventions
- Existing page patterns
- ACF JSON structure
- Enqueue patterns
- Template-part patterns
- Header/footer behavior only as global context

The audit should report:

- Visible sections in exact order
- Likely template type, such as front-page.php or page-templates/template-name.php
- Proposed template parts
- Proposed CSS file
- Proposed ACF field group and repeaters
- Whether page-specific JavaScript is needed
- Existing files to keep, rename, delete, or create
- Global header/footer issues to handle separately
- Confirmation that no files were changed

The audit is not the final blueprint. It is input for the approved blueprint.

## Page Blueprint Requirements

Before implementation, each page must have a section-by-section blueprint.

For each visible section, document:

- Section name
- Exact order on page
- Background color/style
- Layout type
- Main headline
- Supporting copy
- Cards/items/count
- Images or visual motifs
- Buttons/links
- Forms or interactions, if any
- Approximate spacing and visual rhythm
- Required ACF fields, if any
- Template part name

The blueprint must also report:

- Existing template parts to keep
- Existing template parts to rename
- Existing template parts to delete
- New template parts needed
- Whether existing ACF JSON supports the blueprint or needs changes
- Global header/footer issues to handle separately

Do not invent new sections.

Do not omit visible sections.

Do not redesign the page during blueprinting.

## Implementation Rules

Implementation is an execution task, not a creative redesign task.

When implementing an approved blueprint:

- Implement the approved section order exactly.
- Do not invent sections.
- Do not omit sections.
- Do not rename template parts unless the blueprint says to.
- Use polished fallback/default content from the blueprint so the page looks complete even if ACF fields are empty.
- Keep CSS scoped to the page.
- Use existing RocketPD design tokens and patterns where appropriate.
- Use minimal vanilla JavaScript only when needed.
- Do not create empty buttons.
- Do not create empty cards.
- Do not create broken image placeholders.
- Do not create empty sections.
- Do not create visible submenu dumps.
- Do not create horizontal overflow.

Escape all output properly:

- esc_html() for plain text
- esc_attr() for attributes
- esc_url() for URLs
- wp_kses_post() for rich text

## Header and Footer Rule

Global header and footer are shared theme systems.

For page builds:

- Treat header and footer as review context only.
- Do not rebuild the global header or footer inside a page template.
- Do not solve global nav/header/footer issues inside a page-specific template unless explicitly instructed.
- If a header/footer issue appears during page QA, report it separately unless it was caused by the current page changes.

## Template Assignment Rule

If a new page template is uploaded but the staging URL still renders the old page:

- Check whether the WordPress page is assigned to the new template.
- If WP-CLI is available, update only the page template meta for the relevant page.
- If WP-CLI is not available, stop and report the manual admin steps.
- Do not modify unrelated page content.

Expected page template meta format:

page-templates/template-name.php

Manual admin path:

Pages > All Pages > Page Name > Template > Select Template > Update

## Build Approach

Build in small units.

Preferred cycle:

1. Read relevant docs and reference files.
2. Confirm branch status and clean working tree.
3. Perform design/source audit if this is a new page.
4. Create or follow the approved blueprint.
5. Implement the smallest safe section, component, or template.
6. Validate changed files.
7. Upload changed theme files to WP Engine via SFTP.
8. Use Playwright/browser inspection to check the result on the dev site.
9. Compare against the approved blueprint and reference screenshot.
10. Make up to 3 correction passes for objective issues only.
11. Stop and report results.

Do not continue endlessly. After 3 correction passes, report what is still imperfect.

## Visual QA Target

The first implementation pass should match the approved blueprint and reference screenshot by at least 90%.

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
- Confirm expected page wrapper is present.
- Confirm page-specific CSS is loading.
- Compare against the approved blueprint and relevant reference screenshot when available.

Use cache-busted URLs for review, for example:

?rpdcache=page-name
?rpdqa=page-name-template

## Objective QA Issues

Self-correct only for objective issues, including:

- Missing section
- Wrong section order
- Broken header/menu caused by the current change
- Empty footer caused by the current change
- Major spacing mismatch
- Major typography hierarchy mismatch
- Card/grid layout mismatch
- Form layout mismatch
- Mobile layout break
- Horizontal overflow
- Console errors caused by the current change
- Empty buttons
- Empty cards
- Broken image placeholders
- Visible submenu dumps

Do not make creative redesign changes during QA unless explicitly approved.

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

- AGENTS.md unless explicitly requested
- .vscode/
- wp-content/uploads/
- wp-content/plugins/
- wp-content/mu-plugins/
- wp-content/themes/salient/
- wp-content/themes/salient-child/

Do not deploy files from unrelated feature branches.

## Validation Rule

Before committing implementation changes, run available checks.

Required when applicable:

- git diff --check -- wp-content/themes/rocketpd
- jq empty for changed ACF JSON files
- php -l for changed PHP files, if PHP is available
- node --check for changed JavaScript files, if applicable

If a tool is unavailable, report that clearly.

### ACF JSON — Smart Quote Warning

Writing ACF JSON on Windows can silently corrupt the file with typographic/curly double quotes (U+201C `"` and U+201D `"`) instead of straight ASCII double quotes (`"`). This makes the entire file unparseable — ACF will silently fail to load it with no useful error.

**Detect:** run `php -r "json_decode(file_get_contents('path/to/file.json'), true); echo json_last_error_msg();"` — any result other than `No error` means the file is invalid.

**Fix:** replace all curly quote bytes in-place:

```php
$content = file_get_contents($file);
$fixed = str_replace(["\xe2\x80\x9c", "\xe2\x80\x9d"], '"', $content);
file_put_contents($file, $fixed);
```

After writing or editing any ACF JSON file, always validate with PHP before committing.

## ACF Field Group Recovery (WP-CLI)

If an ACF field group is deleted from the database (e.g. after `wp post delete <id> --force`), ACF does not auto-recreate it from JSON. Use WP-CLI to force-import:

```bash
wp eval '
$file = "/sites/rocketgoeshigh/wp-content/themes/rocketpd/acf-json/group_rocketpd_post_enhancements.json";
$data = json_decode(file_get_contents($file), true);
if ($data) {
    acf_import_field_group($data);
    echo "Done: " . $data["title"];
} else {
    echo json_last_error_msg();
}
'
```

**Path note:** WP Engine's `open_basedir` blocks `/nas/content/live/` from PHP. Always use the `/sites/rocketgoeshigh/` path when referencing theme files in `wp eval`. The SSH shell uses `/nas/` paths; PHP (and WP-CLI `wp eval`) uses `/sites/` paths.

`wp acf sync` is not registered as a WP-CLI subcommand in the ACF Pro version on this site — do not attempt it.

PHP Warnings from ACF's own `compatibility.php` or `admin-field-groups.php` during import are harmless noise and do not indicate failure. A successful import prints `Done: <field group title>`.

## Required Report After Every Task

Use this format:

Completed:
- ...

Branch:
- Current branch:
- Base:
- Commits ahead of main:
- Working tree:

Changed files:
- ...

Validation:
- git diff --check:
- ACF JSON:
- PHP lint:
- JS check:

Uploaded to WP Engine:
- Yes/No
- Files uploaded:

Staging URL reviewed:
- ...

Playwright QA:
- Desktop:
- Tablet:
- Mobile:
- Console errors:
- Overflow issues:
- Screenshot paths:

Correction passes used:
- 0/3, 1/3, 2/3, or 3/3

Needs review:
- ...

Remaining gaps:
- ...

Next recommended task:
- ...

## Commit Message Format

Every commit must follow this format:

```
<type>(<scope>): <short summary of what changed>

<What was broken or missing — user-facing impact first.>
<What caused it — technical root cause.>
<What the fix does.>

Files changed:
- 
- 
```

**Type:** `fix`, `feat`, `refactor`, `style`, `chore`, `docs`

**Scope:** the area of the theme affected, e.g. `mobile-nav`, `home-hero`, `header`, `acf`, `enqueue`

**Summary line:** plain English, lowercase, no period, 72 chars max

**Body rules:**
- Write each thought as a single unbroken paragraph — no manual line breaks within a sentence or idea
- Lead with user-facing impact, not the code change
- State the technical root cause
- Describe what the fix or addition does
- Separate distinct thoughts with a blank line
- Keep it factual — no filler words

**Files changed:** list every file touched, relative to `wp-content/themes/rocketpd/`

A `.gitmessage` template is included at the repo root. Activate it with:

```bash
git config commit.template .gitmessage
```

## Coding Standards

PHP:

- Escape output with esc_html, esc_url, esc_attr, or wp_kses_post.
- Use get_template_part() for reusable sections.
- Keep helper functions in inc/.
- Keep templates readable and section-based.
- Avoid large anonymous logic blocks inside page templates.
- Prefer small fallback arrays in section template parts when appropriate.

CSS:

- Use theme tokens from assets/css/00-tokens.css.
- Keep page CSS scoped under a page wrapper.
- Avoid !important unless fixing unavoidable third-party leakage.
- Use responsive CSS from the beginning.
- Prevent horizontal overflow.
- Keep page-specific CSS in assets/css/pages/.
- Enqueue page-specific CSS only for the relevant template.

JavaScript:

- Use minimal vanilla JS.
- Load page-specific JS only where needed.
- Avoid heavy libraries unless approved.
- Do not add JavaScript for static layouts.

ACF:

- Use ACF local JSON.
- Use page-specific field groups.
- Use tabs by section.
- Use repeaters for structured cards, FAQs, stats, and comparison rows.
- Use global options for shared phone/email/CTA values.
- Provide fallback/default content so templates render complete before ACF fields are manually populated.

## Expected Page File Pattern

For standard page-template builds, use this pattern unless the audit determines otherwise:

Page template:

wp-content/themes/rocketpd/page-templates/template-page-name.php

Template parts:

wp-content/themes/rocketpd/template-parts/pages/page-name/section-name.php

CSS:

wp-content/themes/rocketpd/assets/css/pages/page-name.css

ACF JSON:

wp-content/themes/rocketpd/acf-json/group_rocketpd_page_name.json

Enqueue:

wp-content/themes/rocketpd/inc/enqueue.php

Only add enqueue logic for the current page template.

## Front Page Rule

For the Home page, first audit whether the correct implementation should be:

- front-page.php
- home.php
- page-templates/template-home.php

Base the recommendation on the current theme structure and WordPress setup.

Do not assume the Home page should be a page template without checking the existing theme and site configuration.

## Handoff Note — Blog Post Template (June 2026)

The single-post template was built directly on `main` without a feature branch. This was intentional for the initial build session. Claude Code should not attempt to retroactively branch this work.

**What is already on main and working on staging:**

- `single-post.php` — complete
- `template-parts/posts/hero.php` — complete
- `template-parts/posts/content.php` — complete, WPBakery-aware
- `template-parts/posts/sidebar.php` — complete
- `template-parts/posts/faq.php` — complete
- `template-parts/posts/cta-band.php` — complete
- `template-parts/posts/related-learning.php` — complete
- `assets/css/pages/post.css` — complete
- `assets/js/post.js` — FAQ accordion, complete
- `inc/posts.php` — Header and Footer Scripts plugin suppression, complete
- `inc/enqueue.php` — `is_singular( 'post' )` block added
- `functions.php` — `posts` added to includes array
- `AGENTS.md` — blog post template section added

**Also complete (feature/blog-breadcrumb-schema, pending merge):**

- `template-parts/posts/breadcrumb.php` — Home → Blog → Post Title via `rocketpd_render_breadcrumbs()`
- `template-parts/posts/schema.php` — intentionally empty stub; Yoast SEO owns schema (see Schema Rule below)

**Not started:**

- Playwright QA on the post template
- 35-post migration deferred — `rocketpd_strip_wpbakery()` handles legacy content at render time, so bulk DB migration is not required. Individual posts with irregular content will be handled case-by-case in Claude Code.

**Branching going forward:**

All new work in Claude Code should use feature branches per the Branching Workflow section above. The blog post template work on `main` is the exception, not the pattern.


The blog post template (`single-post.php`) is fully built. Do not rebuild it unless explicitly instructed.

File structure:

```
single-post.php
template-parts/posts/hero.php         — title, dek, meta, featured image, instructor byline
template-parts/posts/content.php      — post body (WPBakery-aware, see below)
template-parts/posts/sidebar.php      — sticky sidebar CTA
template-parts/posts/faq.php          — optional FAQ accordion
template-parts/posts/related-learning.php — 3-up related posts grid
template-parts/posts/cta-band.php     — bottom CTA band (3 variants)
assets/css/pages/post.css             — scoped post styles
assets/js/post.js                     — FAQ accordion JS
inc/posts.php                         — post-specific hooks (plugin suppression etc.)
```

ACF field group: `acf-json/group_rocketpd_post_enhancements.json`
Tabs: Hero, Sidebar, Related Learning, Bottom CTA, FAQ

### WPBakery content handling

Migrated posts contain legacy WPBakery shortcodes in `post_content`. The theme strips these at render time in `template-parts/posts/content.php` using `rocketpd_strip_wpbakery()`. This function:

- Converts `[vc_custom_heading text="..."]` → `<h2>`
- Converts `[divider]` → `<hr class="rpd-post-divider">`
- Replaces container tags (`[vc_row]`, `[vc_column_text]` etc.) with `\n\n`
- Strips remaining `vc_`, `wpb_`, `nectar_` shortcode tags
- Runs `apply_filters( 'the_content', $cleaned )` after stripping

The DB is never modified — stripping is render-time only. New Gutenberg posts are unaffected.

### Schema Rule

Yoast SEO is active on this site and owns all JSON-LD structured data. It outputs a connected schema graph (`Article`, `WebPage`, `BreadcrumbList`, `Person`, `ImageObject`, `WebSite`) with proper `@id` cross-references — the format Google recommends for rich results. Do not add custom JSON-LD schema on any post or page while Yoast is active. Duplicate schema types on the same page suppress rich results rather than improving them.

`template-parts/posts/schema.php` exists as an intentional empty stub. If Yoast is ever removed, that file is where post schema should be rebuilt. See the file header for the expected output types.

### Plugin suppression

`inc/posts.php` suppresses the "Header and Footer Scripts" plugin (by Anand Kumar, slug: `header-and-footer-scripts`) per-post head script output on single post pages. It does this by filtering `get_post_metadata` to return empty for the `_inpost_head_script` meta key on the frontend. The DB value and editor meta box are unaffected. To re-enable: comment out the `add_filter()` call in `inc/posts.php`.

## Staging Domain

Staging URL: `https://rocketgoeshigh.wpenginepowered.com`
SFTP: `rocketgoeshigh.sftp.wpengine.com`

## Helper Functions

All helpers live in `inc/helpers.php`. Use these in all templates — do not call `get_field()` directly.

```php
// ACF field for current post, with fallback.
rocketpd_get_field( 'field_name', $fallback, $post_id = 0 );

// ACF global option, with fallback.
rocketpd_get_option( 'field_name', $fallback );

// ACF repeater rows, with fallback rows and required-key filtering.
rocketpd_get_repeater_rows( 'field_name', $fallback_rows, $required_keys, $post_id = 0 );

// Render an ACF image value (ID, array, or URL string) as <img> markup.
rocketpd_get_image_markup( $image, $class, $alt );
```

`rocketpd_get_field()` distinguishes between a field that was never saved (returns fallback) and one intentionally cleared by an editor (returns the cleared value). Do not replicate this logic inline.

## inc/ Pattern

Post-type or feature-specific hooks and filters belong in a dedicated `inc/` file, not in `functions.php` or inline in templates.

Current `inc/` files relevant to posts:
- `inc/posts.php` — single post hooks (plugin suppression, future post-specific filters)
- `inc/helpers.php` — shared helper functions
- `inc/enqueue.php` — all asset enqueuing incl. `is_singular( 'post' )` block

When adding a new `inc/` file, register it in the `$rocketpd_includes` array in `functions.php`.



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

Actual build order may vary by user request.

Regardless of sequence, each page should use its own clean branch from latest origin/main.
