<?php

namespace App\Console\Commands;

use App\Models\PortfolioProject;
use App\Models\ProductImage;
use App\Support\CatalogCache;
use App\Support\ImageOptimizer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class OptimizeExistingImages extends Command
{
    protected $signature = 'images:optimize-existing';

    protected $description = 'Optimize existing product and portfolio images.';

    public function handle(ImageOptimizer $optimizer): int
    {
        $beforeBytes = 0;
        $afterBytes = 0;
        $optimized = 0;
        $skipped = 0;

        ProductImage::query()->each(function (ProductImage $image) use ($optimizer, &$beforeBytes, &$afterBytes, &$optimized, &$skipped): void {
            $result = $this->optimizePath($image->image_path, $optimizer);

            if ($result === null) {
                $skipped++;

                return;
            }

            [$path, $before, $after, $wasOptimized] = $result;
            $beforeBytes += $before;
            $afterBytes += $after;

            if (! $wasOptimized) {
                $skipped++;

                return;
            }

            $image->update(['image_path' => $path]);
            $optimized++;
        });

        PortfolioProject::query()->each(function (PortfolioProject $project) use ($optimizer, &$beforeBytes, &$afterBytes, &$optimized, &$skipped): void {
            if ($project->cover_image) {
                $result = $this->optimizePath($project->cover_image, $optimizer);

                if ($result === null) {
                    $skipped++;
                } else {
                    [$path, $before, $after, $wasOptimized] = $result;
                    $beforeBytes += $before;
                    $afterBytes += $after;

                    if ($wasOptimized) {
                        $project->cover_image = $path;
                        $optimized++;
                    } else {
                        $skipped++;
                    }
                }
            }

            $gallery = [];
            $galleryChanged = false;
            foreach ($project->gallery ?? [] as $path) {
                $result = $this->optimizePath($path, $optimizer);

                if ($result === null) {
                    $gallery[] = $path;
                    $skipped++;

                    continue;
                }

                [$optimizedPath, $before, $after, $wasOptimized] = $result;
                $gallery[] = $optimizedPath;
                $beforeBytes += $before;
                $afterBytes += $after;

                if ($wasOptimized) {
                    $galleryChanged = true;
                    $optimized++;
                } else {
                    $skipped++;
                }
            }

            if ($project->isDirty('cover_image') || $galleryChanged) {
                $project->gallery = $gallery;
                $project->save();
            }
        });

        CatalogCache::flush();

        $savedBytes = $beforeBytes - $afterBytes;
        $this->table(['Optimized', 'Skipped', 'Before', 'After', 'Saved'], [[
            $optimized,
            $skipped,
            $this->formatBytes($beforeBytes),
            $this->formatBytes($afterBytes),
            $this->formatBytes($savedBytes),
        ]]);

        return self::SUCCESS;
    }

    private function optimizePath(string $path, ImageOptimizer $optimizer): ?array
    {
        $disk = Storage::disk('public');

        if (! $disk->exists($path)) {
            $this->warn("Missing image: {$path}");

            return null;
        }

        $beforeBytes = $disk->size($path);

        try {
            $contents = $disk->get($path);
            $optimized = $optimizer->optimize($contents);
        } catch (Throwable $exception) {
            $this->warn("Unable to optimize {$path}: {$exception->getMessage()}");

            return [$path, $beforeBytes, $beforeBytes, false];
        }

        $newPath = dirname($path).'/'.Str::uuid().'.'.$optimized->extension;
        $disk->put($newPath, $optimized->contents);
        $disk->delete($path);

        return [$newPath, $beforeBytes, strlen($optimized->contents), true];
    }

    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $index = 0;
        $value = abs($bytes);

        while ($value >= 1024 && $index < count($units) - 1) {
            $value /= 1024;
            $index++;
        }

        return ($bytes < 0 ? '-' : '').number_format($value, 2).' '.$units[$index];
    }
}
