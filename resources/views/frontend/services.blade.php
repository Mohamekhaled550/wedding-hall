@extends('frontend.layouts.main')

@section('title', 'الخدمات')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h1 class="section-title" data-aos="fade-up">خدماتنا</h1>
            <p class="text-muted" data-aos="fade-up" data-aos-delay="100">نقدم لكم مجموعة شاملة من الخدمات لاحتفالاتكم</p>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            @forelse($sections as $section)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="service-card">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center">
                            <div class="service-icon">
                                <i class="bi bi-building"></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h3>{{ $section->name }}</h3>
                            <p class="text-muted mb-3">{{ $section->description ?? 'قاعة مجهزة بأحدث التجهيزات الاحترافية' }}</p>

                            @if($section->products && $section->products->count() > 0)
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($section->products->take(3) as $product)
                                <span class="badge bg-primary">{{ $product->name }}</span>
                                @endforeach
                                @if($section->products->count() > 3)
                                <span class="badge bg-secondary">+{{ $section->products->count() - 3 }} أخرى</span>
                                @endif
                            </div>
                            @endif

                            <div class="mt-3">
                                <a href="{{ route('frontend.contact') }}" class="btn btn-outline-primary btn-sm">
                                    احجز هذه القاعة <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    لا توجد أقسام متاحة حالياً. يرجى التواصل معنا للمزيد من المعلومات.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Additional Services -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">خدمات إضافية</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-camera"></i>
                    </div>
                    <h4>تصوير احترافي</h4>
                    <p class="text-muted">فريق تصوير محترف لتوثيق أحلى اللحظات</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-music-note-beamed"></i>
                    </div>
                    <h4>دي جي وموسيقى</h4>
                    <p class="text-muted">تشكيلة واسعة من الموسيقى والترفيه</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-cup-hot"></i>
                    </div>
                    <h4>خدمة الضيافة</h4>
                    <p class="text-muted">خدمة طعام وضيافة على أعلى مستوى</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <h4>مواقف سيارات</h4>
                    <p class="text-muted">مساحات واسعة لركن السيارات</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <h4>ديكور وتنسيق</h4>
                    <p class="text-muted">تصميم وتنسيق الديكور حسب رغبتكم</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>أمن وحماية</h4>
                    <p class="text-muted">فريق أمني محترف لضمان سلامة ضيوفكم</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section-padding">
    <div class="container text-center">
        <h2 data-aos="fade-up">هل تحتاج مساعدة في اختيار الخدمة؟</h2>
        <p class="text-muted mb-4" data-aos="fade-up" data-aos-delay="100">فريقنا جاهز لمساعدتك في اختيار أفضل الخدمات لاحتفاليتك</p>
        <a href="{{ route('frontend.contact') }}" class="btn btn-primary-custom" data-aos="fade-up" data-aos-delay="200">
            تواصل معنا <i class="bi bi-chat-dots"></i>
        </a>
    </div>
</section>
@endsection
