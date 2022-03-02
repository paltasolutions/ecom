<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Contracts;

use PaltaSolutions\Cart\Contracts\DataTransferObjects\CartDto;

interface CartService
{
    public function addItemtoCart(string $cartId, array $args): CartDto;
}
