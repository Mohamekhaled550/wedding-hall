<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Role;
use App\Models\Permission;
use App\Repositories\Sql\RoleRepository;
use App\Repositories\Sql\StockRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RoleController extends Controller
{
    protected $roleRepo ;

    public function __construct()
    {
        $this->middleware('permission:roles-read')->only(['index']);
        $this->middleware('permission:roles-create')->only(['create', 'store']);
        $this->middleware('permission:roles-update')->only(['edit', 'update']);
        $this->middleware('permission:roles-delete')->only(['destroy']);
    }



    public function index()
    {

        $roles = Role::get();
        return view('dashboard.backend.roles.index' , compact('roles'));
    }


   public function create()
{
    $permissions = Permission::all();
    return view('dashboard.backend.roles.create', compact('permissions'));
}



    public function store(Request $request)
    {

       $data = $request->only('name');
       $role = Role::create($data);
       if(isset($request->permissions)){
           $role->syncPermissions($request->permissions);
       }
        return redirect(route('admin.roles.index'))->with('success', 'تمت الاضافه بنجاح');

    }

  public function edit($id)
{
    $role = Role::findOrFail($id);
    $permissions = Permission::all();
    return view('dashboard.backend.roles.edit', compact('role', 'permissions'));
}


  public function update(Request $request, $id)
{
    $role = Role::findOrFail($id);
    $role->name = $request->name;
    $role->save();

    $role->permissions()->sync($request->permissions);

        return redirect(route('admin.roles.index'))->with('success', 'تم التعديل بنجاح');

    }


    public function destroy($id)
    {
        $role  =  Role::where('id' , $id)->first();
        $role->delete();

        return redirect(route('admin.roles.index'))->with('success',  'تم الحذف بنجاح');

    }


}
