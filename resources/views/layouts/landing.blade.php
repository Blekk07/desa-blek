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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
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
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">

    <style>
        .navbar {
            transition: background .2s ease-in-out;
        }

        .navbar.default {
            transition: background .2s ease-in-out;
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

    <!-- [ Navbar ] -->
    <nav class="navbar navbar-expand-md navbar-dark top-nav-collapse default py-0">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img width="70" src="{{ asset('assets/images/my/logo-black-tp.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item pe-1">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>
                    <li class="nav-item pe-1">
                        <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="/profil">Profil Desa</a>
                    </li>
                    <li class="nav-item pe-1">
                        <a class="nav-link {{ request()->is('layanan') ? 'active' : '' }}" href="/layanan">Layanan</a>
                    </li>
                    <li class="nav-item pe-1">
                        <a class="nav-link {{ request()->is('pengaduan') ? 'active' : '' }}"
                            href="/pengaduan">Pengaduan</a>
                    </li>

                    @if (auth()->check())
                        <li class="nav-item">
                            <a class="btn btn-primary" href="/myprofile">{{ auth()->user()->name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-primary" href="/login">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Navbar End ] -->

    @yield('content')

    <!-- [ Footer ] -->
    <footer class="footer bg-dark text-white py-4">
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/images/my/logo-black-tp.png') }}" alt="Logo Desa"
                            class="img-fluid mb-3" style="max-width: 200px;">
                        <p class="opacity-75">Sistem Informasi Desa merupakan portal resmi yang menampilkan data,
                            potensi, dan layanan masyarakat dalam rangka mewujudkan desa yang maju, transparan, dan
                            mandiri.</p>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 class="text-white mb-4">Navigasi</h5>
                                <ul class="list-unstyled footer-link">
                                    <li><a href="/">Beranda</a></li>
                                    <li><a href="/profil">Profil Desa</a></li>
                                    <li><a href="/layanan">Layanan Publik</a></li>
                                    <li><a href="/pengaduan">Pengaduan Masyarakat</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <h5 class="text-white mb-4">Kontak Kami</h5>
                                <ul class="list-unstyled footer-link">
                                    <li class="d-flex">
                                        <i class="ti ti-map-pin me-2 mt-1"></i>
                                        <span>Jl. Desa Maju No. 123, Kecamatan Harapan, Indonesia</span>
                                    </li>
                                    <li class="d-flex">
                                        <i class="ti ti-mail me-2 mt-1"></i>
                                        <span>desa@desa-maju.go.id</span>
                                    </li>
                                    <li class="d-flex">
                                        <i class="ti ti-phone me-2 mt-1"></i>
                                        <span>(021) 9876-5432</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <h5 class="text-white mb-4">Tautan Lainnya</h5>
                                <ul class="list-unstyled footer-link">
                                    <li><a href="#">Kebijakan Privasi</a></li>
                                    <li><a href="#">Syarat & Ketentuan</a></li>
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
                    <div class="col my-1">
                        <p class="text-white mb-0">© {{ date('Y') }} Pemerintah Desa Maju. Hak Cipta Dilindungi.</p>
                    </div>
                    <div class="col-auto my-1">
                        <ul class="list-inline footer-sos-link mb-0">
                            <li class="list-inline-item"><a href="#"><i
                                        class="ph-duotone ph-facebook-logo f-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i
                                        class="ph-duotone ph-instagram-logo f-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i
                                        class="ph-duotone ph-youtube-logo f-20"></i></a></li>
                        </ul>
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
        layout_change('light');
        change_box_container('false');
        layout_rtl_change('false');
        preset_change("preset-1");
        font_change("Public-Sans");
    </script>

</body>

</html>
