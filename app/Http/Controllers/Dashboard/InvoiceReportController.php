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

    $sections = Section::all(); // ضروري علشان ما يظهرش الخطأ في أول تحميل للصفحة

        return view('dashboard.backend.reports.index', compact('sections'));
    }


    public function search(Request $request)
    {

          $request->validate([
        'year' => 'required|numeric',
        'month' => 'required|numeric',
        'excluded_section' => 'required|string',
    ]);



        $year = $request->year;
        $month = $request->month;
        $excludedSection = $request->excluded_section;
        $statusFilter = $request->status_filter;

        // جلب الفواتير بناءً على السنة والشهر
       $invoices = Invoice::with('section')
        ->whereYear('due_date', $year)
        ->whereMonth('due_date', $month)
        ->get();

    $filtered = $excludedSection !== 'all'
        ? $invoices->filter(function ($invoice) use ($excludedSection) {
            return isset($invoice->section) && strtolower($invoice->section->name) === strtolower($excludedSection);
        })
        : $invoices;

         // فلترة الحالة (مدفوعة/غير مدفوعة/جزئياً)
    if ($statusFilter !== 'all') {
        $filtered = $filtered->filter(function ($invoice) use ($statusFilter) {
            return $invoice->value_status == $statusFilter;
        });
    }

    $totalAmount = $filtered->sum('Total');
    $sections = Section::all();

    return view('dashboard.backend.reports.index', compact(
        'filtered', 'invoices', 'year', 'month', 'totalAmount', 'excludedSection','statusFilter' ,'sections'
    ));
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
