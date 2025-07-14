{{-- resources/views/dashboard/ingredients/create.blade.php --}}
@extends('dashboard.layouts.master')

@section('title', 'Add Ingredient')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Add Ingredient</h1>

    <form action="{{ route('admin.ingredients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>Unit</label>
            <input type="text" name="unit" class="form-control" value="{{ old('unit', 'kg') }}">
        </div>



        <div class="mb-3">
            <label>Unit Price</label>
            <input type="number" name="unit_price" class="form-control" step="0.01" value="{{ old('unit_price') }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- اختر القسم --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
