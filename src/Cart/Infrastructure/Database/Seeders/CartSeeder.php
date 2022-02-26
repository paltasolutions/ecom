<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use PaltaSolutions\Cart\Domain\Models\Cart;

class CartSeeder extends Seeder
{
    public function run()
    {
        Cart::factory()
            ->count(3)
            ->create();
    }
}
