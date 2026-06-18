<?php

namespace App\Livewire\Storefront;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

#[Layout('layouts.gem-theme')]
class GemstonesDetailpage extends Component
{
    #[Url]
    public $category = '';

    public function addToCart($id)
    {
        $this->dispatch('addToCart', id: $id);
        session()->flash('message', 'Product added to cart successfully!');
    }

    public function render()
    {
        $currentCategory = null;
        $subCategories = [];
        $products = [];

        if ($this->category) {
            $currentCategory = Category::where('slug', $this->category)->first();
        }

        if (!$currentCategory) {
            // Default fallback if no category provided or found
            $currentCategory = Category::where('name', 'Gemstones')->first();
        }

        if ($currentCategory) {
            // Get subcategories
            $subCategories = Category::where('parent_id', $currentCategory->id)->get();
            
            // Get products associated with this category or its subcategories
            $products = Product::where('category_id', $currentCategory->id)
                ->orWhere('sub_category_id', $currentCategory->id)
                ->orWhere('sub_sub_category_id', $currentCategory->id)
                ->with(['images', 'category', 'subCategory'])
                ->take(12)
                ->get();
        }

        return view('livewire.storefront.gemstones-detailpage', [
            'currentCategory' => $currentCategory,
            'subCategories' => $subCategories,
            'products' => $products
        ]);
    }
}
