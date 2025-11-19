<!-- =======================
     ADMIN SIDEBAR MODERN
======================= -->
<nav class="sidebar-modern">
    <div class="sidebar-header text-center">
        <img src="/assets/images/logo-desa.png" class="sidebar-logo" alt="Logo Desa">
        <h5 class="mt-2 fw-bold">Sistem Informasi Desa</h5>
        <p class="text-muted small">Administrator Panel</p>
    </div>

    <ul class="sidebar-menu mt-3">

        <li>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                <i class="ti ti-home sidebar-icon"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.penduduk.index') }}" class="sidebar-link">
                <i class="ti ti-users sidebar-icon"></i>
                <span>Data Penduduk</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.pengajuan-surat.index') }}" class="sidebar-link">
                <i class="ti ti-file-text sidebar-icon"></i>
                <span>Pengajuan Surat</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.pengaduan.index') }}" class="sidebar-link">
                <i class="ti ti-report sidebar-icon"></i>
                <span>Laporan Pengaduan</span>
            </a>
        </li>

        <li>
            <a href="{{ route('logout') }}" class="sidebar-link text-danger">
                <i class="ti ti-logout sidebar-icon"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>
</nav>

<style>
/* Sidebar Wrapper */
.sidebar-modern {
    width: 260px;
    background: #ffffff;
    height: 100vh;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    padding: 20px;
    position: fixed;
    border-radius: 0 18px 18px 0;
}

/* Header */
.sidebar-header .sidebar-logo {
    width: 70px;
    height: 70px;
    border-radius: 14px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
}

/* Menu */
.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu li {
    margin-bottom: 10px;
}

/* Link Style */
.sidebar-link {
    display: flex;
    align-items: center;
    padding: 12px 14px;
    text-decoration: none;
    color: #222;
    background: #f8f9fc;
    border-radius: 14px;
    transition: .25s;
    font-weight: 500;
}

.sidebar-link:hover {
    background: #e9f2ff;
    transform: translateX(6px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.10);
}

.sidebar-link i {
    font-size: 1.4rem;
    margin-right: 12px;
    color: #2b72ff;
}

/* Active (optional, jika mau dinamiskan nanti) */
.sidebar-link.active {
    background: linear-gradient(135deg, #2b72ff, #6aa8ff);
    color: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}
.sidebar-link.active i {
    color: white;
}
</style>
