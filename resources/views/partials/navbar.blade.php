<nav class="navbar navbar-expand-md navbar-light fixed-top py-0 bg-white" id="mainNavbar">
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
                    <a class="nav-link {{ request()->is('berita') || request()->is('berita/*') ? 'active' : '' }}" href="{{ route('berita.index') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profile-desa') ? 'active' : '' }}" href="/profile-desa">Profil Desa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('help') ? 'active' : '' }}" href="/help">Bantuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="/contact-us">Kontak</a>
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
