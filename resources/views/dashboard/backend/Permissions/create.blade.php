@extends('dashboard.layouts.master')

@section('title', 'Add Permission')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Add Permission</h1>

    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
