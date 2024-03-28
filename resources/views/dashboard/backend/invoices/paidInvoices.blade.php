@extends('dashboard.layouts.master')

@section('title')
 Paid Invoices
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
                    <span class="card-label fw-bolder fs-3 mb-1">New Paid Invoices</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Over {{ $invoices->count() }} New Paid Invoices</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.invoices.create') }}" class="btn btn-sm btn-light-primary">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->New Invoices</a>
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
                                        <a href="{{ route('admin.invoices.show' , $invoice->id )  }}" style="color: rgb(97, 97, 196)">
                                          <span class="d-block fs-7">{{ $invoice->invoice_number }}</span>
                                        </a>
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
                                       
                                        <a href="{{ route('admin.invoices.pay' , $invoice->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <span class="svg-icon svg-icon-3">
                                                <i class="fas fa-money-check-alt"></i>
                                            </span>
                                        </a>

                                        <a href="{{ route('admin.invoices.edit' , $invoice->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                                </svg>
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