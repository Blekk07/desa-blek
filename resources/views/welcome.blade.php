@extends('layouts.landing')

@section('title', 'Selamat Datang di Sistem Informasi Desa')

@section('content')
    <!-- [ Header ] start -->
    <header id="home" class="d-flex align-items-center"
        style="position: relative; min-height: 100dvh; background: url('{{ asset('assets/images/my/hero-section.png') }}') no-repeat center center; background-size: cover;">
        <!-- Animated Background Overlay -->
        <div class="animated-bg-overlay"></div>
        
        <!-- Floating Particles Background -->
        <div class="particles-container" id="particles-js"></div>

        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8 text-center">
            <div class="hero-content-wrapper">
            <h1 class="mt-sm-3 text-white mb-4 f-w-600 hero-title" data-wow-delay="0.2s">
                Selamat Datang di Desa Bangah
                <br>
                <span class="text-primary typed-text" data-typed-items='["Sistem Informasi Desa Bangah", "Desa Bangah Digital", "Pelayanan Desa Modern"]'></span>
            </h1>
            <h5 class="mb-4 text-white opacity-75 hero-subtitle" data-wow-delay="0.4s">
                Wujudkan Tata Kelola Pemerintahan Desa yang Transparan, Efisien, dan Inovatif.
                <br class="d-none d-md-block">
                Akses informasi dan layanan desa dengan mudah melalui sistem kami.
            </h5>
            <div class="my-5 hero-buttons" data-wow-delay="0.6s">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg animated-btn">
                <span>Masuk</span>
                <i class="ti ti-login ms-2"></i>
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
    <section class="features-section">
        <div class="container title">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
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
                    <div class="card feature-card wow fadeInUp" data-wow-delay="0.4s">
                        <div class="card-body">
                            <div class="feature-icon">
                                <img src="../assets/images/landing/img-feature1.svg"
                                    alt="Pelayanan publik dengan fasilitas modern" class="img-fluid">
                            </div>
                            <h5 class="my-3">Fasilitas Digital</h5>
                            <p class="mb-0 text-muted">Layanan administrasi, pengaduan, dan informasi desa dapat diakses secara online dengan mudah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card feature-card wow fadeInUp" data-wow-delay="0.6s">
                        <div class="card-body">
                            <div class="feature-icon">
                                <img src="../assets/images/landing/img-feature2.svg"
                                    alt="Petugas desa membantu warga" class="img-fluid">
                            </div>
                            <h5 class="my-3">Transparansi Informasi</h5>
                            <p class="mb-0 text-muted">Data dan kegiatan desa ditampilkan secara terbuka untuk membangun kepercayaan masyarakat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card feature-card wow fadeInUp" data-wow-delay="0.8s">
                        <div class="card-body">
                            <div class="feature-icon">
                                <img src="../assets/images/landing/img-feature3.svg"
                                    alt="Aparat desa profesional melayani masyarakat" class="img-fluid">
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
    <section class="pt-0 process-section" id="alur">
        <div class="container title">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
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
                        <div class="card process-card wow fadeInUp" data-wow-delay="0.4s">
                            <div class="card-body text-center">
                                <div class="process-number">1</div>
                                <div class="process-icon">
                                    <i class="ti ti-user-plus f-36 text-primary"></i>
                                </div>
                                <h5 class="my-3">Buat Akun</h5>
                                <p class="mb-0 text-muted">Daftarkan diri Anda untuk mendapatkan akses ke layanan dan informasi desa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card process-card wow fadeInUp" data-wow-delay="0.6s">
                            <div class="card-body text-center">
                                <div class="process-number">2</div>
                                <div class="process-icon">
                                    <i class="ti ti-file-text f-36 text-primary"></i>
                                </div>
                                <h5 class="my-3">Lengkapi Data</h5>
                                <p class="mb-0 text-muted">Isi data pribadi dan kebutuhan layanan Anda secara lengkap dan akurat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card process-card wow fadeInUp" data-wow-delay="0.8s">
                            <div class="card-body text-center">
                                <div class="process-number">3</div>
                                <div class="process-icon">
                                    <i class="ti ti-search f-36 text-primary"></i>
                                </div>
                                <h5 class="my-3">Verifikasi</h5>
                                <p class="mb-0 text-muted">Permohonan Anda akan diverifikasi oleh petugas desa sesuai prosedur yang berlaku.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card process-card wow fadeInUp" data-wow-delay="1.0s">
                            <div class="card-body text-center">
                                <div class="process-number">4</div>
                                <div class="process-icon">
                                    <i class="ti ti-bell f-36 text-primary"></i>
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

    <!-- [ CTA ] start -->
    <section class="cta-block"
        style="position: relative; padding: 120px 0; background: url('{{ asset('assets/images/my/join-us.png') }}') no-repeat center center; background-size: cover; background-attachment: fixed;">
        <!-- Animated Overlay -->
        <div class="animated-cta-overlay"></div>

        <div class="container" style="position: relative; z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="text-white mb-4 cta-title">Bergabung dengan <span
                            class="text-primary typed-text-2" data-typed-items='["Desa Bangah Digital", "Komunitas Digital", "Transformasi Digital"]'></span></h2>
                    <p class="text-white opacity-75 mb-4 lead cta-description">Dukung transformasi digital desa menuju pelayanan yang lebih cepat dan transparan. Daftar sekarang untuk menggunakan layanan kami.</p>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg cta-button">
                        <span>Daftar Akun</span>
                        <i class="ti ti-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- [ CTA ] End -->

    <!-- [ Statistik ] start -->
    <section class="bg-white stats-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 stat-card wow fadeInUp" data-wow-delay="0.2s">
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
                    <div class="card border-0 stat-card wow fadeInUp" data-wow-delay="0.4s">
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
                    <div class="card border-0 stat-card wow fadeInUp" data-wow-delay="0.6s">
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

    <!-- [ Testimoni ] start -->
    <section class="pt-0 testimonials-section">
        <div class="container title">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-10 col-xl-6">
                    <h5 class="text-primary mb-0 section-badge">Testimoni</h5>
                    <h2 class="my-3 section-title">Apa Kata Warga?</h2>
                    <p class="mb-0 section-description">Kami bangga memberikan pelayanan terbaik. Simak pengalaman warga dalam menggunakan Sistem Informasi Desa Bangah.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row cust-slider">
                <div class="col-md-6 col-lg-4">
                    <div class="card testimonial-card wow fadeInRight" data-wow-delay="0.2s">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="../assets/images/user/avatar-1.jpg"
                                        alt="Foto warga pria tersenyum" class="img-fluid wid-40 rounded-circle">
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
                    <div class="card testimonial-card wow fadeInRight" data-wow-delay="0.4s">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="../assets/images/user/avatar-2.jpg"
                                        alt="Foto warga wanita tersenyum"
                                        class="img-fluid wid-40 rounded-circle">
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
                    <div class="card testimonial-card wow fadeInRight" data-wow-delay="0.6s">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="../assets/images/user/avatar-3.jpg"
                                        alt="Foto warga berhijab tersenyum"
                                        class="img-fluid wid-40 rounded-circle">
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
@endsection

