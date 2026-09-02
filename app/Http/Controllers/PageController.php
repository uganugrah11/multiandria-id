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
        $projects = PortfolioProject::active()->orderBy('sort_order')->get();

        $query = Product::active()->orderBy('sort_order');

        if ($request->filled('type')) {
            $query->byType($request->string('type'));
        }

        $products = $query->get();
        $productTypes = Product::productTypes();

        $categoryProducts = Product::active()->orderBy('sort_order')->get()->keyBy('product_type');

        return view('portfolio', compact('projects', 'products', 'productTypes', 'categoryProducts'));
    }
}
