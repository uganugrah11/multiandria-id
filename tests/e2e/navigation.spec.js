import { test, expect } from '@playwright/test';

/**
 * Broad smoke test: every route in this list should return a healthy
 * (non-4xx/5xx) response and render a body. Add/remove routes as your
 * app grows — this is meant to catch "I broke a page" regressions fast.
 */
const ROUTES_TO_CHECK = [
  '/',
  // '/about',
  // '/contact',
  // '/login',
];

for (const route of ROUTES_TO_CHECK) {
  test(`route ${route} responds and renders`, async ({ page }) => {
    const response = await page.goto(route);
    expect(response.status(), `${route} returned ${response.status()}`).toBeLessThan(400);
    await expect(page.locator('body')).toBeVisible();
  });
}