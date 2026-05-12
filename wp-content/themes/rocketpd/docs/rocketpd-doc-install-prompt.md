# Prompt: Install These Docs in the Repo

```text
We are updating the RocketPD rebuild documentation.

Strategic direction:
- Build a clean custom WordPress theme named RocketPD.
- New theme path: wp-content/themes/rocketpd/
- Do not build new architecture inside salient-child.
- Rebuild templates with ACF, PHP template parts, scoped CSS, and minimal vanilla JS.
- Treat Salient/WPBakery as legacy reference only.
- The server rocketgoeshigh.sftp.wpengine.com is a copy of RocketPD production and should be used as the reference/source site.

Task:
Create this docs folder if it does not already exist:

wp-content/themes/rocketpd/docs/

Add the provided Markdown files into that folder.

Also create:

wp-content/themes/rocketpd/docs/brand/
wp-content/themes/rocketpd/docs/build/
wp-content/themes/rocketpd/docs/reference/
wp-content/themes/rocketpd/docs/reference/screenshots/
wp-content/themes/rocketpd/docs/reference/build-notes/
wp-content/themes/rocketpd/docs/reference/templates/

Add placeholder index.php files in reference folders so they are not browsable if exposed.

Do not activate the theme.
Do not modify salient-child.
Do not build templates yet.
Report changed files.
```
