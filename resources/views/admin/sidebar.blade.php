<!-- Sidebar Admin -->
<div class="sidebar-container p-3">

    <!-- Logo / Profil Admin -->
    <div class="sidebar-header text-center mb-4">
        <img src="/assets/images/my/logo-white.png" class="sidebar-logo" alt="Logo Desa">
        <h5 class="mt-2 fw-bold">Sistem Informasi Desa</h5>
        <span class="text-muted small">Administrator Panel</span>
    </div>

    <ul class="sidebar-menu mt-3">

        <!-- Dashboard -->
        <li class="sidebar-item">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                <i class="ti ti-home sidebar-icon"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Data Penduduk -->
        <li class="sidebar-item">
            <a href="{{ route('admin.penduduk.index') }}" class="sidebar-link">
                <i class="ti ti-users sidebar-icon"></i>
                <span>Data Penduduk</span>
            </a>
        </li>

        <!-- Pengajuan Surat -->
        <li class="sidebar-item">
            <a href="{{ route('admin.pengajuan-surat.index') }}" class="sidebar-link">
                <i class="ti ti-file-text sidebar-icon"></i>
                <span>Pengajuan Surat</span>
            </a>
        </li>

        <!-- Laporan Pengaduan -->
        <li class="sidebar-item">
            <a href="{{ route('admin.pengaduan.index') }}" class="sidebar-link">
                <i class="ti ti-report sidebar-icon"></i>
                <span>Laporan Pengaduan</span>
            </a>
        </li>

        <!-- Logout -->
        <li class="sidebar-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="sidebar-link text-danger border-0 bg-transparent w-100 text-start">
                    <i class="ti ti-logout sidebar-icon"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li>

    </ul>
</div>

<style>
/* Sidebar Container */
.sidebar-container {
    width: 260px;
    background: #ffffff;
    border-right: 1px solid #e4e4e4;
    min-height: 100vh;
    padding-top: 25px;
}

/* Logo / Avatar */
.sidebar-logo {
    width: 65px;
    height: 65px;
    border-radius: 12px;
    object-fit: cover;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

/* Menu Container */
.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* Item */
.sidebar-item {
    margin-bottom: 8px;
}

/* Link */
.sidebar-link {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    border-radius: 12px;
    color: #333;
    text-decoration: none;
    transition: 0.25s;
    cursor: pointer;
    width: 100%;
}

/* Button Style untuk Logout */
.sidebar-item form button.sidebar-link {
    border: none;
    background: transparent;
    font: inherit;
}

/* Icon */
.sidebar-icon {
    font-size: 22px;
    width: 30px;
    color: #2b72ff;
}

/* Hover */
.sidebar-link:hover {
    background: #eaf1ff;
    transform: translateX(5px);
}

/* Active State (optional) */
.sidebar-link.active {
    background: #2b72ff;
    color: #fff !important;
}
.sidebar-link.active .sidebar-icon {
    color: #fff;
}
</style>