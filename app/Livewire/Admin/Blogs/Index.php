<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public array $form = [
        'title' => '',
        'content' => '',
        'status' => 'draft',
        'blog_category_id' => '',
        'published_at' => '',
        'meta_title' => '',
        'meta_description' => '',
        'meta_keywords' => '',
    ];

    public $featured_image = null;

    public ?int $editingId = null;

    public function save(): void
    {
        $rules = [
            'form.title' => 'required|string|max:255',
            'form.content' => 'required|string',
            'form.status' => 'required|in:draft,published',
            'form.blog_category_id' => 'nullable|exists:blog_categories,id',
            'form.published_at' => 'nullable|date',
            'form.meta_title' => 'nullable|string|max:255',
            'form.meta_description' => 'nullable|string|max:500',
            'form.meta_keywords' => 'nullable|string|max:500',
        ];

        if (! $this->editingId) {
            $rules['featured_image'] = 'nullable|image|max:2048';
        } else {
            $rules['featured_image'] = 'nullable|image|max:2048';
        }

        $validated = $this->validate($rules);
        $data = $validated['form'];

        $data['slug'] = $this->editingId
            ? Blog::find($this->editingId)->slug
            : Str::slug($data['title']) . '-' . Str::random(4);

        if (! $this->editingId) {
            $data['author_id'] = auth()->id();
        }

        if ($this->featured_image) {
            $path = $this->featured_image->store('blogs', 'public');
            $data['featured_image'] = $path;
            $this->reset('featured_image');
        }

        if ($this->editingId) {
            $blog = Blog::findOrFail($this->editingId);
            if (! empty($data['featured_image'])) {
                if ($blog->featured_image) {
                    Storage::disk('public')->delete($blog->featured_image);
                }
            } else {
                unset($data['featured_image']);
            }
            $blog->update($data);
            session()->flash('success', 'Blog post updated.');
        } else {
            Blog::create($data);
            session()->flash('success', 'Blog post created.');
        }

        $this->resetForm();
    }

    public function edit(int $id): void
    {
        $blog = Blog::findOrFail($id);
        $this->editingId = $id;
        $this->form = [
            'title' => $blog->title,
            'content' => $blog->content,
            'status' => $blog->status,
            'blog_category_id' => $blog->blog_category_id ?? '',
            'published_at' => $blog->published_at?->format('Y-m-d\TH:i'),
            'meta_title' => $blog->meta_title ?? '',
            'meta_description' => $blog->meta_description ?? '',
            'meta_keywords' => $blog->meta_keywords ?? '',
        ];
        $this->reset('featured_image');
    }

    public function delete(int $id): void
    {
        $blog = Blog::findOrFail($id);
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        $blog->delete();
        session()->flash('success', 'Blog post deleted.');
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->form = [
            'title' => '',
            'content' => '',
            'status' => 'draft',
            'blog_category_id' => '',
            'published_at' => '',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        ];
        $this->reset('featured_image');
    }

    public function render()
    {
        return view('livewire.admin.blogs.index', [
            'blogs' => Blog::with(['author', 'category'])->latest()->paginate(15),
            'categories' => BlogCategory::orderBy('name')->get(),
        ])->title('Blog');
    }
}
