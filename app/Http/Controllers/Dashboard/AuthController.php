<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show_login() {
        return view('dashboard.auth.login');
    }


    public function login(LoginRequest $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password , 'type' => 'admin'])) {
            return redirect()->route('admin.home');
        }else{
            return redirect()->back();
        }
    }


    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
    
}

 
