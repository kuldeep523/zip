<?php

namespace App\Livewire\Storefront\Blog;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.gem-theme')]
class Show extends Component
{
    public Blog $blog;

    public Collection $relatedBlogs;

    public function mount(string $slug): void
    {
        $this->blog = Blog::where('slug', $slug)->where('status', 'published')->firstOrFail();

        $this->relatedBlogs = Blog::where('status', 'published')
            ->where('id', '!=', $this->blog->id)
            ->when($this->blog->blog_category_id, function ($query) {
                $query->where('blog_category_id', $this->blog->blog_category_id);
            })
            ->latest('published_at')
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.storefront.blog.show');
    }
}
