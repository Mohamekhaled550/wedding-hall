@extends('dashboard.layouts.master')

@section('title')
 Invoices
@endsection


@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
      
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mb-5 mb-xl-8">
            
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">New Invoices</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Over {{ $invoices->count() }} New Invoices</span>
                </h3>
                <div class="card-toolbar ">

                <div>
    <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bolder fs-3 mb-1">New Paid Invoices</span>
        <span class="text-muted mt-1 fw-bold fs-7">Over {{ $invoices->count() }} New Paid Invoices</span>
    </h3>
    <div class="card-toolbar">
        <!-- Form for Month Filter -->
        <form action="{{ route('admin.invoices-paid') }}" method="GET" class="d-flex align-items-center">
            <select name="month" class="form-select form-select-sm" style="width: 150px; margin-right: 10px;">
                <option value="">Select Month</option>
                @for ($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                    </option>
                @endfor
            </select>
            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
        </form>
    </div>
</div>

<div>
    <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bolder fs-3 mb-1">New Paid Invoices</span>
        <span class="text-muted mt-1 fw-bold fs-7">Over {{ $invoices->count() }} New Paid Invoices</span>
    </h3>
    <div class="card-toolbar">
        <!-- Form for Month Filter -->
        <form action="{{ route('admin.invoices-unpaid') }}" method="GET" class="d-flex align-items-center">
            <select name="month" class="form-select form-select-sm" style="width: 150px; margin-right: 10px;">
                <option value="">Select Month</option>
                @for ($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                    </option>
                @endfor
            </select>
            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
        </form>
    </div>
</div>



                    <div class="card-header border-0 pt-5">
                        <div class="input-group mb-3">
                            <input id="searchInput" type="text" class="form-control" placeholder="Search here..." aria-label="Search here..." aria-describedby="basic-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="searchButton">Search</button>
                        </div>
                    </div>
                    <a href="{{ route('admin.invoices-getArchives') }}" class="btn btn-sm btn-light-primary " style="margin-right: 3px;">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-archive"></i>
                        </span>
                        <!--end::Svg Icon-->
                        Archived invoices
                    </a>

                      <!-- Calendar Button -->
                    <a href="{{ route('admin.invoices.calendar') }}" class="btn btn-sm btn-light-primary" style="margin-right: 3px;">
                    <span class="svg-icon svg-icon-2">
                    <i class="fas fa-calendar"></i>
                    </span>
                     Calendar View
                    </a>

                        <a href="{{ route('admin.invoices.create') }}" class="btn btn-sm btn-light-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span
                        <!--end::Svg Icon-->New Invoices</a>
                    

               
                    
                </div>
                

            </div>
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 min-w-40px rounded-start">#</th>
                                <th class="min-w-50px">Wedding id</th>
                                <th class="min-w-50px text-end rounded-end">Reservation date</th>
                                <th class="min-w-50px text-end rounded-end">Due date</th>
                                <th class="min-w-40px text-end rounded-end">Dinner type</th>
                                <th class="min-w-40px text-end rounded-end">Hall number</th>
                                <th class="min-w-50px text-end rounded-end">Plate price</th>
                                <th class="min-w-50px text-end rounded-end">Number of people</th>
                                <th class="min-w-40px text-end rounded-end">total</th>
                                <th class="min-w-30px text-end rounded-end">Discount</th>
                                <th class="min-w-50px text-end rounded-end">stutas</th>
                                <th class="min-w-85px text-end rounded-end"></th>
                                <th class="min-w-25px text-end rounded-end"></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>

                            @foreach ($invoices as $invoice)
                                <tr>
                                  
                                    <td>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">{{ $loop->iteration }}</span>
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.invoices.show' , $invoice->id )  }}" style="color: rgb(97, 97, 196)">
                                          <span class="d-block fs-7 num">{{ $invoice->invoice_number }}</span>
                                        </a>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->invoice_Date }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->due_date }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->product->name }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  text-end d-block fs-7">{{ $invoice->section->name }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->plate_price }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->number_of_people }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->Total }}</span>
                                    </td>

                                    <td>
                                        <span class=" fw-bold  d-block fs-7">{{ $invoice->discount }}</span>
                                    </td>

                                    <td>
                                        @if ($invoice->value_status == 1)
                                            <span class="text-success fw-bold">{{ $invoice->Status }}</span>
                                        @elseif($invoice->value_status == 2)
                                            <span class="text-danger fw-bold">{{ $invoice->Status }}</span>
                                        @else
                                            <span class="text-warning fw-bold">{{ $invoice->Status }}</span>
                                        @endif

                                    </td>

                                    
                                  

                                    
                                    <td class="text-end">
                                        <div class="me-0">
                                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="bi bi-three-dots fs-3"></i>
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true" style="">
                                               
                                                <div class="menu-item px-3 text-end">
                                                    @if (auth()->user()->hasPermission('invoices-update'))
        
                                                        <a href="{{ route('admin.invoices.edit' , $invoice->id) }}" class="btn btn-icon w-100 btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin: 5px;">
                                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                                                </svg>

                                                            </span>
                                                            Edit Invoice
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    @endif
                                                </div>

                                                <div class="menu-item px-3 text-end">
                                                    <a href="{{ route('admin.invoices-print' , $invoice->id) }}" class="btn btn-icon w-100 btn-bg-light btn-active-color-primary btn-sm me-1">
                                                        <span class="svg-icon svg-icon-3">
                                                            <i class="bi bi-printer" style="margin: 5px;" ></i>
                                                      </span>
                                                      Print Invoice
                                                    </a>
                                                </div>

                                                <div class="menu-item px-3 text-end">
                                                    @if (auth()->user()->hasPermission('invoices-update'))
                                                        <a href="{{ route('admin.invoices.pay' , $invoice->id) }}" class="btn btn-icon w-100 btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <span class="svg-icon svg-icon-3">
                                                                <i class="fas fa-money-check-alt " style="margin: 5px;" ></i>
                                                            </span>
                                                            Change Payment
                                                        </a>
                                                    @endif
                                                </div>

                                                
                                            </div>
                                            <!--end::Menu 3-->
                                        </div>
                                        

                                       
                                        
                                        
                                    </td>

                                    <td>
                                        @if (auth()->user()->hasPermission('invoices-delete'))
                                            <a href="" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $invoice->id }}">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </a>
                                            @include('dashboard.backend.invoices.addtoArchive')
                                        @endif
                                    </td>

                                </tr>
                                
                            @endforeach
                          
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
   
       
       
    </div>
    <!--end::Container-->
</div>

@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var searchInput = document.getElementById('searchInput');
            var searchButton = document.getElementById('searchButton');

            function performSearch() {
                var searchTerm = searchInput.value.trim().toLowerCase();
                var rows = document.querySelectorAll('tbody tr');

                rows.forEach(function(row) {
                    var cells = row.querySelectorAll('td');
                    var found = false;

                    cells.forEach(function(cell) {
                        if (cell.textContent.trim().toLowerCase().includes(searchTerm)) {
                            found = true;
                        }
                    });

                    if (found) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                    
                });
            }

            function resetSearch() {
                var rows = document.querySelectorAll('tbody tr');
                rows.forEach(function(row) {
                    row.style.display = '';
                });
                searchInput.value = ''; 
            }

            searchButton.addEventListener('click', performSearch);

            searchInput.addEventListener('keyup', performSearch);

            searchInput.addEventListener('input', function() {
                if (searchInput.value.trim() === '') {
                    resetSearch();
                }
            });
        });

    </script>
@endsection