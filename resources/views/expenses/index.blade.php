@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Gastos</h1>

    <!-- Botón para ir al formulario de creación -->
    <div class="mb-6">
        <a href="{{ route('expenses.create') }}" class="py-2 px-4">
            Crear Gasto
        </a>
    </div>

    <form method="GET" action="{{ route('expenses.index') }}" class="mb-6">
    <div class="flex items-center space-x-4">
        <!-- Filtro por Categoría -->
        <select name="category_id" class="p-2 border border-gray-300 rounded-lg w-80">
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <!-- Filtro por Fechas -->
        <input type="date" name="start_date" class="p-2 border border-gray-300 rounded-lg" value="{{ request('start_date') }}">
        <input type="date" name="end_date" class="p-2 border border-gray-300 rounded-lg" value="{{ request('end_date') }}">

        <button type="submit" class="bg-blue-500 py-2 px-4 rounded-lg hover:bg-blue-600">Filtrar</button>

        <!-- Botón para restablecer los filtros -->
        <a href="{{ route('expenses.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">Restablecer filtros</a>
    </div>
</form>

    <!-- Tabla de Gastos -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="table-auto w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 border-b">Descripción</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 border-b">Monto</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 border-b">Categoría</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 border-b">Fecha</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 border-b">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $expense->description }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">${{ number_format($expense->amount, 2) }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $expense->category->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ \Carbon\Carbon::parse($expense->expense_date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-b">
                            <!-- Botón para editar -->
                            <a href="{{ route('expenses.edit', $expense->id) }}" class="py-1 px-4">
                                Editar
                            </a>

                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este gasto?')" class="ml-4 inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="py-1 px-4">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="font-bold bg-gray-100">
                    <td colspan="4" class="px-4 py-2 text-right border-t">Total</td>
                    <td class="px-4 py-2 text-sm text-gray-700 border-t">${{ number_format($expenses->sum('amount'), 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
