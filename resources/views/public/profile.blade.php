@extends('layouts.landing')

@section('title', 'Profil Desa')

@section('content')
<main class="site-main">
  <section class="profile-hero py-6 position-relative text-white">
  <div class="profile-hero-bg position-absolute top-0 start-0 w-100 h-100" style="background-image: url('{{ asset('assets/images/desa1.jpg') }}'); background-size: cover; background-position: center; opacity:0.08;"></div>
  <div class="container position-relative" style="z-index:2;">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h1 class="display-5 fw-bold mb-2">{{ $profileData['nama_desa'] }}</h1>
        <p class="lead text-white-50 mb-3">{{ $profileData['kecamatan'] }}, Kabupaten {{ $profileData['kabupaten'] }} • {{ $profileData['provinsi'] }}</p>
        <p class="text-black-75 mb-4">{{ $profileData['visi_deskripsi'] }}</p>
        <a href="/berita" class="btn btn-primary me-2">Berita Desa</a>
        <a href="/contact-us" class="btn btn-outline-light">Hubungi Desa</a>
      </div>
      <div class="col-lg-5 d-none d-lg-block">
        <div class="card modern-card p-4 shadow-sm border-0">
          <h5 class="fw-bold">Kontak Kantor Desa</h5>
          <p class="mb-0">{{ $profileData['alamat_kantor'] }}</p>
          <p class="mb-0">Email: aryobebangah281@gmail.com</p>
          <p class="mb-0">Tel: (021) 9876-5432</p>
          <a href="/contact-us" class="btn btn-primary btn-sm mt-3">Kirim Pesan</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4">
        <div class="col-lg-6">
          <div class="card modern-card p-4">
            <h3 class="fw-bold">{{ $profileData['nama_desa'] }}</h3>
            <p class="text-muted">{{ $profileData['kecamatan'] }}, Kabupaten {{ $profileData['kabupaten'] }} — {{ $profileData['provinsi'] }}</p>
            <p class="mt-3">"{{ $profileData['visi'] }}"</p>

            <div class="mt-4 d-flex gap-2">
              <a href="/contact-us" class="btn btn-primary">Hubungi Desa</a>
              <a href="/berita" class="btn btn-outline-secondary">Berita Desa</a>
            </div>
          </div>

          <div class="card modern-card mt-4 p-4">
            <h5 class="fw-bold mb-3">Visi & Misi</h5>
            <p class="text-muted mb-0">{{ $profileData['visi_deskripsi'] }}</p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="row g-3">
            <div class="col-6 col-md-6">
              <div class="stat-card p-3 text-center">
                <div class="icon-circle bg-primary mx-auto mb-2">
                  <i class="ti ti-users text-white"></i>
                </div>
                <h4 class="fw-bold mb-0">{{ number_format($totalPenduduk) }}</h4>
                <small class="text-muted">Penduduk</small>
              </div>
            </div>
            <div class="col-6 col-md-6">
              <div class="stat-card p-3 text-center">
                <div class="icon-circle bg-success mx-auto mb-2">
                  <i class="ti ti-home text-white"></i>
                </div>
                <h4 class="fw-bold mb-0">{{ number_format($totalKeluarga) }}</h4>
                <small class="text-muted">KK</small>
              </div>
            </div>
            <div class="col-6 col-md-6">
              <div class="stat-card p-3 text-center">
                <div class="icon-circle bg-warning mx-auto mb-2">
                  <i class="ti ti-building-community text-white"></i>
                </div>
                <h4 class="fw-bold mb-0">{{ $totalDusun }}</h4>
                <small class="text-muted">Dusun</small>
              </div>
            </div>
            <div class="col-6 col-md-6">
              <div class="stat-card p-3 text-center">
                <div class="icon-circle bg-info mx-auto mb-2">
                  <i class="ti ti-map-pin text-white"></i>
                </div>
                <h4 class="fw-bold mb-0">{{ $profileData['luas_wilayah'] }}</h4>
                <small class="text-muted">Ha</small>
              </div>
            </div>
          </div>

          <div class="card modern-card mt-4 p-4">
            <h5 class="fw-bold mb-3">Kontak & Darurat</h5>
            <ul class="list-unstyled mb-0">
              <li><strong>Poskesdes:</strong> {{ $profileData['poskesdes'] }}</li>
              <li><strong>Pos Kamling:</strong> {{ $profileData['pos_kamling'] }}</li>
              <li><strong>Kebakaran:</strong> {{ $profileData['kebakaran'] }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection


<style>
.profile-hero { position: relative; padding: 3.5rem 0; background: linear-gradient(180deg, rgba(67,97,238,0.05), rgba(255,255,255,0)); }
.profile-hero .profile-hero-bg { position: absolute; inset: 0; opacity: 0.06; filter: blur(1px); }
.profile-hero .lead { color: rgba(255,255,255,0.85); }
.profile-hero .text-white-75 { color: rgba(255,255,255,0.9); opacity:0.95; }

.stat-card { background: #fff; border-radius: 12px; box-shadow: 0 10px 30px rgba(16,24,40,0.06); border: 1px solid rgba(15,23,42,0.04); }
.stat-card .icon-circle { width: 56px; height:56px; display:flex; align-items:center; justify-content:center; border-radius:50%; }

@media (max-width: 576px) {
  .profile-hero { padding: 2rem 0; }
  .profile-hero .display-5 { font-size: 1.5rem; }
}
</style>