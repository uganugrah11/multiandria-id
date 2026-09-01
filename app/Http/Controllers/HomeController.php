<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPortfolio = PortfolioProject::active()->featured()->orderBy('sort_order')->take(4)->get();

        return view('home', compact('featuredPortfolio'));
    }
}
