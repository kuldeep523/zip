<?php

namespace App\Livewire\Storefront;

use App\Models\Product;
use App\Services\Storefront\StorefrontContentService;
use Livewire\Component;

class ProductDetail extends Component
{
    public $slug;
    public $gem;
    public $activeImage;
    public $certificateInput = '';
    public $verificationResult = null;
    public $galleryImages = [];

    public function mount($slug): void
    {
        $this->slug = $slug;
        $this->gem = Product::where('slug', $slug)->with('images')->first();

        if (! $this->gem) {
            abort(404);
        }

        $primaryImage = $this->gem->images->where('is_primary', true)->first();
        $this->activeImage = $primaryImage ? asset('storage/' . $primaryImage->path) : asset('images/placeholder.jpg');
        
        $this->certificateInput = $this->gem->certification_no ?? '';

        $this->galleryImages = collect([$this->activeImage])
            ->merge($this->gem->images->pluck('path')->map(fn($p) => asset('storage/' . $p)))
            ->unique()
            ->filter()
            ->values()
            ->all();
    }

    public function changeImage(string $path): void
    {
        $this->activeImage = $path;
    }

    public function addToCart(): void
    {
        $this->dispatch('addToCart', id: $this->gem->id);
    }

    public function buyNow()
    {
        $this->dispatch('addToCart', id: $this->gem->id);

        return redirect()->to('/checkout');
    }

    public function verifyCertificate(): void
    {
        if ($this->gem->certification_no && trim(strtolower($this->certificateInput)) === trim(strtolower($this->gem->certification_no))) {
            $this->verificationResult = [
                'status' => 'success',
                'message' => 'Certificate verified! This product meets lab standards.',
                'details' => [
                    'Weight' => "{$this->gem->weight} {$this->gem->weight_unit}",
                    'Shape' => $this->gem->shape,
                    'Color' => $this->gem->color,
                    'Origin' => $this->gem->origin,
                    'Date Checked' => date('d-M-Y'),
                ],
            ];
        } else {
            $this->verificationResult = [
                'status' => 'error',
                'message' => 'Invalid certificate number! Please cross-check the certificate.',
            ];
        }
    }

    public function render()
    {
        $related = Product::where('category_id', $this->gem->category_id)
            ->where('id', '!=', $this->gem->id)
            ->where('status', 'published')
            ->take(3)
            ->get();

        $whatsapp = StorefrontContentService::setting('whatsapp', '919876543210');

        return view('livewire.storefront.product-detail', [
            'related' => $related,
            'whatsapp' => $whatsapp,
        ])->layout('layouts.gem-theme');
    }
}
