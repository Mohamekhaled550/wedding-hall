<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\HelperTrait;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Ingredient;


class StockController extends Controller
{
    use HelperTrait ;

    public function __construct()
    {
        $this->middleware('permission:stocks-read')->only(['index']);
        $this->middleware('permission:stocks-create')->only(['create', 'store']);
        $this->middleware('permission:stocks-update')->only(['edit', 'update']);
        $this->middleware('permission:stocks-delete')->only(['destroy']);
    }


      public function index()
    {
        $stocks = Stock::with('ingredient')->get();
        return view('dashboard.backend.stocks.index', compact('stocks'));
    }

    public function create()
    {
        $ingredients = Ingredient::all();
        return view('dashboard.backend.stocks.create', compact('ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ingredient_id' => 'required|exists:ingredients,id',
            'quantity' => 'required|numeric|min:0',
        ]);

        Stock::create($request->all());
        return redirect()->route('admin.stocks.index')->with('success', 'Stock added!');
    }

    public function edit(Stock $stock)
    {
        $ingredients = Ingredient::all();
        return view('dashboard.backend.stocks.edit', compact('stock', 'ingredients'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'ingredient_id' => 'required|exists:ingredients,id',
            'quantity' => 'required|numeric|min:0',
        ]);

        $stock->update($request->all());
        return redirect()->route('admin.stocks.index')->with('success', 'Stock updated!');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('admin.stocks.index')->with('success', 'Stock deleted!');
    }
}
