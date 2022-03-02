<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Providers;

use Illuminate\Support\Facades\Log;
use Symfony\Component\Finder\Finder;
use GraphQL\Type\Definition\EnumType;
use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use Nuwave\Lighthouse\Events\BuildSchemaString;
use PaltaSolutions\Cart\Contracts\Actions\AddsItemToCart;
use PaltaSolutions\Cart\Domain\Models\Enums\CartItemType;
use PaltaSolutions\Cart\Application\Actions\AddItemToCart;
use PaltaSolutions\Cart\Application\Actions\UpdateCartShippingTotal;
use PaltaSolutions\Cart\Contracts\Actions\UpdatesCartTotals;
use PaltaSolutions\Cart\Infrastructure\Services\CartService;
use PaltaSolutions\Cart\Application\Actions\UpdateCartTotals;
use PaltaSolutions\Cart\Contracts\Actions\UpdatesCartShippingTotal;
use PaltaSolutions\Cart\Contracts\CartService as CartServiceContract;

class CartServiceProvider extends ServiceProvider
{

    public array $bindings = [
        AddsItemToCart::class => AddItemToCart::class,
        UpdatesCartTotals::class => UpdateCartTotals::class,
        UpdatesCartShippingTotal::class => UpdateCartShippingTotal::class,
        CartServiceContract::class => CartService::class
    ];

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
        app('events')->listen(
            BuildSchemaString::class,
            function () {
                $schemas = [];
                // if (file_exists(base_path('graphql/schema.graphql'))) {
                //     $stitcher = new SchemaStitcher(base_path('graphql/schema.graphql'));
                //     $schemas[] = $stitcher->getSchemaString();
                // }

                foreach ((new Finder())->files()->name('*.graphql')->in(__DIR__.'/../graphql/*') as $schema) {
                    $schemas[] = file_get_contents($schema->getRealPath());
                }

                return implode('', $schemas);
            }
        );
    }

    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        Log::debug('testerdetestconfig', $config);
    }
}
