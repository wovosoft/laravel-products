<?php

use \Illuminate\Support\Facades\Route;
use Wovosoft\LaravelCommon\Helpers\Routes;
use Wovosoft\LaravelProducts\Http\Controllers\BrandController;
use Wovosoft\LaravelProducts\Http\Controllers\CategoryController;
use Wovosoft\LaravelProducts\Http\Controllers\ProductController;
use Wovosoft\LaravelProducts\Http\Controllers\UnitController;


Route::prefix(config("laravel-expense-module.table_prefix"))
    ->group(function () {
        //products
        Routes::register(
            controller: ProductController::class,
            name: "product"
        );

        //brands
        Routes::register(
            controller: BrandController::class,
            name: "brand"
        );

        //categories
        Routes::register(
            controller: CategoryController::class,
            name: "category"
        );

        //units
        Routes::register(
            controller: UnitController::class,
            name: "unit"
        );
    });
