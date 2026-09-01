---
name: multiandria-ui
description: Multi Andria-specific UI/UX rules for Laravel Blade and Tailwind CSS v4. Use for page composition, brand consistency, conversion UX, route consolidation, and business-safe frontend implementation.
compatibility: opencode
metadata:
  project: multiandria-id
  stack: laravel-blade-tailwind-v4
  domain: garment-manufacturing
---

# Multi Andria UI Skill

## Purpose

Provide project-specific constraints that sit between generic frontend design skills and the existing Multi Andria codebase.

Always read `AGENTS.md` first.

## Design Character

Target:

- premium B2B garment manufacturer
- editorial rather than template-like
- industrial but warm
- confident rather than aggressive
- visual proof over decorative UI
- clear inquiry conversion

The design should look like a company with real production capability, not a generic SaaS company and not a generic ecommerce store.

## Composition Rules

Prefer:

- asymmetric or editorial compositions when useful
- strong typographic hierarchy
- intentional whitespace
- varied section rhythm
- image-led proof
- large but controlled visual anchors
- clear CTA hierarchy
- fewer, stronger components

Avoid:

- identical three-card sections repeated throughout a page
- cards for every piece of information
- excessive rounded rectangles
- decorative badges with no meaning
- generic dashboard visual language
- arbitrary gradients

## CTA Hierarchy

Primary conversion:
- Konsultasi via WhatsApp
- Konsultasikan Kebutuhan Anda
- equivalent verified CTA copy already present in the project

Secondary:
- Lihat Portofolio
- Lihat Produk
- Download Company Profile

Do not create multiple competing primary CTAs in the same viewport.

## Page-Specific Direction

### Home

Lead with:
- garment production positioning
- proof
- capability
- inquiry

Do not lead with office/location imagery.

### Tentang Kami

Lead with:
- identity
- history
- scale
- trust

HQ image is appropriate.

### Layanan

Lead with:
- CMT / FOB
- end-to-end production
- process
- quality

Do not imply office photography represents a factory.

### Portofolio

Lead with:
- what can be produced
- actual work
- product categories
- selected projects

The uploaded custom black T-shirt project is appropriate here.

## Laravel Blade

Prefer existing:
- layouts
- components
- route names
- view composers
- controllers
- models

Do not move rendering into JavaScript without a concrete reason.

When a component is reusable, inspect existing components before creating another.

## Tailwind CSS v4

Follow the project's existing Tailwind v4 setup.

Do not introduce a second styling system.

Prefer existing design tokens and utilities.

Do not scatter arbitrary values when an existing token or utility is appropriate.

## Motion

Use motion to:
- establish hierarchy
- reveal content
- communicate hover affordance
- make image transitions feel intentional

Keep motion subtle.

Respect `prefers-reduced-motion`.

## Definition of Done

A UI task is not done when the desktop screenshot looks better.

It is done when:
- content hierarchy is clearer
- mobile is intentional
- CTA is obvious
- imagery is semantically correct
- existing behavior still works
- no misleading claims were introduced
- accessibility basics pass
- performance is not unnecessarily degraded
