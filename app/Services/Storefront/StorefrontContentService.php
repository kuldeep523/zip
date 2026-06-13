<?php

namespace App\Services\Storefront;

use App\Models\AstroGoal;
use App\Models\AstroZodiacSign;
use App\Models\Faq;
use App\Models\FilterOption;
use App\Models\FooterLink;
use App\Models\FooterSection;
use App\Models\HeaderNavLink;
use App\Models\HomeSection;
use App\Models\HomeSlider;
use App\Models\NavigationMenuColumn;
use App\Models\SiteSetting;
use App\Models\SocialLink;
use App\Models\TrustBadge;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class StorefrontContentService
{
    public static function setting(string $key, ?string $default = null): ?string
    {
        return Cache::remember("site_setting.{$key}", 3600, function () use ($key, $default) {
            return SiteSetting::where('key', $key)->value('value') ?? $default;
        });
    }

    public static function layoutData(): array
    {
        return Cache::remember('storefront.layout', 3600, function () {
            if (! Schema::hasTable('navigation_menu_columns')) {
                return [
                    'settings' => collect(),
                    'megaMenuColumns' => collect(),
                    'headerNavLinks' => collect(),
                    'footerSections' => collect(),
                    'socialLinks' => collect(),
                ];
            }

            return [
                'settings' => SiteSetting::pluck('value', 'key'),
                'megaMenuColumns' => NavigationMenuColumn::with(['items' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order')])
                    ->where('location', 'header_mega')
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->get(),
                'headerNavLinks' => HeaderNavLink::where('is_active', true)->orderBy('sort_order')->get(),
                'footerSections' => FooterSection::with(['links' => fn ($q) => $q->orderBy('sort_order')])
                    ->orderBy('sort_order')
                    ->get(),
                'socialLinks' => SocialLink::where('is_active', true)->orderBy('sort_order')->get(),
            ];
        });
    }

    public static function homeData(): array
    {
        return Cache::remember('storefront.home', 3600, function () {
            if (! Schema::hasTable('home_sections')) {
                return self::emptyHomeData();
            }

            $sections = HomeSection::pluck('title', 'key');
            $eyebrows = HomeSection::pluck('eyebrow', 'key');
            $descriptions = HomeSection::pluck('description', 'key');

            return [
                'sliders' => Schema::hasTable('home_sliders')
                    ? HomeSlider::where('is_active', true)->orderBy('sort_order')->get()
                    : collect(),
                'trustBadges' => Schema::hasTable('trust_badges')
                    ? TrustBadge::where('is_active', true)->orderBy('sort_order')->get()
                    : collect(),
                'homeCategories' => Schema::hasColumn('categories', 'show_on_home')
                    ? Category::where('show_on_home', true)->where('is_active', true)->orderBy('sort_order')->get()
                    : collect(),
                'faqs' => Schema::hasTable('faqs')
                    ? Faq::where('page', 'home')->where('is_active', true)->orderBy('sort_order')->get()
                    : collect(),
                'zodiacSigns' => Schema::hasTable('astro_zodiac_signs')
                    ? AstroZodiacSign::where('is_active', true)->orderBy('sort_order')->get()
                    : collect(),
                'goals' => Schema::hasTable('astro_goals')
                    ? AstroGoal::where('is_active', true)->orderBy('sort_order')->get()
                    : collect(),
                'sections' => $sections,
                'eyebrows' => $eyebrows,
                'descriptions' => $descriptions,
            ];
        });
    }

    protected static function emptyHomeData(): array
    {
        return [
            'sliders' => collect(),
            'trustBadges' => collect(),
            'homeCategories' => collect(),
            'faqs' => collect(),
            'zodiacSigns' => collect(),
            'goals' => collect(),
            'sections' => collect(),
            'eyebrows' => collect(),
            'descriptions' => collect(),
        ];
    }

    public static function shopFilters(): array
    {
        return Cache::remember('storefront.filters', 3600, function () {
            return [
                'categories' => FilterOption::where('type', 'category')->where('is_active', true)->orderBy('sort_order')->get(),
                'shapes' => FilterOption::where('type', 'shape')->where('is_active', true)->orderBy('sort_order')->get(),
                'stoneTypes' => FilterOption::where('type', 'stone_type')->where('is_active', true)->orderBy('sort_order')->get(),
                'colors' => FilterOption::where('type', 'color')->where('is_active', true)->orderBy('sort_order')->get(),
                'origins' => FilterOption::where('type', 'origin')->where('is_active', true)->orderBy('sort_order')->get(),
            ];
        });
    }

    public static function clearCache(): void
    {
        Cache::forget('storefront.layout');
        Cache::forget('storefront.home');
        Cache::forget('storefront.filters');
        SiteSetting::pluck('key')->each(fn ($k) => Cache::forget("site_setting.{$k}"));
    }
}
