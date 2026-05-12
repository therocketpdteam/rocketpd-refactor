# RocketPD VS Code and WP Engine Sync

## Purpose

This document guides the setup for working on the RocketPD production copy in VS Code.

## Server

Production copy / development reference:

```text
rocketgoeshigh.sftp.wpengine.com
```

This is a copy of RocketPD production.

## Important security note

Do not commit credentials.

Do not put SFTP usernames, passwords, private keys, database credentials, salts, or `wp-config.php` secrets into the repo.

Use local-only files such as:

```text
.env.local
.sftp-config.local.json
```

Make sure these are in `.gitignore`.

## Recommended local workflow

Preferred workflow:

1. Pull the site files from WP Engine/SFTP.
2. Open the project in VS Code.
3. Confirm Git repo status.
4. Create/build the new theme at `wp-content/themes/rocketpd/`.
5. Commit code changes.
6. Deploy the theme folder back to the development site.
7. Activate only when ready.

## Files to pull for development

Pull:

```text
wp-content/themes/
wp-content/plugins/   # for inspection only, not necessarily committed
wp-content/mu-plugins/
wp-content/uploads/   # only as needed, not entire folder by default
```

Definitely inspect:

```text
wp-content/themes/salient-child/
wp-content/mu-plugins/
wp-content/plugins/advanced-custom-fields-pro/
wp-content/plugins/gravityforms/
```

## Files to avoid committing

Add to `.gitignore`:

```gitignore
wp-config.php
.env
.env.local
*.sql
*.sql.gz
*.zip
*.tar
*.tar.gz
wp-content/uploads/
wp-content/cache/
wp-content/upgrade/
wp-content/backup*/
wp-content/backups*/
wp-content/ai1wm-backups/
wp-content/wflogs/
node_modules/
.DS_Store
.sftp-config.local.json
.vscode/sftp.json
```

## VS Code extensions

Recommended:

- PHP Intelephense
- WordPress Hooks IntelliSense
- EditorConfig
- Prettier
- Stylelint
- ESLint if JS tooling is added
- SFTP extension only if the team prefers direct sync

## First workspace audit

Before coding, run an audit and record:

```text
WordPress root found:
Active theme:
Existing child theme:
ACF local JSON present:
Gravity Forms present:
Current custom post types:
Current page templates:
Current custom CSS location:
Current custom JS location:
Menus:
Forms:
Major plugins:
Git repo present:
```

Store findings in:

```text
wp-content/themes/rocketpd/docs/build/workspace-audit.md
```

## Safe sync workflow

When syncing to WP Engine:

1. Upload only changed theme files.
2. Do not overwrite uploads.
3. Do not overwrite `wp-config.php`.
4. Do not overwrite plugins unless intentionally updating.
5. Confirm file permissions.
6. Check the site immediately after upload.
7. Keep a rollback copy or Git commit.

## Theme activation workflow

Do not activate the new theme until:

- Header/footer are built.
- Home, Contact, Lead Magnet, LaunchPad, LaunchPad+ are at least structurally complete.
- ACF options are populated.
- Menus are assigned.
- Forms are verified.
- No fatal errors in logs.
- Staging preview is approved.

## Useful WP-CLI checks if available

```bash
wp theme list
wp plugin list
wp option get stylesheet
wp option get template
wp post list --post_type=page --fields=ID,post_title,post_name
wp acf
```

WP-CLI may or may not be available through the current environment. Do not assume it is present.
