@extends('layouts.landing')

@section('title', $berita->judul)

@section('content')
<header id="home">
    <div class="header-bg-container"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="hero-title fw-bold mb-1">{{ $berita->judul }}</h1>
                <p class="hero-subtitle mb-0">{{ $berita->published_at ? $berita->published_at->format('d M Y') : 'Draft' }} • {{ $berita->user?->name ?? '-' }}</p>
            </div>
        </div>
    </div>
</header>

<article class="prose max-w-none mt-4"> 

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
