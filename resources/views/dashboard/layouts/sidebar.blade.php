<!-- Sidebar Modern Elegant -->
<div id="kt_aside" class="aside bg-white border-end shadow-sm aside-hoverable"
     data-kt-drawer="true"
     data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'260px', '300px': '280px'}"
     data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">

    <!-- Logo & Toggle -->
    <div class="aside-logo px-6 py-5 border-bottom d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.home') }}">
            <img src="{{ asset('dashboard/assets/media/logos/logo-hayat-40px.png') }}" class="h-35px" alt="logo"/>
        </a>
        <button class="btn btn-icon btn-sm" id="kt_aside_toggle">
            <i class="fas fa-chevron-left text-muted fs-4"></i>
        </button>
    </div>

    <!-- Menu Items -->
    <div class="aside-menu px-4 pt-5">
        <div class="menu menu-column menu-rounded menu-active-bg fw-semibold fs-6">

            <!-- Dashboard -->
            <div class="menu-item mb-2">
                <a href="{{ route('admin.home') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-chart-line text-primary"></i></span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>

            @if (auth()->user()->hasPermission('roles-read'))
            <div class="menu-item mb-2">
                <a href="{{ route('admin.roles.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-user-tag text-info"></i></span>
                    <span class="menu-title">Roles</span>
                </a>
            </div>
            @endif

            @if (auth()->user()->hasPermission('admins-read'))
            <div class="menu-item mb-2">
                <a href="{{ route('admin.admins.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-user-shield text-success"></i></span>
                    <span class="menu-title">Admins</span>
                </a>
            </div>
            @endif

            @if (auth()->user()->hasPermission('users-read'))
            <div class="menu-item mb-2">
                <a href="{{ route('admin.users.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-users text-danger"></i></span>
                    <span class="menu-title">Users</span>
                </a>
            </div>
            @endif

            <div class="menu-item mb-2">
                <a href="{{ route('admin.invoices.calendar') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-calendar-alt text-warning"></i></span>
                    <span class="menu-title">Invoices</span>
                </a>
            </div>

            <div class="menu-item mb-2">
                <a href="{{ route('admin.reports.home') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-file-invoice text-success"></i></span>
                    <span class="menu-title">Reports</span>
                </a>
            </div>

            @if (auth()->user()->hasPermission('sections-read'))
            <div class="menu-item mb-2">
                <a href="{{ route('admin.sections.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-layer-group text-secondary"></i></span>
                    <span class="menu-title">Sections</span>
                </a>
            </div>
            @endif

            @if (auth()->user()->hasPermission('products-read'))
            <div class="menu-item mb-2">
                <a href="{{ route('admin.products.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-boxes text-info"></i></span>
                    <span class="menu-title">Products</span>
                </a>
            </div>
            @endif


             @if (auth()->user()->hasPermission('ingredients-read'))
            <div class="menu-item mb-2">
                <a href="{{ route('admin.ingredients.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-boxes text-info"></i></span>
                    <span class="menu-title">Ingredients</span>
                </a>
            </div>
            @endif


             @if (auth()->user()->hasPermission('products-ingredients-read'))
            <div class="menu-item mb-2">
                <a href="{{ route('admin.product-ingredients.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-boxes text-info"></i></span>
                    <span class="menu-title">Product Ingredients</span>
                </a>
            </div>
            @endif

             @if (auth()->user()->hasPermission('stocks-read'))
            <div class="menu-item mb-2">
                <a href="{{ route('admin.stocks.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-boxes text-info"></i></span>
                    <span class="menu-title">Stock</span>
                </a>
            </div>
            @endif


                 @if (auth()->user()->hasPermission('stock-movements-read'))
            <div class="menu-item mb-2">
                <a href="{{ route('admin.stock-movements.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-boxes text-info"></i></span>
                    <span class="menu-title">Stock Movements</span>
                </a>
            </div>
            @endif


              <div class="menu-item mb-2">
                <a href="{{ route('admin.categories.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-boxes text-info"></i></span>
                    <span class="menu-title">Categories</span>
                </a>
            </div>


            <div class="menu-item">
                <a href="{{ route('admin.settings.index') }}" class="menu-link text-dark">
                    <span class="menu-icon"><i class="fas fa-cogs text-muted"></i></span>
                    <span class="menu-title">Settings</span>
                </a>
            </div>
        </div>
    </div>
</div>
