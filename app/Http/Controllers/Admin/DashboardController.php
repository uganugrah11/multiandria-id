<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'active_products' => Product::active()->count(),
            'portfolio_projects' => PortfolioProject::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
