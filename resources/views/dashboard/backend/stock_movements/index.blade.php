@extends('dashboard.layouts.master')

@section('title', 'Stock Movements')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Stock Movements</h1>

    <a href="{{ route('admin.stock-movements.create') }}" class="btn btn-primary mb-4">Add Stock Movement</a>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Ingredient</th>
                <th>Quantity</th>
                <th>Type</th>
                <th>Note</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movements as $movement)
                <tr>
                    <td>{{ $movement->id }}</td>
                    <td>{{ $movement->ingredient->name }}</td>
                    <td>{{ $movement->quantity }}</td>
                    <td>
                        @if($movement->type === 'in')
                            <span class="badge badge-success">In</span>
                        @else
                            <span class="badge badge-danger">Out</span>
                        @endif
                    </td>
                    <td>{{ $movement->source }}</td>
                    <td>{{ $movement->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.stock-movements.edit', $movement->id) }}" class="btn btn-sm btn-info">Edit</a>

                        <form action="{{ route('admin.stock-movements.destroy', $movement->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No stock movements found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
