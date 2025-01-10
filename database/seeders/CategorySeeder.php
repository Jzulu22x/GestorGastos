<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Crear categorías de ejemplo
        Category::create(['name' => 'Comida']);
        Category::create(['name' => 'Transporte']);
        Category::create(['name' => 'Ocio']);
        Category::create(['name' => 'Salud']);
        Category::create(['name' => 'Educación']);
    }
}
