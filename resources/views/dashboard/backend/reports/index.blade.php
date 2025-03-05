

@extends('dashboard.layouts.master')

@section('title', 'Reports')

@section('content')

<div class="container">
    <h2 class="text-center mb-4">Reports</h2>

    <!-- Form لاختيار الشهر والسنة -->
    <form action="{{ route('admin.reports.search') }}" method="POST">
        @csrf
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="year">Year</label>
                <select name="year" id="year" class="form-select" required>
                    <option value="" selected disabled>Select Year</option>
                    @for ($i = date('Y'); $i >= 2000; $i--)
                    <option value="{{ $i }}" {{ old('year', $year ?? '') == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>                    @endfor
                </select>
            </div>
            <div class="col-md-4">
                <label for="month">Month</label>
                <select name="month" id="month" class="form-select" required>
                    <option value="" selected disabled>Select Month</option>
                    @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ old('month', $month ?? '') == $i ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                    </option>
                    @endfor
                </select>
            </div>


            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </div>
    </form>

    <!-- جدول عرض الفواتير -->
    @isset($invoices)
        <div class="table-responsive">
            <table class="table align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th>#</th>
                        <th>Invoice ID</th>
                        <th>Due Date</th>
                        <th>Hall Number </th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        @if ($invoice->section->name == 'Hall 1')  
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->due_date }}</td>
                                <td>{{ $invoice->section->name }}</td>
                                <td>{{ $invoice->Total }}</td>
                                <td>{{ $invoice->discount }}</td>
                                <td>
                                    @if ($invoice->value_status == 1)
                                        <span class="text-success">{{ $invoice->Status }}</span>
                                    @elseif ($invoice->value_status == 2)
                                        <span class="text-danger">{{ $invoice->Status }}</span>
                                    @else
                                        <span class="text-warning">{{ $invoice->Status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No invoices found.</td>
                        </tr>
                    @endforelse
                </tbody>
                
                <tr>
                    <td colspan="8" class="text-end fw-bold">
                        Total Amount for {{ isset($year) ? $year : 'N/A' }}/{{ isset($month) ? $month : 'N/A' }}
                    </td>
                    <td colspan="4" class="text-end fw-bold text-primary">
                        {{ isset($totalAmount) ? number_format($totalAmount, 2) : '0.00' }}
                    </td>                        </tr>
            </table>
        </div>
    @endisset
</div>
@endsection
