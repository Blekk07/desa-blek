@extends('layouts.dashboard')
@section('title', 'Manajemen Berita')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Manajemen Berita</li>
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
                        <h5>Manajemen Berita</h5>
                        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm">
                            <i class="ti ti-plus"></i> Buat Berita Baru
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="ti ti-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th>Penulis</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($beritas as $berita)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0">{{ Str::limit($berita->judul, 50) }}</h6>
                                                <small class="text-muted">{{ Str::limit(strip_tags($berita->konten), 100) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($berita->gambar)
                                            <img src="{{ str_starts_with($berita->gambar, 'assets/') ? asset($berita->gambar) : asset('storage/' . $berita->gambar) }}" alt="Gambar" class="rounded" width="60" height="40" style="object-fit: cover;">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
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
                                    <td>{{ $berita->user?->name ?? 'Unknown' }}</td>
                                    <td>{{ $berita->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.berita.show', $berita) }}" class="btn btn-sm btn-info" title="Lihat">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.berita.publish', $berita) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm {{ $berita->published_at ? 'btn-secondary' : 'btn-success' }}" title="{{ $berita->published_at ? 'Unpublish' : 'Publish' }}">
                                                    <i class="ti {{ $berita->published_at ? 'ti-eye-off' : 'ti-eye' }}"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <i class="ti ti-news-off text-muted" style="font-size: 3rem;"></i>
                                        <h6 class="text-muted mt-2">Belum ada berita</h6>
                                        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="ti ti-plus"></i> Buat Berita Pertama
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $beritas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
