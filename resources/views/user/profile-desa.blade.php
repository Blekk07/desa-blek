@extends('layouts.dashboard')
@section('title', 'Profil Desa')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bold mb-1">Profil Desa</h4>
                            <p class="text-muted mb-0">Informasi lengkap tentang desa dan pemerintahannya</p>
                        </div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profil Desa</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DESA HEADER -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="fw-bold text-primary mb-2">{{ $profileData['nama_desa'] }}</h2>
                            <p class="text-muted mb-2">{{ $profileData['kecamatan'] }}, {{ $profileData['kabupaten'] }}, {{ $profileData['provinsi'] }}</p>
                            <p class="mb-0 text-secondary fst-italic">"{{ $profileData['visi'] }}"</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="d-flex justify-content-end gap-3">
                                <div class="text-center">
                                    <div class="fw-bold fs-4 text-primary">{{ number_format($totalPenduduk) }}</div>
                                    <small class="text-muted">Penduduk</small>
                                </div>
                                <div class="text-center">
                                    <div class="fw-bold fs-4 text-success">{{ number_format($totalKeluarga) }}</div>
                                    <small class="text-muted">Keluarga</small>
                                </div>
                                <div class="text-center">
                                    <div class="fw-bold fs-4 text-info">{{ $totalDusun }}</div>
                                    <small class="text-muted">Dusun</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">

        <!-- INFORMASI DASAR -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="fw-bold mb-0 text-primary">
                        <i class="ti ti-info-circle me-2"></i>Informasi Dasar
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="border-start border-primary border-3 ps-3">
                                <label class="text-muted small mb-1">Nama Desa</label>
                                <p class="fw-semibold mb-0">{{ $profileData['nama_desa'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="border-start border-success border-3 ps-3">
                                <label class="text-muted small mb-1">Kecamatan</label>
                                <p class="fw-semibold mb-0">{{ $profileData['kecamatan'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="border-start border-warning border-3 ps-3">
                                <label class="text-muted small mb-1">Kabupaten</label>
                                <p class="fw-semibold mb-0">{{ $profileData['kabupaten'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="border-start border-info border-3 ps-3">
                                <label class="text-muted small mb-1">Provinsi</label>
                                <p class="fw-semibold mb-0">{{ $profileData['provinsi'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="border-start border-danger border-3 ps-3">
                                <label class="text-muted small mb-1">Kode Pos</label>
                                <p class="fw-semibold mb-0">{{ $profileData['kode_pos'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="border-start border-secondary border-3 ps-3">
                                <label class="text-muted small mb-1">Luas Wilayah</label>
                                <p class="fw-semibold mb-0">{{ $profileData['luas_wilayah'] }} Ha</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PEMERINTAHAN DESA -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="fw-bold mb-0 text-primary">
                        <i class="ti ti-building-community me-2"></i>Pemerintahan Desa
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex align-items-start mb-3">
                            <i class="ti ti-crown text-primary fs-4 me-3 mt-1"></i>
                            <div>
                                <label class="text-muted small mb-1">Kepala Desa</label>
                                <p class="fw-semibold mb-1">{{ $profileData['kepala_desa'] }}</p>
                                <small class="text-muted">Masa Jabatan: {{ $profileData['masa_jabatan_kepala'] }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="border-start border-success border-3 ps-3">
                                <label class="text-muted small mb-1">Sekretaris Desa</label>
                                <p class="fw-semibold mb-0">{{ $profileData['sekretaris_desa'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="border-start border-warning border-3 ps-3">
                                <label class="text-muted small mb-1">Bendahara Desa</label>
                                <p class="fw-semibold mb-0">{{ $profileData['bendahara_desa'] }}</p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="border-start border-info border-3 ps-3">
                        <label class="text-muted small mb-1">Alamat Kantor</label>
                        <p class="fw-semibold mb-0">{{ $profileData['alamat_kantor'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- VISI & MISI -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="fw-bold mb-0 text-primary">
                        <i class="ti ti-target me-2"></i>Visi & Misi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <i class="ti ti-bulb text-warning fs-3 me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-bold text-primary mb-2">Visi Desa</h6>
                            <p class="fst-italic mb-3">"{{ $profileData['visi'] }}"</p>
                            <p class="text-muted mb-0">{{ $profileData['visi_deskripsi'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KONTAK DARURAT -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="fw-bold mb-0 text-primary">
                        <i class="ti ti-phone me-2"></i>Kontak Darurat
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="text-center p-3 border rounded">
                                <i class="ti ti-phone-call text-danger fs-2 mb-2"></i>
                                <div>
                                    <label class="text-muted small mb-1">Poskesdes</label>
                                    <p class="fw-semibold mb-0">{{ $profileData['poskesdes'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-center p-3 border rounded">
                                <i class="ti ti-shield-check text-primary fs-2 mb-2"></i>
                                <div>
                                    <label class="text-muted small mb-1">Pos Kamling</label>
                                    <p class="fw-semibold mb-0">{{ $profileData['pos_kamling'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-center p-3 border rounded">
                                <i class="ti ti-fire-extinguisher text-success fs-2 mb-2"></i>
                                <div>
                                    <label class="text-muted small mb-1">Kebakaran</label>
                                    <p class="fw-semibold mb-0">{{ $profileData['kebakaran'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
/* Minimalist Card Styles */
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1) !important;
}

.card-header {
    padding: 1.25rem 1.5rem;
    background-color: #f8f9fa !important;
}

.card-body {
    padding: 1.5rem;
}

/* Border accents */
.border-primary { border-color: #0d6efd !important; }
.border-success { border-color: #198754 !important; }
.border-warning { border-color: #ffc107 !important; }
.border-info { border-color: #0dcaf0 !important; }
.border-danger { border-color: #dc3545 !important; }
.border-secondary { border-color: #6c757d !important; }

/* Icon styles */
.ti {
    opacity: 0.8;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-body {
        padding: 1rem;
    }

    .card-header {
        padding: 1rem 1.25rem;
    }

    .fs-4 {
        font-size: 1.25rem !important;
    }
}
</style>

@endsection