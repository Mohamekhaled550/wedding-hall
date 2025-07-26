@extends('dashboard.layouts.master')

@section('title', 'Accountant Dashboard')

@section('content')
<div class="container py-8">
    <h1 class="text-3xl font-bold mb-6">Accountant Dashboard</h1>

    <!-- KPIs -->
    <div class="row mb-6">
        <div class="col-md-3">
            <div class="card shadow p-4 text-center bg-primary text-white">
                <h4>Total Revenue</h4>
                <h2>{{ number_format($totalRevenue, 2) }} EGP</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-4 text-center bg-danger text-white">
                <h4>Total Expenses</h4>
                <h2>{{ number_format($totalExpenses, 2) }} EGP</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-4 text-center bg-success text-white">
                <h4>Profit</h4>
                <h2>{{ number_format($profit, 2) }} EGP</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-4 text-center bg-warning text-white">
                <h4>Unpaid Invoices</h4>
                <h2>{{ $unpaidInvoicesCount }}</h2>
            </div>
        </div>
    </div>
Q
    <!-- Charts -->
    <div class="row mb-6">
        <div class="col-md-6">
            <canvas id="revenueChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="expensesChart"></canvas>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow p-4">
        <h5 class="mb-4">Latest Invoices</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Issued At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestInvoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->customer->name }}</td>
                    <td>{{ $invoice->total }}</td>
                    <td>{{ ucfirst($invoice->status) }}</td>
                    <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Monthly Revenue',
                data: @json($revenueData),
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.1
            }]
        }
    });

    const ctxExpenses = document.getElementById('expensesChart').getContext('2d');
    const expensesChart = new Chart(ctxExpenses, {
        type: 'pie',
        data: {
            labels: @json($expenseCategories),
            datasets: [{
                data: @json($expenseData),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        }
    });
</script>
@endpush
