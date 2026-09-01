# OpenCode UI/UX Redesign Workflow

## Recommended external skills

Install Taste Skill v2:

```bash
npx skills add https://github.com/Leonxlnx/taste-skill --skill "design-taste-frontend"
```

For existing-project audit:

```bash
npx skills add https://github.com/Leonxlnx/taste-skill --skill "redesign-existing-projects"
```

Optional for long exhaustive tasks:

```bash
npx skills add https://github.com/Leonxlnx/taste-skill --skill "full-output-enforcement"
```

Optional only when implementing from an intentional visual reference:

```bash
npx skills add https://github.com/Leonxlnx/taste-skill --skill "image-to-code"
```

Do not install all visual variants at once.

## Skill roles

| Skill | Role |
|---|---|
| `redesign-existing-projects` | Audit existing UI before changing it |
| `design-taste-frontend` | Visual direction, layout, typography, motion, anti-slop |
| `multiandria-ui` | Project-specific business and brand rules |
| `image-audit` | Local image semantics and mapping |
| `ui-quality` | Completion and QA gate |
| `full-output-enforcement` | Optional long-task completeness |

## Execution sequence

### Phase 1 - Audit

Use:
- `redesign-existing-projects`
- `multiandria-ui`
- `image-audit`

Do not edit code.

Deliver:
- IA audit
- visual audit
- UX audit
- responsive audit
- image inventory
- page architecture
- route consolidation plan

### Phase 2 - Foundation

Use:
- `design-taste-frontend`
- `multiandria-ui`

Implement:
- navigation IA
- canonical routes
- shared hero system
- CTA hierarchy
- common layout improvements

### Phase 3 - Pages

Implement one page per task:
1. Home
2. Tentang Kami
3. Layanan
4. Portofolio

Do not combine all four into one giant implementation prompt.

### Phase 4 - QA

Use:
- `ui-quality`
- relevant Taste Skill pre-flight rules

Verify:
- responsive
- accessibility
- imagery
- performance
- route behavior
- build/tests

## Important

Do not use AI-generated imagery as a substitute for authentic company photography unless the user explicitly requests generated brand imagery.

Do not represent generated or stock images as real Multi Andria operations.
