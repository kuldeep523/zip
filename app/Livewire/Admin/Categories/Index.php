<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Index extends Component
{
    public array $form = ['name' => '', 'parent_id' => null, 'description' => '', 'is_active' => true];

    public ?int $editingId = null;

    public function save(): void
    {
        $this->validate(['form.name' => 'required|string|max:255']);
        $data = $this->form;
        
        $originalSlug = Str::slug($data['name']);
        $slug = $originalSlug;
        $count = 1;
        while (Category::where('slug', $slug)->where('id', '!=', $this->editingId)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }
        $data['slug'] = $slug;

        if ($this->editingId) {
            Category::findOrFail($this->editingId)->update($data);
        } else {
            Category::create($data);
        }

        $this->resetForm();
        session()->flash('success', 'Category saved.');
    }

    public function edit(int $id): void
    {
        $cat = Category::findOrFail($id);
        $this->editingId = $id;
        $this->form = $cat->only(['name', 'parent_id', 'description', 'is_active']);
    }

    public function delete(int $id): void
    {
        Category::findOrFail($id)->delete();
        session()->flash('success', 'Category deleted.');
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->form = ['name' => '', 'parent_id' => null, 'description' => '', 'is_active' => true];
    }

    public function render()
    {
        return view('livewire.admin.categories.index', [
            'categories' => Category::with('parent', 'children')->whereNull('parent_id')->orderBy('sort_order')->get(),
            'allCategories' => Category::orderBy('name')->get(),
        ])->title('Categories');
    }
}
