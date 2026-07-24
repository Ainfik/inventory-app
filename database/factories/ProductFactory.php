<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [

            'category_id' => Category::factory(),

            'name' => fake()->words(3, true),

            'sku' => strtoupper(fake()->unique()->bothify('SKU-###??')),

            'price' => fake()->numberBetween(
                10000,
                5000000
            ),

            'description' => fake()->sentence(),

            'image' => null,

            'status' => true,

        ];
    }
}