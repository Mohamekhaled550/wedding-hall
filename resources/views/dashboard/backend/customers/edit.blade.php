@extends('dashboard.layouts.master')

@section('title', 'Edit Customer')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Customer</h1>

    <form action="{{ route('admin.customers.update', $customer) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" value="{{ $customer->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
