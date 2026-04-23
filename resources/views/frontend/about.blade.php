@extends('frontend.layouts.main')

@section('title', 'من نحن')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h1 class="section-title" data-aos="fade-up">من نحن</h1>
            <p class="text-muted" data-aos="fade-up" data-aos-delay="100">نقدم لكم أجمل اللحظات وأرقى الخدمات</p>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-up">
                <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=600" alt="عن القاعة" class="img-fluid rounded-4 shadow">
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h2 class="mb-4">قصتنا</h2>
                <p class="text-muted">{{ $settings->about_us ?? 'نحن قاعة أفراح رائدة في تقديم خدمات الاحتفالات والمناسبات. منذ تأسيسنا، نسعى دائماً لتقديم أفضل الخدمات لعملائنا الكرام.' }}</p>
                <p class="text-muted">نفتخر بفريقنا المحترف الذي يعمل بتفانٍ لإ جعل كل مناسبة لحظة لا تُنسى. نحن نؤمن بأن كل عميل يستحق احتفالاً مميزاً独一无二的.'</p>

                <div class="mt-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-check-circle-fill text-primary fs-4 me-3"></i>
                        <span>خبرة أكثر من 10 سنوات</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-check-circle-fill text-primary fs-4 me-3"></i>
                        <span>أكثر من 1000 مناسبة ناجحة</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-check-circle-fill text-primary fs-4 me-3"></i>
                        <span>فريق عمل محترف ومدرب</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-primary fs-4 me-3"></i>
                        <span>خدمة عملاء على مدار الساعة</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-lg-3" data-aos="fade-up">
                <i class="bi bi-calendar-check fs-1 mb-3"></i>
                <h3 class="fs-1 fw-bold">10+</h3>
                <p>سنوات خبرة</p>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-people fs-1 mb-3"></i>
                <h3 class="fs-1 fw-bold">1000+</h3>
                <p>عميل سعيد</p>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-building fs-1 mb-3"></i>
                <h3 class="fs-1 fw-bold">5</h3>
                <p>قاعات</p>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-star fs-1 mb-3"></i>
                <h3 class="fs-1 fw-bold">4.9</h3>
                <p>تقييم العملاء</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">فريقنا</h2>
            <p class="text-muted" data-aos="fade-up" data-aos-delay="100">فريق محترف جاهز لخدمتكم</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                <div class="service-card">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200" alt="فريق 1" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                    <h5>أحمد محمد</h5>
                    <p class="text-muted">مدير القاعة</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200" alt="فريق 2" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                    <h5>سارة علي</h5>
                    <p class="text-muted">مسؤولة الفعاليات</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200" alt="فريق 3" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                    <h5>محمد خالد</h5>
                    <p class="text-muted">مسؤول الديكور</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200" alt="فريق 4" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                    <h5>نورة عبدالله</h5>
                    <p class="text-muted">مسؤولة الضيافة</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="service-card text-center">
                    <div class="service-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h3>رؤيتنا</h3>
                    <p class="text-muted">أن نكون الخيار الأول لكل من يبحث عن قاعة أفراح استثنائية، وتقديم تجربة لا تُنسى لكل عملائنا.</p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card text-center">
                    <div class="service-icon">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                    <h3>رسالتنا</h3>
                    <p class="text-muted">نلتزم بتقديم خدمات عالية الجودة مع التركيز على رضا العملاء والتميز في كل تفصيل.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
