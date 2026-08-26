# Implementation Roadmap — Multi Andria Indonesia (Proposed)

This roadmap assumes approval of the direction in `SITEMAP.md`, `HOMEPAGE_ARCHITECTURE.md`, and `DESIGN_DIRECTION.md`, and does not begin until that approval is given (per instructions §41/§37).

---

## Phase 0 — Repository & Content Intake (blocking, before any code)
**What:** Obtain access to the existing Laravel repository (if one exists) and collect the highest-priority `CONTENT NEEDED` items (WhatsApp number, logo/brand assets, CMT/FOB confirmation, at least a handful of real photographs).
**Dependencies:** None — this can start immediately.
**Expected result:** A real technical audit becomes possible (replacing the inferred-from-live-site assessment in `DISCOVERY.md`), and enough real content exists to avoid placeholder-heavy first pages.
**Testing:** N/A (content/access gathering phase).

## Phase 1 — Foundation
**What:** Laravel project setup/verification (routing skeleton for the new sitemap, base layout, Blade component scaffolding per instructions §27), Tailwind + Vite configuration, base `config('company.*')` structure including the WhatsApp config.
**Dependencies:** Phase 0 repo access (or confirmed from-scratch start).
**Expected result:** Clean project skeleton with routes for Home, Products, Services, Manufacturing, About, Portfolio, Contact (and Track Order if retained) — no visual design yet.
**Testing:** Routes resolve; base layout renders on all breakpoints without content.

## Phase 2 — Design System
**What:** Build `docs/DESIGN_SYSTEM.md` (colors, typography, spacing, radius, shadows, buttons, cards, forms, containers, breakpoints, motion) based on the approved direction from `DESIGN_DIRECTION.md`. Implement as Tailwind config + core Blade UI components (Button, Container, Section, Badge, Card, Heading, Input, Select, Modal, ProductCard, TestimonialCard, ClientLogo, CTA, WhatsAppButton).
**Dependencies:** Phase 1; approved color/typography direction.
**Expected result:** A working component library visible on a style-guide/demo page, reusable across every subsequent page.
**Testing:** Visual review of each component in isolation, at each breakpoint, with keyboard navigation and focus states checked (per instructions §22).

## Phase 3 — Homepage
**What:** Implement homepage sections per `HOMEPAGE_ARCHITECTURE.md`, in order, using approved/available content; sections with unresolved `CONTENT NEEDED` items ship with clearly marked placeholders rather than invented content.
**Dependencies:** Phase 2 component library; at least partial content from Phase 0.
**Expected result:** Fully responsive, functioning homepage establishing brand, layout, and interaction patterns for the rest of the site.
**Testing:** Cross-browser/breakpoint check; Lighthouse pass for Core Web Vitals baseline; WhatsApp CTA links verified to produce correct pre-filled messages.

## Phase 4 — Products
**What:** Build the Products page (category-filterable visual catalog, no cart/checkout), reusing existing product data (category, price, MOQ, materials, sizes, colors) with rewritten, confident copy and a WhatsApp CTA per product per the "Product CTA Behavior" spec.
**Dependencies:** Phase 2; decision on per-product-page vs. single-page-with-filters (see `SITEMAP.md` §2 open decision).
**Expected result:** Clean, professional catalog page replacing the current ecommerce grid/cart flow.
**Testing:** Filter/sort functionality; WhatsApp message correctly includes product name; mobile card layout reviewed given prior mobile risk flagged in `UX_AUDIT.md`.

## Phase 5 — Services & Manufacturing
**What:** Build Services and Manufacturing pages (and corresponding homepage sections) using only confirmed service/capability content from Phase 0.
**Dependencies:** Phase 0 content confirmation (CMT/FOB, process steps, capacity figures).
**Expected result:** Pages that directly answer "can they make what I need, at what scale, how."
**Testing:** Content review against `CONTENT_REQUIREMENTS.md` to confirm nothing unverified was published.

## Phase 6 — About & Portfolio
**What:** Build About Us (full timeline, vision/mission, stats) and Portfolio (real project photography where available, otherwise clearly marked placeholders) pages.
**Dependencies:** Phase 0 real photography for portfolio items; otherwise ships with placeholders and a note to revisit.
**Expected result:** Deep trust-building pages supporting serious procurement diligence.
**Testing:** Timeline data cross-checked once more against the verified source (current About page) to avoid transcription drift.

## Phase 7 — Contact & Conversion
**What:** Build dedicated Contact page (map, WhatsApp, email, phone, optional lightweight quote form per instructions §33), finalize Final CTA section, floating/sticky WhatsApp button site-wide, and (decision-dependent) the retained/simplified Track Order page.
**Dependencies:** Phases 3–6 for consistent CTA components; Phase 0 decision on Track Order.
**Expected result:** Every page has a clear, working path to WhatsApp; the conversion funnel described in `HOMEPAGE_ARCHITECTURE.md` is fully wired end-to-end.
**Testing:** Every CTA on every page manually click-tested for the correct destination/message; form validation tested if a quote form is included.

## Phase 8 — SEO
**What:** Titles, meta descriptions, canonical URLs, Open Graph/Twitter metadata, structured data (Organization, Product, Breadcrumb, FAQ where applicable), image alt text audit, internal linking pass.
**Dependencies:** All pages built (Phases 3–7).
**Expected result:** Every page meets the SEO checklist in instructions §28, with structured data only where genuinely supported by visible content.
**Testing:** Structured data validated (e.g., Rich Results Test); meta tags spot-checked per page.

## Phase 9 — Performance
**What:** Image optimization/responsive sizes, lazy loading, JS minimization, caching strategy, animation/motion audit for `prefers-reduced-motion` compliance.
**Dependencies:** Real photography in place (heavier real images need real optimization, not placeholder sizing).
**Expected result:** Strong Core Web Vitals scores; smooth mobile performance despite image-heavy design.
**Testing:** Lighthouse/PageSpeed Insights pass on mobile and desktop; manual test with reduced-motion OS setting enabled.

## Phase 10 — Testing & Launch
**What:** Full cross-device/browser QA, accessibility pass (keyboard nav, contrast, screen reader spot-check), content final review against `CONTENT_REQUIREMENTS.md` to confirm no placeholder text ships unintentionally, stakeholder sign-off, DNS/deployment cutover.
**Dependencies:** All prior phases.
**Expected result:** Production launch of the new site.
**Testing:** End-to-end conversion path testing (every CTA → WhatsApp with correct message); 404/redirect check for any old ecommerce URLs (`/cart`, `/checkout`, old `/products/{slug}` routes if the IA changes) to avoid broken inbound links/SEO loss.

---

## Cross-Cutting Risk Notes

- **Content-blocked phases:** Phases 5, 6, and 8 (structured data/FAQ schema) are the most exposed to `CONTENT_REQUIREMENTS.md` gaps. Recommend prioritizing Phase 0 content collection in parallel with Phases 1–2 (which don't require final content) so implementation isn't blocked later.
- **URL changes are an SEO risk:** if per-product detail pages (`/products/{slug}`) are removed in favor of a single filterable Products page, old URLs should 301-redirect rather than 404, to preserve any existing search equity.
- **Track Order ambiguity:** left unresolved, this could block Phase 7. Recommend getting a decision from the business early (ideally during Phase 0).
