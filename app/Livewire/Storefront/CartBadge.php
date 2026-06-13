<?php

namespace App\Livewire\Storefront;

use Livewire\Component;

class CartBadge extends Component
{
    public $count = 0;

    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function mount()
    {
        $this->updateCount();
    }

    public function updateCount()
    {
        $cart = session()->get('cart', []);
        $this->count = collect($cart)->sum('qty');
    }

    public function render()
    {
        return view('livewire.storefront.cart-badge');
    }
}
