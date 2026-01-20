@extends('layouts.dashboard')
@section('title', 'Dashboard Admin Desa')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<!-- HERO SECTION MODERN -->
<div class="p-4 p-md-5 rounded-4 mb-3 mb-md-4 text-white hero-section shadow-sm position-relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 1000 1000\"><circle fill=\"rgba(255,255,255,0.05)\" cx=\"800\" cy=\"200\" r=\"100\"/><circle fill=\"rgba(255,255,255,0.03)\" cx=\"200\" cy=\"800\" r=\"150\"/></svg>');"></div>
    
    <div class="position-relative z-2">
        <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start text-center text-md-start mb-3">
            <div class="hero-icon-wrapper me-md-3 mb-3 mb-md-0">
                <i class="ti ti-shield-check"></i>
            </div>
            <div class="flex-grow-1">
                <h2 class="fw-bold mb-1 hero-title">Dashboard Admin Desa</h2>
                <p class="m-0 opacity-90 hero-subtitle">Kelola seluruh data dan layanan desa secara cepat, rapi, dan modern.</p>
            </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="row g-2 g-sm-3 mt-3 mt-md-4 justify-content-center justify-content-md-start">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <i class="ti ti-calendar-event me-2"></i>
                    <span class="date-text">{{ now()->translatedFormat('l, d F Y') }}</span>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <i class="ti ti-clock me-2"></i>
                    <span class="time-text">{{ now()->format('H:i') }} WIB</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STATISTICS GRID MODERN -->
<div class="row g-2 g-md-3 mb-3 mb-md-4">
    @php
        $stats = [
            [
                'label' => 'Total Penduduk', 
                'value' => $totalPenduduk, 
                'icon' => 'ti ti-users', 
                'color' => 'primary',
                'trend' => 'Data Kependudukan',
                'trend_color' => 'success'
            ],
            [
                'label' => 'Pengajuan Surat', 
                'value' => $totalSurat, 
                'icon' => 'ti ti-file-text', 
                'color' => 'success',
                'trend' => $suratPending . ' menunggu verifikasi',
                'trend_color' => 'warning'
            ],
            [
                'label' => 'Total Pengaduan', 
                'value' => $totalPengaduan, 
                'icon' => 'ti ti-report', 
                'color' => 'warning',
                'trend' => $pengaduanDiproses . ' sedang diproses',
                'trend_color' => 'info'
            ],
            [
                'label' => 'User Terdaftar', 
                'value' => $totalUser, 
                'icon' => 'ti ti-user-check', 
                'color' => 'info',
                'trend' => 'Pengguna Aktif',
                'trend_color' => 'success'
            ],
        ];
    @endphp

    @foreach ($stats as $item)
    <div class="col-6 col-xl-3 col-md-6">
        <div class="stat-card p-3 p-md-4 rounded-4 position-relative overflow-hidden">
            <div class="stat-bg-icon">
                <i class="{{ $item['icon'] }}"></i>
            </div>
            <div class="position-relative z-2">
                <i class="{{ $item['icon'] }} stat-icon text-{{ $item['color'] }} mb-2"></i>
                <h3 class="fw-bold mt-2 mb-1 stat-number">{{ number_format($item['value']) }}</h3>
                <p class="m-0 text-muted small stat-label">{{ $item['label'] }}</p>
                <div class="stat-trend text-{{ $item['trend_color'] }} mt-1">
                    <i class="ti ti-trending-up me-1"></i>
                    <small>{{ $item['trend'] }}</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- QUICK ACTIONS MODERN -->
<div class="row g-2 g-md-3 mb-3 mb-md-4">
    <div class="col-12">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-3">
            <h5 class="fw-bold mb-2 mb-sm-0 section-title">
                <i class="ti ti-apps me-2"></i>Menu Administrasi
            </h5>
        </div>
    </div>
    
    @php
        $menus = [
            [
                'name' => 'Data Penduduk', 
                'icon' => 'ti ti-users', 
                'url' => '/admin/penduduk',
                'desc' => 'Kelola data warga'
            ],
            [
                'name' => 'Pengajuan Surat', 
                'icon' => 'ti ti-file-text', 
                'url' => '/admin/pengajuan-surat',
                'desc' => 'Verifikasi surat online'
            ],
            [
                'name' => 'Laporan Warga', 
                'icon' => 'ti ti-report', 
                'url' => '/admin/pengaduan',
                'desc' => 'Kelola pengaduan'
            ],
            [
                'name' => 'Manajemen User', 
                'icon' => 'ti ti-user-check', 
                'url' => '/admin/users',
                'desc' => 'Kelola pengguna'
            ],
            [
                'name' => 'Informasi Desa', 
                'icon' => 'ti ti-building', 
                'url' => '/admin/informasi-desa',
                'desc' => 'Data profil desa'
            ],
            [
                'name' => 'Laporan Statistik', 
                'icon' => 'ti ti-chart-bar', 
                'url' => '/admin/statistik',
                'desc' => 'Analisis data'
            ],
        ];
    @endphp

    @foreach ($menus as $menu)
    <div class="col-4 col-sm-3 col-md-2">
        <a href="{{ $menu['url'] }}" class="menu-link">
            <div class="menu-card p-2 p-md-3 text-center position-relative overflow-hidden">
                <div class="menu-bg-hover"></div>
                <div class="position-relative z-2">
                    <div class="menu-icon-wrapper mb-2 mb-md-3">
                        <i class="{{ $menu['icon'] }}"></i>
                    </div>
                    <h6 class="fw-bold mb-1 menu-title">{{ $menu['name'] }}</h6>
                    <small class="text-muted menu-desc">{{ $menu['desc'] }}</small>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

