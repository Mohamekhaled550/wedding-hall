@extends('dashboard.layouts.master')

@section('title', 'Stock Movements')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Stock Movements</h1>

    <a href="{{ route('admin.stock-movements.create') }}" class="btn btn-primary mb-4">Add Stock Movement</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Ingredient</th>
                <th>Quantity</th>
                <th>Movement Type</th>
                <th>Note</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movements as $movement)
            <tr>
                <td>{{ $movement->id }}</td>
                <td>{{ $movement->ingredient->name }}</td>
                <td>{{ $movement->quantity }}</td>
                <td>{{ ucfirst($movement->movement_type) }}</td>
                <td>{{ $movement->note }}</td>
                <td>{{ $movement->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
