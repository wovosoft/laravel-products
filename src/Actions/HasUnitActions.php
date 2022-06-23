<?php

namespace Wovosoft\LaravelProducts\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Wovosoft\LaravelCommon\Helpers\Data;
use Wovosoft\LaravelProducts\Models\Unit;

trait HasUnitActions
{
    /**
     * @throws \Throwable
     */
    public function store(Request $request): JsonResponse
    {
        return Data::store(new Unit(), $request);
    }

    /**
     * @throws \Throwable
     */
    public function update(Unit $unit, Request $request): JsonResponse
    {
        return Data::store($unit, $request);
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Unit $unit): JsonResponse
    {
        return Data::destroy($unit);
    }

    public function find(Unit $unit, Request $request): string
    {
        return $unit->toJson();
    }

    public function index(Request $request): LengthAwarePaginator
    {
        return Data::paginate(Unit::query(), $request);
    }

    public function options(Request $request): Collection|array
    {
        return Data::options(Unit::query(), $request);
    }
}
