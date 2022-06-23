<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Wovosoft\LaravelProducts\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
