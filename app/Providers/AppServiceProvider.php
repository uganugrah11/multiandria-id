<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::lower((string) $request->input('email')).'|'.$request->ip();

            return Limit::perMinute(5)
                ->by($throttleKey)
                ->response(function (Request $request) use ($throttleKey) {
                    $seconds = RateLimiter::availableIn($throttleKey);

                    return redirect()->route('login')->withErrors([
                        'email' => "Terlalu banyak percobaan login. Coba lagi dalam {$seconds} detik.",
                    ])->onlyInput('email');
                });
        });
    }
}
