<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">

    <!-- LOCAL ICON FONT -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">

    <!-- MODERN STYLE CUSTOM DASHBOARD -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --sidebar-bg: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            --sidebar-hover: rgba(255, 255, 255, 0.1);
            --header-bg: rgba(255, 255, 255, 0.95);
            --card-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            --smooth-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* MODERN SIDEBAR - FIXED POSITION */
        .pc-sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
            z-index: 1050;
            box-shadow: var(--smooth-shadow);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            transform: translateX(0);
        }

        .pc-sidebar.hidden {
            transform: translateX(-280px);
        }

        /* MODERN HEADER - FIXED POSITION */
        .pc-header {
            background: var(--header-bg);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: var(--smooth-shadow);
            transition: var(--transition);
            position: fixed;
            top: 0;
            left: 280px;
            right: 0;
            z-index: 1040;
            height: 70px;
        }

        .pc-header.full-width {
            left: 0 !important;
        }

        .pc-header.scrolled {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .header-wrapper {
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100%;
        }

        /* TOGGLE BUTTON */
        #toggleSidebar {
            background: var(--primary-gradient);
            border: none;
            border-radius: var(--border-radius);
            color: white;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        #toggleSidebar:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        /* HEADER CONTENT - RESPONSIVE */
        .header-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .mobile-search-btn {
            display: none;
            background: transparent;
            border: none;
            color: #64748b;
            width: 40px;
            height: 40px;
            border-radius: var(--border-radius);
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .mobile-search-btn:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        /* SEARCH BAR */
        .search-container {
            position: relative;
            flex: 1;
            max-width: 400px;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #e2e8f0;
            border-radius: var(--border-radius);
            background: #f8fafc;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }

        /* USER PROFILE */
        .header-user-profile .pc-head-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .header-user-profile .pc-head-link:hover {
            background: rgba(102, 126, 234, 0.2);
            transform: translateY(-1px);
        }

        .user-avtar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 2px solid #667eea;
            object-fit: cover;
        }

        /* MOBILE MENU BUTTON */
        .mobile-menu-btn {
            display: none;
            background: transparent;
            border: none;
            color: #64748b;
            width: 40px;
            height: 40px;
            border-radius: var(--border-radius);
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            font-size: 1.25rem;
        }

        .mobile-menu-btn:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        /* MAIN CONTENT - FIXED POSITION */
        .pc-container {
            transition: var(--transition);
            margin-left: 280px;
            background: #f8fafc;
            min-height: 100vh;
            padding-top: 70px; /* Height header */
            padding-left: 2rem;
            padding-right: 2rem;
            padding-bottom: 2rem;
        }

        .pc-container.full {
            margin-left: 0 !important;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 1199px) {
            .header-wrapper {
                padding: 1rem;
            }
            
            .search-container {
                max-width: 300px;
            }

            .pc-container {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .pc-container.full {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }

        @media (max-width: 991px) {
            .pc-sidebar {
                transform: translateX(-280px);
                position: fixed;
                height: 100vh;
                box-shadow: var(--card-shadow);
            }
            
            .pc-sidebar.show-mobile {
                transform: translateX(0);
            }
            
            .pc-header {
                left: 0 !important;
                right: 0 !important;
            }
            
            .pc-container {
                margin-left: 0 !important;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .pc-container.full {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .header-title {
                font-size: 1.1rem;
            }

            .search-container {
                display: none;
            }

            .mobile-search-btn {
                display: flex;
            }

            .user-name {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .header-wrapper {
                padding: 0.75rem;
            }

            .header-title {
                font-size: 1rem;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .header-user-profile .pc-head-link {
                padding: 0.5rem;
            }

            .header-user-profile .pc-head-link span {
                display: none;
            }

            .pc-container {
                padding-top: 60px;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .pc-container.full {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media (max-width: 576px) {
            .header-content {
                gap: 0.5rem;
            }

            #toggleSidebar,
            .mobile-search-btn,
            .mobile-menu-btn {
                width: 35px;
                height: 35px;
            }

            .user-avtar {
                width: 32px;
                height: 32px;
            }

            .pc-container {
                padding-top: 55px;
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            .pc-container.full {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }

        /* MOBILE SEARCH OVERLAY */
        .mobile-search-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1060;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .mobile-search-overlay.active {
            display: flex;
        }

        .mobile-search-container {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            width: 100%;
            max-width: 500px;
            position: relative;
        }

        .close-search {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: transparent;
            border: none;
            color: #64748b;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .close-search:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        /* MOBILE MENU OVERLAY */
        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1060;
            display: none;
        }

        .mobile-menu-overlay.active {
            display: block;
        }

        .mobile-menu-content {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 280px;
            background: white;
            padding: 2rem 1rem;
            overflow-y: auto;
        }

        .mobile-menu-header {
            display: flex;
            align-items: center;
            justify-content: between;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .close-mobile-menu {
            background: transparent;
            border: none;
            color: #64748b;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .close-mobile-menu:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        /* Mobile Nav Items */
        .mobile-nav-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            color: #334155;
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: var(--transition);
            margin-bottom: 0.5rem;
        }

        .mobile-nav-item:hover {
            background: #f1f5f9;
            color: #667eea;
        }

        .mobile-nav-item i {
            margin-right: 1rem;
            width: 20px;
            text-align: center;
        }

        .logout-form {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .logout-btn {
            background: transparent;
            border: none;
            color: #ef4444;
            width: 100%;
            text-align: left;
            padding: 0;
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

<nav class="pc-sidebar" id="sidebar">
    <div class="navbar-wrapper">
        <div class="m-header justify-content-center">
            <a href="/" class="b-brand text-capitalize fw-bold">
                <span class="fs-4">{{ auth()->user()->role }} Dashboard</span>
            </a>
        </div>

        <div class="navbar-content">
            <ul class="pc-navbar">
                @if (auth()->user()->role === 'admin')
                    @include('admin.sidebar')
                @else
                    @include('user.sidebar')
                @endif
            </ul>
        </div>
    </div>
</nav>

<header class="pc-header" id="mainHeader">
    <div class="header-wrapper">
        <div class="header-content">
            <!-- Toggle Sidebar Button -->
            <button id="toggleSidebar">
                <i class="ti ti-menu-2"></i>
            </button>

            <!-- Page Title -->
            <h1 class="header-title">@yield('title', 'Dashboard')</h1>

            <!-- Search Bar -->
            <div class="search-container">
                <i class="ti ti-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Cari sesuatu...">
            </div>

            <!-- Mobile Search Button -->
            <button class="mobile-search-btn" id="mobileSearchBtn">
                <i class="ti ti-search"></i>
            </button>
        </div>

        <div class="header-content">
            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="ti ti-dots-vertical"></i>
            </button>

            <!-- User Profile -->
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#">
                        <img src="{{ $avatar }}" class="user-avtar">
                        <span class="user-name">{{ $name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <a href="/myprofile" class="dropdown-item">
                            <i class="ti ti-user"></i> 
                            <span>My Profile</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ti ti-power"></i> 
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- Mobile Search Overlay -->
<div class="mobile-search-overlay" id="mobileSearchOverlay">
    <div class="mobile-search-container">
        <button class="close-search" id="closeSearch">
            <i class="ti ti-x"></i>
        </button>
        <div class="search-container">
            <i class="ti ti-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari sesuatu..." autofocus>
        </div>
    </div>
</div>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay">
    <div class="mobile-menu-content">
        <div class="mobile-menu-header">
            <h5 class="mb-0">Menu</h5>
            <button class="close-mobile-menu" id="closeMobileMenu">
                <i class="ti ti-x"></i>
            </button>
        </div>
        
        <!-- Mobile Menu Items -->
        <div class="mobile-nav">
            <a href="{{ route('user.dashboard') }}" class="mobile-nav-item">
                <i class="ti ti-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('myprofile') }}" class="mobile-nav-item">
                <i class="ti ti-user"></i>
                <span>Profil Saya</span>
            </a>
            <a href="{{ route('user.profile-desa') }}" class="mobile-nav-item">
                <i class="ti ti-building"></i>
                <span>Informasi Desa</span>
            </a>
            <a href="{{ route('user.pengajuan-surat.index') }}" class="mobile-nav-item">
                <i class="ti ti-file-text"></i>
                <span>Pengajuan Surat</span>
            </a>
            <a href="{{ route('pengaduan.index') }}" class="mobile-nav-item">
                <i class="ti ti-report"></i>
                <span>Laporan Warga</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mobile-nav-item logout-form">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="ti ti-logout"></i>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </div>
</div>

<div class="pc-container" id="content">
    <div class="fade-in-up">
        @yield('content')
    </div>
</div>

<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <p class="m-0">Made in Blekk with ❤️</p>
    </div>
</footer>

<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const header = document.getElementById('mainHeader');
    const toggle = document.getElementById('toggleSidebar');
    const mobileSearchBtn = document.getElementById('mobileSearchBtn');
    const mobileSearchOverlay = document.getElementById('mobileSearchOverlay');
    const closeSearch = document.getElementById('closeSearch');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const closeMobileMenu = document.getElementById('closeMobileMenu');

    function updateLayout() {
        if (window.innerWidth > 991) {
            // Desktop layout
            if (sidebar.classList.contains('hidden')) {
                header.classList.add('full-width');
                content.classList.add('full');
            } else {
                header.classList.remove('full-width');
                content.classList.remove('full');
            }
        } else {
            // Mobile layout
            header.classList.add('full-width');
            content.classList.add('full');
        }
    }

    function applyResponsive() {
        if (window.innerWidth <= 991) {
            sidebar.classList.remove('hidden');
            content.classList.remove('full');
            header.classList.add('full-width');
        } else {
            if (localStorage.getItem('sidebarHidden') === '1') {
                sidebar.classList.add('hidden');
                content.classList.add('full');
                header.classList.add('full-width');
            } else {
                sidebar.classList.remove('hidden');
                content.classList.remove('full');
                header.classList.remove('full-width');
            }
        }
    }

    // Initialize
    applyResponsive();
    updateLayout();

    // Event listeners
    window.addEventListener('resize', function() {
        applyResponsive();
        updateLayout();
    });

    // Sidebar Toggle
    toggle.addEventListener('click', function () {
        if (window.innerWidth <= 991) {
            sidebar.classList.toggle('show-mobile');
        } else {
            sidebar.classList.toggle('hidden');
            localStorage.setItem('sidebarHidden', sidebar.classList.contains('hidden') ? '1' : '0');
            updateLayout();
        }
    });

    // Mobile Search
    mobileSearchBtn.addEventListener('click', function () {
        mobileSearchOverlay.classList.add('active');
    });

    closeSearch.addEventListener('click', function () {
        mobileSearchOverlay.classList.remove('active');
    });

    mobileSearchOverlay.addEventListener('click', function (e) {
        if (e.target === mobileSearchOverlay) {
            mobileSearchOverlay.classList.remove('active');
        }
    });

    // Mobile Menu
    mobileMenuBtn.addEventListener('click', function () {
        mobileMenuOverlay.classList.add('active');
    });

    closeMobileMenu.addEventListener('click', function () {
        mobileMenuOverlay.classList.remove('active');
    });

    mobileMenuOverlay.addEventListener('click', function (e) {
        if (e.target === mobileMenuOverlay) {
            mobileMenuOverlay.classList.remove('active');
        }
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function (e) {
        if (window.innerWidth <= 991) {
            if (!sidebar.contains(e.target) && !toggle.contains(e.target) && sidebar.classList.contains('show-mobile')) {
                sidebar.classList.remove('show-mobile');
            }
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            if (sidebar.classList.contains('show-mobile')) {
                sidebar.classList.remove('show-mobile');
            }
            if (mobileSearchOverlay.classList.contains('active')) {
                mobileSearchOverlay.classList.remove('active');
            }
            if (mobileMenuOverlay.classList.contains('active')) {
                mobileMenuOverlay.classList.remove('active');
            }
        }
    });

    window.addEventListener('scroll', function () {
        if (window.scrollY > 10) header.classList.add('scrolled');
        else header.classList.remove('scrolled');
    });

    // Add smooth animations to sidebar items
    document.querySelectorAll('.pc-navbar .pc-link').forEach((link, index) => {
        link.style.animationDelay = `${index * 0.1}s`;
    });

});
</script>

</body>
</html>