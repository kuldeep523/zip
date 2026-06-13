<?php

namespace App\Livewire\Storefront;

use App\Models\CmsPage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.gem-theme')]
class PageShow extends Component
{
    public CmsPage $page;

    public function mount(string $slug): void
    {
        $this->page = CmsPage::where('slug', $slug)->where('is_published', true)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.storefront.page-show');
    }
}
