<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Infrastructure\Services;

use Illuminate\Support\Arr;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use PaltaSolutions\Cart\Application\Contracts\ComputesCartItemTotals;
use PaltaSolutions\Cart\Contracts\DataTransferObjects\CartDto;
use PaltaSolutions\Cart\Application\Contracts\UpdatesCartTotals;
use PaltaSolutions\Cart\Contracts\CartService as CartServiceContract;
use PaltaSolutions\Cart\Application\Contracts\UpdatesCartShippingTotal;

class CartService implements CartServiceContract
{
    public function __construct(
        private ComputesCartItemTotals $computesCartItemTotals,
        private UpdatesCartTotals $updateCartTotals,
        private UpdatesCartShippingTotal $updateCartShippingTotal
    ) {}

    public function addItemtoCart(string $cartId, array $args): CartDto
    {
        $cart = Cart::findOrFail($cartId);
        $unitTotalAmount = Arr::pull($args, 'unit_total_amount');
        $quantity = Arr::pull($args, 'quantity');

        $cartItem = ($this->computesCartItemTotals)(
            $this->upsertCartItem($cart, $args),
            $unitTotalAmount,
            $quantity
        );
        $cartItem->save();

        ($this->updateCartTotals)($cart);
        ($this->updateCartShippingTotal)($cart);

        $cart->save();

        // TODO Might change this to CartItemDto
        return new CartDto(
            $cart->id,
            $cart->email,
            $cart->description
        );
    }

    private function upsertCartItem(Cart $cart, array $attributes): CartItem
    {
        $id = Arr::pull($attributes, 'id');

        if ($cart->is_empty)
        {
            return $cart->items()->make($attributes);
        }

        $cartItem = $cart->items()
            ->where('id', $id)
            ->orWhere('name', $attributes['name'])
            ->first();

        return $cartItem ?? $cart->items()->make($attributes);
    }
}
