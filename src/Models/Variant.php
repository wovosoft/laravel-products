<?php

namespace Wovosoft\LaravelProducts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use Wovosoft\LaravelProducts\Traits\HasCostAndPriceAttribute;
use Wovosoft\LaravelProducts\Traits\HasTablePrefix;

class Variant extends Model
{
    public ?PriceAndCost $priceAndCost = null;
    use HasFactory, HasTablePrefix, Searchable, HasCostAndPriceAttribute;

    public static function rules(): array
    {
        return [
            "product_id" => ["numeric", "required"],
            "title" => ["string", "required"],
            "description" => ["string", "nullable"]
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
