<?php

namespace App\Livewire\Admin\Customers;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public function render()
    {
        $customers = User::where('is_admin', false)
            ->when($this->search, fn ($q) => $q->where('name', 'like', "%{$this->search}%")->orWhere('email', 'like', "%{$this->search}%"))
            ->withCount('orders')
            ->latest()
            ->paginate(20);

        return view('livewire.admin.customers.index', compact('customers'))->title('Customers');
    }
}
