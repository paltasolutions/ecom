<?php

declare(strict_types=1);

namespace PaltaSolutions\Cart\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PaltaSolutions\Cart\Infrastructure\Database\Factories\CartItemFactory;
use PaltaSolutions\Currency\Eloquent\Concerns\HasCurrency;
use PaltaSolutions\Currency\Enums\Currency;
use PaltaSolutions\Support\Eloquent\Concerns\HasUuid;

class CartItem extends Model
{
    use HasFactory
        , HasUuid
        , HasCurrency;

    protected $fillable = [
        'name',
        'line_total_amount',
        'unit_total_amount',
        'quantity',
        'sequence',
    ];

    protected $attributes = [
        'line_total_amount' => 0,
        'unit_total_amount' => 0,
        'quantity' => 0,
        'sequence' => 0,
        'currency' => Currency::USD,
    ];

    public $casts = [
        'currency' => Currency::class,
    ];

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

    public function getSubTotalAttribute()
    {
        return $this->toMoney($this->sub_total_amount);
    }

    public function getSubTotalAmountAttribute()
    {
        return $this->attributes['line_total_amount'] * $this->quantity;
    }

    protected static function newFactory()
    {
        return CartItemFactory::new();
    }
}
