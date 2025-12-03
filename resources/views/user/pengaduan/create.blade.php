@extends('layouts.dashboard')
@section('title', 'Buat Pengaduan Baru')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengaduan.index') }}">Pengaduan</a></li>
                        <li class="breadcrumb-item" aria-current="page">Buat Pengaduan Baru</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <i class="ti ti-file-text"></i> Buat Pengaduan Baru
                    </h5>
                    <p class="text-muted mb-0">Sampaikan keluhan atau laporan Anda dengan detail dan lengkap</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- DETAIL LAPORAN SECTION -->
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h6 class="text-primary">
                                    <i class="ti ti-info-circle"></i> Detail Laporan
                                </h6>
                                <hr class="my-2">
                            </div>

                            <!-- Subjek/Judul Laporan -->
                            <div class="col-md-12 mb-3">
                                <label for="judul" class="form-label">Subjek/Judul Laporan <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('judul') is-invalid @enderror" 
                                       id="judul" 
                                       name="judul" 
                                       value="{{ old('judul') }}" 
                                       placeholder="Contoh: Jalan Rusak Parah di Jl. Merdeka"
                                       required>
                                <small class="text-muted d-block mt-1">Ringkas masalah dalam satu judul yang jelas</small>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kategori Laporan -->
                            <div class="col-md-6 mb-3">
                                <label for="kategori" class="form-label">Kategori Laporan <span class="text-danger">*</span></label>
                                <select class="form-select @error('kategori') is-invalid @enderror" 
                                        id="kategori" 
                                        name="kategori" 
                                        required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Infrastruktur" {{ old('kategori') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur (Jalan, Jembatan, dll)</option>
                                    <option value="Pelayanan Publik" {{ old('kategori') == 'Pelayanan Publik' ? 'selected' : '' }}>Pelayanan Publik</option>
                                    <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                                    <option value="Kebersihan & Lingkungan" {{ old('kategori') == 'Kebersihan & Lingkungan' ? 'selected' : '' }}>Kebersihan & Lingkungan</option>
                                    <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                    <option value="Pendidikan" {{ old('kategori') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                    <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                                    <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Prioritas/Urgensi (Opsional) -->
                            <div class="col-md-6 mb-3">
                                <label for="prioritas" class="form-label">Tingkat Urgensi</label>
                                <select class="form-select @error('prioritas') is-invalid @enderror" 
                                        id="prioritas" 
                                        name="prioritas">
                                    <option value="">-- Pilih Tingkat Urgensi --</option>
                                    <option value="Rendah" {{ old('prioritas') == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                                    <option value="Sedang" {{ old('prioritas') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                    <option value="Tinggi" {{ old('prioritas') == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                                    <option value="Sangat Urgent" {{ old('prioritas') == 'Sangat Urgent' ? 'selected' : '' }}>Sangat Urgent</option>
                                </select>
                            </div>

                            <!-- Tanggal dan Waktu Kejadian -->
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_waktu_kejadian" class="form-label">Tanggal & Waktu Kejadian <span class="text-danger">*</span></label>
                                <input type="datetime-local" 
                                       class="form-control @error('tanggal_waktu_kejadian') is-invalid @enderror" 
                                       id="tanggal_waktu_kejadian" 
                                       name="tanggal_waktu_kejadian" 
                                       value="{{ old('tanggal_waktu_kejadian') }}"
                                       required>
                                @error('tanggal_waktu_kejadian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Lokasi Kejadian -->
                            <div class="col-md-6 mb-3">
                                <label for="lokasi_kejadian" class="form-label">Lokasi Kejadian <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('lokasi_kejadian') is-invalid @enderror" 
                                       id="lokasi_kejadian" 
                                       name="lokasi_kejadian" 
                                       value="{{ old('lokasi_kejadian') }}"
                                       placeholder="Contoh: Jl. Merdeka No. 45, Dekat Kantor Kelurahan"
                                       required>
                                @error('lokasi_kejadian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kecamatan (Opsional) -->
                            <div class="col-md-6 mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="kecamatan" 
                                       name="kecamatan" 
                                       value="{{ old('kecamatan') }}"
                                       placeholder="Contoh: Kecamatan Cipayung">
                            </div>

                            <!-- Desa/Kelurahan (Opsional) -->
                            <div class="col-md-6 mb-3">
                                <label for="desa" class="form-label">Desa/Kelurahan</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="desa" 
                                       name="desa" 
                                       value="{{ old('desa') }}"
                                       placeholder="Contoh: Kelurahan Cipayung Jaya">
                            </div>

                            <!-- Uraian Laporan/Kronologi Kejadian -->
                            <div class="col-md-12 mb-3">
                                <label for="uraian_kejadian" class="form-label">Uraian Laporan / Kronologi Kejadian <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('uraian_kejadian') is-invalid @enderror" 
                                          id="uraian_kejadian" 
                                          name="uraian_kejadian" 
                                          rows="5"
                                          placeholder="Jelaskan secara detail kronologi kejadian, apa yang terjadi, kapan, siapa yang terlibat, dan dampak yang ditimbulkan..."
                                          required>{{ old('uraian_kejadian') }}</textarea>
                                <small class="text-muted d-block mt-1">Semakin detail penjelasan Anda, semakin membantu dalam proses penanganan</small>
                                @error('uraian_kejadian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- LAMPIRAN PENDUKUNG SECTION -->
                        <div class="row mt-4">
                            <div class="col-12 mb-4">
                                <h6 class="text-primary">
                                    <i class="ti ti-paperclip"></i> Lampiran Pendukung
                                </h6>
                                <hr class="my-2">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="lampiran" class="form-label">
                                    Bukti-Bukti Pendukung
                                </label>
                                <div class="alert alert-info" role="alert">
                                    <i class="ti ti-info-circle"></i>
                                    <strong>Jenis file yang dapat diunggah:</strong> 
                                    Foto (.jpg, .png), Video (.mp4, .avi), Dokumen (.pdf, .doc, .docx), Audio (.mp3, .wav)
                                </div>
                                <input type="file" 
                                       class="form-control @error('lampiran') is-invalid @enderror" 
                                       id="lampiran" 
                                       name="lampiran[]" 
                                       multiple
                                       accept=".jpg,.jpeg,.png,.mp4,.avi,.pdf,.doc,.docx,.mp3,.wav">
                                <small class="text-muted d-block mt-1">
                                    Anda dapat memilih lebih dari satu file. Maksimal ukuran per file: 10 MB
                                </small>
                                @error('lampiran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- File preview yang sudah dipilih -->
                            <div class="col-md-12 mb-3" id="filePreview" style="display:none;">
                                <label class="form-label">File yang Dipilih:</label>
                                <div id="fileList" class="list-group"></div>
                            </div>
                        </div>

                        <!-- BUTTONS -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti ti-send"></i> Kirim Pengaduan
                                    </button>
                                    <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">
                                        <i class="ti ti-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('lampiran');
    const filePreview = document.getElementById('filePreview');
    const fileList = document.getElementById('fileList');

    fileInput.addEventListener('change', function() {
        fileList.innerHTML = '';
        
        if (this.files.length > 0) {
            filePreview.style.display = 'block';
            
            Array.from(this.files).forEach((file, index) => {
                const fileSize = (file.size / 1024 / 1024).toFixed(2);
                const fileItem = document.createElement('div');
                fileItem.className = 'list-group-item';
                fileItem.innerHTML = `
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="mb-0"><strong>${file.name}</strong></p>
                            <small class="text-muted">${fileSize} MB</small>
                        </div>
                        <span class="badge bg-primary">${file.type || 'Tipe tidak diketahui'}</span>
                    </div>
                `;
                fileList.appendChild(fileItem);
            });
        } else {
            filePreview.style.display = 'none';
        }
    });
});
</script>

<style>
.form-label {
    font-weight: 500;
    color: #333;
}

.text-primary {
    color: #0064ff !important;
}

.alert {
    border-radius: 0.5rem;
}

.list-group-item {
    padding: 0.75rem 1rem;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    margin-bottom: 0.5rem;
    border-radius: 0.375rem;
}

.list-group-item:hover {
    background: #e9ecef;
}
</style>
@endsection