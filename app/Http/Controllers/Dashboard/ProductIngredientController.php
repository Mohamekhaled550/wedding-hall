<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\HelperTrait;
use Illuminate\Http\Request;
use App\Models\ProductIngredient;
use App\Models\Product;
use App\Models\Ingredient;

class ProductIngredientController extends Controller
{
    use HelperTrait ;

    public function __construct()
    {
        $this->middleware('permission:products-ingredients-read')->only(['index']);
        $this->middleware('permission:products-ingredients-create')->only(['create', 'store']);
        $this->middleware('permission:products-ingredients-update')->only(['edit', 'update']);
        $this->middleware('permission:products-ingredients-delete')->only(['destroy']);
    }



    public function index()
    {
        $productIngredients = ProductIngredient::with(['product', 'ingredient'])->get();
        return view('dashboard.backend.product_ingredients.index', compact('productIngredients'));
    }

    public function create()
    {
        $products = Product::all();
        $ingredients = Ingredient::all();
        return view('dashboard.backend.product_ingredients.create', compact('products', 'ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'ingredient_id' => 'required|exists:ingredients,id',
            'quantity_per_plate' => 'required|numeric|min:0',
        ]);

        ProductIngredient::create($request->all());
        return redirect()->route('admin.product-ingredients.index')->with('success', 'Ingredient added to product!');
    }

    public function edit(ProductIngredient $productIngredient)
    {
        $products = Product::all();
        $ingredients = Ingredient::all();
        return view('dashboard.backend.product_ingredients.edit', compact('productIngredient', 'products', 'ingredients'));
    }

    public function update(Request $request, ProductIngredient $productIngredient)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'ingredient_id' => 'required|exists:ingredients,id',
            'quantity_per_plate' => 'required|numeric|min:0',
        ]);

        $productIngredient->update($request->all());
        return redirect()->route('admin.product-ingredients.index')->with('success', 'Updated successfully!');
    }

    public function destroy(ProductIngredient $productIngredient)
    {
        $productIngredient->delete();
        return redirect()->route('admin.product-ingredients.index')->with('success', 'Deleted!');
    }
}
