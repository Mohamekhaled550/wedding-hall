@extends('dashboard.layouts.master')

@section('title')
 ADD Settungs
@endsection

@section('content')



<div class="card shadow mb-4">
 
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> Settungs </h6>
        <div class="ml-auto">
            <a href="" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Settungs </span> 
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.settings.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Facebook</span>
                    </label>
                    <input type="text" name="facebook" value="{{ old('facebook') }}" class="form-control form-control-solid" placeholder="Enter facebook" >
                    @error('facebook') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Youtube</span>
                    </label>
                    <input type="text" name="youtube" value="{{ old('youtube') }}" class="form-control form-control-solid" placeholder="youtube" >
                    @error('youtube') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

            </div>

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Twitter</span>
                    </label>
                    <input type="text" name="twitter" value="{{ old('twitter') }}" class="form-control form-control-solid" placeholder="Enter Twitter" >
                    @error('twitter') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Phone</span>
                    </label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control form-control-solid" placeholder="Enter Phone" >
                    @error('phone') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

            </div>

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Whatsapp</span>
                    </label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" class="form-control form-control-solid" placeholder="Enter Whatsapp" >
                    @error('whatsapp') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Location</span>
                    </label>
                    <input type="text" name="location" value="{{ old('location') }}" class="form-control form-control-solid" placeholder="Enter Location" >
                    @error('location') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

            </div>

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Email</span>
                    </label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control form-control-solid" placeholder="Enter Email" >
                    @error('email') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Gmail</span>
                    </label>
                    <input type="text" name="gmail" value="{{ old('gmail') }}" class="form-control form-control-solid" placeholder="Enter Gmail" >
                    @error('gmail') <span class="text-danger">{{ $message }}</span>  @enderror
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
@endsection


     