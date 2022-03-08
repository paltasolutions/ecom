<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Actions;

use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Contracts\Enums\CartItemType;
use PaltaSolutions\Cart\Application\Contracts\UpdatesCartShippingTotal;

class UpdateCartShippingTotal implements UpdatesCartShippingTotal
{
    public function __invoke(Cart $cart): Cart
    {
        $items = $cart->items()
            ->where('type', CartItemType::SHIPPING)
            ->get();

        $cart->shipping_total_amount = $items->sum('line_total');

        return $cart;
    }
}
