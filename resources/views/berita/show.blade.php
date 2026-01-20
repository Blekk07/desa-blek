@extends('layouts.landing')

@section('title', $berita->judul)

@section('content')
<main class="site-main">
    <style>
        :root { --primary: #0052d4; --accent: #6a11cb; --muted: #6c757d; --card-radius: 12px; }

        /* Page Header */
        .page-header { padding: 60px 0; background: linear-gradient(135deg, rgba(58,123,213,0.92) 0%, rgba(123,58,213,0.85) 100%); color: #fff; position: relative; overflow: hidden; }
        .page-header .container { position: relative; z-index: 2; }
        .page-title { font-size: 2rem; line-height: 1.2; text-shadow: 0 4px 12px rgba(0,0,0,0.3); margin-bottom: 8px; }
        .page-subtitle { opacity: 0.9; font-size: 1.1rem; }

        /* Article Content */
        .article-content { background: #fff; border-radius: var(--card-radius); box-shadow: 0 4px 20px rgba(0,0,0,0.08); overflow: hidden; }
        .article-header { padding: 40px; background: linear-gradient(135deg, #f8fbff 0%, #ffffff 100%); border-bottom: 1px solid #e9ecef; }
        .article-title { font-size: 2.2rem; font-weight: 700; color: #2d3748; margin-bottom: 16px; line-height: 1.3; }
        .article-meta { display: flex; flex-wrap: wrap; gap: 16px; font-size: 0.95rem; color: var(--muted); }
        .article-meta-item { display: flex; align-items: center; gap: 6px; }

        .article-body { padding: 40px; }
        .article-image { margin-bottom: 32px; text-align: center; }
        .article-image img { max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); }
        .article-image figcaption { margin-top: 12px; font-style: italic; color: var(--muted); font-size: 0.9rem; }

        .article-text { font-size: 1.1rem; line-height: 1.7; color: #4a5568; margin-bottom: 40px; }

        /* Sidebar */
        .article-sidebar { background: #f8fbff; border-radius: var(--card-radius); padding: 32px; margin-top: 40px; }
        .sidebar-title { font-size: 1.3rem; font-weight: 600; color: #2d3748; margin-bottom: 24px; display: flex; align-items: center; gap: 8px; }
        .recent-news-item { background: #fff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin-bottom: 16px; transition: all 0.2s ease; }
        .recent-news-item:hover { border-color: var(--primary); box-shadow: 0 4px 12px rgba(0,82,212,0.1); transform: translateY(-2px); }
        .recent-news-title { font-weight: 600; color: #2d3748; margin-bottom: 8px; font-size: 1rem; }
        .recent-news-meta { font-size: 0.85rem; color: var(--muted); display: flex; align-items: center; gap: 4px; }

        /* Navigation */
        .article-navigation { padding: 32px 40px; background: #f8fbff; border-top: 1px solid #e9ecef; }
        .back-link { color: var(--primary); font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.2s ease; }
        .back-link:hover { color: #2b6cb0; }

        @media (max-width: 768px) {
            .page-title { font-size: 1.6rem; }
            .article-header, .article-body, .article-navigation { padding: 24px; }
            .article-title { font-size: 1.8rem; }
            .article-meta { flex-direction: column; gap: 8px; }
        }
    </style>

    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                    <h1 class="page-title">{{ $berita->judul }}</h1>
                    <p class="page-subtitle">Berita & Pengumuman Desa Bangah</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <article class="article-content">
                        <header class="article-header">
                            <h1 class="article-title">{{ $berita->judul }}</h1>
                            <div class="article-meta">
                                <div class="article-meta-item">
                                    <i class="ti ti-calendar"></i>
                                    <span>{{ $berita->published_at ? $berita->published_at->format('d M Y') : 'Draft' }}</span>
                                </div>
                                <div class="article-meta-item">
                                    <i class="ti ti-user"></i>
                                    <span>{{ $berita->user?->name ?? '-' }}</span>
                                </div>
                            </div>
                        </header>

                        <div class="article-body">
                            @if($berita->gambar)
                                @php
                                    $imgSrc = str_starts_with($berita->gambar, 'http') ? $berita->gambar : (str_starts_with($berita->gambar, 'assets/') ? asset($berita->gambar) : asset('storage/' . $berita->gambar));
                                @endphp
                                <figure class="article-image">
                                    <img src="{{ $imgSrc }}" alt="{{ $berita->judul }}">
                                    @if(!empty($berita->caption))
                                        <figcaption>{{ $berita->caption }}</figcaption>
                                    @endif
                                </figure>
                            @endif

                            <div class="article-text">
                                {!! $berita->konten !!}
                            </div>

                            <aside class="article-sidebar">
                                <h3 class="sidebar-title">
                                    <i class="ti ti-news"></i>
                                    Berita Terbaru Lainnya
                                </h3>
                                @if($recentBeritas->count() > 0)
                                    @foreach($recentBeritas as $r)
                                        <a href="{{ route('berita.show', $r) }}" class="recent-news-item text-decoration-none">
                                            <h4 class="recent-news-title">{{ $r->judul }}</h4>
                                            <div class="recent-news-meta">
                                                <i class="ti ti-calendar"></i>
                                                <span>{{ $r->published_at ? $r->published_at->format('d M Y') : 'Draft' }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <div class="text-center py-4">
                                        <i class="ti ti-news-off display-6 text-muted mb-3"></i>
                                        <p class="text-muted">Belum ada berita lainnya</p>
                                    </div>
                                @endif
                            </aside>
                        </div>

                        <footer class="article-navigation">
                            <a href="{{ route('berita.index') }}" class="back-link">
                                Kembali ke Daftar Berita
                            </a>
                        </footer>
                    </article>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
