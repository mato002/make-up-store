<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $lipstick = Category::where('name', 'Lipstick')->first();

        Product::create([
            'name' => 'Red Matte Lipstick',
            'description' => 'A vibrant red matte lipstick for bold looks.',
            'price' => 1200,
            'stock' => 30,
            'category_id' => $lipstick->id,
        ]);

        Product::create([
            'name' => 'Waterproof Eyeliner',
            'description' => 'Long-lasting waterproof eyeliner.',
            'price' => 850,
            'stock' => 50,
            'category_id' => Category::where('name', 'Eyeliner')->first()->id,
        ]);
    }
}
