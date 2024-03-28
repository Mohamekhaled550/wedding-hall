@extends('dashboard.layouts.master')

@section('style')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style>
@endsection

@section('title')
 Print Invoices
@endsection


@section('content')

<div class="container" id="print">
    <div class="invoice-header">
        <h1 class="invoice-title">Invoice</h1>
        <div class="billed-from">
            <h6>BootstrapDash, Inc.</h6>
            
            Email: youremail@companyname.com
        </div>
    </div>

    <div class="row">
        <div class="tab-pane active col-md-4 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
        
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1"> Invoice Number</span>
                </h3>
                <div class="card-toolbar">
                    <span class="card-label  fs-5 mb-1">{{ $invoice->invoice_number }}</span>
                </div>
            </div>

        </div>

        <div class="tab-pane active col-md-4 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
        
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1"> Invoice Date</span>
                </h3>
                <div class="card-toolbar">
                    <span class="card-label  fs-5 mb-1">{{ $invoice->invoice_Date }}</span>
                </div>
            </div>

        </div>

        <div class="tab-pane active col-md-4 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
        
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Due Date</span>
                </h3>
                <div class="card-toolbar">
                    <span class="card-label  fs-5 mb-1">{{ $invoice->due_date }}</span>
                </div>
            </div>

        </div>
    </div>

    <div class="row">

        <div class="tab-pane active col-md-4 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
            
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
       

        <div class="tab-pane active col-md-4 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
        
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Payment Date</span>
                </h3>
                <div class="card-toolbar">
                    @if ($invoice->Payment_Date)
                        <span class="card-label  fs-5 mb-1">{{ $invoice->Payment_Date }}</span>
                    @else
                        <span class="card-label  fs-5 mb-1">None</span>
                    @endif    
                </div>
            </div>

        </div>

        <div class="tab-pane active col-md-4 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
            
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
                    <span class="card-label  fs-5 mb-1">{{ $invoice->discount }} </span>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="tab-pane active col-md-4 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
        
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Rate Vat</span>
                </h3>
                <div class="card-toolbar">
                    <span class="card-label  fs-5 mb-1">{{ $invoice->rate_vat }}</span>
                </div>
            </div>

        </div>

        <div class="tab-pane active col-md-4 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
            
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Value vat</span>
                </h3>
                <div class="card-toolbar">
                    <span class="card-label  fs-5 mb-1">{{ $invoice->value_vat }}</span>
                </div>
            </div>

        </div>

        <div class="tab-pane active col-md-4 col-12 mb-3" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
        
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Total</span>
                </h3>
                <div class="card-toolbar">
                    <span class="card-label  fs-5 mb-1">{{ $invoice->Total }}</span>
                </div>
            </div>

        </div>
    </div>

    <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> Print <i class="bi bi-printer"></i></button>
 
</div>
@endsection

@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

@endsection