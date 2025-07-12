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
          <form method="GET" class="mb-4 d-flex justify-content-end">
        <select name="hall" class="form-select w-25 me-2" onchange="this.form.submit()">
            <option value="">عرض الكل</option>
            <option value="1" {{ request('hall') == '1' ? 'selected' : '' }}>قاعة 1</option>
            <option value="2" {{ request('hall') == '2' ? 'selected' : '' }}>قاعة 2</option>
            <option value="both" {{ request('hall') == 'both' ? 'selected' : '' }}>المتاح للقاعتين</option>
        </select>
    </form>
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
        title: '{{ $invoice->section->name ?? "متاح للقاعتين" }}',
        start: '{{ $invoice->due_date }}',
        color:
            @if ($invoice->value_status == 1) 'green'
            @elseif($invoice->value_status == 2) 'red'
            @elseif($invoice->value_status == 3) 'orange'
            @else 'blue' @endif,
        @if($invoice->id)
        url: '{{ route("admin.invoices.show", $invoice->id) }}',
        @endif
    },
    @endforeach
],


                 // حدث عند الضغط على يوم معين في التقويم
                 dateClick: function(info) {
                    // اعادة توجيه المستخدم إلى صفحة إضافة الفاتورة مع تاريخ الإنشاء
                    window.location.href = "{{ route('admin.invoices.create') }}?due_date=" + info.dateStr;
                }
            });
            calendar.render();
        });
    </script>
@endsection
