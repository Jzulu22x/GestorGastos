@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Crear nuevo gasto</h1>

    <!-- Formulario para crear un nuevo gasto -->
    <form action="{{ route('expenses.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Descripción -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
            <input type="text" name="description" id="description" placeholder="Descripción del gasto" required class="mt-2 p-2 border border-gray-300 rounded-lg w-full" />
        </div>

        <!-- Monto -->
        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Monto</label>
            <input type="number" name="amount" id="amount" placeholder="Monto del gasto" required class="mt-2 p-2 border border-gray-300 rounded-lg w-full" step="0.01" />
        </div>

        <!-- Categoría -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select name="category_id" id="category_id" required class="mt-2 p-2 border border-gray-300 rounded-lg w-full">
                <option value="" disabled selected>Selecciona una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Fecha -->
        <div>
            <label for="expense_date" class="block text-sm font-medium text-gray-700">Fecha</label>
            <input type="date" name="expense_date" id="expense_date" required class="mt-2 p-2 border border-gray-300 rounded-lg w-full" />
        </div>

        <!-- Botón para enviar el formulario -->
        <div class="mt-4">
            <button type="submit" class="py-2 px-4">
                Crear gasto
            </button>
        </div>
    </form>
@endsection
