<?php

namespace App\Models;

use App\Models\Concerns\HasSeoFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsPage extends Model
{
    use HasSeoFields, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'page_type', 'content', 'is_published',
        'meta_title', 'meta_description', 'meta_keywords',
        'canonical_url', 'og_tags', 'twitter_cards', 'schema_markup',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'og_tags' => 'array',
            'twitter_cards' => 'array',
            'schema_markup' => 'array',
        ];
    }
}
