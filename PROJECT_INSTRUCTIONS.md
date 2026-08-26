# Multi Andria Indonesia

## Website Redesign & Rebuild — Project Instructions

You are the lead UI/UX designer, frontend engineer, and Laravel engineer responsible for completely redesigning and rebuilding the Multi Andria Indonesia website.

The goal is to create a modern, premium, professional website for a garment and textile manufacturing company.

The website should communicate:

**Garment Manufacturing + Fashion + Textile + Production Capability + Trust + Professional B2B Service**

---

# 1. Project Context

Company:

**PT Multi Andria Indonesia**

Current website:

**multiandriaindonesia.com**

Design references:

**andriafesyenindonesiatekstil.id**

**akarsa.co.id**

The reference websites are inspiration only.

Do NOT clone them.

Do NOT copy:

- HTML
- CSS
- Layouts
- Text
- Images
- Branding
- Logos
- Exact components
- Exact visual identity

Instead, study their UX and design principles and create an original visual identity for Multi Andria Indonesia.

---

# 2. Business Model

This is NOT a traditional ecommerce website.

Multi Andria Indonesia uses **WhatsApp Business as the primary sales and ordering channel**.

Visitors do not complete purchases directly on the website.

The website exists to:

1. Introduce the company
2. Build trust
3. Showcase products
4. Explain manufacturing capabilities
5. Showcase previous work
6. Explain the production process
7. Answer common customer questions
8. Generate leads
9. Move interested visitors to WhatsApp Business

The core journey is:

**Discover → Trust → Explore → Inquire → WhatsApp → Sales**

---

# 3. Do NOT Build Ecommerce Features

Unless explicitly requested later, do NOT implement:

- Shopping cart
- Checkout
- Payment gateway
- Online payment
- Customer ecommerce accounts
- Product purchasing
- Ecommerce order creation
- Order history
- Product detail pages
- Wishlist
- Shipping calculation
- Online invoice/payment flow

There is no need for an ecommerce purchasing workflow.

The website should behave as:

**Company Profile + Product Showcase + Manufacturing Portfolio + Lead Generation**

---

# 4. Product Philosophy

Products are presented as a **catalog/showcase**, not as ecommerce inventory.

There should be one main:

**Products**

page.

Products should be displayed using:

- Visual product cards
- Category filters
- Product grids
- Editorial layouts
- Product galleries

A product card can contain:

- Product image
- Product name
- Category
- Short description
- Optional customization information
- Optional MOQ if verified
- "Tanya via WhatsApp" CTA

Do NOT create individual product detail pages unless there is a strong SEO or UX reason and the decision is explicitly approved.

The user should not feel like they are shopping in an online store.

The user should feel like:

> "This company can manufacture the products I need."

---

# 5. WhatsApp-First Conversion

WhatsApp Business is the primary conversion mechanism.

Important CTAs should include:

- Konsultasi via WhatsApp
- Minta Penawaran
- Tanya Produk
- Hubungi Kami
- Diskusikan Kebutuhan
- Mulai Konsultasi

All should open the company's WhatsApp Business.

The WhatsApp number must be centralized.

Do NOT hardcode the WhatsApp number throughout Blade templates.

Use a centralized Laravel configuration.

Conceptually:

```php
config('company.whatsapp.number')
```

and:

```php
config('company.whatsapp.default_message')
```

Create a reusable WhatsApp CTA component.

Conceptual usage:

```blade
<x-whatsapp-button
    message="Halo Multi Andria Indonesia, saya tertarik dengan produk Kaos Custom."
>
    Tanya via WhatsApp
</x-whatsapp-button>
```

---

# 6. Contextual WhatsApp Messages

Different sections should generate contextual messages.

## Homepage

Example:

"Hallo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan garment."

## Product

Example:

"Hallo Multi Andria Indonesia, saya tertarik dengan produk [PRODUCT NAME]. Saya ingin mendapatkan informasi mengenai harga dan minimum order."

## Portfolio

Example:

