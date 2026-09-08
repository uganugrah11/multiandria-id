<?php

namespace App\Support;

use Closure;
use Illuminate\Support\Facades\Cache;

class CatalogCache
{
    public const ACTIVE_PRODUCTS = 'catalog.products.active';

    public const ACTIVE_PORTFOLIO = 'catalog.portfolio.active';

    public const FEATURED_SHOWCASE = 'catalog.products.featured_showcase';

    public const HOMEPAGE_FEATURED_PORTFOLIO = 'catalog.portfolio.homepage_featured';

    public static function remember(string $key, Closure $callback): mixed
    {
        return Cache::remember($key, now()->addHours(6), $callback);
    }

    public static function flush(): void
    {
        foreach ([self::ACTIVE_PRODUCTS, self::ACTIVE_PORTFOLIO, self::FEATURED_SHOWCASE, self::HOMEPAGE_FEATURED_PORTFOLIO] as $key) {
            Cache::forget($key);
        }
    }
}
