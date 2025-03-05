@extends('dashboard.layouts.master')

@section('title')
 Pay Invoice
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

        <form action="{{ route('admin.Status_Updatee', ['id' => $invoice->id]) }}" autocomplete="off" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf

            <input type="hidden" id="id" name="id" value="{{ $invoice->id }}">

            <div class="row">
                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">رقم الفاتوره</span>
                    </label>
                    <input disabled type="text"  name="invoice_number" value="{{ old('invoice_number' , $invoice->invoice_number) }}" class="form-control form-control-solid" placeholder="Enter invoice number" >
                    @error('invoice_number') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">تاريخ الفاتوره</span>
                    </label>
                    <input disabled type="date"  name="invoice_Date" value="{{ old('invoice_Date' , $invoice->invoice_Date) }}" class="form-control form-control-solid" placeholder="Enter invoice_Date" >
                    @error('invoice_Date') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">تاريخ الاستحقاق</span>
                    </label>
                    <input disabled type="date" name="due_date" value="{{ old('due_date' , $invoice->due_date) }}" class="form-control form-control-solid" placeholder="Enter due_date" >
                    @error('due_date') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
                
            </div>

            
            <div class="row">

                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <div class="d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                            <label class="required form-label">القسم</label>
                            <select disabled class="form-select mb-2 select2-hidden-accessible" name="section_id" id="section_id" data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true">
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
                            <select disabled class="form-select mb-2 select2-hidden-accessible" name="product_id" id="product_id" data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true">
                                <option value="{{ $invoice->product_id }}">{{ $invoice->product->name }} </option>
                            </select>
                            <div class="text-muted fs-7">Set the invoice Product</div>
                        </div>
                        @error('product_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>
                
                
                 
                <div class="row">
    
    <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
<div class="d-flex flex-wrap gap-5">
<div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
<label class="required form-label">سعر الطبق</label>
<input type="text" name="plate_price" value="{{ old('plate_price') }}" class="form-control form-control-solid" placeholder="plate_price" id="plate_price">
<div class="text-muted fs-7">أدخل سعر الطبق</div>
</div>
</div>
</div>

    </div>
</div>

<div class="row">

<div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
<div class="d-flex flex-wrap gap-5">
<div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
<label class="required form-label">عدد الأشخاص</label>
<input type="number" name="number_of_people" value="{{ old('number_of_people') }}" class="form-control form-control-solid" placeholder="number of people" id="number_of_people">
<div class="text-muted fs-7">أدخل عدد الأشخاص</div>
</div>
</div>
</div>

<div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
            <span class="required">الخصم</span>
        </label>
        <input type="text" name="discount" value="{{ old('discount' , 0) }}" class="form-control form-control-solid" placeholder="Enter discount" id="Discount">
        @error('discount') <span class="text-danger">{{ $message }}</span>  @enderror
    </div>

<div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
<span class="required">الإجمالي</span>
</label>
<input type="text" name="total" value="{{ old('total') }}" class="form-control form-control-solid" placeholder="Enter total" id="Total" readonly>
@error('total') <span class="text-danger">{{ $message }}</span>  @enderror
</div>


    

                


            </div>
          
            <div class="row">

                <div class="d-flex col-12 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">ملاحظات</span>
                    </label>
                    <textarea disabled class="form-control form-control-solid"  placeholder="Enter Notes" id="exampleTextarea" name="note" rows="3">{{ old('note' , $invoice->note) }}</textarea>

                    @error('note') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
            </div>

            <div class="row">
                
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <div class="d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                            <label class="required form-label">حاله الدفع</label>
                            <select  class="form-select mb-2 select2-hidden-accessible" name="Status"  data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true">
                                <option selected="true" disabled="disabled">-- حدد حالة الدفع --</option>
                                <option value="مدفوعة">مدفوعة</option>
                                <option value="مدفوعة جزئيا">مدفوعة جزئيا</option>
                            </select>
                            <div class="text-muted fs-7">Set the invoice Product</div>
                        </div>
                        @error('Status') <span class="text-danger">{{ $message }}</span>  @enderror
                    </div>
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">تاريخ الدفع</span>
                    </label>
                    <input  type="date"  name="Payment_Date" value="" class="form-control form-control-solid" placeholder="Enter Payment Date" >
                    @error('Payment_Date') <span class="text-danger">{{ $message }}</span>  @enderror
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

@endsection


     