# UX Audit — Multi Andria Indonesia

Based on direct inspection of multiandriaindonesia.com (Home, Products, Product Detail, Cart, Track Order, About Us) on 2026-08-26. See `DISCOVERY.md` for full source detail. Priorities: **Critical / High / Medium / Low**.

---

## Current Strengths

- A real, verified company timeline with specific years, employee counts, factory size, and named clients — rare and valuable for a B2B manufacturer site.
- Clear B2B vs. B2G/BUMN client segmentation already exists as data, just not surfaced as a dedicated trust section.
- Product data already includes MOQ, materials, sizes, colors — close to what a manufacturer showcase card needs.
- Consistent footer contact information on every page.
- Server-rendered Laravel/Blade architecture — no SPA overhead, a good performance baseline.

---

## Conversion Issues

### 1. The entire site is modeled as consumer ecommerce, not B2B lead generation
**Problem:** Every product has "Add to Cart," a running "Estimated Total," and a Cart page — a self-checkout retail pattern, not a manufacturing quotation pattern.
**Why it matters:** Garment manufacturing pricing isn't fixed-SKU retail pricing; procurement buyers expect a consultation/quotation process. The current flow sets the wrong expectation and may suppress inquiries from serious B2B/B2G buyers who want to talk to a person, not "check out."
**Recommended solution:** Replace Add to Cart / Cart / Checkout entirely with WhatsApp-based inquiry CTAs.
**Priority:** Critical

### 2. No path to human contact anywhere except a footer email/phone
**Problem:** Zero WhatsApp integration; no quotation form; no Contact page.
**Why it matters:** WhatsApp consultation is meant to be the primary conversion goal, and right now there is no primary conversion mechanism at all — only "View Products," a dead end for anyone not ready to self-checkout.
**Recommended solution:** Persistent WhatsApp CTA in header, hero, every product card, every major section, plus a floating/sticky mobile button.
**Priority:** Critical

### 3. Every CTA leads to browsing, never to contact
**Problem:** "Browse Products," "View Products," "View Details" — no CTA anywhere says "talk to us" or "get a quote."
**Recommended solution:** Introduce a clear primary/secondary CTA hierarchy: **Konsultasi via WhatsApp / Minta Penawaran** as primary, **Lihat Produk** as secondary, everywhere.
**Priority:** Critical

### 4. Cart/checkout friction is baked into the IA
**Problem:** The site invites a multi-field Add-to-Cart form (quantity, size, color, file upload) with no clear next step after "Add to Cart" — a high-friction pattern for a process buyers would rather do over chat.
**Recommended solution:** Remove entirely; replace with a single-tap, context-aware WhatsApp CTA per product.
**Priority:** Critical

---

## Trust Issues

### 5. Homepage doesn't establish trust before asking for action
**Problem:** Hero → stats → product chips → featured products, all before any real company story, process, or credibility signal beyond four small numbers.
**Why it matters:** B2B/B2G procurement buyers vet suppliers before contacting them. The strongest trust signals (timeline, real clients, process, QC) currently live on a separate About page most homepage visitors never reach.
**Recommended solution:** Bring company introduction, statistics, and client trust higher into the homepage flow (see `HOMEPAGE_ARCHITECTURE.md`).
**Priority:** High

### 6. No manufacturing/process explanation
**Problem:** Nothing on the site explains *how* MAI manufactures — in-house or subcontracted, what capacity, what process stages, what QC.
**Why it matters:** This is the single biggest question a serious buyer has: "can this company actually produce what I need, reliably, at my volume?" Both reference sites answer this prominently; MAI's site never does.
**Recommended solution:** Dedicated Manufacturing page and homepage section, using only verified capability data (`CONTENT NEEDED` marked where unverified).
**Priority:** Critical

### 7. No portfolio despite having real project history
**Problem:** The About page timeline mentions real named projects (Ministry of Health masks, MPR RI, Bawaslu, Pertamina, Bank Mandiri) but none are shown visually as a portfolio.
**Why it matters:** This is free, already-verified credibility content sitting unused.
**Recommended solution:** Build a Portfolio page/section from timeline data plus real project photography once supplied; mark missing photography `CONTENT NEEDED` rather than substituting stock imagery.
**Priority:** High

### 8. No certifications, no testimonials
**Problem:** No certifications and no client testimonials appear anywhere on the current site.
**Recommended solution:** Do not fabricate either. Launch without a testimonials section until real quotes exist; omit a certifications block entirely unless the business confirms actual certifications.
**Priority:** Medium

---

## Navigation Issues

### 9. Ecommerce-only navigation with no B2B pages
**Problem:** Nav is Home · Products · Track Order · About Us · Cart — no Services, Manufacturing, Portfolio, or Contact.
**Recommended solution:** New primary navigation per `SITEMAP.md`, with a persistent "Konsultasi via WhatsApp" nav CTA replacing the cart icon.
**Priority:** Critical

