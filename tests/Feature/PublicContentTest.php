<?php

namespace Tests\Feature;

use App\Models\PortfolioProject;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_render_database_backed_portfolio_and_products(): void
    {
        $product = Product::create([
            'name' => 'Seragam Dinas Polri Lengkap - PDL Kepolisian',
            'product_type' => 't-shirts',
            'description' => 'Deskripsi seragam Polri.',
            'is_active' => true,
        ]);

        ProductImage::create([
            'product_id' => $product->id,
            'image_path' => 'products/polri.png',
            'is_primary' => true,
        ]);

        foreach (config('homepage.featured_portfolio_titles') as $title) {
            PortfolioProject::create([
                'title' => $title,
                'client_name' => 'Klien Uji',
                'description' => 'Deskripsi proyek.',
                'cover_image' => 'portfolio/'.str($title)->slug().'.png',
                'is_active' => true,
            ]);
        }

        $this->get('/')
            ->assertOk()
            ->assertSee('Hasil produksi kami')
            ->assertSee('Seragam Dinas BUMN')
            ->assertSee('Gamis Wanita Premium Navy dengan Aksen Kontras')
            ->assertSee('Sweatshirt Pria Premium Putih');

        $this->get('/portofolio')
            ->assertOk()
            ->assertSee('Seragam Dinas Polri Lengkap - PDL Kepolisian')
            ->assertSee('Seragam Dinas BUMN');
    }
}
