<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'product_type',
        'description',
        'specifications',
        'moq',
        'is_active',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'specifications' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'moq' => 'integer',
        'sort_order' => 'integer',
    ];

    protected $with = ['images'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && ! $product->isDirty('slug')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function getProductTypeNameAttribute(): string
    {
        return self::productTypes()[$this->product_type] ?? Str::title($this->product_type);
    }

    public function getPrimaryImageUrlAttribute(): string
    {
        $primary = $this->images->firstWhere('is_primary', true) ?? $this->images->first();

        return $primary ? Storage::url($primary->image_path) : asset('images/placeholder-product.svg');
    }

    /**
     * These are the 10 categories verified on the live site and in the old
     * codebase's product_type enum (see docs/DISCOVERY.md Task 2.5) — not
     * the illustrative examples from the project instructions. Do not add
     * categories the business hasn't confirmed it actually produces.
     */
    public static function productTypes(): array
    {
        return [
            't-shirts' => 'T-Shirts',
            'pants' => 'Pants',
            'jacket' => 'Jacket',
            'joggers' => 'Joggers',
            'hijab' => 'Hijab',
            'gamis' => 'Gamis',
            'dress' => 'Dress',
            'mukena' => 'Mukena',
            'alma-mater' => 'Alma Mater',
            'tote-bag' => 'Tote Bag',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('product_type', $type);
    }
}
