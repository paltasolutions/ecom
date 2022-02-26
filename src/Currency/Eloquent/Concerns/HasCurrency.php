<?php

declare(strict_types=1);

namespace PaltaSolutions\Currency\Eloquent\Concerns;

use PaltaSolutions\Currency\Enums\Currency;

trait HasCurrency
{
    public function getCurrencyAttribute()
    {
        return array_map(function(Currency $currency) {
            return [
                'code' => $currency->value,
                'symbol' => $currency->symbol(),
                'thousands_separator' => $currency->thousandsSeparator(),
                'decimal_separator' => $currency->decimalSeparator(),
                'decimals' => $currency->decimals(),
            ];
        }, [Currency::from($this->currency_code)]);
    }

    public function toMoney(int $amount): array
    {
        $symbolFormat = '%s%s %s';
        $currency = $this->currency;
        dump($currency);

        return [
            'amount' => $amount,
            'currency' => $currency,
            'formatted' => sprintf(
                $symbolFormat,
                strtoupper($currency['code']),
                $currency['symbol'],
                number_format(
                    $amount / 100,
                    $currency['decimal_digits'],
                    $currency['decimal_separator'],
                    $currency['thousands_separator']
                )),
        ];
    }
}
