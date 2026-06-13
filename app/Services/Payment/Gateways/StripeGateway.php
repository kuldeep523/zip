<?php

namespace App\Services\Payment\Gateways;

use App\Models\Order;
use App\Services\Payment\PaymentGatewayInterface;

class StripeGateway implements PaymentGatewayInterface
{
    public function charge(Order $order): array
    {
        return [
            'success' => true,
            'gateway' => 'stripe',
            'transaction_id' => 'pi_'.uniqid(),
            'message' => 'Configure STRIPE_KEY and STRIPE_SECRET in .env.',
        ];
    }
}
