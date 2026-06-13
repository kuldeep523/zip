<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AstroZodiacSign extends Model
{
    protected $fillable = ['name', 'lord', 'symbol', 'recommended_gem_category', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
