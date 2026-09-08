<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use App\Support\CatalogCache;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogCacheInvalidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_edits_are_visible_on_the_public_portfolio_page_immediately(): void
    {
        CatalogCache::flush();

        $product = Product::create([
            'name' => 'Nama Produk Lama',
            'product_type' => 't-shirts',
            'description' => 'Deskripsi produk.',
            'is_active' => true,
        ]);

        $this->get('/portofolio')
            ->assertOk()
            ->assertSee('Nama Produk Lama');

        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->put(route('admin.products.update', $product), [
                'name' => 'Nama Produk Baru',
                'product_type' => 't-shirts',
                'description' => 'Deskripsi produk.',
                'is_active' => true,
                'is_featured' => false,
                'sort_order' => 0,
            ])
            ->assertRedirect(route('admin.products.index'));

        $this->get('/portofolio')
            ->assertOk()
            ->assertSee('Nama Produk Baru')
            ->assertDontSee('Nama Produk Lama');
    }
}
