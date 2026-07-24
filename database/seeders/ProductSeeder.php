<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{

    public function run(): void
    {

        $products = [

            [
                'category' => 'Elektronik',
                'name' => 'Monitor LED 24 Inch',
                'price' => 1500000,
            ],

            [
                'category' => 'Elektronik',
                'name' => 'Keyboard Wireless',
                'price' => 250000,
            ],

            [
                'category' => 'Elektronik',
                'name' => 'Mouse Wireless',
                'price' => 150000,
            ],


            [
                'category' => 'Komputer & Laptop',
                'name' => 'Laptop ASUS VivoBook',
                'price' => 7500000,
            ],

            [
                'category' => 'Komputer & Laptop',
                'name' => 'PC Desktop Office',
                'price' => 6000000,
            ],


            [
                'category' => 'Aksesoris Komputer',
                'name' => 'Kabel HDMI',
                'price' => 100000,
            ],


            [
                'category' => 'Smartphone & Tablet',
                'name' => 'Samsung Galaxy A Series',
                'price' => 3000000,
            ],


            [
                'category' => 'Peralatan Kantor',
                'name' => 'Printer Inkjet',
                'price' => 2000000,
            ],


            [
                'category' => 'ATK',
                'name' => 'Kertas A4 80gsm',
                'price' => 60000,
            ],


            [
                'category' => 'Furniture',
                'name' => 'Kursi Kantor Ergonomis',
                'price' => 900000,
            ],


            [
                'category' => 'Peralatan Jaringan',
                'name' => 'Router WiFi',
                'price' => 500000,
            ],


            [
                'category' => 'Penyimpanan Data',
                'name' => 'Flashdisk 32GB',
                'price' => 70000,
            ],


            [
                'category' => 'Kamera & Multimedia',
                'name' => 'Kamera DSLR Canon',
                'price' => 8000000,
            ],

        ];



        foreach ($products as $item) {


            $category = Category::where(
                'name',
                $item['category']
            )->first();



            if ($category) {


                Product::firstOrCreate(

                    [
                        'name' => $item['name']
                    ],

                    [
                        'category_id' => $category->id,
                        'price' => $item['price'],
                    ]

                );


            }


        }

    }

}