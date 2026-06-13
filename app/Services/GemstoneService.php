<?php

namespace App\Services;

use App\Models\Gemstone;
use Illuminate\Support\Collection;

class GemstoneService
{
    public static function getAll(): Collection
    {
        return Gemstone::query()
            ->with(['images', 'gemCategory'])
            ->where('availability_status', '!=', 'discontinued')
            ->orderByDesc('is_featured')
            ->orderBy('name')
            ->get();
    }

    public static function getFeatured(int $limit = 12): Collection
    {
        return Gemstone::query()
            ->with(['images'])
            ->where('is_featured', true)
            ->where('availability_status', 'in_stock')
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get();
    }

    public static function getBestSellers(int $limit = 8): Collection
    {
        return Gemstone::query()
            ->where('is_best_seller', true)
            ->where('availability_status', 'in_stock')
            ->limit($limit)
            ->get();
    }

    public static function getNewArrivals(int $limit = 8): Collection
    {
        return Gemstone::query()
            ->where('is_new_arrival', true)
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get();
    }

    public static function findBySlug(string $slug): ?Gemstone
    {
        $gem = Gemstone::with(['images', 'gemCategory'])
            ->where('slug', $slug)
            ->first();

        if ($gem) {
            $gem->increment('views_count');
        }

        return $gem;
    }

    public static function search(
        string $query = '',
        string $category = '',
        string $shape = '',
        int $minPrice = 0,
        int $maxPrice = 100000,
        string $sortBy = 'default',
        string $stoneType = '',
        string $color = '',
        string $origin = '',
        string $certification = '',
        string $availability = ''
    ): Collection {
        $dbQuery = Gemstone::query()->with(['images']);

        if ($query) {
            $dbQuery->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('category', 'like', "%{$query}%")
                    ->orWhere('stone_type', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            });
        }

        if ($category) {
            $dbQuery->where(function ($q) use ($category) {
                $q->where('category', $category)
                    ->orWhereHas('gemCategory', fn ($c) => $c->where('slug', $category)->orWhere('name', $category));
            });
        }

        if ($shape) {
            $dbQuery->where('shape', $shape);
        }
        if ($stoneType) {
            $dbQuery->where('stone_type', $stoneType);
        }
        if ($color) {
            $dbQuery->where('color', 'like', "%{$color}%");
        }
        if ($origin) {
            $dbQuery->where('origin', 'like', "%{$origin}%");
        }
        if ($certification) {
            $dbQuery->where('certification', 'like', "%{$certification}%");
        }
        if ($availability) {
            $dbQuery->where('availability_status', $availability);
        } else {
            $dbQuery->where('availability_status', '!=', 'discontinued');
        }

        if ($minPrice > 0) {
            $dbQuery->where('price', '>=', $minPrice);
        }
        if ($maxPrice < 100000) {
            $dbQuery->where('price', '<=', $maxPrice);
        }

        match ($sortBy) {
            'price_low_high' => $dbQuery->orderBy('price'),
            'price_high_low' => $dbQuery->orderByDesc('price'),
            'weight_low_high' => $dbQuery->orderBy('weight_carat'),
            'weight_high_low' => $dbQuery->orderByDesc('weight_carat'),
            default => $dbQuery->orderByDesc('is_featured')->orderByDesc('created_at'),
        };

        return $dbQuery->get();
    }
}
