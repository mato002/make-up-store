<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Flawless Foundation', 'price' => 1200],
            ['name' => 'Matte Lipstick', 'price' => 850],
            ['name' => 'Long Lash Mascara', 'price' => 950],
            ['name' => 'Glam Eyeshadow Palette', 'price' => 1600],
            ['name' => 'Natural Blush', 'price' => 700],
            ['name' => 'Cream Foundation', 'price' => 1300],
            ['name' => 'Glossy Lipstick', 'price' => 800],
            ['name' => 'Volume Mascara', 'price' => 980],
            ['name' => 'Nude Eyeshadow', 'price' => 1500],
            ['name' => 'Rosy Blush', 'price' => 720],
            ['name' => 'Hydrating Foundation', 'price' => 1400],
            ['name' => 'Velvet Lipstick', 'price' => 900],
            ['name' => 'Curling Mascara', 'price' => 970],
            ['name' => 'Smoky Eyeshadow', 'price' => 1550],
            ['name' => 'Peach Blush', 'price' => 730],
        ];

        $categories = Category::all();

        foreach ($products as $index => $productData) {
            Product::create([
                'name' => $productData['name'],
                'description' => 'This is a premium quality product for your daily makeup routine.',
                'price' => $productData['price'],
                'stock' => rand(10, 50),
                'category_id' => $categories[$index % $categories->count()]->id,
                'image' => 'products/default.jpg' // you can upload a default image to storage
            ]);
        }
    }
}