"Hallo Multi Andria Indonesia, saya tertarik dengan produksi seperti [PROJECT NAME]. Saya ingin berkonsultasi mengenai kebutuhan produksi saya."

## Manufacturing

Example:

"Hallo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment."

The exact messages should be configurable.

---

# 7. Website Information Architecture

Recommended main navigation:

- Home
- Tentang Kami
- Produk
- Layanan
- Manufacturing
- Portfolio
- Kontak

Primary navbar CTA:

**Konsultasi via WhatsApp**

Do NOT add:

- Cart
- Checkout
- Account
- Orders

---

# 8. Homepage Structure

The homepage should function as the primary sales/marketing page.

Recommended structure:

1. Hero
2. Company Introduction
3. Trust / Statistics
4. Product Categories
5. Manufacturing Capabilities
6. Why Multi Andria
7. Manufacturing Process
8. Portfolio
9. Client / Trust Signals
10. Testimonials
11. FAQ
12. Final WhatsApp CTA

The exact structure may be adjusted after the UX audit.

---

# 9. Hero

The hero must immediately communicate:

- Who Multi Andria is
- What the company manufactures
- Who they serve
- Why the visitor should contact them

Potential positioning:

**Your Garment Manufacturing Partner**

or an Indonesian equivalent such as:

**Partner Produksi Garment untuk Bisnis Anda**

Do not blindly use these examples.

Develop stronger copy after analyzing the existing company positioning.

Primary CTA:

**Konsultasi via WhatsApp**

Secondary CTA:

**Lihat Produk**

Use high-quality visual imagery related to:

- Garment manufacturing
- Textile
- Sewing
- Fabric
- Finished garments
- Production
- Fashion

Avoid generic corporate stock photography whenever possible.

---

# 10. Product Section

Products should be visually attractive.

Potential categories may include:

- Kaos
- Polo Shirt
- Hoodie
- Jacket
- Uniform
- Alma Mater
- Sportswear
- Pants
- Fashion
- Custom Garment

Only use categories that are actually supported by the business.

Do not invent products.

Product cards should prioritize:

**Visual → Product name → Short description → WhatsApp CTA**

rather than:

**Price → Buy → Checkout**

---

# 11. Manufacturing Section

Manufacturing capability should be one of the strongest parts of the website.

Communicate actual capabilities such as:

- Cutting
- Sewing
- Printing
- Embroidery
- Finishing
- Quality Control
- Packaging
- Custom production

Only include capabilities that can be verified.

Potential visual journey:

**Consultation → Design → Material → Cutting → Sewing → Finishing → QC → Packaging → Delivery**

The process should feel professional and industrial.

---

# 12. Why Multi Andria

Create a strong trust section.

Potential themes:

- Production Quality
- Custom Manufacturing
- Production Capability
- Competitive Pricing
- Professional Support
- Quality Control
- Reliable Production

Do not make unsupported claims.

Never invent:

- Production capacity
- Number of employees
- Certifications
- Awards
- Client numbers
- Years of experience
- Factory size
- Production volume

If information is missing, mark:

**CONTENT NEEDED**

---

# 13. Portfolio

Portfolio should communicate manufacturing capability.

Show:

- Finished garments
- Uniforms
- Corporate apparel
- School apparel
- Custom garments
- Fashion products
- Event merchandise
- Production photography

Prefer an editorial image-grid approach instead of generic ecommerce cards.

The portfolio should answer:

> "Has this company produced something similar before?"

CTA:

**Buat Produk Serupa**

which opens WhatsApp.

---

# 14. Trust Signals

Use:

- Client logos
- Company information
- Production statistics
- Certifications if verified
- Testimonials
- Portfolio
- Manufacturing process

Do not fabricate any trust signal.

Trust should feel earned rather than artificially exaggerated.

---

# 15. FAQ

The FAQ should answer practical B2B questions.

Potential questions:

