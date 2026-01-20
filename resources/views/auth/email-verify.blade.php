@extends('layouts.landing')

@section('title', 'Verifikasi Email')

@section('content')
<main class="site-main">
    <!-- Page Header -->
    <section class="page-header py-5 bg-light border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-6 fw-bold text-dark mb-2">Verifikasi Email</h1>
                    <p class="text-muted mb-0 lead">Verifikasi alamat email Anda untuk melanjutkan ke dashboard.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Verification Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card h-100 border-0 shadow-sm hover-shadow">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="ti ti-mail text-primary" style="font-size: 4rem;"></i>
                            </div>

                            <h3 class="card-title h4 mb-3 text-dark">Verifikasi Email Anda</h3>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="alert alert-info border-0 mb-4">
                                <p class="mb-2">Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.</p>
                                <p class="mb-0">Jika Anda tidak menerima email, kami dapat mengirim ulang.</p>
                            </div>

                            <p class="text-muted mb-4">
                                Link verifikasi telah dikirim ke: <strong>{{ auth()->user()->email }}</strong>
                            </p>

                            <div class="d-flex justify-content-center">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="ti ti-send me-1"></i>Kirim Ulang Email Verifikasi
                                    </button>
                                </form>
                            </div>

                            @if (session('resent'))
                                <div class="alert alert-success border-0 mt-4">
                                    <i class="ti ti-check me-2"></i>Link verifikasi baru telah dikirim ke email Anda.
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger border-0 mt-4">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
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

@endsection
