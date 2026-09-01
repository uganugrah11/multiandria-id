Implement the approved redesign foundation.

Before editing:
- read AGENTS.md
- read PROJECT_INSTRUCTIONS.md
- load `design-taste-frontend`
- load `multiandria-ui`
- review the completed audit

Do not redesign all pages in this task.

Focus only on the shared foundation:

1. Canonical navigation:
   Home
   Tentang Kami
   Produk
   Layanan
   Portofolio

2. Consolidate Manufacturing into Layanan.

3. Consolidate Product and Portfolio into Portofolio.

4. Preserve legacy URLs with redirects where appropriate.

5. Update internal navigation and canonical references.

6. Build or improve a reusable page hero pattern that supports page-specific compositions instead of one identical dark title band.

Hero rules:
- Home: production/product-led
- Tentang Kami: HQ/company identity
- Layanan: service/process-led
- Portofolio: finished-product/work-led

7. Improve shared CTA hierarchy.

8. Preserve Laravel Blade + Tailwind v4 architecture.

9. Do not use unrelated stock photography.

10. Do not add new business claims.

After implementation:
- run relevant tests/build checks
- inspect route behavior
- inspect responsive behavior
- report exact files changed
- report anything not verified

Do not proceed into detailed page redesign in this task.
