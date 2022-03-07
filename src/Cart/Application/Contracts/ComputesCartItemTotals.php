<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Contracts;

use PaltaSolutions\Cart\Domain\Models\CartItem;

interface ComputesCartItemTotals
{
    public function __invoke(CartItem $cartItem, $unitTotalAmount, $quantitiy): CartItem;
}
