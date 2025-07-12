<!DOCTYPE html>
<html lang="en">
<head>
    <base href="">
    @include('dashboard.layouts.head')
</head>

<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px; --kt-toolbar-height-tablet-and-mobile:55px">

    <!-- Main wrapper -->
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">

            <!-- Sidebar -->
            @include('dashboard.layouts.sidebar')

            <!-- Page content -->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!-- Header -->
                @include('dashboard.layouts.header')

                <!-- Main content -->
                <main class="content flex-column-fluid">
                    @yield('content')
                </main>

                <!-- Footer -->
                @include('dashboard.layouts.footer')

            </div>
        </div>
    </div>

    <!-- Scripts -->
    @include('dashboard.layouts.js')
</body>
</html>
