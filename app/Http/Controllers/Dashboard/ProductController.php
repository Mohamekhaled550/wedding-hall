<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:products-read')->only(['index']);
        $this->middleware('permission:products-create')->only(['create', 'store']);
        $this->middleware('permission:products-update')->only(['edit', 'update']);
        $this->middleware('permission:products-delete')->only(['destroy']);
    }

    public function index()
    {
        $products = Product::orderByDesc('id')->get();
        return view('dashboard.backend.products.index' , compact('products'));
    }


    public function create()
    {
        $sections = Section::get();
        return view('dashboard.backend.products.create' , compact('sections'));
    }


    public function store(ProductRequest $request)
    {
        // استبعاد img و section_id من البيانات المحفوظة في المنتجات
        $data = $request->except('img', 'section_id');

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('products');
        }

        // إنشاء المنتج أولًا بدون section_id
        $product = Product::create($data);

        // حفظ العلاقة في الجدول الوسيط إذا كان هناك سكاشن مختارة
        if ($request->has('section_id')) {
            $product->sections()->sync($request->section_id);

        }

        return redirect(route('admin.products.index'))->with('success', 'Data Created Successfully');
}


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $sections = Section::get();
        $product = Product::where('id' , $id)->first();
        return view('dashboard.backend.products.edit' , compact('product' , 'sections'));
    }


    public function update(ProductRequest $request, string $id)
    {
        $product = Product::where('id' , $id)->first();
        $data = $request->except('img' , 'id');

        if ($request->hasFile('img') && $product->img) {
            Storage::delete($product->img);
            $data['img'] = $request->file('img')->store('products');

        }else {
            $data['img'] = $request->file('img')->store('products');
        }

        $product->update($data);
        return redirect(route('admin.products.index'))->with('success', 'Data Updated Successfully');

    }


    public function destroy(string $id)
    {
        $product = Product::where('id' , $id)->first();
        Storage::delete($product->img);
        $product->delete();
        return redirect(route('admin.products.index'))->with('success', 'Data Deleted Successfully');
    }
}
