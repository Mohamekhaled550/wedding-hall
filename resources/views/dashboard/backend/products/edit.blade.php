@extends('dashboard.layouts.master')

@section('title')
 Edit Products
@endsection

@section('content')



<div class="card shadow mb-4">
 
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> Products </h6>
        <div class="ml-auto">
            <a href="" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Products </span> 
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.products.update' , $product->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf

             
            <input type="hidden" id="id" name="id" value="{{ $product->id }}">
            
            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Name in English</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name' , $product->name) }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


                

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <div class="d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                            <label class="required form-label">Section</label>
                            <select class="form-select mb-2 select2-hidden-accessible" name="section_id" data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true">
                                <option value="{{ $product->section_id }}" selected>{{ $product->section->name }}</option>
                                @foreach ( $sections as $section ) 
                                  <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>

                            
                            <div class="text-muted fs-7">Set the product Section</div>
                    
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Description in English</span>
                    </label>
                    <input type="text" name="description" value="{{ old('description' , $product->description) }}" class="form-control form-control-solid" placeholder="Enter description" >
                    @error('description') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
            </div>

            <div class="row">

  
                <div class="col-md-6 col-12 mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control image" type="file" id="formFile"
                            name="img">

                        @error('img')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                </div>

                <div class="form-group prev">
                    <img src="{{ asset('storage/' . $product->img) }}" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
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


     