<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Elektronik',
                'Komputer & Laptop',
                'Aksesoris Komputer',
                'Smartphone & Tablet',
                'Peralatan Kantor',
                'ATK',
                'Furniture',
                'Peralatan Jaringan',
                'Penyimpanan Data',
                'Kamera & Multimedia',
            ]),
        ];
    }
}