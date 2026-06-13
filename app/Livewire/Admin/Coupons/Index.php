<?php

namespace App\Livewire\Admin\Coupons;

use App\Enums\CouponType;
use App\Models\Coupon;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Index extends Component
{
    public array $form = ['code' => '', 'name' => '', 'type' => 'percentage', 'value' => 10, 'is_active' => true];

    public function save(): void
    {
        $this->validate(['form.code' => 'required|unique:coupons,code', 'form.name' => 'required']);
        Coupon::create($this->form);
        $this->form = ['code' => '', 'name' => '', 'type' => 'percentage', 'value' => 10, 'is_active' => true];
        session()->flash('success', 'Coupon created.');
    }

    public function render()
    {
        return view('livewire.admin.coupons.index', [
            'coupons' => Coupon::latest()->get(),
            'types' => CouponType::cases(),
        ])->title('Coupons');
    }
}
