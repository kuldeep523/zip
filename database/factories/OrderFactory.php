<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Order> */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 500, 50000);

        return [
            'order_number' => Order::generateOrderNumber(),
            'user_id' => User::factory(),
            'status' => OrderStatus::Pending,
            'subtotal' => $subtotal,
            'tax_amount' => round($subtotal * 0.18, 2),
            'discount_amount' => 0,
            'shipping_amount' => 99,
            'total' => $subtotal + 99,
            'currency' => 'INR',
        ];
    }
}
