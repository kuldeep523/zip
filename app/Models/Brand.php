<?php

namespace App\Models;

use App\Models\Concerns\HasSeoFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, HasSeoFields, SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'logo', 'description', 'is_active',
        'meta_title', 'meta_description', 'meta_keywords',
        'canonical_url', 'og_tags', 'twitter_cards', 'schema_markup',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'og_tags' => 'array',
            'twitter_cards' => 'array',
            'schema_markup' => 'array',
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
