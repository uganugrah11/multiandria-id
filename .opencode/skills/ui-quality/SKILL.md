---
name: ui-quality
description: Production UI quality gate for Multi Andria redesign work. Use before declaring a page or UI task complete.
compatibility: opencode
metadata:
  project: multiandria-id
  workflow: visual-qa
---

# UI Quality Skill

## Purpose

Prevent "looks good in one screenshot" implementations from being declared complete.

## Completion Gate

Before saying a page is complete, verify as much as the available environment allows.

### Visual hierarchy

- [ ] Page has a clear primary message.
- [ ] Hero has a clear focal point.
- [ ] Primary CTA is obvious.
- [ ] Section rhythm is varied and intentional.
- [ ] No unnecessary repeated card grids.
- [ ] Typography hierarchy is consistent.

### Responsive

- [ ] Small mobile reviewed.
- [ ] Large mobile reviewed.
- [ ] Tablet reviewed.
- [ ] Desktop reviewed.
- [ ] Wide desktop considered.
- [ ] No horizontal overflow.
- [ ] Navigation works at small widths.
- [ ] Images crop intentionally.
- [ ] Text does not collide with media.

### Accessibility

- [ ] Semantic heading order.
- [ ] Links/buttons have meaningful names.
- [ ] Keyboard focus is visible.
- [ ] Contrast is acceptable.
- [ ] Images have correct alt behavior.
- [ ] Decorative images are not announced unnecessarily.
- [ ] Motion respects `prefers-reduced-motion`.

### Performance

- [ ] Images are not obviously oversized.
- [ ] Hero image is optimized.
- [ ] Below-fold images are lazy-loaded when appropriate.
- [ ] Image dimensions/aspect ratios reduce layout shift.
- [ ] No unnecessary JS dependency was added.
- [ ] No duplicate component or asset was introduced without reason.

### Content integrity

- [ ] No invented business claims.
- [ ] No invented client/project details.
- [ ] No misleading imagery.
- [ ] Missing photography is explicitly marked as content needed.
- [ ] Existing verified copy is preserved where appropriate.

### Architecture

- [ ] Existing Blade components were inspected before duplication.
- [ ] Existing routes/controllers/models remain intact unless a change is required.
- [ ] Consolidated pages have one canonical implementation.
- [ ] Legacy URLs redirect when appropriate.
- [ ] Internal links use canonical destinations.

## Reporting

When something could not be checked, say:

`NOT VERIFIED: <reason>`

Never convert an unverified item into a passing checkbox.
