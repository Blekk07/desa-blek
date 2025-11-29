@extends('layouts.dashboard')
@section('title', 'Detail Pengaduan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Detail Pengaduan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <td width="25%" class="text-muted">Nama Pelapor</td>
                            <td>{{ $pengaduan->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Judul Pengaduan</td>
                            <td>{{ $pengaduan->judul }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Status</td>
                            <td>
                                <span class="badge ">
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Tanggal Dibuat</td>
                            <td>{{ $pengaduan->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Terakhir Diupdate</td>
                            <td>{{ $pengaduan->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted align-top">Deskripsi</td>
                            <td>
                                @if($pengaduan->deskripsi)
                                    <div class="mb-2">{{ $pengaduan->deskripsi }}</div>
                                @elseif($pengaduan->isi)
                                    <div class="mb-2">{{ $pengaduan->isi }}</div>
                                @else
                                    <em class="text-muted">Tidak ada deskripsi</em>
                                @endif
                            </td>
                        </tr>
                        @if ($pengaduan->foto)
                        <tr>
                            <td class="text-muted">Bukti Foto</td>
                            <td>
                                <a href="{{ asset('storage/' . $pengaduan->foto) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" class="img-fluid rounded shadow" style="max-width:360px;" alt="Bukti Foto">
                                </a>
                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $pengaduan->foto) }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="ti ti-photo"></i> Lihat
                                    </a>
                                    <a href="{{ asset('storage/' . $pengaduan->foto) }}" download class="btn btn-sm btn-success">
                                        <i class="ti ti-download"></i> Unduh
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endif
                    </table>
                </div>

                <hr>

                <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST">
                    @csrf
                    <div class="row g-2 align-items-center">
                        <div class="col-md-4">
                            <label class="form-label">Status Laporan</label>
                            <select name="status" class="form-control">
                                <option value="pending" {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Catatan / Komentar</label>
                            <input type="text" name="catatan_admin" class="form-control" value="{{ $pengaduan->catatan_admin }}" placeholder="(opsional)">
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-primary mt-4">Update Status</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
