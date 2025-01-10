@extends('layouts.app')

@section('content')
    <h1>Gastos</h1>
    <a href="{{ route('expenses.create') }}">Nuevo gasto</a>
    <ul>
        @foreach($expenses as $expense)
            <li>{{ $expense->description }} - ${{ $expense->amount }} - {{ $expense->category->name }} - {{ $expense->expense_date }}</li>
        @endforeach
    </ul>
@endsection
