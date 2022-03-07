<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Contracts;

use PaltaSolutions\Cart\Domain\Models\Cart;

interface AddsItemToCart
{
    public function __invoke(Cart $cart, array $cartItemAttributes): Cart;
}
