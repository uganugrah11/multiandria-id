# AGENTS.md - Multi Andria Indonesia UI/UX Engineering Guide

## Mission

Upgrade the existing Multi Andria Indonesia website from a competent corporate website into a premium, modern, editorial B2B garment-manufacturing website.

The goal is not to rebuild the application from scratch. Preserve the existing Laravel architecture, business logic, data model, working integrations, and reusable components wherever they remain sound.

Primary outcomes:

1. Improve visual hierarchy and perceived quality.
2. Improve information architecture and conversion flow.
3. Make authentic company/product imagery a first-class part of the experience.
4. Reduce repetitive AI-generated UI patterns.
5. Make every public page feel intentionally designed rather than templated.
6. Preserve accessibility, responsive behavior, performance, and maintainability.

## Project Context

This is a Laravel + Blade + Tailwind CSS v4 website for Multi Andria Indonesia.

Treat the existing repository and `docs/` as the source of truth for implementation details. Before changing architecture, inspect:

- `PROJECT_INSTRUCTIONS.md`
- `docs/DESIGN_DIRECTION.md`
- `docs/DESIGN_SYSTEM.md`
- `docs/UX_AUDIT.md`
- `docs/HOMEPAGE_ARCHITECTURE.md`
- `docs/SITEMAP.md`
- `docs/CONTENT_REQUIREMENTS.md`
- `docs/CONTENT_AUDIT.md`
- `docs/IMPLEMENTATION_ROADMAP.md`

Do not invent business claims, statistics, certifications, clients, locations, production capabilities, or testimonials.

## Information Architecture

The canonical public navigation is:

- Home
- Tentang Kami
- Produk
- Layanan
- Portofolio

Consolidation rules:

- Manufacturing is consolidated into the canonical `/layanan` experience.
- Product and portfolio are consolidated into the canonical `/portfolio` experience.
- Preserve legacy URLs such as `/manufacturing` and `/produk` when practical, but redirect them to their canonical destinations rather than maintaining duplicate public experiences.
- Do not create duplicate page implementations just to preserve old routes.

Navigation labels may remain Indonesian even when canonical route names are English.

## Page Narrative

### Home

Purpose: establish positioning, credibility, capabilities, and a clear inquiry CTA.

Hero direction:
- Brand/product-production positioning.
- Prefer authentic garment/product imagery if a strong local asset exists.
- Do not use the HQ building as the homepage hero.
- If no suitable hero image exists, use a typography-led editorial composition instead of unrelated stock photography.

Suggested narrative:
1. Hero
2. Company proof / short story
3. Timeline or credibility
4. Product categories
5. Production/service capability
6. Differentiators
7. Testimonials
8. Client proof
9. FAQ
10. Primary CTA

### Tentang Kami

Purpose: establish identity, history, scale, credibility, and physical presence.

Hero direction:
- The uploaded HQ office photograph is an approved candidate.
- Use it as company identity/location imagery, not as proof of manufacturing operations.

Suggested narrative:
1. Hero
2. Company introduction
3. Scale/proof metrics
4. Vision and mission
5. Certifications / company credentials
6. Company timeline
7. Locations
8. Client proof
9. CTA

### Layanan

Purpose: explain how customers can work with Multi Andria and how production is delivered.

Manufacturing is absorbed into this page.

Suggested narrative:
1. Service/manufacturing hero
2. CMT
3. FOB
4. Production workflow
5. Quality control
6. Capacity/capability proof
7. Facilities
8. CTA

Important:
- Never use the HQ office photo to imply a factory, sewing line, production floor, or manufacturing facility.
- If authentic manufacturing photography is unavailable, use typography, process diagrams, data, or restrained graphic composition.
- Mark missing authentic imagery as `CONTENT NEEDED` in the image audit rather than using misleading stock imagery.

### Portofolio

Purpose: demonstrate what Multi Andria can produce and build confidence through actual work.

Suggested narrative:
1. Portfolio hero
2. Product/capability categories
3. Featured projects
4. Selected portfolio
5. Production/service context
6. CTA

The uploaded black custom T-shirt project image is an approved candidate for portfolio/product showcase imagery. It is a product/mockup visual, not manufacturing-process evidence.

## Image Strategy

