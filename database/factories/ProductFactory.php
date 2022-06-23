<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Wovosoft\LaravelProducts\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
