@extends('layouts.dashboard')
@section('title', 'Edit Profil Desa')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Edit Profil Desa</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Edit Profil Desa</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile-desa.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Informasi Dasar -->
                            <div class="col-12">
                                <h6 class="mb-3 text-primary"><i class="ti ti-map-pin"></i> Informasi Dasar</h6>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Desa <span class="text-danger">*</span></label>
                                <input type="text" name="nama_desa" class="form-control @error('nama_desa') is-invalid @enderror"
                                       value="{{ old('nama_desa', $profile->nama_desa) }}" required>
                                @error('nama_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                                <input type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror"
                                       value="{{ old('kecamatan', $profile->kecamatan) }}" required>
                                @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kabupaten <span class="text-danger">*</span></label>
                                <input type="text" name="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror"
                                       value="{{ old('kabupaten', $profile->kabupaten) }}" required>
                                @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                                <input type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror"
                                       value="{{ old('provinsi', $profile->provinsi) }}" required>
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kode Pos <span class="text-danger">*</span></label>
                                <input type="text" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror"
                                       value="{{ old('kode_pos', $profile->kode_pos) }}" required>
                                @error('kode_pos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Luas Wilayah (Hektare)</label>
                                <input type="number" step="0.01" name="luas_wilayah" class="form-control @error('luas_wilayah') is-invalid @enderror"
                                       value="{{ old('luas_wilayah', $profile->luas_wilayah) }}">
                                @error('luas_wilayah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat Kantor Desa <span class="text-danger">*</span></label>
                                <textarea name="alamat_kantor" class="form-control @error('alamat_kantor') is-invalid @enderror"
                                          rows="3" required>{{ old('alamat_kantor', $profile->alamat_kantor) }}</textarea>
                                @error('alamat_kantor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Pemerintahan Desa -->
                            <div class="col-12 mt-4">
                                <h6 class="mb-3 text-primary"><i class="ti ti-building"></i> Pemerintahan Desa</h6>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kepala Desa <span class="text-danger">*</span></label>
                                <input type="text" name="kepala_desa" class="form-control @error('kepala_desa') is-invalid @enderror"
                                       value="{{ old('kepala_desa', $profile->kepala_desa) }}" required>
                                @error('kepala_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Masa Jabatan Kepala Desa <span class="text-danger">*</span></label>
                                <input type="text" name="masa_jabatan_kepala" class="form-control @error('masa_jabatan_kepala') is-invalid @enderror"
                                       value="{{ old('masa_jabatan_kepala', $profile->masa_jabatan_kepala) }}" required>
                                @error('masa_jabatan_kepala')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sekretaris Desa</label>
                                <input type="text" name="sekretaris_desa" class="form-control @error('sekretaris_desa') is-invalid @enderror"
                                       value="{{ old('sekretaris_desa', $profile->sekretaris_desa) }}">
                                @error('sekretaris_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bendahara Desa</label>
                                <input type="text" name="bendahara_desa" class="form-control @error('bendahara_desa') is-invalid @enderror"
                                       value="{{ old('bendahara_desa', $profile->bendahara_desa) }}">
                                @error('bendahara_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kontak Darurat -->
                            <div class="col-12 mt-4">
                                <h6 class="mb-3 text-primary"><i class="ti ti-phone"></i> Kontak Darurat</h6>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poskesdes</label>
                                <input type="text" name="poskesdes" class="form-control @error('poskesdes') is-invalid @enderror"
                                       value="{{ old('poskesdes', $profile->poskesdes) }}">
                                @error('poskesdes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Pos Kamling</label>
                                <input type="text" name="pos_kamling" class="form-control @error('pos_kamling') is-invalid @enderror"
                                       value="{{ old('pos_kamling', $profile->pos_kamling) }}">
                                @error('pos_kamling')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Pemadam Kebakaran</label>
                                <input type="text" name="kebakaran" class="form-control @error('kebakaran') is-invalid @enderror"
                                       value="{{ old('kebakaran', $profile->kebakaran) }}">
                                @error('kebakaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Visi & Misi -->
                            <div class="col-12 mt-4">
                                <h6 class="mb-3 text-primary"><i class="ti ti-target"></i> Visi & Misi</h6>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Visi Desa <span class="text-danger">*</span></label>
                                <textarea name="visi" class="form-control @error('visi') is-invalid @enderror"
                                          rows="3" required>{{ old('visi', $profile->visi) }}</textarea>
                                @error('visi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Deskripsi Visi <span class="text-danger">*</span></label>
                                <textarea name="visi_deskripsi" class="form-control @error('visi_deskripsi') is-invalid @enderror"
                                          rows="4" required>{{ old('visi_deskripsi', $profile->visi_deskripsi) }}</textarea>
                                @error('visi_deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Informasi Tambahan -->
                            <div class="col-12 mt-4">
                                <h6 class="mb-3 text-primary"><i class="ti ti-info-circle"></i> Informasi Tambahan</h6>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Sejarah Desa</label>
                                <textarea name="sejarah_desa" class="form-control @error('sejarah_desa') is-invalid @enderror"
                                          rows="5">{{ old('sejarah_desa', $profile->sejarah_desa) }}</textarea>
                                @error('sejarah_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Kondisi Geografis</label>
                                <textarea name="geografis" class="form-control @error('geografis') is-invalid @enderror"
                                          rows="4">{{ old('geografis', $profile->geografis) }}</textarea>
                                @error('geografis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Logo Desa</label>
                                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($profile->logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('assets/images/logo/' . $profile->logo) }}" class="img-thumbnail" width="100" height="100" onerror="this.src='{{ asset('assets/images/user/avatar-default.jpg') }}'">
                                        <small class="text-muted d-block">Logo saat ini</small>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-device-floppy"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                                    <i class="ti ti-arrow-left"></i> Kembali ke Dashboard
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