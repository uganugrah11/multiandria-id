# Implementation Roadmap — Multi Andria Indonesia

This roadmap assumes approval of the direction documented in `SITEMAP.md`, `HOMEPAGE_ARCHITECTURE.md`, `DESIGN_DIRECTION.md`, and `DESIGN_SYSTEM.md`. No implementation begins until that approval is given.

---

### Phase 1 — Discovery
**Purpose:** Understand what exists (repository, live site, references, brand) before designing or building anything.
**Result:** `docs/DISCOVERY.md` — confirms this repository has no existing application code (from-scratch build), documents the current live site's real content and structure, analyzes both reference sites for transferable UX principles, and confirms the brand red (`#AF2222`) directly from the logo file.
**Status:** Complete (this pass).

### Phase 2 — UX Architecture
**Purpose:** Decide what the new site's structure and homepage flow should be, based on Phase 1 findings.
**Result:** `docs/UX_AUDIT.md` (prioritized problems/solutions), `docs/SITEMAP.md` (proposed IA), `docs/HOMEPAGE_ARCHITECTURE.md` (section-by-section homepage plan) — all WhatsApp-first, zero ecommerce.
**Status:** Complete (this pass).

### Phase 3 — Design System
**Purpose:** Turn the brand direction into concrete, reusable tokens before any UI is built, so every later page draws from one system instead of ad hoc styling.
**Result:** `docs/DESIGN_DIRECTION.md` (brand personality, color ratio, photography/animation principles) and `docs/DESIGN_SYSTEM.md` (color tokens, chosen typeface with rationale, spacing/radius/shadow scales, button/card specs, breakpoints).
**Status:** Complete (this pass).

### Phase 4 — Laravel/Tailwind Foundation
**Purpose:** Stand up the actual project skeleton — nothing here exists yet (see Phase 1 finding).
**What:** Laravel install, Tailwind + Vite configuration using the tokens from Phase 3, base Blade layout, route skeleton for the Phase 2 sitemap (Home, Tentang Kami, Produk, Layanan, Manufacturing, Portfolio — no separate Kontak page, see Phase 9), centralized `config('company.*')` including `company.whatsapp.number` and `company.whatsapp.default_message`, and a reusable `<x-whatsapp-button>` Blade component.
**Dependencies:** Approved Phase 2–3 direction; the WhatsApp number from `CONTENT_REQUIREMENTS.md` (a placeholder config value can unblock development, but must not ship to production unconfirmed).
**Expected result:** Routes resolve; base layout renders at every breakpoint with no real content yet.

### Phase 5 — Homepage
**Purpose:** Build the homepage first, since it establishes the visual language every other page will reuse.
**What:** Implement each section from `HOMEPAGE_ARCHITECTURE.md` in order, using confirmed content where available and clearly marked placeholders where `CONTENT NEEDED` items remain unresolved — never invented content.
**Dependencies:** Phase 4 component/layout foundation.
**Expected result:** A fully responsive, functioning homepage that establishes brand, layout, and interaction patterns for the rest of the site.

### Phase 6 — Products Catalog
**Purpose:** Replace the current ecommerce grid/cart flow with the showcase-only catalog defined in `SITEMAP.md`.
**What:** Build the `/produk` page (category-filterable, no cart/checkout), reusing existing product data (category, materials, sizes, colors) with rewritten, confident copy and a per-product WhatsApp CTA carrying a product-specific pre-filled message.
**Dependencies:** Phase 3 card spec; the per-product-page vs. single-page decision noted in `SITEMAP.md` (default: single page).
**Expected result:** A clean, professional showcase page with zero purchasing mechanics.

### Phase 7 — Services + Manufacturing
**Purpose:** Answer "can they make what I need, at what scale, and how does working with them work."
**What:** Build `/layanan` and `/manufacturing` pages (and the corresponding homepage section), using only confirmed service/capability content — CMT/FOB status, process steps, and capacity figures from `CONTENT_REQUIREMENTS.md`.
**Dependencies:** Business confirmation of the manufacturing-capability content items.
**Expected result:** Pages that directly and credibly answer the buyer's core diligence question, with no unverifiable claims published.

### Phase 8 — Portfolio
**Purpose:** Surface the real project history that currently sits unused in the About page timeline.
**What:** Build `/portfolio` with category filtering, using real project photography where supplied; items without photography ship as clearly marked placeholders, not stock substitutes.
**Dependencies:** Real photography of named historical projects (`CONTENT_REQUIREMENTS.md`).
**Expected result:** A page that functions as visual proof of delivered work for serious B2B/B2G buyers.

### Phase 9 — About + Location
**Purpose:** Build the deepest trust page — including proof of where the company actually is. Per explicit instruction (2026-08-28), there is no separate Contact page; this phase is where location/contact information gets its permanent home instead.
**What:** `/tentang-kami` (full timeline, vision/mission, stats, and a "Lokasi Kami" section with Google Maps for both HQ and factory — done), a compact factory/HQ location card with map on `/manufacturing` (done), a footer address+map-link block on every page (done), plus the site-wide floating/sticky WhatsApp button and the Track Order decision from `CONTENT_REQUIREMENTS.md`.
**Dependencies:** Phases 5–8 for consistent CTA components; the Track Order decision.
**Expected result:** Every page has a clear, working path to WhatsApp or a mapped physical location; the full conversion funnel from `HOMEPAGE_ARCHITECTURE.md` is wired end-to-end.

### Phase 10 — SEO + Performance + Accessibility
**Purpose:** Make the finished site discoverable, fast, and usable by everyone, not just visually complete.
**What:** Unique titles/meta descriptions, canonical URLs, Open Graph metadata, Organization/FAQ/Breadcrumb structured data where genuinely supported by visible content, image alt text, semantic heading hierarchy; image optimization, lazy loading, minimal JS, caching strategy; keyboard navigation, focus states, WCAG-AA contrast check on all red usage, `prefers-reduced-motion` support.
**Dependencies:** All pages built (Phases 5–9).
**Expected result:** Every page passes the SEO checklist with real structured data, and a Lighthouse pass shows strong Core Web Vitals and accessibility scores.

### Phase 11 — Testing + Final Polish
**Purpose:** Confirm the site actually works end-to-end before launch, not just that each page looks right in isolation.
**What:** Cross-device/browser QA, accessibility spot-check (keyboard-only pass, screen reader spot-check), full content review against `CONTENT_REQUIREMENTS.md` to confirm no placeholder text ships unintentionally, every CTA on every page manually click-tested for the correct WhatsApp destination and message, 404/redirect check for any old ecommerce URLs (`/cart`, `/checkout`, old `/products/{slug}`) to avoid broken inbound links, stakeholder sign-off, deployment cutover.
**Dependencies:** All prior phases.
**Expected result:** Production launch.

---

## Cross-Cutting Risk Notes

- **Content-blocked phases:** Phases 7, 8, and 9 (structured data/FAQ schema in Phase 10) are the most exposed to open `CONTENT_REQUIREMENTS.md` items. Recommend starting content collection (WhatsApp number, logo vector export, CMT/FOB confirmation, at least a handful of real photographs) in parallel with Phases 4–5, which don't require final content, so later phases aren't blocked.
- **URL changes are an SEO risk:** if per-product detail pages (`/products/{slug}`) are retired in favor of a single filterable `/produk` page, old URLs should 301-redirect rather than 404, to preserve any existing search equity.
- **Track Order ambiguity:** left unresolved, this could stall Phase 9. Recommend getting a decision from the business early, ideally before Phase 4 begins.
