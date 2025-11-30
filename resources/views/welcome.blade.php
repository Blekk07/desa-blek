<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Sistem Informasi Desa Bangah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Modern CSS Variables */
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --secondary-color: #6c757d;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --gradient-primary: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            --gradient-secondary: linear-gradient(135deg, #7209b7 0%, #4361ee 100%);
            --shadow-light: 0 5px 15px rgba(0, 0, 0, 0.05);
            --shadow-medium: 0 10px 25px rgba(0, 0, 0, 0.1);
            --shadow-heavy: 0 15px 35px rgba(0, 0, 0, 0.15);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        /* ==================== */
        /* RESPONSIVE HEADER BACKGROUND SYSTEM */
        /* ==================== */
        
        /* Header Base Styles */
        header#home {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background: var(--gradient-primary);
        }

        /* Background Container */
        .header-bg-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        /* All Background Layers */
        .header-bg-desktop,
        .header-bg-mobile,
        .header-bg-fallback {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Desktop Background - Default */
        .header-bg-desktop {
            display: block;
            background-attachment: fixed;
        }

        /* Mobile Background - Hidden by default */
        .header-bg-mobile {
            display: none;
            background-attachment: scroll;
        }

        /* Fallback Gradient Background */
        .header-bg-fallback {
            background: var(--gradient-primary) !important;
            display: none;
        }

        /* Animated Background Overlay */
        .animated-bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.6) 0%,
                rgba(0, 0, 0, 0.4) 30%,
                rgba(0, 0, 0, 0.2) 60%,
                rgba(0, 0, 0, 0.1) 100%
            );
            z-index: 1;
        }

        /* Particles Container */
        .particles-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        /* ==================== */
        /* RESPONSIVE BREAKPOINTS */
        /* ==================== */

        /* Tablet & Small Desktop */
        @media (max-width: 1024px) {
            header#home {
                min-height: 80vh !important;
            }
            
            .header-bg-desktop {
                background-attachment: scroll;
            }
        }

        /* Tablet */
        @media (max-width: 768px) {
            header#home {
                min-height: 70vh !important;
                padding-top: 2rem !important;
                padding-bottom: 2rem !important;
            }

            /* Switch to mobile background */
            .header-bg-desktop {
                display: none;
            }
            
            .header-bg-mobile {
                display: block;
                background-position: center top !important;
                background-size: cover !important;
            }

            /* Hide particles on mobile for performance */
            .particles-container {
                display: none !important;
            }

            /* Adjust container spacing */
            header#home .container.mt-5.pt-5 {
                margin-top: 1rem !important;
                padding-top: 1rem !important;
            }

            .hero-title {
                font-size: 2.2rem !important;
                line-height: 1.3;
            }

            .hero-subtitle {
                font-size: 1.1rem !important;
                line-height: 1.5;
            }
        }

        /* Mobile */
        @media (max-width: 576px) {
            header#home {
                min-height: 60vh !important;
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important;
            }

            /* Mobile-specific background optimization */
            .header-bg-mobile {
                background-position: center center !important;
                background-size: cover !important;
                background-attachment: scroll !important;
            }

            .hero-title {
                font-size: 1.8rem !important;
                line-height: 1.25;
                margin-bottom: 1rem !important;
            }

            .hero-subtitle {
                font-size: 1rem !important;
                margin-bottom: 1.5rem !important;
            }

            /* Single button layout */
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .hero-buttons .btn {
                width: 100%;
                max-width: 280px;
                margin-bottom: 0.5rem;
            }

            /* Adjust scroll indicator */
            .scroll-indicator {
                bottom: 20px;
            }
        }

        /* Small Mobile */
        @media (max-width: 480px) {
            header#home {
                min-height: 55vh !important;
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }

            .hero-content-wrapper {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .hero-title {
                font-size: 1.6rem !important;
            }

            .hero-subtitle {
                font-size: 0.9rem !important;
            }

            .scroll-indicator {
                bottom: 15px;
                font-size: 0.7rem;
            }

            .scroll-line {
                height: 30px;
            }
        }

        /* Extra Small Mobile */
        @media (max-width: 360px) {
            header#home {
                min-height: 50vh !important;
            }

            .hero-title {
                font-size: 1.4rem !important;
            }

            .hero-subtitle {
                font-size: 0.85rem !important;
            }
        }

        /* ==================== */
        /* EXISTING STYLES */
        /* ==================== */

        .hero-content-wrapper {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.25rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .animated-btn {
            position: relative;
            overflow: hidden;
            transition: var(--transition);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            box-shadow: var(--shadow-medium);
        }

        .animated-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .animated-btn:hover::before {
            left: 100%;
        }

        .animated-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-heavy);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            color: white;
            text-align: center;
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .scroll-line {
            width: 1px;
            height: 40px;
            background: white;
            margin: 0 auto 5px;
            animation: scrollLine 2s infinite;
        }

        @keyframes scrollLine {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(20px);
                opacity: 0;
            }
        }

        /* Typed Text Animation */
        .typed-text {
            position: relative;
        }

        .typed-text::after {
            content: '|';
            position: absolute;
            right: -8px;
            animation: blink 0.7s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Enhanced Section Styles */
        .section-badge {
            display: inline-block;
            padding: 0.25rem 1rem;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .section-description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--secondary-color);
        }

        /* Enhanced Card Styles */
        .feature-card, .process-card, .testimonial-card, .stat-card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            overflow: hidden;
            height: 100%;
        }

        .feature-card:hover, .process-card:hover, .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-heavy);
        }

        .feature-icon {
            margin-bottom: 1.5rem;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-icon img {
            max-height: 80px;
            transition: var(--transition);
        }

        .feature-card:hover .feature-icon img {
            transform: scale(1.1);
        }

        /* Process Section Enhancements */
        .process-steps {
            position: relative;
        }

        .process-steps::before {
            content: '';
            position: absolute;
            top: 40%;
            left: 10%;
            right: 10%;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-color) 0%, rgba(67, 97, 238, 0.3) 100%);
            z-index: 0;
        }

        .process-card {
            position: relative;
            z-index: 1;
            background: white;
        }

        .process-number {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 30px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .process-icon {
            margin-bottom: 1rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Enhanced CTA Section */
        .animated-cta-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.8) 0%, rgba(58, 12, 163, 0.7) 100%);
            z-index: 1;
        }

        .cta-title {
            font-size: 2.8rem;
            font-weight: 600;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .cta-description {
            font-size: 1.2rem;
        }

        .cta-button {
            position: relative;
            overflow: hidden;
            transition: var(--transition);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            box-shadow: var(--shadow-medium);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-heavy);
        }

        /* Stats Section Enhancements */
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        /* Testimonials Section Enhancements */
        .testimonial-card {
            position: relative;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 4rem;
            color: rgba(67, 97, 238, 0.1);
            font-family: Georgia, serif;
            line-height: 1;
        }

        /* Animation Classes */
        .wow {
            visibility: hidden;
        }

        /* CTA Mobile Responsive */
        @media (max-width: 768px) {
            .cta-block {
                background-attachment: scroll !important;
                padding: 80px 0 !important;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .process-steps::before {
                display: none;
            }
        }

        /* Additional utility styles */
        .features-section, .process-section, .testimonials-section {
            padding: 100px 0;
        }

        .stats-section {
            padding: 80px 0;
        }

        .cta-block {
            position: relative;
            padding: 120px 0;
            background: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
        }

        .bg-white {
            background-color: white !important;
        }

        .text-primary {
            color: var(--primary-color) !important;
        }

        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        /* Loading state */
        body:not(.loaded) {
            overflow: hidden;
        }
        body:not(.loaded) .hero-content-wrapper {
            opacity: 0;
        }
        body.loaded .hero-content-wrapper {
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }
        
        /* Enhanced mobile responsiveness */
        @media (max-width: 768px) {
            .features-section .row,
            .process-steps .row {
                margin-left: -10px;
                margin-right: -10px;
            }
            
            .feature-card,
            .process-card {
                margin-bottom: 1rem;
            }
            
            .testimonial-card {
                margin: 0.5rem;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            :root {
                --primary-color: #0044cc;
                --primary-dark: #0033aa;
            }
            
            .feature-card,
            .process-card,
            .testimonial-card {
                border: 2px solid #000;
            }
        }

        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            
            .animated-btn::before,
            .scroll-line {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- [ Header ] start -->
    <header id="home" class="d-flex align-items-center">
        <!-- Responsive Background Container -->
        <div class="header-bg-container">
            <!-- Desktop Background -->
            <div class="header-bg-desktop" style="background: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80') no-repeat center center; background-size: cover;"></div>
            <!-- Mobile Background Fallback -->
            <div class="header-bg-mobile" style="background: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80') no-repeat center center; background-size: cover;"></div>
            <!-- Gradient Fallback -->
            <div class="header-bg-fallback"></div>
        </div>
        
        <!-- Animated Background Overlay -->
        <div class="animated-bg-overlay"></div>
        
        <!-- Floating Particles Background (Desktop only) -->
        <div class="particles-container" id="particles-js"></div>

        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                    <div class="hero-content-wrapper">
                        <h1 class="mt-sm-3 text-white mb-4 f-w-600 hero-title">
                            Selamat Datang di Desa Bangah
                            <br>
                            <span class="text-warning typed-text" data-typed-items='["Sistem Informasi Desa Bangah", "Desa Bangah Digital", "Pelayanan Desa Modern"]'></span>
                        </h1>
                        <h5 class="mb-4 text-white opacity-75 hero-subtitle">
                            Wujudkan Tata Kelola Pemerintahan Desa yang Transparan, Efisien, dan Inovatif.
                            <br class="d-none d-md-block">
                            Akses informasi dan layanan desa dengan mudah melalui sistem kami.
                        </h5>
                        <div class="my-5 hero-buttons">
                            <a href="/login" class="btn btn-primary btn-lg animated-btn">
                                <span>Login</span>
                                <i class="ti ti-login ms-2"></i>
                            </a>
                            <a href="/register" class="btn btn-outline-light btn-lg animated-btn">
                                <span>Daftar</span>
                                <i class="ti ti-user-plus ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <div class="scroll-line"></div>
            <span>Scroll</span>
        </div>
    </header>
    <!-- [ Header ] End -->

    <!-- [ Keunggulan Kami ] start -->
    <section class="features-section bg-light">
        <div class="container title">
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-xl-6">
                    <h5 class="text-primary mb-0 section-badge">Pelayanan Terbaik</h5>
                    <h2 class="my-3 section-title">Mengapa Memilih Sistem Informasi Desa Kami?</h2>
                    <p class="mb-0 section-description">Kami berkomitmen untuk memberikan kemudahan akses informasi dan pelayanan publik bagi masyarakat desa.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="ti ti-device-laptop text-primary" style="font-size: 4rem;"></i>
                            </div>
                            <h5 class="my-3">Fasilitas Digital</h5>
                            <p class="mb-0 text-muted">Layanan administrasi, pengaduan, dan informasi desa dapat diakses secara online dengan mudah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="ti ti-chart-bar text-primary" style="font-size: 4rem;"></i>
                            </div>
                            <h5 class="my-3">Transparansi Informasi</h5>
                            <p class="mb-0 text-muted">Data dan kegiatan desa ditampilkan secara terbuka untuk membangun kepercayaan masyarakat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="ti ti-users text-primary" style="font-size: 4rem;"></i>
                            </div>
                            <h5 class="my-3">Aparatur Profesional</h5>
                            <p class="mb-0 text-muted">Didukung oleh perangkat desa yang berpengalaman dan siap melayani masyarakat dengan sepenuh hati.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Keunggulan Kami ] End -->

    <!-- [ Alur Layanan ] start -->
    <section class="pt-0 process-section bg-white" id="alur">
        <div class="container title">
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-xl-6">
                    <h5 class="text-primary mb-0 section-badge">Proses Cepat & Mudah</h5>
                    <h2 class="my-3 section-title">Alur Layanan Desa</h2>
                    <p class="mb-0 section-description">Ikuti langkah-langkah berikut untuk mengakses berbagai layanan desa secara online.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="process-steps">
                <div class="row align-items-center justify-content-center">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card process-card">
                            <div class="card-body text-center">
                                <div class="process-number">1</div>
                                <div class="process-icon">
                                    <i class="ti ti-user-plus f-36 text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="my-3">Buat Akun</h5>
                                <p class="mb-0 text-muted">Daftarkan diri Anda untuk mendapatkan akses ke layanan dan informasi desa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card process-card">
                            <div class="card-body text-center">
                                <div class="process-number">2</div>
                                <div class="process-icon">
                                    <i class="ti ti-file-text f-36 text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="my-3">Lengkapi Data</h5>
                                <p class="mb-0 text-muted">Isi data pribadi dan kebutuhan layanan Anda secara lengkap dan akurat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card process-card">
                            <div class="card-body text-center">
                                <div class="process-number">3</div>
                                <div class="process-icon">
                                    <i class="ti ti-search f-36 text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="my-3">Verifikasi</h5>
                                <p class="mb-0 text-muted">Permohonan Anda akan diverifikasi oleh petugas desa sesuai prosedur yang berlaku.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card process-card">
                            <div class="card-body text-center">
                                <div class="process-number">4</div>
                                <div class="process-icon">
                                    <i class="ti ti-bell f-36 text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="my-3">Hasil & Notifikasi</h5>
                                <p class="mb-0 text-muted">Hasil layanan akan diumumkan dan dapat diakses melalui akun Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Alur Layanan ] End -->

    <!-- [ Statistik ] start -->
    <section class="bg-light stats-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 stat-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stat-number" data-count="1200">0</div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-2">Penduduk Terdaftar</h4>
                                    <p class="mb-0">Data kependudukan yang terus diperbarui secara digital setiap tahun.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 stat-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stat-number" data-count="350">0</div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-2">Layanan Digital</h4>
                                    <p class="mb-0">Berbagai layanan administrasi dan publik tersedia secara online.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 stat-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stat-number" data-count="5">0</div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-2">Bidang Pelayanan</h4>
                                    <p class="mb-0">Administrasi, kependudukan, potensi desa, pengaduan, dan pembangunan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Statistik ] End -->

    <!-- [ CTA ] start -->
    <section class="cta-block">
        <!-- Animated Overlay -->
        <div class="animated-cta-overlay"></div>

        <div class="container" style="position: relative; z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="text-white mb-4 cta-title">Bergabung dengan <span
                            class="text-warning typed-text-2" data-typed-items='["Desa Bangah Digital", "Komunitas Digital", "Transformasi Digital"]'></span></h2>
                    <p class="text-white opacity-75 mb-4 lead cta-description">Dukung transformasi digital desa menuju pelayanan yang lebih cepat dan transparan. Daftar sekarang untuk menggunakan layanan kami.</p>
                    <a href="#register" class="btn btn-primary btn-lg cta-button">
                        <span>Daftar Akun</span>
                        <i class="ti ti-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- [ CTA ] End -->

    <!-- [ Testimoni ] start -->
    <section class="pt-0 testimonials-section bg-white">
        <div class="container title">
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-xl-6">
                    <h5 class="text-primary mb-0 section-badge">Testimoni</h5>
                    <h2 class="my-3 section-title">Apa Kata Warga?</h2>
                    <p class="mb-0 section-description">Kami bangga memberikan pelayanan terbaik. Simak pengalaman warga dalam menggunakan Sistem Informasi Desa Bangah.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card testimonial-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <span class="text-white fw-bold">BS</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Pelayanan Cepat dan Ramah</h5>
                                    <div class="star f-12 mb-3">
                                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                            class="fas fa-star text-warning"></i><i
                                            class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                    </div>
                                    <p class="mb-2 text-muted">Proses pengurusan surat jauh lebih mudah dan cepat melalui sistem ini. Sangat membantu warga!</p>
                                    <h6 class="mb-0">Budi Santoso, Warga</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card testimonial-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <span class="text-white fw-bold">RW</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Transparansi Data Desa</h5>
                                    <div class="star f-12 mb-3">
                                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                            class="fas fa-star text-warning"></i><i
                                            class="fas fa-star text-warning"></i><i
                                            class="fas fa-star-half-alt text-warning"></i>
                                    </div>
                                    <p class="mb-2 text-muted">Sekarang semua informasi desa bisa diakses dengan mudah dan terbuka. Sangat bagus untuk warga.</p>
                                    <h6 class="mb-0">Rina Wulandari, Warga</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card testimonial-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <span class="text-white fw-bold">SA</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Inovasi Digital Desa</h5>
                                    <div class="star f-12 mb-3">
                                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                            class="fas fa-star text-warning"></i><i
                                            class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                    </div>
                                    <p class="mb-2 text-muted">Sistem ini benar-benar membantu warga mengurus layanan tanpa harus datang ke kantor desa.</p>
                                    <h6 class="mb-0">Siti Aminah, Warga</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Testimoni ] End -->

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Desa Bangah</h5>
                    <p class="text-muted">Sistem Informasi Desa Bangah memberikan kemudahan akses layanan publik dan informasi desa secara digital.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-muted text-decoration-none">Beranda</a></li>
                        <li><a href="#alur" class="text-muted text-decoration-none">Alur Layanan</a></li>
                        <li><a href="#login" class="text-muted text-decoration-none">Login</a></li>
                        <li><a href="#register" class="text-muted text-decoration-none">Daftar</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Kontak</h5>
                    <ul class="list-unstyled text-muted">
                        <li><i class="ti ti-map-pin me-2"></i> Jl. Desa Bangah No. 123</li>
                        <li><i class="ti ti-phone me-2"></i> (021) 1234-5678</li>
                        <li><i class="ti ti-mail me-2"></i> info@desabangah.desa.id</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-muted mb-0">&copy; 2023 Desa Bangah. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex justify-content-md-end">
                        <a href="#" class="text-muted me-3"><i class="ti ti-brand-facebook"></i></a>
                        <a href="#" class="text-muted me-3"><i class="ti ti-brand-twitter"></i></a>
                        <a href="#" class="text-muted"><i class="ti ti-brand-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Typed.js for hero section
            if (document.querySelector('.typed-text')) {
                var typed = new Typed('.typed-text', {
                    strings: document.querySelector('.typed-text').getAttribute('data-typed-items').split(','),
                    typeSpeed: 50,
                    backSpeed: 30,
                    backDelay: 2000,
                    loop: true
                });
            }

            // Initialize Typed.js for CTA section
            if (document.querySelector('.typed-text-2')) {
                var typed2 = new Typed('.typed-text-2', {
                    strings: document.querySelector('.typed-text-2').getAttribute('data-typed-items').split(','),
                    typeSpeed: 50,
                    backSpeed: 30,
                    backDelay: 2000,
                    loop: true
                });
            }

            // Initialize Particles.js only on desktop
            if (document.getElementById('particles-js') && window.innerWidth > 768) {
                particlesJS('particles-js', {
                    particles: {
                        number: {
                            value: 60,
                            density: {
                                enable: true,
                                value_area: 800
                            }
                        },
                        color: {
                            value: "#ffffff"
                        },
                        shape: {
                            type: "circle",
                            stroke: {
                                width: 0,
                                color: "#000000"
                            }
                        },
                        opacity: {
                            value: 0.3,
                            random: true,
                            anim: {
                                enable: true,
                                speed: 1,
                                opacity_min: 0.1,
                                sync: false
                            }
                        },
                        size: {
                            value: 2,
                            random: true,
                            anim: {
                                enable: true,
                                speed: 2,
                                size_min: 0.1,
                                sync: false
                            }
                        },
                        line_linked: {
                            enable: true,
                            distance: 120,
                            color: "#ffffff",
                            opacity: 0.1,
                            width: 1
                        },
                        move: {
                            enable: true,
                            speed: 0.8,
                            direction: "none",
                            random: true,
                            straight: false,
                            out_mode: "out",
                            bounce: false
                        }
                    },
                    interactivity: {
                        detect_on: "canvas",
                        events: {
                            onhover: {
                                enable: false,
                                mode: "grab"
                            },
                            onclick: {
                                enable: false,
                                mode: "push"
                            },
                            resize: true
                        }
                    },
                    retina_detect: true
                });
            }

            // Animate numbers in stats section
            function animateNumbers() {
                const statNumbers = document.querySelectorAll('.stat-number');
                
                statNumbers.forEach(stat => {
                    const target = parseInt(stat.getAttribute('data-count'));
                    const duration = 2000;
                    const step = target / (duration / 16);
                    let current = 0;
                    
                    const timer = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        stat.textContent = Math.floor(current) + (stat.getAttribute('data-count') > '1000' ? '+' : '');
                    }, 16);
                });
            }

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        if (entry.target.classList.contains('stat-number')) {
                            animateNumbers();
                        }
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            document.querySelectorAll('.feature-card, .process-card, .testimonial-card, .stat-card').forEach(el => {
                observer.observe(el);
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Header scroll effect
            let lastScrollTop = 0;
            const header = document.querySelector('header');
            
            window.addEventListener('scroll', function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    // Scrolling down
                    header.style.opacity = '0.9';
                    header.style.transform = 'translateY(-10px)';
                } else {
                    // Scrolling up
                    header.style.opacity = '1';
                    header.style.transform = 'translateY(0)';
                }
                lastScrollTop = scrollTop;
            });

            // Set body as loaded
            document.body.classList.add('loaded');

            // Handle window resize with debounce
            function debounce(func, wait, immediate) {
                let timeout;
                return function executedFunction() {
                    const context = this;
                    const args = arguments;
                    const later = function() {
                        timeout = null;
                        if (!immediate) func.apply(context, args);
                    };
                    const callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) func.apply(context, args);
                };
            }

            window.addEventListener('resize', debounce(function() {
                // Reinitialize particles if needed
                if (window.innerWidth > 768 && !document.querySelector('#particles-js canvas')) {
                    if (typeof particlesJS !== 'undefined') {
                        particlesJS('particles-js', {
                            particles: {
                                number: {
                                    value: 40,
                                    density: {
                                        enable: true,
                                        value_area: 800
                                    }
                                },
                                color: {
                                    value: "#ffffff"
                                },
                                shape: {
                                    type: "circle",
                                    stroke: {
                                        width: 0,
                                        color: "#000000"
                                    }
                                },
                                opacity: {
                                    value: 0.3,
                                    random: true,
                                    anim: {
                                        enable: true,
                                        speed: 1,
                                        opacity_min: 0.1,
                                        sync: false
                                    }
                                },
                                size: {
                                    value: 2,
                                    random: true,
                                    anim: {
                                        enable: true,
                                        speed: 2,
                                        size_min: 0.1,
                                        sync: false
                                    }
                                },
                                line_linked: {
                                    enable: true,
                                    distance: 120,
                                    color: "#ffffff",
                                    opacity: 0.1,
                                    width: 1
                                },
                                move: {
                                    enable: true,
                                    speed: 0.8,
                                    direction: "none",
                                    random: true,
                                    straight: false,
                                    out_mode: "out",
                                    bounce: false
                                }
                            },
                            interactivity: {
                                detect_on: "canvas",
                                events: {
                                    onhover: {
                                        enable: false,
                                        mode: "grab"
                                    },
                                    onclick: {
                                        enable: false,
                                        mode: "push"
                                    },
                                    resize: true
                                }
                            },
                            retina_detect: true
                        });
                    }
                }
            }, 250));
        });
    </script>
</body>
</html>