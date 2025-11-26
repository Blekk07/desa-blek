@extends('layouts.dashboard')
@section('title', 'Profil Desa')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Profil Desa</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- HERO SECTION -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="hero-profile p-5 rounded-4 text-white position-relative overflow-hidden">
                <div class="hero-overlay"></div>
                <div class="position-relative z-1">
                    <h1 class="fw-bold mb-2">Desa Maju Jaya</h1>
                    <p class="mb-0 fs-5">Kecamatan Gunung Sari, Kabupaten Lamongan</p>
                    <p class="mb-0">"Bersama Membangun Desa yang Lebih Baik"</p>
                </div>
            </div>
        </div>
    </div>

    <!-- QUICK STATS -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card p-4 rounded-4 text-center">
                <div class="icon-circle bg-primary mx-auto mb-3">
                    <i class="ti ti-users text-white fs-3"></i>
                </div>
                <h3 class="fw-bold mb-1">4,236</h3>
                <p class="text-muted mb-0">Jumlah Penduduk</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card p-4 rounded-4 text-center">
                <div class="icon-circle bg-success mx-auto mb-3">
                    <i class="ti ti-home text-white fs-3"></i>
                </div>
                <h3 class="fw-bold mb-1">1,205</h3>
                <p class="text-muted mb-0">Kepala Keluarga</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card p-4 rounded-4 text-center">
                <div class="icon-circle bg-warning mx-auto mb-3">
                    <i class="ti ti-building-community text-white fs-3"></i>
                </div>
                <h3 class="fw-bold mb-1">8</h3>
                <p class="text-muted mb-0">Dusun</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card p-4 rounded-4 text-center">
                <div class="icon-circle bg-info mx-auto mb-3">
                    <i class="ti ti-map-pin text-white fs-3"></i>
                </div>
                <h3 class="fw-bold mb-1">550</h3>
                <p class="text-muted mb-0">Luas (Ha)</p>
            </div>
        </div>
    </div>

    <div class="row g-4">

        <!-- INFORMASI DESA -->
        <div class="col-lg-6">
            <div class="card modern-card">
                <div class="card-header bg-gradient-primary text-white">
                    <h5 class="fw-bold mb-0"><i class="ti ti-info-circle me-2"></i>Informasi Desa</h5>
                </div>
                <div class="card-body">
                    <div class="info-list">
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-light-primary rounded-circle p-2 me-3">
                                <i class="ti ti-building-community text-primary fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Nama Desa</label>
                                <p class="fw-bold mb-0">Desa Maju Jaya</p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-light-success rounded-circle p-2 me-3">
                                <i class="ti ti-map-pin text-success fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Kecamatan</label>
                                <p class="fw-bold mb-0">Gunung Sari</p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-light-warning rounded-circle p-2 me-3">
                                <i class="ti ti-map text-warning fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Kabupaten</label>
                                <p class="fw-bold mb-0">Lamongan</p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-light-info rounded-circle p-2 me-3">
                                <i class="ti ti-world text-info fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Provinsi</label>
                                <p class="fw-bold mb-0">Jawa Timur</p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon bg-light-danger rounded-circle p-2 me-3">
                                <i class="ti ti-mail text-danger fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Kode Pos</label>
                                <p class="fw-bold mb-0">62251</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PEMERINTAHAN DESA -->
        <div class="col-lg-6">
            <div class="card modern-card">
                <div class="card-header bg-gradient-success text-white">
                    <h5 class="fw-bold mb-0"><i class="ti ti-user-check me-2"></i>Pemerintahan Desa</h5>
                </div>
                <div class="card-body">
                    <div class="info-list">
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-light-primary rounded-circle p-2 me-3">
                                <i class="ti ti-crown text-primary fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Kepala Desa</label>
                                <p class="fw-bold mb-0">Budi Santoso</p>
                                <small class="text-muted">Masa Jabatan: 2024 - 2030</small>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-light-success rounded-circle p-2 me-3">
                                <i class="ti ti-notebook text-success fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Sekretaris Desa</label>
                                <p class="fw-bold mb-0">Agus Pratama</p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-light-warning rounded-circle p-2 me-3">
                                <i class="ti ti-cash text-warning fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Bendahara Desa</label>
                                <p class="fw-bold mb-0">Siti Aminah</p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon bg-light-info rounded-circle p-2 me-3">
                                <i class="ti ti-building text-info fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Alamat Kantor</label>
                                <p class="fw-bold mb-0">Jl. Desa Maju No. 123</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- VISI & MISI -->
        <div class="col-lg-6">
            <div class="card modern-card h-100">
                <div class="card-header bg-gradient-warning text-white">
                    <h5 class="fw-bold mb-0"><i class="ti ti-target-arrow me-2"></i>Visi Desa</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <i class="ti ti-bulb text-warning fs-2 me-3 mt-1"></i>
                        <div>
                            <p class="fw-semibold mb-2">"Terwujudnya Desa Maju Jaya yang Mandiri, Sejahtera, dan Berbudaya"</p>
                            <p class="text-muted mb-0">Menjadi desa yang unggul dalam pembangunan berkelanjutan dengan melibatkan partisipasi aktif seluruh masyarakat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KONTAK DARURAT -->
        <div class="col-lg-6">
            <div class="card modern-card h-100">
                <div class="card-header bg-gradient-danger text-white">
                    <h5 class="fw-bold mb-0"><i class="ti ti-phone me-2"></i>Kontak Darurat</h5>
                </div>
                <div class="card-body">
                    <div class="info-list">
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-light-danger rounded-circle p-2 me-3">
                                <i class="ti ti-phone-call text-danger fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Poskesdes</label>
                                <p class="fw-bold mb-0">(0321) 456789</p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-light-primary rounded-circle p-2 me-3">
                                <i class="ti ti-shield-check text-primary fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Pos Kamling</label>
                                <p class="fw-bold mb-0">(0321) 456790</p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon bg-light-success rounded-circle p-2 me-3">
                                <i class="ti ti-fire-extinguisher text-success fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label class="text-muted small mb-1">Kebakaran</label>
                                <p class="fw-bold mb-0">113</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
/* HERO PROFILE */
.hero-profile {
    background: linear-gradient(135deg, #0052d4);
    position: relative;
}
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.1"><polygon points="1000,100 1000,0 0,100"/></svg>');
    background-size: cover;
}

/* STAT CARD */
.stat-card {
    background: white;
    border-radius: 18px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: .25s;
    border: 1px solid #f0f0f0;
}
.stat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

/* MODERN CARD */
.modern-card {
    border: none;
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: 0.25s;
}
.modern-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
}

/* CARD HEADER GRADIENTS */
.bg-gradient-primary {
    background: linear-gradient(135deg, #1e3c72, #2a69ac) !important;
}
.bg-gradient-success {
    background: linear-gradient(135deg, #28A745, #6fe68a) !important;
}
.bg-gradient-warning {
    background: linear-gradient(135deg, #FFC107, #ffdb70) !important;
}
.bg-gradient-danger {
    background: linear-gradient(135deg, #DC3545, #f0838e) !important;
}

/* ICON CIRCLE */
.icon-circle {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* INFO ICONS */
.info-icon {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* LIGHT BACKGROUNDS */
.bg-light-primary { background-color: #e3f2fd; }
.bg-light-success { background-color: #e8f5e8; }
.bg-light-warning { background-color: #fff3cd; }
.bg-light-info { background-color: #d1ecf1; }
.bg-light-danger { background-color: #f8d7da; }
</style>

@endsection