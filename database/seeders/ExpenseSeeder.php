<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    public function run()
    {
        // Crear algunos gastos de ejemplo
        Expense::create([
            'description' => 'Almuerzo en restaurante',
            'amount' => 15.50,
            'category_id' => Category::where('name', 'Comida')->first()->id,
            'expense_date' => '2025-01-01',
        ]);

        Expense::create([
            'description' => 'Gasolina',
            'amount' => 40.00,
            'category_id' => Category::where('name', 'Transporte')->first()->id,
            'expense_date' => '2025-01-02',
        ]);

        Expense::create([
            'description' => 'Entrada al cine',
            'amount' => 12.00,
            'category_id' => Category::where('name', 'Ocio')->first()->id,
            'expense_date' => '2025-01-03',
        ]);
    }
}

