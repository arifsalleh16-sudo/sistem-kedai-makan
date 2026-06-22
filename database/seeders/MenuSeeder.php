<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {

        Menu::create([
    'user_id' => 1,
    'nama' => 'Nasi Ayam',
    'harga' => 11.00,
    'category_id' => 1
]);

Menu::create([
    'user_id' => 1, 
    'nama' => 'Teh Tarik',
    'harga' => 2.00,
    'category_id' => 2
]);

Menu::create([
    'user_id' => 1,
    'nama' => 'Ice Cream Coklat',
    'harga' => 7.50,
    'category_id' => 3
]);
    }
}