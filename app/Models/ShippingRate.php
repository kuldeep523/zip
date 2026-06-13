<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingRate extends Model
{
    protected $fillable = [
        'shipping_zone_id', 'name', 'min_order_amount', 'max_order_amount',
        'min_weight', 'max_weight', 'rate', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'min_order_amount' => 'decimal:2',
            'max_order_amount' => 'decimal:2',
            'rate' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function zone(): BelongsTo
    {
        return $this->belongsTo(ShippingZone::class, 'shipping_zone_id');
    }
}
