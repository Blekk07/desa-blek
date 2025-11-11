@extends('layouts.dashboard')
@section('title', 'Data Penduduk')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Data Penduduk</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Data Penduduk Desa</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="ti ti-users fs-1"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-white mb-1">Total Penduduk</h6>
                            <h3 class="text-white mb-0">{{ number_format($totalPenduduk) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="ti ti-man fs-1"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-white mb-1">Laki-laki</h6>
                            <h3 class="text-white mb-0">{{ number_format($lakiLaki) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="ti ti-woman fs-1"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-white mb-1">Perempuan</h6>
                            <h3 class="text-white mb-0">{{ number_format($perempuan) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="ti ti-home fs-1"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-white mb-1">Kepala Keluarga</h6>
                            <h3 class="text-white mb-0">{{ number_format($totalKK) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.penduduk.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Cari (NIK/Nama/No KK)</label>
                        <input type="text" name="search" class="form-control" 
                               value="{{ request('search') }}" placeholder="Masukkan NIK, Nama, atau No KK">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="">Semua</option>
                            <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">RT</label>
                        <input type="text" name="rt" class="form-control" 
                               value="{{ request('rt') }}" placeholder="RT">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">RW</label>
                        <input type="text" name="rw" class="form-control" 
                               value="{{ request('rw') }}" placeholder="RW">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-search"></i> Filter
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data Penduduk -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Penduduk</h5>
                <a href="{{ route('admin.penduduk.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i> Tambah Penduduk
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

            @if($penduduk->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Umur</th>
                            <th>RT/RW</th>
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penduduk as $item)
                        <tr>
                            <td>{{ $item->nik }}</td>
                            <td><strong>{{ $item->nama_lengkap }}</strong></td>
                            <td>
                                @if($item->jenis_kelamin == 'Laki-laki')
                                    <span class="badge bg-info">L</span>
                                @else
                                    <span class="badge bg-warning">P</span>
                                @endif
                            </td>
                            <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir->format('d/m/Y') }}</td>
                            <td>{{ $item->umur }} tahun</td>
                            <td>{{ $item->rt }}/{{ $item->rw }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.penduduk.show', $item->id) }}" 
                                       class="btn btn-sm btn-info" title="Detail">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.penduduk.edit', $item->id) }}" 
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.penduduk.destroy', $item->id) }}" 
                                          method="POST" style="display:inline;" 
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    Menampilkan {{ $penduduk->firstItem() }} - {{ $penduduk->lastItem() }} 
                    dari {{ $penduduk->total() }} data
                </div>
                <div>
                    {{ $penduduk->links() }}
                </div>
            </div>
            @else
            <div class="text-center py-5">
                <i class="ti ti-users fs-1 text-muted mb-3"></i>
                <p class="text-muted">Belum ada data penduduk</p>
                <a href="{{ route('admin.penduduk.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i> Tambah Data Pertama
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
