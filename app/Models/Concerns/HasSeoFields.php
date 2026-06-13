<?php

namespace App\Models\Concerns;

trait HasSeoFields
{
    public function seoFillable(): array
    {
        return [
            'meta_title',
            'meta_description',
            'meta_keywords',
            'canonical_url',
            'og_tags',
            'twitter_cards',
            'schema_markup',
        ];
    }
}
