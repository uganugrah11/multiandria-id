<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function portfolio(Request $request)
    {
        $portfolio = PortfolioProject::active()
            ->orderBy('sort_order')
            ->get()
            ->map(fn (PortfolioProject $project) => $this->mapPortfolioProject($project));

        $products = Product::active()
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Product $product) => $this->mapProduct($product));

        $featuredProduct = Product::active()
            ->where('slug', 'seragam-dinas-polri-lengkap-pdl-kepolisian')
            ->first();
        $featuredShowcase = $featuredProduct
            ? $this->mapProduct($featuredProduct)
            : $products->first();

        return view('portfolio', compact('portfolio', 'products', 'featuredShowcase'));
    }

    private function mapPortfolioProject(PortfolioProject $project): array
    {
        return [
            'title' => $project->title,
            'brand_org' => $project->client_name,
            'description' => $project->description,
            'image_url' => $project->cover_image_url,
        ];
    }

    private function mapProduct(Product $product): array
    {
        return [
            'title' => $product->name,
            'description' => $product->description,
            'image_url' => $product->primary_image_url,
            'wa_url' => 'https://wa.me/'.config('company.whatsapp.number')
                .'?text='.rawurlencode(
                    'Halo Multi Andria Indonesia, saya tertarik dengan produk "'.$product->name.'". '
                    .'Saya ingin mendapatkan informasi mengenai harga dan minimum order.'
                ),
        ];
    }
}
