@extends('dashboard.layouts.master')

@section('title')
    Reports Homepage
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-60 py-10">
        <a href="{{ route('admin.reports.index') }}" class="text-decoration-none">
            <div class="p-5 rounded-4 shadow-lg"
                 style="background: linear-gradient(135deg, #ff6a6a, #ffc3a0); min-width: 320px; max-width: 400px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.2)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.1)'">
                <div class="text-center">
                    <div class="mb-4">
                        <i class="ki-duotone ki-graph fs-1" style="font-size: 45px; color: #fff;"></i>
                    </div>
                    <h3 class="fw-bold mb-2" style="color: #fff;">Hall Reports</h3>
                    <p class="fw-light mb-0" style="color: #fff;">View monthly and yearly reports</p>
                </div>
            </div>
        </a>
    </div>
@endsection
