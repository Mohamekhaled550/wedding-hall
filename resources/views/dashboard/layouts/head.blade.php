<title>@yield('title', 'Wedding Hall Management')</title>
<meta charset="utf-8" />
<meta name="description" content="A professional and elegant system for managing wedding hall bookings, invoices, and reports." />
<meta name="keywords" content="wedding, hall, booking, reservation, dashboard, admin panel, event, celebration, management" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Wedding Hall Management System" />
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:site_name" content="Hayat Wedding Halls" />

<link rel="canonical" href="{{ url('/') }}" />
<link rel="shortcut icon" href="{{ asset('dashboard/assets/media/logos/favicon.ico') }}" />

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" />

<!-- Page Vendor Styles -->
<link href="{{ asset('dashboard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('dashboard/assets/css/custom-calendar.css') }}" rel="stylesheet">

<!-- Global Styles -->
<link href="{{ asset('dashboard/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('dashboard/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

@yield('style')
