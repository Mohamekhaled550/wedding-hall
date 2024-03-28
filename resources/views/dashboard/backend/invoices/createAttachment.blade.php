@extends('dashboard.layouts.master')

@section('title')
 ADD Attachment
@endsection

@section('content')



<div class="card shadow mb-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
 
    <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"> Attachment </h6>
        <div class="ml-auto">
            <a href="{{ route('admin.invoices.show' , $invoice->id) }}" class="btn btn-primary">
                <span><i class="fa fa-home"></i></span>
                <span> Attachment </span> 
            </a>
        </div>
    </div>

    <div class="card-body">


            


    <div class="row">
        <form action="{{ route('admin.attachments.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf

            <input type="text" value="{{ $invoice->id }}" name="invoice_id" hidden>
            <input type="text" value="{{ $invoice->invoice_number }}" name="invoice_number" hidden>

            <div class="col-md-6 col-12 mb-3">
                <label for="formFile" class="form-label">Images</label>
                <input class="form-control image" type="file" id="formFile" name="img[]" multiple>
                @error('img')
                    <span class="text-danger">
                        <small class="errorTxt">{{ $message }}</small>
                    </span>
                @enderror
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
@endsection


     