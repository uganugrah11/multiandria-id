---
name: image-audit
description: Audit local visual assets and map authentic images to Multi Andria pages and sections. Use before selecting hero, portfolio, product, facility, or process imagery.
compatibility: opencode
metadata:
  project: multiandria-id
  workflow: visual-asset-audit
---

# Image Audit Skill

## Goal

Choose imagery based on what the image actually shows, its composition, and the narrative job it needs to perform.

The local working tree may contain assets that are not committed to GitHub. Inspect the local filesystem when accessible.

## Audit Procedure

For each candidate image:

1. Locate the actual file.
2. Record path.
3. Record dimensions and file type.
4. Inspect the visual content.
5. Identify the subject.
6. Identify composition and focal point.
7. Evaluate quality.
8. Determine likely crop.
9. Determine whether text can overlay safely.
10. Classify the image.
11. Map it to page/section.
12. Assign confidence: high, medium, or low.
13. Reject it when its semantic meaning is misleading.

## Classification

Use exactly one primary classification:

- `proof`
- `showcase`
- `brand`
- `decorative`
- `reject`

## Semantic Safety

Never infer facts that the image does not prove.

Examples:

- office building != factory
- product mockup != production process
- client logo != client case study
- generic garment photo != Multi Andria project
- stock factory photo != Multi Andria facility

## Known Local References

### Custom black T-shirt project

Primary classification:
`showcase`

Recommended:
- Portofolio featured project
- product/capability showcase

Not recommended:
- factory/process proof
- production facility proof

### Multi Andria HQ office

Primary classification:
`proof`

Recommended:
- Tentang Kami hero
- company identity
- location

Not recommended:
- manufacturing-process proof
- production-floor proof

## Missing Imagery

When a page needs imagery that is not available:

Write:

`CONTENT NEEDED: authentic [specific image type]`

Then design the section without requiring a fake replacement.

Examples:

- `CONTENT NEEDED: authentic production-line photograph`
- `CONTENT NEEDED: authentic cutting/sewing process photograph`
- `CONTENT NEEDED: authentic finished-garment editorial photograph`

## Image Mapping Output

Produce a table:

| Asset | Classification | Best page | Best section | Crop | Overlay text safe? | Confidence |
|---|---|---|---|---|---|---|

Then produce:

| Page | Section | Selected asset | Reason |
|---|---|---|---|

## Performance Notes

For every selected image:
- avoid shipping an unnecessarily large original
- prefer an optimized derivative when the project supports it
- preserve aspect ratio
- avoid layout shift
- lazy-load below-the-fold images when appropriate

Do not convert or delete source assets unless explicitly asked.
