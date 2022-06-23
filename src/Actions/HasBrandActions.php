<?php

namespace Wovosoft\LaravelProducts\Actions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Wovosoft\LaravelCommon\Helpers\Data;
use Wovosoft\LaravelProducts\Models\Brand;

trait HasBrandActions
{
    /**
     * @throws \Throwable
     */
    public function store(Request $request): JsonResponse
    {
        return Data::store(new Brand, $request);
    }

    /**
     * @throws \Throwable
     */
    public function update(Brand $brand, Request $request): JsonResponse
    {
        return Data::store($brand, $request);
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Brand $brand): JsonResponse
    {
        return Data::destroy($brand);
    }

    public function find(Brand $brand, Request $request): string
    {
        return $brand->toJson();
    }

    public function index(Request $request): LengthAwarePaginator
    {
        return Data::paginate(Brand::query(), $request);
    }

    public function options(Request $request): Collection|array
    {
        return Data::options(Brand::query(), $request);
    }
}
