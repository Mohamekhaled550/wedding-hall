@extends('dashboard.layouts.master')

@section('title')
 Invoice Details
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
            
         
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <div class="card mb-5 mb-xl-8">
          
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item fw-bolder fs-6" role="presentation">
                              <a class="nav-link active " id="justified-tab-0" data-bs-toggle="tab" href="#justified-tabpanel-0" role="tab" aria-controls="justified-tabpanel-0" aria-selected="true"> Invoice Information </a>
                            </li>
                            <li class="nav-item fw-bolder fs-6" role="presentation">
                              <a class="nav-link" id="justified-tab-1" data-bs-toggle="tab" href="#justified-tabpanel-1" role="tab" aria-controls="justified-tabpanel-1" aria-selected="false"> Invoice Details </a>
                            </li>
                            <li class="nav-item fw-bolder fs-6" role="presentation">
                              <a class="nav-link" id="justified-tab-2" data-bs-toggle="tab" href="#justified-tabpanel-2" role="tab" aria-controls="justified-tabpanel-2" aria-selected="false"> Invoice Attachments </a>
                            </li>
                          </ul>

                          <div class="tab-content pt-5" id="tab-content">
                            
                            <div class="tab-pane active" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                
                                <div class="row">
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                    
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1"> Invoice Number</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->invoice_number }}</span>
                                            </div>
                                        </div>
        
                                    </div>
        
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                    
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1"> Invoice Date</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->invoice_Date }}</span>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                    
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Due Date</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->due_date }}</span>
                                            </div>
                                        </div>
        
                                    </div>
        
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                        
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Product</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->product->name}}</span>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                    
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Section</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->section->name }}</span>
                                            </div>
                                        </div>
        
                                    </div>
        
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                        
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Amount Commission</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->Amount_Commission }}</span>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                    
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Amount Collection</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->Amount_collection }}</span>
                                            </div>
                                        </div>
        
                                    </div>
        
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                        
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Discount</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->discount }}</span>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                    
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Rate Vat</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->rate_vat }}</span>
                                            </div>
                                        </div>
        
                                    </div>
        
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                        
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Value vat</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->value_vat }}</span>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                    
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Total</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->Total }}</span>
                                            </div>
                                        </div>
        
                                    </div>
        
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                        
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Invoice Status</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                @if ($invoice->value_status == 1)
                                                    <span class="text-success card-label  fs-5 mb-1">{{ $invoice->Status }}</span>
                                                @elseif($invoice->value_status == 2)
                                                    <span class="text-danger card-label  fs-5 mb-1">{{ $invoice->Status }}</span>
                                                @else
                                                    <span class="text-warning card-label  fs-5 mb-1">{{ $invoice->Status }}</span>
                                                @endif
                                            </div>
                                        </div>
        
                                    </div>
                                </div>

                          
                                <div class="row">
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                    
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Notes</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->note }}</span>
                                            </div>
                                        </div>
        
                                    </div>
        
                                </div>

                            
                            </div>

                            <div class="tab-pane" id="justified-tabpanel-1" role="tabpanel" aria-labelledby="justified-tab-1">


                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted bg-light">
                                                <th class="ps-4 min-w-100px rounded-start">#</th>
                                                <th class="ps-4 min-w-325px rounded-start">Added By</th>
                                                <th class="min-w-250px">Payment Date</th>
                                                <th class="min-w-75px text-start rounded-end">Invoice Status</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            
                                                
                                                @foreach ($invoiceDetails as $invoiceDetail)
                                                    <tr>
                                                        <td>
                                                            <span class=" fw-bold  d-block fs-7">{{$loop->iteration }}</span>
                                                        </td>

                                                        <td>
                                                            <span class=" fw-bold  d-block fs-7">{{ $invoiceDetail->user }}</span>
                                                        </td>

                                                        <td>
                                                            @if ($invoiceDetail->Payment_Date)
                                                                <span class="fw-bold  d-block fs-7">{{ $invoiceDetail->Payment_Date }}</span>
                                                            @else
                                                                <span class="fw-bold d-block fs-7">None</span>
                                                            @endif                                                        
                                                        </td>

                                                        <td>
                                                            @if ($invoiceDetail->Value_Status == 1)
                                                                <span class="text-success card-label  fs-5 mb-1">{{ $invoiceDetail->Status }}</span>
                                                            @elseif($invoiceDetail->Value_Status == 2)
                                                                <span class="text-danger card-label  fs-5 mb-1">{{ $invoiceDetail->Status }}</span>
                                                            @else
                                                                <span class="text-warning card-label  fs-5 mb-1">{{ $invoiceDetail->Status }}</span>
                                                            @endif                                                        
                                                        </td>

                                                    </tr>
                                                    
                                                @endforeach
                                          
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>




                               

                                
                            </div>

                            @if ($invoicesAttachments)
                                
                                <div class="tab-pane" id="justified-tabpanel-2" role="tabpanel" aria-labelledby="justified-tab-2">
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="text-muted mt-1 fw-bold fs-7">Over {{ $invoicesAttachments->count() }} New Invoice Attachment</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <a href="{{ route('admin.attachments.create' , $invoice->id) }}" class="btn btn-sm btn-light-primary">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->New Invoice Attachment</a>
                                        </div>
                                    </div>
                                    <hr>
                                    
                                    @foreach ($invoicesAttachments as $invoicesAttachment) 
 
                                        <div class="row">
                                            <div class="tab-pane active col-md-12 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                                
                                                <div class="card-header border-0 pt-5">
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span class="card-label fw-bolder fs-3 mb-1">File name</span>
                                                    </h3>
                                                    <div class="card-toolbar">
                                                        <span class="card-label  fs-5 mb-1">{{ $invoicesAttachment->file_name}}</span>
                                                    </div>
                                                </div>
                
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                                
                                                <div class="card-header border-0 pt-5">
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span class="card-label fw-bolder fs-3 mb-1">Created by</span>
                                                    </h3>
                                                    <div class="card-toolbar">
                                                        <span class="card-label  fs-5 mb-1">{{ $invoicesAttachment->Created_by}}</span>
                                                    </div>
                                                </div>
                
                                            </div>
                
                                            <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                            
                                                <div class="card-header border-0 pt-5">
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span class="card-label fw-bolder fs-3 mb-1">Created at</span>
                                                    </h3>
                                                    <div class="card-toolbar">
                                                        <span class="card-label  fs-5 mb-1">{{ $invoicesAttachment->created_at }}</span>
                                                    </div>
                                                </div>
                
                                            </div>
                                        </div>

                                        <div class="row">
                
                                            <div class="tab-pane active col-md-12 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
                                            
                                                <div class="card-header border-0 pt-5">
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span class="card-label fw-bolder fs-3 mb-1">Actions</span>
                                                    </h3>
                                                    <div class="card-toolbar">
                                                        <a href="{{ route('admin.get_file' ,['file_name' => $invoicesAttachment->file_name, 'invoice_number' => $invoice->invoice_number]) }}" class="btn btn-sm btn-primary me-2" >Download</a>
                                                        <a href="{{ route('admin.open_file' , ['file_name' => $invoicesAttachment->file_name, 'invoice_number' => $invoice->invoice_number]) }}" class="btn btn-sm btn-primary me-2" target="_blank">show</a>
                                                        <a href="" class="btn btn-sm btn-primary me-2" target="_blank" data-bs-toggle="modal" data-bs-target="#Delete{{ $invoicesAttachment->id }}">Delete</a>
                                                        @include('dashboard.backend.invoices.attachmentsDelete')

                                                    </div>
                                                </div>
                
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach

                                </div>

                            @else

                                <div class="tab-pane" id="justified-tabpanel-2" role="tabpanel" aria-labelledby="justified-tab-2">

                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="text-muted mt-1 fw-bold fs-7">Over {{ $invoicesAttachments->count() }} Invoice Attachment</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <a href="{{ route('admin.attachments.blade') }}" class="btn btn-sm btn-light-primary">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->New Invoice Attachment</a>
                                        </div>
                                    </div>
                                    <hr>
                                        

                                </div>

                            @endif

                        </div>
            
                    </div>
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

@section('js')
<script src="{{ asset('dashboard/assets/js/preview-image.js')}}"></script>
@endsection