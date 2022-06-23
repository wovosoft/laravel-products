<?php

namespace Wovosoft\LaravelProducts\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Wovosoft\LaravelProducts\Models\PriceAndCost;

/**
 * This trait should be used in Model (Product and Variant)
 */
trait HasCostAndPriceAttribute
{
    public ?PriceAndCost $priceAndCost = null;

    protected static function boot(): void
    {
        //this line should be at top
        parent::boot();
        static::saved(fn($item) => static::updatePrice($item));
        static::deleted(function ($item) {
            $item->prices()->each(fn(PriceAndCost $priceAndCost) => $priceAndCost->deleteOrFail());
        });
    }

    /**
     * @throws \Throwable
     */
    public static function updatePrice(Model $item)
    {
        if ($item->priceAndCost) {
            $item->priceAndCost->owner_type = static::class;
            $item->priceAndCost->owner_id = $item->id;
            return $item->priceAndCost->saveOrFail();
        }
    }

    public function prices(): MorphOne
    {
        return $this->morphOne(PriceAndCost::class, "owner");
    }

    //get: price
    public function getPriceAttribute(): int
    {
        return $this->prices?->price ?: 0;
    }

    //set: price

    /**
     * New L9, attribute set method doesn't work as expected.
     * So, the old method is being used.
     * While price value is being set, a PriceAndCost instance will be stored,
     * and will be saved in saved() event.
     * @param int|float $price
     * @return void
     */
    public function setPriceAttribute(int|float $price): void
    {
        //checking if available or not
        if (!$this->priceAndCost) {
            $this->priceAndCost = $this->prices ?: $this->prices()->newModelInstance();
        }
        $this->priceAndCost->price = $price;
    }

    public function getCostAttribute(): int
    {
        return $this->prices?->cost ?: 0;
    }

    public function setCostAttribute(int|float $cost)
    {
        //checking if available or not
        if (!$this->priceAndCost) {
            $this->priceAndCost = $this->prices ?: $this->prices()->newModelInstance();
        }
        $this->priceAndCost->cost = $cost;
    }
}
