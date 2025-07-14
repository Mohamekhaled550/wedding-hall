@extends('dashboard.layouts.master')

@section('title', 'Ingredients')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Ingredients</h1>

    <a href="{{ route('admin.ingredients.create') }}" class="btn btn-primary mb-4">Add Ingredient</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Unit</th>
                <th>Current Stock</th>
                <th>Unit Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->id }}</td>
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->unit }}</td>
                    <td>{{ $ingredient->current_stock }}</td>
                    <td>{{ number_format($ingredient->unit_price, 2) }}</td>
                    <td>{{ $ingredient->category?->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.ingredients.edit', $ingredient->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.ingredients.destroy', $ingredient->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No ingredients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
