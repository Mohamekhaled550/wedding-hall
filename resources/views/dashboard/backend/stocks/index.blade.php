@extends('dashboard.layouts.master')

@section('title', 'Stock Overview')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Stock Overview</h1>
        <a href="{{ route('admin.stock-movements.create') }}" class="btn btn-primary">New Movement</a>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Total Stock Value</h6>
                    <h4 class="mb-0">{{ number_format($totalStockValue, 2) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Low Stock Items</h6>
                    <h4 class="mb-0 text-danger">{{ $lowStockCount }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Ingredient</th>
                        <th>Category</th>
                        <th>Current Stock</th>
                        <th>Minimum</th>
                        <th>Unit Price</th>
                        <th>Stock Value</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ingredients as $ingredient)
                        <tr>
                            <td>{{ $ingredient->name }}</td>
                            <td>{{ $ingredient->category->name ?? '-' }}</td>
                            <td>{{ number_format($ingredient->current_stock, 2) }} {{ $ingredient->unit }}</td>
                            <td>{{ number_format($ingredient->minimum_stock ?? 0, 2) }}</td>
                            <td>{{ number_format($ingredient->unit_price ?? 0, 2) }}</td>
                            <td>{{ number_format($ingredient->stock_value, 2) }}</td>
                            <td>
                                @if($ingredient->stock_status === 'نفذ')
                                    <span class="badge bg-danger">Out</span>
                                @elseif($ingredient->stock_status === 'منخفض')
                                    <span class="badge bg-warning text-dark">Low</span>
                                @else
                                    <span class="badge bg-success">Available</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No ingredients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
