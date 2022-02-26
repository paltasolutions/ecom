<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Domain\Models\Enums;

enum CartItemType: string
{
    case SKU = 'sku';
    case TAX = 'tax';
    case SHIPPING = 'shipping';

    public function toUpperCase(): string
    {
        return strtoupper($this->value);
    }
}
