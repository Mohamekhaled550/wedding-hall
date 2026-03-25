@extends('dashboard.layouts.master')

@section('title')
    اضافة صلاحية
@endsection

@section('content')
<div class="col-xxl-12">
    <div class="card">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">اضافة صلاحية</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">الصلاحيات</a></li>
                            <li class="breadcrumb-item active">اضافة صلاحية</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf

                    <!-- اسم الصلاحية -->
                    <div class="col-md-6">
                        <label for="name" class="form-label">اسم الصلاحية</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" required>
                        <div class="valid-feedback">Looks good!</div>
                        @error('name')
                            <span class="text-danger"><small class="errorTxt">{{ $message }}</small></span>
                        @enderror
                    </div>

                    <!-- جدول الصلاحيات -->
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('models.model') }}</th>
                                    <th>{{ __('models.permissions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($permissions->groupBy(function($perm) {
                                    return explode('-', $perm->name)[0];
                                }) as $model => $modelPermissions)
                                    <tr>
                                        <td>{{ ucfirst($model) }}</td>
                                        <td>
                                            @foreach ($modelPermissions as $permission)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input"
                                                           type="checkbox"
                                                           name="permissions[]"
                                                           value="{{ $permission->id }}"
                                                           id="perm_{{ $permission->id }}">
                                                    <label class="form-check-label" for="perm_{{ $permission->id }}">
                                                        {{ __(explode('-', $permission->name)[1] ?? $permission->name) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- زر الحفظ -->
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">{{ __('models.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('dashboard/assets/js/preview-image.js') }}"></script>
@endsection
