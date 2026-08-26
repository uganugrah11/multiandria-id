# Sitemap — Multi Andria Indonesia (Proposed)

## Primary Navigation

```
Home
Tentang Kami          (About Us)
Produk                (Products)
Layanan               (Services)
Manufacturing
Portfolio
Kontak                (Contact)
```

Primary navbar CTA (persistent, all pages): **Konsultasi via WhatsApp**
No cart / checkout / account / order-creation in navigation, per instructions.

Optional utility link (only if the business confirms it should be kept — see `DISCOVERY.md` §6): **Lacak Pesanan** (Track Order), placed in the footer utility row rather than primary nav, since it is a secondary, low-frequency utility rather than a marketing page.

---

## Pages

### 1. Home (`/`)
**Why it exists:** Primary landing page and main conversion engine; must answer the seven questions in instructions Section 4 within seconds. See `HOMEPAGE_ARCHITECTURE.md` for full section breakdown.

### 2. Products (`/produk`)
**Why it exists:** Visual catalog answering "can you make what I need," grouped by category with WhatsApp CTA per product — **not** an ecommerce listing (no cart, no per-product detail route required per instructions' "Product Catalog" section).
**Note:** Per instructions ("Do not create a separate product detail route unless there is a compelling UX or SEO reason"), the default recommendation is **one Products page with category filtering and expandable/rich cards**, not individual `/produk/{slug}` pages. This is a deliberate change from the current site's per-product detail-page structure.
**Open decision for approval:** if the business wants individual product pages for SEO (e.g., to rank for "konveksi kaos custom Tangerang" type queries per product type), we can add category landing pages (`/produk/kaos-custom`, `/produk/jaket-custom`, etc.) instead of per-SKU pages — this gets SEO benefit without recreating an ecommerce detail-page pattern. Flagged as a recommendation, not yet decided.

### 3. Services (`/layanan`)
**Why it exists:** Explains CMT / FOB / other service models MAI actually offers (per instructions Section 7.5) — mirrors the clear service-card pattern from the AFIT reference, using only MAI-verified services.

### 4. Manufacturing (`/manufacturing`)
**Why it exists:** Deeper explanation of production capability — process flow (Design → Material → Cutting → Sewing → Finishing → QC → Packaging → Delivery), facility information (Bintaro HQ, Sukabumi factory), and capacity figures (5,000 pcs/day, 600 employees, verified from About page timeline). Answers "can they handle bulk orders?" directly.
**Note:** Services vs. Manufacturing distinction: **Services** = "what kind of production arrangement can I buy" (CMT/FOB); **Manufacturing** = "what is your actual production capability/process/facility." Keeping them separate avoids one overloaded page, matching the instructions' explicit separate-section treatment of Sections 7.5 and 9.

### 5. About Us (`/tentang-kami`)
**Why it exists:** Full company story — timeline, vision/mission, vision for scale — using the verified 2012–2024 timeline already on the current site. Answers "who are you and why should I trust you" in depth for buyers doing real diligence (this is where a "Download Company Profile"-style asset could live, if one exists — `CONTENT NEEDED`).

### 6. Portfolio (`/portfolio`)
**Why it exists:** Visual proof of delivered work — currently missing entirely despite MAI having real named projects (Ministry of Health masks, MPR RI, Bawaslu, Pertamina, Bank Mandiri, Kab. Solok Selatan) sitting unused in the About page timeline. Should support category filtering (uniforms, corporate apparel, school apparel, custom merchandise) per instructions Section 11.

### 7. Contact (`/kontak`)
**Why it exists:** Currently does not exist as a page at all (contact info only lives in the footer). A dedicated Contact page gives space for: address + embedded map, direct WhatsApp CTA, email, phone, and (optionally) a lightweight quotation form for buyers who prefer not to use WhatsApp first.

### 8. Track Order (`/lacak-pesanan`) — conditional
**Why it exists (if kept):** Preserves an existing piece of functionality (order-status lookup) that may still matter internally after a sale is confirmed via WhatsApp. **Recommendation:** demote from primary nav to footer utility link, and clarify copy so it's clearly for *confirmed* orders, not a way to initiate one. **This page's fate depends on the open question in `DISCOVERY.md` §6/§7 — pending your decision.**

---

## Pages Deliberately Not Included

Per the "Commerce & Conversion Model" section of the instructions, the following existing pages/features are **not** carried into the new IA:

- Shopping Cart (`/cart`)
- Any checkout/payment flow
- Customer ecommerce account/login
- Individual product "Add to Cart" ordering forms

---

## SEO Rationale Summary

- **Products** page remains a single page (not per-product) to avoid thin, near-duplicate SEO pages, per instructions' explicit SEO guidance ("do not create hundreds of thin product pages").
- **Services**, **Manufacturing**, and **Portfolio** as separate pages each target distinct search intent (service model vs. capability vs. proof-of-work) and distinct long-tail keywords relevant to Indonesian B2B/B2G garment procurement searches (e.g., "jasa CMT garment Tangerang," "pabrik garment kapasitas besar," "portofolio produksi seragam").
- **About Us** and **Contact** support branded search and local/NAP (name-address-phone) consistency for local SEO and Google Business Profile alignment.
