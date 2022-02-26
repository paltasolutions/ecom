<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Providers;

use Illuminate\Support\Facades\Log;
use GraphQL\Type\Definition\EnumType;
use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use PaltaSolutions\Cart\Domain\Models\Enums\CartItemType;

class CartServiceProvider extends ServiceProvider
{
    public function boot(TypeRegistry $typeRegistry)
    {
        $this->loadMigrationsFrom(__DIR__.'/../Infrastructure/Database/Migrations');

        $cartItemValues = [];
        foreach(CartItemType::cases() as $cartItem) {
            $cartItemValues[$cartItem->toUpperCase()] = [
                'value' => $cartItem->value,
                'description' => '',
            ];
        }
        $cartItem = new EnumType([
            'name' => 'CartItemType',
            'description' => '',
            'values' => $cartItemValues,
        ]);
        $typeRegistry->register($cartItem);
    }

    public function register()
    {

    }

    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        Log::debug('testerdetestconfig', $config);
    }
}
