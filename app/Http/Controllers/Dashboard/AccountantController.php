<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function index()
    {
        // Example Data: Replace with your logic
        $totalRevenue = Invoice::where('status', 'paid')->sum('total');
        $totalExpenses = 50000; // هتعدلها لما تعمل جدول مصروفات
        $profit = $totalRevenue - $totalExpenses;

        $unpaidInvoicesCount = Invoice::where('status', '!=', 'paid')->count();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
        $revenueData = [20000, 25000, 30000, 40000, 35000, 45000];

        $expenseCategories = ['Salaries', 'Purchases', 'Other'];
        $expenseData = [20000, 15000, 5000];

        $latestInvoices = Invoice::with('customer')->latest()->take(5)->get();

        return view('dashboard.backend.accountant.index', compact(
            'totalRevenue',
            'totalExpenses',
            'profit',
            'unpaidInvoicesCount',
            'months',
            'revenueData',
            'expenseCategories',
            'expenseData',
            'latestInvoices'
        ));
    }
}
