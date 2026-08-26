# Design System — Multi Andria Indonesia

Reusable tokens for the Phase 4+ Laravel/Tailwind implementation. Values here are deliberately concrete (not ranges) so they can be dropped into a Tailwind config directly.

---

## Colors

Tailwind token names map to the palette defined in `DESIGN_DIRECTION.md`:

```js
colors: {
  'mai-red':        '#AF2222', // primary
  'mai-wine':       '#7F171A', // deep brand
  'mai-soft-red':   '#D84A4A', // soft brand
  'mai-ivory':      '#F8F6F2', // main background
  'mai-gray':       '#F1F0ED', // secondary background
  'mai-white':      '#FFFFFF', // surface
  'mai-charcoal':   '#181818', // main text
  'mai-slate':      '#626262', // secondary text
  'mai-border':     '#DEDCD7', // borders/dividers
}
```

Usage discipline (enforced, not just suggested): `mai-red` and `mai-wine` are reserved for CTAs, active/selected states, key statistics, and small accents — never a full section background or a body-text color. Default page background is `mai-ivory`, alternating with `mai-gray`; card surfaces are `mai-white`.

---

## Typography

### Font choice: **Plus Jakarta Sans**

Chosen as the single primary family, used across both display and body weights, over the other four candidates:

- **vs. Inter:** Inter is excellent for dense UI text but reads as neutral-to-generic at large display sizes — exactly the "generic SaaS" feeling the brief asks to avoid. Plus Jakarta Sans has slightly warmer, more rounded terminals that carry more personality at large headline sizes while staying just as legible at body sizes.
- **vs. Geist:** Geist reads distinctly "developer tool / tech product." Too cold for a fashion-adjacent, premium-manufacturing brand.
- **vs. DM Sans:** a reasonable alternative, but lower visual distinctiveness at display weights — would blend in rather than establish a memorable brand type voice.
- **vs. Manrope:** the closest competitor; Manrope's bold weights condense slightly, which suits tech branding more than the editorial-fashion headline treatment this project needs. Plus Jakarta Sans keeps wider proportions at bold/extrabold, which reads better as a large hero headline.
- Practical reasons: wide weight range (200–800) covers everything from light editorial subheads to bold statistic numerals without a second font family; strong Latin Extended coverage for Bahasa Indonesia diacritics; good performance (variable font, single family reduces font-loading requests, supporting the Performance principles in the instructions).

### Scale

| Token | Size / Line-height | Weight | Use |
|---|---|---|---|
| `display` | 56–72px / 1.05 | 700–800 | Hero headline only |
| `h1` | 40–48px / 1.1 | 700 | Page/section titles |
| `h2` | 32px / 1.15 | 700 | Sub-section titles |
| `h3` | 24px / 1.25 | 600 | Card titles, small headers |
| `body-lg` | 18px / 1.6 | 400–500 | Intro paragraphs, lead text |
| `body` | 16px / 1.6 | 400 | Default body copy |
| `caption` | 14px / 1.5 | 400–500 | Metadata, labels, captions |
| `label` | 12px / 1.4, uppercase, tracked | 600 | Eyebrow text, tags, form labels |

Never mix more than 2–3 weights on one page. Statistic numerals (12+ Years, 5,000 pcs/day, etc.) use `display` or `h1` scale with weight 700–800 regardless of surrounding body size — they are meant to visually stand out.

---

## Spacing Scale

A single 4px base scale, matching Tailwind's default so no config override fights the framework:

```
0.5 = 2px   1 = 4px   2 = 8px   3 = 12px   4 = 16px   5 = 20px
6 = 24px    8 = 32px  10 = 40px 12 = 48px  16 = 64px  20 = 80px
24 = 96px   32 = 128px
```

Section vertical padding: `py-16` (mobile) → `py-24` (desktop) as a default; the final CTA and hero sections may go up to `py-32` on desktop for extra visual weight. Card internal padding: `p-6` (mobile) → `p-8` (desktop). Container max-width: `1280px`, with `px-4` (mobile) → `px-8` (desktop) side padding.

---

## Border Radius

Deliberately restrained — "industrial but elegant," not bubbly SaaS rounding:

| Token | Value | Use |
|---|---|---|
| `radius-sm` | 4px | Inputs, tags, small badges |
| `radius-md` | 8px | Cards, buttons |
| `radius-lg` | 12px | Large image containers, modals |
| `radius-full` | 9999px | Pills (category filter chips only), avatar/logo circles |

No card or button should exceed `radius-lg`. No large content block should use `radius-full`.

---

## Shadows

Shadows are used only to establish elevation on interactive/floating elements, never as decoration:

| Token | Value | Use |
|---|---|---|
| `shadow-card` | `0 1px 2px rgba(24,24,24,0.04), 0 1px 3px rgba(24,24,24,0.06)` | Resting card state |
| `shadow-card-hover` | `0 4px 12px rgba(24,24,24,0.08)` | Card hover state |
| `shadow-float` | `0 8px 24px rgba(24,24,24,0.12)` | Sticky/floating WhatsApp button, modals |

No shadow should exceed `shadow-float`. Colored (red-tinted) shadows are avoided — shadows stay neutral charcoal at low opacity.

---

## Buttons

| Variant | Fill | Text | Border | Use |
|---|---|---|---|---|
| **Primary** | `mai-red`, `mai-wine` on hover | White | none | The single WhatsApp/CTA action per section |
| **Secondary** | Transparent | `mai-charcoal` | 1px `mai-border`, darkens on hover | "Lihat Produk" and other supporting actions |
| **Ghost** | Transparent | `mai-charcoal` or `mai-red` | none, underline on hover | Inline text links, "read more" |
| **WhatsApp** | `mai-red`, `mai-wine` on hover | White | none | Same visual spec as Primary, always paired with a WhatsApp glyph icon so it's recognizable independent of label text |

All buttons: `radius-md`, `body` weight 600, horizontal padding `px-6`, vertical padding `py-3` (mobile-friendly 48px+ tap target), one primary/WhatsApp-styled button visible per viewport section at a time.

---

## Cards

| Card type | Content | Notes |
|---|---|---|
| **Product** | Image (4:5 or 1:1), category label, name, one-line description, WhatsApp CTA | No price as the dominant element; MOQ shown only as small metadata if verified |
| **Portfolio** | Large image, project name/caption, optional client + year if verified | Editorial image-grid, not a boxed ecommerce card |
| **Service** | Icon or small image, service name, short explanation, WhatsApp CTA with service-specific message | Two-card layout mirrors the AFIT CMT/FOB pattern |
| **Testimonial** | Quote, name, company | Not built until real testimonials exist (`CONTENT NEEDED`) |
| **Client** | Logo only, grayscale, color on hover | Grouped under B2B / B2G section headers, not mixed |

All cards: `mai-white` surface, `radius-md`, `shadow-card` at rest / `shadow-card-hover` on hover, 1px `mai-border` outline (no border AND heavy shadow together — pick one primary depth cue per card type).

---

## Responsive Breakpoints

| Token | Width | Notes |
|---|---|---|
| Mobile | `< 640px` | Default/base styles, single column |
| Tablet | `≥ 768px` (`md`) | 2-column grids begin |
| Desktop | `≥ 1024px` (`lg`) | 3–4 column grids, full nav visible |
| Large desktop | `≥ 1280px` (`xl`) | Container max-width reached, no further horizontal growth — extra space becomes margin, not wider content |

Matches Tailwind's default breakpoint scale, so no custom breakpoint config is needed.
