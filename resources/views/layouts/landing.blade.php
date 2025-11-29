<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - Sistem Informasi Desa</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Sistem Informasi Desa merupakan portal informasi dan layanan digital untuk mendukung transparansi dan kemajuan desa.">
    <meta name="keywords"
        content="Sistem Informasi Desa, Profil Desa, Potensi Desa, Layanan Masyarakat, Pemerintah Desa, Transparansi Publik">
    <meta name="author" content="Pemerintah Desa">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <!-- [Page specific CSS] start -->
    <link href="{{ asset('assets/css/plugins/animate.min.css') }}" rel="stylesheet" type="text/css">
    <!-- [Page specific CSS] end -->
    <!-- [Google Font] Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive-fixes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">

    <style>
        :root {
            --primary-color: #0052d4;
            --secondary-color: #00a8ff;
            --accent-color: #ff6b6b;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Modern Navbar */
        .navbar {
            transition: var(--transition);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98) !important;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            transition: var(--transition);
            filter: brightness(0);
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark-color) !important;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-color) !important;
            background: rgba(0, 82, 212, 0.1);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .nav-link.active::after {
            width: 80%;
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background: #0041a8;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 82, 212, 0.3);
        }

        /* Modern Footer */
        .footer {
            background: linear-gradient(135deg, var(--dark-color) 0%, #0f172a 100%) !important;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.02)" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: cover;
        }

        .top-footer {
            position: relative;
            z-index: 2;
        }

        .footer-link a {
            color: rgba(255, 255, 255, 0.8) !important;
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .footer-link a:hover {
            color: white !important;
            transform: translateX(5px);
        }

        .footer-link li.d-flex {
            align-items: flex-start;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .footer-link li.d-flex i {
            margin-top: 0.2rem;
        }

        .footer-sos-link a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white !important;
            transition: var(--transition);
            margin-left: 0.5rem;
        }

        .footer-sos-link a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }

        .bottom-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 3rem;
            padding-top: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Modern Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Loading Animation */
        .loader-bg {
            background: var(--primary-color);
        }

        .loader-track {
            background: rgba(255, 255, 255, 0.2);
        }

        .loader-fill {
            background: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.75rem 0;
            }
            
            .nav-link {
                margin: 0.25rem 0;
                text-align: center;
            }
            
            .btn-primary {
                width: 100%;
                margin-top: 0.5rem;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0041a8;
        }
    </style>
</head>

<body class="landing-page">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!-- [ Modern Navbar ] -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top py-0" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img width="70" src="{{ asset('assets/images/my/logo-black-tp.png') }}" alt="logo" class="float-animation">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profile-desa') ? 'active' : '' }}" href="/profile-desa">Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('help') ? 'active' : '' }}" href="/help">Bantuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('reset-password') ? 'active' : '' }}"
                            href="/forgot-password">Lupa Password</a>
                    </li>

                    @if (auth()->check())
                        <li class="nav-item ms-2">
                            <a class="btn btn-primary d-flex align-items-center" href="/myprofile">
                                <i class="ti ti-user me-2"></i>
                                <span>{{ auth()->user()->name }}</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item ms-2">
                            <a class="btn btn-primary d-flex align-items-center" href="/login">
                                <i class="ti ti-login me-2"></i>
                                <span>Login</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Navbar End ] -->

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- [ Modern Footer ] -->
    <footer class="footer bg-dark text-white py-5">
        <div class="top-footer">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <img src="{{ asset('assets/images/my/logo-black-tp.png') }}" alt="Logo Desa"
                            class="img-fluid mb-4" style="max-width: 200px; filter: brightness(0) invert(1);">
                        <p class="opacity-75 mb-4">Sistem Informasi Desa merupakan portal resmi yang menampilkan data,
                            potensi, dan layanan masyarakat dalam rangka mewujudkan desa yang maju, transparan, dan
                            mandiri.</p>
                        <div class="footer-sos-link">
                            <a href="#" class="float-animation" style="animation-delay: 0s;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="float-animation" style="animation-delay: 0.2s;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="float-animation" style="animation-delay: 0.4s;">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="float-animation" style="animation-delay: 0.6s;">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row g-4">
                            <div class="col-sm-6 col-md-4">
                                <h5 class="text-white mb-4 fw-bold">Navigasi Cepat</h5>
                                <ul class="list-unstyled footer-link">
                                    <li><a href="/">Beranda</a></li>
                                    <li><a href="/profile-desa">Profil Desa</a></li>
                                    <li><a href="/help">Pusat Bantuan</a></li>
                                    <li><a href="/pengaduan">Pengaduan Masyarakat</a></li>
                                    <li><a href="/register">Daftar Akun</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <h5 class="text-white mb-4 fw-bold">Kontak Kami</h5>
                                <ul class="list-unstyled footer-link">
                                    <li class="d-flex align-items-start">
                                        <i class="ti ti-map-pin me-2 mt-1"></i>
                                        <span>Jl. Desa Maju No. 123, Kecamatan Harapan, Indonesia</span>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <i class="ti ti-mail me-2 mt-1"></i>
                                        <span>desa@desa-maju.go.id</span>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <i class="ti ti-phone me-2 mt-1"></i>
                                        <span>(021) 9876-5432</span>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <i class="ti ti-clock me-2 mt-1"></i>
                                        <span>Senin - Jumat: 08:00 - 16:00</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <h5 class="text-white mb-4 fw-bold">Informasi</h5>
                                <ul class="list-unstyled footer-link">
                                    <li><a href="#">Kebijakan Privasi</a></li>
                                    <li><a href="#">Syarat & Ketentuan</a></li>
                                    <li><a href="#">Peta Situs</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Karir</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 my-1">
                        <p class="text-white mb-0">
                            <i class="ti ti-copyright me-1"></i>
                            {{ date('Y') }} Pemerintah Desa Maju. Hak Cipta Dilindungi.
                        </p>
                    </div>
                    <div class="col-md-6 my-1 text-md-end">
                        <p class="text-white mb-0 opacity-75">
                            Dibangun dengan ❤️ untuk Kemajuan Desa
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- [ Script JS Default ] -->
    <script src="../assets/js/plugins/popper.min.js"></script>
    <script src="../assets/js/plugins/simplebar.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/fonts/custom-font.js"></script>
    <script src="../assets/js/pcoded.js"></script>
    <script src="../assets/js/plugins/feather.min.js"></script>
    <script src="{{ asset('assets/js/plugins/wow.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js"></script>

    <script>
        // Initialize WOW.js
        new WOW().init();

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Initialize functions
        layout_change('light');
        change_box_container('false');
        layout_rtl_change('false');
        preset_change("preset-1");
        font_change("Inter");

        // Add loading animation
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.querySelector('.loader-bg').style.opacity = '0';
                setTimeout(function() {
                    document.querySelector('.loader-bg').style.display = 'none';
                }, 300);
            }, 1000);
        });
    </script>

</body>

</html>