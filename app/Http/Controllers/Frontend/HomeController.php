<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Invoice;
use Carbon\Carbon;

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

    public function calendar()
    {
        $settings = Setting::first();

        $bookings = Invoice::query()
            ->select(['due_date', 'section_id'])
            ->with('section:id,name')
            ->whereDate('due_date', '>=', now()->startOfMonth())
            ->orderBy('due_date')
            ->get()
            ->groupBy(fn ($invoice) => Carbon::parse($invoice->due_date)->format('Y-m-d'))
            ->map(function ($items, $date) {
                return [
                    'date' => $date,
                    'halls' => $items->pluck('section.name')->filter()->values()->all(),
                ];
            })
            ->values();

        return view('frontend.calendar', compact('settings', 'bookings'));
    }
}
