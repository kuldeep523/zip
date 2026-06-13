<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Gemstone Guide',
            'Astrology & Vedic',
            'Jewelry Trends',
            'Buying Tips',
            'Care & Cleaning',
            'Birthstones',
        ];

        foreach ($categories as $name) {
            BlogCategory::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
