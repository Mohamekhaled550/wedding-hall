@extends('dashboard.layouts.master')

@section('title', 'Add Product Ingredient')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Add Product Ingredient</h1>

    <form action="{{ route('admin.product-ingredients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-control">
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Ingredient</label>
            <select name="ingredient_id" class="form-control">
                @foreach($ingredients as $ingredient)
                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Quantity per Plate</label>
            <input type="number" name="quantity_per_plate" class="form-control" step="0.01" required>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
