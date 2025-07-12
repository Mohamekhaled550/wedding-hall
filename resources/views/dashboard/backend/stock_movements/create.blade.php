@extends('dashboard.layouts.master')

@section('title', 'Add Stock Movement')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Add Stock Movement</h1>

    <form action="{{ route('admin.stock_movements.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Ingredient</label>
            <select name="ingredient_id" class="form-control">
                @foreach($ingredients as $ingredient)
                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Movement Type</label>
            <select name="movement_type" class="form-control">
                <option value="in">In</option>
                <option value="out">Out</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Note</label>
            <textarea name="note" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
