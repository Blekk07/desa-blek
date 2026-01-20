@extends('layouts.dashboard')
@section('title', 'Detail Berita')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Manajemen Berita</a></li>
                        <li class="breadcrumb-item" aria-current="page">Detail Berita</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Detail Berita</h5>
                        <div>
                            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-warning btn-sm">
                                <i class="ti ti-edit"></i> Edit
                            </a>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary btn-sm">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Informasi Berita -->
                        <div class="col-md-8">
                            <h3 class="mb-3">{{ $berita->judul }}</h3>

                            @if($berita->gambar)
                                <div class="mb-4">
                                    <img src="{{ str_starts_with($berita->gambar, 'assets/') ? asset($berita->gambar) : asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid rounded">
                                </div>
                            @endif

                            <div class="berita-content">
                                {!! nl2br(e($berita->konten)) !!}
                            </div>
                        </div>

                        <!-- Sidebar Informasi -->
                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0"><i class="ti ti-info-circle"></i> Informasi Berita</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless table-sm">
                                        <tr>
                                            <td class="text-muted">Status</td>
                                            <td>
                                                @if($berita->published_at)
                                                    <span class="badge bg-success">
                                                        <i class="ti ti-eye"></i> Published
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning">
                                                        <i class="ti ti-eye-off"></i> Draft
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Penulis</td>
                                            <td>{{ $berita->user?->name ?? 'Unknown' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Dibuat</td>
                                            <td>{{ $berita->created_at->format('d F Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Diupdate</td>
                                            <td>{{ $berita->updated_at->format('d F Y H:i') }}</td>
                                        </tr>
                                        @if($berita->published_at)
                                        <tr>
                                            <td class="text-muted">Dipublikasikan</td>
                                            <td>{{ $berita->published_at->format('d F Y H:i') }}</td>
                                        </tr>
                                        @endif
                                    </table>

                                    <hr>

                                    <div class="d-grid gap-2">
                                        <form action="{{ route('admin.berita.publish', $berita) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $berita->published_at ? 'btn-outline-secondary' : 'btn-success' }} w-100">
                                                <i class="ti {{ $berita->published_at ? 'ti-eye-off' : 'ti-eye' }}"></i>
                                                {{ $berita->published_at ? 'Unpublish' : 'Publish' }}
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                                <i class="ti ti-trash"></i> Hapus Berita
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.berita-content {
    line-height: 1.8;
    font-size: 1.1rem;
}
.berita-content img {
    max-width: 100%;
    height: auto;
    margin: 1rem 0;
    border-radius: 8px;
}
</style>
@endsection