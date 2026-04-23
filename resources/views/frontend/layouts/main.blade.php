<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'قاعة الأفراح') - {{ $settings->site_name ?? 'قاعة الأفراح' }}</title>
    <meta name="description" content="@yield('description', 'قاعة أفراح فاخرة - خدمات متميزة')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #d4a574;
            --secondary-color: #2c3e50;
            --accent-color: #c9a86c;
            --text-light: #f8f9fa;
            --text-dark: #333;
        }

        * {
            font-family: 'Cairo', sans-serif;
        }

        body {
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 10px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--secondary-color) !important;
        }

        .nav-link {
            font-weight: 500;
            color: var(--secondary-color) !important;
            transition: color 0.3s;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: all 0.3s;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero-section {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                        url('https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=1920');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .hero-content {
            text-align: center;
            color: white;
            z-index: 2;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        /* Buttons */
        .btn-primary-custom {
            background: var(--primary-color);
            border: none;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .btn-primary-custom:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(212, 165, 116, 0.4);
        }

        /* Section Styles */
        .section-padding {
            padding: 100px 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            width: 80px;
            height: 4px;
            background: var(--primary-color);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Cards */
        .service-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .service-icon {
            font-size: 4rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        /* Gallery */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .gallery-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: all 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        /* Footer */
        .footer {
            background: var(--secondary-color);
            color: white;
            padding: 60px 0 30px;
        }

        .footer-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .footer-link {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: var(--primary-color);
        }

        /* Contact Form */
        .contact-form .form-control {
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 15px;
            transition: all 0.3s;
        }

        .contact-form .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(212, 165, 116, 0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('frontend.home') }}">
                <i class="bi bi-gem"></i>
                {{ $settings->site_name ?? 'قاعة الأفراح' }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.services') }}">الخدمات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.gallery') }}">المعرض</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.about') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.calendar') }}">الكالندر</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.contact') }}">اتصل بنا</a>
                    </li>
                </ul>
                <a href="{{ route('admin.login.redirect', ['redirect' => 'frontend']) }}" class="btn btn-primary-custom">
                    <i class="bi bi-person-circle"></i> تسجيل الدخول
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-title">{{ $settings->site_name ?? 'قاعة الأفراح' }}</h5>
                    <p>{{ $settings->site_description ?? 'نقدم لكم أجمل اللحظات وأرقى الخدمات لاحتفالاتكم الخاصة' }}</p>
                    <div class="social-links">
                        @if($settings->facebook ?? false)
                        <a href="{{ $settings->facebook }}" class="text-white me-3" target="_blank">
                            <i class="bi bi-facebook fs-4"></i>
                        </a>
                        @endif
                        @if($settings->instagram ?? false)
                        <a href="{{ $settings->instagram }}" class="text-white me-3" target="_blank">
                            <i class="bi bi-instagram fs-4"></i>
                        </a>
                        @endif
                        @if($settings->whatsapp ?? false)
                        <a href="https://wa.me/{{ $settings->whatsapp }}" class="text-white" target="_blank">
                            <i class="bi bi-whatsapp fs-4"></i>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-title">روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('frontend.home') }}" class="footer-link">الرئيسية</a></li>
                        <li><a href="{{ route('frontend.services') }}" class="footer-link">خدماتنا</a></li>
                        <li><a href="{{ route('frontend.calendar') }}" class="footer-link">الكالندر</a></li>
                        <li><a href="{{ route('frontend.gallery') }}" class="footer-link">معرض الصور</a></li>
                        <li><a href="{{ route('frontend.contact') }}" class="footer-link">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-title">معلومات الاتصال</h5>
                    <ul class="list-unstyled">
                        @if($settings->address ?? false)
                        <li><i class="bi bi-geo-alt me-2"></i>{{ $settings->address }}</li>
                        @endif
                        @if($settings->phone ?? false)
                        <li><i class="bi bi-telephone me-2"></i>{{ $settings->phone }}</li>
                        @endif
                        @if($settings->email ?? false)
                        <li><i class="bi bi-envelope me-2"></i>{{ $settings->email }}</li>
                        @endif
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">© {{ date('Y') }} {{ $settings->site_name ?? 'قاعة الأفراح' }}. جميع الحقوق محفوظة</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
