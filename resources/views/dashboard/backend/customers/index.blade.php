@extends('dashboard.layouts.master')

@section('title', 'Customers')

@section('content')
<div class="container">
    <h1 class="mb-4">Customers</h1>
    <a href="{{ route('admin.customers.create') }}" class="btn btn-primary mb-3">Add Customer</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No customers found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
