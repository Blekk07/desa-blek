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

    <!-- STANDARDIZED ICON FONT — TABLER ICONS ONLY -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">

    <!-- MODERN STYLE CUSTOM -->
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
        }

        /* TAMBAHAN AGAR TIDAK MEPET BAWAH */
        .pc-container {
            padding-bottom: 40px !important;
        }

        /* MODERN SIDEBAR */
        .pc-sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
            z-index: 1050;
            box-shadow: var(--smooth-shadow);
        }

        .pc-sidebar.hidden {
            transform: translateX(-280px);
        }

        .pc-sidebar .m-header {
            padding: 1.5rem 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .pc-sidebar .m-header .b-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
        }

        .pc-sidebar .m-header .b-brand span {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .pc-navbar {
            padding: 1rem 0;
        }

        .pc-navbar .pc-item {
            margin: 0.25rem 1rem;
        }

        .pc-navbar .pc-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .pc-navbar .pc-link:hover {
            background: var(--sidebar-hover);
            color: white;
            transform: translateX(4px);
        }

        .pc-navbar .pc-link.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .pc-navbar .pc-link i {
            font-size: 1.25rem;
            width: 24px;
        }

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
        }

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

        .dropdown-user-profile {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            padding: 0.5rem;
            min-width: 200px;
        }

        .dropdown-user-profile .dropdown-item {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: var(--transition);
            color: #64748b;
            text-decoration: none;
        }

        .dropdown-user-profile .dropdown-item:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            transform: translateX(4px);
        }

        .dropdown-user-profile .dropdown-item i {
            width: 20px;
        }

        .pc-container {
            transition: var(--transition);
            margin-left: 280px;
            background: #f8fafc;
            min-height: 100vh;
        }

        .pc-container.full {
            margin-left: 0;
        }

        .pc-footer {
            background: white;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding: 1.5rem 0;
            margin-top: auto;
        }

        .footer-wrapper {
            text-align: center;
            color: #64748b;
            font-weight: 500;
        }

        .loader-bg {
            background: var(--primary-gradient);
        }

        .loader-track {
            background: rgba(255, 255, 255, 0.2);
        }

        .loader-fill {
            background: white;
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
            
            .pc-container {
                margin-left: 0 !important;
            }
            
            .header-wrapper {
                padding: 1rem;
            }
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
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

<div class="pc-container" id="content">
    <div class="fade-in-up">
        @yield('content')
    </div>
</div>

<footer class="pc-footer mt-auto bg-light border-top py-4">
    <div class="footer-wrapper container-fluid text-center">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    if(!sessionStorage.getItem("welcome_shown")) {
        sessionStorage.setItem("welcome_shown", "1");

        Swal.fire({
            title: "Selamat Datang, {{ $name }}! 👋",
            html: `
                <div style="text-align: center;">
                    <p>Anda masuk sebagai <b style="background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $role }}</b></p>
                    <p>Semoga harimu menyenangkan 😊</p>
                </div>
            `,
            icon: "success",
            confirmButtonText: "Mulai",
            confirmButtonColor: "#667eea",
            timer: 4500,
            timerProgressBar: true,
            background: '#ffffff',
            color: '#1e293b',
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

    applyResponsive();

    window.addEventListener('resize', function() {
        applyResponsive();
    });

    toggle.addEventListener('click', function () {
        if (window.innerWidth <= 991) {
            sidebar.classList.toggle('show-mobile');
        } else {
            sidebar.classList.toggle('hidden');
            content.classList.toggle('full');
            
            if (sidebar.classList.contains('hidden')) {
                header.classList.add('full-width');
            } else {
                header.classList.remove('full-width');
            }
            
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

    document.querySelectorAll('.pc-navbar .pc-link').forEach(link => {
        link.style.animationDelay = Math.random() * 0.5 + 's';
    });

})();
</script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{!! session('success') !!}",
            confirmButtonColor: '#667eea'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: "{!! session('error') !!}",
            confirmButtonColor: '#e11d48'
        });
    @endif

    @if(session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan!',
            text: "{!! session('warning') !!}",
            confirmButtonColor: '#f59e0b'
        });
    @endif

    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Terdapat Kesalahan',
            html: "{!! implode('<br/>', $errors->all()) !!}",
            confirmButtonColor: '#e11d48'
        });
    @endif
</script>

</body>
</html>
