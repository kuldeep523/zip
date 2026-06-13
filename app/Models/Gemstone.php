<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gemstone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'sku', 'category_id', 'category', 'stone_type', 'price', 'sale_price',
        'weight_ratti', 'weight_carat', 'shape', 'color', 'origin', 'treatment',
        'certification', 'certificate_no', 'image_path', 'video_url', 'description',
        'astrological_benefits', 'is_featured', 'is_best_seller', 'is_new_arrival',
        'stock', 'availability_status', 'views_count',
        'meta_title', 'meta_description', 'meta_keywords', 'canonical_url',
        'wearing_guide', 'planet_ruler', 'recommended_finger', 'suitable_metal',
        'auspicious_day', 'beej_mantra',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'sale_price' => 'decimal:2',
            'weight_ratti' => 'decimal:2',
            'weight_carat' => 'decimal:2',
            'is_featured' => 'boolean',
            'is_best_seller' => 'boolean',
            'is_new_arrival' => 'boolean',
            'stock' => 'integer',
        ];
    }

    public function gemCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(GemstoneImage::class)->orderBy('sort_order');
    }

    public function effectivePrice(): float
    {
        return (float) ($this->sale_price ?? $this->price);
    }

    public function getDisplayImageAttribute(): string
    {
        return $this->image_path ?: 'images/gems/hero_banner.png';
    }
}
