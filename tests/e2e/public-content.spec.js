import { test, expect } from '@playwright/test';

async function expectFirstCardImageToLoad(page, section) {
  const image = section.locator('[data-carousel-card]').first().locator('img').first();
  await expect(image).toBeVisible();

  const src = await image.getAttribute('src');
  expect(src).toBeTruthy();

  const response = await page.request.get(new URL(src, page.url()).toString());
  expect(response.status()).toBeLessThan(400);
}

test.describe('Database-backed public content', () => {
  test('homepage renders its featured portfolio grid or documented fallback', async ({ page }) => {
    await page.goto('/');

    const section = page.locator('section').filter({
      has: page.getByRole('heading', { name: 'Hasil produksi kami' }),
    });
    const cards = section.locator('[data-motion-card="portfolio"]');

    if (await cards.count() === 3) {
      await expect(cards).toHaveCount(3);
    } else {
      await expect(section.getByText('CONTENT NEEDED', { exact: false })).toBeVisible();
    }
  });

  test('portfolio page renders database portfolio and product carousels with valid images', async ({ page }) => {
    await page.goto('/portofolio');

    const portfolioCarousel = page.getByRole('region', { name: 'Karya dan produk pilihan' });
    const productCarousel = page.getByRole('region', { name: 'Katalog produk' });

    await expect(portfolioCarousel.locator('[data-carousel-card]')).not.toHaveCount(0);
    await expect(productCarousel.locator('[data-carousel-card]')).not.toHaveCount(0);
    const featuredShowcase = page.locator('section').filter({
      has: page.getByRole('heading', { name: 'Seragam Dinas Polri Lengkap' }),
    });
    await expect(featuredShowcase.getByRole('img', { name: 'Seragam Dinas Polri Lengkap - PDL Kepolisian' })).toBeVisible();

    await expectFirstCardImageToLoad(page, portfolioCarousel);
    await expectFirstCardImageToLoad(page, productCarousel);
  });
});
