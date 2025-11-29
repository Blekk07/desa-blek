@extends('layouts.dashboard')
@section('title', 'Pengajuan Surat')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Pengajuan Surat</li>
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
                        <h5 class="mb-0">Daftar Pengajuan Surat</h5>
                        <a href="{{ route('user.pengajuan-surat.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus"></i> Ajukan Surat Baru
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

                    @if($pengajuanSurat->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No. Pengajuan</th>
                                    <th>Jenis Surat</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengajuanSurat as $item)
                                <tr>
                                    <td><strong>#{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}</strong></td>
                                    <td>{{ $item->jenis_surat }}</td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td>
                                        <span class="badge {{ $item->status_badge }}">
                                            {{ $item->status_text }}
                                        </span>
                                    </td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('user.pengajuan-surat.show', $item->id) }}" 
                                           class="btn btn-sm btn-info" title="Detail">
                                            <i class="ti ti-eye"></i> Detail
                                        </a>

                                        @if($item->status == 'selesai')
                                            @if($item->file_surat)
                                                <a href="{{ asset('storage/' . $item->file_surat) }}" class="btn btn-sm btn-success ms-1" title="Download Surat" target="_blank">
                                                    <i class="ti ti-download"></i>
                                                </a>
                                            @endif

                                            <a href="{{ route('user.pengajuan-surat.print', $item->id) }}" class="btn btn-sm btn-primary ms-1" title="Cetak / Download PDF">
                                                <i class="ti ti-printer"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5">
                        <i class="ti ti-file-text fs-1 text-muted mb-3"></i>
                        <p class="text-muted">Belum ada pengajuan surat</p>
                        <a href="{{ route('user.pengajuan-surat.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus"></i> Ajukan Surat Pertama
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection