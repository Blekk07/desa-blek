@extends('layouts.dashboard')
@section('title', 'Edit User')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Manajemen User</a></li>
                        <li class="breadcrumb-item" aria-current="page">Edit User</li>
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
                        <h5 class="mb-0">Form Edit User</h5>
                        <div>
                            @if($user->hasVerifiedEmail())
                                <span class="badge bg-success"><i class="ti ti-mail-check me-1"></i>Email Verified</span>
                            @else
                                <span class="badge bg-warning"><i class="ti ti-mail-x me-1"></i>Email Not Verified</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Informasi Akun -->
                            <div class="col-12">
                                <h6 class="mb-3 text-primary"><i class="ti ti-user"></i> Informasi Akun</h6>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Avatar</label>
                                <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($user->avatar)
                                    <div class="mt-2">
                                        <img src="{{ asset('assets/images/user/' . $user->avatar) }}" class="rounded-circle" width="64" height="64" onerror="this.src='{{ asset('assets/images/user/avatar-default.jpg') }}'">
                                        <small class="text-muted d-block">Avatar saat ini</small>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                       required maxlength="16">
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Role <span class="text-danger">*</span></label>
                                <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="">Pilih Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                @if(!$user->hasVerifiedEmail())
                                    <div class="alert alert-warning border-0">
                                        <h6 class="alert-heading mb-2"><i class="ti ti-mail-x me-1"></i>Email Belum Terverifikasi</h6>
                                        <p class="mb-2 small">User belum memverifikasi alamat emailnya. Kirim ulang email verifikasi untuk membantu user menyelesaikan proses verifikasi.</p>
                                        <form method="POST" action="{{ route('verification.send') }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="ti ti-send me-1"></i>Kirim Ulang Email Verifikasi
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="alert alert-success border-0">
                                        <h6 class="alert-heading mb-2"><i class="ti ti-mail-check me-1"></i>Email Sudah Terverifikasi</h6>
                                        <p class="mb-0 small">Alamat email user telah berhasil diverifikasi pada {{ optional($user->email_verified_at)->format('d F Y H:i') }}.</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-device-floppy"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">
                                    <i class="ti ti-eye"></i> Lihat Detail
                                </a>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                    <i class="ti ti-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection