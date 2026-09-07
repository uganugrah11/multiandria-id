<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
        $portfolio = $this->loadJson('_portfolio.json', 'portfolio', 'model');
        $products = $this->loadJson('_products.json', 'products', 'produk')->map(function ($item) {
            $item['wa_url'] = 'https://wa.me/'.config('company.whatsapp.number')
                .'?text='.rawurlencode(
                    'Halo Multi Andria Indonesia, saya tertarik dengan produk "'.$item['title'].'". '
                    .'Saya ingin mendapatkan informasi mengenai harga dan minimum order.'
                );

            return $item;
        });

        return view('portfolio', compact('portfolio', 'products'));
    }

    /**
     * Load a standalone content JSON file (kept local, git-ignored) and
     * normalize its image paths from absolute Windows paths to public URLs.
     */
    private function loadJson(string $file, string $key, string $dir): Collection
    {
        $path = base_path($file);

        if (! file_exists($path)) {
            return collect();
        }

        $data = json_decode(file_get_contents($path), true);

        return collect($data[$key] ?? [])->map(function ($item) use ($dir) {
            $item['image_path'] = basename($item['image'] ?? '');
            $item['image_url'] = $item['image_path']
                ? asset('images/'.$dir.'/'.$item['image_path'])
                : null;

            return $item;
        })->values();
    }
}
