<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::active()->orderBy('sort_order');

        if ($request->filled('type')) {
            $query->byType($request->string('type'));
        }

        $products = $query->get();
        $productTypes = Product::productTypes();

        return view('products.index', compact('products', 'productTypes'));
    }
}
