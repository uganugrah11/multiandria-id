# Design Direction — Multi Andria Indonesia (Proposed)

## Brand Color Starting Point

The current site was inspected for existing brand color usage. Observed: the logo assets (`logo-mai-bg-white.png`, `logo-mai-bg-none.png`) were referenced but not visually analyzed pixel-by-pixel in this text-based inspection — **CONTENT NEEDED: the actual logo file(s) and brand guideline, if one exists**, so the palette can be built around real brand color rather than guessed.

Because the existing site's visible UI (buttons, accents) reads as a generic default Tailwind/Bootstrap-blue ecommerce theme rather than a deliberate brand palette, we cannot confidently say the current on-site blue *is* the intentional brand color versus just a framework default. Per instructions §18, when the existing brand doesn't provide sufficient guidance, we should propose 2–3 directions for approval rather than pick one — done below.

### Direction A — "Industrial Navy" (recommended default)
- Primary: deep navy/indigo (industrial, trustworthy, common in institutional/government-facing B2B — resonates with the strong B2G client base)
- Accent: warm amber/gold (signals craftsmanship, premium, and gives CTAs strong visual pop against navy)
- Background: warm off-white / paper tone, not stark white — supports the "editorial, premium" feel from §17
- Use case fit: strongest for the B2G/institutional positioning given MPR RI, Bawaslu, Pertamina, Kementerian client base

### Direction B — "Textile Neutral"
- Primary: charcoal/near-black
- Accent: terracotta or clay red — a warmer, fabric/textile-associated accent
- Background: soft warm grey
- Use case fit: leans more fashion/textile-editorial, slightly less "government contractor," more suited if MAI wants to emphasize the fashion/textile side (dresses, gamis, mukena) as much as institutional uniforms

### Direction C — "Confident Corporate Blue" (closest to current, evolved)
- Primary: refined mid-blue (evolved, not default-framework blue) — keeps some visual continuity with the current site if the business has informal brand recognition around blue
- Accent: steel grey + a single sharp accent (e.g., safety-orange or amber) used sparingly for CTAs only
- Background: cool light grey
- Use case fit: safest choice if the business wants to preserve some visual continuity with existing brand recognition rather than a full color pivot

**Recommendation:** Direction A, pending brand asset review. All three avoid excessive gradients, glassmorphism, or oversaturated "SaaS" color use per instructions §17.

Full semantic palette (primary/secondary/accent/background/surface/text/muted/border/success/warning/error) will be finalized in `docs/DESIGN_SYSTEM.md` during Phase 3, once a direction is approved.

---

## Visual Personality

**Modern Indonesian garment manufacturer + premium fashion brand + industrial company** (per instructions §17/§40) — concretely, this means:
- Confident, large typography and generous whitespace, not a dense catalog-grid feel
- Photography-led, not icon/illustration-led
- Straight lines, subtle borders, soft (not heavy) shadows — avoid rounded "friendly SaaS" card treatments
- Numbers and specifics (5,000 pcs/day, 600 employees, 1,860 m² factory) treated as hero content, not buried in paragraphs

## Typography Direction

- Two-family maximum, per instructions §19: a confident **Display/Heading** face (e.g., **Plus Jakarta Sans** or **Manrope**, both support Bahasa Indonesia diacritics well and read as modern-corporate without being generic) paired with a highly legible **Body** face (e.g., **Inter** or **DM Sans**).
- Recommended pairing: **Plus Jakarta Sans** (headings, Semibold/Bold only — avoid using more than 2 weights) + **Inter** (body, Regular/Medium).
- Clear hierarchy: Display (hero) → H1 → H2 → H3 → Body → Caption → Label, each with a deliberate size/weight step, not just size changes.

## Photography Direction

- Prioritize real: factory floor, sewing lines, fabric/material close-ups, finished garments, packaging, QC inspection, workers (with appropriate consent/anonymity as the business prefers).
- **CONTENT NEEDED for essentially all real photography** — the current site uses only product-mockup-style images and one generic Unsplash stock photo on the About page (`images.unsplash.com/photo-1441986300917...`), which does not represent MAI's actual facility and should not be treated as final content.
- Until real photography is supplied, use clearly labeled placeholders in any working build — never present a generic stock image as if it depicts MAI's real facility.

## Layout Principles

- Editorial section rhythm: alternate full-width and split-content sections to avoid monotony (per §17).
- Consistent container max-width and section vertical rhythm (finalized as tokens in Phase 3 `DESIGN_SYSTEM.md`).
- Cards used sparingly and consistently (product cards, service cards, portfolio cards, testimonial cards) — one card system, not several ad hoc styles.

## Button & CTA Style

- Primary CTA (WhatsApp actions): solid fill, accent color, consistent icon (WhatsApp glyph) — same visual weight everywhere it appears so it's instantly recognizable as "the next step."
- Secondary CTA: outline or text-link style, lower visual weight than primary, never competing with it.
- No more than one primary-styled CTA visible per section/viewport, to keep the "next action" obvious per instructions §39.

## Border Radius & Shadows

- Small-to-moderate radius (subtle, not pill-shaped/bubbly) — consistent with "industrial but elegant," avoiding both harsh sharp-corner brutalism and overly soft SaaS rounding.
- Soft, low-opacity shadows only where they aid hierarchy (elevated cards, sticky header on scroll) — avoid decorative shadow stacking.

## Animation Principles

- Scroll-reveal and fade/slide entrances used sparingly on section entry, not per-element.
- Numeric counters animate on scroll-into-view, but must render their **final/base value server-side first** so nothing ever visibly reads "0" before JS executes (directly addressing the bug observed on the AFIT reference site).
- Respect `prefers-reduced-motion` throughout, per instructions §32/§22.
- No parallax, no heavy scroll-jacking — keep the industrial/professional tone rather than a flashy consumer feel.

## Responsive Principles

- Mobile-first construction for every section (per instructions §21), with intentional mobile layouts (not shrunk desktop layouts) — in particular:
  - Dense data (product specs, stat grids) reflow to 1–2 columns, never a horizontally-scrolling table on mobile unless explicitly designed for it (e.g., logo strips).
  - Sticky WhatsApp CTA on mobile (small persistent floating button) given how central this conversion path is.
- Breakpoints: Mobile / Tablet / Laptop / Desktop / Large desktop, finalized as concrete pixel tokens in Phase 3.

---

## What to Avoid (explicit, per instructions §17/§40)

Excessive gradients, glassmorphism, oversaturated "colorful SaaS" UI, template-feeling generic layouts, over-animation, generic ecommerce visual language (the exact failure mode of the current site), and any pixel-level copying of either reference site's layout, imagery, or wording.
