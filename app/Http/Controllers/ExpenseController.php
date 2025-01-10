<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function index(Request $request)
{
    $categories = Category::all();
    $query = Expense::with('category');

    // Filtrar por categoría si se selecciona una
    if ($request->has('category_id') && $request->category_id != '') {
        $query->where('category_id', $request->category_id);
    }

    // Filtrar por fechas si ambas fechas están presentes
    if ($request->has('start_date') && $request->start_date != '' && $request->has('end_date') && $request->end_date != '') {
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();
        $query->whereBetween('expense_date', [$startDate, $endDate]);
    }

    $expenses = $query->orderBy('expense_date', 'desc')->get();

    return view('expenses.index', compact('expenses', 'categories'));
}

    public function create()
    {
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'expense_date' => 'required|date',
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index');
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $categories = Category::all();
        return view('expenses.edit', compact('expense', 'categories'));
    }

    public function update(Request $request, $id)
{

    $validated = $request->validate([
        'description' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0.01',
        'category_id' => 'required|exists:categories,id',
        'expense_date' => 'required|date',
    ]);

    $expense = Expense::findOrFail($id);


    $expense->description = $validated['description'];
    $expense->amount = $validated['amount'];
    $expense->category_id = $validated['category_id'];
    $expense->expense_date = $validated['expense_date'];


    $expense->save();


    return redirect()->route('expenses.index')->with('success', 'Gasto actualizado correctamente.');
}

    public function destroy($id)
    {
        Expense::findOrFail($id)->delete();
        return redirect()->route('expenses.index');
    }
}

