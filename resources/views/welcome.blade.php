@extends('layouts.landing')

@section('title', 'Selamat Datang di Sistem Informasi Desa')

@section('content')
    <!-- [ Header ] start -->
    <header id="home" class="d-flex align-items-center position-relative overflow-hidden"
        style="min-height: 100dvh; background: url('{{ asset('assets/images/my/hero-section.png') }}') no-repeat center center; background-size: cover;">
        
        <!-- Overlay transparan -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.4);"></div>

        <div class="container mt-5 pt-5 position-relative z-2">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                    <!-- Badge -->
                    <div class="badge bg-white text-primary px-4 py-2 rounded-pill mb-4 wow fadeInDown" data-wow-delay="0.1s">
                        <i class="ti ti-star me-2"></i>Sistem Informasi Desa Terdepan
                    </div>

                    <h1 class="mt-sm-3 text-white mb-4 fw-bold wow fadeInUp" data-wow-delay="0.2s" style="font-size: 3.5rem; line-height: 1.2;">
                        Selamat Datang di
                        <br>
                        <span class="text-warning">Sistem Informasi Desa Bangah</span>
                    </h1>
                    
                    <h5 class="mb-4 text-white opacity-90 wow fadeInUp" data-wow-delay="0.4s" style="font-size: 1.25rem; line-height: 1.6;">
                        Wujudkan Tata Kelola Pemerintahan Desa yang <span class="text-warning fw-bold">Transparan, Efisien, dan Inovatif</span>.
                        <br class="d-none d-md-block">
                        Akses informasi dan layanan desa dengan mudah melalui sistem kami.
                    </h5>

                    <!-- Stats Counter -->
                    <div class="row justify-content-center mb-5 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="col-auto">
                            <div class="text-center">
                                <h3 class="text-warning mb-1 counter" data-count="1200">0</h3>
                                <small class="text-white opacity-75">Warga Terdaftar</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="text-center">
                                <h3 class="text-warning mb-1 counter" data-count="350">0</h3>
                                <small class="text-white opacity-75">Layanan Digital</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="text-center">
                                <h3 class="text-warning mb-1 counter" data-count="99">0</h3>
                                <small class="text-white opacity-75">% Kepuasan</small>
                            </div>
                        </div>
                    </div>

                    <div class="my-5 wow fadeInUp" data-wow-delay="0.6s">
                        <a href="{{ route('register') }}"
                            class="btn btn-primary btn-lg d-inline-flex align-items-center me-3 px-4 py-3 fw-bold shadow"
                            style="background: #0052d4; border: none; transition: all 0.3s ease;">
                            <span class="text-white">Daftar Akun Sekarang</span>
                            <i class="ti ti-arrow-right ms-2 fs-5 text-white"></i>
                        </a>
                        <a href="#alur" 
                           class="btn btn-outline-light btn-lg px-4 py-3 fw-bold"
                           style="border: 2px solid rgba(255,255,255,0.5); transition: all 0.3s ease;">
                            Lihat Alur Layanan
                        </a>
                    </div>

                    <!-- Scroll Indicator -->
                    <div class="scroll-indicator wow fadeInUp" data-wow-delay="0.8s">
                        <a href="#keunggulan" class="text-white opacity-75 text-decoration-none">
                            <div class="d-flex flex-column align-items-center">
                                <span class="mb-2">Scroll untuk Jelajahi</span>
                                <i class="ti ti-chevron-down fs-5 animate-bounce"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- [ Header ] End -->

    <!-- [ Keunggulan Kami ] start -->
    <section id="keunggulan" class="py-5">
        <div class="container title">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-10 col-xl-6">
                    <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 border border-primary">Pelayanan Terbaik</div>
                    <h2 class="my-3 fw-bold">Mengapa Memilih Sistem Informasi Desa Kami?</h2>
                    <p class="mb-0 text-muted lead">Kami berkomitmen untuk memberikan kemudahan akses informasi dan pelayanan publik bagi masyarakat desa dengan teknologi terkini.</p>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.3s" 
                         style="transition: all 0.3s ease; border-radius: 15px; overflow: hidden;">
                        <div class="card-body text-center p-4">
                            <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; background: #0052d4; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                <i class="ti ti-device-laptop fs-2 text-white"></i>
                            </div>
                            <h5 class="my-3 fw-bold">Fasilitas Digital Modern</h5>
                            <p class="mb-0 text-muted">Layanan administrasi, pengaduan, dan informasi desa dapat diakses secara online dengan mudah melalui platform digital yang user-friendly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.5s"
                         style="transition: all 0.3s ease; border-radius: 15px; overflow: hidden;">
                        <div class="card-body text-center p-4">
                            <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; background: #0052d4; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                <i class="ti ti-chart-bar fs-2 text-white"></i>
                            </div>
                            <h5 class="my-3 fw-bold">Transparansi Informasi</h5>
                            <p class="mb-0 text-muted">Data dan kegiatan desa ditampilkan secara terbuka dan real-time untuk membangun kepercayaan masyarakat terhadap pemerintahan desa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.7s"
                         style="transition: all 0.3s ease; border-radius: 15px; overflow: hidden;">
                        <div class="card-body text-center p-4">
                            <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; background: #0052d4; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                <i class="ti ti-users fs-2 text-white"></i>
                            </div>
                            <h5 class="my-3 fw-bold">Aparatur Profesional</h5>
                            <p class="mb-0 text-muted">Didukung oleh perangkat desa yang berpengalaman, terlatih, dan siap melayani masyarakat dengan sepenuh hati menggunakan teknologi modern.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Keunggulan Kami ] End -->

    <!-- [ Alur Layanan ] start -->
    <section class="py-5 bg-light" id="alur">
        <div class="container title">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-10 col-xl-6">
                    <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 border border-primary">Proses Cepat & Mudah</div>
                    <h2 class="my-3 fw-bold">Alur Layanan Desa Digital</h2>
                    <p class="mb-0 text-muted lead">Ikuti langkah-langkah sederhana berikut untuk mengakses berbagai layanan desa secara online dengan cepat dan efisien.</p>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.3s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="step-number">01</div>
                            <div class="icon-wrapper mb-3 mx-auto" style="width: 60px; height: 60px; background: #0052d4; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                <i class="ti ti-user-plus fs-3 text-white"></i>
                            </div>
                            <h5 class="my-3 fw-bold">Buat Akun Digital</h5>
                            <p class="mb-0 text-muted">Daftarkan diri Anda secara online untuk mendapatkan akses ke seluruh layanan dan informasi desa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.5s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="step-number">02</div>
                            <div class="icon-wrapper mb-3 mx-auto" style="width: 60px; height: 60px; background: #0052d4; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                <i class="ti ti-file-text fs-3 text-white"></i>
                            </div>
                            <h5 class="my-3 fw-bold">Lengkapi Data Diri</h5>
                            <p class="mb-0 text-muted">Isi data pribadi dan kebutuhan layanan Anda secara lengkap dan akurat melalui form digital.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.7s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="step-number">03</div>
                            <div class="icon-wrapper mb-3 mx-auto" style="width: 60px; height: 60px; background: #0052d4; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                <i class="ti ti-search fs-3 text-white"></i>
                            </div>
                            <h5 class="my-3 fw-bold">Verifikasi Cepat</h5>
                            <p class="mb-0 text-muted">Permohonan Anda akan diverifikasi secara digital oleh petugas desa sesuai prosedur yang berlaku.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.9s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="step-number">04</div>
                            <div class="icon-wrapper mb-3 mx-auto" style="width: 60px; height: 60px; background: #0052d4; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                <i class="ti ti-bell fs-3 text-white"></i>
                            </div>
                            <h5 class="my-3 fw-bold">Notifikasi Real-time</h5>
                            <p class="mb-0 text-muted">Dapatkan pemberitahuan real-time dan akses hasil layanan secara instan melalui akun digital Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Alur Layanan ] End -->

    <!-- [ CTA ] start -->
    <section class="cta-block position-relative overflow-hidden"
        style="padding: 120px 0; background: url('{{ asset('assets/images/my/join-us.png') }}') no-repeat center center; background-size: cover;">
        
        <!-- Overlay transparan -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5);"></div>

        <div class="container position-relative z-2">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 text-center">
                    <h2 class="text-white mb-4 fw-bold" style="font-size: 3rem;">Bergabung dengan <span class="text-warning">Desa Bangah Digital</span></h2>
                    <p class="text-white opacity-90 mb-5 lead fs-5">Dukung transformasi digital desa menuju pelayanan yang lebih cepat, transparan, dan inovatif. Daftar sekarang untuk menggunakan seluruh layanan kami.</p>
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                        <a href="{{ route('register') }}" 
                           class="btn btn-primary btn-lg px-5 py-3 fw-bold shadow"
                           style="background: #0052d4; border: none; transition: all 0.3s ease;">
                            <span class="text-white">Daftar Sekarang</span>
                            <i class="ti ti-arrow-right ms-2 fs-5 text-white"></i>
                        </a>
                        <a href="#testimoni" 
                           class="btn btn-outline-light btn-lg px-5 py-3 fw-bold"
                           style="border: 2px solid rgba(255,255,255,0.5); transition: all 0.3s ease;">
                            Lihat Testimoni
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ CTA ] End -->

    <!-- [ Statistik ] start -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.2s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stat-icon" style="width: 60px; height: 60px; background: #0052d4; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ti ti-users fs-3 text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h2 class="m-0 text-primary fw-bold"><span class="counter" data-count="1200">0</span>+</h2>
                                    <h5 class="mb-2 fw-bold">Penduduk Terdaftar</h5>
                                    <p class="mb-0 text-muted">Data kependudukan yang terus diperbarui secara digital setiap tahun dengan sistem terintegrasi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.4s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stat-icon" style="width: 60px; height: 60px; background: #0052d4; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ti ti-apps fs-3 text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h2 class="m-0 text-primary fw-bold"><span class="counter" data-count="350">0</span>+</h2>
                                    <h5 class="mb-2 fw-bold">Layanan Digital</h5>
                                    <p class="mb-0 text-muted">Berbagai layanan administrasi dan publik tersedia secara online dengan proses yang mudah dan cepat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.6s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stat-icon" style="width: 60px; height: 60px; background: #0052d4; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ti ti-category fs-3 text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h2 class="m-0 text-primary fw-bold"><span class="counter" data-count="5">0</span></h2>
                                    <h5 class="mb-2 fw-bold">Bidang Pelayanan</h5>
                                    <p class="mb-0 text-muted">Administrasi, kependudukan, potensi desa, pengaduan, dan pembangunan terintegrasi dalam satu platform.</p>
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
    <section class="py-5 bg-light" id="testimoni">
        <div class="container title">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-10 col-xl-6">
                    <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 border border-primary">Testimoni Warga</div>
                    <h2 class="my-3 fw-bold">Apa Kata Warga Desa Bangah?</h2>
                    <p class="mb-0 text-muted lead">Kami bangga memberikan pelayanan terbaik. Simak pengalaman langsung dari warga dalam menggunakan Sistem Informasi Desa Bangah.</p>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.3s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <img src="../assets/images/user/avatar-1.jpg"
                                        alt="Foto warga pria tersenyum" 
                                        class="img-fluid rounded-circle" 
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1 fw-bold">Pelayanan Cepat dan Ramah</h5>
                                    <div class="star-rating mb-3">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                    <p class="mb-2 text-muted">"Proses pengurusan surat jauh lebih mudah dan cepat melalui sistem ini. Sangat membantu warga dalam mengurus administrasi!"</p>
                                    <h6 class="mb-0 text-primary fw-bold">Budi Santoso</h6>
                                    <small class="text-muted">Warga Desa Bangah</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.5s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <img src="../assets/images/user/avatar-2.jpg"
                                        alt="Foto warga wanita tersenyum"
                                        class="img-fluid rounded-circle" 
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1 fw-bold">Transparansi Data Desa</h5>
                                    <div class="star-rating mb-3">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    </div>
                                    <p class="mb-2 text-muted">"Sekarang semua informasi desa bisa diakses dengan mudah dan terbuka. Sangat bagus untuk meningkatkan transparansi pemerintahan desa."</p>
                                    <h6 class="mb-0 text-primary fw-bold">Rina Wulandari</h6>
                                    <small class="text-muted">Warga Desa Bangah</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm wow fadeInUp h-100" data-wow-delay="0.7s"
                         style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <img src="../assets/images/user/avatar-3.jpg"
                                        alt="Foto warga berhijab tersenyum"
                                        class="img-fluid rounded-circle" 
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1 fw-bold">Inovasi Digital Desa</h5>
                                    <div class="star-rating mb-3">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                    <p class="mb-2 text-muted">"Sistem ini benar-benar membantu warga mengurus layanan tanpa harus datang ke kantor desa. Inovasi yang sangat bermanfaat!"</p>
                                    <h6 class="mb-0 text-primary fw-bold">Siti Aminah</h6>
                                    <small class="text-muted">Warga Desa Bangah</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Testimoni ] End -->

    <style>
        /* Custom Styles */
        .step-number {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 30px;
            height: 30px;
            background: #0052d4;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .counter {
            font-variant-numeric: tabular-nums;
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .card:hover {
            transform: translateY(-5px) !important;
        }

        .star-rating {
            font-size: 0.9rem;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .display-4 {
                font-size: 2.5rem !important;
            }
            
            .btn-lg {
                padding: 0.75rem 1.5rem !important;
                font-size: 1rem !important;
            }
        }
    </style>

    <script>
        // Counter Animation
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');
            const speed = 200;

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;
                    const increment = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };

                // Start counter when element is in viewport
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            updateCount();
                            observer.unobserve(entry.target);
                        }
                    });
                });

                observer.observe(counter);
            });
        });
    </script>
@endsection