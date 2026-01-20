@extends('layouts.landing')

@section('title', 'Email Berhasil Diverifikasi')

@section('content')
<main class="site-main">
    <!-- Page Header -->
    <section class="page-header py-5 bg-light border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-6 fw-bold text-dark mb-2">Verifikasi Berhasil</h1>
                    <p class="text-muted mb-0 lead">Email Anda telah berhasil diverifikasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Verification Success Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card h-100 border-0 shadow-sm hover-shadow">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="ti ti-check-circle text-success" style="font-size: 4rem;"></i>
                            </div>

                            <h3 class="card-title h4 mb-3 text-dark">Email Berhasil Diverifikasi!</h3>

                            <div class="alert alert-success border-0 mb-4">
                                <h5 class="alert-heading mb-2">
                                    <i class="ti ti-mail-check me-2"></i>Selamat!
                                </h5>
                                <p class="mb-0">Email Anda <strong>{{ auth()->user()->email }}</strong> telah berhasil diverifikasi. Sekarang Anda dapat mengakses semua fitur dashboard.</p>
                            </div>

                            <p class="text-muted mb-4">
                                Anda akan diarahkan ke dashboard dalam beberapa detik...
                            </p>

                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary px-4">
                                    <i class="ti ti-dashboard me-1"></i>Lanjut ke Dashboard
                                </a>

                                <a href="{{ route('home') }}" class="btn btn-outline-secondary px-4">
                                    <i class="ti ti-home me-1"></i>Kembali ke Beranda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.hover-shadow:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    transform: translateY(-2px);
    transition: all 0.3s ease;
}
</style>

<script>
    // Auto redirect to dashboard after 5 seconds
    setTimeout(function() {
        window.location.href = '{{ url("/dashboard") }}';
    }, 5000);
</script>

@endsection