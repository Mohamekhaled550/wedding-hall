<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Section;


class InvoiceReportController extends Controller
{
    public function reportshome()
    {
        return view('dashboard.backend.reports.home');
    }
    public function index()
    {
        return view('dashboard.backend.reports.index');
    }
    public function indexi()
    {
        return view('dashboard.backend.reports.indexi');
    }

    public function search(Request $request)
    {
        $year = $request->year;
        $month = $request->month;


        // جلب الفواتير بناءً على السنة والشهر
        $invoices = Invoice::whereYear('due_date', $year)
            ->whereMonth('due_date', $month)
            ->get();


             // حساب المجموع الكلي للفواتير
             $totalAmount = $invoices->filter(function ($invoice) {
                return $invoice->section->name != 'Hall 2'; 
            })->sum('Total');
        return view('dashboard.backend.reports.index', compact('invoices', 'year', 'month' , 'totalAmount'));
    }


    public function searchi(Request $request)
    {
        $year = $request->year;
        $month = $request->month;


        // جلب الفواتير بناءً على السنة والشهر
        $invoices = Invoice::whereYear('due_date', $year)
            ->whereMonth('due_date', $month)
            ->get();


             // حساب المجموع الكلي للفواتير
             $totalAmoun = $invoices->filter(function ($invoice) {
                return $invoice->section->name != 'Hall 1'; 
            })->sum('Total');
        return view('dashboard.backend.reports.indexi', compact('invoices', 'year', 'month' , 'totalAmoun'));
    }
}
