@php
    $sections = App\Models\Section::get();
    $products = App\Models\Section::get();
    $invoices = App\Models\Invoice::get();

@endphp

@extends('dashboard.layouts.master')


@section('title')
 Home
@endsection


@section('content')





        @php
    use Carbon\Carbon;

    // الحصول على اسم الشهر الحالي
    $currentMonth = Carbon::now()->format('F'); // اسم الشهر بالإنجليزية
    $currentMonthInvoicesCount = App\Models\Invoice::whereMonth('due_date', Carbon::now()->month)->count(); // عدد الفواتير في الشهر الحالي
@endphp

<div class="row gx-5 gx-xl-8">
    <div class="col-xxl-6 mb-5 mb-xl-8">
        <a href="{{ route('admin.invoices.calendar') }}" class="card card-xxl-stretch bg-primary">
            <div class="card-body d-flex flex-column justify-content-between">
                <i class="ki-duotone ki-element-11 text-white fs-2hx ms-n1 flex-grow-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
                <div class="d-flex flex-column">
                    <!-- عرض اسم الشهر الحالي -->
                    <div class="text-white fw-bold fs-1 mb-0 mt-5">{{ $currentMonth }}</div>

                    <!-- عرض عدد الفواتير في الشهر الحالي -->
                    <div class="text-white fw-semibold fs-6">{{ $currentMonthInvoicesCount }} Invoices</div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row gx-5 gx-xl-8">
    <div class="col-xxl-6 mb-5 mb-xl-8">
        <a href="{{ route('admin.reports.home') }}" class="card card-xxl-stretch bg-warning">
            <div class="card-body d-flex flex-column justify-content-between">
                <i class="ki-duotone ki-graph text-white fs-2hx ms-n1 flex-grow-1"><span class="path1"></span><span class="path2"></span></i>
                <div class="d-flex flex-column">
                    <div class="text-white fw-bold fs-1 mb-0 mt-5">Reports</div>
                    <div class="text-white fw-semibold fs-6">View monthly and yearly reports</div>
                </div>
            </div>
        </a>
    </div>
</div>




@endsection
