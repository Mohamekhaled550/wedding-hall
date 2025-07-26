@extends('dashboard.layouts.master')

@section('title', 'Add Expense')

@section('content')
<div class="container">
    <h1 class="mb-4">Add Expense</h1>

    <form action="{{ route('admin.expenses.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Category *</label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount *</label>
            <input type="number" name="amount" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date *</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Note</label>
            <textarea name="note" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.expenses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
