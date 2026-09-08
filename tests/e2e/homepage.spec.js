import { test, expect } from '@playwright/test';

test.describe('Homepage', () => {
  test('loads successfully with no console errors', async ({ page }) => {
    const consoleErrors = [];
    page.on('console', (msg) => {
      if (msg.type() === 'error' && !msg.text().includes('net::ERR_NETWORK_ACCESS_DENIED')) {
        consoleErrors.push(msg.text());
      }
    });
    page.on('pageerror', (err) => consoleErrors.push(err.message));

    const response = await page.goto('/');
    expect(response.status()).toBeLessThan(400);

    // Sanity check the page actually rendered something meaningful.
    await expect(page.locator('body')).toBeVisible();

    expect(consoleErrors, `Console/page errors found: ${consoleErrors.join('\n')}`).toEqual([]);
  });

  test('has a title', async ({ page }) => {
    await page.goto('/');
    await expect(page).toHaveTitle(/.+/); // replace /.+/ with your real title regex
  });

  test('logo/nav is visible', async ({ page }) => {
    await page.goto('/');
    // TODO: replace with a real selector once wired up, e.g.:
    // await expect(page.getByRole('navigation')).toBeVisible();
    await expect(page.locator('body')).toBeVisible();
  });
});
