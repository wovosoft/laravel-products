<?php

namespace Wovosoft\LaravelProducts;

use Wovosoft\LaravelProducts\Assets\Brands;
use Wovosoft\LaravelProducts\Assets\Categories;
use Wovosoft\LaravelProducts\Assets\Products;
use Wovosoft\LaravelProducts\Assets\Units;
use Wovosoft\LaravelProducts\Enums\Actions;

class LaravelProducts
{
    public function actions(Actions $actions): Categories|Products|Units|Brands
    {
        return match ($actions) {
            Actions::Brands => new Brands(),
            Actions::Categories => new Categories(),
            Actions::Units => new Units(),
            Actions::Products => new Products(),
        };
    }
}
