<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('dashboard.backend.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('dashboard.backend.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name, 'guard_name' => 'web']);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission Created!');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('dashboard.backend.permissions.edit', compact('permission'));
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
