# Discovery — Multi Andria Indonesia Website Redesign

Status: Phase 1 (Discovery). No code has been written or modified. Nothing has been deleted.

This document covers Task 1 (existing repository), Task 2 (current live website), Task 3 (design references), and Task 4 (logo/brand color analysis) from the project instructions.

---

## Task 1 — Existing Repository

**Update (2026-08-27):** the user supplied the real production codebase separately at `D:\Bojel\mai-old-site` — a full download of the Hostinger `public_html` for multiandriaindonesia.com. This repository (`mai-new-site`) itself still started with no application code; the findings below are from direct inspection of that old codebase, which supersedes the live-site-only inference in the original version of this section.

### Confirmed stack

- **Laravel 12** (`laravel/framework: ^12.0`), **PHP 8.2** (`php: ^8.2`)
- **Tailwind CSS 3** in practice — `tailwind.config.js` uses v3-style JS config (`content`, `theme.extend`, `@tailwindcss/forms` plugin), even though `package.json` also lists `@tailwindcss/vite: ^4.0.0` as a leftover/unused dependency. The active build path is the v3 config file, not v4's CSS-first `@theme`.
- **Vite 7** via `laravel-vite-plugin`, plus **Alpine.js 3** and **Axios** — a standard Laravel Breeze setup.
- **Auth:** Laravel Breeze (`laravel/breeze`), full stack — login/register/password-reset/email-verification views and controllers, plus a custom `is_admin` boolean on `users` and an `admin` middleware gating `/admin/*`.
- **Payments:** `xendit/xendit-php` — a real Xendit checkout integration (invoice creation, success/failed redirect routes, a webhook endpoint) wired into the order flow, running against **development-mode** Xendit keys even in the production `.env`. This is the online-payment feature the new instructions explicitly exclude — **to be removed, not carried forward.**
- **PDF:** `barryvdh/laravel-dompdf` — generates a downloadable/emailable invoice PDF per order (`resources/views/invoices/template.blade.php`). Also tied to the ecommerce order flow being removed.
- **Database:** production runs **MySQL** (`u250702740_db_prod_mai`, credentials present in the downloaded `.env` — **not carried into the new repo, and this old `.env` should never be committed anywhere**). The bundled local `database/database.sqlite` was only ever migrated through the three base Laravel tables (`users`, `cache`, `jobs`) — `products`/`orders`/`order_items` migrations never ran against it, so it holds no real product/order data. The real catalog data lives only on the live production database, which was not supplied, and in what was already captured from the rendered live site in this document.

### Data model (reusable, minus ecommerce-specific parts)

- `Product` — `name`, `slug`, `product_type` (enum: jacket, gamis, dress, mukena, joggers, almamater/alma mater, hijab, totebag/tote bag, pants, t-shirts), `description`, `price`, `specifications` (JSON: material/sizes/colors/etc.), `moq`, `is_active`, `is_featured`. Has a related `ProductImage` (multi-image, `sort_order`, `is_primary`) — a real, working multi-image gallery already exists.
- `Order` / `OrderItem` — full ecommerce order model (customer address, shipping method/cost, payment status, Xendit invoice fields). **Not reused as-is** — this is exactly the cart/checkout data model the new instructions exclude. The order **status enum** (`pending → processing → production → shipped → completed`, plus `cancelled`) is a reasonable reference if an internal post-sale tracking feature is ever approved, but the surrounding purchase flow is not being rebuilt.
- No `Client`/`Testimonial`/`Portfolio` model exists — client logos and the company timeline are hardcoded PHP arrays inside `HomeController@index` / `HomeController@about`, not database-driven.

### Real assets recovered (previously marked `CONTENT NEEDED` — now resolved)

