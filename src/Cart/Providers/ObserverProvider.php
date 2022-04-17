<?php

namespace PaltaSolutions\Cart\Providers;

use Illuminate\Support\ServiceProvider;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Observers\CartObserver;

class ObserverProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Cart::observe(CartObserver::class);
    }
}
