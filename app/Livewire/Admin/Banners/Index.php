<?php

namespace App\Livewire\Admin\Banners;

use App\Enums\BannerType;
use App\Models\Banner;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class Index extends Component
{
    use WithFileUploads;

    public array $form = ['title' => '', 'type' => 'homepage', 'link' => '', 'is_active' => true];

    public $image;

    public function save(): void
    {
        $this->validate(['form.title' => 'required', 'image' => 'required|image|max:2048']);
        $path = $this->image->store('banners', 'public');
        Banner::create([...$this->form, 'image' => $path]);
        $this->reset(['form', 'image']);
        session()->flash('success', 'Banner created.');
    }

    public function render()
    {
        return view('livewire.admin.banners.index', [
            'banners' => Banner::latest()->get(),
            'types' => BannerType::cases(),
        ])->title('Banners');
    }
}
