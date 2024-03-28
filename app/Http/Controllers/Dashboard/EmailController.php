<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\EmailMailable;

class EmailController extends Controller
{
    public function send() {
        Mail::to(Auth::user()->email)->send(new EmailMailable());
    
    }
}