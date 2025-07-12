<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InvoicesDetails;
use Illuminate\Http\Request;

class InvoicesDetailsController extends Controller
{

    public function index()
    {
        return view('dashboard.backend.admins.index');
    }


    public function create()
    {
        return view('dashboard.backend.admins.create');

    }


    public function store(Request $request)
    {
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('admins');
        }

        return redirect(route('admin.admins.index'))->with('success', 'Data Created Successfully');

    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        return view('dashboard.backend.admins.edit');

    }


    public function update(Request $request, string $id)
    {


    }


    public function destroy(string $id)
    {
        //
    }

   public function updatePaidAmount(Request $request, $id)
{
    $invoiceDetail = InvoicesDetails::findOrFail($id);
    $invoice = $invoiceDetail->invoice;

    $request->validate([
        'paid_amount' => 'required|numeric|min:0',
    ]);

    $newAmountToAdd = $request->paid_amount;

    // إجمالي المدفوع في كل التفاصيل الخاصة بهذه الفاتورة
    $totalPaid = InvoicesDetails::where('invoice_id', $invoice->id)->sum('paid_amount');

    $invoiceTotal = $invoice->Total;

    // التحقق قبل الإضافة
    if (($totalPaid + $newAmountToAdd) > $invoiceTotal) {
        return redirect()->back()->with('error', 'المبلغ الجديد سيتجاوز إجمالي الفاتورة.');
    }

    // نضيف على المبلغ الحالي بدل استبداله
    $invoiceDetail->paid_amount += $newAmountToAdd;
    $invoiceDetail->Payment_Date = now(); // لو حابب تسجل تاريخ السداد
    $invoiceDetail->save();

    return redirect()->back()->with('success', 'تمت إضافة المبلغ بنجاح.');
}


}
