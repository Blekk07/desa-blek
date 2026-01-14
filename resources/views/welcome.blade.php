@extends('layouts.landing')

@section('title', 'Selamat Datang di Sistem Informasi Desa Bangah')

@section('content')
<main class="site-main">
    <style>
      :root { --primary: #0052d4; --accent: #6a11cb; --muted: #6c757d; --card-radius: 12px; }

      /* Header / Hero */
      header#home { padding: 80px 0; min-height: 420px; position: relative; overflow: hidden; }
      .hero-content-wrapper { padding-top: 20px; padding-bottom: 10px; }
      .hero-title { font-size: 2.2rem; line-height:1.12; text-shadow: 0 10px 30px rgba(0,0,0,0.22); }
      .hero-subtitle { max-width: 720px; margin: 0 auto; color: rgba(255,255,255,0.9); }
      header .container { position:relative; z-index:2; }
      .header-bg-container, .cta-bg-container { position:absolute; inset:0; z-index:0; opacity:0.9; }
      .animated-bg-overlay, .particles-container { position:absolute; inset:0; z-index:1; }

      /* Features */
      .feature-card { border-radius:var(--card-radius); transition: transform .18s ease, box-shadow .18s ease; overflow:hidden; }
      .feature-card:hover { transform: translateY(-6px); box-shadow: 0 12px 32px rgba(10,10,10,0.06); }
      .feature-icon { width:72px; height:72px; border-radius:14px; display:flex; align-items:center; justify-content:center; background:#f8fbff; color:var(--primary); margin:0 auto 12px auto; }
      .feature-card .card-body { text-align:center; padding:24px; }
      .features-section .section-title { margin-top:10px; margin-bottom:18px; }

      /* CTA */
      .cta-block { background: linear-gradient(135deg, rgba(58,123,213,0.92) 0%, rgba(123,58,213,0.85) 100%); padding: 56px 0; border-radius: 10px; margin-top: 30px; color: #fff; position:relative; overflow:hidden; }
      .cta-block .container { position:relative; z-index:2; }
      .cta-button { background: #fff; color: var(--primary); border:none; }

      /* Testimonials */
      .testimonial-card { border-radius:12px; box-shadow: 0 6px 18px rgba(15,15,15,0.06); }
      .testimonial-card .card-body { min-height: 160px; }

      /* Misc */
      .scroll-indicator { position:absolute; left:50%; transform:translateX(-50%); bottom:16px; color:#fff; z-index:3; }

      @media (max-width:768px) { .hero-title { font-size:1.6rem; } .features-section .row > .col-md-4 { margin-bottom:18px; } .hero-content-wrapper { padding-top:10px; } }
    </style>
    <!-- [ Header ] start -->
    <header id="home" class="d-flex align-items-center" style="background: linear-gradient(135deg, #0052d4); background-size: cover; background-repeat: no-repeat;">
        <!-- Responsive Background Container (gradient fallback) -->
        <div class="header-bg-container">
            <div class="header-bg-fallback" style="background: linear-gradient(135deg, rgba(58,123,213,0.92) 0%, rgba(123,58,213,0.85) 100%); background-size: cover; background-repeat: no-repeat;"></div>
        </div>

        <div class="animated-bg-overlay"></div>
        <div class="particles-container" id="particles-js"></div>

        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                    <div class="hero-content-wrapper">
                        <h1 class="mt-sm-3 text-white mb-4 f-w-600 hero-title">
                            Selamat Datang di Desa Bangah
                            <br>
                            <span class="text-warning typed-text" data-typed-items='Sistem Informasi Desa Bangah, Desa Bangah Digital, Pelayanan Desa Modern'></span>
                        </h1>
                        <h5 class="mb-4 text-white opacity-75 hero-subtitle">
                            Wujudkan Tata Kelola Pemerintahan Desa yang Transparan, Efisien, dan Inovatif.
                            <br class="d-none d-md-block">
                            Akses informasi dan layanan desa dengan mudah melalui sistem kami.
                        </h5>
                        <div class="my-5 hero-buttons">
                            <a href="/login" class="btn btn-outline-light btn-lg animated-btn">
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
                </div>
            </div>
        </div>
    </section>
    <!-- [ Alur Layanan ] End -->



        </div>
    </section>
    <!-- [ Statistik ] End -->
    <!-- [ CTA ] start -->
    <section class="cta-block">
        <!-- Responsive Background Container (gradient fallback) -->
        <div class="cta-bg-container">
            <div class="cta-bg-fallback" style="background: linear-gradient(135deg, rgba(58,123,213,0.92) 0%, rgba(123,58,213,0.85) 100%); background-size: cover; background-repeat: no-repeat;"></div>
        </div>

        <div class="animated-cta-overlay"></div>
        <div class="particles-container" id="particles-cta"></div>

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
                                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
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
                                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star-half-alt text-warning"></i>
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
                                        <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
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


