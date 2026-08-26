# UX Audit — Multi Andria Indonesia

Based on live inspection of multiandriaindonesia.com (Home, Products, Product Detail, Cart, Track Order, About Us). Priorities: **Critical / High / Medium / Low**.

---

## Current Strengths

- Real, verified company timeline with specific years, employee counts, m² factory size, and named clients — rare and valuable for a B2B manufacturer site.
- Clear B2B vs. B2G/BUMN client segmentation already exists as data (just not well surfaced as a trust *section*).
- Product data already includes MOQ, materials, sizes, colors — the underlying data model is close to what a manufacturer catalog needs.
- Consistent footer with real contact information on every page.
- Server-rendered Laravel/Blade architecture — no SPA overhead, good performance baseline to build on.

---

## UX Problems

### 1. Entire site is modeled as consumer ecommerce, not B2B lead generation
**Problem:** Every product has "Add to Cart," a running "Estimated Total," and a Cart page — this is a self-checkout retail pattern, not a manufacturing quotation pattern.
**Why it matters:** Garment manufacturing pricing is not fixed-SKU retail pricing; procurement buyers expect a consultation/quotation process, not an instant "buy now" price. The current flow sets the wrong expectation and may actually suppress inquiries from serious B2B/B2G buyers who don't want to "checkout" — they want to talk to a human.
**Recommended solution:** Replace Add to Cart / Cart / Checkout entirely with WhatsApp-based inquiry CTAs, as specified in PROJECT_INSTRUCTIONS.md's "Commerce & Conversion Model."
**Priority:** Critical

### 2. No path to human contact anywhere except a footer email/phone
**Problem:** Zero WhatsApp integration; no quotation form; no "Contact Us" page.
**Why it matters:** The instructions identify WhatsApp consultation as the *primary* conversion goal. Right now there is no primary conversion mechanism at all — only "View Products," a dead end for anyone who doesn't want to self-checkout.
**Recommended solution:** Add persistent WhatsApp CTA in header, hero, every product card, every major section, and a floating/sticky WhatsApp button.
**Priority:** Critical

### 3. Homepage doesn't establish trust before asking for action
**Problem:** Hero → stats → product chips → featured products, all before any real company story, process, or credibility signal beyond four small numbers.
**Why it matters:** B2B/B2G procurement buyers vet suppliers before contacting them. Trust signals (timeline, real clients, process, QC) are on a separate About page most homepage visitors won't reach.
**Recommended solution:** Bring the timeline/stats/company introduction and client trust section higher in the homepage flow (see `HOMEPAGE_ARCHITECTURE.md`).
**Priority:** High

### 4. No manufacturing/services/process explanation
**Problem:** Nothing on the site explains *how* MAI manufactures (CMT? FOB? in-house? subcontracted? what capacity, what machines, what QC?).
**Why it matters:** This is the single biggest question a serious buyer has: "can this company actually produce what I need, at my volume, reliably?" Reference sites answer this prominently; MAI's site never does.
**Recommended solution:** Add a dedicated Manufacturing/Services page + homepage section, using only verified capability data (CONTENT NEEDED where unverified).
**Priority:** Critical

### 5. No portfolio despite having real project history
**Problem:** The About page timeline mentions real named projects (Ministry of Health masks, MPR RI, Bawaslu, Pertamina, Bank Mandiri) but none are shown visually as a portfolio.
**Why it matters:** This is free, already-verified credibility content sitting unused.
**Recommended solution:** Build a Portfolio page/section from timeline data plus any real project photography the client can supply. Where photography is missing, mark `CONTENT NEEDED` rather than inventing images.
**Priority:** High

### 6. No FAQ
**Problem:** No FAQ page or section exists.
**Why it matters:** Reference site akarsa.co.id shows how effective a procurement-focused FAQ is at pre-answering objections (lead time, CMT/FOB, mockups, payment terms, factory visits) that would otherwise require a WhatsApp back-and-forth or, worse, cause the visitor to leave.
**Recommended solution:** Add FAQ section per Section 14 of instructions, answered only with verified information; unknowns marked `CONTENT NEEDED`.
**Priority:** Medium

### 7. Sparse catalog (1 SKU per category)
**Problem:** Every one of the 10 categories has exactly one example product.
**Why it matters:** A catalog this sparse can look unfinished or low-volume to a buyer comparing suppliers, undermining the "handles bulk/large-scale production" positioning.
**Recommended solution:** Either (a) source more real product photography/examples per category before launch, or (b) reframe the section explicitly as "capability examples" rather than an exhaustive catalog, so a small count doesn't read as a limitation. Business input required.
**Priority:** Medium

