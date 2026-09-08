<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Support\CatalogCache;
use App\Support\ImageOptimizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort_order')->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $productTypes = Product::productTypes();

        return view('admin.products.create', compact('productTypes'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');

        DB::transaction(function () use ($validated, $request) {
            $product = Product::create(collect($validated)->except('images')->toArray());

            if ($request->hasFile('images')) {
                $this->storeImages($product, $request->file('images'));
            }
        });

        CatalogCache::flush();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $productTypes = Product::productTypes();
        $product->load('images');

        return view('admin.products.edit', compact('product', 'productTypes'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $this->validateProduct($request);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');

        DB::transaction(function () use ($validated, $request, $product) {
            $product->update(collect($validated)->except('images')->toArray());

            if ($request->hasFile('images')) {
                $this->storeImages($product, $request->file('images'), $product->images()->count());
            }

            if ($request->filled('delete_images')) {
                ProductImage::whereIn('id', $request->input('delete_images'))
                    ->where('product_id', $product->id)
                    ->get()
                    ->each->delete();
            }

            if ($request->filled('primary_image_id')) {
                $product->images()->update(['is_primary' => false]);
                $product->images()->where('id', $request->input('primary_image_id'))->update(['is_primary' => true]);
            }
        });

        CatalogCache::flush();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            $product->images->each->delete();
            $product->delete();
        });

        CatalogCache::flush();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function validateProduct(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['nullable', 'string', 'max:255'],
            'product_type' => ['required', 'string', 'in:'.implode(',', array_keys(Product::productTypes()))],
            'description' => ['nullable', 'string'],
            'moq' => ['nullable', 'integer', 'min:1'],
            'is_active' => ['boolean'],
            'is_featured' => ['boolean'],
            'sort_order' => ['nullable', 'integer'],
            'images.*' => ['nullable', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);
    }

    private function storeImages(Product $product, array $images, int $startOrder = 0): void
    {
        foreach ($images as $index => $image) {
            $optimized = app(ImageOptimizer::class)->optimize($image->get());
            $path = 'products/'.Str::uuid().'.'.$optimized->extension;
            Storage::disk('public')->put($path, $optimized->contents);

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $path,
                'sort_order' => $startOrder + $index,
                'is_primary' => $startOrder === 0 && $index === 0,
            ]);
        }
    }
}
