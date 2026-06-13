<?php

namespace App\Livewire\Storefront;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.gem-theme')]
class GemstonesDetailpage extends Component
{
    public function render()
    {
        return view('livewire..storefront.gemstones-detailpage');
    }
}
