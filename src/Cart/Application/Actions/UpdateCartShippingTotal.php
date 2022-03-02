<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Actions;

use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use PaltaSolutions\Cart\Domain\Models\Enums\CartItemType;
use PaltaSolutions\Cart\Contracts\Actions\UpdatesCartShippingTotal;

class UpdateCartShippingTotal implements UpdatesCartShippingTotal
{
    public function __invoke(Cart $cart): Cart
    {
        $items = $cart->items()
            ->where('type', CartItemType::SHIPPING)
            ->get();

        $cart->shipping_total_amount = $items
            ->reduce(fn ($carry, CartItem $item) => $carry + $item->line_total, 0);


        return $cart;
    }
}
