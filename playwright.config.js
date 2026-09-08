import { defineConfig, devices } from '@playwright/test';

/**
 * Playwright config for multiandria-id (Laravel + Blade + Alpine.js + Vite).
 * Docs: https://playwright.dev/docs/test-configuration
 */
export default defineConfig({
  testDir: './tests/e2e',

  // Fail the build on CI if you accidentally left test.only in the source code.
  forbidOnly: !!process.env.CI,

  fullyParallel: true,
  retries: process.env.CI ? 2 : 0,
  workers: process.env.CI ? 2 : undefined,

  reporter: [
    ['html', { open: 'never' }],
    ['list'],
  ],

  use: {
    baseURL: process.env.APP_URL || 'http://127.0.0.1:8000',
    trace: 'on-first-retry',
    screenshot: 'only-on-failure',
    video: 'retain-on-failure',
  },

  projects: [
    {
      name: 'chromium',
      use: { ...devices['Desktop Chrome'] },
    },
    // Uncomment as needed once the core suite is stable:
    // { name: 'firefox', use: { ...devices['Desktop Firefox'] } },
    // { name: 'webkit', use: { ...devices['Desktop Safari'] } },
    // { name: 'mobile-chrome', use: { ...devices['Pixel 7'] } },
  ],

  // Playwright boots the Laravel dev server itself, runs the suite, then
  // shuts it down. Codex (or you) never has to remember to start it manually.
  webServer: {
    command: 'php artisan serve --host=127.0.0.1 --port=8000',
    url: 'http://127.0.0.1:8000',
    reuseExistingServer: !process.env.CI,
    timeout: 30 * 1000,
  },
});