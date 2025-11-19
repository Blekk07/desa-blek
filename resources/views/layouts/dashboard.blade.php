<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">

    <!-- LOCAL ICON FONT -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">

    <!-- 🔥 FIX ICON HILANG — PAKAI CDN TABLER RESMI -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">

    <!-- STYLE CUSTOM SIDEBAR -->
    <style>
        .pc-sidebar {
            width: 250px;
            transition: margin-left .28s ease, width .28s ease, transform .28s ease;
            z-index: 1050;
        }
        .pc-sidebar.hidden {
            transform: translateX(-260px);
        }

        .pc-container {
            transition: margin-left .28s ease;
            margin-left: 250px;
        }
        .pc-container.full {
            margin-left: 0;
        }

        @media (max-width: 991px) {
            .pc-sidebar {
                transform: translateX(-260px);
                position: fixed;
                height: 100%;
            }
            .pc-sidebar.show-mobile {
                transform: translateX(0);
            }
            .pc-container {
                margin-left: 0 !important;
            }
        }

        #toggleSidebar {
            border: 0;
            background: transparent;
            font-size: 18px;
            cursor: pointer;
        }

        /* Header sticky */
        .pc-header {
            position: sticky;
            top: 0;
            z-index: 1100;
            background: #ffffff;
            transition: box-shadow .25s ease;
        }
        .pc-header.scrolled {
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
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
            <a href="/" class="b-brand text-dark text-capitalize fw-bold">
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

<header class="pc-header">
    <div class="header-wrapper">
        <div class="me-auto pc-mob-drp">
            <button id="toggleSidebar">
                <i class="ti ti-menu-2"></i>
            </button>
        </div>

        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#">
                        <img src="{{ $avatar }}" class="user-avtar">
                        <span>{{ $name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <a href="/myprofile" class="dropdown-item"><i class="ti ti-user"></i> My Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="ti ti-power"></i> Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

<div class="pc-container" id="content">
    @yield('content')
</div>

<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <p class="m-0">Sistem Informasi Desa © 2025</p>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    if(!sessionStorage.getItem("welcome_shown")) {
        sessionStorage.setItem("welcome_shown", "1");

        Swal.fire({
            title: "Selamat Datang, {{ $name }}! 👋",
            html: `
                <p>Anda masuk sebagai <b>{{ $role }}</b></p>
                <p>Semoga harimu menyenangkan 😊</p>
            `,
            icon: "success",
            confirmButtonText: "Mulai",
            timer: 4500,
            timerProgressBar: true,
        });
    }
});
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script>
(function () {
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const toggle = document.getElementById('toggleSidebar');
    const header = document.querySelector('.pc-header');

    function applyResponsive() {
        if (window.innerWidth <= 991) {
            sidebar.classList.remove('hidden');
            content.classList.remove('full');
        } else {
            if (localStorage.getItem('sidebarHidden') === '1') {
                sidebar.classList.add('hidden');
                content.classList.add('full');
            }
        }
    }

    applyResponsive();
    window.addEventListener('resize', applyResponsive);

    toggle.addEventListener('click', function () {
        if (window.innerWidth <= 991) {
            sidebar.classList.toggle('show-mobile');
        } else {
            sidebar.classList.toggle('hidden');
            content.classList.toggle('full');
            localStorage.setItem('sidebarHidden', sidebar.classList.contains('hidden') ? '1' : '0');
        }
    });

    document.addEventListener('click', function (e) {
        if (window.innerWidth <= 991 &&
            !sidebar.contains(e.target) &&
            !toggle.contains(e.target) &&
            sidebar.classList.contains('show-mobile')) {
            sidebar.classList.remove('show-mobile');
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && sidebar.classList.contains('show-mobile')) {
            sidebar.classList.remove('show-mobile');
        }
    });

    window.addEventListener('scroll', function () {
        if (window.scrollY > 10) header.classList.add('scrolled');
        else header.classList.remove('scrolled');
    });

})();
</script>

</body>
</html>
