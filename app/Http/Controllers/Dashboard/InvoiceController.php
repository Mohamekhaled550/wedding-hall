<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\EmailController;
use App\Http\Requests\InvoiceRequest;
use App\Mail\AddedInvoice;
use App\Models\Invoice;
use App\Models\InvoicesAttachments;
use App\Models\InvoicesDetails;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Section;
use App\Notifications\AddInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:invoices-read')->only(['index']);
        $this->middleware('permission:invoices-create')->only(['create', 'store']);
        $this->middleware('permission:invoices-update')->only(['edit', 'update']);
        $this->middleware('permission:invoices-delete')->only(['destroy']);
    }

    public function index()
    {
        $invoices = Invoice::get();
        return view('dashboard.backend.invoices.index' , compact('invoices'));
    }

    public function create(Request $request)
    {
        $sections = Section::with('products')->get(); // نجلب الأقسام بالمنتجات المرتبطة بها
        return view('dashboard.backend.invoices.create', compact('sections'));
    }



    public function store(InvoiceRequest $request)
    {
        $alreadyBooked = Invoice::where('section_id', $request->section_id)
    ->whereDate('due_date', $request->due_date)
    ->exists();

if ($alreadyBooked) {
            return redirect(route('admin.invoices.index'))->with('error', 'هذه القاعة محجوزة بالفعل في هذا اليوم');

}

        $data = $request->except('img');
        $data['Status'] = 'غير مدفوعه';
        $data['value_status'] = '2';


    // القيم الجديدة من الفورم (لو مش موجودة هترجع null أو 0)
    $data['rooms_enabled']       = $request->has('rooms_enabled') ? 1 : 0;
    $data['rooms_count']         = $request->rooms_count;
    $data['room_price']         = $request->room_price;

    $data['photo_enabled'] = $request->has('photo_enabled') ? 1 : 0;
    $data['photo_price']  = $request->photo_price;

    $data['songs_enabled']     = $request->has('songs_enabled') ? 1 : 0;
    $data['songs_count']      = $request->songs_count;
    $data['song_price']      = $request->song_price;

    $data['service_enabled']     = $request->has('service_enabled') ? 1 : 0;
    $data['service_price']      = $request->service_price;

    $data['extra_option_enabled']       = $request->has('extra_option_enabled') ? 1 : 0;
    $data['extra_option_name']         = $request->extra_option_name;
    $data['extra_option_price']        = $request->extra_option_price;



    $invoice = Invoice::create($data);


    $product = Product::with('ingredients')->find($request->product_id);

foreach ($product->ingredients as $ingredient) {
        $required_qty = $ingredient->pivot->quantity_per_plate * $request->number_of_people;

        StockMovement::create([
            'ingredient_id' => $ingredient->id,
            'quantity' => $required_qty,
            'movement_type' => 'out',
            'note' => 'Auto consumption for invoice #' . $invoice->id,
        ]);
    }


        $product_name = Product::where('id' , $request->product_id)->first()->name;
        $section_name = Section::where('id' , $request->section_id)->first()->name;
        $invoice_id = Invoice::latest()->first()->id;

        InvoicesDetails::create([
            'invoice_id' => $invoice_id,
            'invoice_number' => $request->invoice_number,

            'product' => $product_name,
            'Section' => $section_name,
            'Status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);


        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $file) {
                $data = $file->store('invoices' . '/' . $request->invoice_number);
                InvoicesAttachments::create([
                    'invoice_id' => $invoice_id,
                    'invoice_number' => $request->invoice_number,
                    'Created_by' => (Auth::user()->name),
                    'file_name' => $data,
                ]);
            }
        }

        Notification::create([

            'title' => 'تم اصافه فاتوره جديده ' . $invoice->invoice_number . ' بواسطه ' . Auth::user()->name ,
            'invoice_id' => $invoice->id ,
            'user_id' =>  Auth::user()->id
        ]);



        return redirect(route('admin.invoices.index'))->with('success', 'Data Created Successfully');

    }


    public function show(string $id)
    {
        $invoice = Invoice::with('attachments')->findOrFail($id);

        $invoiceDetails = InvoicesDetails::where("invoice_id" , $id)->get();
        $invoicesAttachments = InvoicesAttachments::where("invoice_id" , $id)->get();

        if ($invoicesAttachments) {
            foreach ($invoicesAttachments as $invoicesAttachment) {
                $invoicesAttachment->file_name = basename($invoicesAttachment->file_name);
            }
        }

        $notify = Notification::where('invoice_id' , $invoice->id)->first();
        if($notify){
            $notify->update([
              'read' => 1
            ]);
        }

        return view('dashboard.backend.invoices.show' , compact('invoice' , 'invoiceDetails' , 'invoicesAttachments'));
    }




    public function edit(string $id)
    {
        $sections = Section::get();
        $products = Product::orderByDesc('id')->get();

        $invoice = Invoice::where('id' , $id)->first();
        return view('dashboard.backend.invoices.edit' , compact('invoice' , 'sections' , 'products'));

    }




    public function update(InvoiceRequest $request, string $id)
    {
        $invoice = Invoice::where('id' , $id)->first();
        $data = $request->except('img' , 'id');
        $data['Status'] = 'غير مدفوعه';
        $data['value_status'] = '2';

        $invoice->update($data);
        return redirect(route('admin.invoices.index'))->with('success', 'Data Updated Successfully');


    }


    public function destroy(string $id)
    {
        $invoice = Invoice::where('id' , $id)->first();
        $invoice->delete();
$movements = \App\Models\StockMovement::where('invoice_id', $invoice->id)->get();
foreach ($movements as $movement) {
    \App\Models\StockMovement::create([
        'ingredient_id' => $movement->ingredient_id,
        'type' => 'in',
        'quantity' => $movement->quantity,
        'invoice_id' => $invoice->id,
        'source' => 'Revert: invoice #' . $invoice->invoice_number,
    ]);
    $movement->delete();
}

        return redirect(route('admin.invoices.index'))->with('success', 'Added to archive');
    }



    public function getArchives()
    {
        $invoices = Invoice::onlyTrashed()->get();
        return view('dashboard.backend.invoices.archived' , compact('invoices'));
    }

    public function deleteArchives($id)
    {

        $invoice = Invoice::withTrashed()->where('id' , $id)->first();
        // Storage::delete($invoice->img);
        $attachments = InvoicesAttachments::where('invoice_number' , $invoice->invoice_number)->get();
        foreach ($attachments as $attachment) {
            if ($attachment->file_name) {
                Storage::delete($attachment->file_name);
            }

        }

        $invoice->forceDelete();
        return redirect(route('admin.invoices.index'))->with('success', 'Data Deleted Successfully');
    }

    public function restoreArchives($id)
    {
        Invoice::withTrashed()->where('id' , $id)->restore();

        return redirect()->back()->with('success', 'Data Restored Successfully');
    }

    public function getproducts($id)
    {
        $products = DB::table("products")->where("section_id", $id)->pluck("Product_name", "id");
        return json_encode($products);
    }

    public function pay(string $id)
    {
        $sections = Section::get();
        $products = Product::orderByDesc('id')->get();
        $invoice = Invoice::where('id' , $id)->first();
        return view('dashboard.backend.invoices.pay' , compact('invoice' , 'sections' , 'products'));

    }



    public function Status_Updatee($id, Request $request)
    {
        $invoice = Invoice::where('id' , $id)->first();
        $data = $request->only('Payment_Date' , 'Status');
        if ($request->Status) {

            if ($request->Status == 'مدفوعة') {
                $data['value_status'] = '1';

            } elseif ($request->Status == 'مدفوعة جزئيا') {
                $data['value_status'] = '3';
            }

           $invoice->update([
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
                'value_status' => $data['value_status'],
            ]);

            InvoicesDetails::create([
                'invoice_id' => $invoice->id,
                'invoice_number' => $invoice->invoice_number,
                'product' => $invoice->product->name,
                'Section' => $invoice->section->name,
                'Status' =>  $request->Status,
                'Payment_Date' => $request->Payment_Date,
                'Value_Status' => $data['value_status'],
                'user' => (Auth::user()->name),
            ]);

        }


        return redirect(route('admin.invoices.index'))->with('success', 'Data Updated Successfully');

    }



    public function Invoice_Paid(Request $request)
    {
        $query = Invoice::where('value_status', 1); // فواتير مدفوعة




        // تصفية حسب الشهر إذا كان مُحددًا
    if ($request->has('month') && !empty($request->month)) {
        $query->whereMonth('Payment_Date', $request->month);
    }

    $invoices = $query->get();
        return view('dashboard.backend.invoices.index', compact('invoices'));
    }

    public function Invoice_Unpaid()
    {
        $query = Invoice::where('value_status', 2); // فواتير مدفوعة




        // تصفية حسب الشهر إذا كان مُحددًا
    if ($request->has('month') && !empty($request->month)) {
        $query->whereMonth('Payment_Date', $request->month);
    }

    $invoices = $query->get();
        return view('dashboard.backend.invoices.index', compact('invoices'));
    }

    public function Invoice_Partial()
    {
        $invoices = Invoice::where('value_status', 3)->get();
        return view('dashboard.backend.invoices.index', compact('invoices'));
    }


    public function print(string $id)
    {
        $invoice = Invoice::where('id', $id)->first();
        return view('dashboard.backend.invoices.print' , compact('invoice'));
    }


