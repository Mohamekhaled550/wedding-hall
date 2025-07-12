<!-- Top Navbar Elegant -->
<div id="kt_header" class="header bg-white border-bottom shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center py-3">

        <!-- Logo & Mobile toggle -->
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-icon d-lg-none" id="kt_aside_mobile_toggle">
                <i class="fas fa-bars fs-2 text-dark"></i>
            </button>

            <a href="{{ route('admin.home') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('dashboard/assets/media/logos/logo-hayat-40px.png') }}" class="h-35px me-2" alt="logo"/>
                <span class="fs-4 fw-bold" style="color: #b07556;">Hayat Halls</span>
            </a>
        </div>

        <!-- User Profile Dropdown -->
        <div class="d-flex align-items-center gap-4">
            <div class="d-flex align-items-center cursor-pointer" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <div class="symbol symbol-40px me-2">
                    <img src="{{ asset('storage/' . Auth::user()->img) }}" alt="User" />
                </div>
                <div class="d-none d-md-block">
                    <div class="fw-bold text-dark">{{ Auth::user()->name }}</div>
                    <small class="text-muted">{{ Auth::user()->email }}</small>
                </div>
            </div>

            <!-- Dropdown -->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded shadow-sm w-200px" data-kt-menu="true">
                <div class="menu-item px-3 py-2">
                    <a href="{{ route('admin.admins.show', Auth::user()->id) }}" class="menu-link px-3">My Profile</a>
                </div>
                <div class="menu-item px-3">
                    <a href="{{ route('logout') }}" class="menu-link px-3">Sign Out</a>
                </div>
            </div>
        </div>

    </div>
</div>