<!-- MAIN CONTENT GRID -->
<div class="row g-3 g-md-4">
    <!-- PENGADUAN TERBARU -->
    <div class="col-12 col-xl-6">
        <div class="modern-card p-3 p-md-4 h-100">
            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between mb-3 mb-md-4">
                <h5 class="fw-bold mb-2 mb-sm-0 section-title">
                    <i class="ti ti-report me-2 text-warning"></i>
                    Pengaduan Terbaru
                </h5>
                <a href="/admin/pengaduan" class="btn btn-sm btn-modern">
                    Lihat Semua
                    <i class="ti ti-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="complaint-list">
                @forelse($pengaduanTerbaru as $p)
                <div class="complaint-item p-2 p-md-3 rounded-3 mb-2 mb-md-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-2">
                        <h6 class="fw-bold mb-1 mb-sm-0 complaint-title">{{ Str::limit($p->judul ?? ($p->isi ?? 'Pengaduan tanpa judul'), 50) }}</h6>
                        @php
                            $badgeClass = 'status-secondary';
                            if ($p->status == 'diproses') $badgeClass = 'status-warning';
                            if ($p->status == 'selesai') $badgeClass = 'status-success';
                        @endphp
                        <span class="status-badge {{ $badgeClass }} mt-1 mt-sm-0">
                            <i class="ti 
                                @if($p->status == 'selesai') ti-check 
                                @elseif($p->status == 'diproses') ti-clock 
                                @else ti-alert-circle @endif me-1">
                            </i>
                            {{ ucfirst($p->status) }}
                        </span>
                    </div>
                    <p class="text-muted small mb-2 complaint-desc">{{ Str::limit($p->isi ?? '-', 80) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted complaint-date">
                            <i class="ti ti-calendar me-1"></i>
                            {{ $p->created_at->diffForHumans() }}
                        </small>
                        <small class="text-primary complaint-status">
                            <i class="ti ti-eye me-1"></i>
                            <a href="{{ route('admin.pengaduan.show', $p->id) }}" class="text-primary">Tinjau</a>
                        </small>
                    </div>
                </div>
                @empty
                <div class="text-center p-4">
                    <p class="mb-0 text-muted">Belum ada pengaduan.</p>
                </div>
                @endforelse

                <!-- View More -->
                <div class="text-center pt-2">
                    <a href="{{ route('admin.pengaduan.index') }}" class="text-primary text-decoration-none view-more-link">
                        <i class="ti ti-list me-1"></i>
                        Lihat semua pengaduan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- PENGAJUAN SURAT TERBARU -->
    <div class="col-12 col-xl-6">
        <div class="modern-card p-3 p-md-4 h-100">
            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between mb-3 mb-md-4">
                <h5 class="fw-bold mb-2 mb-sm-0 section-title">
                    <i class="ti ti-file-text me-2 text-success"></i>
                    Pengajuan Surat Terbaru
                </h5>
                <a href="/admin/pengajuan-surat" class="btn btn-sm btn-modern">
                    Lihat Semua
                    <i class="ti ti-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="complaint-list">
                @forelse($suratTerbaru as $s)
                <div class="complaint-item p-2 p-md-3 rounded-3 mb-2 mb-md-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-2">
                        <h6 class="fw-bold mb-1 mb-sm-0 complaint-title">{{ Str::limit($s->jenis_surat, 50) }}</h6>
                        @php
                            $badgeClass = 'status-secondary';
                            if ($s->status == 'diproses') $badgeClass = 'status-warning';
                            if ($s->status == 'selesai') $badgeClass = 'status-success';
                        @endphp
                        <span class="status-badge {{ $badgeClass }} mt-1 mt-sm-0">
                            <i class="ti 
                                @if($s->status == 'selesai') ti-check 
                                @elseif($s->status == 'diproses') ti-clock 
                                @else ti-alert-circle @endif me-1">
                            </i>
                            {{ ucfirst($s->status) }}
                        </span>
                    </div>
                    <p class="text-muted small mb-2 complaint-desc">{{ $s->user->name ?? '-' }} - {{ $s->nama_lengkap ?? '-' }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted complaint-date">
                            <i class="ti ti-calendar me-1"></i>
                            {{ $s->created_at->diffForHumans() }}
                        </small>
                        <small class="text-primary complaint-status">
                            <i class="ti ti-eye me-1"></i>
                            <a href="{{ route('admin.pengajuan-surat.show', $s->id) }}" class="text-primary">Proses</a>
                        </small>
                    </div>
                </div>
                @empty
                <div class="text-center p-4">
                    <p class="mb-0 text-muted">Belum ada pengajuan surat.</p>
                </div>
                @endforelse

                <!-- View More -->
                <div class="text-center pt-2">
                    <a href="{{ route('admin.pengajuan-surat.index') }}" class="text-primary text-decoration-none view-more-link">
                        <i class="ti ti-list me-1"></i>
                        Lihat semua pengajuan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FLOATING ACTION BUTTON MODERN -->
<div class="quick-btn">
    <a href="/admin/pengaduan" class="floating-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Data Baru">
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

/* HERO TYPOGRAPHY */
.hero-title {
    font-size: 1.3rem;
    line-height: 1.3;
}

.hero-subtitle {
    font-size: 0.9rem;
}

.date-text, .time-text {
    font-size: 0.85rem;
}

@media (min-width: 768px) {
    .hero-title {
        font-size: 1.8rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .date-text, .time-text {
        font-size: 0.9rem;
    }
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

.stat-icon {
    font-size: 1.5rem;
}

.stat-number {
    font-size: 1.3rem;
}

.stat-label {
    font-size: 0.75rem;
}

.stat-trend {
    font-size: 0.75rem;
    font-weight: 500;
} 

@media (min-width: 768px) {
    .stat-bg-icon {
        font-size: 4rem;
        top: -10px;
        right: -10px;
    }
    
    .stat-icon {
        font-size: 2rem;
    }
    
    .stat-number {
        font-size: 1.8rem;
    }
    
    .stat-label {
        font-size: 0.85rem;
    }
    
    .stat-trend {
        font-size: 0.75rem;
    }
}

@media (min-width: 1200px) {
    .stat-bg-icon {
        font-size: 5rem;
    }
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
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    border-color: rgba(0, 82, 212, 0.2);
}

.menu-icon-wrapper {
    width: 40px;
    height: 40px;
    background: rgba(0, 82, 212, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: var(--primary-color);
    font-size: 1.1rem;
}

.menu-title {
    font-size: 0.8rem;
    line-height: 1.2;
}

.menu-desc {
    font-size: 0.7rem;
    line-height: 1.2;
}

.menu-link {
    text-decoration: none;
    color: inherit;
    display: block;
    height: 100%;
}

.menu-link:hover {
    color: inherit;
}

@media (min-width: 768px) {
    .menu-icon-wrapper {
        width: 50px;
        height: 50px;
        font-size: 1.25rem;
    }
    
    .menu-title {
        font-size: 0.9rem;
    }
    
    .menu-desc {
        font-size: 0.75rem;
    }
}

/* MODERN CARDS RESPONSIVE */
.modern-card {
    background: white;
    border: none;
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    transition: var(--transition);
}

.modern-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.card-badge {
    background: rgba(0, 82, 212, 0.1);
    color: var(--primary-color);
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
    white-space: nowrap;
}

.section-title {
    font-size: 1rem;
}

.section-subtitle {
    font-size: 0.8rem;
}

@media (min-width: 768px) {
    .modern-card {
        border-radius: 20px;
    }
    
    .card-badge {
        font-size: 0.8rem;
        padding: 0.4rem 1rem;
    }
    
    .section-title {
        font-size: 1.1rem;
    }
    
    .section-subtitle {
        font-size: 0.85rem;
    }
}

/* COMPLAINT ITEMS RESPONSIVE */
.complaint-item {
    background: var(--light-color);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: var(--transition);
}

.complaint-item:hover {
    background: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.complaint-title {
    font-size: 0.85rem;
    line-height: 1.3;
}

.complaint-desc {
    font-size: 0.75rem;
    line-height: 1.4;
}

.status-badge {
    padding: 0.3rem 0.7rem;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 500;
    white-space: nowrap;
}

.complaint-date, .complaint-status {
    font-size: 0.7rem;
}

.view-more-link {
    font-size: 0.8rem;
}

.status-warning {
    background: rgba(255, 193, 7, 0.15);
    color: #856404;
}

.status-success {
    background: rgba(40, 167, 69, 0.15);
    color: #155724;
}

.status-secondary {
    background: rgba(108, 117, 125, 0.15);
    color: #383d41;
}

@media (min-width: 768px) {
    .complaint-title {
        font-size: 0.9rem;
    }
    
    .complaint-desc {
        font-size: 0.8rem;
    }
    
    .status-badge {
        font-size: 0.75rem;
        padding: 0.4rem 0.8rem;
        border-radius: 15px;
    }
    
    .complaint-date, .complaint-status {
        font-size: 0.75rem;
    }
    
    .view-more-link {
        font-size: 0.85rem;
    }
}

/* BUTTONS RESPONSIVE */
.btn-modern {
    background: var(--primary-color);
    border: none;
    border-radius: 10px;
    color: white !important;
    font-weight: 500;
    padding: 0.5rem 1rem;
    font-size: 0.85rem;
    transition: var(--transition);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-modern:hover {
    background: #0041a8;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 82, 212, 0.3);
    color: white;
}

@media (min-width: 768px) {
    .btn-modern {
        padding: 0.6rem 1.25rem;
        font-size: 0.9rem;
        border-radius: 12px;
    }
    
    .btn-modern:hover {
        transform: translateY(-2px);
    }
}

/* FLOATING BUTTON RESPONSIVE */
.quick-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
}

.floating-btn {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    box-shadow: 0 6px 20px rgba(0, 82, 212, 0.4);
    transition: var(--transition);
    text-decoration: none;
}

.floating-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 25px rgba(0, 82, 212, 0.5);
    color: white;
}

@media (min-width: 768px) {
    .quick-btn {
        bottom: 30px;
        right: 30px;
    }
    
    .floating-btn {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .floating-btn:hover {
        transform: scale(1.1) rotate(90deg);
    }
}

/* MOBILE SPECIFIC OPTIMIZATIONS */
@media (max-width: 767.98px) {
    /* Improve touch targets */
    .menu-link, .btn-modern, .stat-card {
        min-height: 44px;
    }
    
    /* Reduce hover effects on touch devices */
    @media (hover: none) {
        .stat-card:hover,
        .menu-card:hover,
        .modern-card:hover,
        .floating-btn:hover {
            transform: none;
        }
        
        .menu-card:active,
        .btn-modern:active {
            transform: scale(0.98);
        }
        
        .floating-btn:active {
            transform: scale(0.95);
        }
    }
    
    /* Optimize text readability */
    .text-muted {
        opacity: 0.8;
    }
    
    /* Better spacing for mobile */
    .row.g-2 > [class*="col-"] {
        margin-bottom: 8px;
    }
}

/* EXTRA SMALL DEVICES */
@media (max-width: 575.98px) {
    .container {
        padding: 0 10px;
    }
    
    .hero-section {
        padding: 1.25rem !important;
    }
    
    .hero-title {
        font-size: 1.2rem;
    }
    
    .hero-subtitle {
        font-size: 0.85rem;
    }
    
    .stat-card {
        padding: 1rem !important;
    }
    
    .menu-card {
        padding: 1rem 0.5rem !important;
    }
    
    .modern-card {
        padding: 1.25rem !important;
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

.animate-fade-in {
    animation: fadeInUp 0.6s ease-out;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips only for desktop
    if (window.innerWidth > 768) {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    }
    
    // Enhanced mobile touch interactions
    const touchElements = document.querySelectorAll('.menu-card, .btn-modern, .stat-card');
    
    touchElements.forEach(element => {
        element.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.98)';
            this.style.transition = 'transform 0.1s ease';
        });
        
        element.addEventListener('touchend', function() {
            this.style.transform = 'scale(1)';
            this.style.transition = 'transform 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
    });
    
    // Handle floating button touch
    const floatingBtn = document.querySelector('.floating-btn');
    if (floatingBtn) {
        floatingBtn.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.9)';
        });
        
        floatingBtn.addEventListener('touchend', function() {
            this.style.transform = 'scale(1)';
        });
    }
    
    // Improved intersection observer with mobile optimization
    const observerOptions = {
        threshold: window.innerWidth < 768 ? 0.05 : 0.1,
        rootMargin: window.innerWidth < 768 ? '0px 0px -30px 0px' : '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);
    
    // Observe all cards for animation
    document.querySelectorAll('.stat-card, .modern-card, .menu-card').forEach(card => {
        observer.observe(card);
    });
});
</script>

@endsection