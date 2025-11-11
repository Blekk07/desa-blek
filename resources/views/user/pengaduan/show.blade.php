@extends('layouts.dashboard')
@section('title', 'Detail Pengaduan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Detail Pengaduan</h5>
                <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                @if($pengaduan)
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Judul Pengaduan</th>
                                <td>{{ $pengaduan->judul }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge 
                                        @if($pengaduan->status == 'pending') bg-warning 
                                        @elseif($pengaduan->status == 'diproses') bg-primary
                                        @else bg-success @endif
                                    ">
                                        {{ ucfirst($pengaduan->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Dibuat</th>
                                <td>{{ $pengaduan->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diupdate</th>
                                <td>{{ $pengaduan->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6>Deskripsi Pengaduan:</h6>
                    <div class="border p-3 rounded bg-light">
                        @if($pengaduan->deskripsi)
                            {{ $pengaduan->deskripsi }}
                        @elseif($pengaduan->isi)
                            {{ $pengaduan->isi }}
                        @else
                            <em class="text-muted">Tidak ada deskripsi</em>
                        @endif
                    </div>
                </div>
                @else
                <div class="alert alert-danger">
                    Pengaduan tidak ditemukan.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection