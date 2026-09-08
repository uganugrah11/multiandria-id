<?php

namespace App\Console\Commands;

use App\Models\PortfolioProject;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImportLegacyContent extends Command
{
    protected $signature = 'import:legacy-content';

    protected $description = 'Import legacy product and portfolio JSON content into the database.';

    public function handle(): int
    {
        $products = $this->readItems('_products.json', 'products');
        $portfolio = $this->readItems('_portfolio.json', 'portfolio');

        if ($products === null || $portfolio === null) {
            return self::FAILURE;
        }

        $summary = [
            'products' => ['created' => 0, 'updated' => 0, 'skipped' => 0],
            'portfolio' => ['created' => 0, 'updated' => 0, 'skipped' => 0],
            'unresolvedCategories' => [],
            'missingImages' => [],
        ];

        foreach ($products as $item) {
            $this->importProduct($item, $summary);
        }

        foreach ($portfolio as $item) {
            $this->importPortfolio($item, $summary);
        }

        $this->table(['Content', 'Created', 'Updated', 'Skipped'], [
            ['Products', ...array_values($summary['products'])],
            ['Portfolio', ...array_values($summary['portfolio'])],
        ]);

        $this->line('Unresolved product categories: '.count($summary['unresolvedCategories']));
        foreach ($summary['unresolvedCategories'] as $title) {
            $this->warn("- {$title}");
        }

        $this->line('Missing image files: '.count($summary['missingImages']));
        foreach ($summary['missingImages'] as $image) {
            $this->warn("- {$image}");
        }

        return self::SUCCESS;
    }

    private function importProduct(mixed $item, array &$summary): void
    {
        if (! is_array($item) || ! isset($item['title']) || ! is_string($item['title']) || trim($item['title']) === '') {
            $summary['products']['skipped']++;

            return;
        }

        $category = $this->mapProductType($item['title']);
        $attributes = [
            'name' => $item['title'],
            'description' => $this->nullableString($item['description'] ?? null),
            'legacy_image_path' => $this->nullableString($item['image'] ?? null),
        ];

        if ($category === null) {
            $attributes['product_type'] = 't-shirts';
            $attributes['is_active'] = false;
            $summary['unresolvedCategories'][] = $item['title'];
        } else {
            $attributes['product_type'] = $category;
        }

        $product = Product::updateOrCreate(['slug' => Str::slug($item['title'])], $attributes);
        $summary['products'][$product->wasRecentlyCreated ? 'created' : 'updated']++;

        $storedPath = $this->copyLegacyImage($item['image'] ?? null, 'produk', 'products', $product->slug, $summary);

        if ($storedPath !== null) {
            ProductImage::updateOrCreate(
                ['product_id' => $product->id, 'is_primary' => true],
                ['image_path' => $storedPath, 'sort_order' => 0],
            );
        }
    }

    private function importPortfolio(mixed $item, array &$summary): void
    {
        if (! is_array($item) || ! isset($item['title']) || ! is_string($item['title']) || trim($item['title']) === '') {
            $summary['portfolio']['skipped']++;

            return;
        }

        $project = PortfolioProject::firstOrNew(['slug' => Str::slug($item['title'])]);
        $project->fill([
            'title' => $item['title'],
            'client_name' => $this->nullableString($item['brand_org'] ?? null),
            'description' => $this->nullableString($item['description'] ?? null),
        ]);

        if (! $project->exists) {
            $project->gallery = [];
        }

        $storedPath = $this->copyLegacyImage($item['image'] ?? null, 'model', 'portfolio', $project->slug, $summary);
        if ($storedPath !== null) {
            $project->cover_image = $storedPath;
        }

        $project->save();
        $summary['portfolio'][$project->wasRecentlyCreated ? 'created' : 'updated']++;
    }

    private function readItems(string $filename, string $key): ?array
    {
        $path = base_path($filename);

        if (! is_file($path)) {
            $this->error("Legacy file not found: {$filename}");

            return null;
        }

        try {
            $contents = json_decode(file_get_contents($path), true, flags: JSON_THROW_ON_ERROR);
        } catch (\JsonException $exception) {
            $this->error("Unable to parse {$filename}: {$exception->getMessage()}");

            return null;
        }

        if (! isset($contents[$key]) || ! is_array($contents[$key])) {
            $this->error("Legacy file {$filename} must contain a {$key} array.");

            return null;
        }

        return $contents[$key];
    }

    private function mapProductType(string $title): ?string
    {
        $title = Str::lower($title);

        return match (true) {
            str_contains($title, 'hijab') => 'hijab',
            str_contains($title, 'gamis') => 'gamis',
            str_contains($title, 'mukena') => 'mukena',
            str_contains($title, 'dress') => 'dress',
            str_contains($title, 'alma mater'), str_contains($title, 'almamater') => 'alma-mater',
            str_contains($title, 'tote bag'), str_contains($title, 'totebag') => 'tote-bag',
            str_contains($title, 'jogger') => 'joggers',
            str_contains($title, 'jaket'), str_contains($title, 'jacket') => 'jacket',
            str_contains($title, 'celana'), str_contains($title, 'cargo') => 'pants',
            str_contains($title, 'kaos'), str_contains($title, 't-shirt'), str_contains($title, 'tshirt') => 't-shirts',
            default => null,
        };
    }

    private function copyLegacyImage(mixed $legacyPath, string $sourceDirectory, string $destinationDirectory, string $slug, array &$summary): ?string
    {
        if (! is_string($legacyPath) || trim($legacyPath) === '') {
            $summary['missingImages'][] = "{$destinationDirectory}: no image path";

            return null;
        }

        $filename = basename(str_replace('\\', '/', $legacyPath));
        $sourcePath = public_path("images/{$sourceDirectory}/{$filename}");

        if (! is_file($sourcePath)) {
            $summary['missingImages'][] = "{$destinationDirectory}: {$filename}";

            return null;
        }

        $extension = pathinfo($filename, PATHINFO_EXTENSION) ?: 'bin';
        $destinationPath = "{$destinationDirectory}/{$slug}.{$extension}";
        Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath));

        return $destinationPath;
    }

    private function nullableString(mixed $value): ?string
    {
        return is_string($value) && trim($value) !== '' ? $value : null;
    }
}
