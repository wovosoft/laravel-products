<?php

namespace Wovosoft\LaravelProducts\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelProducts extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-products';
    }
}
