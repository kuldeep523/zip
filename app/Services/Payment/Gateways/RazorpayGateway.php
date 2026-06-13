<?php

namespace App\Services\Payment\Gateways;

use App\Models\Order;
use App\Services\Payment\PaymentGatewayInterface;

class RazorpayGateway implements PaymentGatewayInterface
{
    public function charge(Order $order): array
    {
        return [
            'success' => true,
            'gateway' => 'razorpay',
            'transaction_id' => 'rzp_'.uniqid(),
            'redirect_url' => null,
            'message' => 'Configure RAZORPAY_KEY and RAZORPAY_SECRET in .env for live payments.',
        ];
    }
}
