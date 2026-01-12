@extends('layouts.landing')

@section('title', 'Hubungi Kami')

@section('content')

    <header id="home" class="d-flex align-items-center">
        <!-- Background container with desktop/mobile/fallback layers -->
        <div class="header-bg-container">
            <div class="header-bg-desktop" style="background-image: url('{{ asset('assets/images/my/gedung-sekolah.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
            <div class="header-bg-mobile" style="background-image: url('{{ asset('assets/images/my/gedung-sekolah.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
            <div class="header-bg-fallback" style="background: linear-gradient(135deg, rgba(58,123,213,0.92) 0%, rgba(123,58,213,0.85) 100%);"></div>
        </div>

        <!-- Animated overlay and particles (same behavior as welcome) -->
        <div class="animated-bg-overlay"></div>
        <div class="particles-container" id="particles-js"></div>

        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                    <div class="hero-content-wrapper">
                        <h1 class="mt-sm-3 text-white mb-4 f-w-600 hero-title">
                            Hubungi Kami
                            <br>
                            <span class="text-warning typed-text" data-typed-items="Layanan Publik, Informasi Desa, Dukungan Masyarakat"></span>
                        </h1>
                        <h5 class="mb-4 text-white opacity-75 hero-subtitle">Silakan hubungi kami untuk pertanyaan, informasi, atau bantuan terkait layanan dan layanan publik desa. Kami siap membantu.</h5>
                        <div class="my-5 hero-buttons">
                            <a href="/login" class="btn btn-primary btn-lg animated-btn">
                                <span>Login</span>
                                <i class="ti ti-login ms-2"></i>
                            </a>
                            <a href="/register" class="btn btn-outline-light btn-lg animated-btn">
                                <span>Daftar</span>
                                <i class="ti ti-user-plus ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator">
            <div class="scroll-line"></div>
            <span>Scroll</span>
        </div>
    </header>

    <section class="contact-form">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-xl-5 mb-4">
                    <h5 class="text-primary mb-0">Tetap Terhubung</h5>
                    <h2 class="my-3">Kirim Pesan Anda</h2>
                    <p class="text-muted">Kami siap membantu menjawab setiap pertanyaan Anda. Silakan isi formulir di bawah
                        ini.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-md-8 col-sm-10">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <input name="subject" value="{{ old('subject') }}" type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subjek Pesan">
                                @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <textarea name="message" class="form-control form-control-lg @error('message') is-invalid @enderror" rows="4" placeholder="Tuliskan pesan Anda di sini...">{{ old('message') }}</textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-check mt-3 text-start">
                            <label class="switch-label-inline">
                                <span class="switch">
                                    <input type="checkbox" id="flexCheckChecked" checked>
                                    <span class="switch-slider"></span>
                                </span>
                                <span class="form-check-label">Saya setuju dengan <a href="#" class="link-primary"> Kebijakan Privasi</a>.</span>
                            </label>
                        </div>
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection
