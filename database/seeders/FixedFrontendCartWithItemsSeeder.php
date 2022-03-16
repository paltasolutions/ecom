<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use PaltaSolutions\Image\Domain\Models\Image;

class FixedFrontendCartWithItemsSeeder extends Seeder
{
    private const cartId = '0be5b974-c735-3bb3-965c-9e8ec944bb15';
    private const cartImages = [
        'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg',
        'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg',
        'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-03.jpg',
    ];

    public function run()
    {
        $images = Image::factory()
            ->count(3)
            ->sequence(fn ($sequence) => ['src' => self::cartImages[$sequence->index]])
            ->create();

        if ($cart = Cart::where('id', '=', self::cartId)->first()) {
            $cart->items()->delete(); // TODO
            $cart->delete();
        }

        Cart::factory()
            ->has(
                CartItem::factory()
                    ->count(3)
                    ->sequence(fn ($sequence) => [
                        'sequence' => ($sequence->index + 1),
                        'image_id' => $images->get($sequence->index)->id
                    ]),
                'items'
            )
            ->create(['id' => self::cartId]);
    }
}
