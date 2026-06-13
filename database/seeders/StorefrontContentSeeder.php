<?php

namespace Database\Seeders;

use App\Models\AstroGoal;
use App\Models\AstroZodiacSign;
use App\Models\Category;
use App\Models\Faq;
use App\Models\FilterOption;
use App\Models\FooterLink;
use App\Models\FooterSection;
use App\Models\Gemstone;
use App\Models\HeaderNavLink;
use App\Models\HomeSection;
use App\Models\HomeSlider;
use App\Models\NavigationMenuColumn;
use App\Models\NavigationMenuItem;
use App\Models\SiteSetting;
use App\Models\SocialLink;
use App\Models\TrustBadge;
use App\Services\Storefront\StorefrontContentService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StorefrontContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedSettings();
        $this->seedHome();
        $this->seedAstro();
        $this->seedFilters();
        $this->seedCategories();
        $this->seedGemstones();
        $this->seedNavigation();
        $this->seedFooter();
        StorefrontContentService::clearCache();
    }

    protected function seedSettings(): void
    {
        $settings = [
            'announcement_text' => '100% Gov. Approved Lab Certified Gemstones',
            'phone' => '+91 98765 43210',
            'phone_tel' => '+919876543210',
            'whatsapp' => '919876543210',
            'whatsapp_message' => 'Hi! I am looking for a certified gemstone. Please guide me.',
            'site_name' => 'RR GEMS',
            'site_tagline' => 'Udaipur • Astro Gems',
            'email' => 'info@rrgemsudaipur.com',
            'address' => '102, Palace Road, opposite City Palace, Udaipur, Rajasthan - 313001',
            'footer_brand_title' => 'RR GEMS & JEWELS',
            'footer_brand_text' => 'Established in Udaipur, RR Gems & Jewels is dedicated to providing 100% natural, unheated, and untreated astrological gemstones. Every stone we sell comes with a certificate of authenticity from government-approved gem testing laboratories.',
            'nav_shipping_text' => 'Free Shipping India',
            'nav_secure_text' => 'Secure Payment',
            'page_title_suffix' => 'RR Gems Udaipur | Astro Gemstones & Fine Jewelry',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => 'general']);
        }
    }

    protected function seedHome(): void
    {
        HomeSlider::updateOrCreate(['title' => '100% Natural Astrological Gemstones'], [
            'subtitle' => 'Vedic Astrology Approved',
            'description' => 'Hand-selected, unheated, untreated certified gemstones for career, health, marriage, and wealth. Tested in Government Approved Labs.',
            'image' => 'images/gems/hero_banner.png',
            'btn_primary_text' => 'Explore Store',
            'btn_primary_url' => '/shop',
            'btn_secondary_text' => 'Gem Finder',
            'btn_secondary_url' => '#astro-finder',
            'is_active' => true,
            'sort_order' => 0,
        ]);

        $badges = [
            ['bi-patch-check-fill', 'Govt. Certified Stock', '100% Authenticity Verified'],
            ['bi-arrow-left-right', '7 Days Easy Return', 'No Questions Asked Refund'],
            ['bi-chat-heart-fill', 'Free Astro Consultation', 'By Certified Vedic Astrologers'],
            ['bi-truck-flatbed', 'Worldwide Insured Shipping', 'Secure delivery to your door'],
        ];
        foreach ($badges as $i => [$icon, $title, $subtitle]) {
            TrustBadge::updateOrCreate(['title' => $title], [
                'icon' => $icon, 'subtitle' => $subtitle, 'sort_order' => $i, 'is_active' => true,
            ]);
        }

        $sections = [
            'astro_finder' => ['Vedic Recommendation', 'Find Your Astrological Gemstone', 'Select your Zodiac sign and target goal to discover the stone that aligns with your planetary rulers.'],
            'shop_categories' => ['Premium Collections', 'Shop By Gemstone Type', 'Choose from our verified, high-vibration gemstone collections sourced directly from origins.'],
            'best_sellers' => ['Limited Authentic Stocks', 'Best Seller Vedic Gems', 'Handpicked precious stones exhibiting high color transparency and carat accuracy.'],
            'faq' => ['Buyer Education', 'Astrology & Gemstone Guide', 'Answers to frequently asked questions about gemstone efficacy, certificates, and wear guides.'],
        ];
        foreach ($sections as $key => [$eyebrow, $title, $description]) {
            HomeSection::updateOrCreate(['key' => $key], compact('eyebrow', 'title', 'description'));
        }

        $faqs = [
            ['How do gemstones work astrologically?', 'In Vedic Astrology, planets emit specific cosmic rays. When a weak planet is reinforced by its corresponding gemstone, it behaves positively. Gemstones act as high-frequency optical filters.', true],
            ['What is the difference between Carat and Ratti?', 'Ratti is the traditional Indian unit of weight, whereas Carat is the internationally accepted standard. 1 Carat is equal to 200 milligrams. 1 Ratti is equal to 180 milligrams (or 0.9 Carats).', false],
            ['Why is heating or glass-filling treatment bad for astrological purposes?', 'Treatments like high-heat processing and lead-glass filling change the internal crystalline matrix of the gemstone and strip away its natural energies.', false],
            ['How do I wear my gemstone?', 'Astrological gemstones must be set in specific metals and worn on a particular finger. Before wearing, they must be purified in raw cow milk and gangajal and energized by reciting the planet Beej Mantra.', false],
        ];
        foreach ($faqs as $i => [$q, $a, $expanded]) {
            Faq::updateOrCreate(['question' => $q], [
                'answer' => $a, 'page' => 'home', 'is_expanded' => $expanded, 'sort_order' => $i, 'is_active' => true,
            ]);
        }
    }

    protected function seedAstro(): void
    {
        $signs = [
            ['Aries (Mesh)', 'Mars', '♈', 'Ruby'],
            ['Taurus (Vrishabha)', 'Venus', '♉', 'Opal'],
            ['Gemini (Mithun)', 'Mercury', '♊', 'Emerald'],
            ['Cancer (Kark)', 'Moon', '♋', 'Pearl'],
            ['Leo (Simha)', 'Sun', '♌', 'Ruby'],
            ['Virgo (Kanya)', 'Mercury', '♍', 'Emerald'],
            ['Libra (Tula)', 'Venus', '♎', 'Opal'],
            ['Scorpio (Vrishchik)', 'Mars', '♏', 'Ruby'],
            ['Sagittarius (Dhanu)', 'Jupiter', '♐', 'Yellow Sapphire'],
            ['Capricorn (Makar)', 'Saturn', '♑', 'Blue Sapphire'],
            ['Aquarius (Kumbha)', 'Saturn', '♒', 'Blue Sapphire'],
            ['Pisces (Meen)', 'Jupiter', '♓', 'Yellow Sapphire'],
        ];
        foreach ($signs as $i => [$name, $lord, $symbol, $gem]) {
            AstroZodiacSign::updateOrCreate(['name' => $name], [
                'lord' => $lord, 'symbol' => $symbol, 'recommended_gem_category' => $gem, 'sort_order' => $i, 'is_active' => true,
            ]);
        }

        $goals = [
            ['career', 'Career & Business Success', 'bi-briefcase-fill'],
            ['wealth', 'Wealth & Financial Growth', 'bi-cash-coin'],
            ['health', 'Health, Protection & Peace', 'bi-shield-heart-fill'],
            ['relationship', 'Marriage & Relationship Bliss', 'bi-heart-fill'],
        ];
        foreach ($goals as $i => [$slug, $title, $icon]) {
            AstroGoal::updateOrCreate(['slug' => $slug], [
                'title' => $title, 'icon' => $icon, 'sort_order' => $i, 'is_active' => true,
            ]);
        }
    }

    protected function seedFilters(): void
    {
        $cats = [
            ['Ruby', 'Ruby (Manik)'], ['Emerald', 'Emerald (Panna)'],
            ['Yellow Sapphire', 'Yellow Sapphire (Pukhraj)'], ['Blue Sapphire', 'Blue Sapphire (Neelam)'],
            ['Pearl', 'Basra Pearl (Moti)'], ['Opal', 'Opal (Fire Opal)'],
        ];
        foreach ($cats as $i => [$value, $label]) {
            FilterOption::updateOrCreate(['type' => 'category', 'value' => $value], [
                'label' => $label, 'sort_order' => $i, 'is_active' => true,
            ]);
        }
        foreach (['Oval', 'Octagon', 'Cushion', 'Round'] as $i => $shape) {
            FilterOption::updateOrCreate(['type' => 'shape', 'value' => $shape], [
                'label' => $shape, 'sort_order' => $i, 'is_active' => true,
            ]);
        }

        $origins = ['Burma (Myanmar)', 'Zambia', 'Ceylon (Sri Lanka)', 'Basra (Persian Gulf)', 'Coober Pedy, Australia'];
        foreach ($origins as $i => $origin) {
            FilterOption::updateOrCreate(['type' => 'origin', 'value' => $origin], [
                'label' => $origin, 'sort_order' => $i, 'is_active' => true,
            ]);
        }

        $colors = ['Pigeon Blood Red', 'Vibrant Green', 'Royal Blue', 'Golden Yellow', 'Silvery White', 'White with Rainbow Fire'];
        foreach ($colors as $i => $color) {
            FilterOption::updateOrCreate(['type' => 'color', 'value' => $color], [
                'label' => $color, 'sort_order' => $i, 'is_active' => true,
            ]);
        }
    }

    protected function seedCategories(): void
    {
        $data = [
            ['Ruby', 'ruby', 'images/gems/ruby.png', 'Surya (Sun)', 'Promotes Leadership, Administrative power, Focus and Authority.', 'Ruby (Manik)'],
            ['Emerald', 'emerald', 'images/gems/emerald.png', 'Budh (Mercury)', 'Improves Intellect, Memory, Communication, and Business growth.', 'Emerald (Panna)'],
            ['Yellow Sapphire', 'yellow-sapphire', 'images/gems/yellow_sapphire.png', 'Guru (Jupiter)', 'Brings Wisdom, Wealth, Academic success, and Marital harmony.', 'Pukhraj (Yellow Sapphire)'],
            ['Blue Sapphire', 'blue-sapphire', 'images/gems/blue_sapphire.png', 'Shani (Saturn)', 'Instant astrological response for career success, protection, and relief.', 'Neelam (Blue Sapphire)'],
            ['Pearl', 'pearl', 'images/gems/pearl.png', 'Chandra (Moon)', 'Brings mental stability, peace, emotional balance and checks anger.', 'Pearl (Moti)'],
            ['Opal', 'opal', 'images/gems/opal.png', 'Shukra (Venus)', 'Brings luxurious lifestyle, artistic talent, beauty and martial joy.', 'Opal (Fire Opal)'],
        ];
        foreach ($data as $i => [$name, $slug, $img, $badge, $desc, $display]) {
            Category::updateOrCreate(['slug' => $slug], [
                'name' => $display,
                'description' => $desc,
                'home_image' => $img,
                'planet_badge' => $badge,
                'home_description' => $desc,
                'show_on_home' => true,
                'is_active' => true,
                'sort_order' => $i,
            ]);
        }
    }

    protected function seedGemstones(): void
    {
        $gems = [
            ['Natural Burma Ruby (Manik)', 'natural-burma-ruby-manik-5-25', 'Ruby', 45000, 5.25, 4.77, 'Oval', 'Pigeon Blood Red', 'Burma (Myanmar)', 'images/gems/ruby.png', true],
            ['Natural Zambian Emerald (Panna)', 'natural-zambian-emerald-panna-6-50', 'Emerald', 32000, 6.50, 5.91, 'Octagon', 'Vibrant Green', 'Zambia', 'images/gems/emerald.png', true],
            ['Natural Ceylon Blue Sapphire (Neelam)', 'natural-ceylon-blue-sapphire-neelam-4-80', 'Blue Sapphire', 75000, 4.80, 4.36, 'Oval', 'Royal Blue', 'Ceylon (Sri Lanka)', 'images/gems/blue_sapphire.png', true],
            ['Premium Ceylon Yellow Sapphire (Pukhraj)', 'premium-ceylon-yellow-sapphire-pukhraj-7-15', 'Yellow Sapphire', 58000, 7.15, 6.50, 'Cushion', 'Golden Yellow', 'Ceylon (Sri Lanka)', 'images/gems/yellow_sapphire.png', true],
            ['Natural Basra Pearl (Moti)', 'natural-basra-pearl-moti-8-20', 'Pearl', 18000, 8.20, 7.45, 'Round', 'Silvery White', 'Basra (Persian Gulf)', 'images/gems/pearl.png', false],
            ['Natural Australian Fire Opal', 'natural-australian-fire-opal-5-50', 'Opal', 12000, 5.50, 5.00, 'Oval Cabochon', 'White with Rainbow Fire', 'Coober Pedy, Australia', 'images/gems/opal.png', false],
        ];

        foreach ($gems as $g) {
            [$name, $slug, $category, $price, $ratti, $carat, $shape, $color, $origin, $image, $featured] = $g;
            $cat = Category::where('slug', Str::slug($category))->orWhere('name', 'like', "%{$category}%")->first();

            Gemstone::updateOrCreate(['slug' => $slug], [
                'name' => $name,
                'category' => $category,
                'category_id' => $cat?->id,
                'price' => $price,
                'weight_ratti' => $ratti,
                'weight_carat' => $carat,
                'shape' => $shape,
                'color' => $color,
                'origin' => $origin,
                'image_path' => $image,
                'treatment' => 'Unheated & Untreated',
                'certification' => 'GIA Certified',
                'certificate_no' => 'CERT-'.strtoupper(Str::random(8)),
                'description' => "Premium certified {$category} from {$origin}.",
                'astrological_benefits' => "Astrological benefits of natural {$category}.",
                'is_featured' => $featured,
                'is_best_seller' => $featured,
                'stock' => 5,
                'availability_status' => 'in_stock',
                'stone_type' => $category,
            ]);
        }
    }

    protected function seedNavigation(): void
    {
        HeaderNavLink::query()->delete();
        foreach ([
            ['Browse All Gems', '/shop', 1],
            ['Free Gem Recommendation', '/#astro-finder', 2],
            ['FAQs & Guide', '/#faq-section', 3],
        ] as [$title, $url, $order]) {
            HeaderNavLink::create(['title' => $title, 'url' => $url, 'sort_order' => $order, 'is_active' => true]);
        }

        NavigationMenuColumn::query()->delete();

        $columns = [
            ['By Type', 'col-lg-2 col-md-4 col-sm-6 mega-col', [
                ['Rings', '/shop?search=Rings'], ['Pendants', '/shop?search=Pendants'], ['Bracelets', '/shop?search=Bracelets'],
                ['Brooches', '/shop?search=Brooches'], ['Necklaces', '/shop?search=Necklaces'], ['Earrings', '/shop?search=Earrings'],
                ['Engagement Rings', '/shop?search=Engagement+Rings'],
            ]],
            ['By Metal', 'col-lg-2 col-md-4 col-sm-6 mega-col', [
                ['Silver Jewellery', '/shop?search=Silver+Jewellery'], ['Gold Jewellery', '/shop?search=Gold+Jewellery'],
                ['Panchdhatu Jewellery', '/shop?search=Panchdhatu+Jewellery'],
            ]],
            ['Popular Vedic Gems', 'col-lg-2 col-md-4 col-sm-6 mega-col', [
                ['Ruby Rings', '/shop?category=Ruby'], ['Emerald Rings', '/shop?category=Emerald'],
                ['Blue Sapphire Jewelry', '/shop?category=Blue+Sapphire'], ['Yellow Sapphire Jewelry', '/shop?category=Yellow+Sapphire'],
            ]],
            ['By Gemstones', 'col-lg-4 col-md-8 col-12 mega-col mega-col-last', [
                ['Ruby Pendants', '/shop?search=Ruby+Pendants'], ['Emerald Jewelry', '/shop?category=Emerald'],
                ['Opal Pendants', '/shop?category=Opal'], ['View All', '/shop'],
            ]],
        ];

        foreach ($columns as $i => [$title, $class, $items]) {
            $col = NavigationMenuColumn::create([
                'location' => 'header_mega', 'title' => $title, 'column_class' => $class,
                'sort_order' => $i, 'is_active' => true,
            ]);
            foreach ($items as $j => [$itemTitle, $url]) {
                NavigationMenuItem::create([
                    'navigation_menu_column_id' => $col->id,
                    'title' => $itemTitle, 'url' => $url, 'sort_order' => $j, 'is_active' => true,
                ]);
            }
        }
    }

    protected function seedFooter(): void
    {
        $brand = FooterSection::updateOrCreate(['key' => 'brand'], [
            'title' => 'RR GEMS & JEWELS', 'sort_order' => 0,
        ]);
        $shop = FooterSection::updateOrCreate(['key' => 'shop_gemstones'], [
            'title' => 'Shop Gemstones', 'sort_order' => 1,
        ]);
        FooterLink::where('footer_section_id', $shop->id)->delete();
        foreach ([
            ['Ruby (Manik)', '/gemstones/ruby'], ['Emerald (Panna)', '/gemstones/emerald'],
            ['Pukhraj (Yellow Sapphire)', '/gemstones/yellow-sapphire'], ['Neelam (Blue Sapphire)', '/gemstones/blue-sapphire'],
            ['Opal & Pearl', '/gemstones/opal'],
        ] as $i => [$title, $url]) {
            FooterLink::create(['footer_section_id' => $shop->id, 'title' => $title, 'url' => $url, 'sort_order' => $i]);
        }

        FooterSection::updateOrCreate(['key' => 'astro_wearing'], [
            'title' => 'Astrological Wearing',
            'content' => '<ul class="list-unstyled text-white-50 small"><li class="mb-2"><i class="bi bi-caret-right-fill text-warning me-1"></i> <strong>Ruby</strong> for Sun (Sun Planet, Sun Strength)</li><li class="mb-2"><i class="bi bi-caret-right-fill text-warning me-1"></i> <strong>Emerald</strong> for Mercury (Intelligence & Commerce)</li><li class="mb-2"><i class="bi bi-caret-right-fill text-warning me-1"></i> <strong>Pukhraj</strong> for Jupiter (Wisdom & Progeny)</li><li class="mb-2"><i class="bi bi-caret-right-fill text-warning me-1"></i> <strong>Neelam</strong> for Saturn (Instant Wealth & Relief)</li></ul>',
            'sort_order' => 2,
        ]);

        FooterSection::updateOrCreate(['key' => 'contact'], [
            'title' => 'Visit Store', 'sort_order' => 3,
        ]);

        foreach ([
            ['facebook', '#', 'bi-facebook'], ['instagram', '#', 'bi-instagram'], ['youtube', '#', 'bi-youtube'],
        ] as $i => [$platform, $url, $icon]) {
            SocialLink::updateOrCreate(['platform' => $platform], [
                'url' => $url, 'icon' => $icon, 'sort_order' => $i, 'is_active' => true,
            ]);
        }
    }
}
