<?php

namespace Wovosoft\LaravelProducts\Traits;

trait HasTablePrefix
{
    public function __construct(...$attributes)
    {
        if (config("laravel-products.table.prefix")) {
            $this->table = config("laravel-products.table.prefix") . parent::getTable();
        }
        parent::__construct($attributes);
    }

}
