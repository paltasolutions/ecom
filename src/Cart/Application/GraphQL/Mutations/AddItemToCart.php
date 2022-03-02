<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Application\GraphQL\Mutations;

use Illuminate\Support\Arr;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Contracts\CartService;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AddItemToCart
{
    public function __construct(
        private CartService $cartService
    ) {}

    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $cart = Cart::findOrFail(Arr::pull($args, 'cart_id'));

        $this->cartService->addItemtoCart($cart->id, $args);

        return $cart->refresh();
    }
}
