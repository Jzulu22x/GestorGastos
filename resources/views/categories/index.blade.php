@extends('layouts.app')

@section('content')
    <h1>Categorías</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nueva categoría" required>
        <button type="submit">Agregar</button>
    </form>

    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
@endsection
