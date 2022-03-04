<?php

use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;

use function PHPUnit\Framework\assertCount;

uses(Tests\TestCase::class);

it('can query existing cart', function () {
    $cart = Cart::factory()->create();

    $gql = <<<'GQL'
        query ($id: String!) {
            cart(id: $id) {
                id
                email
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
                'email' => $cart->email
            ]
        ]
    ]);
});

it('can add an item to cart', function(){
    $cart = Cart::factory()->create();
    $cartItem = CartItem::factory()->make();

    assertCount(0, $cart->items);

    $query = <<<'GQL'
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

    graphQL($query, [
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
