<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Http\Requests\ForgetPasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\scheme;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;



class AdminController extends Controller
{  
    use HelperTrait;
    
    public function __construct()
    {
        $this->middleware('permission:admins-read')->only(['index']);
        $this->middleware('permission:admins-create')->only(['create', 'store']);
        $this->middleware('permission:admins-update')->only(['edit', 'update']);
        $this->middleware('permission:admins-delete')->only(['destroy']);
        $this->middleware('permission:profile-update')->only(['editProfile', 'updateProfile']);
    }
    
    public function index()
    {
        $admins = User::where('type' , 'admin')->get();
        return view('dashboard.backend.admins.index' , compact('admins'));
    }

    
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.backend.admins.create' , compact('roles'));
        

    }
 
   
    public function store(AdminRequest $request)
    {

        $data = $request->except('img' , 'password' , 'type');
        $data['type']  = 'admin' ;
        $data['password']  = bcrypt($request->password) ;
        $this->addImage($request, $data, 'img', 'admins');
        $admin =  User::create($data);
        $admin->syncRoles(['admin' => $request->role_id]);
        return redirect(route('admin.admins.index'))->with('success', 'Data Created Successfully');
        
        
    }

    public function show(string $id)
    {
        $admin = User::where('id' , $id)->first();
        $roles = Role::all();
        return view('dashboard.backend.admins.show' , compact('admin' , 'roles') );
    }
 
    
   
    public function edit(string $id)
    { 

        $admin = User::where('id' , $id)->first();
        $roles = Role::all();
        return view('dashboard.backend.admins.edit' , compact('admin' , 'roles'));

    }

   
    public function update(AdminRequest $request, string $id)
    {


        $admin = User::where('id' , $id)->first();
        $data = $request->except('img' , 'password');
        $this->updateImg($request, $data, 'img', 'admins' , $admin);
        if(request()->has('password') && $request->password != null){
            $data['password'] = bcrypt($request->password);
        }
        $admin->update($data);
        $admin->syncRoles(['admin' => $request->role_id]);
        return redirect(route('admin.admins.index'))->with('success', 'Data Created Successfully');
    



    }

   
    public function destroy(string $id)
    {
        $admin = User::where('id' , $id)->first();
        Storage::delete($admin->img); 
        $admin->delete();
        return redirect(route('admin.admins.index'))->with('success', 'Data Deleted Successfully');
    }


    public function resetPassword(){
        return view('dashboard.auth.resetPassword');
    }

    public function forget_password(ForgetPasswordRequest $request)
    {
        $user = User::where('email' , $request->email)->first();
        if ($user) {  
            $rand = Str::random(8);
            $password = bcrypt($rand);
            $user->update([
                'password' => $password,
            ]);
            Mail::to($user->email)->send(new ResetPassword($rand));
            return redirect(route('login'))->with('success', 'Please Check Your Email');
        } else {
            return redirect(route('reset-password'))->with('error', "This Email Dosen't have an account");
        }
    }


    public function editProfile(string $id)
    { 

        $admin = User::where('id' , $id)->first();
        $roles = Role::all();
        return view('dashboard.backend.admins.editProfile' , compact('admin' , 'roles'));

    }

   
    public function updateProfile(AdminRequest $request, string $id)
    {


        $admin = User::where('id' , $id)->first();
        $data = $request->except('img' , 'password');
        $this->updateImg($request, $data, 'img', 'admins' , $admin);
        if(request()->has('password') && $request->password != null){
            $data['password'] = bcrypt($request->password);
        }
        $admin->update($data);
        return $this->show(Auth::user()->id);
    }


}
