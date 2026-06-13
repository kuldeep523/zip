<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GemstoneImage extends Model
{
    protected $fillable = ['gemstone_id', 'path', 'alt_text', 'is_primary', 'sort_order'];

    protected function casts(): array
    {
        return ['is_primary' => 'boolean'];
    }

    public function gemstone(): BelongsTo
    {
        return $this->belongsTo(Gemstone::class);
    }
}
