<?php

namespace App\Livewire\Storefront;

use Livewire\Component;
use App\Services\GemstoneService;

class Cart extends Component
{
    public $cartItems = [];
    public $subtotal = 0;

    protected $listeners = [
        'addToCart' => 'addItem',
        'cartUpdated' => 'loadCart'
    ];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = session()->get('cart', []);
        $this->calculateSubtotal();
    }

    public function addItem($id, $qty = 1)
    {
        $gem = \App\Models\Product::find($id);

        if (!$gem) {
            return;
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $qty;
        } else {
            $cart[$id] = [
                'id' => $gem->id,
                'name' => $gem->name,
                'slug' => $gem->slug,
                'price' => $gem->price,
                'weight' => $gem->weight,
                'weight_unit' => $gem->weight_unit,
                'image_path' => $gem->images->where('is_primary', true)->first()->path ?? ($gem->images->first()->path ?? null),
                'certification' => $gem->certification_type,
                'qty' => $qty
            ];
        }

        session()->put('cart', $cart);
        $this->loadCart();
        $this->dispatch('cartUpdated');
        
        // Open the cart slide drawer in browser by dispatching toggle-cart event
        $this->dispatch('toggle-cart');
    }

    public function updateQuantity($id, $qty)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($qty <= 0) {
                unset($cart[$id]);
            } else {
                $cart[$id]['qty'] = $qty;
            }
            session()->put('cart', $cart);
            $this->loadCart();
            $this->dispatch('cartUpdated');
        }
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            $this->loadCart();
            $this->dispatch('cartUpdated');
        }
    }

    public function clearCart()
    {
        session()->forget('cart');
        $this->loadCart();
        $this->dispatch('cartUpdated');
    }

    private function calculateSubtotal()
    {
        $this->subtotal = collect($this->cartItems)->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });
    }

    public function render()
    {
        return view('livewire.storefront.cart');
    }
}
