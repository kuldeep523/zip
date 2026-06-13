<?php

namespace App\Livewire\Admin\Settings;

use App\Models\CmsPage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CmsPages extends Component
{
    public ?int $editingId = null;

    public array $form = ['title' => '', 'page_type' => 'home', 'content' => '', 'is_published' => true];

    public function save(): void
    {
        $this->validate(['form.title' => 'required', 'form.content' => 'required']);
        $data = $this->form;
        $data['slug'] = Str::slug($data['title']);

        if ($this->editingId) {
            CmsPage::findOrFail($this->editingId)->update($data);
        } else {
            CmsPage::create($data);
        }

        $this->resetForm();
        session()->flash('success', 'CMS page saved.');
    }

    public function edit(int $id): void
    {
        $page = CmsPage::findOrFail($id);
        $this->editingId = $id;
        $this->form = $page->only(['title', 'page_type', 'content', 'is_published']);
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->form = ['title' => '', 'page_type' => 'home', 'content' => '', 'is_published' => true];
    }

    public function render()
    {
        return view('livewire.admin.settings.cms-pages', [
            'pages' => CmsPage::orderBy('page_type')->get(),
            'pageTypes' => ['home', 'about', 'contact', 'privacy', 'terms', 'refund', 'shipping'],
        ])->title('CMS Pages');
    }
}
