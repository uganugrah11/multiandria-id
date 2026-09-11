<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

// Public — canonical navigation: Home, Tentang Kami, Produk, Layanan, Portofolio.
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/layanan', [PageController::class, 'services'])->name('services');
Route::get('/portofolio', [PageController::class, 'portfolio'])->name('portfolio');

// SEO Sitemap
Route::get('/sitemap.xml', function () {
    $siteUrl = config('seo.site_url');
    $sitemapRoutes = config('seo.sitemap_routes');

    $urls = collect($sitemapRoutes)->map(function (string $routeName) use ($siteUrl) {
        return [
            'loc' => route($routeName),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => $routeName === 'home' ? '1.0' : '0.8',
        ];
    })->toArray();

    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

    foreach ($urls as $url) {
        $xml .= "  <url>\n";
        $xml .= "    <loc>" . e($url['loc']) . "</loc>\n";
        $xml .= "    <lastmod>" . e($url['lastmod']) . "</lastmod>\n";
        $xml .= "    <changefreq>" . e($url['changefreq']) . "</changefreq>\n";
        $xml .= "    <priority>" . e($url['priority']) . "</priority>\n";
        $xml .= "  </url>\n";
    }

    $xml .= "</urlset>";

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

// Legacy URL redirects — preserve inbound links from old IA.
Route::permanentRedirect('/manufacturing', '/layanan#proses-produksi');
Route::permanentRedirect('/portfolio', '/portofolio');
Route::permanentRedirect('/kontak', '/tentang-kami#lokasi');

// Legacy /produk — consolidated into the canonical /portofolio experience.
// Keeps the 'products' route name, preserves the category ?type= filter, and
// lands on the #produk showcase anchor so the category filter is in view.
Route::get('/produk', function (Request $request) {
    $url = $request->filled('type')
        ? route('portfolio', ['type' => $request->string('type')]).'#produk'
        : route('portfolio').'#produk';

    return redirect($url)->setStatusCode(301);
})->name('products');

// Admin auth (internal content management only — no public registration)
Route::get('/login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware(['guest', 'throttle:login']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class)->except('show');
    Route::resource('portfolio', AdminPortfolioController::class)->except('show');
});