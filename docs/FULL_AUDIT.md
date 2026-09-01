# Full Audit — Multi Andria Indonesia

**Date:** 2026-09-01
**Status:** Phase 1 — Audit (no code modifications)

---

## Table of Contents

1. [IA Audit](#1-ia-audit)
2. [Visual Audit](#2-visual-audit)
3. [UX/Conversion Audit](#3-uxconversion-audit)
4. [Responsive Audit](#4-responsive-audit)
5. [Accessibility Audit](#5-accessibility-audit)
6. [Performance/Image Audit](#6-performanceimage-audit)
7. [Component/Reuse Audit](#7-componentreuse-audit)
8. [Route/SEO Audit](#8-routeseo-audit)
9. [Complete Image Inventory](#9-complete-image-inventory)
10. [Image-to-Page Mapping](#10-image-to-page-mapping)
11. [Proposed Hero per Canonical Page](#11-proposed-hero-per-canonical-page)
12. [Proposed Section Order per Canonical Page](#12-proposed-section-order-per-canonical-page)
13. [Exact Files Likely to Change](#13-exact-files-likely-to-change)
14. [Risks](#14-risks)
15. [P0/P1/P2/P3 Implementation Plan](#15-pppp3-implementation-plan)

---

## 1. IA Audit

### Current Navigation (in `app.blade.php` lines 39–46)

```
Home → /
Tentang Kami → /tentang-kami
Produk → /produk
Layanan → /layanan
Manufacturing → /manufacturing
Portfolio → /portfolio
```

### Canonical Target Navigation

```
Home → /
Tentang Kami → /tentang-kami
Produk → /produk
Layanan → /layanan (consolidates Manufacturing)
Portofolio → /portofolio (consolidates Produk + Portfolio)
```

### IA Discrepancies Found

| Issue | Current State | Target State | Priority |
|---|---|---|---|
| Manufacturing is a separate page | `/manufacturing` exists as a full page with own hero, stats, process flow, facilities, CTA | Content absorbed into `/layanan`; `/manufacturing` 301-redirects to `/layanan#proses-produksi` | P0 |
| Portfolio label inconsistency | Navigation says "Portfolio" (English), route is `portfolio.index` | Should say "Portofolio" (Indonesian) in nav label | P1 |
| Footer still lists Manufacturing | `app.blade.php` line 139: `route('manufacturing')` | Remove from footer nav; replace with consolidated `/layanan` | P0 |
| Produk and Portofolio are separate | `/produk` is product catalog, `/portfolio` is project showcase | Both consolidate into a single `/portofolio` experience (product showcase + project showcase) | P1 |
| No redirect for `/manufacturing` | Route exists with no redirect | Add `Route::permanentRedirect('/manufacturing', '/layanan')` | P0 |
| No redirect for `/portfolio` (old) | Route exists | If route name changes, old URL should redirect | P1 |
| `/kontak` already redirects | `Route::permanentRedirect('/kontak', '/tentang-kami#lokasi')` | Keep as-is | OK |
| Footer social links empty | `config('company.social')` all null | Mark as CONTENT NEEDED | P2 |

### Footer Navigation Audit (`app.blade.php` lines 133–141)

Currently renders: Tentang Kami, Produk, Layanan, Manufacturing, Portfolio

Must become: Tentang Kami, Produk, Layanan, Portofolio

### Route Inventory

| Method | URI | Name | Controller | Status |
|---|---|---|---|---|
| GET | `/` | `home` | `HomeController@index` | Keep |
| GET | `/tentang-kami` | `about` | `PageController@about` | Keep |
| GET | `/produk` | `products.index` | `ProductController@index` | Keep (absorbed into portofolio flow) |
| GET | `/layanan` | `services` | `PageController@services` | Keep (absorbs manufacturing) |
| GET | `/manufacturing` | `manufacturing` | `PageController@manufacturing` | **Redirect → /layanan** |
| GET | `/portfolio` | `portfolio.index` | `PortfolioController@index` | **Rename/redirect → /portofolio** |
| GET | `/kontak` | — | Redirect → `/tentang-kami#lokasi` | Keep redirect |
| GET | `/login` | `login` | `Auth\LoginController@create` | Keep |
| POST | `/login` | — | `Auth\LoginController@store` | Keep |
| POST | `/logout` | `logout` | `Auth\LoginController@destroy` | Keep |
| GET | `/admin/dashboard` | `admin.dashboard` | `Admin\DashboardController@index` | Keep |
| Resource | `/admin/products` | `admin.products.*` | `Admin\ProductController` | Keep |

---

## 2. Visual Audit

### Design System Compliance

The Tailwind v4 `@theme` in `resources/css/app.css` correctly defines the MAI brand tokens:
- `--color-mai-red: #af2222` ✓
- `--color-mai-wine: #7f171a` ✓
- `--color-mai-soft-red: #d84a4a` ✓
- `--color-mai-ivory: #f8f6f2` ✓
- `--color-mai-gray: #f1f0ed` ✓
- `--color-mai-charcoal: #181818` ✓
- `--color-mai-slate: #626262` ✓
- `--color-mai-border: #dedcd7` ✓
- `--font-sans: 'Plus Jakarta Sans'` ✓

### Visual Issues Found

| Issue | Location | Detail | Priority |
|---|---|---|---|
| Hero right side is empty placeholder | `home.blade.php:22-26` | `[CONTENT NEEDED — foto produksi/factory asli...]` placeholder box | P0 |
| Manufacturing hero uses `bg-mai-charcoal` dark bg | `manufacturing.blade.php:3` | Same dark hero as every other page — no visual differentiation | P1 |
| Products hero says "Kapabilitas Produksi Kami" (duplicate) | `products/index.blade.php:6` | Same h1 as Manufacturing page — confusing duplicate | P0 |
| `!important` overrides on CTA | `manufacturing.blade.php:68` | `bg-white! text-mai-red! hover:bg-mai-ivory!` — Tailwind `!` overrides indicate component design gap | P1 |
| Product category cards are text-only boxes | `home.blade.php:63-72` | No images, just text labels in white boxes — low visual impact | P1 |
| Manufacturing capability section is text-only | `home.blade.php:90-95` | 5 text labels in dark boxes with no icons or imagery | P2 |
| Keunggulan Kami uses numbered circles | `home.blade.php:126`, `about.blade.php:95` | Simple numbered circles — functional but not premium-feeling | P2 |
| Stat strip on wine background | `home.blade.php:50`, `about.blade.php:26` | `bg-mai-wine` works but is the only dark-red section on the page — creates a "band" effect | P2 |
| FAQ has only 2 placeholder items | `home.blade.php:203-212` | Only 2 questions — appears incomplete | P1 |
| Testimonials section renders empty state | `home.blade.php:171-180` | "Testimoni pelanggan kami akan segera hadir" — section exists but has no content | P2 |
| Services page is very short (54 lines) | `services.blade.php` | Only hero + 2 cards + content-needed notice — feels sparse | P1 |
| Portfolio page shows empty state | `portfolio/index.blade.php:12-19` | No projects in database — shows CONTENT NEEDED notice | P1 |

### Section Rhythm Audit (Homepage)

Current section background pattern:
```
charcoal (hero) → white (timeline) → wine (stats) → ivory (products) → charcoal (manufacturing) → white (advantages) → ivory (portfolio) → white (testimonials) → ivory (clients) → white (FAQ) → red (CTA)
```

This is actually a reasonable alternating rhythm. However:
- Too many `bg-white` sections in a row (advantages → testimonials → FAQ)
- The `bg-mai-wine` stat strip feels heavy — consider lighter treatment
- Final CTA `bg-mai-red` is correct per design system

### Typography Compliance

- Plus Jakarta Sans is loaded via Google Fonts ✓
- `text-4xl font-extrabold leading-[1.05]` used for hero h1 ✓
- `text-3xl font-bold leading-tight sm:text-4xl` used for section h2 ✓
- Eyebrow pattern: `text-xs font-bold uppercase tracking-widest text-mai-red` ✓
- Body text: `text-sm leading-relaxed text-mai-slate` ✓
- **Issue:** No display-scale (56-72px) hero typography — hero h1 tops at `text-6xl` (60px) which is below the design system's recommended display scale

### Card Pattern Compliance

- Cards use `rounded-xl border border-mai-border bg-white` ✓
- Hover: `hover:-translate-y-1 hover:border-mai-red hover:shadow-md` ✓
- **Issue:** Some cards use `rounded-2xl` (services) while others use `rounded-xl` (products, portfolio) — inconsistent radius

---

## 3. UX/Conversion Audit

### Conversion Flow

The WhatsApp CTA system is well-implemented:
- `<x-whatsapp-button>` component exists with primary/secondary variants ✓
- Centralized `config('company.whatsapp.number')` ✓
- Context-specific messages per page ✓
- Mobile sticky WhatsApp bar ✓
- Navbar WhatsApp CTA ✓

### UX Issues Found

| Issue | Location | Detail | Priority |
|---|---|---|---|
| No WhatsApp number configured | `config/company.php:16` | `env('COMPANY_WHATSAPP_NUMBER')` — `.env` value needed | P0 (blocker) |
| Homepage hero has no image | `home.blade.php:22-26` | Placeholder text in hero right panel — first visual impression is broken | P0 |
| Products h1 = Manufacturing h1 | `products/index.blade.php:6` | Both say "Kapabilitas Produksi Kami" — confusing | P0 |
| Final CTA uses raw `<a>` instead of `<x-whatsapp-button>` | `home.blade.php:253`, `about.blade.php:156` | Bypasses the WhatsApp component — inconsistent pattern | P1 |
| No `<x-whatsapp-button>` on about page final CTA | `about.blade.php:156` | Uses raw `<a href="https://wa.me/...">` instead of component | P1 |
| Services page lacks production process explanation | `services.blade.php` | Only shows CMT/FOB cards — no process flow or manufacturing detail | P1 |
| Portfolio page has no projects | `portfolio/index.blade.php:12` | Empty state — no visual proof of work | P1 |
| FAQ has only 2 items | `home.blade.php:203-212` | Missing MOQ, lead time, CMT/FOB, payment questions | P1 |
| No portfolio preview on homepage when empty | `home.blade.php:138` | Section hidden entirely when `$featuredPortfolio` is empty | P2 |
| Services page has no hero image | `services.blade.php:3-11` | Dark charcoal hero with no imagery | P2 |
| Testimonials section renders but has no content | `home.blade.php:171-180` | Shows empty state rather than being hidden | P2 |
| Manufacturing page CTA uses `!important` overrides | `manufacturing.blade.php:68` | Indicates component doesn't support the required variant | P2 |

### B2B Conversion Assessment

**Strengths:**
- WhatsApp-first model correctly implemented in component architecture
- Context-specific messages per product/page ✓
- Company profile PDF download available on About page ✓
- Client logos segmented B2B / B2G ✓
- Timeline is a genuine trust asset ✓
- Certifications verified from Company Profile ✓

**Weaknesses:**
- No real portfolio photography to prove capability
- No real factory/manufacturing photography
- Sparse product catalog (1 SKU per category)
- FAQ is skeletal (2 questions)
- Testimonials are fabricated placeholders (must be reverted)
- No lead-time or MOQ information readily available

---

## 4. Responsive Audit

### Current Responsive Implementation

The layout uses Tailwind's default breakpoints:
- Mobile: base (< 640px)
- `sm:` ≥ 640px
- `md:` ≥ 768px
- `lg:` ≥ 1024px
- `xl:` ≥ 1280px

### Responsive Issues Found

| Issue | Location | Detail | Priority |
|---|---|---|---|
| Hero grid is 2-col on lg with no gap management | `home.blade.php:5` | `lg:grid-cols-2 gap-12` — works but hero image placeholder is square on desktop | P1 |
| Product category grid goes 5-col on lg | `home.blade.php:63` | `lg:grid-cols-5` — 10 items in 2 rows on desktop, tight | P2 |
| Mobile sticky WhatsApp bar takes 80px | `app.blade.php:176` | `h-20 lg:hidden` spacer — substantial screen real estate on mobile | P2 |
| Timeline horizontal scroll on desktop | `company-timeline.blade.php` | Desktop: horizontal flex with `overflow-x-auto` — works but may hide content | P2 |
| Process flow horizontal scroll on desktop | `process-flow.blade.php` | `overflow-x-auto` — may not be obvious to users that it scrolls | P2 |
| Filter pills may overflow on small mobile | `products/index.blade.php:16-25` | `flex flex-wrap gap-2` — should wrap, but 10+ pills could be tall | P2 |
| Mobile nav doesn't have escape/click-outside | `app.blade.php:80-100` | Alpine `x-show` with no `@click.outside` — can only close via hamburger | P2 |
| No `min-height: 100dvh` on hero | `home.blade.php:4` | Uses `py-20 sm:py-32` padding instead — fine, but no viewport-height hero | P3 |

### Responsive Strengths

- Mobile-first construction ✓
- Mobile sticky WhatsApp CTA ✓
- Skip link present ✓
- Grid reflows from 1 → 2 → 3/4/5/6 columns ✓
- Font sizes scale with breakpoints ✓
- Alpine.js mobile menu ✓

---

## 5. Accessibility Audit

### Accessibility Compliance

| Check | Status | Detail |
|---|---|---|
| Skip link | ✓ | `<a href="#main-content" class="sr-only focus:not-sr-only...">` in `app.blade.php:24-26` |
| Semantic HTML | ✓ | `<header>`, `<main>`, `<nav>`, `<footer>`, `<section>` used throughout |
| `lang` attribute | ✓ | `<html lang="id">` |
| `aria-current="page"` | ✓ | Applied to active nav links (`app.blade.php:51`) |
| Focus visible states | ✓ | Global `focus-visible:outline-2 focus-visible:outline-mai-red` in CSS |
| Image alt text | ⚠ | Most images have alt text, but some are generic (e.g., `$product->name` only) |
| `aria-label` on hamburger | ✓ | `aria-label="Buka menu"` (`app.blade.php:68`) |
| `aria-controls` on hamburger | ✓ | `aria-controls="mobile-navigation-menu"` |
| `aria-expanded` on hamburger | ✓ | `:aria-expanded="mobileOpen"` |
| FAQ accordion `aria-expanded` | ✓ | `:aria-expanded="open === {{ $index }}"` |
| FAQ accordion `aria-controls` | ✓ | `:aria-controls="'faq-panel-{{ $index }}'"` |
| FAQ `role="region"` | ✓ | On FAQ answer panels |
| Reduced motion support | ✓ | `@media (prefers-reduced-motion: reduce)` disables animations in CSS |
| Reduced motion in JS | ✓ | `animations.js` checks `prefers-reduced-motion` before running observers |
| Color contrast | ⚠ | `#AF2222` on `#FFFFFF` passes AA for large text; needs verification for small text |
| `aria-hidden` on decorative SVGs | ✓ | SVG icons have `aria-hidden="true"` |
| `role="region"` on map iframes | ⚠ | `<x-google-map>` doesn't add `role="region"` or `aria-label` to iframes |
| Keyboard navigation for carousel | ✓ | `@keydown.left` / `@keydown.right` on testimonial carousel |

### Accessibility Issues Found

| Issue | Location | Detail | Priority |
|---|---|---|---|
| Mobile nav no click-outside to close | `app.blade.php:80` | Users must find hamburger to close menu | P2 |
| Google Maps iframe lacks aria-label | `google-map.blade.php` | `<iframe>` has no `title` or `aria-label` attribute | P2 |
| FAQ panel transition may cause layout shift | `home.blade.php:226-235` | `x-transition` on FAQ answer — needs `x-collapse` for smooth height animation | P3 |
| No `aria-label` on filter pills group | `products/index.blade.php:16` | Has `aria-label="Filter produk"` ✓ (actually present) | OK |

---

## 6. Performance/Image Audit

### Image Asset Summary

| Location | Files | Total Size | Git Status | Used in Views? |
|---|---|---|---|---|
| `public/images/logo-mai-transparent.png` | 1 | 957 KB | Tracked | ✓ (nav, footer) |
| `public/images/logo-mai-white-bg.png` | 1 | 556 KB | Tracked | ✗ |
| `public/images/placeholder-product.svg` | 1 | 0.4 KB | Tracked | ✓ (fallback) |
| `public/images/clients/` | 20 | 284 KB | Tracked | ✓ (config) |
| `public/images/factory/` | 19 | 1.76 MB | **UNTRACKED** | ✗ (unused) |
| `public/images/dokumen-legal/` | 54 | 7.3 MB | **UNTRACKED** | ✗ (unused) |
| `public/images/lainnya/` | 52 | 3.59 MB | **UNTRACKED** | ✗ (unused) |
| `public/images/logo/` | 78 | 2.6 MB | **UNTRACKED** | ✗ (unused) |
| `public/images/model/` | 13 | 361 KB | **UNTRACKED** | ✗ (unused) |
| `public/images/produk/` | 24 | 1.04 MB | **UNTRACKED** | ✗ (unused) |
| `public/images/proyek/` | 2 | 153 KB | **UNTRACKED** | ✗ (unused) |
| `storage/app/public/products/` | 29 | 28.38 MB | Tracked | ✓ (database) |
| `logo-mai-bg-white.png` (root) | 1 | 556 KB | Tracked | ✗ (duplicate) |

### Performance Issues Found

| Issue | Location | Detail | Priority |
|---|---|---|---|
| Product images are oversized PNGs | `storage/app/public/products/` | 29 files averaging ~980 KB each; all PNG, no WebP | P1 |
| No WebP or AVIF variants | Entire site | No modern image format conversion in pipeline | P1 |
| No `<picture>` or `srcset` usage | All Blade views | Single-size images served at all breakpoints | P2 |
| Logo is 957 KB PNG | `public/images/logo-mai-transparent.png` | Large for a 40x40 rendered element — should be <50 KB | P1 |
| Google Fonts loaded externally | `app.blade.php:16-18` | External Google Fonts request — consider self-hosting | P2 |
| No `fetchpriority="high"` on hero image | `home.blade.php` | Hero image (once added) should load eagerly | P2 |
| All product images use `loading="lazy"` | `products/index.blade.php:39` | Correct for below-fold; hero image should not | P3 |
| 242 untracked images in `public/images/` | Various | Large local-only asset library not in Git | P2 |
| Root logo duplicate | `logo-mai-bg-white.png` | Identical to `public/images/logo-mai-white-bg.png` — should be removed | P3 |

---

## 7. Component/Reuse Audit

### Existing Components (11 Blade components)

| Component | Location | Reuse Quality | Notes |
|---|---|---|---|
| `x-whatsapp-button` | `components/whatsapp-button.blade.php` | **Excellent** | Centralized, configurable, used everywhere |
| `x-section-heading` | `components/section-heading.blade.php` | **Excellent** | Clean, reusable, align left/center |
| `x-stat-strip` | `components/stat-strip.blade.php` | **Good** | Counter animation, config-driven |
| `x-company-timeline` | `components/company-timeline.blade.php` | **Good** | Responsive, config-driven, desktop horizontal / mobile vertical |
| `x-process-flow` | `components/process-flow.blade.php` | **Good** | Config-driven, 8 steps with icons |
| `x-location-card` | `components/location-card.blade.php` | **Good** | Compact/prominent variants |
| `x-google-map` | `components/google-map.blade.php` | **Good** | Lazy-loaded iframe, grayscale treatment |
| `x-client-logos` | `components/client-logos.blade.php` | **Good** | B2B/B2G split, grayscale hover |
| `x-testimonial-carousel` | `components/testimonial-carousel.blade.php` | **Good** | Alpine.js, keyboard accessible, empty state |
| `x-testimonial-card` | `components/testimonial-card.blade.php` | **Good** | Clean figure/figcaption pattern |
| `x-layouts.app` | `components/layouts/app.blade.php` | **Good** | Full layout with nav, footer, mobile CTA |

### Missing Components (candidates for creation)

| Component | Needed By | Priority |
|---|---|---|
| `<x-page-hero>` | Every page (currently duplicated hero markup in each view) | P0 |
| `<x-cta-section>` | Final CTA on every page (currently duplicated) | P1 |
| `<x-faq-accordion>` | Homepage FAQ (currently inline Alpine.js in home.blade.php) | P2 |
| `<x-product-card>` | Produk page and homepage product categories | P1 |
| `<x-portfolio-card>` | Portfolio page and homepage preview | P1 |
| `<x-factory-proof>` | Layanan/Manufacturing section (once real photos exist) | P2 |

### Component Duplication Issues

| Issue | Files Affected | Detail | Priority |
|---|---|---|---|
| Hero section duplicated in every page view | `home.blade.php`, `about.blade.php`, `services.blade.php`, `manufacturing.blade.php`, `products/index.blade.php`, `portfolio/index.blade.php` | Each page has its own hero markup with slightly different styling — should be a shared `<x-page-hero>` component | P0 |
| CTA section duplicated | `home.blade.php:246-261`, `about.blade.php:152-161`, `manufacturing.blade.php:62-75` | Final CTA sections repeat the same pattern with minor variations | P1 |
| Location cards duplicated | `about.blade.php:126-137`, `manufacturing.blade.php:43-54` | Same two location cards appear on both pages | P1 |
| Stat strip duplicated | `home.blade.php:50-54`, `about.blade.php:26-30`, `manufacturing.blade.php:10-14` | Same stat strip on 3 pages | P2 |

---

## 8. Route/SEO Audit

### Current SEO Implementation

| Check | Status | Detail |
|---|---|---|
| Dynamic `<title>` | ✓ | `{{ $title ? $title.' — Multi Andria Indonesia' : 'Multi Andria Indonesia — ...' }}` |
| Dynamic `<meta name="description">` | ✓ | Page-specific or fallback default |
| `<meta name="viewport">` | ✓ | `width=device-width, initial-scale=1` |
| `<meta charset="utf-8">` | ✓ | |
| Canonical URL | ✗ | Not implemented — no `<link rel="canonical">` |
| Open Graph metadata | ✗ | No `og:title`, `og:description`, `og:image` tags |
| Twitter Card metadata | ✗ | No Twitter card tags |
| Structured data (JSON-LD) | ✗ | No Organization, FAQ, or BreadcrumbList schema |
| Sitemap | ✗ | No `/sitemap.xml` |
| robots.txt | ⚠ | Not checked — may not exist |
| Semantic heading hierarchy | ⚠ | h1 present on each page, but h2/h3 nesting could be improved |
| Breadcrumbs | ✗ | Not implemented |
| 404 page | ✗ | No custom 404 view found |

### SEO Issues Found

| Issue | Detail | Priority |
|---|---|---|
| No canonical URLs | Each page should have `<link rel="canonical" href="...">` | P1 |
| No Open Graph tags | Social sharing will show generic/missing previews | P1 |
| No JSON-LD structured data | Missing Organization schema, FAQ schema, BreadcrumbList | P2 |
| No sitemap.xml | Search engines can't discover all pages efficiently | P2 |
| No custom 404 page | Broken links show generic server error | P2 |
| Duplicate h1 patterns | Products page and Manufacturing page share same h1 text | P0 |
| Products page title says "Produk — Multi Andria Indonesia" | Should be unique and descriptive per page | P1 |

### Route Consolidation SEO Safety

When consolidating Manufacturing → Layanan:
1. Add `Route::permanentRedirect('/manufacturing', '/layanan#proses-produksi')`
2. Update all internal links (nav, footer, homepage section)
3. Old Manufacturing URL equity transfers via 301

When consolidating Portfolio → Portofolio:
1. If route name changes from `portfolio.index` to `portofolio.index`, old `/portfolio` URL needs redirect
2. Update all internal links

---

## 9. Complete Image Inventory

### Tracked Assets (in Git)

| Asset | Path | Size | Classification | Use |
|---|---|---|---|---|
| MAI logo (transparent) | `public/images/logo-mai-transparent.png` | 957 KB | `proof` (brand) | Nav, footer |
| MAI logo (white bg) | `public/images/logo-mai-white-bg.png` | 556 KB | `proof` (brand) | Unused in views |
| Placeholder SVG | `public/images/placeholder-product.svg` | 0.4 KB | `decorative` | Product fallback |
| 20 client logos | `public/images/clients/*.png` | 4-29 KB each | `proof` (client) | Client section |
| 29 product images | `storage/app/public/products/*.png` | 782-1,292 KB each | `showcase` (CGI mockups) | Product cards via DB |
| MAI logo (root) | `logo-mai-bg-white.png` | 556 KB | `proof` (brand) | Unused duplicate |

### Untracked Assets (local only)

#### `public/images/factory/` — 19 files, 1.76 MB

Filenames suggest AI-generated or stock factory imagery ("a-group-of-people-working", "a-factory-with-lots-of"). The file `pt-andria-fesyen-indonesia-tekstil.jpg` (164 KB) appears to reference the likely sibling company.

**Classification:** Likely `showcase` or `reject` depending on content. These are NOT authenticated as Multi Andria's actual facility. Per AGENTS.md rules: if they are stock/generic, they must NOT be used as manufacturing proof. If any are authentic MAI facility photos, they become high-value `proof` assets.

**Recommendation:** Visually inspect each file. Classify as:
- `proof` only if confirmed as real MAI facility/process
- `showcase` if usable as generic garment-industry imagery (clearly not presented as MAI's own)
- `reject` if misleading or low-quality

#### `public/images/model/` — 13 files, 361 KB

Product/model photography showing people wearing garments (uniforms, military wear, Muslim fashion). Filenames suggest AI-generated or sourced imagery ("a-woman-wearing-a-black", "a-man-in-a-blue").

**Classification:** Likely `showcase` — product/garment photography. Could be used for product category or portfolio sections if confirmed as real MAI production.

#### `public/images/produk/` — 24 files, 1,037 KB

Product shots including uniforms, jerseys, school wear. Named files include real client references: `jersey-pertamina.jpg`, `seragam-polri.jpg`, `pdh-asn.jpg`, `sma-31-logo.png`.

**Classification:** Mixed — some appear to be genuine product examples (`jersey-pertamina.jpg`, `seragam-polri.jpg`), others may be sourced (`a-black-shirt-with-the.jpg`). Each needs individual visual inspection.

**High-value candidates:**
- `jersey-pertamina.jpg` (27 KB) — potential portfolio proof
- `seragam-polri.jpg` (31 KB) — potential portfolio proof
- `pdh-asn.jpg` (33 KB) — potential portfolio proof
- `seragam-kerja-apd-safety.jpg` (34 KB) — potential portfolio proof
- `sma-31-logo.png` / `sma-31-logo-1.png` — school client proof

#### `public/images/proyek/` — 2 files, 153 KB

Only 2 project images: `a-building-with-a-glass.jpg` (101 KB) and `rumah-sakit-umum-kota-tangerang.png` (52 KB).

**Classification:** Likely `proof` or `showcase` — building/project photography. Very limited for a company with the verified project history described in the timeline.

#### `public/images/lainnya/` — 52 files, 3.59 MB

Catch-all directory with garbled/AI-generated filenames. Includes various garment shots, logos, miscellaneous images.

**Classification:** Needs individual inspection. Many filenames suggest AI-generated descriptions. Likely mix of `showcase`, `decorative`, and `reject`.

#### `public/images/logo/` — 78 files, 2.6 MB

Multiple variants of client/partner/organizational logos. The `clients/` directory (20 files) appears to be a curated subset of these.

**Classification:** `proof` (client logos) — duplicates of what's already in `clients/`.

#### `public/images/dokumen-legal/` — 54 files, 7.3 MB

Certificate scans, legal documents. Not for web use.

**Classification:** `reject` — internal documentation, not website imagery.

---

## 10. Image-to-Page Mapping

### Current Mapping (what's actually used)

| Page | Section | Current Image | Source | Status |
|---|---|---|---|---|
| Home | Hero | **PLACEHOLDER** | `home.blade.php:22-26` | CONTENT NEEDED |
| Home | Product Categories | None (text-only cards) | `home.blade.php:63-72` | No imagery |
| Home | Manufacturing | None (text-only) | `home.blade.php:90-95` | No imagery |
| Home | Portfolio | `$project->cover_image_url` | Database | Empty (no projects) |
| Home | Clients | 20 client logos | `public/images/clients/` | ✓ |
| Tentang Kami | Hero | None (text-only) | `about.blade.php:3-24` | No imagery |
| Tentang Kami | Locations | Google Maps embed | External | ✓ |
| Tentang Kami | Clients | 20 client logos | `public/images/clients/` | ✓ |
| Produk | Product cards | `$product->primary_image_url` | Database (CGI mockups) | Low quality |
| Layanan | Service cards | None (text-only) | `services.blade.php:16-40` | No imagery |
| Manufacturing | Hero | None | `manufacturing.blade.php:3-8` | No imagery |
| Manufacturing | Process | Inline SVG icons | `process-flow.blade.php` | ✓ |
| Manufacturing | Locations | Google Maps embed | External | ✓ |
| Portfolio | Project cards | `$project->cover_image_url` | Database | Empty (no projects) |

### Proposed Mapping (target state)

| Page | Section | Proposed Image | Source | Status |
|---|---|---|---|---|
| **Home** | Hero | Authentic production/garment photography | CONTENT NEEDED (see `public/images/factory/` for candidates) | P0 |
| **Home** | Product Categories | Product photography per category | `public/images/produk/` candidates | P1 |
| **Home** | Manufacturing | Production process imagery | CONTENT NEEDED | P1 |
| **Home** | Portfolio | Featured project photography | `public/images/produk/jersey-pertamina.jpg` etc. | P1 |
| **Tentang Kami** | Hero | HQ office photograph | Asset B (multiandria HQ) — `public/images/factory/pt-andria-fesyen-indonesia-tekstil.jpg` candidate | P0 |
| **Tentang Kami** | Company identity | Office/facility photography | CONTENT NEEDED | P1 |
| **Layanan** | Hero | Production/service imagery | CONTENT NEEDED (typography fallback if no photo) | P1 |
| **Layanan** | CMT/FOB | Process illustrations or photography | CONTENT NEEDED | P2 |
| **Portofolio** | Featured project | Black custom T-shirt project | Asset A (approved candidate) | P0 |
| **Portofolio** | Project grid | Real project photography | `public/images/produk/` and `public/images/model/` candidates | P1 |

---

## 11. Proposed Hero per Canonical Page

### Home

**Direction:** Typography-led editorial hero OR authentic production photography (if available).

**Layout:** Full-width dark section (`bg-mai-charcoal`). Left: large headline, subtitle, two CTAs (WhatsApp primary + Lihat Produk secondary). Right: production/garment photography or typography composition.

**Content:**
- Eyebrow: `PT. Multi Andria Indonesia`
- Headline: `Partner Produksi Garment untuk Bisnis dan Institusi Anda` (keep existing — it's strong)
- Subtitle: existing copy about custom garment/textile manufacturing
- CTAs: WhatsApp + Lihat Produk

**Image:** CONTENT NEEDED — authentic production/garment imagery. If `public/images/factory/` images are confirmed as real MAI facility, select the strongest one. Otherwise, use a typography-led composition (large text + brand elements).

### Tentang Kami

**Direction:** Company identity hero with HQ office imagery.

**Layout:** Dark section (`bg-mai-charcoal`), centered text with description.

**Content:**
- Keep existing: eyebrow, title, description, PDF download CTA

**Image:** Asset B (HQ office) is approved. `public/images/factory/pt-andria-fesyen-indonesia-tekstil.jpg` may be a candidate if it shows the actual HQ building. CONTENT NEEDED: confirmed HQ photograph.

### Layanan (absorbs Manufacturing)

**Direction:** Service/manufacturing hero — explain CMT/FOB and production capability.

**Layout:** Split layout — left: service model explanation; right: production process visual or typography.

**Content:**
- Headline: `Model Kerja Sama Produksi` or `Layanan Produksi Garment`
- Subtitle: Clothing Design & Production expertise
- Then: CMT card, FOB card, production process flow, facilities

**Image:** CONTENT NEEDED — if no authentic production photography, use typography + process diagram approach.

### Portofolio (consolidates Produk + Portfolio)

**Direction:** Showcase what MAI can produce.

**Layout:** Full-width hero with editorial headline, then product/project grid.

**Content:**
- Headline: `Portofolio Produksi Kami` or `Hasil Kerja Kami`
- Subtitle: examples of what MAI manufactures

**Image:** Asset A (black custom T-shirt project) is approved for portfolio featured project.

---

## 12. Proposed Section Order per Canonical Page

### Home (Target)

```
1. Hero — positioning, capability, WhatsApp CTA
2. Company Introduction — short story, "Sejak 2014"
3. Trust/Statistics — 4 key numbers (server-rendered)
4. Product Categories — visual category tiles
5. Manufacturing Capabilities — production process (absorbed from current manufacturing section)
6. Why Multi Andria — 3 advantages
7. Portfolio Preview — featured projects
8. Client/Trust Signals — B2B + B2G logos
9. FAQ — procurement questions (expand to 6-8 items)
10. Final CTA — strongest visual weight
```

**Changes from current:**
- Hero image must be real (currently placeholder)
- FAQ must expand from 2 to 6-8 items
- Product categories should include imagery (currently text-only)
- Manufacturing capabilities should be more visual (currently text-only)

### Tentang Kami (Target)

```
1. Hero — company identity with HQ imagery
2. Statistics — trust numbers
3. Vision & Mission ("Arah Kami") — editorial layout
4. Advantages — 3 points
5. Timeline — company journey
6. Locations — HQ + Factory with maps
7. Clients — B2B + B2G logos
8. Final CTA
```

**Changes from current:** Minimal — current structure is solid. Hero needs real imagery.

### Layanan (Target — absorbs Manufacturing)

```
1. Hero — service/manufacturing positioning
2. CMT / FOB — two service model cards
3. Production Process — 8-step flow (from manufacturing page)
4. Quality Control — cross-stage QC note
5. Production Statistics — key numbers
6. Facilities — two location cards (from manufacturing page)
7. Final CTA
```

**Changes from current:** Merge `services.blade.php` (CMT/FOB cards) + `manufacturing.blade.php` (process flow, facilities, stats) into one page.

### Portofolio (Target — consolidates Produk + Portfolio)

```
1. Hero — showcase positioning
2. Product Categories — visual category grid with imagery
3. Featured Projects — selected portfolio work
4. Product Showcase — product cards with category filter
5. Production Context — "what we can produce" summary
6. Final CTA — "Buat Produk Serupa"
```

**Changes from current:** Merge product catalog and portfolio into one showcase experience. Add real project photography when available.

---

## 13. Exact Files Likely to Change

### Must Change (P0)

| File | Change | Reason |
|---|---|---|
| `routes/web.php` | Add redirect for `/manufacturing → /layanan`; potentially rename portfolio route | IA consolidation |
| `resources/views/components/layouts/app.blade.php` | Remove Manufacturing from nav + footer; rename Portfolio → Portofolio; update footer links | IA consolidation |
| `config/company.php` | Revert testimonials to `[]` (remove dummy data) | Content safety |
| `resources/views/home.blade.php` | Fix hero placeholder; fix duplicate h1 text; expand FAQ | Visual/UX |
| `resources/views/products/index.blade.php` | Fix h1 "Kapabilitas Produksi Kami" → unique product-focused h1 | SEO/UX |
| `resources/views/manufacturing.blade.php` | Redirect target (content moves to services.blade.php) | Consolidation |

### Should Change (P1)

| File | Change | Reason |
|---|---|---|
| `resources/views/services.blade.php` | Absorb manufacturing content (process flow, facilities, stats) | Consolidation |
| `resources/views/components/layouts/app.blade.php` | Add `<link rel="canonical">`, Open Graph meta tags | SEO |
| `resources/views/home.blade.php` | Replace raw WhatsApp `<a>` with `<x-whatsapp-button>` in final CTA | Consistency |
| `resources/views/about.blade.php` | Replace raw WhatsApp `<a>` with `<x-whatsapp-button>` in final CTA | Consistency |
| `resources/views/home.blade.php` | Add images to product category section | Visual quality |
| `resources/views/portfolio/index.blade.php` | Rename route reference if route changes | IA |
| `resources/css/app.css` | Potentially adjust theme tokens or add new utilities | Design refinement |

### Nice to Have (P2)

| File | Change | Reason |
|---|---|---|
| New: `resources/views/components/page-hero.blade.php` | Extract shared hero pattern | Reduce duplication |
| New: `resources/views/components/cta-section.blade.php` | Extract shared final CTA | Reduce duplication |
| `resources/views/components/google-map.blade.php` | Add `title` and `aria-label` to iframe | Accessibility |
| `resources/views/components/process-flow.blade.php` | Add scroll indicator for horizontal overflow | UX |
| `resources/js/animations.js` | No changes needed | Current implementation is solid |

---

## 14. Risks

### High Risk

| Risk | Impact | Mitigation |
|---|---|---|
| **No WhatsApp number configured** | All CTAs are broken — no conversion path works | Get WhatsApp number from business before any CTA testing |
| **Dummy testimonials in config** | If deployed, fake testimonials would damage credibility | Revert to `[]` immediately — already flagged in code comments |
| **No authentic production photography** | Every page that needs manufacturing proof has a placeholder | Design sections to work without images first; add photography when supplied |
| **No portfolio photography** | Portfolio page is empty — zero visual proof of work | Use product photography from `public/images/produk/` as interim; mark real project photos CONTENT NEEDED |

### Medium Risk

| Risk | Impact | Mitigation |
|---|---|---|
| Route consolidation may break bookmarks/inbound links | SEO equity loss | 301 redirects from old URLs |
| Factory images in `public/images/factory/` are untracked and unverified | Could be stock photos used as fake proof | Visually inspect every file before using; reject if not authentic MAI |
| Product catalog has only 1 SKU per category | Sparse catalog undermines "5,000 pcs/day" claim | Frame as "capability examples" not full catalog |
| Tailwind `!important` overrides on manufacturing CTA | Component design gap | Redesign WhatsApp button variant to handle light-on-dark naturally |
| Large untracked image library (242 files) | Not in Git, may be lost | Audit, select best assets, commit to Git |

### Low Risk

| Risk | Impact | Mitigation |
|---|---|---|
| No canonical URLs or Open Graph | Social sharing shows generic previews | Add in Phase 10 |
| No sitemap.xml | Search engine discovery slower | Add in Phase 10 |
| No custom 404 page | Poor UX for broken links | Create in Phase 10 |
| Root logo duplicate | Confusion about which file to use | Delete root copy |

---

## 15. P0/P1/P2/P3 Implementation Plan

### P0 — Critical (Must fix before any other work)

1. **Revert dummy testimonials** in `config/company.php` lines 134-170 → set `'testimonials' => []`
2. **Configure WhatsApp number** — get from business, add to `.env` as `COMPANY_WHATSAPP_NUMBER`
3. **Fix homepage hero** — replace placeholder with either:
   - Typography-led editorial composition (if no photography available)
   - Or select best candidate from `public/images/factory/` (only if verified as authentic MAI)
4. **Fix duplicate h1** — Products page h1 "Kapabilitas Produksi Kami" → "Katalog Produk Kami" or similar
5. **Consolidate Manufacturing into Layanan**:
   - Merge `manufacturing.blade.php` content into `services.blade.php`
   - Add `Route::permanentRedirect('/manufacturing', '/layanan')`
   - Update nav and footer links
6. **Update navigation labels** — "Manufacturing" removed; "Portfolio" → "Portofolio"
7. **Create new route** — `/portofolio` (or update `/portfolio` to redirect)

### P1 — High (Should fix soon after P0)

1. **Expand homepage FAQ** from 2 to 6-8 items with verified answers
2. **Add real product imagery** to homepage product category section
3. **Replace raw WhatsApp `<a>` with `<x-whatsapp-button>`** in home and about final CTAs
4. **Add canonical URLs** to layout (`<link rel="canonical">`)
5. **Add Open Graph meta tags** to layout
6. **Audit factory images** — visually inspect all 19 files, classify each
7. **Audit product images** in `public/images/produk/` — identify real vs. sourced
8. **Optimize logo** — 957 KB for a 40x40 element is excessive; convert to WebP or SVG
9. **Consolidate Produk + Portfolio** into unified `/portofolio` page
10. **Extract `<x-page-hero>` component** from duplicated hero markup
11. **Fix `!important` overrides** on WhatsApp button variant for dark backgrounds

### P2 — Medium (Improve quality)

1. **Add `<picture>` / `srcset`** for responsive images
2. **Convert product images to WebP** format
3. **Add JSON-LD structured data** (Organization, FAQ, BreadcrumbList)
4. **Create sitemap.xml** route
5. **Create custom 404 page**
6. **Add `aria-label` to Google Maps iframes**
7. **Add scroll indicators** to horizontally-scrollable components
8. **Add click-outside** to close mobile nav
9. **Self-host Google Fonts** for better performance
10. **Extract `<x-cta-section>` component** from duplicated final CTA markup
11. **Add `fetchpriority="high"` to hero image** once real image exists
12. **Improve product category cards** with imagery instead of text-only

### P3 — Low (Polish)

1. Consider `min-height: 100dvh` for hero sections
2. Add `scroll-margin-top` for anchor links (already partially done with `scroll-mt-24`)
3. Remove root `logo-mai-bg-white.png` duplicate
4. Commit selected untracked images to Git
5. Clean up `public/images/lainnya/` catch-all directory
6. Consider adding breadcrumb navigation

---

## Summary

### What's Working Well

- WhatsApp component architecture is excellent
- Design system tokens are correctly configured in Tailwind v4
- Company data is well-organized in `config/company.php`
- Timeline, certifications, and advantages are verified content
- Client logos are real and organized (B2B / B2G split)
- Responsive construction is mobile-first
- Accessibility basics (skip link, ARIA, focus states, reduced motion) are present
- Alpine.js usage is lightweight and appropriate
- Scroll reveal animations are tasteful and respect reduced-motion

### What Needs Immediate Attention

- Hero image is a placeholder — first impression is broken
- Dummy testimonials must be reverted
- WhatsApp number must be configured
- Manufacturing → Layanan consolidation not yet done
- Portfolio is empty (no projects in database)
- FAQ is skeletal (2 items)
- Duplicate h1 across pages
- No SEO metadata (canonical, OG, structured data)

### Content Gaps (Cannot be fixed without business input)

- WhatsApp Business number
- Authentic production/factory photography
- Real portfolio project photography
- Real client testimonials
- Additional product examples per category
- FAQ answers (MOQ, lead time, payment terms)
- Social media account links
- Verified production capacity and machine counts
