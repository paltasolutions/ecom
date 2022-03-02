<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Actions;

use PaltaSolutions\Cart\Contracts\Actions\UpdatesCartTotals;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use PaltaSolutions\Cart\Domain\Models\Enums\CartItemType;

class UpdateCartTotals implements UpdatesCartTotals
{
    public function __invoke(Cart $cart): Cart
    {
        $items = $cart->items()
            ->where('type', CartItemType::SKU)
            ->get();

        $cart->total_unique_items = $items->count();
        $cart->is_empty = $cart->total_unique_items === 0;

        $cart->total_items = $items
            ->reduce(fn ($carry, CartItem $item) => $carry + $item->quantity, 0);

        $cart->sub_total_amount = $items
            ->reduce(
                fn($carry, CartItem $item)
                    => $carry + $item->line_total_amount,
                0
            );

        return $cart;
    }
}
