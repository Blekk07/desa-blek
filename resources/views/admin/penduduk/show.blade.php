@extends('layouts.dashboard')
@section('title', 'Detail Data Penduduk')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.penduduk.index') }}">Data Penduduk</a></li>
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
                        <h5>Detail Data Penduduk</h5>
                        <div>
                            <a href="{{ route('admin.penduduk.edit', $penduduk->id) }}" class="btn btn-warning btn-sm">
                                <i class="ti ti-edit"></i> Edit
                            </a>
                            <a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary btn-sm">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <h6 class="text-primary mb-3"><i class="ti ti-user"></i> Data Pribadi</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%" class="text-muted">NIK</td>
                                    <td><strong>{{ $penduduk->nik }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">No. Kartu Keluarga</td>
                                    <td><strong>{{ $penduduk->no_kk ?? '-' }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Nama Lengkap</td>
                                    <td><strong>{{ $penduduk->nama_lengkap }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Tempat, Tanggal Lahir</td>
                                    <td>{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Umur</td>
                                    <td>{{ $penduduk->umur }} Tahun</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Jenis Kelamin</td>
                                    <td>
                                        @if($penduduk->jenis_kelamin == 'Laki-laki')
                                            <span class="badge bg-info">Laki-laki</span>
                                        @else
                                            <span class="badge bg-warning">Perempuan</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Agama</td>
                                    <td>{{ $penduduk->agama }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Status Perkawinan</td>
                                    <td>{{ $penduduk->status_perkawinan }}</td>
                                </tr>
                            </table>

                            <h6 class="text-primary mb-3 mt-4"><i class="ti ti-map-pin"></i> Alamat</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%" class="text-muted">Alamat Lengkap</td>
                                    <td>{{ $penduduk->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">RT / RW</td>
                                    <td>{{ $penduduk->rt }} / {{ $penduduk->rw }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <h6 class="text-primary mb-3"><i class="ti ti-info-circle"></i> Informasi Lainnya</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%" class="text-muted">Pendidikan Terakhir</td>
                                    <td>{{ $penduduk->pendidikan_terakhir ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Pekerjaan</td>
                                    <td>{{ $penduduk->pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Status Kependudukan</td>
                                    <td>
                                        @if($penduduk->status_kependudukan == 'Tetap')
                                            <span class="badge bg-success">Tetap</span>
                                        @elseif($penduduk->status_kependudukan == 'Pendatang')
                                            <span class="badge bg-info">Pendatang</span>
                                        @else
                                            <span class="badge bg-warning">Pindah</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Nama Ayah</td>
                                    <td>{{ $penduduk->nama_ayah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Nama Ibu</td>
                                    <td>{{ $penduduk->nama_ibu ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">No. Telepon</td>
                                    <td>{{ $penduduk->no_telepon ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Keterangan</td>
                                    <td>{{ $penduduk->keterangan ?? '-' }}</td>
                                </tr>
                            </table>

                            <h6 class="text-primary mb-3 mt-4"><i class="ti ti-calendar"></i> Informasi Sistem</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%" class="text-muted">Data Dibuat</td>
                                    <td>{{ $penduduk->created_at->format('d F Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Terakhir Diupdate</td>
                                    <td>{{ $penduduk->updated_at->format('d F Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.penduduk.edit', $penduduk->id) }}" class="btn btn-warning">
                                <i class="ti ti-edit"></i> Edit Data
                            </a>
                            <form action="{{ route('admin.penduduk.destroy', $penduduk->id) }}" 
                                  method="POST" style="display:inline;" 
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="ti ti-trash"></i> Hapus Data
                                </button>
                            </form>
                            <a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
