<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::active()->featured()->orderBy('sort_order')->take(8)->get();
        $featuredPortfolio = PortfolioProject::active()->featured()->orderBy('sort_order')->take(4)->get();

        return view('home', compact('featuredProducts', 'featuredPortfolio'));
    }
}
