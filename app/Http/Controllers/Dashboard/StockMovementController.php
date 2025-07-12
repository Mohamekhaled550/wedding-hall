<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\HelperTrait;
use Illuminate\Http\Request;
use App\Models\StockMovement;


class StockMovementController extends Controller
{
    use HelperTrait ;

    public function __construct()
    {
        $this->middleware('permission:stock-movements-read')->only(['index']);
        $this->middleware('permission:stock-movements-create')->only(['create', 'store']);
        $this->middleware('permission:stock-movements-update')->only(['edit', 'update']);
        $this->middleware('permission:stock-movements-delete')->only(['destroy']);
    }


      public function index()
    {
        $movements = StockMovement::with('ingredient')->latest()->get();
        return view('dashboard.backend.stock_movements.index', compact('movements'));
    }

    public function create()
    {
        return view('dashboard.backend.admins.create');

    }


    public function store(Request $request)
    {
        $data = $request->except('img');
        $this->addImage($request, $data, 'img', 'admins');
        return redirect(route('admin.admins.index'))->with('success', 'Data Created Successfully');

    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $admin = User::where('id' , $id)->first();
        return view('dashboard.backend.admins.edit' , compact('admin'));
    }


    public function update(Request $request, string $id)
    {

        $admin = User::where('id' , $id)->first();
        $data = $request->except('img');
        $this->updateImg($request, $data, 'img', 'admins' , $admin);
        $admin->update($data);
        return redirect(route('admin.admins.index'))->with('success', 'Data Created Successfully');

    }


    public function destroy(string $id)
    {
        $admin = User::where('id' , $id)->delete();
        return redirect(route('admin.admins.index'))->with('success', 'Data Deleted Successfully');
    }
}