@push('styles')
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

    /* Enhanced Header Styles */
    .animated-bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.1) 100%);
        z-index: 1;
    }

    .particles-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

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

    .scroll-to-btn {
        transition: var(--transition);
        border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .scroll-to-btn:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.8);
        transform: translateY(-3px);
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

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .cta-title {
            font-size: 2rem;
        }
        
        .process-steps::before {
            display: none;
        }
        
        .hero-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .hero-buttons .btn {
            width: 100%;
            max-width: 300px;
            margin-bottom: 0.5rem;
        }
    }

    /* More aggressive header / hero tweaks for tablets and small devices */
    @media (max-width: 768px) {
        header#home {
            /* override inline min-height on small screens */
            min-height: 60vh !important;
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
            background-position: center top !important;
        }

        /* reduce the top spacing inside header container */
        header#home .container.mt-5.pt-5 {
            margin-top: 0.5rem !important;
            padding-top: 0.5rem !important;
        }

        .hero-title { font-size: 2rem !important; }
        .hero-subtitle { font-size: 1rem !important; }

        .hero-content-wrapper { padding-left: 1rem; padding-right: 1rem; }

        /* hide particles on tablets & phones for performance and clarity */
        .particles-container { display: none !important; }
    }

    /* Mobile-specific fixes to prevent background/image zoom and stacking */
    @media (max-width: 576px) {
        header#home {
            min-height: 60vh !important;
            background-position: center top !important;
            background-attachment: scroll !important;
        }

        .hero-title { font-size: 1.8rem !important; }
        .hero-subtitle { font-size: 1rem !important; }

        /* Make hero buttons full width and spaced */
        .hero-buttons { gap: .5rem; }
        .hero-buttons .btn { max-width: 100%; width: 100%; }

        /* Feature icons smaller and disable hover zoom on mobile */
        .feature-icon { height: 56px; }
        .feature-icon img { max-height: 56px; width: auto; }
        .feature-card:hover .feature-icon img { transform: none; }

        /* Process cards spacing to avoid overlap */
        .process-card { margin-bottom: 1rem; }
        .process-number { top: -12px; width: 28px; height: 28px; font-size: 0.85rem; }

        /* Testimonials: ensure avatar and text wrap */
        .testimonial-card .d-flex { flex-direction: row; gap: 12px; }
        .wid-40 { width: 40px !important; height: 40px !important; }

        /* Prevent CTA background fixed behaviour on mobile (can cause zooming) */
        .cta-block { background-attachment: scroll !important; padding: 60px 0 !important; }
    }

    /* Animation Classes */
    .wow {
        visibility: hidden;
    }

    /* Extra mobile fixes: improve hero layout and performance on small devices */
    @media (max-width: 480px) {
        header#home {
            min-height: 55vh !important;
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
            background-position: center top !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-attachment: scroll !important;
        }

        .hero-content-wrapper {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .hero-title { font-size: 1.6rem !important; line-height: 1.25; }
        .hero-subtitle { font-size: 0.95rem !important; }

        .scroll-indicator { bottom: 18px; font-size: 0.75rem; }
        .scroll-line { height: 28px; }

        /* Make feature images and cards behave on small widths */
        .feature-icon img { max-width: 100%; height: auto; }

        /* Reduce visual noise / CPU on very small screens: hide particles and subtle animations */
        .particles-container { display: none !important; }
        .animated-bg-overlay { background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.45) 50%, rgba(0,0,0,0.12) 100%); }
    }

    /* Extra tiny-screen tweaks to ensure background photo scales and content fits */
    @media (max-width: 420px) {
        header#home {
            min-height: 50vh !important;
            padding-top: 1.25rem !important;
            padding-bottom: 1.25rem !important;
            background-position: center top !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-attachment: scroll !important;
        }

        .hero-content-wrapper {
            max-width: 100% !important;
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }

        .hero-title {
            font-size: 1.3rem !important;
            line-height: 1.2 !important;
            margin-bottom: 0.75rem !important;
        }

        .hero-subtitle {
            font-size: 0.9rem !important;
            margin-bottom: 1rem !important;
        }

        .hero-buttons { gap: .4rem; }
        .hero-buttons .btn { width: 100% !important; max-width: none !important; }

        /* ensure scroll indicator doesn't overlap content */
        .scroll-indicator { bottom: 12px; }
    }
