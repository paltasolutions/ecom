<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use PaltaSolutions\Currency\Enums\Currency;
use PaltaSolutions\Cart\Domain\Models\CartItem;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PaltaSolutions\Support\Eloquent\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PaltaSolutions\Currency\Eloquent\Concerns\HasCurrency;
use PaltaSolutions\Cart\Infrastructure\Database\Factories\CartFactory;

class Cart extends Model
{
    use
        HasFactory,
        HasUuid,
        HasCurrency;

    public $casts = [
        'currency' => Currency::class,
    ];

    public function getSubTotalAttribute()
    {
        return $this->toMoney($this->attributes['sub_total_amount']);
    }

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
