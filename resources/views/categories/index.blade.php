@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Categorías</h1>

    <!-- Formulario para agregar una nueva categoría -->
    <form action="{{ route('categories.store') }}" method="POST" class="mb-6">
        @csrf
        <div class="flex items-center space-x-4">
            <input type="text" name="name" placeholder="Nueva categoría" required class="p-2 border border-gray-300 rounded-lg w-80" />
            <button type="submit" class="bg-blue-500 py-2 px-4 rounded-lg hover:bg-blue-600">Agregar</button>
        </div>
    </form>

    <!-- Botón para crear un nuevo gasto -->
    <a href="{{ route('expenses.create') }}" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 mb-6 inline-block">
        Crear nuevo gasto
    </a>

    <!-- Lista de categorías -->
    <div class="bg-white shadow-lg rounded-lg p-4">
        <h2 class="text-lg font-semibold mb-4">Lista de categorías</h2>
        <ul class="space-y-2">
            @foreach($categories as $category)
                <li class="flex justify-between items-center border-b py-2">
                    <span class="text-gray-700">{{ $category->name }}</span>
                    
                    <!-- Formulario para eliminar la categoría -->
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')" class="ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="py-1 px-4 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Eliminar
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

