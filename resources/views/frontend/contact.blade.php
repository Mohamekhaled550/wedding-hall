@extends('frontend.layouts.main')

@section('title', 'اتصل بنا')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h1 class="section-title" data-aos="fade-up">اتصل بنا</h1>
            <p class="text-muted" data-aos="fade-up" data-aos-delay="100">نحن هنا لمساعدتك! تواصل معنا لأي استفسار</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Info -->
            <div class="col-lg-5" data-aos="fade-up">
                <h2 class="mb-4">معلومات الاتصال</h2>
                <p class="text-muted mb-4">يمكنكم التواصل معنا عبر أي من القنوات التالية:</p>

                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                        <i class="bi bi-geo-alt text-primary fs-4"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">العنوان</h5>
                        <p class="text-muted mb-0">{{ $settings->address ?? 'العنوان غير محدد' }}</p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                        <i class="bi bi-telephone text-primary fs-4"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">الهاتف</h5>
                        <p class="text-muted mb-0">{{ $settings->phone ?? 'غير محدد' }}</p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                        <i class="bi bi-envelope text-primary fs-4"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">البريد الإلكتروني</h5>
                        <p class="text-muted mb-0">{{ $settings->email ?? 'غير محدد' }}</p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                        <i class="bi bi-clock text-primary fs-4"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">أوقات العمل</h5>
                        <p class="text-muted mb-0">السبت - الخميس: 9ص - 10م</p>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-4">
                    <h5 class="mb-3">تابعونا</h5>
                    <div class="d-flex gap-3">
                        @if($settings->facebook ?? false)
                        <a href="{{ $settings->facebook }}" class="btn btn-primary" target="_blank">
                            <i class="bi bi-facebook"></i>
                        </a>
                        @endif
                        @if($settings->instagram ?? false)
                        <a href="{{ $settings->instagram }}" class="btn btn-danger" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                        @endif
                        @if($settings->whatsapp ?? false)
                        <a href="https://wa.me/{{ $settings->whatsapp }}" class="btn btn-success" target="_blank">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <h2 class="mb-4">أرسل لنا رسالة</h2>

                    <form class="contact-form" action="{{ route('frontend.contact.send') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">الاسم</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">رقم الهاتف</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label">الموضوع</label>
                                <select class="form-select" id="subject" name="subject">
                                    <option value="استفسار عام">استفسار عام</option>
                                    <option value="حجز قاعة">حجز قاعة</option>
                                    <option value="استفسار عن الخدمات">استفسار عن الخدمات</option>
                                    <option value="اقتراح أو شكوى">اقتراح أو شكوى</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">الرسالة</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-custom w-100">
                                    <i class="bi bi-send me-2"></i> إرسال الرسالة
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">موقعنا</h2>
        </div>
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <div class="ratio ratio-21x9 rounded-4 overflow-hidden shadow">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.5!2d31.2!3d30.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDAwJzAwLjAiTiAzMcKwMTInMDAuMCJF!5e0!3m2!1sar!2seg!4v1600000000000!5m2!1sar!2seg"
                            width="100%"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Form submission handling
    document.querySelector('.contact-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Get form data
        const formData = new FormData(this);

        // Show success message (in real app, send to server)
        alert('شكراً لك! تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.');

        // Reset form
        this.reset();
    });
</script>
@endsection
