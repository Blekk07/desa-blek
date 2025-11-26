@extends('layouts.dashboard')
@section('title', 'My Profile')

@section('content')
<div class="pc-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">User Profile</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">User Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                role="tab" aria-selected="true">
                                <i class="ti ti-user me-2"></i>Profile
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
                                aria-selected="false">
                                <i class="ti ti-edit me-2"></i>Edit Profile
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#profile-3" role="tab"
                                aria-selected="false">
                                <i class="ti ti-lock me-2"></i>Change Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!-- Profile Tab -->
                        <div class="tab-pane active show" id="profile-1" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-xxl-3">
                                    <div class="card">
                                        <div class="card-body position-relative">
                                            <div class="text-center mt-3">
                                                <div class="chat-avtar d-inline-flex mx-auto">
                                                    <img class="rounded-circle img-fluid wid-90"
                                                        src="{{ $avatar }}" alt="User image">
                                                </div>
                                                <h5 class="mb-0 mt-3">{{ $user->name }}</h5>
                                                <p class="text-muted text-sm mb-1">{{ ucfirst($user->role) }}</p>
                                                @if($user->is_verified)
                                                    <span class="badge bg-success"><i class="ti ti-check"></i> Verified</span>
                                                @else
                                                    <span class="badge bg-warning"><i class="ti ti-alert-circle"></i> Not Verified</span>
                                                @endif
                                                
                                                <hr class="my-3">
                                                
                                                <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                                                    <i class="ti ti-mail"></i>
                                                    <p class="mb-0 text-sm">{{ $user->email }}</p>
                                                </div>
                                                
                                                @if($penduduk)
                                                    <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                                                        <i class="ti ti-phone"></i>
                                                        <p class="mb-0 text-sm">{{ $penduduk->no_telepon ?? '-' }}</p>
                                                    </div>
                                                    <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                                                        <i class="ti ti-map-pin"></i>
                                                        <p class="mb-0 text-sm">RT {{ $penduduk->rt }}/RW {{ $penduduk->rw }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-8 col-xxl-9">
                                    @if($penduduk)
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Data Kependudukan</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">NIK</p>
                                                            <p class="mb-0"><strong>{{ $penduduk->nik }}</strong></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">No. Kartu Keluarga</p>
                                                            <p class="mb-0"><strong>{{ $penduduk->no_kk ?? '-' }}</strong></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Tempat, Tanggal Lahir</p>
                                                            <p class="mb-0">{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir->format('d F Y') }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Umur</p>
                                                            <p class="mb-0">{{ $penduduk->umur }} Tahun</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Jenis Kelamin</p>
                                                            <p class="mb-0">{{ $penduduk->jenis_kelamin }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Agama</p>
                                                            <p class="mb-0">{{ $penduduk->agama }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Status Perkawinan</p>
                                                            <p class="mb-0">{{ $penduduk->status_perkawinan }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Pendidikan Terakhir</p>
                                                            <p class="mb-0">{{ $penduduk->pendidikan_terakhir ?? '-' }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Pekerjaan</p>
                                                            <p class="mb-0">{{ $penduduk->pekerjaan }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Status Kependudukan</p>
                                                            <p class="mb-0">
                                                                @if($penduduk->status_kependudukan == 'Tetap')
                                                                    <span class="badge bg-success">Tetap</span>
                                                                @elseif($penduduk->status_kependudukan == 'Pendatang')
                                                                    <span class="badge bg-info">Pendatang</span>
                                                                @else
                                                                    <span class="badge bg-warning">Pindah</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @else
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <i class="ti ti-alert-circle fs-1 text-warning mb-3"></i>
                                            <h5>Data Kependudukan Belum Tersedia</h5>
                                            <p class="text-muted">Silakan hubungi admin desa untuk melengkapi data kependudukan Anda.</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Edit Profile Tab -->
                        <div class="tab-pane" id="profile-2" role="tabpanel">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-sm-12 text-center mb-3">
                                        <div class="user-upload wid-75">
                                            <img src="{{ $avatar }}" alt="img" class="img-fluid rounded-circle">
                                            <label for="uplfile" class="img-avtar-upload">
                                                <i class="ti ti-camera f-24 mb-1"></i>
                                                <span>Upload</span>
                                            </label>
                                            <input type="file" id="uplfile" name="avatar" class="d-none" accept="image/*">
                                        </div>
                                        <small class="text-muted">Upload foto profil (Maksimal 2MB, format: JPG, PNG)</small>
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">NIK</label>
                                        <input type="text" class="form-control" value="{{ $user->nik }}" disabled>
                                        <small class="text-muted">NIK tidak dapat diubah</small>
                                    </div>
                                    
                                    @if($penduduk)
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">No. Telepon</label>
                                        <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon', $penduduk->no_telepon) }}" maxlength="15">
                                    </div>
                                    
                                    <input type="hidden" name="update_penduduk" value="1">
                                    @endif
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti ti-device-floppy"></i> Update Profile
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Change Password Tab -->
                        <div class="tab-pane" id="profile-3" role="tabpanel">
                            <form action="{{ route('profile.password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Password Lama <span class="text-danger">*</span></label>
                                            <input type="password" name="current_password" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Password Baru <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>Password baru harus mengandung:</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="ti ti-check text-success me-2"></i> Minimal 6 karakter</li>
                                            <li class="list-group-item"><i class="ti ti-check text-success me-2"></i> Kombinasi huruf dan angka</li>
                                            <li class="list-group-item"><i class="ti ti-check text-success me-2"></i> Mudah diingat</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti ti-lock"></i> Update Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

<style>
.user-upload {
    position: relative;
    display: inline-block;
}

.img-avtar-upload {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #fff;
    border: 2px solid #e9ecef;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
}

.img-avtar-upload:hover {
    background: #f8f9fa;
    border-color: #dee2e6;
}

.img-avtar-upload i {
    font-size: 16px;
    margin-bottom: 0 !important;
}

.img-avtar-upload span {
    font-size: 0;
}
</style>
@endsection