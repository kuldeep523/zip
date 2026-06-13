<?php

namespace App\Enums;

enum BannerType: string
{
    case Homepage = 'homepage';
    case Offer = 'offer';
    case Popup = 'popup';
    case Category = 'category';

    public function label(): string
    {
        return match ($this) {
            self::Homepage => 'Homepage Banner',
            self::Offer => 'Offer Banner',
            self::Popup => 'Popup Banner',
            self::Category => 'Category Banner',
        };
    }
}
