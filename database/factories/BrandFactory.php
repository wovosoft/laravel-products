<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Wovosoft\LaravelProducts\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Brand>
 */
class BrandFactory extends Factory
{
    protected $model = Brand::class;

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
