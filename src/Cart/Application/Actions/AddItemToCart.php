<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\Actions;

use Illuminate\Support\Arr;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Contracts\Actions\AddsItemToCart;

class AddItemToCart implements AddsItemToCart
{
    public function __invoke(Cart $cart, array $cartItemAttributes): Cart
    {
        $id = Arr::pull($cartItemAttributes, 'id');

        if ($cart->is_empty) {
            $cartItem = $cart->items()->make($cartItemAttributes);
            $cartItem->line_total_amount = $cartItem->unit_total_amount * $cartItem->quantity;
            $cartItem->save();

            return $cart;
        }

        /** @var CartItem $cartItem */
        $cartItem = $cart->items()
            ->where('id', $id)
            ->orWhere('name', $cartItemAttributes['name'])
            ->first();

        if (!$cartItem) {
            /** @var CartItem $cartItem */
            $cartItem = $cart->items()->make($cartItemAttributes);
            $cartItem->line_total_amount = $cartItem->unit_total_amount * $cartItem->quantity;
            $cartItem->save();

            return $cart;
        }

        $cartItem->quantity += $cartItemAttributes['quantity'];
        $cartItem->line_total_amount += $cartItemAttributes['unit_total_amount'];
        $cartItem->save();

        return $cart;
    }
}