### 8. Minor factual inconsistency
**Problem:** Homepage stat says "9+ Product Types"; About page says "10 Product Categories." Both can't be the precise, confident number instructions Section 30 asks for.
**Why it matters:** Small inconsistencies undermine the "trustworthy, professional" positioning the whole redesign is built around.
**Recommended solution:** Confirm the correct current count with the business and use one number consistently.
**Priority:** Low

---

## UI Problems

### 9. Generic ecommerce visual language
**Problem:** Product cards, filters, and cart page look like a generic Laravel ecommerce starter kit, not an industrial/fashion manufacturer.
**Recommended solution:** New visual system per `DESIGN_DIRECTION.md` — editorial layout, large photography, manufacturer-catalog framing rather than storefront framing (per instructions Section 40).
**Priority:** High

### 10. AI-sounding, hedged product copy
**Problem:** Descriptions use uncertain language ("possibly a heather or pique knit," "likely canvas or heavy cotton").
**Why it matters:** Undermines authority — a manufacturer should know exactly what its own product is made of.
**Recommended solution:** Rewrite copy in confident, specific language once real material/spec data is confirmed by the business; flag anything unverifiable as `CONTENT NEEDED` rather than hedging in public copy.
**Priority:** Medium

---

## Conversion Problems

### 11. Every CTA leads to browsing, never to contact
**Problem:** "Browse Products," "View Products," "View Details" — no CTA anywhere says "talk to us" or "get a quote."
**Recommended solution:** Introduce primary/secondary CTA hierarchy exactly as instructions Sections 4 and "Primary Conversion" specify: **Konsultasi via WhatsApp / Minta Penawaran** primary, **Lihat Produk** secondary.
**Priority:** Critical

### 12. Cart abandonment risk baked into the IA
**Problem:** The site invites users into a multi-field Add-to-Cart form (quantity, size, color, file upload) with no clear next step after "Add to Cart" — a classic high-friction, high-abandonment pattern for a process buyers actually want to do over chat.
**Recommended solution:** Remove entirely, replace with single-tap WhatsApp CTA per product (see Product CTA Behavior in instructions).
**Priority:** Critical

---

## Mobile Problems

We were not able to test live responsive/touch behavior directly in this session (no live browser/device emulation was used — only server-rendered HTML was fetched). Given the product page's dense modal forms (quantity, size dropdown, color palette, file upload, notes, live price calculation) observed in the desktop HTML, this is very likely to be **cramped and error-prone on mobile** purely from form-field density, independent of any responsive CSS quality. This should be re-verified visually once the new build is in progress; flagged as a risk rather than a confirmed problem.
**Priority:** Medium (recommend re-audit once mobile rendering can be directly observed)

---

## Content Problems

- No testimonials exist on MAI's own site (do not port over the reference sites' testimonials — those belong to a different/related entity and would be fabricated content if reused for MAI). **CONTENT NEEDED.**
- No confirmed certifications, exact machine counts, or factory square footage beyond the one verified 1,860 m² Sukabumi figure from 2020. **CONTENT NEEDED** for anything more specific/current.
- No confirmed WhatsApp number. **CONTENT NEEDED.**
- No confirmed lead-time figures (reference site Akarsa states "14 hari kerja setelah DP" — that is Akarsa's number, not MAI's, and must not be reused for MAI without verification). **CONTENT NEEDED.**

---

## Technical Problems

- No repository was available to inspect (see `DISCOVERY.md` Section 0) — PHP/Laravel/Tailwind/Vite versions, database schema, and admin functionality are all unknown pending repo access.
- Confirmed Laravel via CSRF meta tag on every page — consistent with required stack, so at minimum the backend framework choice does not need to change.
- Cannot verify current Core Web Vitals, image optimization, or caching strategy without either the repo or a live performance audit tool — recommend a Lighthouse/PageSpeed pass once we have a stable staging URL to test.

---

## Opportunities

1. The verified company timeline is a genuinely strong, differentiated trust asset — most competitors' sites (including both references) lean on vaguer claims. Lead with it.
2. Real named B2G clients (MPR RI, Bawaslu, Pertamina, Bank Mandiri, Kementerian Pertanian, Kemenperin) are unusually strong institutional credibility signals for this market segment — worth a dedicated, prominent treatment rather than a small logo strip.
3. Moving from a cart-based to a WhatsApp-based model will likely *reduce* engineering complexity (no payments, no checkout, no cart persistence) while *improving* conversion — a rare case where doing the right UX thing is also the simpler build.
4. Because the current backend is already Laravel/Blade, we may be able to reuse the product/category data model (with cart/order logic stripped) rather than rebuilding data entry from scratch — pending repo access.
