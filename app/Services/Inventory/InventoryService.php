<?php

namespace App\Services\Inventory;

use App\Enums\InventoryMovementType;
use App\Models\InventoryMovement;
use App\Models\Product;

class InventoryService
{
    public function adjustStock(Product $product, InventoryMovementType $type, int $quantity, ?string $notes = null): void
    {
        $before = $product->stock_quantity;
        $delta = in_array($type, [InventoryMovementType::StockIn, InventoryMovementType::Purchase, InventoryMovementType::Return])
            ? $quantity
            : -$quantity;
        $after = max(0, $before + $delta);

        $product->update(['stock_quantity' => $after]);

        InventoryMovement::create([
            'product_id' => $product->id,
            'type' => $type,
            'quantity' => $quantity,
            'stock_before' => $before,
            'stock_after' => $after,
            'user_id' => auth()->id(),
            'notes' => $notes,
        ]);
    }
}
