@extends('dashboard.layouts.master')

@section('title')
 Edit Admins
@endsection

@section('content')



<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> Admins </h6>
        <div class="ml-auto">
            <a href="" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Admins</span>
        </a> 
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.admins.update' , $admin->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Name</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name' , $admin->name) }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Email</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email' , $admin->email) }}" class="form-control form-control-solid" placeholder="Enter email" >
                    @error('email') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


             

            </div>



            
            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Password</span>
                    </label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control form-control-solid" placeholder="Enter password" >
                    @error('password') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

            <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <div class="d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                            <label class="required form-label">الصلاحيات</label>
                            <select class="form-select mb-2 select2-hidden-accessible" name="role_id" data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true">
                                <option value="" disabled> الصلاحيات</option>
                                @foreach ($roles as $role)
                                  <option value="{{$role->id}}" {{ ($admin->roles->contains('name',$role->name)) ? 'selected' : ''}}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-muted fs-7">Set the Role</div>
                        </div>
                            
                    
                    </div>
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
                    <img src="{{ asset('storage/' . $admin->img) }}" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
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


     