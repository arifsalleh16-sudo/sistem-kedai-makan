<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'nama' => 'Makanan'
        ]);

        Category::create([
            'nama' => 'Minuman'
        ]);

        Category::create([
            'nama' => 'Dessert'
        ]);
    }
}