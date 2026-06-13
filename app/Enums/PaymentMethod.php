<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case Razorpay = 'razorpay';
    case Stripe = 'stripe';
    case PayPal = 'paypal';
    case Cod = 'cod';
    case Upi = 'upi';

    public function label(): string
    {
        return match ($this) {
            self::Razorpay => 'Razorpay',
            self::Stripe => 'Stripe',
            self::PayPal => 'PayPal',
            self::Cod => 'Cash on Delivery',
            self::Upi => 'UPI',
        };
    }
}
