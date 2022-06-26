<?php

namespace Wovosoft\LaravelProducts\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\Rules\Enum;
use Laravel\Scout\Searchable;
use Wovosoft\LaravelProducts\Enums\ProductTypes;
use Wovosoft\LaravelProducts\Traits\HasCostAndPriceAttribute;
use Wovosoft\LaravelProducts\Traits\HasTablePrefix;
use Wovosoft\LaravelStockManager\Traits\HasStockQuantity;

class Product extends Model
{
    use HasTablePrefix, HasFactory, Searchable;
    use HasStockQuantity, HasCostAndPriceAttribute;

    protected $casts = [
        "type" => ProductTypes::class
    ];

    public static function rules(): array
    {
        return [
            "name" => "string|required",
            "code" => "string|nullable",
            "type" => ["string", "nullable", new Enum(ProductTypes::class)],
            "unit_id" => "numeric|nullable",
            "brand_id" => "numeric|nullable",
            "category_id" => "numeric|nullable",
            "url" => "string|nullable",
            "description" => "string|nullable",
            "cost" => ["numeric", "nullable"],
            "price" => ["numeric", "nullable"]
        ];
    }

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    public function hasVariant(): Attribute
    {
        return new Attribute(
            get: fn() => !!$this->prices
        );
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }
}


