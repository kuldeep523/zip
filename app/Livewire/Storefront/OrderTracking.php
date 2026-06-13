<?php

namespace App\Livewire\Storefront;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.gem-theme')]
class OrderTracking extends Component
{
    public string $orderNumber = '';

    public ?Order $order = null;

    public function track(): void
    {
        $this->order = Order::with(['statusHistories', 'items'])
            ->where('order_number', $this->orderNumber)
            ->first();
    }

    public function render()
    {
        return view('livewire.storefront.order-tracking');
    }
}
