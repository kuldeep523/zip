<?php

namespace App\Enums;

enum CouponType: string
{
    case Percentage = 'percentage';
    case Fixed = 'fixed';
    case Product = 'product';
    case Category = 'category';
    case Bogo = 'bogo';

    public function label(): string
    {
        return match ($this) {
            self::Percentage => 'Percentage Discount',
            self::Fixed => 'Fixed Discount',
            self::Product => 'Product Wise',
            self::Category => 'Category Wise',
            self::Bogo => 'BOGO Offer',
        };
    }
}
