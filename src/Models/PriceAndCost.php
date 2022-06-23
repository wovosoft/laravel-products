<?php

namespace Wovosoft\LaravelProducts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laravel\Scout\Searchable;
use Wovosoft\LaravelProducts\Traits\HasTablePrefix;

class PriceAndCost extends Model
{
    use HasFactory, Searchable, HasTablePrefix;

    public function owner(): MorphTo
    {
        return $this->morphTo("owner");
    }
}