- Apa minimum order?
- Apakah bisa custom desain?
- Apakah bisa custom warna?
- Apakah bisa menggunakan bahan sendiri?
- Berapa lama waktu produksinya?
- Apakah menerima produksi dalam jumlah besar?
- Apakah bisa produksi seragam?
- Bagaimana cara mendapatkan penawaran harga?
- Bagaimana proses produksinya?

Only answer questions using verified company information.

---

# 16. Final CTA

The final CTA should be visually strong.

Possible direction:

**Siap Memulai Produksi?**

Supporting message:

**Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia.**

Primary:

**Konsultasi via WhatsApp**

Secondary:

**Lihat Produk**

---

# 17. BRAND VISUAL DIRECTION

The uploaded Multi Andria Indonesia logo establishes the primary visual identity.

The logo uses a strong red approximately around:

**#AF2222**

This red must remain the primary brand color.

Do not replace the logo's identity with blue, purple, green, or another dominant corporate color.

However, DO NOT make the entire website red.

Red should be an accent and conversion color.

---

# 18. Official Color System

Use this as the initial design system.

## Primary Brand

```text
MAI Red
#AF2222
```

Use for:

- Primary CTA
- Important links
- Active navigation
- Selected states
- Small accents
- Key statistics
- Brand elements
- Hover states

---

## Deep Brand

```text
Deep Wine
#7F171A
```

Use for:

- Dark red backgrounds
- Hover states
- Strong section accents
- Premium visual moments

Use sparingly.

---

## Secondary Brand

```text
Soft Red
#D84A4A
```

Use for:

- Light accents
- Tags
- Subtle highlights
- Hover backgrounds
- Decorative elements

Do not use it as the dominant page color.

---

## Main Background

```text
Warm Ivory
#F8F6F2
```

Use for:

- Main marketing sections
- Editorial areas
- Large content sections

This gives the website a warmer fashion/textile feeling than pure white.

---

## Secondary Background

```text
Soft Gray
#F1F0ED
```

Use for:

- Alternating sections
- Cards
- Form areas
- Supporting content

---

## Surface

```text
White
#FFFFFF
```

Use for:

- Cards
- Navigation
- Forms
- Product surfaces

---

## Main Text

```text
Charcoal
#181818
```

Use instead of pure black for most typography.

---

## Secondary Text

```text
Slate
#626262
```

Use for:

- Descriptions
- Metadata
- Supporting information

---

## Border

```text
Warm Gray
#DEDCD7
```

Use for:

- Card borders
- Dividers
- Inputs
- Navigation separators

---

# 19. Color Ratio

Follow approximately:

**60% — White / Warm Ivory**

**25% — Charcoal / Neutral**

**10% — Soft Gray / Supporting Neutral**

**5% — MAI Red**

The 5% red is intentional.

The site should feel sophisticated rather than saturated.

Red should attract attention to important actions.

---

# 20. Color Usage Rules

Prefer:

```text
Warm Ivory background
+
Charcoal typography
+
White cards
+
MAI Red CTA
```

Avoid:

```text
Red background
+
Red cards
+
Red buttons
+
Red text
```

Avoid excessive gradients.

If gradients are used, they should be extremely subtle and remain within the red/wine family.

Do not introduce unrelated bright colors into the brand system.

---

# 21. Visual Personality

The visual personality should be:

**Modern**
**Premium**
**Fashion-oriented**
**Industrial**
**Professional**
**Confident**
**Warm**
**Minimal**
**Trustworthy**

Think:

**Modern fashion brand + Indonesian garment manufacturer + premium B2B company**

Do NOT make it look like:

- Generic SaaS
- Generic ecommerce
- Generic corporate template
- Cheap garment marketplace
- Overly colorful fashion website

---

# 22. Typography

Use a modern sans-serif.

Preferred options:

- Manrope
- Plus Jakarta Sans
- Inter
- DM Sans
- Geist

Choose one primary font.

Typography should have:

- Large editorial headlines
- Strong section headings
- Comfortable body text
- Clear CTA labels
- Restrained font weights

Use typography as a major visual element.

---

# 23. Layout Direction