---

## Product Presentation Issues

### 10. Sparse catalog (1 SKU per category)
**Problem:** Every one of the 10 categories has exactly one example product.
**Why it matters:** A catalog this sparse can look unfinished or low-volume next to a "5,000 pcs/day" capability claim.
**Recommended solution:** Either source more real product photography per category before launch, or explicitly reframe the section as "capability examples" rather than an exhaustive catalog. Business input required.
**Priority:** Medium

### 11. Minor factual inconsistency
**Problem:** Homepage says "9+ Product Types"; About page says "10 Product Categories."
**Why it matters:** Small inconsistencies undermine the credibility the whole redesign is built to establish.
**Recommended solution:** Confirm the correct current count with the business and use one number consistently.
**Priority:** Low

### 12. Generic ecommerce visual language
**Problem:** Product cards, filters, and cart look like a generic Laravel ecommerce starter kit, not an industrial/fashion manufacturer.
**Recommended solution:** New visual system per `DESIGN_DIRECTION.md` — editorial layout, large photography, manufacturer-catalog framing rather than storefront framing.
**Priority:** High

### 13. AI-sounding, hedged product copy
**Problem:** Descriptions use uncertain language ("possibly a heather or pique knit," "likely canvas or heavy cotton").
**Why it matters:** Undermines authority — a manufacturer should know exactly what its own product is made of.
**Recommended solution:** Rewrite in confident, specific language once real material/spec data is confirmed; anything unverifiable becomes `CONTENT NEEDED`, not a hedge published to visitors.
**Priority:** Medium

---

## Content Issues

- No testimonials exist on MAI's own site. Do not port over the reference sites' testimonials — those belong to a different/related entity and would be fabricated content if reused for MAI. `CONTENT NEEDED`.
- No confirmed certifications, current machine counts, or factory square footage beyond the verified 1,860 m² Sukabumi figure (2020). `CONTENT NEEDED` for anything more specific or current.
- No confirmed WhatsApp number or default greeting. `CONTENT NEEDED`.
- No confirmed lead-time figures — Akarsa's "14 hari kerja setelah DP" is Akarsa's number, not MAI's, and must not be reused without verification. `CONTENT NEEDED`.

---

## WhatsApp Conversion Issues

### 14. No WhatsApp integration exists at all today
**Problem:** Zero WhatsApp links anywhere on the current site, despite it being the intended primary sales channel.
**Why it matters:** This is the single biggest gap between the current site and the target business model.
**Recommended solution:** Centralized `config('company.whatsapp.number')` + `config('company.whatsapp.default_message')`, a reusable `<x-whatsapp-button>` Blade component, and section-specific pre-filled messages (homepage, product, portfolio, manufacturing) as specified in the project instructions.
**Priority:** Critical

---

## Mobile Issues

### 15. Mobile behavior could not be directly verified
**Problem:** This audit fetched server-rendered HTML only, not a real browser/device emulation — true responsive/touch behavior was not directly observed.
**Why it matters:** Given the product page's dense modal forms (quantity, size dropdown, color palette, file upload, notes, live price calculation) visible in the desktop HTML, this is very likely cramped and error-prone on mobile purely from field density — but this is a risk flag, not a confirmed finding.
**Recommended solution:** Re-verify visually once the new build is in progress, in a real browser, at real breakpoints.
**Priority:** Medium (re-audit once mobile rendering can be directly observed)

---

## Technical Issues

- No repository was available to inspect (see `DISCOVERY.md` Task 1) — PHP/Laravel/Tailwind/Vite versions, database schema, and admin functionality are unknown until a repo is provided, or confirmed not to exist.
- Laravel confirmed via CSRF meta tag on every page — the backend framework choice does not need to change.
- Core Web Vitals, image optimization, and caching strategy cannot be assessed without either the repo or a live performance audit — recommend a Lighthouse pass once a staging URL exists.

---

## Opportunities

1. The verified company timeline is a genuinely strong, differentiated trust asset — most competitors (including both references) lean on vaguer claims. Lead with it.
2. Real named B2G clients (MPR RI, Bawaslu, Pertamina, Bank Mandiri, Kementerian Pertanian, Kemenperin) are unusually strong institutional credibility signals for this market — worth a dedicated, prominent treatment rather than a small logo strip.
3. Moving from cart-based to WhatsApp-based conversion likely *reduces* engineering complexity (no payments, no checkout, no cart persistence) while *improving* conversion — a rare case where the right UX is also the simpler build.
4. Because the current business already runs on Laravel/Blade in spirit, a rebuild that keeps that stack is not a framework risk — it's a continuation.
