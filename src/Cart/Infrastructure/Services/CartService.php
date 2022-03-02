<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Infrastructure\Services;

use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Contracts\Actions\AddsItemToCart;
use PaltaSolutions\Cart\Contracts\Actions\UpdatesCartShippingTotal;
use PaltaSolutions\Cart\Contracts\Actions\UpdatesCartTotals;
use PaltaSolutions\Cart\Contracts\DataTransferObjects\CartDto;
use PaltaSolutions\Cart\Contracts\CartService as CartServiceContract;

class CartService implements CartServiceContract
{
    public function __construct(
        private AddsItemToCart $addItemToCart,
        private UpdatesCartTotals $updateCartTotals,
        private UpdatesCartShippingTotal $updateCartShippingTotal
    ) {}

    public function addItemtoCart(string $cartId, array $args): CartDto
    {
        $cart = Cart::findOrFail($cartId);

        ($this->addItemToCart)($cart, $args);
        ($this->updateCartTotals)($cart);
        ($this->updateCartShippingTotal)($cart);

        $cart->save();

        return new CartDto(
            $cart->id,
            $cart->email,
            $cart->description
        );
    }
}
