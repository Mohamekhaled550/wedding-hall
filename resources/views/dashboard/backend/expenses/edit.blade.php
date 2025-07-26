@extends('dashboard.layouts.master')

@section('title', 'Edit Expense')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Expense</h1>

    <form action="{{ route('admin.expenses.update', $expense) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Category *</label>
            <input type="text" name="category" value="{{ $expense->category }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount *</label>
            <input type="number" name="amount" value="{{ $expense->amount }}" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date *</label>
            <input type="date" name="date" value="{{ $expense->date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Note</label>
            <textarea name="note" class="form-control">{{ $expense->note }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.expenses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
