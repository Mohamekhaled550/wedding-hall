<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:stocks-read')->only(['index']);
    }

    public function index()
    {
        $ingredients = Ingredient::with('category')->get()->map(function ($ingredient) {
            $ingredient->stock_value = $ingredient->current_stock * ((float) $ingredient->unit_price);
            return $ingredient;
        });

        $totalStockValue = $ingredients->sum('stock_value');
        $lowStockCount = $ingredients->filter(fn ($item) => $item->isLowStock())->count();

        return view('dashboard.backend.stocks.index', compact('ingredients', 'totalStockValue', 'lowStockCount'));
    }
}
