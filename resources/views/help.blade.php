@extends('layouts.landing')

@section('title', 'Help / Bantuan Sistem Informasi Desa')

@section('content')
<main class="site-main">

<section class="page-header py-5 bg-light border-bottom">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h1 class="h2 fw-bold mb-1">Help / Bantuan</h1>
        <p class="text-muted mb-0">Panduan dan jawaban atas pertanyaan umum mengenai Sistem Informasi Desa.</p>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4 mb-4">
      <div class="col-md-4">
        <div class="card feature-card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="icon-circle mb-3"><i class="ti ti-info-circle"></i></div>
            <h5 class="fw-bold">Apa itu Sistem Informasi Desa?</h5>
            <p class="text-muted mb-0">Aplikasi web untuk mempermudah administrasi desa, data penduduk, pengajuan surat, dan informasi desa.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card feature-card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="icon-circle mb-3"><i class="ti ti-login"></i></div>
            <h5 class="fw-bold">Cara Login</h5>
            <p class="text-muted mb-0">Masuk menggunakan username/email dan password. Jika lupa, gunakan fitur <strong>Lupa Password</strong>.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card feature-card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="icon-circle mb-3"><i class="ti ti-layout-dashboard"></i></div>
            <h5 class="fw-bold">Dashboard</h5>
            <p class="text-muted mb-0">Ringkasan informasi penting seperti total penduduk, pengajuan surat, dan notifikasi penting.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card feature-card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="icon-circle mb-3"><i class="ti ti-mail"></i></div>
            <h5 class="fw-bold">Pengajuan Surat</h5>
            <p class="text-muted mb-0">Isi formulir pengajuan dengan lengkap dan tunggu notifikasi dari Admin setelah diproses.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card feature-card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="icon-circle mb-3"><i class="ti ti-map-pin"></i></div>
            <h5 class="fw-bold">Informasi Desa</h5>
            <p class="text-muted mb-0">Lihat profil desa, potensi, dan data terkait lainnya di menu Informasi Desa.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card feature-card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="icon-circle mb-3"><i class="ti ti-question-mark"></i></div>
            <h5 class="fw-bold">Panduan & FAQ</h5>
            <p class="text-muted mb-0">Pertanyaan umum tersedia di bagian FAQ di bawah, jika tidak menemukan jawaban hubungi kami.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <h3 id="faq" class="mb-3">FAQ</h3>
        <div class="accordion" id="helpAccordion">

          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading1">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">Apa yang harus dilakukan jika lupa password?</button>
            </h2>
            <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#helpAccordion">
              <div class="accordion-body">Klik "Lupa Password" di halaman login dan ikuti petunjuk reset.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">Bagaimana cara mengubah profil saya?</button>
            </h2>
            <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#helpAccordion">
              <div class="accordion-body">Pergi ke menu <strong>My Profile</strong> di header, lalu edit informasi Anda.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">Siapa yang bisa mengakses dashboard Admin?</button>
            </h2>
            <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#helpAccordion">
              <div class="accordion-body">Hanya user dengan role "Admin" yang bisa mengakses seluruh fitur admin.</div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-md-4">
        <div id="contact" class="card shadow-sm border-0">
          <div class="card-body">
             <h5 class="fw-bold">Kontak Bantuan</h5>
             <p class="mb-1"><strong>Email:</strong> support@desajayamakmur.id</p>
             <p class="mb-2"><strong>Telepon:</strong> 0812-3456-7890</p>
             <a href="mailto:support@desajayamakmur.id" class="btn btn-primary btn-sm">Kirim Pesan</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

</main>
@endsection
