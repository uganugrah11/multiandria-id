Read `AGENTS.md` and `PROJECT_INSTRUCTIONS.md` completely.

Load the relevant skills:
- `redesign-existing-projects` if installed
- `multiandria-ui`
- `image-audit`

Do not modify application code yet.

Audit the existing Multi Andria website for a major UI/UX redesign.

Inspect:
- routes
- controllers
- Blade views
- reusable components
- Tailwind v4 configuration
- public image assets
- local/untracked image assets if accessible
- existing documentation
- current navigation
- Product, Portfolio, Layanan, and Manufacturing implementations

Use the existing Home and Tentang Kami screenshots from the conversation as visual references for the current state.

The canonical information architecture should become:

Home
Tentang Kami
Produk
Layanan
Portofolio

Consolidate:
- Manufacturing -> Layanan
- Produk + Portfolio -> Portofolio

Do not implement the consolidation yet.

For imagery:
- inspect actual image contents, not filenames
- do not use HQ as manufacturing proof
- do not use product mockups as factory/process proof
- do not use client logos as hero imagery
- mark missing authentic imagery as CONTENT NEEDED

Known uploaded references:
- black custom T-shirt project: portfolio/showcase candidate
- Multi Andria HQ office: Tentang Kami/company identity candidate

Produce:
1. IA audit
2. visual audit
3. UX/conversion audit
4. responsive audit
5. accessibility audit
6. performance/image audit
7. component/reuse audit
8. route/SEO audit
9. complete image inventory
10. image-to-page mapping
11. proposed hero for each canonical page
12. proposed section order for each canonical page
13. exact files likely to change
14. risks
15. P0/P1/P2/P3 implementation plan

Do not invent business claims or missing content.
Do not edit code until this audit is complete.
