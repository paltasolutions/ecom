<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use PaltaSolutions\Cart\Infrastructure\Database\Factories\CartFactory;
use PaltaSolutions\Currency\Eloquent\Concerns\HasCurrency;
use PaltaSolutions\Support\Eloquent\Concerns\HasUuid;

class Cart extends Model
{
    use
        HasFactory,
        HasUuid,
        HasCurrency;


    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        //Infrastructure/Database/Factories/CartFactory.php
        return CartFactory::new();
    }
}
