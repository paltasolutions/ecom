<?php

use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;

use function PHPUnit\Framework\assertCount;

uses(Tests\TestCase::class);

$mutationQuery = <<<'GQL'
mutation($cart_id: String!, $name: String, $unit_total_amount: Int!) {
    addItemToCart(
        input: {
            cart_id: $cart_id
            name: $name
            unit_total_amount: $unit_total_amount
        }
    ) {
        id
        email
        items {
            id
            name
            quantity
        }
    }
}
GQL;

it('can query existing cart', function () {
    $cart = Cart::factory()->create();

    $gql = <<<'GQL'
        query ($id: String!) {
            cart(id: $id) {
                id
                email
                sub_total {
                    formatted
                }
                currency {
                    code
                    symbol
                }
            }
        }
GQL;

    graphQL($gql, [
        'id' => $cart->id,
    ])
    ->assertJson([
        'data' => [
            'cart' => [
                'id' => $cart->id,
                'email' => $cart->email,
                'currency' => [
                    'code' => 'USD'
                ]
            ]
        ]
    ]);
});

it('can add an item to cart', function() use ($mutationQuery) {
    $cart = Cart::factory()->create();
    $cartItem = CartItem::factory()->make();

    assertCount(0, $cart->items);

    graphQL($mutationQuery, [
        'cart_id' => $cart->id,
        'name' => $cartItem->name,
        'unit_total_amount' => $cartItem->unit_total_amount,
    ])
    ->assertJson([
        'data' => [
            'addItemToCart' => [
                'id' => $cart->id,
                'email' => $cart->email,
                'items' => [[
                    'name' => $cartItem->name,
                    'quantity' => 1,
                ]]
            ]
        ]
    ]);

    assertCount(1, $cart->fresh(['items'])->items);
});

it('can add same item twice to cart', function() use ($mutationQuery) {
    $cart = Cart::factory()->create();
    $cartItem = CartItem::factory()->make();
    $payload = [
        'cart_id' => $cart->id,
        'name' => $cartItem->name,
        'unit_total_amount' => $cartItem->unit_total_amount,
    ];

    // First item added
    graphQL($mutationQuery, $payload);
    // Second - same - item added
    graphQL(
        $mutationQuery,
        $payload
    )
    ->assertJson([
        'data' => [
            'addItemToCart' => [
                'id' => $cart->id,
                'email' => $cart->email,
                'items' => [[
                    'name' => $cartItem->name,
                    'quantity' => 2,
                ]]
            ]
        ]
    ]);
    // Should still be 1 uniqe item
    assertCount(1, $cart->fresh(['items'])->items);
});
