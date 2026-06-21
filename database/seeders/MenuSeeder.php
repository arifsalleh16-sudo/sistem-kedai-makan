<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::create([
            'nama' => 'Nasi Goreng',
            'harga' => 8.50,
            'category_id' => 1
        ]);

        Menu::create([
            'nama' => 'Mee Goreng',
            'harga' => 7.50,
            'category_id' => 1
        ]);

        Menu::create([
            'nama' => 'Milo Ais',
            'harga' => 3.50,
            'category_id' => 2
        ]);

        Menu::create([
            'nama' => 'Ais Krim Coklat',
            'harga' => 5.50,
            'category_id' => 3
        ]);
    }
}