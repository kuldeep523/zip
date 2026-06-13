<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AstroGoal extends Model
{
    protected $fillable = ['slug', 'title', 'icon', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
