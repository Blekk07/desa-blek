@extends('layouts.dashboard')
@section('title', 'Detail User')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Manajemen User</a></li>
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
                        <h5>Detail User</h5>
                        <div>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                <i class="ti ti-edit"></i> Edit
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <h6 class="text-primary mb-3"><i class="ti ti-user"></i> Informasi Akun</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%" class="text-muted">Avatar</td>
                                    <td>
                                        <img src="{{ $user->avatar ? asset('assets/images/user/' . $user->avatar) : asset('assets/images/user/avatar-default.jpg') }}" 
                                             class="rounded-circle" width="64" height="64" onerror="this.src='{{ asset('assets/images/user/avatar-default.jpg') }}'">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Nama</td>
                                    <td><strong>{{ $user->name }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">NIK</td>
                                    <td><strong>{{ $user->nik }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Role</td>
                                    <td>
                                        <span class="badge bg-{{ $user->role == 'admin' ? 'primary' : 'success' }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Status</td>
                                    <td>
                                        <span class="badge bg-{{ $user->status == 'active' ? 'success' : 'secondary' }}">
                                            {{ $user->status }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Verified</td>
                                    <td>
                                        @if($user->hasVerifiedEmail())
                                            <span class="badge bg-success"><i class="ti ti-check"></i> Email Verified</span>
                                        @else
                                            <span class="badge bg-warning"><i class="ti ti-alert-circle"></i> Email Not Verified</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            <h6 class="text-primary mb-3 mt-4"><i class="ti ti-calendar"></i> Informasi Sistem</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%" class="text-muted">Terdaftar</td>
                                    <td>{{ optional($user->created_at)->format('d F Y H:i') ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Terakhir Login</td>
                                    <td>{{ optional($user->updated_at)->format('d F Y H:i') ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            @if($penduduk)
                                <h6 class="text-primary mb-3"><i class="ti ti-users"></i> Data Penduduk</h6>
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="40%" class="text-muted">Nama Lengkap</td>
                                        <td><strong>{{ $penduduk->nama_lengkap }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Tempat, Tanggal Lahir</td>
                                        <td>{{ $penduduk->tempat_lahir }}, {{ optional($penduduk->tanggal_lahir)->format('d F Y') ?? '-' }}</td>
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
                                        <td class="text-muted">Alamat</td>
                                        <td>{{ $penduduk->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">RT / RW</td>
                                        <td>{{ $penduduk->rt }} / {{ $penduduk->rw }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Pekerjaan</td>
                                        <td>{{ $penduduk->pekerjaan }}</td>
                                    </tr>
                                </table>
                            @else
                                <div class="alert alert-info">
                                    <i class="ti ti-info-circle"></i> Data penduduk tidak ditemukan untuk NIK ini.
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">
                                <i class="ti ti-edit"></i> Edit User
                            </a>
                            @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                      method="POST" style="display:inline;" 
                                      onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="ti ti-trash"></i> Hapus User
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
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