<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Actions;

use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use PaltaSolutions\Cart\Application\Contracts\AddsSequenceToCartItem;

class AddSequenceToCartItem implements AddsSequenceToCartItem
{
    public function __invoke(Cart $cart, CartItem $cartItem): CartItem
    {
        $cartItem->sequence = $cart->items()->count() + 1;

        return $cartItem;
    }
}
