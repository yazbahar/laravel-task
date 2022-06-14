<?php

namespace App\Models\Concerns;

class ProductStatus
{

    public const ACTIVE = 10;
    public const PASSIVE = 20;

    public static array $list = [
        'active'   => self::ACTIVE,
        'passive'  => self::PASSIVE,
    ];
}
