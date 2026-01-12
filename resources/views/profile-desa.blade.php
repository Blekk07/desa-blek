@extends('layouts.app')

@section('title', 'Profil Desa')

@section('content')

<section class="page-header py-5 bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="h2 fw-bold mb-1">Profil Desa</h1>
                <p class="text-muted mb-0">Ringkasan data, pemerintahan, dan kontak penting desa.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-white rounded shadow-sm p-4">
                    <!-- HERO -->
                    <div class="mb-4">
                        <div class="p-4 rounded-3 bg-light">
                            <h2 class="fw-bold mb-1">{{ $profileData['nama_desa'] }}</h2>
                            <p class="mb-1 text-muted">Kecamatan {{ $profileData['kecamatan'] }}, Kabupaten {{ $profileData['kabupaten'] }}</p>
                            <p class="mb-0 fst-italic">"{{ $profileData['visi'] }}"</p>
                        </div>
                    </div>

                    <!-- STATS -->
                    <div class="row g-3 mb-4">
                        <div class="col-4">
                            <div class="p-3 text-center border rounded">
                                <h4 class="mb-0">{{ number_format($totalPenduduk) }}</h4>
                                <small class="text-muted">Penduduk</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-3 text-center border rounded">
                                <h4 class="mb-0">{{ number_format($totalKeluarga) }}</h4>
                                <small class="text-muted">KK</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-3 text-center border rounded">
                                <h4 class="mb-0">{{ $totalDusun }}</h4>
                                <small class="text-muted">Dusun</small>
                            </div>
                        </div>
                    </div>

                    <!-- INFO -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <h5 class="mb-2">Pemerintahan</h5>
                            <p class="mb-1"><strong>Kepala Desa:</strong> {{ $profileData['kepala_desa'] }}</p>
                            <p class="mb-1"><strong>Sekretaris:</strong> {{ $profileData['sekretaris_desa'] }}</p>
                            <p class="mb-0"><strong>Bendahara:</strong> {{ $profileData['bendahara_desa'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-2">Informasi Kantor</h5>
                            <p class="mb-1"><strong>Alamat:</strong> {{ $profileData['alamat_kantor'] }}</p>
                            <p class="mb-1"><strong>Kode Pos:</strong> {{ $profileData['kode_pos'] }}</p>
                            <p class="mb-0"><strong>Luas Wilayah:</strong> {{ $profileData['luas_wilayah'] }} Ha</p>
                        </div>
                    </div>
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
                            <div class="text-muted small">{{ $profileData['alamat_kantor'] }}</div>
                        </div>

                        <div class="col-2 text-center">
                            <i class="ti ti-mail fs-4 text-primary"></i>
                        </div>
                        <div class="col-10">
                            <div class="fw-semibold small mb-0">Email</div>
                            <div class="text-muted small">desa@desa-maju.go.id</div>
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
                            <iframe src="https://www.google.com/maps?q={{ urlencode($profileData['alamat_kantor']) }}&output=embed" style="border:0;width:100%;height:100%;" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <small class="text-muted d-block mt-2">Lokasi perkiraan. <a href="https://www.google.com/maps/search/{{ urlencode($profileData['alamat_kantor']) }}" target="_blank" rel="noopener">Buka di peta</a></small>
                    </div>
                </div>

                <!-- Optional quick links -->
                <div class="bg-white rounded shadow-sm p-4">
                    <h5 class="mb-3">Layanan Cepat</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="/pengaduan" class="text-decoration-none">Pengaduan Masyarakat</a></li>
                        <li><a href="/contact-us" class="text-decoration-none">Hubungi Kami</a></li>
                        <li><a href="/berita" class="text-decoration-none">Berita Desa</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection