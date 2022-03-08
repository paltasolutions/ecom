<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Contracts;

use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;

interface AddsSequenceToCartItem
{
    public function __invoke(Cart $cart, CartItem $cartItem): CartItem;
}
