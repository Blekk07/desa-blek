@section('content')

<!-- Hero Welcome Section -->
<div class="p-5 rounded-4 mb-4 text-white hero-section shadow-sm">
    <h2 class="fw-bold mb-1">Selamat Datang di Sistem Informasi Desa 👋</h2>
    <p class="m-0">Kelola data desa dengan lebih mudah, cepat, dan modern.</p>
</div>

<div class="row g-4">
    @php
        $stats = [
            ['label' => 'Jumlah Penduduk', 'value' => '4,236', 'icon' => 'bi-people'],
            ['label' => 'Jumlah Keluarga', 'value' => '1,101', 'icon' => 'bi-house-heart'],
            ['label' => 'RT / RW', 'value' => '12 / 4', 'icon' => 'bi-diagram-3'],
            ['label' => 'Potensi Desa', 'value' => '8 Sektor', 'icon' => 'bi-bar-chart-line'],
        ];
    @endphp

    @foreach ($stats as $item)
    <div class="col-md-6 col-xl-3">
        <div class="card modern-card text-center py-4">
            <i class="{{ $item['icon'] }} text-primary fs-1 mb-2"></i>
            <h6 class="text-muted mb-1">{{ $item['label'] }}</h6>
            <h2 class="fw-bold">{{ $item['value'] }}</h2>
        </div>
    </div>
    @endforeach
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card modern-card text-center p-4">
            <img src="/img/kepala-desa.png" class="avatar-profile mb-3">
            <h5 class="fw-bold">Budi Santoso</h5>
            <p class="text-muted">Kepala Desa</p>
            <span class="badge bg-gradient-primary px-3 py-2 rounded-pill">Masa Jabatan: 2023 - 2029</span>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card modern-card p-4">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="fw-bold">Informasi Desa</h5>
                <a href="#" class="btn btn-modern">Edit Info</a>
            </div>

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
</div>

<div class="row mt-4 g-4">
    @php
        $menus = [
            ['name' => 'Data Penduduk', 'icon' => 'bi-people', 'url' => '#'],
            ['name' => 'Pengaduan Warga', 'icon' => 'bi-chat-text', 'url' => '#'],
            ['name' => 'Potensi Desa', 'icon' => 'bi-tree', 'url' => '#'],
            ['name' => 'Laporan & Arsip', 'icon' => 'bi-folder2-open', 'url' => '#'],
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

<style>
.hero-section {
    background: linear-gradient(135deg, #2b72ff, #6aa8ff);
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

.avatar-profile {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
}

.btn-modern {
    background: linear-gradient(135deg, #2b72ff, #5ea0ff);
    color: white;
    border-radius: 25px;
    padding: 6px 18px;
}
.btn-modern:hover {
    opacity: .9;
}

.menu-card {
    transition: .25s;
    border-radius: 18px;
}
.menu-card:hover {
    background: #f1f8ff;
    transform: translateY(-6px);
}
.menu-link {
    text-decoration: none;
    color: inherit;
}
</style>

@endsection
