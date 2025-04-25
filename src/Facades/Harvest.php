<?php

namespace Spatie\Harvest\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Spatie\Harvest\Harvest
 */
class Harvest extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Spatie\Harvest\Harvest::class;
    }
}
