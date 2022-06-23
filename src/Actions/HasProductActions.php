<?php

namespace Wovosoft\LaravelProducts\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Wovosoft\LaravelCommon\Helpers\Data;
use Wovosoft\LaravelProducts\Models\Product;

trait HasProductActions
{
    /**
     * @throws \Throwable
     */
    public function store(Request $request): JsonResponse
    {
        return Data::store(new Product(), $request);
    }

    /**
     * @throws \Throwable
     */
    public function update(Product $product, Request $request): JsonResponse
    {
        return Data::store($product, $request);
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Product $product): JsonResponse
    {
        return Data::destroy($product);
    }

    public function find(Product $product, Request $request): string
    {
        return $product->toJson();
    }

    public function index(Request $request): LengthAwarePaginator
    {
        return Data::paginate(Product::query(), $request);
    }

    public function options(Request $request): Collection|array
    {
        return Data::options(Product::query(), $request);
    }
}
