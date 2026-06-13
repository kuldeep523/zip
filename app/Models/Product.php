<?php

namespace App\Models;

use App\Enums\ProductStatus;
use App\Models\Concerns\HasSeoFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasSeoFields, SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'sku', 'barcode', 'category_id', 'sub_category_id', 'sub_sub_category_id', 'brand_id',
        'short_description', 'long_description', 'video_url', 'price', 'sale_price',
        'tax_percent', 'stock_quantity', 'low_stock_threshold', 'weight', 'dimensions',
        'origin', 'weight_unit', 'shape', 'cut', 'composition', 'certification_type',
        'certification_no', 'treatment', 'dimension_type', 'color',
        'status', 'is_featured', 'is_best_seller', 'is_new_arrival', 'views_count', 'sort_order',
        'meta_title', 'meta_description', 'meta_keywords', 'canonical_url',
        'og_tags', 'twitter_cards', 'schema_markup', 'faq_schema',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'sale_price' => 'decimal:2',
            'tax_percent' => 'decimal:2',
            'weight' => 'decimal:3',
            'is_featured' => 'boolean',
            'is_best_seller' => 'boolean',
            'is_new_arrival' => 'boolean',
            'status' => ProductStatus::class,
            'og_tags' => 'array',
            'twitter_cards' => 'array',
            'schema_markup' => 'array',
            'faq_schema' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function subSubCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'sub_sub_category_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function coupons(): BelongsToMany
    {
        return $this->belongsToMany(Coupon::class);
    }

    public function effectivePrice(): float
    {
        return (float) ($this->sale_price ?? $this->price);
    }

    public function isLowStock(): bool
    {
        return $this->stock_quantity <= $this->low_stock_threshold;
    }

    public function primaryImage(): ?ProductImage
    {
        return $this->images()->where('is_primary', true)->first()
            ?? $this->images()->first();
    }
}
