@extends('layouts.dashboard')
@section('title', 'Manajemen User')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Manajemen User</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Manajemen User</h5>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                        <i class="ti ti-plus"></i> Tambah User
                    </a>
                </div>
                <div class="card-body">
                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body text-center">
                                    <h3>{{ $totalUsers ?? 0 }}</h3>
                                    <p class="text-muted mb-0">Total Users</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body text-center">
                                    <h3>{{ $adminCount ?? 0 }}</h3>
                                    <p class="text-muted mb-0">Admin</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body text-center">
                                    <h3>{{ $userCount ?? 0 }}</h3>
                                    <p class="text-muted mb-0">Users</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body text-center">
                                    <h3>{{ $verifiedCount ?? 0 }}</h3>
                                    <p class="text-muted mb-0">Verified</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Verified</th>
                                    <th>Terdaftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $user->avatar ? asset('assets/images/user/' . $user->avatar) : asset('assets/images/user/avatar-default.jpg') }}" 
                                                 class="rounded-circle me-2" width="32" height="32" onerror="this.src='{{ asset('assets/images/user/avatar-default.jpg') }}'">
                                            {{ $user->name }}
                                        </div>
                                    </td>
                                    <td>{{ $user->nik }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->role == 'admin' ? 'primary' : 'success' }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $user->status == 'active' ? 'success' : 'secondary' }}">
                                            {{ $user->status }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($user->is_verified)
                                            <span class="badge bg-success"><i class="ti ti-check"></i> Verified</span>
                                        @else
                                            <span class="badge bg-warning"><i class="ti ti-alert-circle"></i> Not Verified</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ optional($user->created_at)->format('d/m/Y') ?? '-' }}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.users.show', $user->id) }}" 
                                               class="btn btn-sm btn-info" title="Detail">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" 
                                               class="btn btn-sm btn-warning" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            @if($user->id !== auth()->id())
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                            onclick="return confirm('Yakin hapus user?')" title="Hapus">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data user</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.stat-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}
.stat-card:hover {
    transform: translateY(-2px);
}
</style>
@endsection