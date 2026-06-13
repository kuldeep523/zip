<?php

namespace App\View\Composers;

use App\Models\GlobalSeoSetting;
use App\Services\Storefront\StorefrontContentService;
use Illuminate\View\View;

class GemThemeComposer
{
    public function compose(View $view): void
    {
        $layout = StorefrontContentService::layoutData();
        $seo = GlobalSeoSetting::first();

        $view->with(array_merge($layout, [
            'siteSeo' => $seo,
            'announcementText' => StorefrontContentService::setting('announcement_text', '100% Gov. Approved Lab Certified Gemstones'),
            'phone' => StorefrontContentService::setting('phone', '+91 98765 43210'),
            'phoneTel' => StorefrontContentService::setting('phone_tel', '+919876543210'),
            'whatsapp' => StorefrontContentService::setting('whatsapp', '919876543210'),
            'whatsappMessage' => StorefrontContentService::setting('whatsapp_message', 'Hi! I am looking for a certified gemstone. Please guide me.'),
            'siteName' => StorefrontContentService::setting('site_name', 'RR GEMS'),
            'siteTagline' => StorefrontContentService::setting('site_tagline', 'Udaipur • Astro Gems'),
            'email' => StorefrontContentService::setting('email', 'info@rrgemsudaipur.com'),
            'address' => StorefrontContentService::setting('address', '102, Palace Road, opposite City Palace, Udaipur, Rajasthan - 313001'),
            'footerBrandTitle' => StorefrontContentService::setting('footer_brand_title', 'RR GEMS & JEWELS'),
            'footerBrandText' => StorefrontContentService::setting('footer_brand_text', 'Established in Udaipur, RR Gems & Jewels is dedicated to providing 100% natural, unheated, and untreated astrological gemstones.'),
            'page_title_suffix' => StorefrontContentService::setting('page_title_suffix', 'RR Gems Udaipur | Astro Gemstones & Fine Jewelry'),
            'navShippingText' => StorefrontContentService::setting('nav_shipping_text', 'Free Shipping India'),
            'navSecureText' => StorefrontContentService::setting('nav_secure_text', 'Secure Payment'),
        ]));
    }
}
