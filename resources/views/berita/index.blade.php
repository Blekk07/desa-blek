@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<section class="page-header py-5 bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="h2 fw-bold mb-1">Berita & Pengumuman</h1>
                <p class="text-muted mb-0">Informasi terbaru dari Desa Bangah.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @foreach($beritas as $b)
                <div class="col-12 col-md-6">
                    <article class="bg-white rounded shadow-sm overflow-hidden h-100 d-flex flex-column">
                        @if($b->gambar)
                            <div class="overflow-hidden" style="height:220px;">
                                <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->judul }}" class="w-100 h-100" style="object-fit:cover;">
                            </div>
                        @endif
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h3 class="h5 mb-1"><a href="{{ route('berita.show', $b) }}" class="stretched-link text-decoration-none text-dark">{{ $b->judul }}</a></h3>
                            <div class="text-muted small mb-2">{{ $b->published_at ? $b->published_at->format('d M Y') : 'Draft' }} • {{ $b->user?->name ?? '-' }}</div>
                            <p class="text-muted mb-3">{{ Str::limit(strip_tags($b->konten), 140) }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('berita.show', $b) }}" class="text-primary fw-bold">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $beritas->links() }}
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Make navbar transparent on Berita list page to match landing hero style
    document.addEventListener('DOMContentLoaded', function() {
        var navbar = document.getElementById('mainNavbar');
        if (navbar) {
            navbar.dataset.autotransparent = 'true';
            navbar.classList.add('transparent');
        }
    });
</script>
@endpush
