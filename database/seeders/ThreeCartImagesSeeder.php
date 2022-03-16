<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PaltaSolutions\Image\Domain\Models\Image;

class ThreeCartImagesSeeder extends Seeder
{
    public function fun()
    {
        array_walk([
            'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg',
            'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg',
            'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-03.jpg',
        ], function ($src) {
            if (!Image::where('src', '=', $src)->exists()) {
                Image::factory()->create(['src' => $src]);
            }
        });
    }
}
