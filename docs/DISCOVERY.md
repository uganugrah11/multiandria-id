# Discovery — Multi Andria Indonesia Website Redesign

Status: Phase 1 (Discovery). No code has been written or modified. No implementation has started.

---

## 0. Important Scope Note — No Repository Was Provided

This project session contains only `PROJECT_INSTRUCTIONS.md`. **No Laravel repository, `composer.json`, `package.json`, `.env`, database dump, or codebase was uploaded or found.**

Everything below about the *current site's technical stack* is therefore inferred from **live HTTP responses** (rendered HTML, meta tags, cookie/CSRF behavior, URL structure) — not from source code inspection. This is a meaningful limitation:

- We can confirm the site **is Laravel** (every page emits a `<meta name="csrf-token">` tag, a Laravel convention) and is **server-rendered** (no SPA framework markers, no client-side routing, standard multi-page navigation).
- We **cannot** confirm: PHP/Laravel version, Tailwind version, Vite config, migrations, model structure, controller design, or whether an admin panel exists.
- We **cannot** access `/checkout`, `/login`, `/admin`, or any authenticated flow, since those routes were never linked from a page we were allowed to fetch, and unseen URLs cannot be guessed and fetched directly.

**Action needed from you:** if a Laravel codebase already exists for this site, please upload/attach the repository (zip or share access). Until then, Phase 1 recommendations assume we will need to inspect the real repo before deciding "evolve vs. rebuild" (Section 6). If no repo exists and the current site is unknown/third-party-hosted, we are effectively doing a **from-scratch rebuild informed by the live site's content and IA**, which is consistent with Section 24–26 of the instructions either way.

---

## 1. Current Website — What Exists Today

Inspected live at `https://multiandriaindonesia.com/` on 2026-08-26.

### 1.1 Site structure (as observed)

| Route | Purpose | Notes |
|---|---|---|
| `/` | Homepage | Hero, stats, product type chips, featured products, "Why Choose Us", CTA banner, clients |
| `/products` | Product catalog | Filterable/sortable grid, "Add to Cart" modal per product |
| `/products/{slug}` | Product detail page | Gallery, specs, same Add-to-Cart modal, guarantee badges |
| `/cart` | Shopping cart | Standard ecommerce cart (currently empty in our session) |
| `/track-order` | Order tracking | Order-number lookup + explanation of status meanings |
| `/about-us` | Company profile | Vision/mission, timeline, stats, clients (duplicated from homepage) |

No `/contact`, `/services`, `/manufacturing`, or `/portfolio` route exists today, and none is linked in navigation or footer.

### 1.2 Navigation (current)

Top nav: **Home · Products · Track Order · About Us · Cart (icon)**

- No WhatsApp link or button anywhere on the current site — not in the header, hero, product cards, or footer.
- No "Contact Us" page or contact form; contact info (address, email, phone) only appears in the footer, repeated on every page.

### 1.3 Homepage content (verbatim structure observed)

1. Hero: *"Professional Garment Manufacturing & Distribution"* + one CTA (**Browse Products**)
2. Stat strip: `9+ Product Types`, `1000+ Orders Completed`, `100% Quality Guarantee`, `24/7 Customer Support`
3. Product Types chip row (10 categories, each linking to a filtered product list — each currently shows only **"1 items"**)
4. Featured Products grid (4 products shown, each with image, category, name, long AI-style description, price, MOQ, "View Details")
5. "Why Choose Us?" — 4 cards: Quality Guaranteed, Competitive Pricing, Custom Design, Fast Production
6. CTA banner: *"Ready to Place Your Order?"* → **View Products**
7. "Our Clients" — split into **B2B Clients** (11 logos shown, "+30 More Clients") and **B2G & BUMN Clients** (9 logos shown, "Trusted by 40+ companies and institutions")
8. Footer

### 1.4 Product catalog content (real, reusable data)

10 product categories currently populated with **exactly one SKU each**:

