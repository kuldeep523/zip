<?php

namespace App\Livewire\Storefront;

use App\Models\AstroZodiacSign;
use App\Models\Product;
use App\Services\Storefront\StorefrontContentService;
use Livewire\Component;

class Home extends Component
{
    public $step = 1;

    public $selectedZodiac = '';

    public $selectedGoal = '';

    public $recommendation = null;

    public function selectZodiac(string $zodiac): void
    {
        $this->selectedZodiac = $zodiac;
        $this->step = 2;
    }

    public function selectGoal(string $goal): void
    {
        $this->selectedGoal = $goal;
        $this->generateRecommendation();
        $this->step = 3;
    }

    public function generateRecommendation(): void
    {
        $sign = AstroZodiacSign::where('name', $this->selectedZodiac)->first();
        $gemType = $sign?->recommended_gem_category ?? 'Ruby';

        $gem = Product::where('status', 'published')
            ->whereHas('category', function($q) use ($gemType) {
                $q->where('name', 'like', "%{$gemType}%");
            })->first() ?? Product::where('is_featured', true)->where('status', 'published')->first();

        if (! $gem) {
            return;
        }

        $this->recommendation = [
            'gem_name' => $gem->name,
            'category' => $gem->category->name ?? 'Gemstone',
            'slug' => $gem->slug,
            'ratti' => "{$gem->weight} {$gem->weight_unit}",
            'benefits' => $gem->short_description,
            'planet' => $this->planetLabel($gem->category->name ?? ''),
            'image' => $gem->images->first()?->path ? asset('storage/' . $gem->images->first()->path) : asset('images/placeholder.jpg'),
        ];
    }

    protected function planetLabel(string $category): string
    {
        return match (true) {
            str_contains($category, 'Ruby') => 'Sun (Surya)',
            str_contains($category, 'Emerald') => 'Mercury (Budh)',
            str_contains($category, 'Blue Sapphire') => 'Saturn (Shani)',
            str_contains($category, 'Yellow Sapphire') => 'Jupiter (Guru)',
            str_contains($category, 'Opal') => 'Venus (Shukra)',
            default => 'Moon (Chandra)',
        };
    }

    public function resetFinder(): void
    {
        $this->step = 1;
        $this->selectedZodiac = '';
        $this->selectedGoal = '';
        $this->recommendation = null;
    }

    public function addToCart(int $id): void
    {
        $this->dispatch('addToCart', id: $id);
    }

    public function render()
    {
        return view('livewire.storefront.home', array_merge(
            StorefrontContentService::homeData(),
            [
                'featuredGems' => Product::where('is_featured', true)->where('status', 'published')->with('images')->take(8)->get(),
                'whatsapp' => StorefrontContentService::setting('whatsapp', '919876543210'),
            ]
        ))->layout('layouts.gem-theme');
    }
}
