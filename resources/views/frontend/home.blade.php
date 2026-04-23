@extends('frontend.layouts.main')

@section('title', 'الرئيسية')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content" data-aos="fade-up">
        <h1 class="hero-title">{{ $settings->hero_title ?? 'قاعة الأفراح الفاخرة' }}</h1>
        <p class="hero-subtitle">{{ $settings->hero_subtitle ?? 'نجعل أحلامكم حقيقة' }}</p>
        <a href="{{ route('frontend.contact') }}" class="btn btn-primary-custom">
            احجز الآن <i class="bi bi-arrow-left"></i>
        </a>
    </div>
</section>

<!-- Services Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">خدماتنا</h2>
            <p class="text-muted" data-aos="fade-up" data-aos-delay="100">نقدم لكم مجموعة متنوعة من الخدمات الاحترافية</p>
        </div>

        <div class="row g-4">
            @forelse($sections as $section)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <h3>{{ $section->name }}</h3>
                    <p class="text-muted">{{ $section->description ?? 'قاعة مجهزة بأحدث التجهيزات' }}</p>
                    <a href="{{ route('frontend.services') }}" class="btn btn-outline-primary">
                        المزيد <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">لا توجد أقسام متاحة حالياً</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">لماذا تختارنا؟</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <h4>خبرة واسعة</h4>
                    <p class="text-muted">سنوات من الخبرة في تنظيم أحلى المناسبات</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>فريق محترف</h4>
                    <p class="text-muted">فريق مدرب على أعلى مستوى من الخدمة</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-gem"></i>
                    </div>
                    <h4>جودة عالية</h4>
                    <p class="text-muted">نستخدم أجود المواد والمعدات</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h4>توقيت مرن</h4>
                    <p class="text-muted">نلتزم بمواعيدكم ونحترم وقتكم</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">معرض الصور</h2>
            <p class="text-muted" data-aos="fade-up" data-aos-delay="100">لحظات لا تُنسى من مناسبات سابقة</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=400" alt="صورة 1">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=400" alt="صورة 2">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=400" alt="صورة 3">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=400" alt="صورة 4">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('frontend.gallery') }}" class="btn btn-primary-custom">
                عرض المزيد <i class="bi bi-arrow-left"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding" style="background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), url('https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=1920'); background-size: cover; background-position: center;">
    <div class="container text-center text-white">
        <h2 data-aos="fade-up">جاهزون لاحتفاليتكم!</h2>
        <p class="mb-4" data-aos="fade-up" data-aos-delay="100">اتصلوا بنا الآن واحجزوا موعدكم</p>
        <a href="{{ route('frontend.contact') }}" class="btn btn-primary-custom" data-aos="fade-up" data-aos-delay="200">
            احجز الآن <i class="bi bi-calendar-check"></i>
        </a>
    </div>
</section>
@endsection
