<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer', 'page', 'is_expanded', 'is_active', 'sort_order'];

    protected function casts(): array
    {
        return ['is_expanded' => 'boolean', 'is_active' => 'boolean'];
    }
}
