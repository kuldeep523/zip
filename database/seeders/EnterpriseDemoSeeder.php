<?php

namespace Database\Seeders;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CmsPage;
use App\Models\GlobalSeoSetting;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EnterpriseDemoSeeder extends Seeder
{
    public function run(): void
    {
        GlobalSeoSetting::firstOrCreate(['id' => 1], [
            'site_title' => 'RR Gems Udaipur | Certified Gemstones',
            'site_description' => 'Premium certified gemstones and astro jewelry from Udaipur.',
            'site_keywords' => 'gemstones, ruby, emerald, neelam, udaipur, certified gems',
        ]);

        $admin = User::firstOrCreate(
            ['email' => 'admin@rrgemsudaipur.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole('Super Admin');

        User::firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'Demo Customer',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        )->assignRole('Customer');

        $brand = Brand::firstOrCreate(
            ['slug' => 'rr-gems'],
            ['name' => 'RR Gems', 'description' => 'House brand', 'is_active' => true]
        );

        $category = Category::firstOrCreate(
            ['slug' => 'gemstones'],
            ['name' => 'Gemstones', 'description' => 'Certified natural gemstones', 'is_active' => true, 'is_featured' => true]
        );

        Category::firstOrCreate(
            ['slug' => 'ruby'],
            ['name' => 'Ruby', 'parent_id' => $category->id, 'is_active' => true]
        );

        $products = [
            ['name' => 'Natural Ruby (Manik)', 'sku' => 'RUB-001', 'price' => 25000],
            ['name' => 'Colombian Emerald (Panna)', 'sku' => 'EMR-001', 'price' => 45000],
            ['name' => 'Blue Sapphire (Neelam)', 'sku' => 'SAP-001', 'price' => 35000],
            ['name' => 'Yellow Sapphire (Pukhraj)', 'sku' => 'YSP-001', 'price' => 18000],
        ];

        foreach ($products as $data) {
            Product::firstOrCreate(
                ['sku' => $data['sku']],
                [
                    'name' => $data['name'],
                    'slug' => Str::slug($data['name']),
                    'category_id' => $category->id,
                    'brand_id' => $brand->id,
                    'price' => $data['price'],
                    'sale_price' => $data['price'] * 0.9,
                    'stock_quantity' => 10,
                    'low_stock_threshold' => 3,
                    'status' => ProductStatus::Active,
                    'is_featured' => true,
                    'short_description' => 'Govt. lab certified natural gemstone.',
                ]
            );
        }

        foreach (['home', 'about', 'contact', 'privacy', 'terms', 'refund', 'shipping'] as $type) {
            CmsPage::firstOrCreate(
                ['slug' => $type],
                [
                    'title' => ucfirst($type).' Page',
                    'page_type' => $type,
                    'content' => "<h1>".ucfirst($type)."</h1><p>Content for {$type} page.</p>",
                    'is_published' => true,
                ]
            );
        }
    }
}
