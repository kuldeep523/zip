<?php

namespace Database\Seeders;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterCatalogSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks to truncate safely
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        Category::truncate();
        Brand::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $brand = Brand::create([
            'name' => 'RR Gems',
            'slug' => 'rr-gems',
            'description' => 'House brand of RR Gems Udaipur',
            'is_active' => true
        ]);

        // 1. Create Root Categories
        $gemstonesRoot = Category::create([
            'name' => 'Gemstones',
            'slug' => 'gemstones',
            'description' => 'Natural Certified Astrological Gemstones',
            'is_active' => true,
            'is_featured' => true,
        ]);

        $jewelleryRoot = Category::create([
            'name' => 'Jewellery',
            'slug' => 'jewellery',
            'description' => 'Fine Custom Made Jewellery',
            'is_active' => true,
            'is_featured' => true,
        ]);

        $metalsRoot = Category::create([
            'name' => 'Metal',
            'slug' => 'metal',
            'description' => 'Precious Metals for Settings',
            'is_active' => true,
            'is_featured' => false,
        ]);

        // 2. Create Metal Subcategories
        $goldMetal = Category::create([
            'name' => 'Gold',
            'slug' => 'gold',
            'parent_id' => $metalsRoot->id,
            'is_active' => true,
        ]);

        $silverMetal = Category::create([
            'name' => 'Silver',
            'slug' => 'silver',
            'parent_id' => $metalsRoot->id,
            'is_active' => true,
        ]);

        $platinumMetal = Category::create([
            'name' => 'Platinum',
            'slug' => 'platinum',
            'parent_id' => $metalsRoot->id,
            'is_active' => true,
        ]);

        // 3. Create Gemstone Subcategories
        $rubyCat = Category::create([
            'name' => 'Ruby',
            'slug' => 'ruby',
            'parent_id' => $gemstonesRoot->id,
            'planet_badge' => 'Sun',
            'is_active' => true,
        ]);

        $emeraldCat = Category::create([
            'name' => 'Emerald',
            'slug' => 'emerald',
            'parent_id' => $gemstonesRoot->id,
            'planet_badge' => 'Mercury',
            'is_active' => true,
        ]);

        $sapphireCat = Category::create([
            'name' => 'Blue Sapphire',
            'slug' => 'blue-sapphire',
            'parent_id' => $gemstonesRoot->id,
            'planet_badge' => 'Saturn',
            'is_active' => true,
        ]);

        // 4. Create Jewellery Subcategories
        $ringsCat = Category::create([
            'name' => 'Rings',
            'slug' => 'rings',
            'parent_id' => $jewelleryRoot->id,
            'is_active' => true,
        ]);

        $necklacesCat = Category::create([
            'name' => 'Necklaces',
            'slug' => 'necklaces',
            'parent_id' => $jewelleryRoot->id,
            'is_active' => true,
        ]);

        // 5. Seed Products with New Fields

        // Gemstone Products
        $products = [
            [
                'name' => 'Natural Burma Ruby (Manik) 5.25 Ratti',
                'category_id' => $gemstonesRoot->id,
                'sub_category_id' => $rubyCat->id,
                'price' => 45000.00,
                'weight' => 5.25,
                'weight_unit' => 'Ratti',
                'origin' => 'Burma (Myanmar)',
                'shape' => 'Oval',
                'cut' => 'Faceted',
                'color' => 'Pigeon Blood Red',
                'treatment' => 'Unheated & Untreated',
                'certification_type' => 'GRS Certified',
                'certification_no' => 'GRS-2026-948',
                'short_description' => 'A gorgeous deep red natural Burma Ruby with outstanding clarity.',
            ],
            [
                'name' => 'Zambian Emerald (Panna) 4.50 Ratti',
                'category_id' => $gemstonesRoot->id,
                'sub_category_id' => $emeraldCat->id,
                'price' => 22000.00,
                'weight' => 4.50,
                'weight_unit' => 'Ratti',
                'origin' => 'Zambia',
                'shape' => 'Octagon',
                'cut' => 'Step Cut',
                'color' => 'Vibrant Green',
                'treatment' => 'Insignificant Oil',
                'certification_type' => 'GIA Certified',
                'certification_no' => 'GIA-847291',
                'short_description' => 'Beautiful Zambian Emerald with rich green color, excellent for daily wear.',
            ],
            [
                'name' => 'Ceylon Blue Sapphire (Neelam) 6.00 Ratti',
                'category_id' => $gemstonesRoot->id,
                'sub_category_id' => $sapphireCat->id,
                'price' => 68000.00,
                'weight' => 6.00,
                'weight_unit' => 'Ratti',
                'origin' => 'Ceylon (Sri Lanka)',
                'shape' => 'Cushion',
                'cut' => 'Mixed Cut',
                'color' => 'Royal Blue',
                'treatment' => 'Unheated',
                'certification_type' => 'IGITL Certified',
                'certification_no' => 'IGI-384920',
                'short_description' => 'Premium Sri Lankan Blue Sapphire with high transparency and royal blue hue.',
            ],
            
            // Jewellery Products
            [
                'name' => '18K Gold Ruby Engagement Ring',
                'category_id' => $jewelleryRoot->id,
                'sub_category_id' => $ringsCat->id,
                'metal_id' => $goldMetal->id,
                'price' => 85000.00,
                'weight' => 4.20,
                'weight_unit' => 'Grams',
                'origin' => 'India',
                'shape' => 'Round',
                'cut' => 'Brilliant',
                'color' => 'Yellow Gold',
                'treatment' => 'None',
                'certification_type' => 'Hallmark 750',
                'certification_no' => 'HMK-18K-001',
                'short_description' => 'Stunning 18K Yellow Gold ring featuring a natural 1.5 Carat Ruby center stone.',
            ],
            [
                'name' => 'Platinum Blue Sapphire Pendant',
                'category_id' => $jewelleryRoot->id,
                'sub_category_id' => $necklacesCat->id,
                'metal_id' => $platinumMetal->id,
                'price' => 110000.00,
                'weight' => 6.50,
                'weight_unit' => 'Grams',
                'origin' => 'Custom Made',
                'shape' => 'Oval',
                'cut' => 'Faceted',
                'color' => 'Platinum White',
                'treatment' => 'None',
                'certification_type' => 'PT950',
                'certification_no' => 'PT-950-843',
                'short_description' => 'Elegant PT950 Platinum pendant set with a Ceylon Blue Sapphire.',
            ]
        ];

        foreach ($products as $index => $data) {
            Product::create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']) . '-' . rand(1000, 9999),
                'sku' => 'RR-' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'brand_id' => $brand->id,
                'category_id' => $data['category_id'] ?? null,
                'sub_category_id' => $data['sub_category_id'] ?? null,
                'metal_id' => $data['metal_id'] ?? null,
                'price' => $data['price'],
                'sale_price' => $data['price'],
                'stock_quantity' => 10,
                'status' => ProductStatus::Active,
                'is_featured' => true,
                'weight' => $data['weight'] ?? null,
                'weight_unit' => $data['weight_unit'] ?? null,
                'origin' => $data['origin'] ?? null,
                'shape' => $data['shape'] ?? null,
                'cut' => $data['cut'] ?? null,
                'color' => $data['color'] ?? null,
                'treatment' => $data['treatment'] ?? null,
                'certification_type' => $data['certification_type'] ?? null,
                'certification_no' => $data['certification_no'] ?? null,
                'short_description' => $data['short_description'],
            ]);
        }
    }
}
