@extends('frontend.layouts.main')

@section('title', 'الكالندر')

@section('content')
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title">الكالندر والحجوزات</h2>
            <p class="text-muted">عرض الأيام المحجوزة بدون تفاصيل مالية أو ألوان لوحة التحكم.</p>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div id="frontend-calendar"></div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bookings = @json($bookings);
        const events = bookings.map((booking) => ({
            title: `محجوز: ${booking.halls.join(' + ')}`,
            start: booking.date,
            allDay: true,
        }));

        const calendar = new FullCalendar.Calendar(document.getElementById('frontend-calendar'), {
            initialView: 'dayGridMonth',
            locale: 'ar',
            direction: 'rtl',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            events: events
        });

        calendar.render();
    });
</script>
@endsection
