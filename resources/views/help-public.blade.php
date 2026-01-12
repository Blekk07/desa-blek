@extends('layouts.landing')

@section('title', 'Pusat Bantuan')

@section('content')

<header id="home">
    <div class="header-bg-container"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="hero-title fw-bold mb-1">Pusat Bantuan</h1>
                <p class="hero-subtitle mb-0">Panduan singkat dan jawaban atas pertanyaan umum tentang sistem.</p>
            </div>
        </div>
    </div>
</header> 

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-white rounded shadow-sm p-4">
                    <h5 class="mb-3">1. Apa itu Sistem Informasi Desa?</h5>
                    <p class="mb-3">Sistem Informasi Desa adalah aplikasi berbasis web untuk mempermudah administrasi desa, mulai dari data penduduk, pengajuan surat, hingga informasi perkembangan desa.</p>

                    <h5 class="mb-3">2. Cara Login</h5>
                    <ol class="mb-3">
                        <li>Buka halaman login.</li>
                        <li>Masukkan username / email dan password.</li>
                        <li>Klik tombol "Login".</li>
                    </ol>

                    <h5 class="mb-3">3. Pengajuan Surat</h5>
                    <p class="mb-3">Pilih menu "Pengajuan Surat" lalu isi formulir dengan data yang benar.</p>

                    <h5 class="mb-3">4. FAQ</h5>
                    <ul class="mb-3">
                        <li><strong>Apa yang harus dilakukan jika lupa password?</strong> Klik "Lupa Password" di halaman login dan ikuti instruksi reset.</li>
                        <li><strong>Bagaimana cara menghubungi admin?</strong> Gunakan halaman <a href="/contact-us">Hubungi Kami</a> atau email support yang tertera di sebelah kanan.</li>
                    </ul>

                    <h5 class="mb-3">5. Kontak Bantuan</h5>
                    <p class="mb-0">Jika ada pertanyaan lebih lanjut, silakan gunakan kontak di sebelah kanan.</p>
                </div>
            </div>

            <aside class="col-lg-4">
                <div class="bg-white rounded shadow-sm p-4 mb-4">
                    <h5 class="mb-3">Kontak & Lokasi</h5>

                    <div class="row gx-2 gy-2 align-items-center">
                        <div class="col-2 text-center">
                            <i class="ti ti-map-pin fs-4 text-primary"></i>
                        </div>
                        <div class="col-10">
                            <div class="fw-semibold small mb-0">Alamat</div>
                            <div class="text-muted small">Jl. Desa Maju No. 123, Kecamatan Harapan</div>
                        </div>

                        <div class="col-2 text-center">
                            <i class="ti ti-mail fs-4 text-primary"></i>
                        </div>
                        <div class="col-10">
                            <div class="fw-semibold small mb-0">Email</div>
                            <div class="text-muted small"><a href="mailto:desa@desa-maju.go.id">desa@desa-maju.go.id</a></div>
                        </div>

                        <div class="col-2 text-center">
                            <i class="ti ti-phone fs-4 text-primary"></i>
                        </div>
                        <div class="col-10">
                            <div class="fw-semibold small mb-0">Telepon</div>
                            <div class="text-muted small">(021) 9876-5432</div>
                        </div>

                        <div class="col-2 text-center">
                            <i class="ti ti-clock fs-4 text-primary"></i>
                        </div>
                        <div class="col-10">
                            <div class="fw-semibold small mb-0">Jam Operasional</div>
                            <div class="text-muted small">Senin - Jumat: 08:00 - 16:00</div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="ratio ratio-16x9 rounded overflow-hidden">
                            <iframe src="https://www.google.com/maps?q=Jl.+Desa+Maju+No.+123,+Kecamatan+Harapan&output=embed" style="border:0;width:100%;height:100%;" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <small class="text-muted d-block mt-2">Lokasi perkiraan. <a href="https://www.google.com/maps/search/Jl.+Desa+Maju+No.+123,+Kecamatan+Harapan" target="_blank" rel="noopener">Buka di peta</a></small>
                    </div>
                </div>

                <div class="bg-white rounded shadow-sm p-4">
                    <h5 class="mb-3">Layanan Cepat</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="/contact-us" class="text-decoration-none">Hubungi Kami</a></li>
                        <li><a href="/pengaduan" class="text-decoration-none">Pengaduan Masyarakat</a></li>
                        <li><a href="/berita" class="text-decoration-none">Berita Desa</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection