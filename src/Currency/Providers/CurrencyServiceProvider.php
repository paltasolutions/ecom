<?php

declare(strict_types=1);

namespace PaltaSolutions\Currency\Providers;

use Symfony\Component\Finder\Finder;
use GraphQL\Type\Definition\EnumType;
use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use PaltaSolutions\Currency\Enums\Currency;
use Nuwave\Lighthouse\Events\BuildSchemaString;

class CurrencyServiceProvider extends ServiceProvider
{
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

    public function register()
    {
        app('events')->listen(
            BuildSchemaString::class,
            function () {
                $schemas = [];
                foreach ((new Finder())->files()->name('*.graphql')->in(__DIR__.'/../graphql/*') as $schema) {
                    $schemas[] = file_get_contents($schema->getRealPath());
                }
                return implode('', $schemas);
            }
        );
    }
}
