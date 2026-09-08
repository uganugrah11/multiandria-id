<?php

namespace App\Support;

final readonly class OptimizedImage
{
    public function __construct(
        public string $contents,
        public string $extension,
    ) {}
}
