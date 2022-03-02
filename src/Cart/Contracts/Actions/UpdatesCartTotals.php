<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Contracts\Actions;

use PaltaSolutions\Cart\Domain\Models\Cart;

interface UpdatesCartTotals
{
    public function __invoke(Cart $cart): Cart;
}
