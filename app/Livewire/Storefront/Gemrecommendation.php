<?php

namespace App\Livewire\Storefront;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\AstroZodiacSign;
use App\Models\Gemstone;

#[Layout('layouts.gem-theme')]
class Gemrecommendation extends Component
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

        $gem = Gemstone::where('category', $gemType)->first()
            ?? Gemstone::where('is_featured', true)->first();

        if (!$gem) {
            return;
        }

        $this->recommendation = [
            'gem_name'   => $gem->name,
            'category'   => $gem->category,
            'slug'       => $gem->slug,
            'ratti'      => $gem->weight_ratti,
            'benefits'   => $gem->astrological_benefits,
            'planet'     => $gem->planet_ruler ?? $this->planetLabel($gem->category),
            'image'      => $gem->image_path,
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
        $zodiacSigns = AstroZodiacSign::all();

        $goals = collect([
            (object) [
                'title' => 'Career Success',
                'slug'  => 'career',
                'icon'  => 'bi-briefcase-fill',
            ],
            (object) [
                'title' => 'Wealth & Prosperity',
                'slug'  => 'wealth',
                'icon'  => 'bi-cash-stack',
            ],
            (object) [
                'title' => 'Love & Relationships',
                'slug'  => 'love',
                'icon'  => 'bi-heart-fill',
            ],
            (object) [
                'title' => 'Health & Wellbeing',
                'slug'  => 'health',
                'icon'  => 'bi-heart-pulse-fill',
            ],
        ]);

        $sections = [
            'astro_finder' => 'Find Your Astrological Gemstone',
        ];

        $eyebrows = [
            'astro_finder' => 'Vedic Recommendation',
        ];

        $descriptions = [
            'astro_finder' => 'Discover the gemstone aligned with your zodiac sign and life goals.',
        ];

        return view('livewire.storefront.gemrecommendation', compact(
            'zodiacSigns',
            'goals',
            'sections',
            'eyebrows',
            'descriptions'
        ));
    }
}