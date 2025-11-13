@extends('layouts.dashboard')
@section('title', 'Kelola Pengajuan Surat')

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
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Kelola Pengajuan Surat</h2>
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
                            <i class="ti ti-files fs-1"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-white mb-1">Total Pengajuan</h6>
                            <h3 class="text-white mb-0">{{ number_format($totalPengajuan) }}</h3>
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
                            <i class="ti ti-clock fs-1"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-white mb-1">Menunggu</h6>
                            <h3 class="text-white mb-0">{{ number_format($pending) }}</h3>
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
                            <i class="ti ti-refresh fs-1"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-white mb-1">Diproses</h6>
                            <h3 class="text-white mb-0">{{ number_format($diproses) }}</h3>
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
                            <i class="ti ti-check fs-1"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-white mb-1">Selesai</h6>
                            <h3 class="text-white mb-0">{{ number_format($selesai) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.pengajuan-surat.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Filter Status</label>
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Filter Jenis Surat</label>
                        <select name="jenis_surat" class="form-select">
                            <option value="">Semua Jenis</option>
                            <option value="Surat Keterangan Domisili" {{ request('jenis_surat') == 'Surat Keterangan Domisili' ? 'selected' : '' }}>Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Tidak Mampu" {{ request('jenis_surat') == 'Surat Keterangan Tidak Mampu' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu</option>
                            <option value="Surat Keterangan Usaha" {{ request('jenis_surat') == 'Surat Keterangan Usaha' ? 'selected' : '' }}>Surat Keterangan Usaha</option>
                            <option value="Surat Pengantar KTP" {{ request('jenis_surat') == 'Surat Pengantar KTP' ? 'selected' : '' }}>Surat Pengantar KTP</option>
                            <option value="Surat Pengantar KK" {{ request('jenis_surat') == 'Surat Pengantar KK' ? 'selected' : '' }}>Surat Pengantar KK</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-filter"></i> Terapkan Filter
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Pengajuan Surat -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Daftar Pengajuan Surat</h5>
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
                            <th>No.</th>
                            <th>Pemohon</th>
                            <th>Jenis Surat</th>
                            <th>NIK</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengajuanSurat as $item)
                        <tr>
                            <td><strong>#{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}</strong></td>
                            <td>
                                <strong>{{ $item->nama_lengkap }}</strong>
                                <br>
                                <small class="text-muted">{{ $item->user->email }}</small>
                            </td>
                            <td>{{ $item->jenis_surat }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>
                                <span class="badge {{ $item->status_badge }}">
                                    {{ $item->status_text }}
                                </span>
                            </td>
                            <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.pengajuan-surat.show', $item->id) }}" 
                                       class="btn btn-sm btn-info" title="Detail">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.pengajuan-surat.destroy', $item->id) }}" 
                                          method="POST" style="display:inline;" 
                                          onsubmit="return confirm('Yakin ingin menghapus pengajuan ini?')">
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
                    Menampilkan {{ $pengajuanSurat->firstItem() }} - {{ $pengajuanSurat->lastItem() }} 
                    dari {{ $pengajuanSurat->total() }} data
                </div>
                <div>
                    {{ $pengajuanSurat->links() }}
                </div>
            </div>
            @else
            <div class="text-center py-5">
                <i class="ti ti-file-text fs-1 text-muted mb-3"></i>
                <p class="text-muted">Belum ada pengajuan surat</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection