@extends('layouts.dashboard')
@section('title', 'Dashboard Admin')

@section('content')

<!-- HERO ADMIN -->
<div class="p-5 rounded-4 mb-4 text-white hero-section shadow-sm">
    <h2 class="fw-bold mb-1">Dashboard Admin Desa</h2>
    <p class="m-0">Kelola seluruh data dan layanan desa secara cepat, rapi, dan modern.</p>
</div>

<!-- STATISTIK ADMIN -->
<div class="row g-4 mb-3">
    @php
        $stats = [
            ['label' => 'Total Penduduk', 'value' => '4,236', 'icon' => 'bi-people-fill', 'color' => 'primary'],
            ['label' => 'Pengajuan Surat', 'value' => '122', 'icon' => 'bi-file-earmark-text', 'color' => 'success'],
            ['label' => 'Laporan Masuk', 'value' => '58', 'icon' => 'bi-megaphone-fill', 'color' => 'warning'],
            ['label' => 'User Terdaftar', 'value' => '812', 'icon' => 'bi-person-badge-fill', 'color' => 'info'],
        ];
    @endphp

    @foreach ($stats as $item)
    <div class="col-md-6 col-xl-3">
        <div class="card stat-card py-4 px-3 text-center">
            <div class="icon-circle bg-{{ $item['color'] }}">
                <i class="{{ $item['icon'] }} text-white fs-3"></i>
            </div>
            <h6 class="text-muted mt-3">{{ $item['label'] }}</h6>
            <h2 class="fw-bold">{{ $item['value'] }}</h2>
        </div>
    </div>
    @endforeach
</div>

<!-- MENU NAVIGASI CEPAT ADMIN -->
<div class="row g-4 mt-3">
    @php
        $menus = [
            ['name' => 'Data Penduduk', 'icon' => 'bi-people', 'url' => '/admin/penduduk'],
            ['name' => 'Pengajuan Surat', 'icon' => 'bi-file-text', 'url' => '/admin/pengajuan-surat'],
            ['name' => 'Laporan Warga', 'icon' => 'bi-megaphone', 'url' => '/admin/pengaduan'],
            ['name' => 'Manajemen User', 'icon' => 'bi-person-lines-fill', 'url' => '/admin/users'],
        ];
    @endphp

    @foreach ($menus as $menu)
    <div class="col-md-3">
        <a href="{{ $menu['url'] }}" class="menu-link">
            <div class="menu-card p-4 text-center">
                <div class="icon-large">
                    <i class="{{ $menu['icon'] }} fs-1 text-primary"></i>
                </div>
                <h6 class="fw-bold mt-2">{{ $menu['name'] }}</h6>
            </div>
        </a>
    </div>
    @endforeach
</div>

<!-- ROW: PENGADUAN & SURAT RECENT -->
<div class="row mt-4 g-4">

    <!-- PENGADUAN TERBARU -->
    <div class="col-md-6">
        <div class="card modern-card p-4">
            <h5 class="fw-bold mb-3"><i class="bi bi-megaphone-fill me-2"></i>Pengaduan Terbaru</h5>

            <ul class="list-group">
                @php
                    $pengaduan = [
                        ['judul' => 'Lampu Jalan Mati', 'status' => 'Diproses', 'time' => '2 jam lalu'],
                        ['judul' => 'Sampah Menumpuk', 'status' => 'Menunggu', 'time' => '1 hari lalu'],
                        ['judul' => 'Air Tidak Mengalir', 'status' => 'Selesai', 'time' => '3 hari lalu'],
                    ];
                @endphp

                @foreach ($pengaduan as $p)
                <li class="list-group-item border-0 p-3 shadow-sm rounded mb-2">
                    <div class="d-flex justify-content-between">
                        <b>{{ $p['judul'] }}</b>
                        <span class="badge 
                            @if($p['status'] == 'Selesai') bg-success 
                            @elseif($p['status'] == 'Diproses') bg-warning text-dark
                            @else bg-secondary @endif">
                            {{ $p['status'] }}
                        </span>
                    </div>
                    <small class="text-muted">{{ $p['time'] }}</small>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- PENGAJUAN SURAT TERBARU -->
    <div class="col-md-6">
        <div class="card modern-card p-4">
            <h5 class="fw-bold mb-3"><i class="bi bi-file-earmark-text me-2"></i>Pengajuan Surat Terbaru</h5>

            <ul class="list-group">
                @php
                    $surat = [
                        ['nama' => 'Surat Domisili', 'status' => 'Diproses', 'time' => '1 jam lalu'],
                        ['nama' => 'Surat Keterangan Usaha', 'status' => 'Menunggu', 'time' => '3 jam lalu'],
                        ['nama' => 'Surat SKCK', 'status' => 'Selesai', 'time' => '1 hari lalu'],
                    ];
                @endphp

                @foreach ($surat as $s)
                <li class="list-group-item border-0 p-3 shadow-sm rounded mb-2">
                    <div class="d-flex justify-content-between">
                        <b>{{ $s['nama'] }}</b>
                        <span class="badge 
                        @if($s['status'] == 'Selesai') bg-success 
                        @elseif($s['status'] == 'Diproses') bg-warning text-dark
                        @else bg-secondary @endif">
                        {{ $s['status'] }}</span>
                    </div>
                    <small class="text-muted">{{ $s['time'] }}</small>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

<style>
/* HERO */
.hero-section {
    background: linear-gradient(135deg, #1e3c72, #2a69ac);
}

/* STAT CARD */
.stat-card {
    border-radius: 18px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    background: white;
    transition: .25s;
}
.stat-card:hover {
    transform: translateY(-8px);
}
.icon-circle {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
}

/* MENU CARD */
.menu-card {
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: .25s;
}
.menu-card:hover {
    background: #f5faff;
    transform: translateY(-6px);
}
.menu-link {
    text-decoration: none;
    color: inherit;
}

/* MAIN CARDS */
.modern-card {
    border: none;
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}
</style>

@endsection