The complete website image library may exist only in the developer's local working tree and may not yet be committed to GitHub.

Therefore:

- Inspect the local filesystem, not only Git-tracked files.
- Do not assume GitHub represents the complete asset library.
- Include untracked local assets when they are accessible.
- Never require a photo to be pushed to GitHub merely to inspect it.
- Before adding an image to source control, check `.gitignore`, file size, licensing/ownership, and whether the asset is actually required by the website.

Classify imagery as:

1. Proof imagery
   - HQ
   - real production facility
   - actual production process
   - actual completed client work

2. Showcase imagery
   - finished garments
   - product mockups
   - portfolio work
   - product categories

3. Brand/decorative imagery
   - fabric details
   - close-up details
   - textures
   - atmospheric visual assets

Hard rules:

- Never select an image based only on its filename.
- Inspect the actual visual content.
- Never use client logos as hero imagery.
- Never use a product mockup as manufacturing-process proof.
- Never use an office building as proof of factory operations.
- Never imply a stock image is an actual Multi Andria facility or workforce.
- Never fabricate missing photography.
- If no semantically correct image exists, use `CONTENT NEEDED` and design the section so imagery can be added later.

Known uploaded assets:

### Asset A: Custom black T-shirt project

Use:
- Portfolio featured project
- Product/capability showcase

Do not use:
- Manufacturing-process proof
- Factory/facility proof
- Primary homepage hero unless the composition is intentionally redesigned and it remains visually strong

### Asset B: Multi Andria HQ office

Use:
- Tentang Kami hero
- Company/location section

Do not use:
- Manufacturing hero
- Production-process section
- Factory proof

## Design Direction

The existing brand direction should remain recognizable:

- Primary red: approximately `#AF2222`
- Dark charcoal: approximately `#181818`
- Warm off-white: approximately `#F8F6F2`
- Strong black/white contrast
- Plus Jakarta Sans or the already configured project typography
- Restrained radius
- Minimal shadows
- Editorial spacing
- Photography-led where authentic photography exists
- Strong typography
- Subtle, purposeful motion

The redesign should feel:

- premium
- industrial
- editorial
- confident
- warm
- trustworthy
- modern
- fashion-oriented

Avoid:

- generic SaaS layouts
- generic ecommerce grids
- excessive rounded cards
- excessive pill UI
- glassmorphism
- excessive gradients
- decorative noise
- repetitive "heading + three cards" sections
- oversized text with no information value
- motion for motion's sake
- fake testimonials or claims
- unrelated stock photography

## Taste Skill Integration

Use Taste Skill v2 as an external design skill, not as a replacement for this project's rules.

Recommended installation:

```bash
npx skills add https://github.com/Leonxlnx/taste-skill --skill "design-taste-frontend"
```

For this existing-project redesign, optionally install:

```bash
npx skills add https://github.com/Leonxlnx/taste-skill --skill "redesign-existing-projects"
```

For long implementation tasks where output completeness is a problem:

```bash
npx skills add https://github.com/Leonxlnx/taste-skill --skill "full-output-enforcement"
```

Use `image-to-code` only when a concrete visual reference is intentionally being translated into code:

```bash
npx skills add https://github.com/Leonxlnx/taste-skill --skill "image-to-code"
```

Do not install every Taste Skill variant. Avoid simultaneously applying conflicting visual styles such as minimalist, brutalist, and soft visual-direction skills.

Recommended order:

1. `redesign-existing-projects` for audit-first existing-project work.
2. `design-taste-frontend` for visual direction and implementation.
3. Project-local `multiandria-ui` for brand/business constraints.
4. Project-local `image-audit` whenever imagery is selected.
5. Project-local `ui-quality` before declaring a UI task complete.

Project-local skills are authoritative for Multi Andria business and asset rules.

## OpenCode Skills

Project-local skills live in:

```text
.opencode/skills/
```

Current custom skills:

- `multiandria-ui`
- `image-audit`
- `ui-quality`

OpenCode should load skills on demand. Do not copy third-party Taste Skill source into this repository unless intentionally vendored and reviewed.

## Implementation Rules

### Existing architecture

