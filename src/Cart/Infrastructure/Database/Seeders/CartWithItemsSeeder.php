<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;

class CartWithItemsSeeder extends Seeder
{
    public function run()
    {
        Cart::factory()
            // ->has(CartItem::factory()->count(3), 'items')
            ->hasItems(3)
            ->count(3)
            ->create();
    }
}
