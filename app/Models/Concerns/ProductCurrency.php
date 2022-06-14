<?php

namespace App\Models\Concerns;

class ProductCurrency
{

    public const TL = 10;
    public const USD = 20;

    public static array $list = [
        'tl'   => self::TL,
        'usd'  => self::USD,
    ];
}
