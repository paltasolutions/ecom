<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Contracts\DataTransferObjects;

use PaltaSolutions\Currency\Enums\Currency;
use Illuminate\Validation\ValidationException;
use PaltaSolutions\Cart\Contracts\Enums\CartItemType;

class CartItemDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $description,
        public readonly CartItemType $type,
        public readonly int $unit_total_amount,
        public readonly int $line_total_amount,
        public readonly int $quantity,
        public readonly Currency $currency,
    ) {}

    public static function hydrate(array $attributes): CartItemDto
    {
        $currency = $attributes['currency'] ?? throw ValidationException::withMessages(['currency' => 'Currency is requiredaaa.']);

        return new self(
            $attributes['id'] ?? '',
            $attributes['name'] ?? throw ValidationException::withMessages(['name' => 'Name is required.']),
            $attributes['description'] ?? '',
            // TODO fix type from string
            is_string($attributes['type']) ? CartItemType::from($attributes['type']) : CartItemType::SKU,
            $attributes['unit_total_amount'] ?? throw ValidationException::withMessages(['unit_total_amount' => 'Unit_total_amount is required.']),
            $attributes['line_total_amount'] ?? 0,
            $attributes['quantity'] ?? throw ValidationException::withMessages(['quantity' => 'Quantity is required.']),
            // TODO fix type from array
            $currency
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
            'line_total_amount' => $this->line_total_amount,
            'quantity' => $this->quantity,
            'currency' => $this->currency,
        ];
    }
}
