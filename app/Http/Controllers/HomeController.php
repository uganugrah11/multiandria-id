<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPortfolio = $this->featuredPortfolio();

        return view('home', compact('featuredPortfolio'));
    }

    /**
     * Curate the three homepage projects from the same local JSON source used
     * by the portfolio page. Image paths are normalized for public delivery.
     */
    private function featuredPortfolio(): Collection
    {
        $path = base_path('_portfolio.json');

        if (! file_exists($path)) {
            return collect();
        }

        $items = collect(json_decode(file_get_contents($path), true)['portfolio'] ?? [])
            ->map(function (array $item) {
                $imagePath = basename($item['image'] ?? '');

                return [
                    'title' => $item['title'] ?? null,
                    'brand_org' => $item['brand_org'] ?? null,
                    'description' => $item['description'] ?? null,
                    'style' => $item['style'] ?? [],
                    'image_url' => $imagePath ? asset('images/model/'.$imagePath) : null,
                ];
            })
            ->keyBy('title');

        return collect(config('homepage.featured_portfolio_titles'))
            ->map(fn (string $title) => $items->get($title))
            ->filter()
            ->values();
    }
}
