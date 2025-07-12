@extends('dashboard.layouts.master')

@section('title', 'Add Stock Item')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Add Stock Item</h1>

    <form action="{{ route('admin.stocks.store') }}" method="POST">
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
            <label>Unit Price</label>
            <input type="number" name="unit_price" class="form-control" step="0.01" required>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
