<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use PaltaSolutions\Cart\Contracts\Enums\CartItemType;
use PaltaSolutions\Currency\Enums\Currency;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    public function definition(): array
    {
        $amount = $this->faker->randomNumber(3);
        $amount *= 10;

        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'currency_code' => Currency::USD,
            'type' => CartItemType::SKU,
            'description' => null,
            'unit_total_amount' => $amount,
            'line_total_amount' => $amount,
            'quantity' => 1,
        ];
    }
}
