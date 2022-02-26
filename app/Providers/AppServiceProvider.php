<?php

namespace App\Providers;

use GraphQL\Type\Definition\EnumType;
use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use PaltaSolutions\Currency\Enums\Currency;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(TypeRegistry $typeRegistry)
    {
        $currencyCodeValues = [];
        foreach(Currency::cases() as $currency) {
            $currencyCodeValues[$currency->toUpperCase()] = [
                'value' => $currency->value,
                'description' => '',
            ];
        }
        $currencyCode = new EnumType([
            'name' => 'CurrencyCode',
            'description' => '',
            'values' => $currencyCodeValues,
        ]);
        $typeRegistry->register($currencyCode);
    }
}
