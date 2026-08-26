# Homepage Architecture — Multi Andria Indonesia (Proposed)

Conversion goal hierarchy: **Primary — Konsultasi via WhatsApp. Secondary — Lihat Produk.**

Section order follows the required visitor journey (Who are they? → What do they manufacture? → Can they produce what I need? → Can I trust them? → How do they manufacture? → What have they produced? → How do I contact them? → WhatsApp), with trust signals pulled earlier than the current site places them (see `UX_AUDIT.md` #5).

---

### 1. Hero
- **Purpose:** Immediate identity, capability statement, and primary conversion, above the fold.
- **User question answered:** "Who is this, and what do they make?"
- **Content:** Headline direction — e.g. *"Partner Produksi Garment untuk Bisnis dan Institusi Anda"* (not final copy — to be refined once positioning is confirmed with the business). One supporting sentence stating custom garment/textile manufacturing for businesses, institutions, and organizations. Primary CTA **Konsultasi via WhatsApp**; secondary CTA **Lihat Produk**.
- **Layout:** Full-bleed or large split hero with real production/factory photography. `CONTENT NEEDED` — no real photography currently exists; do not substitute generic stock photography as final content.
- **Visual direction:** Large editorial headline type, generous negative space, warm ivory or photography background — not a busy multi-element hero.
- **Mobile behavior:** Text stacks above a single CTA pair; hero image becomes a shorter banner rather than an awkward crop of the desktop image.

### 2. Company Introduction
- **Purpose:** Establish who MAI is, in real terms, immediately after the hero.
- **User question answered:** "What is this company's story, and are they stable?"
- **Content:** Condensed version of the verified 2012 → 2024 timeline (est. 2012, incorporated 2018, HQ Bintaro + factory Sukabumi, 600 employees, 5,000 pcs/day) — pulled from the About page, never invented.
- **Layout:** Split image/text, or a compact horizontal timeline strip as a visual variant — the timeline is a genuine asset worth surfacing here, not only on the About page.
- **CTA:** Text link through to the full Tentang Kami page.
- **Mobile behavior:** Text stacks above image; a timeline strip becomes horizontally scrollable.

### 3. Trust / Statistics
- **Purpose:** Numeric credibility before asking for any further scroll commitment.
- **User question answered:** "Is this a real, established operation?"
- **Content:** Verified numbers only — **12+ Years Experience, 100+ Happy Clients, 5,000 pcs/day production capacity (2024), 600+ Employees.** Reconcile "9+ vs. 10 product types" before publishing either.
- **Layout:** 4-stat strip, large numerals, short labels, server-rendered starting values (avoid the "0+" flash bug observed on the AFIT reference).
- **Mobile behavior:** 2×2 grid rather than a cramped 4-across row.

### 4. Product Categories
- **Purpose:** Show manufacturing breadth.
- **User question answered:** "Do they make what I need?"
- **Content:** The 10 existing categories (T-Shirt, Jacket, Pants, Joggers, Dress, Gamis, Hijab, Mukena, Alma Mater, Tote Bag), reframed as capability categories rather than a thin 1-SKU storefront grid.
- **Layout:** Large image tiles, one confident description line each, no price shown here.
- **CTA:** **Lihat Produk** (secondary).
- **Mobile behavior:** Horizontal scroll or 2-column grid, large tap targets.

### 5. Manufacturing Capabilities
- **Purpose:** Explain what MAI can actually do and how production works.
- **User question answered:** "Can they handle bulk or custom orders, and how does working with them work?"
- **Content:** Only verified capabilities (cutting, sewing, printing, embroidery, finishing, QC, packaging — `CONTENT NEEDED` to confirm which apply to MAI specifically, and whether CMT/FOB service models are offered). Process journey (e.g. Consultation → Design → Material → Cutting → Sewing → Finishing → QC → Packaging → Delivery) shown only once actual MAI process steps are confirmed.
- **Layout:** Horizontal process cards / journey strip.
- **CTA:** **Konsultasikan Kebutuhan Produksi** → WhatsApp with a manufacturing-context message.
- **Mobile behavior:** Vertically stacked steps, or a horizontally swipeable strip with a step indicator.

### 6. Why Multi Andria
- **Purpose:** Concise, scannable trust pillars.
- **User question answered:** "Why this company over another?"
- **Content:** Short-card format (à la the Akarsa "4 Motto" pattern) — Quality Control, Custom Production, Production Capability, Reliable Lead Time, Professional Support, Competitive Pricing — trimmed to only what MAI can substantiate. No unverifiable claims.
- **Layout:** 4–6 short cards, icon + one-line claim, no long paragraphs.
- **Mobile behavior:** 2-column grid or a single stacked column.

### 7. Portfolio (preview)
- **Purpose:** Visual proof of delivered work.
- **User question answered:** "Have they actually done this before, for real clients?"
- **Content:** 4–6 featured projects drawn from MAI's verified timeline (Ministry of Health mask production, MPR RI procurement, Bawaslu, Pertamina). `CONTENT NEEDED`: real photographs of these projects — none currently exist. Do not substitute stock photography for a specific named project.
- **Layout:** One large featured project plus a supporting grid.
- **CTA:** **Buat Produk Serupa** → WhatsApp.
- **Mobile behavior:** Featured project full-width; supporting grid becomes horizontal scroll.

### 8. Client / Trust Signals
- **Purpose:** Logo-based social proof, segmented by buyer type.
- **User question answered:** "Do real businesses and government institutions trust them?"
- **Content:** MAI's existing verified logo lists, split **B2B Clients** and **B2G & BUMN Clients**, exactly as already organized on the current site.
- **Layout:** Grayscale logo grid, two labeled groups.
- **Mobile behavior:** Horizontally scrollable logo strip per group, not a cramped tiny grid.

### 9. Testimonials
- **Purpose:** Human-voice trust signal.
- **User question answered:** "What do other clients say about working with them?"
- **Content:** `CONTENT NEEDED` — MAI has no verified testimonials of its own today. Do not reuse the reference sites' testimonials, which belong to separate entities.
- **Recommendation:** omit this section entirely at launch rather than fabricate quotes; add once 3–5 real testimonials are collected.
- **Layout (once content exists):** Quote + name + company.

### 10. FAQ
- **Purpose:** Pre-answer procurement due-diligence questions before they become a WhatsApp back-and-forth (or a lost visitor).
- **User question answered:** "What's the MOQ, can I use my own material, how long does production take, do you do CMT/FOB, how do I get a quote?"
- **Content:** Structure modeled on the Akarsa reference (location, capability, lead time, mockup process, payment flexibility, factory visits), answered only with MAI-verified facts. Anything unconfirmed stays unpublished as `CONTENT NEEDED` rather than a guessed answer.
- **Layout:** Accordion.
- **Mobile behavior:** Full-width accordion, one item open at a time.

### 11. Final WhatsApp CTA
- **Purpose:** Last, highest-visual-weight conversion prompt.
- **Content:** Direction — *"Siap Memulai Produksi?"* / *"Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia."* (not final copy). Primary **Konsultasi via WhatsApp**; secondary **Lihat Produk**.
- **Layout:** Full-width band, strongest color contrast on the page (this is one of the few places the brand red should dominate, per the color ratio in `DESIGN_DIRECTION.md`).
- **Mobile behavior:** Stacked, full-width tap-target CTAs.

### 12. Footer
Logo + short description, primary navigation (Tentang Kami, Produk, Layanan, Manufacturing, Portfolio — no Kontak link, per the no-dedicated-contact-page decision), email, phone, HQ and factory addresses each with a "Lihat di Google Maps" link, social links (`CONTENT NEEDED`), copyright. This is the page-wide, compact counterpart to the full Google Maps section on `/tentang-kami`.

---

## Sections Deliberately Simplified or Deferred (flagged for approval)

- **Manufacturing Capabilities** and **Manufacturing Process** are merged into one homepage section rather than kept as two similar back-to-back sections — proposed simplification.
- **Testimonials omitted at launch** until real testimonials exist — do not fabricate.
- A separate "Featured Products" section is folded into **Product Categories** rather than duplicated, since the catalog currently has only 1 SKU per category; revisit once the catalog is fuller.
