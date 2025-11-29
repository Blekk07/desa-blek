@extends('layouts.dashboard')
@section('title', 'Dashboard Warga Desa')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<!-- HERO SECTION MODERN -->
<div class="p-5 rounded-4 mb-4 text-white hero-section shadow-sm position-relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 1000 1000\"><circle fill=\"rgba(255,255,255,0.05)\" cx=\"800\" cy=\"200\" r=\"100\"/><circle fill=\"rgba(255,255,255,0.03)\" cx=\"200\" cy=\"800\" r=\"150\"/></svg>');"></div>
    
    <div class="position-relative z-2">
        <div class="d-flex align-items-center mb-3">
            <div class="hero-icon-wrapper me-3">
                <i class="ti ti-home-star"></i>
            </div>
            <div>
                <h2 class="fw-bold mb-1">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
                <p class="m-0 opacity-90">Akses informasi dan layanan desa secara cepat dan mudah melalui platform digital.</p>
            </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="row g-3 mt-4">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <i class="ti ti-calendar-event me-2"></i>
                    <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <i class="ti ti-clock me-2"></i>
                    <span>{{ now()->format('H:i') }} WIB</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STATISTICS GRID MODERN -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card p-4 rounded-4 position-relative overflow-hidden">
            <div class="stat-bg-icon">
                <i class="ti ti-users"></i>
            </div>
            <div class="position-relative z-2">
                <i class="ti ti-users fs-2 text-primary mb-2"></i>
                <h3 class="fw-bold mt-2 mb-1">{{ number_format($totalPenduduk) }}</h3>
                <p class="m-0 text-muted small">Total Penduduk Desa</p>
                <div class="stat-trend text-success mt-1">
                    <i class="ti ti-trending-up me-1"></i>
                    <small>Data Terkini</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card p-4 rounded-4 position-relative overflow-hidden">
            <div class="stat-bg-icon">
                <i class="ti ti-file-description"></i>
            </div>
            <div class="position-relative z-2">
                <i class="ti ti-file-description fs-2 text-success mb-2"></i>
                <h3 class="fw-bold mt-2 mb-1">{{ $totalSurat }}</h3>
                <p class="m-0 text-muted small">Pengajuan Surat Anda</p>
                <div class="stat-trend text-warning mt-1">
                    <i class="ti ti-clock me-1"></i>
                    <small>{{ $suratPending }} menunggu verifikasi</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card p-4 rounded-4 position-relative overflow-hidden">
            <div class="stat-bg-icon">
                <i class="ti ti-report"></i>
            </div>
            <div class="position-relative z-2">
                <i class="ti ti-report fs-2 text-warning mb-2"></i>
                <h3 class="fw-bold mt-2 mb-1">{{ $totalPengaduan }}</h3>
                <p class="m-0 text-muted small">Total Pengaduan Desa</p>
                <div class="stat-trend text-info mt-1">
                    <i class="ti ti-progress me-1"></i>
                    <small>{{ $pengaduanSelesai }} Selesai</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card p-4 rounded-4 position-relative overflow-hidden">
            <div class="stat-bg-icon">
                <i class="ti ti-check"></i>
            </div>
            <div class="position-relative z-2">
                <i class="ti ti-check fs-2 text-info mb-2"></i>
                <h3 class="fw-bold mt-2 mb-1">{{ $suratSelesai }}</h3>
                <p class="m-0 text-muted small">Surat Selesai Anda</p>
                <div class="stat-trend text-success mt-1">
                    <i class="ti ti-check-circle me-1"></i>
                    <small>Siap Diunduh</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- QUICK ACTIONS MODERN -->
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0"><i class="ti ti-rocket me-2"></i>Akses Cepat Layanan</h5>
            <small class="text-muted">Fitur utama untuk kebutuhan Anda</small>
        </div>
    </div>
    
    <div class="col-xl-2 col-md-4 col-6">
        <a href="{{ route('myprofile') }}" class="menu-link">
            <div class="menu-card p-4 text-center position-relative overflow-hidden">
                <div class="menu-bg-hover"></div>
                <div class="position-relative z-2">
                    <div class="menu-icon-wrapper mb-3">
                        <i class="ti ti-user-circle"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Profil Saya</h6>
                    <small class="text-muted">Kelola data pribadi</small>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-2 col-md-4 col-6">
        <a href="{{ route('user.profile-desa') }}" class="menu-link">
            <div class="menu-card p-4 text-center position-relative overflow-hidden">
                <div class="menu-bg-hover"></div>
                <div class="position-relative z-2">
                    <div class="menu-icon-wrapper mb-3">
                        <i class="ti ti-building"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Informasi Desa</h6>
                    <small class="text-muted">Data & profil desa</small>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-2 col-md-4 col-6">
        <a href="{{ route('user.pengajuan-surat.index') }}" class="menu-link">
            <div class="menu-card p-4 text-center position-relative overflow-hidden">
                <div class="menu-bg-hover"></div>
                <div class="position-relative z-2">
                    <div class="menu-icon-wrapper mb-3">
                        <i class="ti ti-file-text"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Pengajuan Surat</h6>
                    <small class="text-muted">Ajukan surat online</small>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-2 col-md-4 col-6">
        <a href="{{ route('pengaduan.index') }}" class="menu-link">
            <div class="menu-card p-4 text-center position-relative overflow-hidden">
                <div class="menu-bg-hover"></div>
                <div class="position-relative z-2">
                    <div class="menu-icon-wrapper mb-3">
                        <i class="ti ti-report"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Laporan Warga</h6>
                    <small class="text-muted">Laporkan masalah</small>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-2 col-md-4 col-6">
        <a href="{{ route('help') }}" class="menu-link">
            <div class="menu-card p-4 text-center position-relative overflow-hidden">
                <div class="menu-bg-hover"></div>
                <div class="position-relative z-2">
                    <div class="menu-icon-wrapper mb-3">
                        <i class="ti ti-help"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Pusat Bantuan</h6>
                    <small class="text-muted">Bantuan & panduan</small>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-2 col-md-4 col-6">
        <a href="{{ route('pengaduan.create') }}" class="menu-link">
            <div class="menu-card p-4 text-center position-relative overflow-hidden">
                <div class="menu-bg-hover"></div>
                <div class="position-relative z-2">
                    <div class="menu-icon-wrapper mb-3">
                        <i class="ti ti-plus"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Buat Laporan</h6>
                    <small class="text-muted">Laporkan sekarang</small>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- MAIN CONTENT GRID -->
