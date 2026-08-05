<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/CategorySeeder.php
    public function run(): void
    {
        $categories = ['Ruang Tamu', 'Kamar Tidur', 'Dapur', 'Ruang Makan', 'Penyimpanan', 'Dekorasi'];
        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
