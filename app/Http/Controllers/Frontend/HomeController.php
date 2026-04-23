<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sections = Section::with('products')->get();
        $settings = Setting::first();

        return view('frontend.home', compact('sections', 'settings'));
    }

    public function services()
    {
        $sections = Section::with('products')->get();
        $settings = Setting::first();

        return view('frontend.services', compact('sections', 'settings'));
    }

    public function gallery()
    {
        $settings = Setting::first();

        return view('frontend.gallery', compact('settings'));
    }

    public function contact()
    {
        $settings = Setting::first();

        return view('frontend.contact', compact('settings'));
    }

    public function about()
    {
        $settings = Setting::first();

        return view('frontend.about', compact('settings'));
    }
}