<div class="row g-4">
    <!-- STATUS PENGAJUAN SURAT -->
    <div class="col-xl-6">
        <div class="modern-card p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="fw-bold mb-0">
                    <i class="ti ti-file-check me-2 text-success"></i>
                    Status Pengajuan Surat
                </h5>
                <a href="{{ route('user.pengajuan-surat.index') }}" class="btn btn-sm btn-modern">
                    Lihat Semua
                    <i class="ti ti-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-3">
                <div class="col-6">
                    <div class="status-box p-3 rounded-3 text-center border">
                        <i class="ti ti-clock text-warning fs-2"></i>
                        <h6 class="fw-bold mt-2 mb-0">{{ $suratPending }}</h6>
                        <small class="text-muted d-block">Menunggu</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="status-box p-3 rounded-3 text-center border">
                        <i class="ti ti-spinner text-info fs-2"></i>
                        <h6 class="fw-bold mt-2 mb-0">{{ $suratDiproses }}</h6>
                        <small class="text-muted d-block">Diproses</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="status-box p-3 rounded-3 text-center border">
                        <i class="ti ti-check text-success fs-2"></i>
                        <h6 class="fw-bold mt-2 mb-0">{{ $suratSelesai }}</h6>
                        <small class="text-muted d-block">Selesai</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="status-box p-3 rounded-3 text-center border">
                        <i class="ti ti-file-text text-primary fs-2"></i>
                        <h6 class="fw-bold mt-2 mb-0">{{ $totalSurat }}</h6>
                        <small class="text-muted d-block">Total</small>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('user.pengajuan-surat.create') }}" class="btn btn-primary w-100 btn-sm">
                    <i class="ti ti-plus me-1"></i> Ajukan Surat Baru
                </a>
            </div>
        </div>
    </div>

    <!-- INFORMASI DESA MODERN -->
    <div class="col-xl-6">
        <div class="modern-card p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="fw-bold mb-0">
                    <i class="ti ti-map-pin-heart me-2 text-primary"></i>
                    Informasi Desa
                </h5>
                <div class="card-badge">
                    <i class="ti ti-info-circle me-1"></i>
                    Data Terkini
                </div>
            </div>

            @php
                $villageInfo = [
                    'Nama Desa' => 'Desa Maju Jaya',
                    'Kecamatan' => 'Gunung Sari',
                    'Kabupaten' => 'Lamongan',
                    'Provinsi' => 'Jawa Timur',
                    'Kode Pos' => '62271',
                    'Luas Wilayah' => '125.5 Ha'
                ];
            @endphp

            <div class="info-list">
                @foreach ($villageInfo as $key => $value)
                <div class="info-item d-flex justify-content-between align-items-center py-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="info-icon-wrapper me-3">
                            <i class="ti ti-point"></i>
                        </div>
                        <span class="text-muted">{{ $key }}</span>
                    </div>
                    <span class="fw-bold text-dark">{{ $value }}</span>
                </div>
                @endforeach
            </div>

            <div class="mt-4 pt-2">
                <a href="{{ route('user.profile-desa') }}" class="btn btn-modern w-100">
                    <i class="ti ti-external-link me-2"></i>
                    Lihat Detail Profil Desa
                </a>
            </div>
        </div>
    </div>

    <!-- RIWAYAT PENGADUAN MODERN -->
    <div class="col-xl-6">
        <div class="modern-card p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="fw-bold mb-0">
                    <i class="ti ti-history me-2 text-warning"></i>
                    Riwayat Pengaduan Terbaru
                </h5>
                <a href="{{ route('pengaduan.index') }}" class="btn btn-sm btn-modern">
                    Lihat Semua
                    <i class="ti ti-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="complaint-list">
                @forelse($riwayat as $item)
                <div class="complaint-item p-3 rounded-3 mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="fw-bold mb-0">{{ Str::limit($item->judul ?? ($item->isi ?? 'Pengaduan tanpa judul'), 70) }}</h6>
                        @php
                            $badgeClass = 'status-warning';
                            if ($item->status == 'selesai') $badgeClass = 'status-success';
                            if ($item->status == 'ditolak') $badgeClass = 'status-danger';
                        @endphp
                        <span class="status-badge {{ $badgeClass }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                    <p class="text-muted small mb-2">{{ Str::limit($item->isi ?? '-', 120) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="ti ti-calendar me-1"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </small>
                        <small class="text-primary">
                            <i class="ti ti-eye me-1"></i>
                            {{ $item->views ?? '—' }}
                        </small>
                    </div>
                </div>
                @empty
                <div class="text-center p-4">
                    <p class="mb-0 text-muted">Belum ada pengaduan terbaru.</p>
                    <a href="{{ route('pengaduan.create') }}" class="btn btn-sm btn-primary mt-2">Buat Pengaduan</a>
                </div>
                @endforelse

                <div class="text-center pt-2">
                    <a href="{{ route('pengaduan.index') }}" class="text-primary text-decoration-none">
                        <i class="ti ti-list me-1"></i>
                        Lihat semua riwayat pengaduan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FLOATING ACTION BUTTON MODERN -->
