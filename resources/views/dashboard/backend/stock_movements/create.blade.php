@extends('dashboard.layouts.master')

@section('title', 'Add Stock Movement')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Add Stock Movement</h1>

    <form action="{{ route('admin.stock-movements.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Ingredient</label>
            <select name="ingredient_id" class="form-control" required>
                <option disabled selected>-- Select Ingredient --</option>
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
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="in">In (Add)</option>
                <option value="out">Out (Deduct)</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Source / Note</label>
            <textarea name="source" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Add Movement</button>
    </form>
</div>
@endsection
