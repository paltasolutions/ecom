<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Contracts\DataTransferObjects;

use Exception;
use PaltaSolutions\Currency\Enums\Currency;
use PaltaSolutions\Cart\Domain\Models\Enums\CartItemType;

class CartItemDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $description,
        public readonly CartItemType $type,
        public readonly int $unit_total_amount,
        public readonly int $quantity,
        public readonly Currency $currency,
    ) {}

    public static function hydrate(array $attributes): CartItemDto
    {
        return new self(
            $attributes['id'] ?: null,
            $attributes['name'] ?? throw new Exception('broo'),
            $attributes['description'] ?: null,
            $attributes['type'] ?: CartItemType::SKU,
            $attributes['unit_total_amount'] ?? throw new Exception('burf'),
            $attributes['quantity'] ?? throw new Exception('ala'),
            $attributes['currency'] ?? throw new Exception('aa')
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'unit_total_amount' => $this->unit_total_amount,
            'quantity' => $this->quantity,
            'currency' => $this->currency,
        ];
    }
}
