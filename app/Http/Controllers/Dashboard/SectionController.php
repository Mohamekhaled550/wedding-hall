<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:sections-read')->only(['index']);
        $this->middleware('permission:sections-create')->only(['create', 'store']);
        $this->middleware('permission:sections-update')->only(['edit', 'update']);
        $this->middleware('permission:sections-delete')->only(['destroy']);
    }
    
    public function index()
    {
        $sections = Section::get();
        return view('dashboard.backend.sections.index' , compact('sections'));
    }

    
    public function create()
    {
        return view('dashboard.backend.sections.create');

    }

   
    public function store(SectionRequest $request)
    {
        $data = $request->except('Created_by');
        $data['Created_by']  = Auth::user()->name ;
        Section::create($data);
        return redirect(route('admin.sections.index'))->with('success', 'Data Created Successfully');
        
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $section = Section::where('id' , $id)->first();
        return view('dashboard.backend.sections.edit', compact('section'));

    }

   
    public function update(SectionRequest $request, string $id)
    {
        
        $section = Section::where('id' , $id)->first();
        $data = $request->except('Created_by');
        $data['Created_by']  = Auth::user()->name ;


        $section->update($data);
        return redirect(route('admin.sections.index'))->with('success', 'Data Updated Successfully');
    }

   
    public function destroy(string $id)
    {
        $section = Section::where('id' , $id)->delete();
        return redirect(route('admin.sections.index'))->with('success', 'Data Deleted Successfully');
    }


    public function products($section_id){
        return Product::where('section_id' , $section_id)->pluck('name' , 'id');
    }
}
