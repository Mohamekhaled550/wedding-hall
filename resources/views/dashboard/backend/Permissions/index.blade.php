@extends('dashboard.layouts.master')

@section('title', 'Permissions')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Permissions</h1>

    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary mb-4">Add Permission</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Guard</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>
                        <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No permissions found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
