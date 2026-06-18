<?php

namespace App\Livewire\Admin\Carts;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

#[Layout('layouts.admin')]
class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $carts = DB::table('abandoned_carts')
            ->when($this->search, function($query) {
                $query->where('email', 'like', '%' . $this->search . '%')
                      ->orWhere('session_id', 'like', '%' . $this->search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('livewire.admin.carts.index', [
            'carts' => $carts
        ])->title('Cart Data');
    }
}
