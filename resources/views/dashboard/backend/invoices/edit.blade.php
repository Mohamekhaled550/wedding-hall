@extends('dashboard.layouts.master')

@section('title')
 Edit Invoice
@endsection

@section('content')



<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> Invoices </h6>
        <div class="ml-auto">
            <a href="" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Invoices</span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.invoices.update' , $invoice->id) }}" autocomplete="off" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input type="hidden" id="id" name="id" value="{{ $invoice->id }}">

            <div class="row">
                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">رقم الفاتوره</span>
                    </label>
                    <input type="text" name="invoice_number" value="{{ old('invoice_number' , $invoice->invoice_number) }}" class="form-control form-control-solid" placeholder="Enter invoice number" >
                    @error('invoice_number') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">تاريخ الفاتوره</span>
                    </label>
                    <input type="date" name="invoice_Date" value="{{ old('invoice_Date' , $invoice->invoice_Date) }}" class="form-control form-control-solid" placeholder="Enter invoice_Date" >
                    @error('invoice_Date') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">تاريخ الاستحقاق</span>
                    </label>
                    <input type="date" name="due_date" value="{{ old('due_date' , $invoice->due_date) }}" class="form-control form-control-solid" placeholder="Enter due_date" >
                    @error('due_date') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
                
            </div>

            
            <div class="row">

                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <div class="d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                            <label class="required form-label">القسم</label>
                            <select class="form-select mb-2 select2-hidden-accessible" name="section_id" id="section_id" data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true">
                                <option value="{{ $invoice->section_id }}" selected> {{ $invoice->section->name }}</option>
                                @foreach ( $sections as $section ) 
                                  <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-muted fs-7">Set the invoice Section</div>
                            @error('section_id') <span class="text-danger">{{ $message }}</span>  @enderror

                        </div>
                    
                    </div>
                </div>
                


                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <div class="d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                            <label class="required form-label">المنتج</label>
                            <select class="form-select mb-2 select2-hidden-accessible" name="product_id" id="product_id" data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true">
                                <option value="{{ $invoice->product_id }}">{{ $invoice->product->name }} </option>
                            </select>
                            <div class="text-muted fs-7">Set the invoice Product</div>
                        </div>
                        @error('product_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>
                
                
                
                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">مبلغ العموله</span>
                    </label>
                    <input type="text" id="Amount_Commission" name="Amount_Commission" value="{{ old('Amount_Commission' , $invoice->Amount_Commission) }}" class="form-control form-control-solid" placeholder="Enter Amount Commission" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    @error('Amount_Commission') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
                
                

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container"></div>

            </div>

            <div class="row">

                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">مبلغ التحصيل</span>
                    </label>
                    <input type="text" name="Amount_collection" value="{{ old('Amount_collection' , $invoice->Amount_collection) }}" class="form-control form-control-solid" placeholder="Enter Amount collection" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                    @error('Amount_collection') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">الخصم</span>
                    </label>
                    <input type="text" name="discount" value="{{ old('discount' , $invoice->discount) }}" class="form-control form-control-solid" placeholder="Enter discount" id="Discount">
                    @error('discount') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                
                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <div class="d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                            <label class="required form-label">نسبه ضريبه القيمه المضافه</label>
                            <select class="form-select mb-2 select2-hidden-accessible" name="rate_vat" data-control="select2" data-hide-search="true" data-placeholder="select"  data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true" id="Rate_VAT" onchange="myFunction()">
                                <option value="{{ old('rate_vat' , $invoice->rate_vat) }}" selected>{{  $invoice->rate_vat }}</option>
                                <option value=" 5%">5%</option>
                                <option value="10%">10%</option>
                            </select>
                            <div class="text-muted fs-7">Set the invoice Rate Vat</div>
                        </div>
                    
                    </div>
                </div>

                

                
               
                
                


            </div>

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">قيمة ضريبة القيمة المضافة</span>
                    </label>
                    <input type="text" name="value_vat" value="{{ old('value_vat' , $invoice->value_vat) }}" class="form-control form-control-solid" placeholder="Enter value vat"  id="Value_VAT" readonly>
                    @error('value_vat') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">الاجمالي شامل الضريبة</span>
                    </label>
                    <input type="text" name="total" value="{{ old('total' , $invoice->Total) }}" class="form-control form-control-solid" placeholder="Enter total" id="Total" readonly>
                    @error('total') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
                
                


            </div>
          
            <div class="row">

                <div class="d-flex col-12 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">ملاحظات</span>
                    </label>
                    <textarea class="form-control form-control-solid"  placeholder="Enter Notes" id="exampleTextarea" name="note" rows="3">{{ old('note' , $invoice->note) }}</textarea>

                    @error('note') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
            </div>
          

            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>

        </form>

    </div>

</div>


@endsection


@section('js')
<script src="{{ asset('dashboard/assets/js/preview-image.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#section_id').on('change', function () {
            var section_id = $(this).val();
            if (section_id) {
                $.ajax({
                    url: "{{ URL::to('admin/category-products') }}/" + section_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#product_id').empty();

                        $.each(data, function (key, value) {
                            $('#product_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                    ,
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<script>
    function myFunction() {
        var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
        var Discount = parseFloat(document.getElementById("Discount").value);
        var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
        var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

        var Amount_Commission2 = Amount_Commission - Discount;


        if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

            alert('يرجي ادخال مبلغ العمولة ');
            

        } else {
            var intResults = Amount_Commission2 * Rate_VAT / 100;

            var intResults2 = parseFloat(intResults + Amount_Commission2);

            sumq = parseFloat(intResults).toFixed(2);

            sumt = parseFloat(intResults2).toFixed(2);

            document.getElementById("Value_VAT").value = sumq;

            document.getElementById("Total").value = sumt;

        }

    }

</script>
@endsection


     