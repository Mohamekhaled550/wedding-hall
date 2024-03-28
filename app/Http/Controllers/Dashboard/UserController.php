<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users-read')->only(['index']);
        $this->middleware('permission:users-create')->only(['create', 'store']);
        $this->middleware('permission:users-update')->only(['edit', 'update']);
        $this->middleware('permission:users-delete')->only(['destroy']);
    }
    
    public function index()
    {
        $users = User::where('type' , 'user')->orderByDesc('id')->get();
        return view('dashboard.backend.users.index' , compact('users'));
    }


    
    public function create()
    {
        return view('dashboard.backend.users.create');
    }

    public function store(UserRequest $request)
    {
    
        $data = $request->except('img' , 'password' , 'type');
        $data['type']  = 'user' ;
        $data['password']  = bcrypt($request->password) ;
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('users');
        }
        User::create($data);
        return redirect(route('admin.users.index'))->with('success', 'Data Created Successfully');
        
    }


    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $user = User::where('id' , $id)->first();
        return view('dashboard.backend.users.edit' , compact('user'));

    }

   
    public function update(UserRequest $request, string $id)
    {
        $user = User::where('id' , $id)->first();
        $data = $request->except('img' , 'password');

        if ($request->hasFile('img') && $user->img) {
            Storage::delete($user->img);
            $data['img'] = $request->file('img')->store('users');

        }else {
            $data['img'] = $user->img;
        }

        if(request()->has('password') && $request->password != null){
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect(route('admin.users.index'))->with('success', 'Data Updated Successfully');
        
    }

   
    public function destroy(string $id)
    {
        $user = User::where('id' , $id)->first();
        Storage::delete($user->img); 
        $user->delete();
        return redirect(route('admin.users.index'))->with('success', 'Data Deleted Successfully');
    }

}
