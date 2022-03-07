<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Actions;

use PaltaSolutions\Cart\Domain\Models\CartItem;
use PaltaSolutions\Cart\Application\Contracts\ComputesCartItemTotals;

class ComputeCartItemTotals implements ComputesCartItemTotals
{
    public function __invoke(CartItem $cartItem, $unitTotalAmount, $quantitiy): CartItem
    {
        $cartItem->line_total_amount += $unitTotalAmount * $quantitiy;
        $cartItem->quantity += $quantitiy;

        return $cartItem;
    }
}
