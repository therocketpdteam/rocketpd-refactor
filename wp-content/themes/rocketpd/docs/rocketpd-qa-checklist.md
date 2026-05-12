# RocketPD Clean Theme QA Checklist

## Purpose

This checklist should be used for every template before it is considered complete.

## Global QA

- [ ] Header renders correctly desktop/tablet/mobile.
- [ ] Mobile menu works with keyboard and touch.
- [ ] Footer renders correctly.
- [ ] Global CTA URLs are correct.
- [ ] Logo links to home.
- [ ] Active nav state works.
- [ ] No horizontal scroll at 375px.
- [ ] No console errors.
- [ ] No PHP warnings/notices visible.
- [ ] No broken images.
- [ ] No missing alt text on content images.
- [ ] Decorative images have empty alt text.
- [ ] Focus states are visible.

## Breakpoints

Check every template at:

- [ ] 1440px
- [ ] 1280px
- [ ] 1024px
- [ ] 768px
- [ ] 414px
- [ ] 375px

## Typography

- [ ] One H1 per page.
- [ ] Heading hierarchy is logical.
- [ ] Poppins used for headings.
- [ ] Inter used for body.
- [ ] Body text is readable on mobile.
- [ ] No text is clipped.
- [ ] No widows/orphans that seriously harm hero layout.

## Color and contrast

- [ ] Body text passes contrast.
- [ ] Button text passes contrast.
- [ ] Gold text is not used on white/light backgrounds.
- [ ] Dark sections have readable lavender/white body copy.
- [ ] Form errors are high contrast and legible.
- [ ] Links are visually identifiable.

## Forms

- [ ] Required fields are marked.
- [ ] Labels are visible and associated.
- [ ] Error states are readable.
- [ ] Confirmation behavior works.
- [ ] Notification emails work.
- [ ] Routing logic works.
- [ ] Spam protection works.
- [ ] Form does not jump awkwardly after AJAX submit.

## Links

- [ ] All internal links work.
- [ ] All external links work.
- [ ] External links that open new tabs include `rel="noopener"`.
- [ ] `tel:` links work on mobile.
- [ ] `mailto:` links work.
- [ ] Anchor links land in the correct location.

## ACF

- [ ] All expected fields are present.
- [ ] Empty optional fields do not break layout.
- [ ] Repeaters respect min/max row expectations.
- [ ] ACF local JSON is updated.
- [ ] No template depends on hard-coded editable content.
- [ ] Global options are populated.

## Performance

- [ ] Large images are optimized.
- [ ] Lazy loading is enabled where appropriate.
- [ ] Page-specific CSS loads only where needed.
- [ ] Page-specific JS loads only where needed.
- [ ] No heavy unused libraries.
- [ ] No layout shift from missing image dimensions.

## Template-specific QA

### Contact

- [ ] Three audience cards remain visually distinct.
- [ ] School/district card is dark navy and featured.
- [ ] Jesse links come from global option.
- [ ] Community links come from global option.
- [ ] General and support emails are not merged.
- [ ] Walkthrough form dropdown routing is tested.
- [ ] IDG relationship FAQ remains present.

### Lead Magnet

- [ ] Campaign slug is correct.
- [ ] Guide PDF is uploaded and downloadable.
- [ ] Gravity Form ID is correct.
- [ ] Thank-you/download confirmation works.
- [ ] No previous campaign defaults remain.
- [ ] Form trust line is present.
- [ ] Next-step cards have correct hierarchy.

### LaunchPad

- [ ] Hero uses product/dashboard visual, not consumer phone/photo hero.
- [ ] Product UI panels are crisp.
- [ ] Community hub has mobile fallback.
- [ ] Comparison table remains side-by-side on mobile.
- [ ] Instructors render correctly.
- [ ] Partner logo usage is approved or placeholder state is clear.

### LaunchPad+

- [ ] Demo district values are controlled through ACF.
- [ ] No "Riverside Unified" hard-coded in templates.
- [ ] No AI claims.
- [ ] No transformation hype.
- [ ] No SSO/deep integration claims.
- [ ] No "operating system" claims.
- [ ] Admin dashboard mockup is HTML/CSS or SVG, not blurry screenshot.
- [ ] Comparison table remains usable on mobile.

## Final launch QA

- [ ] SEO titles and meta descriptions preserved or updated.
- [ ] Open Graph images set.
- [ ] XML sitemap checked.
- [ ] Redirects checked.
- [ ] Analytics/tracking preserved.
- [ ] Forms tested end-to-end.
- [ ] Cache cleared.
- [ ] Backup/rollback plan exists.
