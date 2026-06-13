<?php

namespace App\Livewire\Storefront;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.gem-theme')]
class CompareProducts extends Component
{
    public function render()
    {
        $sessionIds = session('compare_products', []);
        $products = Product::with(['brand', 'category'])->whereIn('id', $sessionIds)->get();

        return view('livewire.storefront.compare-products', compact('products'));
    }
}
