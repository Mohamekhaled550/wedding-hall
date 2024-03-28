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

    <div class="row">
        <div class="row gx-5 gx-xl-8">
            <div class="col-xxl-6 mb-5 mb-xl-8">
                <a href="#" class="card card-xxl-stretch bg-primary">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <i class="ki-duotone ki-element-11 text-white fs-2hx ms-n1 flex-grow-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>        
                        <div class="d-flex flex-column">
                            <div class="text-white fw-bold fs-1 mb-0 mt-5">{{ $products->count() }} </div>
                            <div class="text-white fw-semibold fs-6">Products</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xxl-6 mb-5 mb-xl-0">
                <a href="#" class="card card-xxl-stretch bg-body">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <i class="ki-duotone ki-rocket text-success fs-2hx ms-n1 flex-grow-1"><span class="path1"></span><span class="path2"></span></i>        
                        <div class="d-flex flex-column">
                            <div class="text-gray-900 fw-bold fs-1 mb-0 mt-5">{{ $sections->count() }} </div>
                            <div class="text-muted fw-semibold fs-6">Sections</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row gx-5 gx-xl-8">
            <div class="col-xxl-6 mb-5 mb-xl-8">
                <a href="#" class="card card-xxl-stretch bg-primary">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <i class="ki-duotone ki-element-11 text-white fs-2hx ms-n1 flex-grow-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>        
                        <div class="d-flex flex-column">
                            <div class="text-white fw-bold fs-1 mb-0 mt-5">{{ $invoices->count() }} </div>
                            <div class="text-white fw-semibold fs-6">Invoices</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xxl-6 mb-5 mb-xl-0">
                <a href="#" class="card card-xxl-stretch bg-body">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <i class="ki-duotone ki-rocket text-success fs-2hx ms-n1 flex-grow-1"><span class="path1"></span><span class="path2"></span></i>        
                        <div class="d-flex flex-column">
                            <div class="text-gray-900 fw-bold fs-1 mb-0 mt-5">{{ $sections->count() }} </div>
                            <div class="text-muted fw-semibold fs-6">Sections</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
   

@endsection