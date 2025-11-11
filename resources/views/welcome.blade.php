@extends('layouts.landing')

@section('title', 'Selamat Datang di Sistem Informasi Desa')

@section('content')
    <!-- [ Header ] start -->
    <header id="home" class="d-flex align-items-center"
        style="position: relative; min-height: 100dvh; background: url('{{ asset('assets/images/my/hero-section.png') }}') no-repeat center center; background-size: cover;">
        <!-- Overlay -->
        <div
            style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-image: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0.1));">
        </div>

        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                    <h1 class="mt-sm-3 text-white mb-4 f-w-600 wow fadeInUp" data-wow-delay="0.2s" style="font-size: 3.5rem;">
                        Selamat Datang di
                        <br>
                        <span class="text-primary">Sistem Informasi Desa Bangah</span>
                    </h1>
                    <h5 class="mb-4 text-white opacity-75 wow fadeInUp" data-wow-delay="0.4s" style="font-size: 1.25rem;">
                        Wujudkan Tata Kelola Pemerintahan Desa yang Transparan, Efisien, dan Inovatif.
                        <br class="d-none d-md-block">
                        Akses informasi dan layanan desa dengan mudah melalui sistem kami.
                    </h5>
                    <div class="my-5 wow fadeInUp" data-wow-delay="0.6s">
                        <a href="{{ route('register') }}"
                            class="btn btn-primary btn-lg d-inline-flex align-items-center me-2" target="_blank">Daftar Akun
                            <i class="ti ti-arrow-right ms-2"></i></a>
                        <a href="#alur" class="btn btn-outline-light btn-lg me-2">Lihat Alur Layanan</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- [ Header ] End -->

    <!-- [ Keunggulan Kami ] start -->
    <section>
        <div class="container title">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-10 col-xl-6">
                    <h5 class="text-primary mb-0">Pelayanan Terbaik</h5>
                    <h2 class="my-3">Mengapa Memilih Sistem Informasi Desa Kami?</h2>
                    <p class="mb-0">Kami berkomitmen untuk memberikan kemudahan akses informasi dan pelayanan publik bagi masyarakat desa.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card wow fadeInUp" data-wow-delay="0.4s">
                        <div class="card-body">
                            <img src="../assets/images/landing/img-feature1.svg"
                                alt="Pelayanan publik dengan fasilitas modern" class="img-fluid">
                            <h5 class="my-3">Fasilitas Digital</h5>
                            <p class="mb-0 text-muted">Layanan administrasi, pengaduan, dan informasi desa dapat diakses secara online dengan mudah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card wow fadeInUp" data-wow-delay="0.6s">
                        <div class="card-body">
                            <img src="../assets/images/landing/img-feature2.svg"
                                alt="Petugas desa membantu warga" class="img-fluid">
                            <h5 class="my-3">Transparansi Informasi</h5>
                            <p class="mb-0 text-muted">Data dan kegiatan desa ditampilkan secara terbuka untuk membangun kepercayaan masyarakat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card wow fadeInUp" data-wow-delay="0.8s">
                        <div class="card-body">
                            <img src="../assets/images/landing/img-feature3.svg"
                                alt="Aparat desa profesional melayani masyarakat" class="img-fluid">
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
    <section class="pt-0" id="alur">
        <div class="container title">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-10 col-xl-6">
                    <h5 class="text-primary mb-0">Proses Cepat & Mudah</h5>
                    <h2 class="my-3">Alur Layanan Desa</h2>
                    <p class="mb-0">Ikuti langkah-langkah berikut untuk mengakses berbagai layanan desa secara online.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-6 col-lg-3">
                    <div class="card wow fadeInUp" data-wow-delay="0.4s">
                        <div class="card-body text-center">
                            <i class="ti ti-user-plus f-36 text-primary"></i>
                            <h5 class="my-3">1. Buat Akun</h5>
                            <p class="mb-0 text-muted">Daftarkan diri Anda untuk mendapatkan akses ke layanan dan informasi desa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card wow fadeInUp" data-wow-delay="0.6s">
                        <div class="card-body text-center">
                            <i class="ti ti-file-text f-36 text-primary"></i>
                            <h5 class="my-3">2. Lengkapi Data</h5>
                            <p class="mb-0 text-muted">Isi data pribadi dan kebutuhan layanan Anda secara lengkap dan akurat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card wow fadeInUp" data-wow-delay="0.8s">
                        <div class="card-body text-center">
                            <i class="ti ti-search f-36 text-primary"></i>
                            <h5 class="my-3">3. Verifikasi</h5>
                            <p class="mb-0 text-muted">Permohonan Anda akan diverifikasi oleh petugas desa sesuai prosedur yang berlaku.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card wow fadeInUp" data-wow-delay="1.0s">
                        <div class="card-body text-center">
                            <i class="ti ti-bell f-36 text-primary"></i>
                            <h5 class="my-3">4. Hasil & Notifikasi</h5>
                            <p class="mb-0 text-muted">Hasil layanan akan diumumkan dan dapat diakses melalui akun Anda.</p>
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
        <!-- Overlay -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.6);">
        </div>

        <div class="container" style="position: relative; z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="text-white mb-4" style="font-size: 2.8rem; font-weight: 600;">Bergabung dengan <span
                            class="text-primary">Desa Bangah Digital</span></h2>
                    <p class="text-white opacity-75 mb-4 lead">Dukung transformasi digital desa menuju pelayanan yang lebih cepat dan transparan. Daftar sekarang untuk menggunakan layanan kami.</p>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Daftar Akun <i
                            class="ti ti-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- [ CTA ] End -->

    <!-- [ Statistik ] start -->
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <h2 class="m-0 text-primary">1200+</h2>
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
                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <h2 class="m-0 text-primary">350+</h2>
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
                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <h2 class="m-0 text-primary">5</h2>
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
    <section class="pt-0">
        <div class="container title">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-10 col-xl-6">
                    <h5 class="text-primary mb-0">Testimoni</h5>
                    <h2 class="my-3">Apa Kata Warga?</h2>
                    <p class="mb-0">Kami bangga memberikan pelayanan terbaik. Simak pengalaman warga dalam menggunakan Sistem Informasi Desa Bangah.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row cust-slider">
                <div class="col-md-6 col-lg-4">
                    <div class="card wow fadeInRight" data-wow-delay="0.2s">
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
                    <div class="card wow fadeInRight" data-wow-delay="0.4s">
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
                    <div class="card wow fadeInRight" data-wow-delay="0.6s">
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
