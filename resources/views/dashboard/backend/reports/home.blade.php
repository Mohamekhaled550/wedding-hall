@php
    $sections = App\Models\Section::get();
    $products = App\Models\Section::get();
    $invoices = App\Models\Invoice::get();

@endphp



@extends('dashboard.layouts.master')



@section('title')
 Reports Homepage
@endsection


@section('content')
<div class="row gx-5 gx-xl-8">
    <div class="col-xxl-6 mb-5 mb-xl-8">
        <a href="{{ route('admin.reports.index') }}" class="card card-xxl-stretch bg-warning">
            <div class="card-body d-flex flex-column justify-content-between">
                <i class="ki-duotone ki-graph text-white fs-2hx ms-n1 flex-grow-1"><span class="path1"></span><span class="path2"></span></i>
                <div class="d-flex flex-column">
                    <div class="text-white fw-bold fs-1 mb-0 mt-5">Hall 1
                    </div>
                    <div class="text-white fw-semibold fs-6">View monthly and yearly reports</div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row gx-5 gx-xl-8">
    <div class="col-xxl-6 mb-5 mb-xl-8">
        <a href="{{ route('admin.reports.indexi') }}" class="card card-xxl-stretch bg-warning">
            <div class="card-body d-flex flex-column justify-content-between">
                <i class="ki-duotone ki-graph text-white fs-2hx ms-n1 flex-grow-1"><span class="path1"></span><span class="path2"></span></i>
                <div class="d-flex flex-column">
                    <div class="text-white fw-bold fs-1 mb-0 mt-5">Hall 2</div>
                    <div class="text-white fw-semibold fs-6">View products import - export reports</div>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection
