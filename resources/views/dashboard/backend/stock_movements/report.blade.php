@extends('dashboard.layouts.master')

@section('title', 'Stock Movement Report')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Stock Movement Report</h1>

    <form method="GET" class="row mb-4">
        <div class="col-md-3">
            <label>Ingredient</label>
            <select name="ingredient_id" class="form-control">
                <option value="">-- All --</option>
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}" {{ request('ingredient_id') == $ingredient->id ? 'selected' : '' }}>
                        {{ $ingredient->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label>Type</label>
            <select name="movement_type" class="form-control">
                <option value="">-- All --</option>
                <option value="in" {{ request('type') == 'in' ? 'selected' : '' }}>IN</option>
                <option value="out" {{ request('type') == 'out' ? 'selected' : '' }}>OUT</option>
            </select>
        </div>
        <div class="col-md-2">
            <label>From</label>
            <input type="date" name="from" class="form-control" value="{{ request('from') }}">
        </div>
        <div class="col-md-2">
            <label>To</label>
            <input type="date" name="to" class="form-control" value="{{ request('to') }}">
        </div>
        <div class="col-md-2">
            <label>&nbsp;</label>
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <div class="mb-3">
        <strong>Total IN:</strong> {{ $total_in }}<br>
        <strong>Total OUT:</strong> {{ $total_out }}
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Ingredient</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Note</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movements as $movement)
                <tr>
                    <td>{{ $movement->id }}</td>
                    <td>{{ $movement->ingredient->name }}</td>
                    <td>{{ strtoupper($movement->type) }}</td>
                    <td>{{ $movement->quantity }}</td>
                    <td>{{ $movement->note }}</td>
                    <td>{{ $movement->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No data found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
