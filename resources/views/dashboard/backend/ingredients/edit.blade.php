{{-- resources/views/dashboard/ingredients/edit.blade.php --}}
@extends('dashboard.layouts.master')

@section('title', 'Edit Ingredient')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Edit Ingredient</h1>

    <form action="{{ route('admin.ingredients.update', $ingredient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $ingredient->name }}" required>
        </div>

        <div class="mb-3">
            <label>Unit</label>
            <input type="text" name="unit" class="form-control" value="{{ $ingredient->unit }}">
        </div>

        <div class="mb-3">
            <label>Current Stock</label>
            <input type="number" name="current_stock" class="form-control" step="0.01" value="{{ $ingredient->current_stock }}">
        </div>

        <div class="mb-3">
            <label>Unit Price</label>
            <input type="number" name="unit_price" class="form-control" step="0.01" value="{{ $ingredient->unit_price }}">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
