@php
    use Carbon\Carbon;
    $currentMonth = Carbon::now()->format('F');
    $currentMonthInvoicesCount = App\Models\Invoice::whereMonth('due_date', Carbon::now()->month)->count();
@endphp

@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('content')

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-wrapper {
        background: linear-gradient(to right, #fef9f9, #f3f0ff);
        padding: 40px 30px;
        border-radius: 16px;
    }

    .dashboard-header {
        font-size: 28px;
        font-weight: 600;
        color: #3d3d3d;
        margin-bottom: 40px;
    }

    .card-metric {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.04);
        padding: 25px 30px;
        transition: all 0.3s ease-in-out;
        height: 100%;
    }

    .card-metric:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
    }

    .metric-title {
        font-size: 18px;
        font-weight: 500;
        color: #6c757d;
    }

    .metric-value {
        font-size: 32px;
        font-weight: 700;
        color: #343a40;
    }

    .metric-icon {
        font-size: 2rem;
        color: #6f42c1;
    }

    .text-green { color: #2f9e44; }
    .text-pink { color: #f06595; }
    .text-purple { color: #7950f2; }

    .grid-gap {
        gap: 30px;
    }
</style>

<div class="dashboard-wrapper">
    <div class="dashboard-header text-center">
        Welcome to <span class="text-purple">HAYAT Wedding Hall System </span>
    </div>

<div class="d-flex justify-content-center flex-wrap gap-4">

        <div class="col">
            <div class="card-metric text-center">
                <a href="{{ route('admin.invoices.calendar') }}">
                <div class="metric-icon mb-3">
                    <i class="ki-duotone ki-calendar text-green"></i>
                </div>
                <div class="metric-value">{{ $currentMonthInvoicesCount }}</div>
                <div class="metric-title">Invoices in {{ $currentMonth }}</div>
            </div>
        </div>
</a>
        <div class="col">
            <div class="card-metric text-center">
                <a href="{{ route('admin.reports.home') }}">
                <div class="metric-icon mb-3">
                    <i class="ki-duotone ki-graph text-pink"></i>
                </div>
                <div class="metric-value">Reports</div>
                <div class="metric-title">Monthly & Yearly Insights</div>
            </div>
        </div>
        </a>



    </div>
</div>

@endsection