| Category | Example Product | Price | MOQ |
|---|---|---|---|
| T-Shirts | Premium Basic Cotton Tee | IDR 50.000 | 50 pcs |
| Pants | Slim/Straight Fit Casual Trousers | IDR 100.000 | 25 pcs |
| Jacket | Military-Style Bomber Jacket | IDR 100.000 | 30 pcs |
| Joggers | Premium Fleece Jogger | IDR 100.000 | 30 pcs |
| Hijab | Instant Slip-On Bergo Hijab | IDR 30.000 | 25 pcs |
| Gamis | Elegant Modest Long Sleeve Gamis Dress with Lace Cuffs | IDR 125.000 | 10 pcs |
| Dress | Cap Sleeve Cocktail Dress | IDR 100.000 | 10 pcs |
| Mukena | Elegant Two-Piece Mukena with Broderie Anglaise Trim | IDR 50.000 | 10 pcs |
| Alma Mater | Formal School/University Blazer | IDR 150.000 | 20 pcs |
| Tote Bag | Heavy Duty Custom Canvas Tote Bag | IDR 100.000 | 25 pcs |

Each product page/card includes: image gallery (3 images), material options, size options, color swatches, "custom color" option, "I have a custom design" upload (PDF/ZIP, max 10MB), design instructions field, notes field, and a live "Estimated Total" calculator (qty × price). This is a fully-built **ecommerce ordering UI**, not just a catalog.

> Note: product descriptions read as AI-generated/generic marketing copy (e.g., overly hedged phrasing like "possibly a heather or pique knit", "likely canvas or heavy cotton"). These should **not** be reused verbatim in the rebuild — flagged in `CONTENT_REQUIREMENTS.md`.

### 1.5 About Us page (real business data — high value, reusable)

This page contains the most substantive verified business information on the entire site:

- **Legal name:** PT. Multi Andria Indonesia (PT. MAI)
- **Founded (informal):** 2012, as a convection facility in Bintaro, South Tangerang
- **Incorporated:** November 7, 2018
- **Vision:** *"Menjadi perusahaan garment manufacturing terintegrasi nomor 1 di Indonesia yang memberikan pelayanan profesional dan kualitas produk terbaik, sambil berkontribusi pada perkembangan industri tekstil internasional."* (paraphrased from the English copy shown)
- **Mission:** 6 pillars — High-Quality Products, Innovation in Design & Technology, Professional Service, Eco-Friendly Production, Community & Environment, Continuous Excellence
- **Stats block:** `12+ Years Experience`, `100+ Happy Clients`, `10 Product Categories`, `4+ Countries Served`
- **Company timeline (verified, real milestones):**
  - **2012** — Convection facility established in Bintaro (pre-incorporation)
  - **2018** — PT. Multi Andria Indonesia incorporated (Nov 7); ~50 employees
  - **2019** — Sukabumi expansion (3 rented shophouses); Sukabumi headcount reaches 120
  - **2020** — Sukabumi Garment Factory officially established, 1,860 m²; 15 clients including Ministry of Health (mask production), ZARA, Aurany
  - **2021** — B2G projects: Ministry of Industry, MPR RI Procurement; major clients: Hush Puppies, Hammer, Coconut Island, ElZatta, Zoya
  - **2023** — Bintaro HQ expanded to a 4-story building (HQ + production); B2G projects: Bawaslu, Pertamina, Bank Mandiri, Kab. Solok Selatan
  - **2024** — 600 employees; production capacity up to 5,000 pcs/day
- **Clients:** Same list as homepage — B2B (Hush Puppies, Cressida, Coconut Island, Hammer, Zoya, Affa Sport, Nararya, Nha Miranda, Thoiba, Aurany, Yovis Sport, +30 more) and B2G/BUMN (MPR RI, Kominfo, Kementerian Pertanian, Bank Mandiri, Kementerian Perindustrian, Bawaslu, Pertamina, Kab. Solok Selatan, SMAN 31 Jakarta)

This timeline and stat data is **verified, factual, and highly credible** — it should be a centerpiece of the new site's trust-building narrative (Sections 7.2, 7.3, 9 of instructions), not buried on an About page.

### 1.6 Track Order page

Explains a 5-stage order lifecycle: **Pending → Processing → In Production → Shipped → Completed**, plus an order-number lookup field. This confirms a real backend order/production tracking system exists (or existed) behind this ecommerce flow.

### 1.7 Contact information (verified, factual — use exactly as-is)

