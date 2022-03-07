<?php

declare(strict_types=1);

namespace PaltaSolutions\Currency\Eloquent\Concerns;

use PaltaSolutions\Currency\Enums\Currency;

trait HasCurrency
{
    // public function getCurrencyAttribute()
    // {
    //     return Currency::from($this->currency_code);
    // }

    public function getCurrency()
    {
        return [
            'code' => $this->currency->value,
            'symbol' => $this->currency->symbol(),
            'thousands_separator' => $this->currency->thousandsSeparator(),
            'decimal_separator' => $this->currency->decimalSeparator(),
            'decimals' => $this->currency->decimals(),
        ];
    }

    public function toMoney(int $amount): array
    {
        return [
            'amount' => $amount,
            'currency' => $this->currency,
            'formatted' => sprintf(
                '%s%s %s',
                $this->currency->toUpperCase(),
                $this->currency->symbol(),
                number_format(
                    $amount / 100,
                    $this->currency->decimals(),
                    $this->currency->decimalSeparator(),
                    $this->currency->thousandsSeparator()
                )),
        ];
    }
}
