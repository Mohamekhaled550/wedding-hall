@extends('frontend.layouts.main')

@section('title', 'المعرض')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h1 class="section-title" data-aos="fade-up">معرض الصور</h1>
            <p class="text-muted" data-aos="fade-up" data-aos-delay="100">لحظات لا تُنسى من مناسبات سابقة</p>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600" alt="صورة 1">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=600" alt="صورة 2">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=600" alt="صورة 3">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=600" alt="صورة 4">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=600" alt="صورة 5">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1505236858219-8359eb29e329?w=600" alt="صورة 6">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=600" alt="صورة 7">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1511285560982-1356c11d4606?w=600" alt="صورة 8">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?w=600" alt="صورة 9">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">فيديوهات</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="فيديو 1" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="فيديو 2" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
