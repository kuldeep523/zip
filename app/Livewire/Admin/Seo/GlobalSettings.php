<?php

namespace App\Livewire\Admin\Seo;

use App\Models\GlobalSeoSetting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class GlobalSettings extends Component
{
    public array $form = [];

    public function mount(): void
    {
        $settings = GlobalSeoSetting::first();
        $this->form = $settings?->toArray() ?? [
            'site_title' => config('app.name'),
            'site_description' => '',
            'site_keywords' => '',
            'google_analytics_id' => '',
            'google_tag_manager_id' => '',
            'facebook_pixel_id' => '',
            'robots_txt' => "User-agent: *\nAllow: /",
            'organization_schema' => [],
        ];
    }

    public function save(): void
    {
        GlobalSeoSetting::updateOrCreate(['id' => 1], $this->form);
        session()->flash('success', 'SEO settings saved.');
    }

    public function render()
    {
        return view('livewire.admin.seo.global-settings')->title('SEO Panel');
    }
}
