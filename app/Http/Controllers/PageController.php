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

    public function products(Request $request)
    {
        $query = Product::active()->orderBy('sort_order');

        if ($request->filled('type')) {
            $query->byType($request->string('type'));
        }

        $products = $query->get();
        $productTypes = Product::productTypes();

        return view('products', compact('products', 'productTypes'));
    }

    public function portfolio()
    {
        $projects = PortfolioProject::active()->orderBy('sort_order')->get();

        return view('portfolio', compact('projects'));
    }
}