<div class="quick-btn">
    <a href="{{ route('pengaduan.create') }}" class="floating-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Buat Laporan Baru">
        <i class="ti ti-plus"></i>
    </a>
</div>

<style>
:root {
    --primary-color: #0052d4;
    --secondary-color: #00a8ff;
    --success-color: #28a745;
    --warning-color: #ffc107;
    --info-color: #17a2b8;
    --dark-color: #1e293b;
    --light-color: #f8fafc;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* HERO SECTION */
.hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    border: none;
    position: relative;
}

.hero-icon-wrapper {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

/* STAT CARDS */
.stat-card {
    background: white;
    border: 1px solid rgba(0, 0, 0, 0.05);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: var(--transition);
    overflow: hidden;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.stat-bg-icon {
    position: absolute;
    top: -10px;
    right: -10px;
    font-size: 5rem;
    opacity: 0.03;
    color: var(--primary-color);
}

.stat-trend {
    font-size: 0.75rem;
    font-weight: 500;
}

/* MENU CARDS */
.menu-card {
    background: white;
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.menu-bg-hover {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0, 82, 212, 0.05), transparent);
    transition: var(--transition);
}

.menu-card:hover .menu-bg-hover {
    left: 100%;
}

.menu-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    border-color: rgba(0, 82, 212, 0.2);
}