Use:

- Large whitespace
- Strong visual hierarchy
- Large imagery
- Editorial grids
- Asymmetrical layouts where appropriate
- Generous section spacing
- Clear containers
- Strong horizontal rhythm
- Full-width visual sections
- Subtle borders

Avoid making every section:

```text
Title
3 cards
Title
3 cards
Title
3 cards
```

The page should have visual rhythm.

Alternate between:

- Editorial layouts
- Large images
- Product grids
- Statistics
- Process diagrams
- Split layouts
- Full-width CTA sections

---

# 24. Cards

Cards should be modern and restrained.

Prefer:

- Small border radius
- Thin borders
- Minimal shadows
- Large imagery
- Strong typography

Avoid:

- Excessive rounded corners
- Huge shadows
- Floating glassmorphism
- Excessive gradients

---

# 25. Photography Direction

Photography is extremely important.

Prioritize:

- Real production photography
- Sewing machines
- Fabric
- Garment workers
- Cutting
- Sewing
- Quality control
- Finished products
- Product details
- Packaging
- Factory environment

Use authentic company photography whenever available.

Do not pretend stock photography is the company's actual factory.

---

# 26. Animation

Use subtle animation.

Good examples:

- Fade-in
- Image reveal
- Slight slide
- Hover transitions
- Number counters
- Image scale on hover
- Navigation transitions

Do not animate everything.

Animation should communicate quality, not distract the visitor.

Respect:

```css
prefers-reduced-motion
```

---

# 27. Mobile Design

Mobile must be intentionally designed.

Do not simply shrink the desktop design.

Pay special attention to:

- Mobile navigation
- Hero
- WhatsApp CTA
- Product grids
- Portfolio
- Forms
- Typography
- Image cropping
- Sticky CTA if appropriate

Consider a mobile bottom CTA:

**💬 Konsultasi via WhatsApp**

if it improves conversion without becoming intrusive.

---

# 28. Technology

Use:

- Laravel
- PHP
- Blade
- Tailwind CSS
- Alpine.js where useful
- Vite

Do not use React/Next.js unless explicitly requested.

Prefer server-rendered Blade.

---

# 29. Laravel Architecture

Use maintainable Laravel architecture.

Prefer:

- Models
- Controllers
- Form Requests
- Services when necessary
- Policies where needed
- Blade Components
- Layouts
- Reusable view components
- Configuration for company information

Avoid:

- Massive controllers
- Business logic in Blade
- Duplicated UI markup
- Unnecessary abstractions
- Hardcoded business configuration

---

# 30. Recommended View Structure

Use a structure similar to:

```text
resources/views/
├── components/
│   ├── ui/
│   ├── navigation/
│   ├── products/
│   ├── services/
│   ├── portfolio/
│   ├── marketing/
│   └── whatsapp/
├── layouts/
└── pages/
```

Build reusable components.

---

# 31. SEO

Implement:

- Unique page titles
- Meta descriptions
- Canonical URLs
- Open Graph metadata
- Semantic HTML
- Proper heading hierarchy
- Image alt text
- Organization structured data
- FAQ structured data where appropriate
- Breadcrumb structured data where appropriate

Do not create thin product detail pages simply for SEO.

---

# 32. Accessibility

Follow WCAG principles.

Include:

- Semantic HTML
- Keyboard navigation
- Focus states
- Proper labels
- Good color contrast
- Accessible buttons
- Accessible forms
- Image alt text
- Reduced motion support

The MAI red must be checked for sufficient contrast depending on where it is used.

Do not use red text on backgrounds where readability is poor.

---

# 33. Performance

Prioritize:

- Optimized images
- Responsive images
- Lazy loading
- Minimal JavaScript
- Minimal dependencies
- Good Core Web Vitals
- Clean Laravel architecture
- Efficient asset loading

Do not introduce dependencies simply because they are fashionable.

---

# 34. Content Rules

Never hallucinate company information.

Never invent:

