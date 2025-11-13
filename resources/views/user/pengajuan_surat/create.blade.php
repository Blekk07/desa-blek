@extends('layouts.dashboard')
@section('title', 'Ajukan Surat Baru')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.pengajuan-surat.index') }}">Pengajuan Surat</a></li>
                        <li class="breadcrumb-item" aria-current="page">Ajukan Surat Baru</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Pengajuan Surat</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.pengajuan-surat.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h6 class="text-primary"><i class="ti ti-file-text"></i> Jenis Surat</h6>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Surat <span class="text-danger">*</span></label>
                                <select name="jenis_surat" class="form-select @error('jenis_surat') is-invalid @enderror" required>
                                    <option value="">Pilih Jenis Surat</option>
                                    @foreach($jenisSurat as $jenis)
                                        <option value="{{ $jenis }}" {{ old('jenis_surat') == $jenis ? 'selected' : '' }}>
                                            {{ $jenis }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_surat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-3 mb-3">
                                <h6 class="text-primary"><i class="ti ti-user"></i> Data Pemohon</h6>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" 
                                       class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                       value="{{ old('nama_lengkap', auth()->user()->name) }}" required>
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" 
                                       class="form-control @error('nik') is-invalid @enderror" 
                                       value="{{ old('nik') }}" maxlength="16" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" 
                                          rows="3" required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">RT <span class="text-danger">*</span></label>
                                <input type="text" name="rt" 
                                       class="form-control @error('rt') is-invalid @enderror" 
                                       value="{{ old('rt') }}" maxlength="3" required>
                                @error('rt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">RW <span class="text-danger">*</span></label>
                                <input type="text" name="rw" 
                                       class="form-control @error('rw') is-invalid @enderror" 
                                       value="{{ old('rw') }}" maxlength="3" required>
                                @error('rw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. Telepon <span class="text-danger">*</span></label>
                                <input type="text" name="no_telepon" 
                                       class="form-control @error('no_telepon') is-invalid @enderror" 
                                       value="{{ old('no_telepon') }}" maxlength="15" required>
                                @error('no_telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-3 mb-3">
                                <h6 class="text-primary"><i class="ti ti-info-circle"></i> Keperluan Surat</h6>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Keperluan <span class="text-danger">*</span></label>
                                <textarea name="keperluan" class="form-control @error('keperluan') is-invalid @enderror" 
                                          rows="3" placeholder="Jelaskan keperluan pembuatan surat ini..." required>{{ old('keperluan') }}</textarea>
                                @error('keperluan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Keterangan Tambahan</label>
                                <textarea name="keterangan_tambahan" 
                                          class="form-control @error('keterangan_tambahan') is-invalid @enderror" 
                                          rows="2" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan_tambahan') }}</textarea>
                                @error('keterangan_tambahan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-send"></i> Kirim Pengajuan
                            </button>
                            <a href="{{ route('user.pengajuan-surat.index') }}" class="btn btn-secondary">
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