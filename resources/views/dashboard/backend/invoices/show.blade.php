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
                                                <span class="card-label fw-bolder fs-3 mb-1"> Reservation Date</span>
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
                                                <span class="card-label fw-bolder fs-3 mb-1">Wedding Date</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->due_date }}</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">

                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Dinner Type</span>
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
                                                <span class="card-label fw-bolder fs-3 mb-1">Hall </span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->section->name }}</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">

                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Number of People</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->number_of_people }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tab-pane active col-md-6 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">

                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Plate Price</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <span class="card-label  fs-5 mb-1">{{ $invoice->plate_price }}</span>
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
        <table class="table align-middle gs-0 gy-4">
            <thead>
                <tr class="fw-bolder text-muted bg-light">
                    <th class="ps-4 min-w-50px rounded-start">#</th>
                    <th class="min-w-150px">Added By</th>
                    <th class="min-w-150px">Payment Date</th>
                    <th class="min-w-150px">Total</th>
                    <th class="min-w-150px">Paid</th>
                    <th class="min-w-150px">Remaining</th>
                    <th class="min-w-150px">Invoice Status</th>
                    <th class="min-w-150px">Update Paid</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoiceDetails as $invoiceDetail)
                    @php
                        $invoice = $invoiceDetail->invoice;
                        $total = $invoice->Total ?? 0;
                        $paid = $invoiceDetail->paid_amount ?? 0;
                        $remaining = $total - $paid;
                    @endphp
                    <tr>
                        <td><span class="fw-bold d-block fs-7">{{ $loop->iteration }}</span></td>

                        <td><span class="fw-bold d-block fs-7">{{ $invoiceDetail->user }}</span></td>

                        <td>
                            <span class="fw-bold d-block fs-7">
                                {{ $invoiceDetail->Payment_Date ? $invoiceDetail->Payment_Date : 'None' }}
                            </span>
                        </td>

                        <td><span class="fw-bold d-block fs-7">{{ number_format($total, 2) }}</span></td>

                        <td><span class="fw-bold d-block fs-7 text-success">{{ number_format($paid, 2) }}</span></td>

                        <td><span class="fw-bold d-block fs-7 text-danger">{{ number_format($remaining, 2) }}</span></td>

                        <td>
                            @if ($paid == 0)
                                <span class="text-danger card-label fs-5 mb-1">غير مدفوعة</span>
                            @elseif ($paid < $total)
                                <span class="text-warning card-label fs-5 mb-1">مدفوعة جزئياً</span>
                            @else
                                <span class="text-success card-label fs-5 mb-1">مدفوعة كلياً</span>
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('admin.invoices.updatePaidAmount', $invoiceDetail->id) }}" method="POST" class="d-flex">
                                @csrf
                                @method('PUT')
                                <input type="number" name="paid_amount" step="0.01" value="{{ $paid }}" class="form-control form-control-sm me-2" style="width: 90px;">
                                <button type="submit" class="btn btn-sm btn-primary">تحديث</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
