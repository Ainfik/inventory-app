<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [

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

        ];


        foreach ($categories as $category) {

            Category::firstOrCreate([
                'name' => $category
            ]);

        }

    }

    public function definition(): array
    {

        return [

            'name' => fake()->word(),

        ];

    }
}