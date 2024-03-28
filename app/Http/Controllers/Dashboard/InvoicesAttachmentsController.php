<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoicesAttachments;
use Illuminate\Support\Facades\Auth;

class InvoicesAttachmentsController extends Controller
{
    
    public function get_file($file_name , $invoice_number)
    {
        $pathToFile = public_path('storage\invoices/') . $invoice_number . '/' . $file_name;

        return response()->download($pathToFile);
    }

    public function open_file($file_name , $invoice_number)
    {
        $pathToFile = public_path('storage\invoices/') . $invoice_number . '/' . $file_name;


        return response()->file($pathToFile);
    }


    public function destroy(string $id)
    {
        $attachment = InvoicesAttachments::where('id' , $id)->first();

        if ($attachment->file_name) {
            Storage::delete($attachment->file_name);
        }
        
        $attachment->delete();

        
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }


    public function create(string $id)
    {
        $invoice = Invoice::where('id' , $id)->first();
        return view('dashboard.backend.invoices.createAttachment' , compact('invoice'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $file) {
                $data = $file->store('invoices' . '/' . $request->invoice_number);
                InvoicesAttachments::create([
                    'invoice_id' => $request->invoice_id,
                    'invoice_number' => $request->invoice_number,
                    'Created_by' => (Auth::user()->name),
                    'file_name' => $data,
                ]);
            }
        }
        
        
        return redirect()->back()->with('success', 'Data Created Successfully');
        
    }
}