- `public/image/logo-mai-bg-white.png`, **`logo-mai-bg-none.png`** (transparent), and `logo-mai.png` — a transparent-background export of the logo exists after all. Resolves the earlier "no transparent/vector logo" gap (a true vector/SVG source still does not exist, only these three PNG exports).
- `public/image/clients/*.png` — **20 real client logo files**, one per B2B and B2G/BUMN client named in the timeline/About content (Hush Puppies, Zoya, Coconut Island, Bawaslu, Pertamina, MPR RI, etc.). These are genuine usable brand assets, not placeholders.
- `storage/app/public/products/*.png` — **29 product images**. Inspected directly: these are **CGI/3D-rendered mockups** (garments floating or on a faceless mannequin bust, transparent background), not real factory or product photography. Usable as interim product-card imagery (better than nothing, consistent in style), but they do **not** satisfy the "real production photography" requirement — that remains `CONTENT NEEDED`.
- Confirmed **factory address**, previously unknown: `Kampung Cipamutih, Rt. 003/007, Desa Ciambar, Kec. Ciambar, Sukabumi, Jawa Barat 43357` (from `config('services.company.factory_address')` / `.env`). Paired with the already-known Bintaro HQ address.

### Preserve / Refactor / Reuse / Remove / Rebuild

- **Reuse directly:** logo files (white-bg + transparent), all 20 client logo images, the verified timeline/vision/mission copy (already cross-checked against the live site in Task 2), the factory address, the `Product`/`ProductImage` data shape (name, type, description, specifications JSON, MOQ, multi-image gallery with primary image) and the admin multi-image upload logic in `Admin\ProductController`.
- **Refactor:** the `Product` model and admin CRUD carry over conceptually, but strip cart-facing fields/behavior (no `price` as a "buy" trigger — keep only as optional catalog metadata per instructions §10) and rebuild the public-facing product page as a showcase, not an order form.
- **Remove, not carried forward:** `Order`, `OrderItem`, `CartController`, `OrderController`'s checkout/Xendit/webhook logic, `InvoiceController`/dompdf invoice generation, the `/cart`, `/checkout`, `/order/*`, `/xendit/*` routes, and the Xendit/dompdf Composer packages. All of this is the ecommerce purchasing workflow the new instructions explicitly exclude.
- **Rebuild:** every Blade view and the entire visual design — the old UI is a generic indigo/blue Tailwind Breeze default (`primary` color scale in `tailwind.config.js` is stock indigo, `#4f46e5` at 600 — confirms the earlier live-site observation that the on-site blue was a framework default, not an intentional brand color) and does not reflect the MAI red identity at all.
- **New, doesn't exist yet in either codebase:** Services, Manufacturing, Portfolio, Contact, FAQ — none of these have a model, controller, or view in the old app either. These are genuinely new pages, not migrations of existing ones.

---

## Task 2 — Current Live Website (multiandriaindonesia.com)

Inspected live on 2026-08-26 via direct fetch of the homepage and About Us page (server-rendered HTML). Not inspected via a real browser/device emulator, so JS-only behavior and true responsive/touch behavior could not be directly observed — noted as a limitation below, not guessed at.

### 2.1 Confirmed technical signal

Every page emits a `<meta name="csrf-token">` tag, the standard Laravel convention — this confirms the current site **is a Laravel application**, server-rendered (no SPA markers, no client-side routing). Nothing beyond that (version, packages, admin panel) is verifiable without the repo.

### 2.2 Site structure (as observed)

| Route | Purpose | Notes |
|---|---|---|
| `/` | Homepage | Hero, stats, product-type chips, featured products, "Why Choose Us", CTA banner, clients |
| `/products` | Product catalog | Filterable grid, "Add to Cart" modal per product |
| `/products/{slug}` | Product detail page | Gallery, specs, Add-to-Cart modal, guarantee badges |
| `/cart` | Shopping cart | Standard ecommerce cart |
| `/track-order` | Order tracking | Order-number lookup, explains 5-stage status lifecycle |
| `/about-us` | Company profile | Vision/mission, timeline, stats, clients (duplicated from homepage) |

No `/contact`, `/services`, `/manufacturing`, or `/portfolio` route exists today, and none is linked from navigation or footer.

### 2.3 Navigation (current)

Top nav: **Home · Products · Track Order · About Us · Shopping Cart (icon)**

No WhatsApp link or button appears anywhere on the site — not in header, hero, product cards, or footer. No dedicated Contact page or form; contact details only live in the footer.

### 2.4 Homepage content (verbatim structure observed)