public function calendar(Request $request)
{
    $hall = $request->hall;
    $sections = Section::all();
    $allDates = \Carbon\CarbonPeriod::create(now(), now()->addDays(180));

    if ($hall == '1' || $hall == '2') {
        $hallId = intval($hall);

        // الفواتير الحالية للقاعـة المختارة فقط
        $invoices = Invoice::where('section_id', $hallId)->get();

        // نحسب الأيام المشغولة للقاعـة
        $busyDates = $invoices->pluck('due_date')->unique()->toArray();

        // نضيف الأيام المتاحة كـ أحداث إضافية
        foreach ($allDates as $date) {
            $dateStr = $date->format('Y-m-d');
            if (!in_array($dateStr, $busyDates)) {
                $invoices->push((object)[
                    'id' => null,
                    'invoice_number' => '',
                    'invoice_Date' => $dateStr,
                    'due_date' => $dateStr,
                    'value_status' => 0,
                    'Status' => 'متاح',
                    'section_id' => null,
                    'section' => (object)['name' => 'Hall ' . $hall . ' free']
                ]);
            }
        }

    } elseif ($hall == 'both') {
        $busyDates = Invoice::select('due_date', 'section_id')->get()
            ->groupBy('due_date')
            ->map(fn($items) => $items->pluck('section_id')->toArray());

        $availableDates = collect();
        foreach ($allDates as $date) {
            $dateStr = $date->format('Y-m-d');
            $bookedSections = $busyDates[$dateStr] ?? [];
            if (!in_array(1, $bookedSections) && !in_array(2, $bookedSections)) {
                $availableDates->push($dateStr);
            }
        }

        $invoices = $availableDates->map(function ($date) {
            return (object)[
                'id' => null,
                'invoice_number' => '',
                'invoice_Date' => $date,
                'due_date' => $date,
                'value_status' => 0,
                'Status' => 'متاح',
                'section_id' => null,
                'section' => (object)['name' => 'All Free']
            ];
        });

    } else {
        $invoices = Invoice::select('id', 'invoice_number', 'invoice_Date', 'due_date', 'value_status', 'Status', 'section_id')->get();
    }

    return view('dashboard.backend.invoices.calendar', compact('invoices', 'hall', 'sections'));
}




}
