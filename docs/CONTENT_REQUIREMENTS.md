# Content Requirements — Multi Andria Indonesia

Everything below is information the new site will need that could **not** be verified from the live site, the provided instructions, or the supplied logo file. Nothing here has been invented or assumed — each item is marked `CONTENT NEEDED` at the point it would otherwise be used, and listed centrally here for the business to action.

## Business Identity & Contact
- `CONTENT NEEDED`: Confirmed WhatsApp Business number and preferred default greeting message, for `config('company.whatsapp')`.
- `CONTENT NEEDED`: Clarification of the relationship (if any) between PT Multi Andria Indonesia and PT Andria Fesyen Indonesia Tekstil (see `DISCOVERY.md` §2.9) — affects what, if anything, can be cross-referenced.
- `CONTENT NEEDED`: Social media account links (Instagram, TikTok, LinkedIn, etc.), if any, for the footer.
- `CONTENT NEEDED`: A true vector (SVG/AI) source for the logo — the old codebase's `public/image/` folder had a transparent-background PNG export, which is enough for web use, but a vector source is preferable for print/favicon-at-scale.

**Resolved, not needed:**
- Brand color — the logo's actual red measures `#AF2222` exactly, confirmed by pixel sampling; no further confirmation required (see `DISCOVERY.md` Task 4).
- Transparent-background logo — recovered from the old codebase (`logo-mai-bg-none.png`); no longer blocking dark-surface use.
- Client logo images — 20 real B2B/B2G client logo files recovered from the old codebase (`public/image/clients/`); no need to source these again.
- Factory address — recovered from the old codebase's `.env`: `Kampung Cipamutih, Rt. 003/007, Desa Ciambar, Kec. Ciambar, Sukabumi, Jawa Barat 43357`.
- Company profile PDF — supplied at `public/company_profile.pdf` (2026-08-27), linked from `/tentang-kami`.
- Contact email — the Company Profile PDF's contact block lists a different address (`info.ptmai@gmail.com`) and a likely Instagram handle (`konveksi.tangsel`) than the live site. Per explicit instruction (2026-08-27): keep the live site's verified `multiandriai@gmail.com` and do not add `konveksi.tangsel` as the Instagram handle — neither has been changed in `config/company.php`.

## Manufacturing Capability
- `CONTENT NEEDED`: Current production capacity figure to publish — the only verified figure is "up to 5,000 pcs/day" as of 2024; confirm if still current.
- `CONTENT NEEDED`: Machine/line counts (sewing machines, cutting tables, embroidery machines, printing units), if the business wants to publish specific capability numbers similar to the Akarsa reference. Do not invent these.
- `CONTENT NEEDED`: Standard lead time(s) by product type or order size.
- `CONTENT NEEDED`: Confirmed current factory footprint beyond the verified 2020 figure (1,860 m², Sukabumi) and the 2023 Bintaro HQ expansion (4-story building, size unconfirmed).
- `CONTENT NEEDED`: Whether factory visits/surveys are offered to prospective clients.
- `CONTENT NEEDED`: Payment terms/scheme (DP percentage, payment tempo options, etc.).

**Resolved, not needed (from `public/company_profile.pdf`, verified 2026-08-27):**
- Service models — MAI offers both **Jasa CMT** (cut/sew/finish only, customer supplies material) and **Jasa FOB** (full package including material sourcing through finished product). Now live on `/layanan`.
- Production process scope — QC covers design, material selection, sewing & finishing, packaging, and delivery. Now live on `/manufacturing` and the homepage.
- Certification — **ISO 9001:2015**. Not yet surfaced on any page; consider adding a small trust badge once the certificate document/number is confirmed for display.
- Company profile PDF — supplied at `public/company_profile.pdf`, linked from `/tentang-kami`.

## Products
- `CONTENT NEEDED`: Additional product examples per category — currently only 1 SKU exists per category; confirm whether more are available, or whether the section should be explicitly framed as illustrative capability examples rather than a full catalog.
- `CONTENT NEEDED`: Verified, non-hedged material/spec details per product — current descriptions use uncertain language ("possibly," "likely") that should not carry into final copy.
- `CONTENT NEEDED`: Whether current MOQ/pricing figures are accurate and approved for public display, and how prominently (if at all) pricing should appear given the "price is not the dominant element" guidance.

## Portfolio
- `CONTENT NEEDED`: Real photographs of the named historical projects already in the verified company timeline (Ministry of Health mask production 2020, MPR RI procurement 2021, Ministry of Industry 2021, Bawaslu/Pertamina/Bank Mandiri/Kab. Solok Selatan 2023). None currently have accompanying imagery.
- `CONTENT NEEDED`: Any additional completed projects (client, product, quantity, year) the business wants to showcase beyond what's in the current timeline.

## Testimonials
- `CONTENT NEEDED`: Real client testimonials (quote, name, company, optional logo). None currently exist on MAI's own site. Recommend collecting 3–5 before launch; the homepage Testimonials section should be omitted until then rather than filled with placeholder or borrowed content.

## Photography
- `CONTENT NEEDED`: Real factory/production photography — sewing lines, cutting, fabric close-ups, finished garments, packaging, QC — for the hero, Manufacturing, and Portfolio sections. The old codebase's 29 product images (`storage/app/public/products/`) were inspected directly and are CGI/3D-rendered garment mockups on a mannequin bust or floating, not real photography — usable as interim product-card imagery only, not as a substitute for authentic factory/production photos.

## FAQ
- `CONTENT NEEDED`: Business-approved answers to standard procurement questions (MOQ, custom design, custom colors, customer-supplied material, production timeline, CMT/FOB acceptance, uniform production, large-quantity capability, quotation process). Any question without a verified answer stays unpublished rather than guessed.

## Track Order Decision
- `CONTENT NEEDED` (a decision, not content): whether to keep, simplify, or remove the `/track-order` functionality in the new site — see `DISCOVERY.md` §2.7 and `SITEMAP.md`.

## Repository / Technical
- **Resolved:** the production Laravel codebase was supplied at `D:\Bojel\mai-old-site` (2026-08-27) — see `DISCOVERY.md` Task 1 for the full audit.
- `CONTENT NEEDED`: Access to the live **production database** (MySQL) — the supplied codebase's local `database.sqlite` was never migrated past the base Laravel tables, so the real current product catalog (as opposed to the dev seeder's placeholder products) only exists on the live server and was not included in the download.
