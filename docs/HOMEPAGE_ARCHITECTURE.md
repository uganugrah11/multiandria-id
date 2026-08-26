# Homepage Architecture — Multi Andria Indonesia (Proposed)

Conversion goal hierarchy: **Primary — Konsultasi via WhatsApp / Minta Penawaran. Secondary — Lihat Produk.**

Order below follows the "Recommended Homepage Flow" in the instructions, adapted to bring trust signals earlier (per `UX_AUDIT.md` #3).

---

### 1. Hero
- **Purpose:** Immediate identity + capability statement + primary conversion.
- **User question answered:** "Who is this, and what do they make?"
- **Content:** Headline (e.g., direction: *"Mitra Produksi Garment Terpercaya untuk Bisnis dan Institusi Anda"* — to be finalized, not final copy), one supporting sentence stating custom garment/textile manufacturing for businesses, institutions, and organizations (per instructions §7.1), primary CTA **Konsultasi via WhatsApp**, secondary CTA **Lihat Produk**.
- **Layout:** Full-bleed or large split hero; real production/factory photography (`CONTENT NEEDED` if not yet supplied — do not use generic stock photography as final content, per instructions §7.1/§20).
- **Mobile behavior:** Stack text above single CTA pair; image becomes a shorter banner, not cropped awkwardly.

### 2. Company / Production Statistics
- **Purpose:** Immediate, numeric credibility before any scrolling commitment.
- **User question answered:** "Are these people a real, established operation?"
- **Content:** Use only verified numbers: **12+ Years Experience, 100+ Happy Clients, 5,000 pcs/day production capacity (2024), 600+ Employees.** (Reconcile "9+ vs 10 product types" per `DISCOVERY.md` §4 before publishing either.)
- **Layout:** 4-stat strip, large numerals, short labels — server-rendered starting numbers (avoid the "0+" flash bug observed on the AFIT reference site).
- **Mobile behavior:** 2×2 grid rather than a cramped 4-across row.

### 3. Company Introduction
- **Purpose:** Establish who MAI is in the buyer's own words/context.
- **User question answered:** "What is this company's story and are they stable?"
- **Content:** Condensed version of the 2012 → 2024 timeline (est. 2012, incorporated 2018, HQ Bintaro + factory Sukabumi, 600 employees, 5,000 pcs/day) — pulled from verified About page content, not invented.
- **Layout:** Split image/text; optionally a compact horizontal timeline strip as a visual variant of instructions §7.3 (image/text split), since the timeline itself is a genuine asset worth surfacing here rather than only on the About page.
- **CTA:** Text link to full About Us page.
- **Mobile behavior:** Text above image; timeline strip becomes horizontally scrollable.

### 4. Product Categories
- **Purpose:** Show manufacturing breadth.
- **User question answered:** "Do they make what I need?"
- **Content:** The 10 existing categories (T-Shirt, Jacket, Pants, Joggers, Dress, Gamis, Hijab, Mukena, Alma Mater, Tote Bag), reframed as capability categories rather than a thin 1-SKU-per-category storefront grid (per `UX_AUDIT.md` #7).
- **Layout:** Large image tiles, one confident line of description each, no price shown here (per instructions §10, price should not dominate).
- **CTA:** **Lihat Produk** (secondary).
- **Mobile behavior:** Horizontal scroll or 2-column grid, large tap targets.

### 5. Manufacturing / Services
- **Purpose:** Explain production capability model.
- **User question answered:** "Can they handle bulk/custom orders, and how does working with them actually work (CMT/FOB/full custom)?"
- **Content:** Only services MAI actually offers — `CONTENT NEEDED` to confirm whether MAI offers CMT and/or FOB (observed only on reference sites, not confirmed for MAI itself). Process journey: Design → Material → Cutting → Sewing → Finishing → QC → Packaging → Delivery (instructions §7.5 example — verify against MAI's real process before publishing as fact).
- **Layout:** Horizontal process cards/journey strip.
- **CTA:** **Konsultasikan Kebutuhan Produksi** → WhatsApp with manufacturing-context message.
- **Mobile behavior:** Vertical stacked steps or horizontally swipeable strip with step indicator.

### 6. Why Choose Multi Andria
- **Purpose:** Concise trust pillars.
- **User question answered:** "Why this company over another?"
- **Content:** Short-card format (à la Akarsa's "4 Motto" pattern) built from instructions §8 themes: Quality Control, Custom Production, Competitive Pricing, Production Capability, Reliable Lead Time, Professional Support — trim to whichever MAI can actually substantiate; do not publish unverifiable claims.
- **Layout:** 4–6 short cards, icon + 1-line claim, no long paragraphs.
- **Mobile behavior:** 2-column grid or stacked single column.

### 7. Manufacturing Process
- If not already fully covered in Section 5 above, this can be merged into it to avoid redundancy — **recommend merging** Sections 5 and 7 of the instructions' outline into one "Manufacturing" homepage section rather than two, since both describe production capability/process. Flagging this as a proposed simplification for approval.

### 8. Portfolio (preview)
- **Purpose:** Visual proof of delivered work.
- **User question answered:** "Have they actually done this before, for real clients?"
- **Content:** 4–6 featured projects from MAI's verified timeline (e.g., Ministry of Health mask production, MPR RI procurement, Bawaslu, Pertamina) — **CONTENT NEEDED: real photographs of these projects**, since none currently exist on the site. Do not substitute stock photography for specific named projects.
- **Layout:** Large-featured-project + supporting grid, per instructions §11.
- **CTA:** **Buat Produk Serupa** → WhatsApp.
- **Mobile behavior:** Featured project full-width, supporting grid becomes horizontal scroll.

### 9. Client / Trust Section
- **Purpose:** Logo-based social proof, segmented.
- **User question answered:** "Do businesses and government institutions really trust them?"
- **Content:** Reuse MAI's existing verified logo lists, split **B2B Clients** and **B2G & BUMN Clients** exactly as already organized on the current site (Hush Puppies, Zoya, Coconut Island, etc. / MPR RI, Kominfo, Bawaslu, Pertamina, Bank Mandiri, etc.).
- **Layout:** Grayscale logo grid, two labeled groups, per instructions §12.
- **Mobile behavior:** Horizontally scrollable logo strip per group, not a cramped tiny grid.

### 10. Testimonials
- **Purpose:** Human-voice trust signal.
- **User question answered:** "What do other clients say about working with them?"
- **Content:** **CONTENT NEEDED** — MAI has no verified testimonials of its own today (do not reuse the reference sites' testimonials, which belong to a separate/related entity). **Recommend omitting this section entirely at launch** rather than fabricating quotes, and adding it later once real testimonials are collected.
- **Layout (once content exists):** Quote + name + company, per instructions §13.

### 11. FAQ
- **Purpose:** Pre-answer procurement due-diligence questions.
- **User question answered:** "What's the MOQ, can I use my own material, how long does production take, do you do CMT/FOB, etc."
- **Content:** Model structure on the Akarsa reference (location, capability, lead time, mockup process, bulk-order proof, payment flexibility, factory visits) but answer only with MAI-verified facts; anything unconfirmed becomes `CONTENT NEEDED` rather than a guessed answer.
- **Layout:** Accordion, per instructions §14.
- **Mobile behavior:** Full-width accordion, one item open at a time.

### 12. Final CTA
- **Purpose:** Last-chance, highest-visual-weight conversion prompt.
- **Content:** *"Siap Memulai Produksi Anda?"* direction (not final copy) + **Konsultasi via WhatsApp** primary, **Minta Penawaran**/secondary link to Contact.
- **Layout:** Full-width band, strong color contrast vs. rest of page, per instructions §15.
- **Mobile behavior:** Stacked CTAs, full-width tap targets.

### 13. Footer
- Company logo + short description, navigation, Products, Services, Contact, address, email, phone, WhatsApp, social (if any — `CONTENT NEEDED`), copyright. Per instructions §16.

---

## Sections Explicitly Simplified or Deferred (flagged for approval)

- **Merge** "Manufacturing/Services" and "Manufacturing Process" into a single homepage section (see Section 7 note above) to avoid two similar sections back-to-back.
- **Omit Testimonials at launch** until real testimonials exist — do not fabricate, per instructions §13 and §29.
- **Featured Products** grid (instructions §10) is intentionally folded into "Product Categories" rather than kept separate, since the current catalog only has 1 SKU per category — a separate "Featured Products" section would just repeat the same items shown in Categories. Recommend revisiting once catalog is fuller.
