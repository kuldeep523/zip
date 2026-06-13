<?php

namespace App\Livewire\Storefront\Categories;

use App\Models\Category;
use App\Models\Product;
use App\Services\Storefront\StorefrontContentService;
use Livewire\Component;

class Show extends Component
{
    public Category $category;

    public function mount(string $slug): void
    {
        $this->category = Category::where('slug', $slug)->where('is_active', true)->firstOrFail();
    }

    public function render()
    {
        // Get all products that belong to this category (or its children)
        $gemstones = Product::where('status', 'published')
            ->where(function ($q) {
                $q->where('category_id', $this->category->id)
                  ->orWhere('sub_category_id', $this->category->id)
                  ->orWhere('sub_sub_category_id', $this->category->id);
            })
            ->get();

        return view('livewire.storefront.shop', array_merge(
            StorefrontContentService::shopFilters(),
            [
                'gemstones' => $gemstones,
                'category' => $this->category->name,
                // Passing these so the shop view filters work
                'categories' => Category::whereNull('parent_id')->get()->map(fn($c) => (object)['value' => $c->name, 'label' => $c->name]),
                'shapes' => Product::whereNotNull('shape')->distinct()->pluck('shape')->map(fn($s) => (object)['value' => $s, 'label' => $s]),
                'origins' => Product::whereNotNull('origin')->distinct()->pluck('origin')->map(fn($o) => (object)['value' => $o, 'label' => $o]),
                'colors' => Product::whereNotNull('color')->distinct()->pluck('color')->map(fn($c) => (object)['value' => $c, 'label' => $c]),
            ]
        ))->layout('layouts.gem-theme');
    }
}
