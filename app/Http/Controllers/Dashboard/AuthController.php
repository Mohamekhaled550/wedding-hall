<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show_login() {
        if (request()->route('redirect') === 'frontend') {
            session(['post_login_redirect' => route('frontend.home')]);
        }

        return view('dashboard.auth.login');
    }


    public function login(LoginRequest $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ])) {
return $this->authenticated($request, Auth::user());
        }else{
            return redirect()->back();
        }
    }


    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($redirect = session()->pull('post_login_redirect')) {
            return redirect()->to($redirect);
        }

        if ($user->hasRole('Accountant')) {
            return redirect()->route('admin.accountant.dashboard');
        } elseif ($user->hasRole('superadmin')) {
            return redirect()->route('admin.home');
        }

        return redirect()->route('frontend.home');
    }


}

