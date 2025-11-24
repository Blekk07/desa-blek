@extends('layouts.auth')

@section('title', 'Lengkapi Data Registrasi')

@section('content')
<div class="card mt-4">
    <div class="card-body">
        <h4 class="mb-4 f-w-500 text-center">Lengkapi Data Registrasi</h4>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="ti ti-alert-circle me-2"></i>
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="ti ti-info-circle me-2"></i>
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="text-center mb-4">
            <img src="{{ $googleUser['avatar'] }}" alt="Avatar" class="rounded-circle mb-3" width="80">
            <p class="text-muted">Halo, <strong>{{ $googleUser['name'] }}</strong>! Silakan lengkapi data diri Anda untuk melanjutkan.</p>
        </div>

        <form action="{{ route('register.google.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">NIK <span class="text-danger">*</span></label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" 
                               value="{{ old('nik') }}" required>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. KK</label>
                        <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" 
                               value="{{ old('no_kk') }}">
                        @error('no_kk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                               value="{{ old('nama_lengkap', $googleUser['name']) }}" required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                               value="{{ old('tempat_lahir') }}" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                               value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Agama <span class="text-danger">*</span></label>
                        <select name="agama" class="form-select @error('agama') is-invalid @enderror" required>
                            <option value="">-- Pilih --</option>
                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                        @error('agama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                        <input type="text" name="alamat_lengkap" class="form-control @error('alamat_lengkap') is-invalid @enderror" 
                               value="{{ old('alamat_lengkap') }}" required>
                        @error('alamat_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">RT <span class="text-danger">*</span></label>
                            <input type="number" name="rt" class="form-control @error('rt') is-invalid @enderror" 
                                   value="{{ old('rt') }}" required>
                            @error('rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">RW <span class="text-danger">*</span></label>
                            <input type="number" name="rw" class="form-control @error('rw') is-invalid @enderror" 
                                   value="{{ old('rw') }}" required>
                            @error('rw')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                        <select name="status_perkawinan" class="form-select @error('status_perkawinan') is-invalid @enderror" required>
                            <option value="">-- Pilih --</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                        @error('status_perkawinan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" 
                               value="{{ old('pendidikan_terakhir') }}">
                        @error('pendidikan_terakhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" 
                               value="{{ old('pekerjaan') }}">
                        @error('pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Kependudukan <span class="text-danger">*</span></label>
                        <select name="status_kependudukan" class="form-select @error('status_kependudukan') is-invalid @enderror" required>
                            <option value="">-- Pilih --</option>
                            <option value="Tetap" {{ old('status_kependudukan') == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                            <option value="Tidak Tetap" {{ old('status_kependudukan') == 'Tidak Tetap' ? 'selected' : '' }}>Tidak Tetap</option>
                        </select>
                        @error('status_kependudukan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" 
                               value="{{ old('no_telepon') }}">
                        @error('no_telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control bg-light" 
                               value="{{ $googleUser['email'] }}" readonly>
                        <small class="text-muted">Email dari akun Google Anda</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nama dari Google</label>
                        <input type="text" class="form-control bg-light" 
                               value="{{ $googleUser['name'] }}" readonly>
                        <small class="text-muted">Nama dari akun Google Anda</small>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-4">
                <i class="ti ti-check me-2"></i>Selesaikan Registrasi
            </button>

            <div class="text-center">
                <p class="mb-0">Kembali ke 
                    <a href="{{ route('login') }}" class="text-primary">Login</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection