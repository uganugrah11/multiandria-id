import { test, expect } from '@playwright/test';

const adminEmail = 'admin@multiandriaindonesia.com';
const adminPassword = 'change-this-password';

async function login(page) {
  await page.goto('/login');
  await page.getByLabel('Email').fill(adminEmail);
  await page.getByLabel('Password').fill(adminPassword);
  await page.getByRole('button', { name: 'Masuk' }).click();
  await expect(page).toHaveURL(/\/admin\/dashboard$/);
}

test.describe.serial('Admin content management', () => {
  test.beforeEach(async ({ page }) => {
    await login(page);
  });

  test('creates a portfolio entry through the admin form', async ({ page }) => {
    const title = `Portofolio E2E ${Date.now()}`;

    await page.goto('/admin/portfolio/create');
    await page.getByLabel('Judul Proyek').fill(title);
    await page.getByLabel('Kategori (opsional)').fill('Test');
    await page.getByLabel('Klien/Organisasi (opsional)').fill('E2E');
    await page.getByLabel('Deskripsi').fill('Entri verifikasi admin portofolio.');
    await page.getByRole('button', { name: 'Tambah Portofolio' }).click();

    await expect(page).toHaveURL(/\/admin\/portfolio$/);
    await expect(page.getByText(title)).toBeVisible();

    page.once('dialog', (dialog) => dialog.accept());
    await page.getByRole('row').filter({ hasText: title }).getByRole('button', { name: 'Hapus' }).click();
    await expect(page.getByText('Portofolio berhasil dihapus.')).toBeVisible();
  });

  test('edits imported product and portfolio entries', async ({ page }) => {
    await page.goto('/admin/products');
    await page.getByRole('link', { name: 'Edit' }).first().click();
    const skuInput = page.getByLabel('SKU (opsional)');
    const originalSku = await skuInput.inputValue();
    await skuInput.fill('E2E-VERIFY');
    await page.getByRole('button', { name: 'Simpan Perubahan' }).click();
    await expect(page.getByText('Produk berhasil diperbarui.')).toBeVisible();
    await page.getByRole('link', { name: 'Edit' }).first().click();
    await page.getByLabel('SKU (opsional)').fill(originalSku);
    await page.getByRole('button', { name: 'Simpan Perubahan' }).click();

    await page.goto('/admin/portfolio');
    await page.getByRole('link', { name: 'Edit' }).first().click();
    const clientInput = page.getByLabel('Klien/Organisasi (opsional)');
    const originalClient = await clientInput.inputValue();
    await clientInput.fill('E2E Verify');
    await page.getByRole('button', { name: 'Simpan Perubahan' }).click();
    await expect(page.getByText('Portofolio berhasil diperbarui.')).toBeVisible();
    await page.getByRole('link', { name: 'Edit' }).first().click();
    await page.getByLabel('Klien/Organisasi (opsional)').fill(originalClient);
    await page.getByRole('button', { name: 'Simpan Perubahan' }).click();
  });
});
