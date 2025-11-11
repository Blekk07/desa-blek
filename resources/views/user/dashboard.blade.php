@extends('layouts.dashboard')
@section('title', 'Dashboard Warga Desa')

@section('content')

<!-- Hero Welcome Section -->
<div class="p-5 rounded-4 mb-4 text-white hero-section shadow-sm">
    <h2 class="fw-bold mb-1">Selamat Datang 👋</h2>
    <p class="m-0">Akses informasi dan layanan desa secara cepat dan mudah.</p>
</div>

<!-- Menu Layanan Utama -->
<div class="row g-4 mb-4">
    @php
        $menus = [
            ['name' => 'Profil Saya', 'icon' => 'bi-person-circle', 'url' => '#'],
            ['name' => 'Pengaduan Warga', 'icon' => 'bi-chat-dots', 'url' => '#'],
            ['name' => 'Informasi Desa', 'icon' => 'bi-info-circle', 'url' => '#'],
            ['name' => 'Pengajuan Surat', 'icon' => 'bi-file-earmark-text', 'url' => '#'],
        ];
    @endphp

    @foreach ($menus as $menu)
    <div class="col-md-3">
        <a href="{{ $menu['url'] }}" class="menu-link">
            <div class="card menu-card text-center p-4">
                <i class="{{ $menu['icon'] }} fs-1 mb-2 text-primary"></i>
                <h6 class="fw-bold">{{ $menu['name'] }}</h6>
            </div>
        </a>
    </div>
    @endforeach
</div>

<!-- Informasi Desa & Riwayat Pengaduan -->
<div class="row g-4">
    <!-- Informasi Desa -->
    <div class="col-md-6">
        <div class="card modern-card p-4">
            <h5 class="fw-bold mb-3">Informasi Desa</h5>

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

    <!-- Riwayat Pengaduan -->
    <div class="col-md-6">
        <div class="card modern-card p-4">
            <div class="d-flex justify-content-between mb-2">
                <h5 class="fw-bold">Riwayat Pengaduan</h5>
                <a href="#" class="btn btn-sm btn-modern px-3">Lihat Semua</a>
            </div>

            <ul class="list-group">
                <li class="list-group-item border-0 p-3 shadow-sm rounded mb-2">
                    <b>Penerangan Jalan Mati</b>
                    <br><small class="text-muted">Status: Diproses - 2 hari lalu</small>
                </li>

                <li class="list-group-item border-0 p-3 shadow-sm rounded mb-2">
                    <b>Sampah Menumpuk</b>
                    <br><small class="text-muted">Status: Selesai - 5 hari lalu</small>
                </li>

                <li class="list-group-item border-0 p-3 rounded text-center">
                    <small><a href="#">Lihat pengaduan lainnya...</a></small>
                </li>
            </ul>
        </div>
    </div>
</div>


<style>
.hero-section {
    background: linear-gradient(135deg, #28A745, #6fe68a);
}

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

.menu-card {
    border: none;
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

.btn-modern {
    background: linear-gradient(135deg, #28A745, #6fdc88);
    color: white;
    border-radius: 25px;
    padding: 6px 18px;
}
.btn-modern:hover {
    opacity: .9;
}
</style>

@endsection