- Prefer existing Blade components over duplicating markup.
- Reuse existing route/model/controller logic when possible.
- Do not introduce React, Vue, Inertia, Livewire, or another frontend framework solely for visual redesign.
- Continue using Laravel Blade + Tailwind CSS v4 + the project's existing JavaScript approach.
- Preserve existing backend behavior unless a UX requirement genuinely needs a backend change.

### Components

Create or extend components when the pattern is truly reusable.

Good reusable candidates:
- page hero
- CTA
- section heading
- metric/proof block
- portfolio/project card
- product category block
- process step
- location card
- client logo group

Do not abstract a component merely because two sections share superficial HTML.

### Responsive design

Design mobile deliberately.

Every major page change must be considered at:
- small mobile
- large mobile
- tablet
- desktop
- wide desktop

Do not rely on desktop CSS shrinking into mobile.

Avoid horizontal overflow.

### Accessibility

Before completion:
- semantic headings
- meaningful link/button labels
- keyboard-visible focus states
- sufficient contrast
- appropriate alt text
- decorative images marked appropriately
- reduced-motion support for non-essential animation
- no interaction that depends only on hover

### Performance

- Do not ship oversized images when an optimized derivative is possible.
- Prefer modern image formats when the existing asset pipeline supports them.
- Define image dimensions/aspect ratios to reduce layout shift.
- Lazy-load below-the-fold imagery where appropriate.
- Avoid adding a heavy JS animation library when CSS or existing project utilities are sufficient.
- Keep hero media intentional and optimized.

## Animation

Animation should reinforce hierarchy and orientation.

Prefer:
- subtle reveal
- transform/opacity transitions
- image crop/reveal
- restrained hover states
- section entrance when it improves comprehension

Avoid:
- constant looping motion
- excessive parallax
- magnetic cursor effects everywhere
- animation that delays content access
- animation that creates accessibility problems

Respect `prefers-reduced-motion`.

## Route and SEO Safety

When consolidating pages:

- Identify current route names and links before editing.
- Preserve important inbound URLs through redirects where appropriate.
- Update navigation, breadcrumbs, canonical URLs, internal links, sitemap-related references, and metadata.
- Avoid duplicate indexable pages containing essentially the same content.
- Do not remove a legacy route until its replacement and redirect behavior are verified.

## Content Safety

If required copy is missing:
- use existing verified copy,
- write only generic UX microcopy that does not introduce a new business claim,
- or mark the content as `CONTENT NEEDED`.

Never invent:
- client names
- production capacity
- certifications
- years of operation
- workforce numbers
- factory capabilities
- geographic coverage
- project outcomes

## Required Workflow

For a major redesign task:

### Phase 0: Read

Read:
- `AGENTS.md`
- `PROJECT_INSTRUCTIONS.md`
- relevant docs
- relevant Blade/controller/routes/components

### Phase 1: Audit

Do not modify code.

Produce:
- information architecture audit
- visual audit
- UX/conversion audit
- responsive audit
- accessibility audit
- performance/image audit
- component/reuse audit
- route/SEO audit
- image inventory

### Phase 2: Design direction

Define:
- page narratives
- hero direction per page
- section order
- imagery mapping
- motion strategy
- component changes

### Phase 3: Foundation

Implement:
- shared hero/component improvements
- navigation/IA consolidation
- tokens/utilities only when needed
- image handling

### Phase 4: Pages

Implement one canonical page at a time:
1. Home
2. Tentang Kami
3. Layanan
4. Portofolio

### Phase 5: QA

Run:
- formatter/linter if configured
- Laravel tests if relevant
- build/assets checks
- route checks
- responsive checks
- accessibility checks
- visual review

### Phase 6: Report

Summarize:
- changed files
- design decisions
- image choices
- known content gaps
- tests/checks run
- remaining risks

Do not claim a check passed unless it was actually performed.

## Git Hygiene

Prefer small, reviewable commits.

Suggested commit boundaries:

- `docs: add opencode ui ux guidance`
- `refactor: consolidate public service routes`
- `feat: redesign homepage visual hierarchy`
- `feat: redesign about page`
- `feat: consolidate services and manufacturing`
- `feat: consolidate portfolio and products`
- `perf: optimize page imagery`
- `fix: refine responsive ui`

Do not mix unrelated backend changes into UI redesign commits.
