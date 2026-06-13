<?php

namespace App\Livewire\Admin\Inventory;

use App\Enums\InventoryMovementType;
use App\Models\InventoryMovement;
use App\Models\Product;
use App\Services\Inventory\InventoryService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Index extends Component
{
    public ?int $product_id = null;

    public string $type = 'stock_in';

    public int $quantity = 0;

    public string $notes = '';

    public function adjust(InventoryService $inventory): void
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:'.implode(',', array_column(InventoryMovementType::cases(), 'value')),
        ]);

        $inventory->adjustStock(
            Product::findOrFail($this->product_id),
            InventoryMovementType::from($this->type),
            $this->quantity,
            $this->notes
        );

        $this->reset(['product_id', 'quantity', 'notes']);
        session()->flash('success', 'Inventory updated.');
    }

    public function render()
    {
        return view('livewire.admin.inventory.index', [
            'products' => Product::with('category')->orderBy('name')->get(['id', 'name', 'sku', 'stock_quantity', 'category_id']),
            'movements' => InventoryMovement::with('product', 'user')->latest()->limit(50)->get(),
            'types' => InventoryMovementType::cases(),
        ])->title('Inventory');
    }
}
