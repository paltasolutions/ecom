<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Infrastructure\Database\Factories;

use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Currency\Enums\Currency;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use PaltaSolutions\Cart\Contracts\Enums\CartItemType;
use PaltaSolutions\Cart\Application\Actions\UpdateCartTotals;

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
            'currency' => Currency::USD,
            'type' => CartItemType::SKU,
            'description' => null,
            'unit_total_amount' => $amount,
            'line_total_amount' => $amount,
            'quantity' => 1,
            'cart_id' => Cart::factory(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (CartItem $cartItem) {
            (new UpdateCartTotals())($cartItem->cart)->save();
        });
    }
}