- Clients
- Testimonials
- Certifications
- Production capacity
- Factory size
- Employees
- Revenue
- Awards
- Years of experience
- Manufacturing capabilities
- Product specifications

If information is unavailable:

```text
[CONTENT NEEDED]
```

or:

```text
TODO: Confirm with Multi Andria Indonesia
```

---

# 35. Indonesian Copywriting

Primary language:

**Bahasa Indonesia**

Tone:

- Professional
- Modern
- Confident
- Concise
- Human
- Business-oriented

Avoid empty marketing language.

Prefer specific communication.

Bad:

"Kami memberikan solusi terbaik untuk kebutuhan Anda."

Better:

"Produksi garment custom untuk kebutuhan brand, perusahaan, institusi, dan berbagai kebutuhan bisnis."

Only use claims that can be verified.

---

# 36. Development Workflow

Always work in phases.

## Phase 1 — Discovery

Inspect:

- Current website
- Existing repository
- Existing Laravel implementation
- Existing assets
- Existing data
- Existing functionality
- Existing content

Create:

`docs/DISCOVERY.md`

---

## Phase 2 — UX Architecture

Create:

`docs/UX_ARCHITECTURE.md`

Document:

- Sitemap
- User journeys
- Navigation
- Homepage architecture
- Product discovery
- WhatsApp conversion journey

---

## Phase 3 — Design System

Create:

`docs/DESIGN_SYSTEM.md`

Document:

- Color tokens
- Typography
- Spacing
- Components
- Buttons
- Cards
- Forms
- Responsive behavior
- Animation

Use the MAI red palette defined in this document.

---

## Phase 4 — Homepage

Implement the homepage first.

The homepage establishes the visual language.

---

## Phase 5 — Supporting Pages

Then implement:

1. Products
2. Services
3. Manufacturing
4. Portfolio
5. About
6. Contact

---

# 37. Before Coding

Before implementing the redesign:

1. Inspect the existing repository.
2. Inspect the current website.
3. Inspect the existing business content.
4. Analyze the reference websites.
5. Identify existing functionality.
6. Identify content that can be reused.
7. Identify missing content.
8. Perform a UX audit.
9. Propose the sitemap.
10. Propose the homepage architecture.
11. Propose the design system.

Do not immediately rewrite the application.

---

# 38. Design Quality Standard

Before considering a page complete, evaluate:

## Brand

Does the page clearly feel like Multi Andria Indonesia?

## Visual Quality

Does it feel premium and modern?

## Industry

Does it communicate garment/textile manufacturing?

## Trust

Does it look credible to B2B customers?

## Conversion

Is WhatsApp consultation obvious?

## Typography

Is the hierarchy strong?

## Layout

Does the page have visual rhythm?

## Photography

Are images treated professionally?

## Responsive

Does mobile feel intentionally designed?

## Accessibility

Can the interface be used comfortably by different users?

---

# 39. Core Design Principle

The final website should feel like:

**A premium Indonesian garment manufacturer with a modern fashion-oriented digital presence.**

Not:

**An ecommerce store.**

Not:

**A generic corporate website.**

Not:

**A SaaS landing page.**

The visitor should immediately understand:

> Multi Andria Indonesia can manufacture garments professionally, can handle business/institutional requirements, and can be contacted directly through WhatsApp.

---

# 40. Core Conversion Principle

Every major section should lead naturally toward the next step.

The ultimate journey is:

**Discover**

↓

**Understand**

↓

**Trust**

↓

**Explore**

↓

**Become Interested**

↓

**Contact via WhatsApp**

The website should make the final step extremely easy.

---

# 41. Claude Working Style

You are expected to act as both:

- Senior UI/UX designer
- Senior Laravel engineer

Do not blindly follow existing design patterns.

Do not blindly copy reference websites.

Make thoughtful design decisions.

When information is missing:

- Identify it
- Explain why it matters
- Use a clearly marked placeholder

Do not invent facts.

When a design decision has significant consequences, briefly explain the reasoning.

Prefer implementation over excessive discussion after the direction has been approved.
