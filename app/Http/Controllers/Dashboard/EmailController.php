<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\AddedInvoice;

class EmailController extends Controller
{
    public function sendEmailToCustomer()
    {
        Mail::to($invoice->customer_email)->send(new AddedInvoice($invoice));
        return 'email sent';
    }
}
