# Design Direction — Multi Andria Indonesia

## Brand Foundation

The uploaded logo (`logo-mai-bg-white.png`) was inspected at the pixel level: its red fill measures **`#AF2222`**, exactly matching the brand red specified for this project — the palette below is therefore grounded in the real brand mark, not a guess (see `DISCOVERY.md` Task 4). The mark itself — a pen-nib/pin inside a solid circle, single flat color, no gradient — signals precision and craft, and supports a restrained, flat-color system rather than a gradient- or multi-tone-heavy one.

`CONTENT NEEDED`: a transparent-background and/or vector export of the logo, for use on dark surfaces (footer, WhatsApp CTA band) and as a favicon — the current white-background PNG cannot sit cleanly on a non-white background as supplied.

---

## Brand Personality

**Modern + Premium + Fashion-oriented + Industrial + Professional + Confident + Warm + Minimal + Trustworthy.**

Concretely, this means: confident, large editorial typography and generous whitespace rather than a dense catalog-grid feel; photography-led rather than icon/illustration-led sections; straight lines, thin borders, and soft (not heavy) shadows rather than rounded "friendly SaaS" card treatments; and real numbers (5,000 pcs/day, 600 employees, 1,860 m² factory) treated as hero content, not buried in paragraphs.

Explicitly avoided: generic SaaS, generic ecommerce, generic corporate template, cheap garment-marketplace feel, or an overly colorful fashion-website feel.

---

## Color System

### Palette

| Token | Hex | Role |
|---|---|---|
| MAI Red (Primary) | `#AF2222` | Primary CTA, active nav, selected states, key statistics, brand accents, hover states |
| Deep Wine (Deep Brand) | `#7F171A` | Dark-red backgrounds, hover states, strong section accents, premium moments — used sparingly |
| Soft Red (Secondary Brand) | `#D84A4A` | Light accents, tags, subtle highlights, hover backgrounds — never the dominant page color |
| Warm Ivory (Main Background) | `#F8F6F2` | Main marketing/editorial sections — warmer than pure white, fits a fashion/textile feel |
| Soft Gray (Secondary Background) | `#F1F0ED` | Alternating sections, cards, form areas |
| White (Surface) | `#FFFFFF` | Cards, navigation, forms, product surfaces |
| Charcoal (Main Text) | `#181818` | Body/heading text, instead of pure black |
| Slate (Secondary Text) | `#626262` | Descriptions, metadata, supporting text |
| Border (Warm Gray) | `#DEDCD7` | Card borders, dividers, inputs, nav separators |

### Ratio

**60% Warm Ivory / White · 25% Charcoal / Neutral · 10% Soft Gray · 5% MAI Red.**

The 5% is intentional — red marks the next action, not the page. Prefer:

```
Warm Ivory background + Charcoal typography + White cards + MAI Red CTA
```

Avoid:

```
Red background + Red cards + Red buttons + Red text
```

Gradients, if used at all, stay extremely subtle and within the red/wine family — no unrelated bright colors enter the system.

### Where red appears

Primary CTAs (all WhatsApp buttons), active/selected states, key statistics, small accent marks, and the final full-width CTA band — one of the only places the brand red is allowed to dominate a section, precisely because it's the last, highest-intent moment on the page.

### Accessibility note

`#AF2222` on `#FFFFFF` and on `#F8F6F2` both pass WCAG AA for large text and UI components, but **white text on `#AF2222` should be checked against WCAG AA for body-size text** before use — prefer `#AF2222` as a large-CTA fill with white button label (already a proven high-contrast pairing) rather than as small red-on-white or red-on-ivory body copy, which reads poorly at small sizes. Final contrast values will be verified against real component sizes in Phase 3 implementation, not asserted here without testing.

---

## Typography Direction

See `DESIGN_SYSTEM.md` for the final font choice and full type scale. Direction: one confident sans-serif family used across both display and body weights (reduces font-loading overhead and keeps the system restrained, per the "not generic SaaS" brief), large editorial headlines, strong section headings, comfortable body text, and clear CTA labels. Restrained weight range — avoid using more than 2–3 weights on a single page.

---

## Layout Direction

- Large whitespace, strong visual hierarchy, large imagery, editorial grids, asymmetrical layouts where appropriate, generous section spacing, full-width visual sections, subtle borders.
- Explicitly avoid a monotonous rhythm of `Title → 3 cards → Title → 3 cards`. Alternate editorial layouts, large images, product grids, statistics, process diagrams, split layouts, and full-width CTA sections, matching the section-by-section direction in `HOMEPAGE_ARCHITECTURE.md`.

---

## Cards

Small border radius, thin borders, minimal shadows, large imagery, strong typography. Avoid excessive rounded corners, heavy shadows, floating glassmorphism, and gradients — a card should read as a clean surface, not a decorative object. Concrete tokens defined in `DESIGN_SYSTEM.md`.

---

## Photography Direction

Photography carries most of the credibility burden on this site and is prioritized over illustration or iconography. Real production photography — sewing machines, fabric, garment workers, cutting, sewing, quality control, finished products, packaging, factory environment — should be used wherever available.

`CONTENT NEEDED` for essentially all real photography: the current live site uses only product-mockup-style images and generic stock photography, none of which represents MAI's actual facility or process. Until real photography is supplied, any working build should use clearly labeled placeholders — never present a generic stock image as if it depicts MAI's real factory.

---

## Iconography

Simple, single-weight line icons only, used sparingly (process steps, "Why Multi Andria" cards, FAQ). Icons support text, they don't replace it — this is a photography-led site, not an icon-led one.

---

## Animation

Subtle only: fade-in, image reveal, slight slide, hover transitions, number counters that animate on scroll-into-view but render their final/base value server-side first (directly avoiding the "0+" flash bug observed on the AFIT reference site), and gentle image scale on hover. No parallax, no heavy scroll-jacking, no per-element animation. Always respects `prefers-reduced-motion`.

---

## Responsive Design & Mobile Navigation

Mobile-first construction for every section, not a shrunk desktop layout. Dense data (stat grids, process steps) reflows to 1–2 columns rather than a horizontally-scrolling table, except logo strips, which are intentionally horizontally scrollable. Mobile navigation collapses to a simple menu with the WhatsApp CTA kept visible or reachable within one tap at all times — including a persistent bottom WhatsApp bar if testing shows it improves conversion without feeling intrusive.

---

## WhatsApp CTA Treatment

The WhatsApp CTA is the single most important interactive element on the site and must be visually consistent everywhere it appears: same fill color (MAI Red), same icon, same label pattern, so it is instantly recognizable as "the next step" regardless of which section it appears in. No more than one primary-styled CTA visible per section/viewport, so the next action is never ambiguous. Full button spec in `DESIGN_SYSTEM.md`.
