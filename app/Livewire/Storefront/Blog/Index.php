<?php

namespace App\Livewire\Storefront\Blog;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.gem-theme')]
class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.storefront.blog.index', [
            'blogs' => Blog::where('status', 'published')->latest('published_at')->paginate(9),
        ]);
    }
}
