@extends('dashboard.layouts.master')

@section('title')
Archived invoices
@endsection


@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
      
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
         @endif
        <div class="card mb-5 mb-xl-8">
            
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">New Archived invoices</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Over {{ $invoices->count() }} New Archived invoices</span>
                </h3>
                <div class="card-toolbar ">
                    <a href="{{ route('admin.invoices.index') }}" class="btn btn-sm btn-light-primary " style="margin-right: 3px;">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-2">
                        <i class="fas fa-file-invoice"></i>
                    </span>
                    <!--end::Svg Icon--> Invoices</a>
                </div>
            </div>
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 min-w-40px rounded-start">Invoices</th>
                                <th class="min-w-50px">رقم الفاتوره</th>
                                <th class="min-w-50px text-end rounded-end">تاريخ الفاتوره</th>
                                <th class="min-w-50px text-end rounded-end">تاريخ الاستحقاق</th>
                                <th class="min-w-40px text-end rounded-end">المنتج</th>
                                <th class="min-w-40px text-end rounded-end">القسم</th>
                                <th class="min-w-50px text-end rounded-end">مبلغ العموله</th>
                                <th class="min-w-50px text-end rounded-end">مبلغ التحصيل</th>
                                <th class="min-w-40px text-end rounded-end">الخصم</th>
                                <th class="min-w-30px text-end rounded-end">نسبه الضريبه</th>
                                <th class="min-w-50px text-end rounded-end">قيمه الضريبه</th>
                                <th class="min-w-50px text-end rounded-end">الاجمالي</th>
                                <th class="min-w-50px text-end rounded-end">الحاله</th>
                                <th class="min-w-85px text-end rounded-end"></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>

                            @foreach ($invoices as $invoice)
                                <tr>
                                  
                                    <td>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">{{ $loop->iteration }}</span>
                                    </td>

                                    <td>
                                          <span class="d-block fs-7">{{ $invoice->invoice_number }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->invoice_Date }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->due_date }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->product_id }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  text-end d-block fs-7">{{ $invoice->section->name }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->Amount_Commission }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->Amount_collection }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->discount }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->rate_vat }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->value_vat }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->Total }}</span>
                                    </td>

                                    <td>
                                        @if ($invoice->value_status == 1)
                                            <span class="text-success fw-bold">{{ $invoice->Status }}</span>
                                        @elseif($invoice->value_status == 2)
                                            <span class="text-danger fw-bold">{{ $invoice->Status }}</span>
                                        @else
                                            <span class="text-warning fw-bold">{{ $invoice->Status }}</span>
                                        @endif

                                    </td>

                                    
                                  

                                    
                                    <td class="text-end">
                                       


                                        <a href="{{ route('admin.invoices-restoreArchives' , $invoice->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="fas fa-trash-restore"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <a href="" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $invoice->id }}">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                </svg>
                                            </span>
                                        </a>

                                        @include('dashboard.backend.invoices.delete')
                                    </td>

                                </tr>
                                
                            @endforeach
                          
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
   
       
       
    </div>
    <!--end::Container-->
</div>

@endsection