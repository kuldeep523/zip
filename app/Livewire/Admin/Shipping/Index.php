<?php

namespace App\Livewire\Admin\Shipping;

use App\Models\FreeShippingRule;
use App\Models\ShippingRate;
use App\Models\ShippingZone;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Index extends Component
{
    public array $zoneForm = ['name' => ''];

    public array $rateForm = ['shipping_zone_id' => null, 'name' => '', 'rate' => 0];

    public array $freeForm = ['name' => '', 'min_order_amount' => 999];

    public function saveZone(): void
    {
        ShippingZone::create($this->zoneForm);
        $this->zoneForm = ['name' => ''];
        session()->flash('success', 'Zone created.');
    }

    public function saveRate(): void
    {
        ShippingRate::create($this->rateForm);
        session()->flash('success', 'Rate created.');
    }

    public function saveFreeRule(): void
    {
        FreeShippingRule::create($this->freeForm);
        session()->flash('success', 'Free shipping rule created.');
    }

    public function render()
    {
        return view('livewire.admin.shipping.index', [
            'zones' => ShippingZone::with('rates')->get(),
            'freeRules' => FreeShippingRule::all(),
        ])->title('Shipping');
    }
}
