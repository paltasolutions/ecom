<?php

declare(strict_types=1);

namespace PaltaSolutions\Currency\Eloquent\Concerns;

use Illuminate\Support\Facades\Log;
use PaltaSolutions\Currency\Enums\Currency;

trait HasCurrency
{
    public function getCurrencyAttribute()
    {
        $currency = Currency::from($this->currency_code);

        return [
            'code' => $currency->value,
            'symbol' => $currency->symbol(),
            'thousands_separator' => $currency->thousandsSeparator(),
            'decimal_separator' => $currency->decimalSeparator(),
            'decimals' => $currency->decimals(),
        ];
    }

    public function toMoney(int $amount): array
    {
        $symbolFormat = '%s%s %s';
        $currency = Currency::from($this->currency_code);

        return [
            'amount' => $amount,
            'currency' => $currency,
            'formatted' => sprintf(
                $symbolFormat,
                $currency->toUpperCase(),
                $currency->symbol(),
                number_format(
                    $amount / 100,
                    $currency->decimals(),
                    $currency->decimalSeparator(),
                    $currency->thousandsSeparator()
                )),
        ];
    }
}
