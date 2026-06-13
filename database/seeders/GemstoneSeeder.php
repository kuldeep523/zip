<?php

namespace Database\Seeders;

use App\Models\Gemstone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GemstoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gemstones = [
            [
                'name' => 'Natural Burma Ruby (Manik)',
                'slug' => 'natural-burma-ruby-manik-5-25',
                'category' => 'Ruby',
                'price' => 45000.00,
                'weight_ratti' => 5.25,
                'weight_carat' => 4.77,
                'shape' => 'Oval',
                'color' => 'Pigeon Blood Red',
                'origin' => 'Burma (Myanmar)',
                'treatment' => 'Unheated & Untreated',
                'certification' => 'GIA Certified',
                'certificate_no' => 'GIA-5849204',
                'image_path' => 'images/gems/ruby.png',
                'description' => 'A gorgeous deep red natural Burma Ruby. Known for its intense color saturation and outstanding clarity. Highly auspicious for Astrological purposes to strengthen the Sun\'s blessings.',
                'astrological_benefits' => 'The Ruby represents the Sun (Surya). Wearing this gemstone brings power, leadership, administrative success, courage, and improves blood circulation. Highly recommended for Leo rashi.',
                'is_featured' => true,
                'stock' => 1,
            ],
            [
                'name' => 'Natural Zambian Emerald (Panna)',
                'slug' => 'natural-zambian-emerald-panna-6-50',
                'category' => 'Emerald',
                'price' => 32000.00,
                'weight_ratti' => 6.50,
                'weight_carat' => 5.91,
                'shape' => 'Octagon',
                'color' => 'Vibrant Green',
                'origin' => 'Zambia',
                'treatment' => 'Insignificant Oil',
                'certification' => 'IGITL Certified',
                'certificate_no' => 'IGI-9382103',
                'image_path' => 'images/gems/emerald.png',
                'description' => 'This Zambian Emerald shows high transparency and a rich green color. Emeralds are famous for promoting sharp intellect and business communication.',
                'astrological_benefits' => 'Emerald represents Mercury (Budh). It improves intellect, memory, communication skills, business trade, and brings mental peace. Recommended for Gemini and Virgo rashi.',
                'is_featured' => true,
                'stock' => 3,
            ],
            [
                'name' => 'Natural Ceylon Blue Sapphire (Neelam)',
                'slug' => 'natural-ceylon-blue-sapphire-neelam-4-80',
                'category' => 'Blue Sapphire',
                'price' => 75000.00,
                'weight_ratti' => 4.80,
                'weight_carat' => 4.36,
                'shape' => 'Oval',
                'color' => 'Royal Blue',
                'origin' => 'Ceylon (Sri Lanka)',
                'treatment' => 'Unheated & Untreated',
                'certification' => 'GRS Certified',
                'certificate_no' => 'GRS-2026-948',
                'image_path' => 'images/gems/blue_sapphire.png',
                'description' => 'A top-tier Sri Lankan Neelam, free from heat treatments. It boasts excellent transparency and a royal blue hue, emitting powerful astrological vibrations.',
                'astrological_benefits' => 'Blue Sapphire represents Saturn (Shani). It is one of the fastest acting gemstones, bringing instant wealth, resolution of court cases, recovery from depression, and career growth. Recommended for Capricorn and Aquarius rashi.',
                'is_featured' => true,
                'stock' => 1,
            ],
            [
                'name' => 'Premium Ceylon Yellow Sapphire (Pukhraj)',
                'slug' => 'premium-ceylon-yellow-sapphire-pukhraj-7-15',
                'category' => 'Yellow Sapphire',
                'price' => 58000.00,
                'weight_ratti' => 7.15,
                'weight_carat' => 6.50,
                'shape' => 'Cushion',
                'color' => 'Golden Yellow',
                'origin' => 'Ceylon (Sri Lanka)',
                'treatment' => 'Unheated & Untreated',
                'certification' => 'GIA Certified',
                'certificate_no' => 'GIA-2948102',
                'image_path' => 'images/gems/yellow_sapphire.png',
                'description' => 'Highly transparent, sparkling Golden Yellow Sapphire. This is a very clean stone with no eye-visible inclusions. Perfect for career growth and marital harmony.',
                'astrological_benefits' => 'Yellow Sapphire represents Jupiter (Guru). It brings wisdom, wealth, spiritual growth, happy marriage, and progeny. Highly recommended for Sagittarius and Pisces rashi.',
                'is_featured' => true,
                'stock' => 2,
            ],
            [
                'name' => 'Natural Basra Pearl (Moti)',
                'slug' => 'natural-basra-pearl-moti-8-20',
                'category' => 'Pearl',
                'price' => 18000.00,
                'weight_ratti' => 8.20,
                'weight_carat' => 7.45,
                'shape' => 'Round',
                'color' => 'Silvery White',
                'origin' => 'Basra (Persian Gulf)',
                'treatment' => 'Natural Untreated',
                'certification' => 'Government Lab Certified',
                'certificate_no' => 'GLC-84729',
                'image_path' => 'images/gems/pearl.png',
                'description' => 'An authentic, highly lustrous Basra pearl. Cultivated naturally, this pearl possesses a rich pearlescent shine that brings emotional balance and peace of mind.',
                'astrological_benefits' => 'Pearl represents the Moon (Chandra). It controls emotions, anger issues, increases focus, improves skin condition, and brings peace. Recommended for Cancer rashi.',
                'is_featured' => false,
                'stock' => 5,
            ],
            [
                'name' => 'Natural Australian Fire Opal',
                'slug' => 'natural-australian-fire-opal-5-50',
                'category' => 'Opal',
                'price' => 12000.00,
                'weight_ratti' => 5.50,
                'weight_carat' => 5.00,
                'shape' => 'Oval Cabochon',
                'color' => 'White with Rainbow Fire',
                'origin' => 'Coober Pedy, Australia',
                'treatment' => 'Natural Untreated',
                'certification' => 'IGITL Certified',
                'certificate_no' => 'IGI-472910',
                'image_path' => 'images/gems/opal.png',
                'description' => 'This premium Australian Opal displays strong play of color (fire) across its entire surface with red, green, and blue flashes. Ideal for luxury and creative fields.',
                'astrological_benefits' => 'Opal represents Venus (Shukra). It brings luxury, artistic talent, love, marital bliss, beauty, and increases popularity. Recommended for Taurus and Libra rashi.',
                'is_featured' => false,
                'stock' => 4,
            ]
        ];

        foreach ($gemstones as $gemstone) {
            Gemstone::updateOrCreate(['slug' => $gemstone['slug']], $gemstone);
        }
    }
}
