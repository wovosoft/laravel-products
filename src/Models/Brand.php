<?php

namespace Wovosoft\LaravelProducts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Wovosoft\LaravelProducts\Traits\HasTablePrefix;


class Brand extends Model
{
    use HasFactory, Searchable, HasTablePrefix;


    public static function rules(): array
    {
        return [
            "name" => [],
            "description" => ["nullable", "string"]
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
