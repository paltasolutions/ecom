<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Actions;

use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Contracts\Enums\CartItemType;
use PaltaSolutions\Cart\Application\Contracts\UpdatesCartTotals;

class UpdateCartTotals implements UpdatesCartTotals
{
    public function __invoke(Cart $cart): Cart
    {
        $items = $cart->items()
            ->where('type', CartItemType::SKU)
            ->get();

        $cart->total_unique_items = $items->count();
        $cart->is_empty = $cart->total_unique_items === 0;
        $cart->total_items = $items->sum('quantity');
        $cart->sub_total_amount = $items->sum('line_total_amount');

        return $cart;
    }
}
