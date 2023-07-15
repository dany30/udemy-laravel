<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'autos',
            'slug' => 'autitos',
        ]);
        Category::create([
            'title' => 'motos',
            'slug' => 'motitos',
        ]);
        Category::create([
            'title' => 'camiones',
            'slug' => 'camioncitos',
        ]);
    }
}
