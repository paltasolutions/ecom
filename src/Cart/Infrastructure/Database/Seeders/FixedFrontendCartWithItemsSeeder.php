<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;

class FixedFrontendCartWithItemsSeeder extends Seeder
{
    public function run()
    {
        $id = '0be5b974-c735-3bb3-965c-9e8ec944bb15';

        if ($cart = Cart::where('id', '=', $id)->first()) {
            $cart->items()->delete(); // TODO
            $cart->delete();
        }

        Cart::factory()
            ->has(
                CartItem::factory()
                    ->count(3)
                    ->sequence(fn ($sequence) => ['sequence' => ($sequence->index % 1) + 1]),
                'items'
            )
            ->create(['id' => $id]);
    }
}
