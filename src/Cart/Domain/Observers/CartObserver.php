<?php

namespace PaltaSolutions\Cart\Domain\Observers;

use Illuminate\Support\Facades\Log;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Application\Contracts\UpdatesCartTotals;

class CartObserver
{
    public function __construct(
        private UpdatesCartTotals $updateCartTotals,
    ) {}

    /**
     * Handle the Cart "created" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function created(Cart $cart)
    {
        //
        Log::info('cart created');
    }

    public function creating(Cart $cart)
    {

        // ($this->updateCartTotals)($cart);
        Log::info('cart creating');
    }

    /**
     * Handle the Cart "updated" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function updated(Cart $cart)
    {
        Log::info('cart updated');
    }

    /**
     * Handle the Cart "deleted" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function deleted(Cart $cart)
    {
        //
    }

    /**
     * Handle the Cart "restored" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function restored(Cart $cart)
    {
        //
    }

    /**
     * Handle the Cart "force deleted" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function forceDeleted(Cart $cart)
    {
        //
    }
}
