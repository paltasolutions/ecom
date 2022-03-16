<?php

declare(strict_types=1);

namespace PaltaSolutions\Image\Providers;

use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Events\BuildSchemaString;
use Symfony\Component\Finder\Finder;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
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

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Infrastructure/Database/Migrations');
    }
}
