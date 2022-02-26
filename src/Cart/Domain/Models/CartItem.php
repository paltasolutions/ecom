<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PaltaSolutions\Cart\Infrastructure\Database\Factories\CartItemFactory;
use PaltaSolutions\Currency\Eloquent\Concerns\HasCurrency;
use PaltaSolutions\Support\Eloquent\Concerns\HasUuid;

class CartItem extends Model
{
    use HasFactory
        , HasUuid
        , HasCurrency;

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function getUnitTotalAttribute()
    {
        return $this->toMoney($this->unit_total_amount);
    }

    public function getLineTotalAttribute()
    {
        return $this->toMoney($this->attributes['line_total_amount']);
    }

    public function getSubTotalAmountAttribute()
    {
        return $this->line_total * $this->quantity;
    }

    protected static function newFactory()
    {
        return CartItemFactory::new();
    }
}
