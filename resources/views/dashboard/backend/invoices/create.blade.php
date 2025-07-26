@extends('dashboard.layouts.master')

@section('title')
 Create Invoice
@endsection

@section('content')



<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> Reservation </h6>
        <div class="ml-auto">
            <a href="" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('models.invoices') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.invoices.store') }}" autocomplete="off" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf

{{-- ✅ بيانات العميل --}}
<div class="row">
    {{-- اسم العميل --}}
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">اسم العميل <span class="text-danger">*</span></label>
        <input type="text" name="customer_name" class="form-control form-control-solid" placeholder="ادخل اسم العميل" required>
        @error('customer_name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    {{-- ايميل العميل --}}
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">البريد الإلكتروني</label>
        <input type="email" name="customer_email" class="form-control form-control-solid" placeholder="ادخل البريد إن وجد">
        @error('customer_email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    {{-- رقم هاتف العميل --}}
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">رقم الهاتف</label>
        <input type="text" name="customer_phone" class="form-control form-control-solid" placeholder="ادخل رقم الهاتف">
        @error('customer_phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    {{-- عنوان العميل --}}
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">العنوان</label>
        <input type="text" name="customer_address" class="form-control form-control-solid" placeholder="ادخل عنوان العميل">
        @error('customer_address') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>



            <div class="row">
                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Reservation id</span>
                    </label>
                    <input type="text" name="invoice_number" value="{{ old('invoice_number') }}" class="form-control form-control-solid" placeholder="Enter invoice number" >
                    @error('invoice_number') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="form-group">
    <label for="due_date">Wedding Date</label>
    <input type="date" name="due_date" id="due_date" class="form-control" value="{{ request()->get('due_date') ?? old('due_date') }}">
    @error('due_date')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Reservation Date</span>
                    </label>
                    <input type="date" name="invoice_Date" value="{{ old('invoice_Date') }}" class="form-control form-control-solid" placeholder="Enter invoice_Date" >
                    @error('invoice_Date') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

            </div>


            <div class="row">

                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <div class="d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                            <label class="required form-label">Hall Number</label>
                            <select class="form-select mb-2 select2-hidden-accessible" name="section_id" id="section_id" data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true">
                                <option value="" disabled selected></option>
                                @foreach ( $sections as $section )
                                  <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-muted fs-7">Set the wedding hall </div>
                            @error('section_id') <span class="text-danger">{{ $message }}</span>  @enderror

                        </div>

                    </div>
                </div>



                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <div class="d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                            <label class="required form-label">Dinner</label>
                            <select class="form-select mb-2 select2-hidden-accessible" name="product_id" id="product_id" data-control="select2" data-hide-search="true" data-placeholder="Select an option" data-select2-id="select2-data-16-dzu5" tabindex="-1" aria-hidden="true">
                                <option value=""> </option>
                            </select>
                            <div class="text-muted fs-7">Set the dinner type</div>
                        </div>
                        @error('product_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>


                <div class="row">

    <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
<div class="d-flex flex-wrap gap-5">
<div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
<label class="required form-label">سعر الطبق</label>
<input type="text" name="plate_price" value="{{ old('plate_price') }}" class="form-control form-control-solid" placeholder="plate_price" id="plate_price">
<div class="text-muted fs-7">أدخل سعر الطبق</div>
</div>
</div>
</div>

    </div>
</div>

<div class="row">

<div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
<div class="d-flex flex-wrap gap-5">
<div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
<label class="required form-label">عدد الأشخاص</label>
<input type="number" name="number_of_people" value="{{ old('number_of_people') }}" class="form-control form-control-solid" placeholder="number of people" id="number_of_people">
<div class="text-muted fs-7">أدخل عدد الأشخاص</div>
</div>
</div>
</div>

<div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
            <span class="required">الخصم</span>
        </label>
        <input type="text" name="discount" value="{{ old('discount' , 0) }}" class="form-control form-control-solid" placeholder="Enter discount" id="Discount">
        @error('discount') <span class="text-danger">{{ $message }}</span>  @enderror
    </div>

<hr>
<h4>خيارات إضافية</h4>
<div class="row">

    {{-- ✅ 1. حجز الغرف --}}
    <div class="col-md-4 mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="rooms_enabled" name="rooms_enabled">
            <label class="form-check-label" for="enable_rooms">تفعيل حجز الغرف</label>
        </div>
        <input type="number" class="form-control mt-2" name="rooms_count" id="rooms_count" placeholder="عدد الغرف" disabled>
        <input type="number" class="form-control mt-2" name="room_price" id="room_price" placeholder="سعر الغرفة" disabled>
    </div>

    {{-- ✅ 2. باكدج التصوير --}}
    <div class="col-md-4 mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="photo_enabled" name="photo_enabled">
            <label class="form-check-label" for="photo_enabled">تفعيل باكدج التصوير</label>
        </div>
        <input type="number" class="form-control mt-2" name="photo_price" id="photo_price" placeholder="سعر الباكدج" disabled>
    </div>

    {{-- ✅ 3. فقرات غنائية --}}
    <div class="col-md-4 mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="songs_enabled" name="songs_enabled">
            <label class="form-check-label" for="enable_singing">فقرات غنائية</label>
        </div>
        <input type="number" class="form-control mt-2" name="songs_count" id="songs_count" placeholder="عدد الفقرات" disabled>
        <input type="number" class="form-control mt-2" name="song_price" id="song_price" placeholder="سعر الفقرة" disabled>
    </div>

    {{-- ✅ 4. سرفيس --}}
    <div class="col-md-4 mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="service_enabled" name="service_enabled">
            <label class="form-check-label" for="enable_service">تفعيل سرفيس</label>
        </div>
        <input type="number" class="form-control mt-2" name="service_price" id="service_price" placeholder="سعر السرفيس" disabled>
    </div>

    {{-- ✅ 5. خيار إضافي --}}
    <div class="col-md-4 mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="extra_option_enabled" name="extra_option_enabled">
            <label class="form-check-label" for="extra_option_enabled">تفعيل خيار إضافي</label>
        </div>
        <input type="text" class="form-control mt-2" name="extra_option_name" id="extra_option_name" placeholder="اسم الخيار" disabled>
        <input type="number" class="form-control mt-2" name="extra_option_price	" id="extra_option_price" placeholder="سعر الخيار" disabled>
    </div>

</div>




<div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
<span class="required">الإجمالي</span>
</label>
<input type="text" name="total" value="{{ old('total') }}" class="form-control form-control-solid" placeholder="Enter total" id="Total" readonly>
@error('total') <span class="text-danger">{{ $message }}</span>  @enderror
</div>







            <div class="row">

                <div class="d-flex col-12 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">ملاحظات</span>
                    </label>
                    <textarea class="form-control form-control-solid" value="{{ old('note') }}" placeholder="Enter Notes" id="exampleTextarea" name="note" rows="3"></textarea>

                    @error('note') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
            </div>


            <div class="row">


                <div class="col-md-6 col-12 mb-3">
                    <label for="formFile" class="form-label">Images</label>
                    <input class="form-control image" type="file" id="formFile" name="img[]" multiple>
                    @error('img')
                        <span class="text-danger">
                            <small class="errorTxt">{{ $message }}</small>
                        </span>
                    @enderror





                </div>
x




            </div>


            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>

        </form>

    </div>

</div>



@endsection


@section('js')
<script src="{{ asset('dashboard/assets/js/preview-image.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#section_id').on('change', function () {
            var section_id = $(this).val();
            if (section_id) {
                $.ajax({
                    url: "{{ URL::to('admin/category-products') }}/" + section_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#product_id').empty();

                        $.each(data, function (key, value) {
                            $('#product_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                    ,
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<script>
  document.getElementById('plate_price').addEventListener('input', calculateTotal);
document.getElementById('number_of_people').addEventListener('input', calculateTotal);
document.getElementById('Discount').addEventListener('input', calculateTotal);

function calculateTotal() {
    // الحصول على القيم
    const platePrice = parseFloat(document.getElementById('plate_price').value) || 0;
    const numberOfPeople = parseInt(document.getElementById('number_of_people').value) || 0;
    const discount = parseFloat(document.getElementById('Discount').value) || 0;

    // حساب الإجمالي
    let total = platePrice * numberOfPeople - discount;

    // تحديث قيمة الإجمالي
    document.getElementById('Total').value = total.toFixed(2);
}

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let sectionSelect = document.getElementById("section_id");
        let productSelect = document.getElementById("product_id");

        let productsData = @json($sections);

        sectionSelect.addEventListener("change", function () {
            let sectionID = this.value;
            productSelect.innerHTML = '<option value="">Select a product</option>';

            if (sectionID) {
                let selectedSection = productsData.find(section => section.id == sectionID);
                if (selectedSection && selectedSection.products.length > 0) {
                    selectedSection.products.forEach(product => {
                        let option = new Option(product.name, product.id);
                        productSelect.appendChild(option);
                    });
                }
            }
        });
    });
</script>
<script>
    // تفعيل/تعطيل الحقول بناءً على الشيك بوكس
    document.addEventListener('DOMContentLoaded', function () {
        const toggles = [
            { checkbox: 'rooms_enabled', inputs: ['rooms_count', 'room_price'] },
            { checkbox: 'photo_enabled', inputs: ['photo_enabled' , ['photo_price']] },
            { checkbox: 'songs_enabled', inputs: ['songs_count', 'song_price'] },
            { checkbox: 'service_enabled', inputs: ['service_price'] },
            { checkbox: 'extra_option_enabled', inputs: ['extra_option_name', 'extra_option_price'] }
        ];

        toggles.forEach(({ checkbox, inputs }) => {
            const cb = document.getElementById(checkbox);
            cb.addEventListener('change', () => {
                inputs.forEach(id => {
                    const input = document.getElementById(id);
                    input.disabled = !cb.checked;
                    if (!cb.checked) input.value = '';
                    calculateTotal();
                });
            });

            inputs.forEach(id => {
                const input = document.getElementById(id);
                input.addEventListener('input', calculateTotal);
            });
        });
    });

    // تحديث التوتال
    function calculateTotal() {
        const platePrice = parseFloat(document.getElementById('plate_price').value) || 0;
        const numberOfPeople = parseInt(document.getElementById('number_of_people').value) || 0;
        const discount = parseFloat(document.getElementById('Discount').value) || 0;

        let total = platePrice * numberOfPeople;

        if (document.getElementById('rooms_enabled').checked) {
            const roomCount = parseInt(document.getElementById('rooms_count').value) || 0;
            const roomPrice = parseFloat(document.getElementById('room_price').value) || 0;
            total += roomCount * roomPrice;
        }

        if (document.getElementById('photo_enabled').checked) {
            total += parseFloat(document.getElementById('photo_price').value) || 0;
        }

        if (document.getElementById('songs_enabled').checked) {
            const singingCount = parseInt(document.getElementById('songs_count').value) || 0;
            const singingPrice = parseFloat(document.getElementById('song_price').value) || 0;
            total += singingCount * singingPrice;
        }

        if (document.getElementById('service_enabled').checked) {
            total += parseFloat(document.getElementById('service_price').value) || 0;
        }

        if (document.getElementById('extra_option_enabled').checked) {
            total += parseFloat(document.getElementById('extra_option_price').value) || 0;
        }

        total -= discount;

        document.getElementById('Total').value = total.toFixed(2);
    }
</script>

@endsection


