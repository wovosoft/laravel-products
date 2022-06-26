<?php

namespace Wovosoft\LaravelProducts\Traits;

trait HasTablePrefix
{
    use \Wovosoft\LaravelCommon\Traits\HasTablePrefix;

    public function getPrefix(): string
    {
        return config("laravel-products.table.prefix");
    }
}
