@extends('dashboard.layouts.master')

@section('title', 'Edit Stock Movement')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Edit Stock Movement</h1>

    <form action="{{ route('admin.stock-movements.update', $movement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Ingredient</label>
            <select name="ingredient_id" class="form-control" required>
                <option disabled>-- Select Ingredient --</option>
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}"
                        @if($ingredient->id == $movement->ingredient_id) selected @endif>
                        {{ $ingredient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" step="0.01"
                value="{{ $movement->quantity }}" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="in" @if($movement->type == 'in') selected @endif>In (Add)</option>
                <option value="out" @if($movement->type == 'out') selected @endif>Out (Deduct)</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Source / Note</label>
            <textarea name="source" class="form-control">{{ $movement->source }}</textarea>
        </div>

        <button class="btn btn-primary">Update Movement</button>
    </form>
</div>
@endsection
