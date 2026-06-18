<?php

namespace App\Livewire\Storefront;

use Livewire\Component;

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
        $this->syncCartToDatabase();
    }

    private function syncCartToDatabase()
    {
        $sessionId = session()->getId();
        
        if (empty($this->cartItems)) {
            \Illuminate\Support\Facades\DB::table('abandoned_carts')
                ->where('session_id', $sessionId)
                ->delete();
            return;
        }

        $userId = auth()->id();
        $email = auth()->check() ? auth()->user()->email : null;
        $total = collect($this->cartItems)->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });

        $exists = \Illuminate\Support\Facades\DB::table('abandoned_carts')
            ->where('session_id', $sessionId)
            ->exists();

        $data = [
            'user_id' => $userId,
            'email' => $email,
            'cart_data' => json_encode($this->cartItems),
            'total' => $total,
            'updated_at' => now(),
        ];

        if ($exists) {
            \Illuminate\Support\Facades\DB::table('abandoned_carts')
                ->where('session_id', $sessionId)
                ->update($data);
        } else {
            $data['session_id'] = $sessionId;
            $data['created_at'] = now();
            \Illuminate\Support\Facades\DB::table('abandoned_carts')->insert($data);
        }
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
