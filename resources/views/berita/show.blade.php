@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<article class="prose max-w-none">
    <header class="mb-6">
        <h1 class="text-2xl font-bold">{{ $berita->judul }}</h1>
        <div class="text-sm text-gray-500">{{ $berita->published_at ? $berita->published_at->format('d M Y') : 'Draft' }} • {{ $berita->user?->name ?? '-' }}</div>
    </header>

    @if($berita->gambar)
        <div class="mb-6">
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full rounded">
        </div>
    @endif

    <div class="content mb-8">{!! $berita->konten !!}</div>

    <aside class="mt-8">
        <h4 class="text-lg font-semibold mb-3">Berita Terbaru</h4>
        <ul class="list-disc ml-5 text-sm text-gray-700">
            @foreach($recentBeritas as $r)
                <li class="mb-1"><a href="{{ route('berita.show', $r) }}" class="text-blue-600 hover:underline">{{ $r->judul }}</a></li>
            @endforeach
        </ul>
    </aside>
</article>

@endsection

@push('scripts')
<script>
    // Make navbar transparent on Berita detail page to match landing hero style
    document.addEventListener('DOMContentLoaded', function() {
        var navbar = document.getElementById('mainNavbar');
        if (navbar) {
            navbar.dataset.autotransparent = 'true';
            navbar.classList.add('transparent');
        }
    });
</script>
@endpush
