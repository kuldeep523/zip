<?php

namespace App\Livewire\Storefront;

use Livewire\Component;

class Checkout extends Component
{
    public $cartItems = [];
    public $subtotal = 0;
    public $total = 0;

    // Form fields
    public $name = '';
    public $phone = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $pincode = '';
    public $paymentMethod = 'cod'; // default cod

    public $isSuccess = false;
    public $orderId = '';

    protected $rules = [
        'name' => 'required|min:3',
        'phone' => 'required|numeric|digits:10',
        'address' => 'required|min:10',
        'city' => 'required',
        'state' => 'required',
        'pincode' => 'required|numeric|digits:6',
        'paymentMethod' => 'required',
    ];

    public function mount()
    {
        $this->loadCart();
        if (count($this->cartItems) === 0) {
            return redirect()->to('/shop');
        }
    }

    public function loadCart()
    {
        $this->cartItems = session()->get('cart', []);
        $this->subtotal = collect($this->cartItems)->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });
        $this->total = $this->subtotal; // Free shipping
    }

    public function placeOrder()
    {
        $this->validate();

        // Ensure cart is not empty
        if (count($this->cartItems) === 0) {
            return;
        }

        // Create Order
        $order = \App\Models\Order::create([
            'order_number' => \App\Models\Order::generateOrderNumber(),
            'user_id' => auth()->id() ?? null,
            'status' => \App\Enums\OrderStatus::Pending,
            'payment_method' => \App\Enums\PaymentMethod::from($this->paymentMethod) ?? \App\Enums\PaymentMethod::Cod,
            'payment_status' => 'pending',
            'subtotal' => $this->subtotal,
            'tax_amount' => 0,
            'discount_amount' => 0,
            'shipping_amount' => 0,
            'total' => $this->total,
            'currency' => 'INR',
            'billing_address' => [
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'pincode' => $this->pincode,
            ],
            'shipping_address' => [
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'pincode' => $this->pincode,
            ],
        ]);

        // Create Order Items
        foreach ($this->cartItems as $id => $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'product_name' => $item['name'],
                'sku' => $item['slug'], // Or actual sku if you store it in cart
                'quantity' => $item['qty'],
                'unit_price' => $item['price'],
                'total' => $item['price'] * $item['qty'],
            ]);

            // Decrement Product Stock
            $product = \App\Models\Product::find($id);
            if ($product) {
                $product->decrement('stock_quantity', $item['qty']);
            }
        }

        $this->orderId = $order->order_number;
        $this->isSuccess = true;

        // Clear cart
        session()->forget('cart');
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.storefront.checkout')->layout('layouts.gem-theme');
    }
}
