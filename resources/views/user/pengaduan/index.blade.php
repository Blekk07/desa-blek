@extends('layouts.dashboard')
@section('title', 'Pengaduan Saya')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Pengaduan</li>
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
                        <h5 class="card-title">
                            <i class="ti ti-list-check"></i> Daftar Pengaduan Saya
                        </h5>
                        <a href="{{ route('pengaduan.create') }}" class="btn btn-primary btn-sm">
                            <i class="ti ti-plus"></i> Buat Pengaduan Baru
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="ti ti-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($pengaduan->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Judul Pengaduan</th>
                                    <th>Kategori</th>
                                    <th>Prioritas</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengaduan as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <strong>{{ $item->judul }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($item->uraian_kejadian ?? $item->deskripsi ?? $item->isi, 50) }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $item->kategori ?? '-' }}</span>
                                    </td>
                                    <td>
                                        @if($item->prioritas == 'Sangat Urgent')
                                            <span class="badge bg-danger">{{ $item->prioritas }}</span>
                                        @elseif($item->prioritas == 'Tinggi')
                                            <span class="badge bg-warning">{{ $item->prioritas }}</span>
                                        @elseif($item->prioritas == 'Sedang')
                                            <span class="badge bg-info">{{ $item->prioritas }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $item->prioritas ?? 'Sedang' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == 'pending')
                                            <span class="badge bg-warning">
                                                <i class="ti ti-clock"></i> Menunggu
                                            </span>
                                        @elseif($item->status == 'diproses')
                                            <span class="badge bg-primary">
                                                <i class="ti ti-hourglass"></i> Diproses
                                            </span>
                                        @elseif($item->status == 'selesai')
                                            <span class="badge bg-success">
                                                <i class="ti ti-check-circle"></i> Selesai
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($item->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small>{{ $item->created_at->format('d/m/Y') }}</small>
                                    </td>
                                    <td>
                                        <a href="{{ route('pengaduan.show', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="ti ti-eye"></i> Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5">
                        <i class="ti ti-inbox" style="font-size: 48px; color: #ccc;"></i>
                        <p class="text-muted mt-3 mb-4">Belum ada pengaduan</p>
                        <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus"></i> Buat Pengaduan Pertama
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}

.breadcrumb {
    margin-bottom: 1rem;
}
</style>
@endsection