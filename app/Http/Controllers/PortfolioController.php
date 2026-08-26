<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = PortfolioProject::active()->orderBy('sort_order')->get();

        return view('portfolio.index', compact('projects'));
    }
}
