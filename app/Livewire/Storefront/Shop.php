<?php

namespace App\Livewire\Storefront;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

#[Layout('layouts.gem-theme')]
class Shop extends Component
{
    public $search = '';
    public $category = '';
    public $shape = '';
    public $origin = '';
    public $color = '';
    public $maxPrice = 100000;
    public $sortBy = 'default';

    public function resetFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->shape = '';
        $this->origin = '';
        $this->color = '';
        $this->maxPrice = 100000;
        $this->sortBy = 'default';
    }

    public function addToCart($id)
    {
        $this->dispatch('addToCart', id: $id);
        session()->flash('message', 'Product added to cart successfully!');
    }

    public function getFilteredGemstonesProperty()
    {
        $query = Product::where('status', 'published');

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category) {
            // Find category by name or id, let's assume category is passed as slug or name
            // If it's a name from the filter dropdown
            $cat = Category::where('name', $this->category)->first();
            if ($cat) {
                $query->where(function ($q) use ($cat) {
                    $q->where('category_id', $cat->id)
                      ->orWhere('sub_category_id', $cat->id)
                      ->orWhere('sub_sub_category_id', $cat->id);
                });
            }
        }

        if ($this->shape) {
            $query->where('shape', $this->shape);
        }

        if ($this->origin) {
            $query->where('origin', $this->origin);
        }

        if ($this->color) {
            $query->where('color', $this->color);
        }

        if ($this->maxPrice < 100000) {
            $query->where('price', '<=', $this->maxPrice);
        }

        // Sorting
        switch ($this->sortBy) {
            case 'price_low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;
            case 'weight_low_high':
                $query->orderBy('weight', 'asc');
                break;
            case 'weight_high_low':
                $query->orderBy('weight', 'desc');
                break;
            default:
                $query->orderBy('id', 'desc');
                break;
        }

        return $query->get();
    }

    public function render()
    {
        return view('livewire.storefront.shop', [
            'gemstones' => $this->filteredGemstones,
            'categories' => Category::whereNull('parent_id')->get()->map(fn($c) => (object)['value' => $c->name, 'label' => $c->name]),
            'shapes' => Product::whereNotNull('shape')->distinct()->pluck('shape')->map(fn($s) => (object)['value' => $s, 'label' => $s]),
            'origins' => Product::whereNotNull('origin')->distinct()->pluck('origin')->map(fn($o) => (object)['value' => $o, 'label' => $o]),
            'colors' => Product::whereNotNull('color')->distinct()->pluck('color')->map(fn($c) => (object)['value' => $c, 'label' => $c]),
        ]);
    }
}