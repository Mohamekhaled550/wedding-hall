@extends('dashboard.layouts.master')

@section('title', 'Product Ingredients')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Product Ingredients</h1>

    <a href="{{ route('admin.product-ingredients.create') }}" class="btn btn-primary mb-4">Add Product Ingredient</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Ingredient</th>
                <th>Quantity per Plate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productIngredients as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->ingredient->name }}</td>
                <td>{{ $item->quantity_per_plate }}</td>
                <td>
                    <a href="{{ route('admin.product-ingredients.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.product-ingredients.destroy', $item->id) }}" method="POST" style="display:inline;">
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
