<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('site_settings')) {
            Schema::create('site_settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->text('value')->nullable();
                $table->string('group')->default('general');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('home_sliders')) {
            Schema::create('home_sliders', function (Blueprint $table) {
                $table->id();
                $table->string('subtitle')->nullable();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('image');
                $table->string('btn_primary_text')->nullable();
                $table->string('btn_primary_url')->nullable();
                $table->string('btn_secondary_text')->nullable();
                $table->string('btn_secondary_url')->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('trust_badges')) {
            Schema::create('trust_badges', function (Blueprint $table) {
                $table->id();
                $table->string('icon')->default('bi-patch-check-fill');
                $table->string('title');
                $table->string('subtitle')->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('home_sections')) {
            Schema::create('home_sections', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->string('eyebrow')->nullable();
                $table->string('title');
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('faqs')) {
            Schema::create('faqs', function (Blueprint $table) {
                $table->id();
                $table->string('question');
                $table->text('answer');
                $table->string('page')->default('home');
                $table->boolean('is_expanded')->default(false);
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('location')->nullable();
                $table->text('content');
                $table->unsignedTinyInteger('rating')->default(5);
                $table->string('avatar')->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('navigation_menu_columns')) {
            Schema::create('navigation_menu_columns', function (Blueprint $table) {
                $table->id();
                $table->string('location')->default('header_mega');
                $table->string('title');
                $table->string('column_class')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('navigation_menu_items')) {
            Schema::create('navigation_menu_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('navigation_menu_column_id')->constrained()->cascadeOnDelete();
                $table->string('title');
                $table->string('url');
                $table->string('badge_text')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('header_nav_links')) {
            Schema::create('header_nav_links', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('url');
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('footer_sections')) {
            Schema::create('footer_sections', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->string('title')->nullable();
                $table->text('content')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('footer_links')) {
            Schema::create('footer_links', function (Blueprint $table) {
                $table->id();
                $table->foreignId('footer_section_id')->constrained()->cascadeOnDelete();
                $table->string('title');
                $table->string('url');
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('social_links')) {
            Schema::create('social_links', function (Blueprint $table) {
                $table->id();
                $table->string('platform');
                $table->string('url');
                $table->string('icon')->default('bi-link');
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('filter_options')) {
            Schema::create('filter_options', function (Blueprint $table) {
                $table->id();
                $table->string('type');
                $table->string('label');
                $table->string('value');
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('astro_zodiac_signs')) {
            Schema::create('astro_zodiac_signs', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('lord');
                $table->string('symbol');
                $table->string('recommended_gem_category')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('astro_goals')) {
            Schema::create('astro_goals', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('title');
                $table->string('icon')->default('bi-star-fill');
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('gemstone_images')) {
            Schema::create('gemstone_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('gemstone_id')->constrained()->cascadeOnDelete();
                $table->string('path');
                $table->string('alt_text')->nullable();
                $table->boolean('is_primary')->default(false);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('gemstones') && ! Schema::hasColumn('gemstones', 'category_id')) {
            Schema::table('gemstones', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()->after('slug')->constrained()->nullOnDelete();
                $table->string('sku')->nullable()->after('category_id');
                $table->decimal('sale_price', 12, 2)->nullable()->after('price');
                $table->string('stone_type')->nullable()->after('category');
                $table->string('availability_status')->default('in_stock')->after('stock');
                $table->string('video_url')->nullable()->after('image_path');
                $table->boolean('is_best_seller')->default(false)->after('is_featured');
                $table->boolean('is_new_arrival')->default(false)->after('is_best_seller');
                $table->unsignedInteger('views_count')->default(0)->after('is_new_arrival');
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->string('meta_keywords')->nullable();
                $table->string('canonical_url')->nullable();
                $table->text('wearing_guide')->nullable();
                $table->string('planet_ruler')->nullable();
                $table->string('recommended_finger')->nullable();
                $table->string('suitable_metal')->nullable();
                $table->string('auspicious_day')->nullable();
                $table->text('beej_mantra')->nullable();
            });
        }

        if (Schema::hasTable('categories') && ! Schema::hasColumn('categories', 'show_on_home')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->string('planet_badge')->nullable()->after('image');
                $table->string('home_image')->nullable()->after('planet_badge');
                $table->text('home_description')->nullable()->after('home_image');
                $table->boolean('show_on_home')->default(false)->after('is_featured');
                $table->boolean('show_in_menu')->default(true)->after('show_on_home');
            });
        }
    }

    public function down(): void
    {
        // Repair migration — no rollback.
    }
};
