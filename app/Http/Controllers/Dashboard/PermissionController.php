<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permissions-read')->only(['index']);
        $this->middleware('permission:permissions-create')->only(['create', 'store']);
        $this->middleware('permission:permissions-update')->only(['edit', 'update']);
        $this->middleware('permission:permissions-delete')->only(['destroy']);

    }

    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('dashboard.backend.Permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('dashboard.backend.Permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission Created!');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('dashboard.backend.Permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update(['name' => $request->name]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission Updated!');
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'Permission Deleted!');
    }
}