</style>
@endpush

@push('scripts')
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

        // Initialize Particles.js (disabled on small screens for performance)
        if (document.getElementById('particles-js') && window.innerWidth > 768) {
            // particles only on larger screens
            particlesJS('particles-js', {
                particles: {
                    number: {
                        value: 80,
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
                        value: 0.5,
                        random: true,
                        anim: {
                            enable: true,
                            speed: 1,
                            opacity_min: 0.1,
                            sync: false
                        }
                    },
                    size: {
                        value: 3,
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
                        distance: 150,
                        color: "#ffffff",
                        opacity: 0.2,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 1,
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
                            enable: true,
                            mode: "grab"
                        },
                        onclick: {
                            enable: true,
                            mode: "push"
                        },
                        resize: true
                    },
                    modes: {
                        grab: {
                            distance: 140,
                            line_linked: {
                                opacity: 0.5
                            }
                        },
                        push: {
                            particles_nb: 4
                        }
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
                const duration = 2000; // 2 seconds
                const step = target / (duration / 16); // 60fps
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

        // Initialize WOW.js for scroll animations
        if (typeof WOW !== 'undefined') {
            new WOW().init();
        }

        // Scroll to section
        document.querySelectorAll('.scroll-to-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetSection = document.querySelector(targetId);
                
                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Initialize number animation when stats section is in view
        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateNumbers();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(statsSection);
        }
    });
</script>
@endpush