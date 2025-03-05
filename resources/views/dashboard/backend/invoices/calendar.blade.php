@extends('dashboard.layouts.master')

@section('title', 'Invoices Calendar')

@section('css')
<link href="{{ asset('dashboard/assets/css/custom-calendar.css')}}" rel="stylesheet">

@endsection

@section('content')
  <!-- زر التقرير -->
  <div class="text-end mb-4">

        </div>
    <div class="container mt-4">
        <h3 class="text-center mb-4"></h3>
        <div id="calendar"></div>
    </div>


<!-- النافذة المنبثقة للتقرير -->

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'en',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    @foreach ($invoices as $invoice)
                    {
                        title: '{{ $invoice->section->name }}',
                        start: '{{ $invoice->due_date }}',
                        color: @if ($invoice->value_status == 1) 'green'
                               @elseif($invoice->value_status == 2) 'red'
                               @else 'orange' @endif,
                        url: '{{ route("admin.invoices.show", $invoice->id) }}'
                    },
                    @endforeach

                ],

                 // حدث عند الضغط على يوم معين في التقويم
                 dateClick: function(info) {
                    // اعادة توجيه المستخدم إلى صفحة إضافة الفاتورة مع تاريخ الإنشاء
                    window.location.href = "{{ route('admin.invoices.create') }}?invoice_date=" + info.dateStr;
                }
            });
            calendar.render();
        });
    </script>
@endsection
