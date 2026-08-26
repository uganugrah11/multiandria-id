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

Persistent navbar CTA on every page: **Konsultasi via WhatsApp**

No Cart, Checkout, Account, or Order pages appear anywhere in navigation, per the business model — this is not an ecommerce site.

**Optional footer utility link (conditional, pending your decision — see `CONTENT_REQUIREMENTS.md`):** *Lacak Pesanan* (Track Order). The current site has a working order-status lookup (`/track-order`) with a real 5-stage lifecycle. If MAI still fulfills confirmed orders through an internal tracking process after the WhatsApp conversation happens, a lightweight, footer-only status-lookup page could still have value post-sale — it is not an ordering mechanism, so it doesn't conflict with the "no ecommerce" rule. Flagged as a proposal requiring explicit approval, not assumed.

---

## Pages

### 1. Home (`/`)
Primary landing page and main conversion engine. Must answer, in order: who they are → what they manufacture → can they produce what I need → can I trust them → how do they manufacture → what have they produced → how do I contact them. Full section breakdown in `HOMEPAGE_ARCHITECTURE.md`.

### 2. Produk (`/produk`)
Visual catalog answering "can you make what I need," grouped by category, with a WhatsApp CTA per product — not an ecommerce listing.

**Decision point:** the current site uses individual `/products/{slug}` detail pages with Add-to-Cart forms. Per the instructions, individual product detail pages should **not** be built unless there's a strong, explicitly-approved SEO/UX reason. Default recommendation: **one `/produk` page with category filtering and rich showcase cards**, no per-SKU route. If the business later wants SEO reach for queries like "konveksi kaos custom Tangerang," category landing pages (`/produk/kaos-custom`, `/produk/jaket-custom`) are a lower-risk alternative to per-SKU pages — flagged as a future option, not decided here.

### 3. Layanan (`/layanan`)
Explains the service models MAI actually offers (e.g., CMT / FOB — `CONTENT NEEDED` to confirm which apply to MAI). Mirrors the clear service-card pattern seen on the AFIT reference, using only MAI-verified services.

### 4. Manufacturing (`/manufacturing`)
Deeper explanation of production capability: process flow, facility information (Bintaro HQ, Sukabumi factory), and verified capacity figures (5,000 pcs/day, 600 employees). Answers "can they handle bulk orders?" directly.

**Services vs. Manufacturing distinction:** *Layanan* = "what kind of production arrangement can I buy" (CMT/FOB); *Manufacturing* = "what is your actual production capability, process, and facility." Kept as separate pages to avoid one overloaded page.

### 5. Tentang Kami (`/tentang-kami`)
Full company story — the verified 2012–2024 timeline, vision/mission, stats. Answers "who are you and why should I trust you" in depth, for buyers doing real diligence.

### 6. Portfolio (`/portfolio`)
Visual proof of delivered work, built from MAI's real named projects (Ministry of Health masks, MPR RI, Bawaslu, Pertamina, Bank Mandiri, Kab. Solok Selatan) — currently unused. Supports category filtering (uniforms, corporate apparel, school apparel, custom merchandise) once real project photography exists.

### 7. Kontak (`/kontak`)
Does not exist today as a dedicated page. Gives space for: address + embedded map, direct WhatsApp CTA, email, phone, and optionally a lightweight quotation form for buyers who prefer not to start on WhatsApp.

### 8. Lacak Pesanan (`/lacak-pesanan`) — conditional, footer only
See the optional-link note above. Not part of primary navigation regardless of the decision.

---

## Pages Deliberately Not Included

Per the business model (WhatsApp-first, not ecommerce), the following existing pages/features are **not** carried into the new IA:

- Shopping Cart (`/cart`)
- Any checkout or payment flow
- Customer ecommerce account/login
- Individual product "Add to Cart" ordering forms
- Individual product detail pages (`/produk/{slug}`) — unless explicitly approved later for SEO, as noted above

---

## SEO Rationale Summary

- **Produk** stays a single filterable page (not per-product) to avoid thin, near-duplicate SEO pages.
- **Layanan**, **Manufacturing**, and **Portfolio** as separate pages each target distinct search intent and distinct long-tail Indonesian B2B/B2G garment-procurement queries (e.g., "jasa CMT garment Tangerang," "pabrik garment kapasitas besar," "portofolio produksi seragam").
- **Tentang Kami** and **Kontak** support branded search and local NAP (name-address-phone) consistency for local SEO / Google Business Profile alignment.
