<?php

namespace Database\Seeders;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GemstoneCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $brand = Brand::firstOrCreate(
            ['slug' => 'rr-gems'],
            ['name' => 'RR Gems', 'description' => 'House brand', 'is_active' => true]
        );

        $mainCategory = Category::firstOrCreate(
            ['slug' => 'gemstones'],
            ['name' => 'Gemstones', 'description' => 'Certified natural gemstones', 'is_active' => true, 'is_featured' => true]
        );

        $subCategories = [
            ['name' => 'Ruby', 'slug' => 'ruby', 'description' => 'Natural rubies for Sun (Surya)'],
            ['name' => 'Emerald', 'slug' => 'emerald', 'description' => 'Natural emeralds for Mercury (Budh)'],
            ['name' => 'Blue Sapphire', 'slug' => 'blue-sapphire', 'description' => 'Natural blue sapphires for Saturn (Shani)'],
            ['name' => 'Yellow Sapphire', 'slug' => 'yellow-sapphire', 'description' => 'Natural yellow sapphires for Jupiter (Guru)'],
            ['name' => 'Pearl', 'slug' => 'pearl', 'description' => 'Natural pearls for Moon (Chandra)'],
            ['name' => 'Coral', 'slug' => 'coral', 'description' => 'Natural red corals for Mars (Mangal)'],
            ['name' => 'Opal', 'slug' => 'opal', 'description' => 'Natural opals for Venus (Shukra)'],
            ['name' => "Cat's Eye", 'slug' => 'cats-eye', 'description' => "Natural cat's eye for Ketu"],
            ['name' => 'Hessonite', 'slug' => 'hessonite', 'description' => 'Natural hessonite for Rahu'],
            ['name' => 'Diamond', 'slug' => 'diamond', 'description' => 'Natural diamonds for Venus (Shukra)'],
        ];

        $categoryMap = [];
        foreach ($subCategories as $sub) {
            $categoryMap[$sub['slug']] = Category::firstOrCreate(
                ['slug' => $sub['slug']],
                array_merge($sub, ['parent_id' => $mainCategory->id, 'is_active' => true])
            );
        }

        $products = [
            // Ruby
            [
                'name' => 'Natural Burma Ruby (Manik) 5.25 Ratti',
                'sku' => 'RUB-002',
                'price' => 28500,
                'category_slug' => 'ruby',
                'short_description' => 'Govt. lab certified unheated Burma Ruby. Pigeon blood red color. Ideal for astrological use.',
                'is_featured' => true,
            ],
            [
                'name' => 'Natural Mozambique Ruby 3.50 Ratti',
                'sku' => 'RUB-003',
                'price' => 15500,
                'category_slug' => 'ruby',
                'short_description' => 'Premium Mozambique Ruby with vivid red hue. Excellent clarity and cut.',
                'is_featured' => false,
            ],
            // Emerald
            [
                'name' => 'Colombian Emerald (Panna) 6.00 Ratti',
                'sku' => 'EMR-002',
                'price' => 42000,
                'category_slug' => 'emerald',
                'short_description' => 'Top-grade Colombian Emerald with deep green color and high transparency.',
                'is_featured' => true,
            ],
            [
                'name' => 'Zambian Emerald (Panna) 4.50 Ratti',
                'sku' => 'EMR-003',
                'price' => 22000,
                'category_slug' => 'emerald',
                'short_description' => 'Beautiful Zambian Emerald, slightly oil-treated, excellent for daily wear.',
                'is_featured' => false,
            ],
            // Blue Sapphire
            [
                'name' => 'Ceylon Blue Sapphire (Neelam) 4.25 Ratti',
                'sku' => 'SAP-002',
                'price' => 68000,
                'category_slug' => 'blue-sapphire',
                'short_description' => 'Unheated Ceylon Blue Sapphire with royal blue color. GRS certified.',
                'is_featured' => true,
            ],
            [
                'name' => 'Bangkok Blue Sapphire 5.00 Ratti',
                'sku' => 'SAP-003',
                'price' => 18500,
                'category_slug' => 'blue-sapphire',
                'short_description' => 'Heat-treated Bangkok Blue Sapphire. Good color saturation at affordable price.',
                'is_featured' => false,
            ],
            // Yellow Sapphire
            [
                'name' => 'Ceylon Yellow Sapphire (Pukhraj) 6.50 Ratti',
                'sku' => 'YSP-002',
                'price' => 52000,
                'category_slug' => 'yellow-sapphire',
                'short_description' => 'Brilliant golden yellow Ceylon Pukhraj. Unheated and GIA certified.',
                'is_featured' => true,
            ],
            [
                'name' => 'Thai Yellow Sapphire 4.00 Ratti',
                'sku' => 'YSP-003',
                'price' => 14500,
                'category_slug' => 'yellow-sapphire',
                'short_description' => 'Vibrant Thai Yellow Sapphire. Heat-treated for enhanced color.',
                'is_featured' => false,
            ],
            // Pearl
            [
                'name' => 'Natural Basra Pearl (Moti) 7.50 Ratti',
                'sku' => 'PRL-001',
                'price' => 22000,
                'category_slug' => 'pearl',
                'short_description' => 'Authentic Basra Pearl with high luster. Natural and untreated.',
                'is_featured' => true,
            ],
            [
                'name' => 'South Sea Pearl 9.00 Ratti',
                'sku' => 'PRL-002',
                'price' => 16500,
                'category_slug' => 'pearl',
                'short_description' => 'Large South Sea Pearl with silvery white shine. Perfect round shape.',
                'is_featured' => false,
            ],
            // Coral
            [
                'name' => 'Italian Red Coral (Moonga) 7.00 Ratti',
                'sku' => 'CRL-001',
                'price' => 18500,
                'category_slug' => 'coral',
                'short_description' => 'Premium Italian Red Coral with deep red color. Natural and unheated.',
                'is_featured' => true,
            ],
            [
                'name' => 'Japanese Red Coral 5.50 Ratti',
                'sku' => 'CRL-002',
                'price' => 12500,
                'category_slug' => 'coral',
                'short_description' => 'High-quality Japanese Red Coral. Smooth surface and uniform color.',
                'is_featured' => false,
            ],
            // Opal
            [
                'name' => 'Australian Fire Opal 6.00 Ratti',
                'sku' => 'OPL-001',
                'price' => 14500,
                'category_slug' => 'opal',
                'short_description' => 'Stunning Australian Fire Opal with rainbow color play. Natural untreated.',
                'is_featured' => true,
            ],
            [
                'name' => 'Ethiopian Welo Opal 4.50 Ratti',
                'sku' => 'OPL-002',
                'price' => 9500,
                'category_slug' => 'opal',
                'short_description' => 'Crystal clear Ethiopian Welo Opal with brilliant fire flashes.',
                'is_featured' => false,
            ],
            // Cat's Eye
            [
                'name' => "Chrysoberyl Cat's Eye (Lehsunia) 5.00 Ratti",
                'sku' => 'CTE-001',
                'price' => 28000,
                'category_slug' => 'cats-eye',
                'short_description' => "Rare Chrysoberyl Cat's Eye with sharp milky line. Honey green color.",
                'is_featured' => true,
            ],
            [
                'name' => "Quartz Cat's Eye 6.50 Ratti",
                'sku' => 'CTE-002',
                'price' => 8500,
                'category_slug' => 'cats-eye',
                'short_description' => "Affordable Quartz Cat's Eye with visible chatoyancy. Good for beginners.",
                'is_featured' => false,
            ],
            // Hessonite
            [
                'name' => 'Ceylon Hessonite (Gomed) 6.25 Ratti',
                'sku' => 'GOM-001',
                'price' => 16500,
                'category_slug' => 'hessonite',
                'short_description' => 'Natural Ceylon Hessonite with cinnamon red color. Unheated and certified.',
                'is_featured' => true,
            ],
            [
                'name' => 'African Hessonite 5.00 Ratti',
                'sku' => 'GOM-002',
                'price' => 9500,
                'category_slug' => 'hessonite',
                'short_description' => 'Deep orange-red African Hessonite. Excellent clarity and brilliance.',
                'is_featured' => false,
            ],
            // Diamond
            [
                'name' => 'Solitaire Diamond Ring 0.50 Carat',
                'sku' => 'DIA-001',
                'price' => 125000,
                'category_slug' => 'diamond',
                'short_description' => 'VVS1 clarity, F color solitaire diamond in 18K gold ring setting.',
                'is_featured' => true,
            ],
            [
                'name' => 'Natural Uncut Polki Diamond 1.00 Carat',
                'sku' => 'DIA-002',
                'price' => 85000,
                'category_slug' => 'diamond',
                'short_description' => 'Traditional uncut Polki diamond with antique cut. Set in 22K gold.',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $data) {
            $category = $categoryMap[$data['category_slug']] ?? $mainCategory;

            Product::firstOrCreate(
                ['sku' => $data['sku']],
                [
                    'name' => $data['name'],
                    'slug' => Str::slug($data['name']) . '-' . Str::random(4),
                    'category_id' => $category->id,
                    'brand_id' => $brand->id,
                    'price' => $data['price'],
                    'sale_price' => $data['price'] * 0.9,
                    'stock_quantity' => rand(3, 15),
                    'low_stock_threshold' => 3,
                    'status' => ProductStatus::Active,
                    'is_featured' => $data['is_featured'],
                    'is_new_arrival' => rand(0, 1) === 1,
                    'short_description' => $data['short_description'],
                    'long_description' => '<p>' . $data['short_description'] . '</p><p>This gemstone is certified by a government-approved laboratory and comes with an authenticity certificate. Suitable for astrological and jewelry purposes.</p>',
                ]
            );
        }
    }
}
