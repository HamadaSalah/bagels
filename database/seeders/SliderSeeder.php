<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'head' => 'WELCOME TO BAGELS',
            'img' => 'slider-img-1.jpg'
        ]);
        Slider::create([
            'head' => 'WELCOME TO BAGELS',
            'img' => 'slider-img-2.jpg'
        ]);
        Category::create([
            'name' => 'Medication'
        ]);
        Category::create([
            'name' => 'Drugs'
        ]);
        Product::create([
            'name' => 'Bioderma',
            'price' => 55.55,
            'discount' => 1.20,
            'img' => 'product_05.png',
            'type' => 'new',
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Bioderma',
            'price' => 15.27,
            'discount' => 1.20,
            'img' => 'product_05.png',
            'type' => 'new',
            'category_id' => 2
        ]);
        About::create([
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum obcaecati natus iure voluptatum eveniet harum recusandae ducimus saepe.',
            'img' => 'hero_1.jpg',
            'vision'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum obcaecati natus iure voluptatum eveniet harum recusandae ducimus saepe.',
            'mission'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum obcaecati natus iure voluptatum eveniet harum recusandae ducimus saepe.',
            'value'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum obcaecati natus iure voluptatum eveniet harum recusandae ducimus saepe.',
            'address' => 'Bakaaro Market,
            Mogadishu-Somalia',
            'phone' => '+252615575857',
            'email' => 'info@primepharma.so',
            'pharma_products'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.',
            'rated_by'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.',
        ]);
    }
}
