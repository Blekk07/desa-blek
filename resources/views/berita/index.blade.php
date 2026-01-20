@extends('layouts.landing')

@section('title', 'Berita')

@section('content')
<main class="site-main">
    <!-- Page Header -->
    <section class="page-header py-5 bg-light border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-6 fw-bold text-dark mb-2">Berita & Pengumuman</h1>
                    <p class="text-muted mb-0 lead">Informasi terbaru dan pengumuman penting dari Desa Bangah.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita List -->
    <section class="py-5">
        <div class="container">
            @if($beritas->count() > 0)
                <div class="row g-4">
                    @foreach($beritas as $b)
                        <div class="col-12 col-md-6 col-lg-4">
                            <article class="card h-100 border-0 shadow-sm hover-shadow">
                                @if($b->gambar)
                                    @php
                                        $imgSrc = str_starts_with($b->gambar, 'http') ? $b->gambar : (str_starts_with($b->gambar, 'assets/') ? asset($b->gambar) : asset('storage/' . $b->gambar));
                                    @endphp
                                    <div class="card-img-wrapper overflow-hidden" style="height: 200px;">
                                        <img src="{{ $imgSrc }}" alt="{{ $b->judul }}" class="card-img-top object-fit-cover w-100 h-100">
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h3 class="card-title h6 mb-2">
                                        {{ $b->judul }}
                                    </h3>
                                    <div class="text-muted small mb-2">
                                        {{ $b->published_at ? $b->published_at->format('d M Y') : 'Draft' }} • {{ $b->user?->name ?? '-' }}
                                    </div>
                                    <div class="card-text text-muted small flex-grow-1">
                                        {!! $b->konten !!}
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <nav class="mt-5 d-flex justify-content-center" aria-label="Berita pagination">
                    {{ $beritas->links('pagination::bootstrap-5') }}
                </nav>
            @else
                <div class="text-center py-5">
                    <i class="ti ti-news-off display-1 text-muted mb-3"></i>
                    <h3 class="text-muted">Belum ada berita</h3>
                    <p class="text-muted">Berita akan segera dipublikasikan.</p>
                </div>
            @endif
        </div>
    </section>
</main>

<style>
.hover-shadow:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    transform: translateY(-2px);
    transition: all 0.3s ease;
}
.card-img-wrapper {
    position: relative;
}
.object-fit-cover {
    object-fit: cover;
}
</style>

@endsection
