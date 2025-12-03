@extends('layouts.dashboard')
@section('title', 'Detail Pengaduan')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengaduan.index') }}">Pengaduan</a></li>
                        <li class="breadcrumb-item" aria-current="page">Detail Pengaduan</li>
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
                        <h5 class="card-title">Detail Pengaduan</h5>
                        <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary btn-sm">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($pengaduan)
                    <!-- Status Section -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="alert alert-light border">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 class="mb-2">{{ $pengaduan->judul }}</h6>
                                        <small class="text-muted">
                                            Dibuat: {{ $pengaduan->created_at->format('d F Y H:i') }} 
                                            | 
                                            Diupdate: {{ $pengaduan->updated_at->format('d F Y H:i') }}
                                        </small>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <span class="badge 
                                            @if($pengaduan->status == 'pending') bg-warning 
                                            @elseif($pengaduan->status == 'diproses') bg-primary
                                            @else bg-success @endif
                                        ">
                                            <i class="ti ti-check-circle"></i> {{ ucfirst($pengaduan->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Laporan Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-primary mb-3">
                                <i class="ti ti-info-circle"></i> Detail Laporan
                            </h6>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="30%" class="fw-bold">Kategori</td>
                                        <td>
                                            <span class="badge bg-info">{{ $pengaduan->kategori ?? '-' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Prioritas</td>
                                        <td>
                                            @if($pengaduan->prioritas == 'Sangat Urgent')
                                                <span class="badge bg-danger">{{ $pengaduan->prioritas ?? '-' }}</span>
                                            @elseif($pengaduan->prioritas == 'Tinggi')
                                                <span class="badge bg-warning">{{ $pengaduan->prioritas ?? '-' }}</span>
                                            @elseif($pengaduan->prioritas == 'Sedang')
                                                <span class="badge bg-info">{{ $pengaduan->prioritas ?? '-' }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $pengaduan->prioritas ?? '-' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tanggal & Waktu Kejadian</td>
                                        <td>{{ $pengaduan->tanggal_waktu_kejadian ? $pengaduan->tanggal_waktu_kejadian->format('d F Y H:i') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Lokasi Kejadian</td>
                                        <td>{{ $pengaduan->lokasi_kejadian ?? '-' }}</td>
                                    </tr>
                                    @if($pengaduan->kecamatan)
                                    <tr>
                                        <td class="fw-bold">Kecamatan</td>
                                        <td>{{ $pengaduan->kecamatan }}</td>
                                    </tr>
                                    @endif
                                    @if($pengaduan->desa)
                                    <tr>
                                        <td class="fw-bold">Desa/Kelurahan</td>
                                        <td>{{ $pengaduan->desa }}</td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Uraian Kejadian Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-primary mb-3">
                                <i class="ti ti-list-details"></i> Uraian Laporan / Kronologi Kejadian
                            </h6>
                            <div class="border p-3 rounded bg-light">
                                {{ $pengaduan->uraian_kejadian ?? $pengaduan->deskripsi ?? $pengaduan->isi ?? '-' }}
                            </div>
                        </div>
                    </div>

                    <!-- Lampiran Section -->
                    @if($pengaduan->lampiran && is_array($pengaduan->lampiran) && count($pengaduan->lampiran) > 0)
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-primary mb-3">
                                <i class="ti ti-paperclip"></i> Lampiran Pendukung
                            </h6>
                            <div class="list-group">
                                @foreach($pengaduan->lampiran as $file)
                                <a href="{{ asset('storage/' . $file) }}" target="_blank" class="list-group-item list-group-item-action">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-file mr-3"></i>
                                        <div class="flex-grow-1">
                                            <p class="mb-0"><strong>{{ basename($file) }}</strong></p>
                                            <small class="text-muted">Klik untuk membuka/download</small>
                                        </div>
                                        <i class="ti ti-download"></i>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    @else
                    <div class="alert alert-danger">
                        <i class="ti ti-alert-circle"></i> Pengaduan tidak ditemukan.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.fw-bold {
    font-weight: 600;
}

.table-borderless td {
    padding: 0.75rem 0;
    border-bottom: 1px solid #dee2e6;
}

.table-borderless tr:last-child td {
    border-bottom: none;
}

.list-group-item {
    transition: all 0.2s ease;
}

.list-group-item:hover {
    background-color: #f8f9fa;
    text-decoration: none;
}

.mr-3 {
    margin-right: 1rem;
}
</style>
@endsection