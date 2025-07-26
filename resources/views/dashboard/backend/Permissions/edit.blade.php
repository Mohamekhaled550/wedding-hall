@extends('dashboard.layouts.master')

@section('title', 'Edit Permission')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Edit Permission</h1>

    <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
