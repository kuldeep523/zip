<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Index extends Component
{
    public array $form = ['name' => '', 'description' => '', 'is_active' => true];

    public function save(): void
    {
        $this->validate(['form.name' => 'required']);
        Brand::create(array_merge($this->form, ['slug' => Str::slug($this->form['name'])]));
        $this->form = ['name' => '', 'description' => '', 'is_active' => true];
        session()->flash('success', 'Brand created.');
    }

    public function render()
    {
        return view('livewire.admin.brands.index', [
            'brands' => Brand::latest()->paginate(20),
        ])->title('Brands');
    }
}
