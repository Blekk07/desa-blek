@extends('layouts.dashboard')
@section('title', 'Edit Data Penduduk')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.penduduk.index') }}">Data Penduduk</a></li>
                        <li class="breadcrumb-item" aria-current="page">Edit Data</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Edit Data Penduduk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.penduduk.update', $penduduk->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Data Pribadi -->
                            <div class="col-12">
                                <h6 class="mb-3 text-primary"><i class="ti ti-user"></i> Data Pribadi</h6>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" 
                                       value="{{ old('nik', $penduduk->nik) }}" maxlength="16" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. Kartu Keluarga</label>
                                <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" 
                                       value="{{ old('no_kk', $penduduk->no_kk) }}" maxlength="16">
                                @error('no_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                       value="{{ old('nama_lengkap', $penduduk->nama_lengkap) }}" required>
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                       value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" required>
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                       value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir->format('Y-m-d')) }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Agama <span class="text-danger">*</span></label>
                                <select name="agama" class="form-select @error('agama') is-invalid @enderror" required>
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam" {{ old('agama', $penduduk->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama', $penduduk->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ old('agama', $penduduk->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ old('agama', $penduduk->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama', $penduduk->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ old('agama', $penduduk->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Data Alamat -->
                            <div class="col-12 mt-3">
                                <h6 class="mb-3 text-primary"><i class="ti ti-map-pin"></i> Alamat</h6>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" 
                                          rows="3" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">RT <span class="text-danger">*</span></label>
                                <input type="text" name="rt" class="form-control @error('rt') is-invalid @enderror" 
                                       value="{{ old('rt', $penduduk->rt) }}" maxlength="3" required>
                                @error('rt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">RW <span class="text-danger">*</span></label>
                                <input type="text" name="rw" class="form-control @error('rw') is-invalid @enderror" 
                                       value="{{ old('rw', $penduduk->rw) }}" maxlength="3" required>
                                @error('rw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Data Lainnya -->
                            <div class="col-12 mt-3">
                                <h6 class="mb-3 text-primary"><i class="ti ti-info-circle"></i> Informasi Lainnya</h6>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                                <select name="status_perkawinan" class="form-select @error('status_perkawinan') is-invalid @enderror" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Belum Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                    <option value="Cerai Hidup" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                    <option value="Cerai Mati" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                </select>
                                @error('status_perkawinan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pendidikan Terakhir</label>
                                <select name="pendidikan_terakhir" class="form-select @error('pendidikan_terakhir') is-invalid @enderror">
                                    <option value="">Pilih Pendidikan</option>
                                    <option value="Tidak/Belum Sekolah" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
                                    <option value="SD" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                    <option value="D1/D2/D3" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'D1/D2/D3' ? 'selected' : '' }}>D1/D2/D3</option>
                                    <option value="S1" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'S3' ? 'selected' : '' }}>S3</option>
                                </select>
                                @error('pendidikan_terakhir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                                <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" 
                                       value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status Kependudukan <span class="text-danger">*</span></label>
                                <select name="status_kependudukan" class="form-select @error('status_kependudukan') is-invalid @enderror" required>
                                    <option value="Tetap" {{ old('status_kependudukan', $penduduk->status_kependudukan) == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                                    <option value="Pendatang" {{ old('status_kependudukan', $penduduk->status_kependudukan) == 'Pendatang' ? 'selected' : '' }}>Pendatang</option>
                                    <option value="Pindah" {{ old('status_kependudukan', $penduduk->status_kependudukan) == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                                </select>
                                @error('status_kependudukan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" 
                                       value="{{ old('nama_ayah', $penduduk->nama_ayah) }}">
                                @error('nama_ayah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" 
                                       value="{{ old('nama_ibu', $penduduk->nama_ibu) }}">
                                @error('nama_ibu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. Telepon</label>
                                <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" 
                                       value="{{ old('no_telepon', $penduduk->no_telepon) }}" maxlength="15">
                                @error('no_telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" 
                                          rows="3">{{ old('keterangan', $penduduk->keterangan) }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-device-floppy"></i> Update Data
                            </button>
                            <a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
