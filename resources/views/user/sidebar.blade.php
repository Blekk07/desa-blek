<!-- Sidebar User -->
<div class="sidebar-container p-3">

    <!-- Logo / Profil User -->
    <div class="sidebar-header text-center mb-4">
        <img src="{{ auth()->user()->avatar ?? '/assets/images/user-default.png' }}" class="sidebar-logo">
        <h5 class="mt-2 fw-bold">{{ auth()->user()->name }}</h5>
        <span class="text-muted small">Warga Desa</span>
    </div>

    <ul class="sidebar-menu mt-3">

        <!-- Dashboard -->
        <li class="sidebar-item">
            <a href="{{ route('user.dashboard') }}" class="sidebar-link">
                <i class="ti ti-home sidebar-icon"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Profil Saya -->
        <li class="sidebar-item">
            <a href="{{ route('myprofile') }}" class="sidebar-link">
                <i class="ti ti-user sidebar-icon"></i>
                <span>Profil Saya</span>
            </a>
        </li>

        <!-- Informasi Desa -->
        <li class="sidebar-item">
            <a href="{{ route('user.profile-desa') }}" class="sidebar-link">
                <i class="ti ti-building sidebar-icon"></i>
                <span>Informasi Desa</span>
            </a>
        </li>

        <!-- Pengajuan Surat -->
        <li class="sidebar-item">
            <a href="{{ route('user.pengajuan-surat.index') }}" class="sidebar-link">
                <i class="ti ti-file-text sidebar-icon"></i>
                <span>Pengajuan Surat</span>
            </a>
        </li>

        <!-- Pengaduan Warga -->
        <li class="sidebar-item">
            <a href="{{ route('pengaduan.index') }}" class="sidebar-link">
                <i class="ti ti-report sidebar-icon"></i>
                <span>Laporan Warga</span>
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