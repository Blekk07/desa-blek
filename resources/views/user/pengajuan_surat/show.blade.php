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
                        <li class="breadcrumb-item"><a href="{{ route('user.pengajuan-surat.index') }}">Pengajuan Surat</a></li>
                        <li class="breadcrumb-item" aria-current="page">Detail</li>
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
                        <h5>Detail Pengajuan Surat</h5>
                        <a href="{{ route('user.pengajuan-surat.index') }}" class="btn btn-secondary btn-sm">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
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
                            <h6 class="text-primary mb-3"><i class="ti ti-message"></i> Catatan dari Admin</h6>
                            <div class="alert alert-info">
                                {{ $pengajuan->catatan_admin }}
                            </div>
                            @endif

                            @if($pengajuan->status == 'selesai')
                            <div class="alert alert-success">
                                <h6><i class="ti ti-check"></i> Surat Sudah Selesai!</h6>
                                <p class="mb-2">Surat Anda telah selesai diproses. Silakan download surat di bawah ini:</p>
                                @if($pengajuan->file_surat)
                                    <a href="{{ asset('storage/' . $pengajuan->file_surat) }}" class="btn btn-success btn-sm" target="_blank">
                                        <i class="ti ti-download"></i> Download Surat
                                    </a>
                                @endif

                                <a href="{{ route('user.pengajuan-surat.print', $pengajuan->id) }}" class="btn btn-primary btn-sm ms-2">
                                    <i class="ti ti-printer"></i> Cetak / Download PDF
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection