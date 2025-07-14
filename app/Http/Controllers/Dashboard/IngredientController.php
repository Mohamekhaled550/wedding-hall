<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Models\Ingredient;
use App\Models\Category;
use Illuminate\Http\Request;


class IngredientController extends Controller
{
    use HelperTrait ;

    public function __construct()
    {
        $this->middleware('permission:ingredients-read')->only(['index']);
        $this->middleware('permission:ingredients-create')->only(['create', 'store']);
        $this->middleware('permission:ingredients-update')->only(['edit', 'update']);
        $this->middleware('permission:ingredients-delete')->only(['destroy']);
    }


   public function index()
    {
        $ingredients = Ingredient::all();
        return view('dashboard.backend.ingredients.index', compact('ingredients'));
    }

    public function create()
    {
    $categories = \App\Models\Category::all(); // ✅ هات كل الأقسام
        return view('dashboard.backend.ingredients.create',compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'unit' => 'required|string',
            'unit_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',

        ]);

Ingredient::create([
  'name' => $request->name,
  'unit' => $request->unit,
  'unit_price' => $request->unit_price,
  'category_id' => $request->category_id,
]);        return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient added successfully!');
    }

    public function edit(Ingredient $ingredient)
    {
    $categories = \App\Models\Category::all(); // ✅ هات كل الأقسام
        return view('dashboard.backend.ingredients.edit', compact('ingredient','categories'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required|string',
            'unit' => 'required|string',
            'unit_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',

        ]);

        $ingredient->update($request->all());
        return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient updated!');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient deleted!');
    }
}
