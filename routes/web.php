<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Public — matches docs/SITEMAP.md. No cart, checkout, account, or order routes.
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/layanan', [PageController::class, 'services'])->name('services');
Route::get('/manufacturing', [PageController::class, 'manufacturing'])->name('manufacturing');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// No dedicated Contact page — location/contact info lives on Tentang Kami,
// the footer, and WhatsApp CTAs (see docs/SITEMAP.md). Old /kontak URLs
// redirect there instead of 404ing.
Route::permanentRedirect('/kontak', '/tentang-kami#lokasi');

// Admin auth (internal content management only — no public registration)
Route::get('/login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class)->except('show');
});
