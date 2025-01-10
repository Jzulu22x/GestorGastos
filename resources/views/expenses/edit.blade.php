@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Editar Gasto</h1>

    <form action="{{ route('expenses.update', $expense->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Descripción -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
            <input type="text" name="description" id="description" value="{{ old('description', $expense->description) }}" required class="mt-2 p-2 border border-gray-300 rounded-lg w-full" />
        </div>

        <!-- Monto -->
        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Monto</label>
            <input type="number" name="amount" id="amount" value="{{ old('amount', $expense->amount) }}" required class="mt-2 p-2 border border-gray-300 rounded-lg w-full" step="0.01" />
        </div>

        <!-- Categoría -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select name="category_id" id="category_id" required class="mt-2 p-2 border border-gray-300 rounded-lg w-full">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $expense->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Fecha -->
        <div>
            <label for="expense_date" class="block text-sm font-medium text-gray-700">Fecha</label>
            <input type="date" name="expense_date" id="expense_date" value="{{ old('expense_date', \Carbon\Carbon::parse($expense->expense_date)->format('Y-m-d')) }}" required class="mt-2 p-2 border border-gray-300 rounded-lg w-full" />

        </div>

        <!-- Botón para actualizar el gasto -->
        <div class="mt-4">
            <button type="submit" class="py-2 px-4">
                Actualizar gasto
            </button>
        </div>
    </form>
@endsection
