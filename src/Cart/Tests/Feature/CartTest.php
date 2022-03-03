<?php

namespace Tests\Feature;

use Tests\TestCase;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    // use RefreshDatabase;

    public function testQueriesCart(): void
    {
        $cart = Cart::factory()->create();

        $response = $this->graphQL(/** @lang GraphQL */'
        query ($id: String!){
            cart(id: $id) {
                id
                email
            }
        }
        ', [
            'id' => $cart->id,
        ]);

        $response->assertJson([
            'data' => [
                'cart' => [
                    'id' => $cart->id,
                    'email' => $cart->email
                ]
            ]
        ]);
    }

    public function testAddItemToCart(): void
    {
        $cart = Cart::factory()->create();
        // $cartItem = $cart->items()->make();
        $cartItem = CartItem::factory()->make();
        $this->assertCount(0, $cart->items);
        $this->graphQL(/** @lang GraphQL */'
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
        ', [
            'cart_id' => $cart->id,
            'name' => $cartItem->name,
            'unit_total_amount' => $cartItem->unit_total_amount
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
        $this->assertCount(1, $cart->fresh(['items'])->items);
    }
}
