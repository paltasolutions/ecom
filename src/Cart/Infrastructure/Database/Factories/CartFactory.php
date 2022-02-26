<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PaltaSolutions\Cart\Domain\Models\Cart;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        return [
            'id'    => $this->faker->uuid(),
            'email' => $this->faker->unique()->safeEmail(),
            'notes' => $this->faker->realText(),
        ];
    }
}