1. Hero: *"Professional Garment Manufacturing & Distribution"* + CTA (**Browse Products**)
2. Stat strip: `9+ Product Types`, `1000+ Orders Completed`, `100% Quality Guarantee`, `24/7 Customer Support`
3. Product Types chip row (10 categories, each linking to a filtered list showing only 1 item)
4. Featured Products grid (4 products: image, category, name, long AI-style description, price, MOQ, "View Details")
5. "Why Choose Us?" — 4 cards: Quality Guaranteed, Competitive Pricing, Custom Design, Fast Production
6. CTA banner: *"Ready to Place Your Order?"* → **View Products**
7. "Our Clients" — split **B2B Clients** (11 logos, "+30 More Clients") and **B2G & BUMN Clients** (9 logos, "Trusted by 40+ companies and institutions")
8. Footer

### 2.5 Product catalog (real, reusable data)

10 categories, exactly **one SKU each**:

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

Each product includes an image gallery, material/size/color options, "custom color", a design-file upload (PDF/ZIP, max 10MB), notes field, and a live "Estimated Total" calculator — a fully built **ecommerce ordering UI**, not a catalog.

Product copy reads as AI-generated/hedged marketing text ("possibly a heather or pique knit", "likely canvas or heavy cotton") — **do not reuse verbatim**; flagged in `CONTENT_REQUIREMENTS.md`.

### 2.6 About Us page (verified, reusable, highest-value content on the site)

Re-confirmed by direct fetch on 2026-08-26:

- **Legal name:** PT. Multi Andria Indonesia (PT. MAI)
- **Founded (informal):** 2012, convection facility in Bintaro, South Tangerang
- **Incorporated:** November 7, 2018
- **Vision:** to become Indonesia's #1 integrated garment manufacturing company, delivering professional service and the best product quality, while contributing to the international textile industry
- **Mission:** 6 pillars — high-quality products, design/technology innovation, professional service, eco-friendly production, community & environment, continuous excellence
- **Stats block:** `12+ Years Experience`, `100+ Happy Clients`, `10 Product Categories`, `4+ Countries Served`
- **Verified timeline:**
  - **2012** — Convection facility established, Bintaro (pre-incorporation)
  - **2018** — PT incorporated (Nov 7); ~50 employees
  - **2019** — Sukabumi expansion (3 rented shophouses); headcount reaches 120
  - **2020** — Sukabumi Garment Factory established, 1,860 m²; 15 clients including Ministry of Health (mask production), ZARA, Aurany
  - **2021** — B2G: Ministry of Industry, MPR RI Procurement; major B2B: Hush Puppies, Hammer, Coconut Island, ElZatta, Zoya
  - **2023** — Bintaro HQ expanded to a 4-story building (HQ + production); B2G: Bawaslu, Pertamina, Bank Mandiri, Kab. Solok Selatan
  - **2024** — 600 employees; production capacity up to 5,000 pcs/day
- **Clients — B2B:** Hush Puppies, Cressida, Coconut Island, Hammer, Zoya, Affa Sport, Nararya, Nha Miranda, Thoiba, Aurany, Yovis Sport, +30 more
- **Clients — B2G/BUMN:** MPR RI, Kominfo, Kementerian Pertanian, Bank Mandiri, Kementerian Perindustrian, Bawaslu, Pertamina, Kab. Solok Selatan, SMAN 31 Jakarta
- **Certifications:** none listed anywhere on the site.

This verified timeline and client roster is the single strongest trust asset available and should anchor the new site's credibility narrative (see `HOMEPAGE_ARCHITECTURE.md`).

### 2.7 Track Order

Explains a 5-stage lifecycle: **Pending → Processing → In Production → Shipped → Completed**, plus an order-number lookup. Confirms a real backend order/production-tracking system exists behind the current ecommerce flow.

### 2.8 Contact information (verified — use exactly as-is)

- **Address:** Jl. Panda V No. 197, Pd. Ranji, Kec. Ciputat Timur, Kota Tangerang Selatan, Banten 15442
- **Email:** multiandriai@gmail.com
- **Phone:** +62 822-7101-8763 (a plain `tel:` "Call Us" link — **not** confirmed as WhatsApp-enabled)
- **WhatsApp Business number:** not published anywhere on the current site. `CONTENT NEEDED`.
- **Social media:** none found. `CONTENT NEEDED`.

### 2.9 A notable finding — likely sibling company

