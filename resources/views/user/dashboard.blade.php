@extends('layouts.dashboard')
@section('title', 'Dashboard Warga Desa')

@section('content')

<!-- HERO SECTION UPGRADED -->
<div class="p-5 rounded-4 mb-4 text-white hero-section shadow-sm animate__animated animate__fadeIn">
    <h2 class="fw-bold mb-1"><i class="ti ti-home-star me-2"></i>Selamat Datang 👋</h2>
    <p class="m-0">Akses informasi dan layanan desa secara cepat dan mudah.</p>
</div>

<!-- MINI STATISTIC CARD -->
<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="stat-card p-4 rounded-4">
            <i class="ti ti-users fs-2 text-success"></i>
            <h4 class="fw-bold mt-2">4236</h4>
            <p class="m-0 text-muted small">Jumlah Penduduk</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card p-4 rounded-4">
            <i class="ti ti-file-description fs-2 text-primary"></i>
            <h4 class="fw-bold mt-2">12</h4>
            <p class="m-0 text-muted small">Pengajuan Surat</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card p-4 rounded-4">
            <i class="ti ti-report fs-2 text-warning"></i>
            <h4 class="fw-bold mt-2">5</h4>
            <p class="m-0 text-muted small">Pengaduan Diproses</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card p-4 rounded-4">
            <i class="ti ti-check fs-2 text-info"></i>
            <h4 class="fw-bold mt-2">87%</h4>
            <p class="m-0 text-muted small">Tingkat Penyelesaian</p>
        </div>
    </div>

</div>

<!-- MENU LAYANAN -->
<div class="row text-center mt-4">

    <div class="col">
        <a href="{{ route('myprofile') }}" class="menu-link">
            <div class="p-3 menu-card">
                <i class="ti ti-user-circle fs-3 mb-2"></i>
                <div>Profil Saya</div>
            </div>
        </a>
    </div>

    <div class="col">
        <a href="{{ route('user.profile-desa') }}" class="menu-link">
            <div class="p-3 menu-card">
                <i class="ti ti-building fs-3 mb-2"></i>
                <div>Informasi Desa</div>
            </div>
        </a>
    </div>

    <div class="col">
        <a href="{{ route('user.pengajuan-surat.index') }}" class="menu-link">
            <div class="p-3 menu-card">
                <i class="ti ti-file-text fs-3 mb-2"></i>
                <div>Pengajuan Surat</div>
            </div>
        </a>
    </div>

    <div class="col">
        <a href="{{ route('pengaduan.index') }}" class="menu-link">
            <div class="p-3 menu-card">
                <i class="ti ti-megaphone fs-3 mb-2"></i>
                <div>Laporan Warga</div>
            </div>
        </a>
    </div>

</div>

<!-- CONTENT SECTION -->
<div class="row g-4 mt-4">

    <!-- INFORMASI DESA -->
    <div class="col-md-6">
        <div class="card modern-card p-4 animate__animated animate__fadeInLeft">
            <h5 class="fw-bold mb-3"><i class="ti ti-map-pin-heart me-2"></i>Informasi Desa</h5>

            @php
                $villageInfo = [
                    'Nama Desa' => 'Desa Maju Jaya',
                    'Kecamatan' => 'Gunung Sari',
                    'Kabupaten' => 'Lamongan',
                    'Provinsi' => 'Jawa Timur'
                ];
            @endphp

            <table class="table table-borderless">
                @foreach ($villageInfo as $k => $v)
                <tr class="border-bottom">
                    <td class="text-muted">{{ $k }}</td>
                    <td class="text-end fw-bold">{{ $v }}</td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>

    <!-- RIWAYAT PENGADUAN -->
    <div class="col-md-6">
        <div class="card modern-card p-4 animate__animated animate__fadeInRight">
            <div class="d-flex justify-content-between mb-2">
                <h5 class="fw-bold"><i class="ti ti-history me-2"></i>Riwayat Pengaduan</h5>
                <a href="{{ route('pengaduan.index') }}" class="btn btn-sm btn-modern px-3">Lihat Semua</a>
            </div>

            <ul class="list-group">

                <!-- ITEM 1 -->
                <li class="list-group-item border-0 p-3 shadow-sm rounded mb-2">
                    <div class="d-flex justify-content-between">
                        <b>Penerangan Jalan Mati</b>
                        <span class="badge bg-warning text-dark">Diproses</span>
                    </div>
                    <small class="text-muted">2 hari lalu</small>
                </li>

                <!-- ITEM 2 -->
                <li class="list-group-item border-0 p-3 shadow-sm rounded mb-2">
                    <div class="d-flex justify-content-between">
                        <b>Sampah Menumpuk</b>
                        <span class="badge bg-success">Selesai</span>
                    </div>
                    <small class="text-muted">5 hari lalu</small>
                </li>

                <!-- ITEM 3 -->
                <li class="list-group-item border-0 p-3 rounded text-center">
                    <small><a href="{{ route('pengaduan.index') }}">Lihat pengaduan lainnya...</a></small>
                </li>
            </ul>
        </div>
    </div>

</div>

<!-- EXTRA QUICK ACTION BUTTON -->
<div class="quick-btn">
    <a href="{{ route('pengaduan.create') }}">
        <i class="ti ti-plus"></i>
    </a>
</div>

<style>

.hero-section {
    background: linear-gradient(135deg, #28A745, #6fe68a);
}

/* STAT CARD */
.stat-card {
    background: white;
    border-radius: 18px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: .25s;
    text-align: center;
}
.stat-card:hover {
    transform: translateY(-6px);
}

/* MENU CARD */
.menu-card {
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: .25s;
}
.menu-card:hover {
    background: #eaffec;
    transform: translateY(-6px);
}

.menu-link {
    text-decoration: none;
    color: inherit;
}

/* MAIN CARD */
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

/* BUTTON */
.btn-modern {
    background: linear-gradient(135deg, #28A745, #6fdc88);
    color: white !important;
    border-radius: 25px;
}
.btn-modern:hover {
    opacity: .9;
}

/* FLOAT BUTTON */
.quick-btn {
    position: fixed;
    bottom: 35px;
    right: 35px;
}
.quick-btn a {
    background: #28A745;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    transition: .25s;
}
.quick-btn a:hover {
    transform: scale(1.1);
}

</style>

@endsection
