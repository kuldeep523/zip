<?php

namespace App\Models;

use App\Models\Concerns\HasSeoFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasSeoFields, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'blog_category_id', 'author_id', 'featured_image',
        'content', 'status', 'published_at',
        'meta_title', 'meta_description', 'meta_keywords',
        'canonical_url', 'og_tags', 'twitter_cards', 'schema_markup',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'og_tags' => 'array',
            'twitter_cards' => 'array',
            'schema_markup' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class, 'blog_blog_tag');
    }
}