`andriafesyenindonesiatekstil.id` (PT Andria Fesyen Indonesia Tekstil / "PT AFIT") independently publishes:

- The same street address pattern (Jl. Panda V, Pd. Ranji, Ciputat Timur — No. 188 vs. MAI's No. 197)
- A second location in **Sukabumi** (Kampung Cipamutih, Ciambar) — matching MAI's own Sukabumi factory
- A near-identical company description and founding story (est. 2012)
- The same client names (Hush Puppies, Coconut Island, Hammer, Zoya, Aurany, Nha Miranda, Thoiba, Cressida)

This strongly suggests PT AFIT and PT MAI share a production group, ownership, or history. **This is a discovery observation only** — per instructions, none of AFIT's branding, wording, portfolio, or testimonials will be copied or attributed to MAI. It does mean AFIT's WhatsApp-first, no-checkout sales pattern is very likely how this business group already sells in practice, even though multiandriaindonesia.com currently runs a from-scratch cart/checkout instead. **Worth confirming directly with the business** (logged in `CONTENT_REQUIREMENTS.md`).

### 2.10 What is good

- Real, specific, verifiable company timeline and stats.
- Genuine, populated B2B/B2G client roster.
- Product data model already captures category, price, MOQ, materials, sizes, colors, customization — maps cleanly onto a showcase card once purchasing behavior is stripped out.
- Consistent footer contact block on every page.
- Laravel + Blade + server-rendered architecture already matches the required stack.

### 2.11 What is outdated / confusing / missing / hurts conversion

- The entire commerce model (Add to Cart → running total → Cart page) is the wrong model for a made-to-order manufacturer and is explicitly excluded by the new instructions.
- Zero path to human contact besides a footer phone/email — no WhatsApp, no quote request, no contact form.
- No Services, Manufacturing, Portfolio, FAQ, or Contact pages exist at all.
- Catalog has only 1 SKU per category — reads as unfinished next to the "5,000 pcs/day" capability claim.
- Homepage says "9+ Product Types"; About page says "10 Product Categories" — a small factual inconsistency.
- Verified project history (Ministry of Health, MPR RI, Bawaslu, Pertamina, Bank Mandiri) exists only as timeline text — never shown as a portfolio, despite being the strongest available proof-of-work content.
- Product copy uses hedged, uncertain language that undercuts authority.

Full prioritized breakdown is in `UX_AUDIT.md`.

---

## Task 3 — Design References

### 3.1 andriafesyenindonesiatekstil.id (PT AFIT) — likely sibling company

- **Platform:** WordPress + Elementor (visible `/wp-content/uploads/` asset paths), not custom-coded.
- **IA:** Home · Tentang Kami · Layanan · Portofolio · Proses Produksi · Gallery · Kontak
- **Hero CTA:** "Konsultasi Sekarang" → WhatsApp deep link with a pre-filled message ("PT Andria Fesyen Indonesia Tekstil | Halo Saya Ingin Konsultasi..."). "Hubungi Kami" repeated with similar links throughout. This is exactly the CTA pattern the new instructions ask for.
- **Stat counters bug (anti-pattern to avoid):** Jumlah Produksi / Kapasitas per Bulan / Jenis Produk / Tenaga Kerja all render as literal **"0 +"** on a plain fetch — a JS-only animated counter with no server-rendered starting value. Confirmed again on this pass, not just the earlier session.
- **Clients:** segmented **Pemerintah** vs. **Swasta** — clean B2G/B2B separation.
- **Services:** two clear cards, **Jasa CMT** and **Jasa FOB**, each with its own explanation and its own contextual WhatsApp message.
- **Portfolio:** 41 captioned project images spanning military, police, corporate, and fashion — captions do most of the credibility work.
- **Testimonials:** 8 short text quotes (name, company, praise for neatness/quality/timeliness) — real content, but belongs to AFIT, not MAI; not reusable.
- **Footer:** two addresses (Bintaro HQ + Sukabumi), two phone numbers, email, "Iniwebsiteku" designer credit.

### 3.2 akarsa.co.id (PT Akarsa Garment Indonesia)

- **Platform:** WordPress, lazy-loaded SVG placeholders.
- **IA:** Home · Katalog · Produksi · Artikel · Tentang Akarsa, plus a persistent "Hubungi Sekarang" CTA.
- **Hero:** leads directly with hyper-specific capacity numbers — "kapasitas produksi pabrik 10.000 Pcs setiap harinya," 960 sewing machines, 6 cutting tables, 24 production lines, 32 embroidery machines, 2 printing machines, 8 sablon types. Exact machine/line counts read far more credible to a procurement buyer than a vague claim — **only reusable for MAI if MAI can supply equally verified numbers**; MAI's own verified figures are 5,000 pcs/day (2024) and 600 employees.
- **"One-roof" framing:** Jahit / Bordir / Printing / Sablon presented as fully in-house — directly answers "can you do everything yourselves."
- **Portfolio:** named real projects with quantity/year — 65,000 poco-poco shirts (2018 world-record attempt), PLN vests, Lazada jackets, presidential-campaign jackets, PON Papua 2021 uniforms. Naming real, recognizable clients/institutions with quantities is a strong trust pattern.
- **FAQ:** the strongest pattern of either reference — factory locations (Jakarta & Pemalang), CMT/FOB capability, a stated 14-day lead time after DP, mockup process, rush orders, payment flexibility, and factory-visit availability. Written for a buyer doing real due diligence, not a casual browser.
- **Footer:** two factory addresses, two direct sales numbers.

### 3.3 Cross-reference takeaways for Multi Andria

| Pattern | Source | Recommendation |
|---|---|---|
| WhatsApp CTA with pre-filled, context-specific message | AFIT | Adopt via a reusable `<x-whatsapp-button>` component |
| Government vs. private client segmentation | AFIT | Adopt — MAI already has this data |
| Real project captions with client/quantity/year | Akarsa | Adopt only where MAI can verify details (currently `CONTENT NEEDED`) |
| Hyper-specific capacity numbers in hero | Akarsa | Only if verifiable — MAI already has 5,000 pcs/day and 600 employees; do not invent machine counts |
| Procurement-grade FAQ | Akarsa | Adopt the structure; answer only with MAI-verified facts |
| Short trust-pillar cards | Akarsa ("4 Motto" style) | Adopt short-card format for "Why Multi Andria" |
| Server-rendered starting values for counters | AFIT, as an anti-pattern | Explicitly avoid the "0+" flash on MAI's stat counters |

No HTML, CSS, layout, copy, imagery, or visual identity from either site will be copied — only these underlying UX principles.

---

## Task 4 — Logo & Brand Color Analysis

`logo-mai-bg-white.png` was inspected directly, including pixel-level color sampling (not guessed):

- The logo is a pen-nib / pin mark inside a solid circle, rendered in red on a white ground — a mark that reads as "precision, craft, signature" and translates reasonably to garment/textile production (cutting, stitching, finishing) without being a literal apparel icon.
- Sampled fill color: **`#AF2222`** (RGB 175, 34, 34), confirmed as the dominant non-white color across the mark. This matches the brand red given in the project instructions exactly — no correction needed.
- The mark is a single flat color plus white/negative space — no gradients, no secondary color, no outline treatment. This supports a restrained, flat-color brand system rather than a gradient- or multi-tone-heavy one.

The full palette (primary, deep, soft, neutrals) proposed in the instructions is adopted as-is for `DESIGN_DIRECTION.md` and `DESIGN_SYSTEM.md`, since it is already grounded in the real logo color rather than a guess.

**Outstanding:** only a white-background raster export was supplied. `CONTENT NEEDED`: a transparent-background and/or vector (SVG/AI) version of the logo for use in the site header, favicon, and dark-background contexts (e.g., footer, WhatsApp CTA band) — the current export cannot cleanly sit on a non-white background as-is.

---

## Open Questions (also logged in `CONTENT_REQUIREMENTS.md`)

1. Is PT Andria Fesyen Indonesia Tekstil (AFIT) formally related to PT Multi Andria Indonesia? Affects what, if anything, can be cross-referenced.
2. What is the WhatsApp Business number and preferred default greeting?
3. Should `/track-order` be preserved (as an internal, admin-fed status lookup after a WhatsApp sale) or dropped entirely?
4. Does an existing Laravel repository for multiandriaindonesia.com exist anywhere outside this repo?
5. Is a transparent-background / vector version of the logo available?
