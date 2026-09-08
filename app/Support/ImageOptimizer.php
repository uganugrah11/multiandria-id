<?php

namespace App\Support;

use Intervention\Image\ImageManager;
use Throwable;

class ImageOptimizer
{
    private const MAX_WIDTH = 1600;

    private const QUALITY = 80;

    public function optimize(string $binaryContents): OptimizedImage
    {
        $image = ImageManager::gd()->read($binaryContents);
        $image->scaleDown(width: self::MAX_WIDTH);

        try {
            return new OptimizedImage((string) $image->toWebp(self::QUALITY), 'webp');
        } catch (Throwable) {
            return new OptimizedImage((string) $image->toJpeg(self::QUALITY), 'jpg');
        }
    }
}
