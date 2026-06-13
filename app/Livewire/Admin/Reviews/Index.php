<?php

namespace App\Livewire\Admin\Reviews;

use App\Models\Review;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Index extends Component
{
    public function approve(int $id): void
    {
        Review::findOrFail($id)->update(['is_approved' => true, 'approved_at' => now()]);
    }

    public function render()
    {
        return view('livewire.admin.reviews.index', [
            'reviews' => Review::with(['product', 'user'])->latest()->paginate(20),
        ])->title('Reviews');
    }
}
