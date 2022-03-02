<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Contracts\DataTransferObjects;

class CartDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $email,
        public readonly ?string $description = null,
    ) {}
}
