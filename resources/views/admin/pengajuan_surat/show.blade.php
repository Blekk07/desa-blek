@extends('layouts.dashboard')
@section('title', 'Detail Pengajuan Surat')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pengajuan-surat.index') }}">Pengajuan Surat</a></li>
                        <li class="breadcrumb-item" aria-current="page">Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Detail Pengajuan -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Detail Pengajuan Surat</h5>
                        <a href="{{ route('admin.pengajuan-surat.index') }}" class="btn btn-secondary btn-sm">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <h6 class="text-primary mb-3"><i class="ti ti-file-text"></i> Informasi Pengajuan</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%" class="text-muted">No. Pengajuan</td>
                                    <td><strong>#{{ str_pad($pengajuan->id, 5, '0', STR_PAD_LEFT) }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Jenis Surat</td>
                                    <td><strong>{{ $pengajuan->jenis_surat }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Status</td>
                                    <td>
                                        <span class="badge {{ $pengajuan->status_badge }}">
                                            {{ $pengajuan->status_text }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Tanggal Pengajuan</td>
                                    <td>{{ $pengajuan->created_at->format('d F Y, H:i') }}</td>
                                </tr>
                                @if($pengajuan->tanggal_selesai)
                                <tr>
                                    <td class="text-muted">Tanggal Selesai</td>
                                    <td>{{ $pengajuan->tanggal_selesai->format('d F Y, H:i') }}</td>
                                </tr>
                                @endif
                            </table>

                            <h6 class="text-primary mb-3 mt-4"><i class="ti ti-user"></i> Data Pemohon</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%" class="text-muted">Nama Lengkap</td>
                                    <td>{{ $pengajuan->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">NIK</td>
                                    <td>{{ $pengajuan->nik }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Email</td>
                                    <td>{{ $pengajuan->user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Alamat</td>
                                    <td>{{ $pengajuan->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">RT / RW</td>
                                    <td>{{ $pengajuan->rt }} / {{ $pengajuan->rw }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">No. Telepon</td>
                                    <td>{{ $pengajuan->no_telepon }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <h6 class="text-primary mb-3"><i class="ti ti-info-circle"></i> Keperluan</h6>
                            <div class="border p-3 rounded bg-light mb-3">
                                {{ $pengajuan->keperluan }}
                            </div>

                            @if($pengajuan->keterangan_tambahan)
                            <h6 class="text-primary mb-3"><i class="ti ti-notes"></i> Keterangan Tambahan</h6>
                            <div class="border p-3 rounded bg-light mb-3">
                                {{ $pengajuan->keterangan_tambahan }}
                            </div>
                            @endif

                            @if($pengajuan->catatan_admin)
                            <h6 class="text-primary mb-3"><i class="ti ti-message"></i> Catatan Admin</h6>
                            <div class="alert alert-info">
                                {{ $pengajuan->catatan_admin }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Tombol Aksi -->
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateStatusModal">
                            <i class="ti ti-edit"></i> Update Status
                        </button>
                        <form action="{{ route('admin.pengajuan-surat.destroy', $pengajuan->id) }}" 
                              method="POST" style="display:inline;" 
                              onsubmit="return confirm('Yakin ingin menghapus pengajuan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="ti ti-trash"></i> Hapus Pengajuan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Status -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="ti ti-timeline"></i> Timeline Status</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-success">
                                        <i class="ti ti-file-plus"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Pengajuan Dibuat</h6>
                                    <p class="text-muted text-sm mb-0">
                                        {{ $pengajuan->created_at->format('d F Y, H:i') }}
                                    </p>
                                </div>
                            </div>
                        </li>

                        @if($pengajuan->status != 'pending')
                        <li class="list-group-item px-0">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-primary">
                                        <i class="ti ti-refresh"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Status Diupdate</h6>
                                    <p class="text-muted text-sm mb-0">
                                        {{ $pengajuan->updated_at->format('d F Y, H:i') }}
                                    </p>
                                    <span class="badge {{ $pengajuan->status_badge }} mt-1">
                                        {{ $pengajuan->status_text }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        @endif

                        @if($pengajuan->status == 'selesai')
                        <li class="list-group-item px-0">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-success">
                                        <i class="ti ti-check"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Surat Selesai</h6>
                                    <p class="text-muted text-sm mb-0">
                                        {{ $pengajuan->tanggal_selesai->format('d F Y, H:i') }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Info Pemohon -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="ti ti-user-circle"></i> Info Pemohon</h5>
                </div>
                <div class="card-body text-center">
                    <img src="{{ $pengajuan->user->avatar ?? asset('assets/images/user/avatar-1.jpg') }}" 
                         alt="avatar" class="img-fluid rounded-circle mb-3" style="width: 80px;">
                    <h5 class="mb-1">{{ $pengajuan->user->name }}</h5>
                    <p class="text-muted text-sm mb-0">{{ $pengajuan->user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Status -->
<div class="modal fade" id="updateStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.pengajuan-surat.update-status', $pengajuan->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Update Status Pengajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="">Pilih Status</option>
                            <option value="pending" {{ $pengajuan->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ $pengajuan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $pengajuan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="ditolak" {{ $pengajuan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Catatan untuk Pemohon</label>
                        <textarea name="catatan_admin" class="form-control" rows="4" 
                                  placeholder="Berikan catatan atau informasi tambahan...">{{ $pengajuan->catatan_admin }}</textarea>
                        <small class="text-muted">Catatan ini akan dilihat oleh pemohon</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-check"></i> Update Status
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- 
TAMBAHKAN DI FILE: resources/views/admin/sidebar.blade.php

<li class="pc-item">
    <a href="{{ route('admin.pengajuan-surat.index') }}" class="pc-link">
        <span class="pc-micon"><i class="ti ti-file-text"></i></span>
        <span class="pc-mtext">Pengajuan Surat</span>
    </a>
</li>
-->