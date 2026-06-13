<?php

namespace App\Livewire\Admin\Orders;

use App\Enums\OrderStatus;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class Index extends Component
{
    use WithPagination;

    public string $status = '';

    public function render()
    {
        $orders = Order::with('user')
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->latest()
            ->paginate(20);

        return view('livewire.admin.orders.index', [
            'orders' => $orders,
            'statuses' => OrderStatus::cases(),
        ])->title('Orders');
    }
}
