<?php

namespace App\Models;

use App\Enums\InventoryMovementType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryMovement extends Model
{
    protected $fillable = [
        'product_id', 'product_variant_id', 'type', 'quantity',
        'stock_before', 'stock_after', 'reference_type', 'reference_id',
        'user_id', 'notes',
    ];

    protected function casts(): array
    {
        return ['type' => InventoryMovementType::class];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