- **Address:** Jl. Panda V No. 197, Pd. Ranji, Kec. Ciputat Timur, Kota Tangerang Selatan, Banten 15442
- **Email:** multiandriai@gmail.com
- **Phone:** +62 822-7101-8763
- No WhatsApp number is published anywhere on the current site. **`CONTENT NEEDED`: confirm the WhatsApp Business number to use for `config('company.whatsapp')`.** The phone number above is a plain "Call Us" / `tel:` link on Track Order, not confirmed as a WhatsApp-enabled number.

### 1.8 A notable finding: apparent sibling/related company

The reference site `andriafesyenindonesiatekstil.id` (PT. Andria Fesyen Indonesia Tekstil / "PT AFIT") independently publishes:
- The **same office address pattern** (Jl. Panda V, Pd. Ranji, Ciputat Timur — house number differs: 188 vs. MAI's 197)
- A **near-identical company description** ("Berdiri sejak tahun 2012... dikenal karena kualitas & standar tinggi... lead time singkat... praktik bisnis berkelanjutan")
- The **same client roster** (Hush Puppies, Coconut Island, Hammer, Zoya, Aurany, Nha Miranda, Thoiba, Cressida)
- Gallery sections literally labeled **"Garmen Bintaro"** and **"Garmen Sukabumi"** — matching MAI's own timeline (Bintaro HQ, Sukabumi factory)

This strongly suggests PT AFIT and PT MAI are the same production group, a sister company, or a rebrand-in-progress, sharing factories and client history. **This is a discovery observation only** — per instructions we will not copy PT AFIT's branding, wording, or visual identity. But it does mean the WhatsApp-first, no-checkout UX pattern used by PT AFIT is very likely the *actual* real-world sales process already used by this business group today, even though multiandriaindonesia.com currently runs a from-scratch ecommerce cart instead. Worth confirming directly with the client.

---

## 2. Reference Website Analysis

### 2.1 `andriafesyenindonesiatekstil.id` (PT AFIT)

- **Stack:** WordPress + Elementor (page builder), not custom-coded.
- **IA:** Home · Tentang Kami · Layanan · Portofolio · Proses Produksi · Gallery · Kontak
- **Hero:** Direct WhatsApp deep-link CTA with a **pre-filled message** (`Konsultasi Sekarang` → `https://api.whatsapp.com/send?phone=...&text=...`). This is the exact CTA pattern PROJECT_INSTRUCTIONS.md asks for.
- **Trust stats section:** counters for Jumlah Produksi / Kapasitas per Bulan / Jenis Produk / Tenaga Kerja — **however, on this static fetch the counters render as "0+"**, which means the JS animated counter did not have a chance to run without full page rendering. This is a good example of a *bug/anti-pattern to avoid*: never let a stat visually read "0" before JS loads (use server-rendered starting values, not JS-only counters).
- **Clients:** split into **Pemerintah** (government) and **Swasta** (private) — a clean way to separate B2G and B2B credibility, consistent with instructions Section 12.
- **Portfolio:** a real photographed grid, each image labeled with what it is (e.g., "Seragam Dinas BUMN", "Korps Brimob", "Jaket Lazada", "Gamis Wanita") — captions do a lot of credibility work with minimal copy.
- **Services (Layanan):** two clear service cards — **Jasa CMT** and **Jasa FOB** — each with its own explanation and its own contextual WhatsApp CTA (different pre-filled message per service). Matches instructions' "Product CTA Behavior" pattern.
- **"Keunggulan Kami" (Why Us):** 4 short benefit cards (large-scale capacity, QC rigor, fast delivery, after-sales support).
- **Gallery:** tabbed by factory location (Garmen Bintaro / Garmen Sukabumi) — a good pattern for a company with multiple facilities.
- **Testimonials:** star rating + quote + name + company, carousel of 8. (Not verifiable as MAI's own testimonials — do not reuse for MAI.)
- **Footer:** two addresses (HQ + factory), two CS phone numbers, email, embedded Google Map.

### 2.2 `akarsa.co.id` (PT Akarsa Garment Indonesia)

- **Stack:** WordPress + Elementor.
- **IA:** Home · Katalog · Produksi · Artikel · Tentang Akarsa
- **Hero:** Leads with **hyper-specific production capacity numbers** directly in the H1 subcopy — "kapasitas produksi pabrik 10.000 Pcs setiap harinya... 960 unit mesin jahit, 6 meja potong, 24 baris penjahit, 32 mesin bordir, 2 unit mesin printing, 8 jenis sablon." This specificity (exact machine/line counts) reads far more credible to a procurement audience than generic claims — a strong pattern to emulate **only if MAI can supply equally verified numbers.**
- **Capability strip:** 750+ Sewing / 30+ Mesin Bordir / Sublime-Printing / 8+ Jenis Sablon — reinforces the same numbers a second time, close to the fold.
- **"4 Motto" trust section:** Terpercaya, Tepat Waktu, Terjaga Kualitas, Harga Terjangkau — four short, memorable trust pillars (cleaner than a long paragraph).
- **Portfolio:** small thumbnail grid, each captioned with a **named real project** and context (e.g., "65.000 baju senam poco-poco dalam rangka pemecahan rekor dunia 2018", "Jaket Timses Jokowi", "Rompi PLN", "Jaket Lazada"). Naming real recognizable brands/institutions by name (with quantity, when known) is a strong B2G/B2B trust signal.
- **Manufacturing capability cards:** Jahit / Bordir / Printing / Sablon — framed as "satu atap" (one-roof / vertically integrated), directly answering "can you do everything in-house."
- **Testimonials:** **video testimonials** (Instagram Reels / TikTok / YouTube Shorts embeds) instead of text quotes — a strong differentiator, but has a technical/performance cost (each is a 3rd-party embed) and depends on real client-supplied video, which MAI does not currently have.
- **FAQ:** the single strongest FAQ pattern of either reference — genuinely answers a procurement manager's real due-diligence questions: factory location, CMT/FOB capability, exact lead time ("14 hari kerja setelah DP"), whether mockups are provided pre-production, proof of large-scale order history, rush-order availability, payment scheme flexibility, whether factory visits/surveys are allowed, number of production lines, and whether a company profile PDF can be sent. This FAQ is written for a *decision-maker doing diligence*, not a casual browser — this is the model to follow for MAI's FAQ (Section 14).
- **Footer:** HQ + 2 factory addresses, 2 direct sales numbers (not WhatsApp-linked in the HTML we fetched, though likely WhatsApp numbers in practice).

### 2.3 Cross-reference takeaways for Multi Andria

| Pattern | Source | Recommendation for MAI |
|---|---|---|
| WhatsApp CTA with pre-filled, context-specific message | AFIT | Adopt exactly as specified in PROJECT_INSTRUCTIONS.md — implement via `<x-whatsapp-button>` |
| Government vs. private client segmentation | AFIT | Adopt (MAI already has this data: B2B vs. B2G/BUMN) |
| Real project captions with client/quantity/year | Akarsa | Adopt where MAI can verify concrete project details (currently `CONTENT NEEDED` — see Section 8) |
| Hyper-specific production capacity numbers in hero | Akarsa | **Only if verifiable.** MAI has "5,000 pcs/day" (2024) and "600 employees" verified from About page — reuse those; do not invent machine counts |
| Procurement-grade FAQ | Akarsa | Adopt structure; answers must come from MAI's real capabilities, not copied text |
| Short trust-pillar cards ("4 Motto" style) | Akarsa | Adopt short-card format for instructions Section 8 "Why Choose Multi Andria" |
| Server-rendered starting values for animated counters | AFIT (as anti-pattern) | Avoid the "0+" flash bug on MAI's new stat counters |
| Video testimonials | Akarsa | Nice-to-have, not a v1 requirement — depends on `CONTENT NEEDED` client-supplied video |

---

## 3. What Currently Works Well (do not discard without reason)

- Real, verifiable, favorable company timeline and stats (About Us) — strong raw material for trust-building.
- A genuine, populated client roster split B2B / B2G — exactly the credibility structure the instructions call for.
- Product data model already captures category, price, MOQ, materials, sizes, colors, and customization notes — this maps directly onto the "visual catalog" product card described in PROJECT_INSTRUCTIONS.md, minus the cart/checkout behavior.
- Consistent footer contact block across all pages.
- Confirmed Laravel + Blade + server-rendered architecture — aligned with the required tech stack, so a full framework migration is not implied by the tech (see Section 6).

## 4. What Is Outdated / Misaligned

- The **entire commerce model is wrong for the business**: the current site is a full "Add to Cart → Cart" ecommerce flow with per-product quantity/size/color/customization forms and a running total — which PROJECT_INSTRUCTIONS.md explicitly says must **not** be built. This isn't a styling problem; it's an information-architecture and conversion-model mismatch.
- Zero WhatsApp integration anywhere, despite this being the primary conversion channel both by instruction and, apparently, by how the sibling/related company (AFIT) already operates.
- No "Request a Quote"/consultation form or CTA of any kind beyond generic "View Products"/"Browse Products".
- No Services, Manufacturing, Portfolio, FAQ, or Contact pages exist at all.
- Product catalog has only 1 SKU per category — sparse relative to the "professional catalog" feel the instructions want.
- Product descriptions read as generic AI-written copy with hedging language ("possibly", "likely") — not confident, factual B2B copy.
- Homepage stat "9+ Product Types" is inconsistent with About page's "10 Product Categories" — a small but visible factual inconsistency to fix.
- No portfolio/case-study content, despite MAI's timeline containing excellent real project history (Ministry of Health masks, MPR RI, Bawaslu, Pertamina, Bank Mandiri, Kab. Solok Selatan) that is currently never shown as a portfolio.

## 5. Missing Functionality vs. Instructions

| Required by instructions | Currently exists? |
|---|---|
| WhatsApp CTA (config-driven, contextual message) | No |
| Request a Quote / Konsultasi flow | No |
| Services / Manufacturing page | No |
| Portfolio page | No |
| FAQ section | No |
| Dedicated Contact page/form | No (footer only) |
| Testimonials | No |
| Production process / journey visualization | No |
| B2B vs. B2G segmented trust section | Data exists, but only as a flat logo wall, not segmented on-page (only implicitly, via section headers) |

## 6. Technical Assessment: Evolve vs. Rebuild

Given no repository was made available for inspection, a definitive "evolve vs. rebuild" engineering decision **cannot responsibly be made yet** — that requires seeing real code (Section 36, Phase 1 explicitly requires inspecting "existing routes / existing Laravel application / existing database / existing models"). What we can say from the live site alone:

- The **backend framework choice (Laravel/Blade) does not need to change** — it already matches instructions Section 24.
- The **commerce data model** (products, categories, pricing, MOQ) is reusable as read-only catalog data; the **cart/order/checkout logic should not be carried forward** as-is, since the new site explicitly drops shopping-cart/checkout behavior per the "Commerce & Conversion Model" section of instructions.
- The **Track Order system** implies an existing Orders table/lifecycle. Whether to preserve this depends on business intent: if leads still convert to trackable production orders after a WhatsApp conversation, an internal/admin order-tracking feature may still have value — but it should not be customer-facing "add to cart" checkout. **This needs a decision from you: keep Track Order as a lightweight order-status lookup fed by admin data entry (post-WhatsApp), or drop it?**
- Recommendation once a repo is available: audit models/migrations for `Product`, `Order`, `Client` (or similar) tables — if they're reasonably normalized, keep and extend them; if they're tightly coupled to cart/checkout logic, decouple product display from order logic during the rebuild rather than deleting the tables outright.

## 7. Open Questions for the Business (blocking full accuracy, not blocking Phase 1 docs)

1. Is PT Andria Fesyen Indonesia Tekstil (AFIT) related to PT Multi Andria Indonesia (sister company / same group / rebrand)? This affects whether any of AFIT's real client/portfolio data can be legitimately attributed to MAI.
2. What is the WhatsApp Business number and default greeting to use for all site CTAs?
3. Should the existing `/track-order` order-status flow be preserved (as an internal, admin-fed status lookup) or removed entirely in favor of pure WhatsApp handoff?
4. Is there an existing Laravel repository we should inspect, or is this in effect a from-scratch build using the live site only as a content/IA reference?

All of the above are also logged in `CONTENT_REQUIREMENTS.md`.
