<?php

namespace App\Livewire\Admin\Storefront;

use App\Services\Storefront\StorefrontContentService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ContentHub extends Component
{
    public function clearCache(): void
    {
        StorefrontContentService::clearCache();
        session()->flash('success', 'Storefront cache cleared.');
    }

    public function render()
    {
        return view('livewire.admin.storefront.content-hub')->title('Storefront Content');
    }
}
