<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockMovement;
use App\Models\Ingredient;
use App\Models\Invoice;
use Illuminate\Validation\ValidationException;

class StockMovementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:stock-movements-read')->only(['index']);
        $this->middleware('permission:stock-movements-create')->only(['create', 'store']);
        $this->middleware('permission:stock-movements-update')->only(['edit', 'update']);
        $this->middleware('permission:stock-movements-delete')->only(['destroy']);

    }

    public function index()
    {
        $movements = StockMovement::with(['ingredient', 'invoice'])->latest()->get();
        return view('dashboard.backend.stock_movements.index', compact('movements'));
    }

    public function create()
    {
        $ingredients = Ingredient::all();
        $invoices = Invoice::all();
        return view('dashboard.backend.stock_movements.create', compact('ingredients', 'invoices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ingredient_id' => 'required|exists:ingredients,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|numeric|min:0.01',
            'invoice_id' => 'nullable|exists:invoices,id',
            'source' => 'nullable|string|max:255',
        ]);

        $movement = new StockMovement();
        $movement->ingredient_id = $request->ingredient_id;
        $movement->type = $request->type;
        $movement->quantity = $request->quantity;
        $movement->invoice_id = $request->invoice_id;
        $movement->source = $request->source;

        if ($request->type === 'out') {
            $ingredient = Ingredient::findOrFail($request->ingredient_id);
            if ($ingredient->current_stock < $request->quantity) {
                throw ValidationException::withMessages([
                    'quantity' => 'لا يمكن صرف كمية أكبر من المخزون المتاح.',
                ]);
            }
        }

        $movement->save();

        return redirect()->route('admin.stock-movements.index')->with('success', 'تم تسجيل الحركة بنجاح.');
    }

    public function edit($id)
    {
        $movement = StockMovement::findOrFail($id);
        $ingredients = Ingredient::all();
        $invoices = Invoice::all();
        return view('dashboard.backend.stock_movements.edit', compact('movement', 'ingredients', 'invoices'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ingredient_id' => 'required|exists:ingredients,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|numeric|min:0.01',
            'invoice_id' => 'nullable|exists:invoices,id',
            'source' => 'nullable|string|max:255',
        ]);

        $movement = StockMovement::findOrFail($id);
        $oldIngredientId = $movement->ingredient_id;
        $oldType = $movement->type;
        $oldQuantity = $movement->quantity;

        $ingredient = Ingredient::findOrFail($request->ingredient_id);
        $currentStock = $ingredient->current_stock;
        if ($oldIngredientId == $request->ingredient_id && $oldType === 'out') {
            $currentStock += $oldQuantity;
        }

        if ($request->type === 'out' && $currentStock < $request->quantity) {
            throw ValidationException::withMessages([
                'quantity' => 'لا يمكن صرف كمية أكبر من المخزون المتاح.',
            ]);
        }

        $movement->ingredient_id = $request->ingredient_id;
        $movement->type = $request->type;
        $movement->quantity = $request->quantity;
        $movement->invoice_id = $request->invoice_id;
        $movement->source = $request->source;
        $movement->save();

        return redirect()->route('admin.stock-movements.index')->with('success', 'تم تعديل بيانات الحركة بنجاح.');
    }

    public function destroy($id)
    {
        $movement = StockMovement::findOrFail($id);
        $movement->delete();
        return redirect()->route('admin.stock-movements.index')->with('success', 'تم حذف الحركة.');
    }

public function report(Request $request)
{
    $movements = StockMovement::with('ingredient')
        ->when($request->ingredient_id, fn($q) => $q->where('ingredient_id', $request->ingredient_id))
        ->when($request->type, fn($q) => $q->where('type', $request->type))
        ->when($request->from, fn($q) => $q->whereDate('created_at', '>=', $request->from))
        ->when($request->to, fn($q) => $q->whereDate('created_at', '<=', $request->to))
        ->latest()
        ->get();

    $ingredients = Ingredient::all();

    // Total
    $total_in = $movements->where('type', 'in')->sum('quantity');
    $total_out = $movements->where('type', 'out')->sum('quantity');

    return view('dashboard.backend.stock_movements.report', compact('movements', 'ingredients', 'total_in', 'total_out'));
}


}
