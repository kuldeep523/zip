<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderNavLink extends Model
{
    protected $fillable = ['title', 'url', 'is_active', 'sort_order'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
