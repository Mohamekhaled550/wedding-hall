@extends('dashboard.layouts.master')

@section('title', 'Stocks')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Stocks</h1>

    <a href="{{ route('admin.stocks.create') }}" class="btn btn-primary mb-4">Add Stock Item</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Ingredient</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
            <tr>
                <td>{{ $stock->id }}</td>
                <td>{{ $stock->ingredient->name }}</td>
                <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->unit_price }}</td>
                <td>
                    <a href="{{ route('admin.stocks.edit', $stock->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