.menu-icon-wrapper {
    width: 50px;
    height: 50px;
    background: rgba(0, 82, 212, 0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: var(--primary-color);
    font-size: 1.25rem;
}

.menu-link {
    text-decoration: none;
    color: inherit;
}

.menu-link:hover {
    color: inherit;
}

/* MODERN CARDS */
.modern-card {
    background: white;
    border: none;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: var(--transition);
}

.modern-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.card-badge {
    background: rgba(0, 82, 212, 0.1);
    color: var(--primary-color);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
}

/* INFO LIST */
.info-list {
    margin: 0 -1rem;
}

.info-item {
    transition: var(--transition);
}

.info-item:hover {
    background: rgba(0, 82, 212, 0.02);
}

.info-icon-wrapper {
    width: 24px;
    height: 24px;
    background: rgba(0, 82, 212, 0.1);
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    color: var(--primary-color);
}

/* COMPLAINT ITEMS */
.complaint-item {
    background: var(--light-color);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: var(--transition);
}

.complaint-item:hover {
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

/* STATUS BOX */
.status-box {
    background: white;
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: var(--transition);
}

.status-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 500;
}

.status-warning {
    background: rgba(255, 193, 7, 0.15);
    color: #856404;
}

.status-success {
    background: rgba(40, 167, 69, 0.15);
    color: #155724;
}

/* BUTTONS */
.btn-modern {
    background: var(--primary-color);
    border: none;
    border-radius: 12px;
    color: white !important;
    font-weight: 500;
    padding: 0.5rem 1.25rem;
    transition: var(--transition);
}

.btn-modern:hover {
    background: #0041a8;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 82, 212, 0.3);
}

/* FLOATING BUTTON */
.quick-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 1000;
}

.floating-btn {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    box-shadow: 0 8px 25px rgba(0, 82, 212, 0.4);
    transition: var(--transition);
    text-decoration: none;
}

.floating-btn:hover {
    transform: scale(1.1) rotate(90deg);
    box-shadow: 0 12px 35px rgba(0, 82, 212, 0.5);
    color: white;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .hero-section {
        padding: 2rem 1.5rem !important;
    }
    
    .stat-card, .menu-card {
        padding: 1.5rem !important;
    }
    
    .floating-btn {
        width: 50px;
        height: 50px;
        font-size: 1.25rem;
    }
    
    .quick-btn {
        bottom: 20px;
        right: 20px;
    }
}

/* ANIMATIONS */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate__animated {
    animation-duration: 0.6s;
}
</style>

<script>
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
    
    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease-out';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.stat-card, .modern-card').forEach(card => {
        observer.observe(card);
    });
});
</script>

@endsection