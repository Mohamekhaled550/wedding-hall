@extends('dashboard.layouts.master')

@section('content')
<div class="container">
    <h2>Create Category</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
