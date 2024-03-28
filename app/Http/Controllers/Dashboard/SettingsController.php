<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    
    public function index()
    {
        $setting = Setting::where('type' , 'setting')->first();  
        return view('dashboard.backend.settings.index' , compact('setting'));
    }
   
    public function update(Request $request, string $id)
    {
        $setting = Setting::where('id' , $id)->first();
        $data = $request->all();    
        $setting->update($data);
        return redirect(route('admin.settings.index'))->with('success', 'Data Updated Successfully');
    }

   
}
