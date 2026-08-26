<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Seeds one illustrative product per verified category (see
     * docs/DISCOVERY.md Task 2.5 — names/MOQ are the real values observed
     * on the live site). Images are the CGI mockup renders recovered from
     * the old codebase (docs/CONTENT_REQUIREMENTS.md flags these as
     * placeholders, not real product photography) and are assigned to
     * products round-robin since the original name-to-image mapping was
     * not available. CONTENT NEEDED: replace with real photography and
     * confirm whether more than one SKU per category should ship.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Basic Cotton Tee',
                'product_type' => 't-shirts',
                'description' => 'Kaos katun untuk kebutuhan custom brand, komunitas, dan korporat.',
                'moq' => 50,
                'specifications' => ['material' => 'Cotton', 'sizes' => ['S', 'M', 'L', 'XL', 'XXL']],
                'is_featured' => true,
            ],
            [
                'name' => 'Casual Trousers',
                'product_type' => 'pants',
                'description' => 'Celana casual dengan pilihan potongan slim dan straight fit.',
                'moq' => 25,
                'specifications' => ['sizes' => ['28', '30', '32', '34', '36']],
                'is_featured' => false,
            ],
            [
                'name' => 'Bomber Jacket',
                'product_type' => 'jacket',
                'description' => 'Jaket custom untuk kebutuhan seragam, komunitas, dan korporat.',
                'moq' => 30,
                'specifications' => ['sizes' => ['S', 'M', 'L', 'XL', 'XXL']],
                'is_featured' => true,
            ],
            [
                'name' => 'Fleece Jogger',
                'product_type' => 'joggers',
                'description' => 'Jogger pants nyaman untuk kebutuhan olahraga dan casual wear.',
                'moq' => 30,
                'specifications' => ['sizes' => ['M', 'L', 'XL', 'XXL']],
                'is_featured' => false,
            ],
            [
                'name' => 'Bergo Hijab',
                'product_type' => 'hijab',
                'description' => 'Hijab instan dengan berbagai pilihan warna.',
                'moq' => 25,
                'specifications' => ['material' => 'Voal'],
                'is_featured' => false,
            ],
            [
                'name' => 'Gamis Syari',
                'product_type' => 'gamis',
                'description' => 'Gamis untuk kebutuhan sehari-hari maupun acara khusus.',
                'moq' => 10,
                'specifications' => ['sizes' => ['S', 'M', 'L', 'XL']],
                'is_featured' => true,
            ],
            [
                'name' => 'Cocktail Dress',
                'product_type' => 'dress',
                'description' => 'Dress custom untuk kebutuhan brand fashion.',
                'moq' => 10,
                'specifications' => ['sizes' => ['S', 'M', 'L', 'XL']],
                'is_featured' => false,
            ],
            [
                'name' => 'Mukena Two-Piece',
                'product_type' => 'mukena',
                'description' => 'Mukena dua bagian dengan detail bordir.',
                'moq' => 10,
                'specifications' => ['material' => 'Silk Premium'],
                'is_featured' => false,
            ],
            [
                'name' => 'School Alma Mater Blazer',
                'product_type' => 'alma-mater',
                'description' => 'Jas almamater custom untuk sekolah dan universitas.',
                'moq' => 20,
                'specifications' => ['customization' => 'Logo sekolah, name tag'],
                'is_featured' => true,
            ],
            [
                'name' => 'Canvas Tote Bag',
                'product_type' => 'tote-bag',
                'description' => 'Tote bag kanvas untuk kebutuhan custom printing.',
                'moq' => 25,
                'specifications' => ['material' => 'Canvas Cotton'],
                'is_featured' => false,
            ],
        ];

        $mockupImages = collect(File::files(storage_path('app/public/products')))
            ->map(fn ($file) => 'products/'.$file->getFilename())
            ->values();

        $imageIndex = 0;

        foreach ($products as $index => $data) {
            $product = Product::create([...$data, 'sort_order' => $index]);

            // Assign 2 images per product from the shared mockup pool, wrapping around.
            for ($i = 0; $i < 2 && $mockupImages->isNotEmpty(); $i++) {
                $path = $mockupImages[$imageIndex % $mockupImages->count()];
                $imageIndex++;

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'sort_order' => $i,
                    'is_primary' => $i === 0,
                ]);
            }
        }
    }
}
