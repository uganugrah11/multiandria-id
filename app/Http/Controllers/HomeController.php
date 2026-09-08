<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPortfolio = $this->featuredPortfolio();

        return view('home', compact('featuredPortfolio'));
    }

    private function featuredPortfolio(): Collection
    {
        $items = PortfolioProject::active()
            ->get()
            ->map(fn (PortfolioProject $project) => [
                'title' => $project->title,
                'brand_org' => $project->client_name,
                'description' => $project->description,
                'image_url' => $project->cover_image_url,
            ])
            ->keyBy('title');

        return collect(config('homepage.featured_portfolio_titles'))
            ->map(fn (string $title) => $items->get($title))
            ->filter()
            ->values();
    }
}
