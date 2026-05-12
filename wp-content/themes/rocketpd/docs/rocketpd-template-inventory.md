# RocketPD Template Inventory

## Purpose

RocketPD has many pages, but the rebuild should not be treated as dozens of unique layouts. The target is approximately 20 reusable templates or template families.

This inventory is a starting point. Final template count should be confirmed after auditing the current production copy at `rocketgoeshigh.sftp.wpengine.com`.

## Template families

### 1. Global templates

| # | Template | Purpose | Notes |
|---|---|---|---|
| 1 | Header | Global navigation | ACF/global menu powered |
| 2 | Footer | Global footer | ACF/global menu powered |
| 3 | Flexible Page | Basic interior content page | For simple pages not needing custom design |

### 2. Primary marketing pages

| # | Template | URL / Use | Notes |
|---|---|---|---|
| 4 | Home | `/` | Main RocketPD homepage |
| 5 | About | `/about/` | Uses About mockup/reference |
| 6 | Community | `/community/` | Community positioning page |
| 7 | Contact | `/contact/` | First full page to build after foundation |

### 3. Product pages

| # | Template | URL / Use | Notes |
|---|---|---|---|
| 8 | LaunchPad | `/launchpad/` | Product/SaaS page |
| 9 | LaunchPad+ | `/launchpad-plus/` | Enterprise/branded platform page |

### 4. Lead capture / campaign pages

| # | Template | URL / Use | Notes |
|---|---|---|---|
| 10 | Lead Magnet Single | `/resources/<slug>/` | Reusable guide/playbook/webinar landing page |
| 11 | Lead Magnet Thank You | `/resources/<slug>/thank-you/` | Download confirmation page |
| 12 | Trust Cycle Guide | Campaign-specific page or lead magnet variant | May become Lead Magnet Single variant |

### 5. Resource/library templates

| # | Template | URL / Use | Notes |
|---|---|---|---|
| 13 | Resource Archive | `/resources/` | Filterable resource library |
| 14 | Resource Single | `/resources/resource-name/` | Article/resource detail |
| 15 | Guide Single | PDF/resource detail when not using lead magnet |
| 16 | Video/Webinar Single | Video-based resource detail |

### 6. Editorial templates

| # | Template | URL / Use | Notes |
|---|---|---|---|
| 17 | Blog Archive | `/blog/` or `/articles/` | Standard editorial archive |
| 18 | Blog Single | Post template | Clean typography, CTA blocks |
| 19 | Podcast Archive | `/podcast/` | If existing content requires |
| 20 | Podcast Single | Individual podcast detail | If existing content requires |

### 7. Optional / confirm after audit

| Template | Keep if needed | Notes |
|---|---|---|
| Cohort Landing Page | Yes if cohorts are individually marketed | Could be CPT |
| Event Landing Page | Yes if events are separate from cohorts | Could be CPT |
| Instructor Archive | Yes if instructors need public directory | CPT already likely useful |
| Instructor Single | Yes if instructor profiles are public | Could support LaunchPad |
| Generic Thank You | Yes | Reusable confirmation page |
| Legal Page | Yes | Privacy/terms simple template |

## Initial build priority

1. Foundation/header/footer
2. Contact
3. Lead Magnet
4. Home
5. Community
6. About
7. LaunchPad
8. LaunchPad+
9. Resource archive/single
10. Blog/editorial templates

## Why this order

Contact is a manageable full-page build that exercises:

- Brand system
- Cards
- CTAs
- Form styling
- FAQ
- Global options
- Header/footer
- Mobile layout

Lead Magnet comes next because it is reusable and unlocks future campaigns.

LaunchPad and LaunchPad+ should come later because they have the most complex SaaS product visuals, comparison tables, dashboard mockups, and mobile-specific behavior.

## Template audit checklist

For every existing page on the production copy, record:

```text
Current URL:
Page title:
Purpose:
Current builder:
Existing template:
Proposed new template:
ACF group needed:
Assets needed:
Forms needed:
Redirect risk:
SEO title/meta:
Priority:
```

Store the audit in:

```text
docs/build/page-audit.md
```
