<?php

namespace App\Livewire\Storefront\Brands;

use App\Models\Brand;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.gem-theme')]
class Index extends Component
{
    public ?Brand $brand = null;

    public function mount(?string $slug = null): void
    {
        if ($slug) {
            $this->brand = Brand::with('products')->where('slug', $slug)->where('is_active', true)->firstOrFail();
        }
    }

    public function render()
    {
        return view('livewire.storefront.brands.index', [
            'brands' => Brand::where('is_active', true)->withCount('products')->get(),
            'brand' => $this->brand,
        ]);
    }
}
