<?php

namespace App\Services\Payment;

use App\Enums\PaymentMethod;
use App\Models\Order;
use App\Services\Payment\Gateways\CodGateway;
use App\Services\Payment\Gateways\PayPalGateway;
use App\Services\Payment\Gateways\RazorpayGateway;
use App\Services\Payment\Gateways\StripeGateway;
use App\Services\Payment\Gateways\UpiGateway;

class PaymentGatewayManager
{
    public function gateway(PaymentMethod $method): PaymentGatewayInterface
    {
        return match ($method) {
            PaymentMethod::Razorpay => app(RazorpayGateway::class),
            PaymentMethod::Stripe => app(StripeGateway::class),
            PaymentMethod::PayPal => app(PayPalGateway::class),
            PaymentMethod::Cod => app(CodGateway::class),
            PaymentMethod::Upi => app(UpiGateway::class),
        };
    }

    public function process(Order $order, PaymentMethod $method): array
    {
        return $this->gateway($method)->charge($order);
    }
}
