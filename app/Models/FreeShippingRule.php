<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FreeShippingRule extends Model
{
    protected $fillable = ['name', 'min_order_amount', 'shipping_zone_id', 'is_active'];

    protected function casts(): array
    {
        return [
            'min_order_amount' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function zone(): BelongsTo
    {
        return $this->belongsTo(ShippingZone::class, 'shipping_zone_id');
    }
}
