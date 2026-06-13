<?php

namespace App\Livewire\Admin\Orders;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderStatusHistory;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Show extends Component
{
    public Order $order;

    public string $newStatus = '';

    public string $statusComment = '';

    public function mount(Order $order): void
    {
        $this->order = $order->load(['items.product', 'user', 'statusHistories.user']);
        $this->newStatus = $order->status->value;
    }

    public function updateStatus(): void
    {
        $this->validate(['newStatus' => 'required|in:'.implode(',', OrderStatus::values())]);

        $this->order->update(['status' => $this->newStatus]);

        OrderStatusHistory::create([
            'order_id' => $this->order->id,
            'status' => $this->newStatus,
            'comment' => $this->statusComment,
            'user_id' => auth()->id(),
        ]);

        $this->statusComment = '';
        $this->order->refresh();
        session()->flash('success', 'Order status updated.');
    }

    public function render()
    {
        return view('livewire.admin.orders.show', [
            'statuses' => OrderStatus::cases(),
        ])->title('Order '.$this->order->order_number);
    }
}
