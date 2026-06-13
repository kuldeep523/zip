<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NavigationMenuItem extends Model
{
    protected $fillable = ['navigation_menu_column_id', 'title', 'url', 'badge_text', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function column(): BelongsTo
    {
        return $this->belongsTo(NavigationMenuColumn::class, 'navigation_menu_column_id');
    }
}
