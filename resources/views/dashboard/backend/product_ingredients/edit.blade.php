@extends('dashboard.layouts.master')

@section('title', 'Edit Product Ingredient')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Edit Product Ingredient</h1>

    <form action="{{ route('admin.product-ingredients.update', $productIngredient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}"
                        {{ old('product_id', $productIngredient->product_id) == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ingredient_id" class="form-label">Ingredient</label>
            <select name="ingredient_id" id="ingredient_id" class="form-control" required>
                <option value="">-- Select Ingredient --</option>
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}"
                        {{ old('ingredient_id', $productIngredient->ingredient_id) == $ingredient->id ? 'selected' : '' }}>
                        {{ $ingredient->name }}
                    </option>
                @endforeach
            </select>
            @error('ingredient_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity_per_plate" class="form-label">Quantity per Plate</label>
            <input type="number" name="quantity_per_plate" id="quantity_per_plate"
                   class="form-control" step="0.01" min="0"
                   value="{{ old('quantity_per_plate', $productIngredient->quantity_per_plate) }}" required>
            @error('quantity_per_plate')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
