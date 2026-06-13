<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    protected $fillable = [
        'subtitle', 'title', 'description', 'image',
        'btn_primary_text', 'btn_primary_url', 'btn_secondary_text', 'btn_secondary_url',
        'is_active', 'sort_order',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
