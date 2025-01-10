<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'amount', 'category_id', 'expense_date'];

    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

