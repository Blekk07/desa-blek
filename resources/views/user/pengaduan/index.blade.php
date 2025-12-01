@extends('layouts.dashboard')
@section('title', 'Pengaduan Saya')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Daftar Pengaduan</h5>
                <a href="{{ route('pengaduan.create') }}" class="btn btn-primary btn-sm float-end">
                    <i class="fas fa-plus"></i> Buat Pengaduan Baru
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($pengaduan->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Judul Pengaduan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduan as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <td>
                                    <span class="badge 
                                        @if($item->status == 'pending') bg-warning 
                                        @elseif($item->status == 'diproses') bg-primary
                                        @else bg-success @endif
                                    ">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('pengaduan.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada pengaduan</p>
                    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus"></i> Buat Pengaduan Pertama
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection