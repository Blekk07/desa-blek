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
                    <form action="{{ route('user.pengajuan-surat.store') }}" method="POST" id="formPengajuanSurat" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <!-- PILIH JENIS SURAT -->
                            <div class="col-12 mb-4">
                                <h6 class="text-primary"><i class="ti ti-file-text"></i> Pilih Jenis Surat</h6>
                                <div class="alert alert-info">
                                    <i class="ti ti-info-circle"></i> Pilih jenis surat terlebih dahulu
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Surat <span class="text-danger">*</span></label>
                                <select name="jenis_surat" id="jenisSurat" class="form-select @error('jenis_surat') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenis Surat --</option>
                                    <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                                    <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu (SKTM)</option>
                                    <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                    <option value="Surat Pengantar KTP">Surat Pengantar KTP</option>
                                    <option value="Surat Pengantar KK">Surat Pengantar Kartu Keluarga</option>
                                    <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                                    <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                                    <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                                    <option value="Surat Keterangan Catatan Kepolisian">Surat Keterangan Catatan Kepolisian (SKCK)</option>
                                    <option value="Surat Lainnya">Surat Lainnya</option>
                                </select>
                                @error('jenis_surat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- DESKRIPSI SURAT -->
                            <div class="col-md-12 mb-3" id="deskripsiSurat" style="display:none;">
                                <div class="alert alert-light border">
                                    <strong>Keterangan:</strong>
                                    <p class="mb-0" id="deskripsiText"></p>
                                </div>
                            </div>

                            <!-- DATA PEMOHON -->
                            <div class="col-12 mt-3 mb-3" id="dataPemohonSection" style="display:none;">
                                <h6 class="text-primary"><i class="ti ti-user"></i> Data Pemohon</h6>
                            </div>

                            <div class="col-md-6 mb-3" id="fieldNamaLengkap" style="display:none;">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $user->name ?? auth()->user()->name) }}" readonly>
                            </div>

                            <div class="col-md-6 mb-3" id="fieldNIK" style="display:none;">
                                <label class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" class="form-control" value="{{ old('nik', $user->nik ?? ($penduduk->nik ?? '')) }}" maxlength="16" readonly>
                            </div>

                            <div class="col-md-12 mb-3" id="fieldAlamat" style="display:none;">
                                <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $penduduk->alamat_lengkap ?? '') }}</textarea>
                            </div>

                            <div class="col-md-3 mb-3" id="fieldRT" style="display:none;">
                                <label class="form-label">RT <span class="text-danger">*</span></label>
                                <input type="text" name="rt" class="form-control" value="{{ old('rt', $penduduk->rt ?? '') }}" maxlength="3" readonly>
                            </div>

                            <div class="col-md-3 mb-3" id="fieldRW" style="display:none;">
                                <label class="form-label">RW <span class="text-danger">*</span></label>
                                <input type="text" name="rw" class="form-control" value="{{ old('rw', $penduduk->rw ?? '') }}" maxlength="3" readonly>
                            </div>

                            <div class="col-md-6 mb-3" id="fieldTelepon" style="display:none;">
                                <label class="form-label">No. Telepon <span class="text-danger">*</span></label>
                                <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon', $penduduk->no_telepon ?? '') }}" maxlength="15">
                            </div>

                            <!-- FIELD KHUSUS SURAT USAHA -->
                            <div class="col-md-6 mb-3" id="fieldNamaUsaha" style="display:none;">
                                <label class="form-label">Nama Usaha <span class="text-danger">*</span></label>
                                <input type="text" name="nama_usaha" class="form-control" value="{{ old('nama_usaha') }}">
                            </div>

                            <div class="col-md-6 mb-3" id="fieldJenisUsaha" style="display:none;">
                                <label class="form-label">Jenis Usaha <span class="text-danger">*</span></label>
                                <input type="text" name="jenis_usaha" class="form-control" value="{{ old('jenis_usaha') }}" placeholder="Contoh: Warung Kelontong">
                            </div>

                            <div class="col-md-12 mb-3" id="fieldAlamatUsaha" style="display:none;">
                                <label class="form-label">Alamat Usaha <span class="text-danger">*</span></label>
                                <textarea name="alamat_usaha" class="form-control" rows="2">{{ old('alamat_usaha') }}</textarea>
                            </div>

                            <!-- FIELD KHUSUS KELAHIRAN -->
                            <div class="col-md-6 mb-3" id="fieldNamaAnak" style="display:none;">
                                <label class="form-label">Nama Anak <span class="text-danger">*</span></label>
                                <input type="text" name="nama_anak" class="form-control" value="{{ old('nama_anak') }}">
                            </div>

                            <div class="col-md-6 mb-3" id="fieldJenisKelaminAnak" style="display:none;">
                                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin_anak" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" id="fieldTempatLahir" style="display:none;">
                                <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_lahir_anak" class="form-control" value="{{ old('tempat_lahir_anak') }}">
                            </div>

                            <div class="col-md-6 mb-3" id="fieldTanggalLahir" style="display:none;">
                                <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir_anak" class="form-control" value="{{ old('tanggal_lahir_anak') }}">
                            </div>

                            <div class="col-md-6 mb-3" id="fieldNamaAyah" style="display:none;">
                                <label class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                                <input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah') }}">
                            </div>

                            <div class="col-md-6 mb-3" id="fieldNamaIbu" style="display:none;">
                                <label class="form-label">Nama Ibu <span class="text-danger">*</span></label>
                                <input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu') }}">
                            </div>

                            <!-- FIELD KHUSUS KEMATIAN -->
                            <div class="col-md-6 mb-3" id="fieldNamaAlmarhum" style="display:none;">
                                <label class="form-label">Nama Almarhum/Almarhumah <span class="text-danger">*</span></label>
                                <input type="text" name="nama_almarhum" class="form-control" value="{{ old('nama_almarhum') }}">
                            </div>

                            <div class="col-md-6 mb-3" id="fieldTanggalMeninggal" style="display:none;">
                                <label class="form-label">Tanggal Meninggal <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_meninggal" class="form-control" value="{{ old('tanggal_meninggal') }}">
                            </div>

                            <div class="col-md-12 mb-3" id="fieldTempatMeninggal" style="display:none;">
                                <label class="form-label">Tempat Meninggal <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_meninggal" class="form-control" value="{{ old('tempat_meninggal') }}">
                            </div>

                            <div class="col-md-12 mb-3" id="fieldSebabMeninggal" style="display:none;">
                                <label class="form-label">Sebab Meninggal</label>
                                <textarea name="sebab_meninggal" class="form-control" rows="2">{{ old('sebab_meninggal') }}</textarea>
                            </div>

                            <!-- FIELD KHUSUS PINDAH -->
                            <div class="col-md-12 mb-3" id="fieldAlamatTujuan" style="display:none;">
                                <label class="form-label">Alamat Tujuan <span class="text-danger">*</span></label>
                                <textarea name="alamat_tujuan" class="form-control" rows="3">{{ old('alamat_tujuan') }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3" id="fieldAlasanPindah" style="display:none;">
                                <label class="form-label">Alasan Pindah <span class="text-danger">*</span></label>
                                <select name="alasan_pindah" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="Pekerjaan">Pekerjaan</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Keamanan">Keamanan</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Perumahan">Perumahan</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- KEPERLUAN -->
                            <div class="col-12 mt-3 mb-3" id="keperluanSection" style="display:none;">
                                <h6 class="text-primary"><i class="ti ti-info-circle"></i> Keperluan Surat</h6>
                            </div>

                            <div class="col-md-12 mb-3" id="fieldKeperluan" style="display:none;">
                                <label class="form-label">Keperluan <span class="text-danger">*</span></label>
                                <textarea name="keperluan" id="keperluanInput" class="form-control" rows="3" placeholder="Keperluan akan otomatis terisi berdasarkan jenis surat...">{{ old('keperluan') }}</textarea>
                                <small class="text-muted">Anda dapat mengubah atau menambahkan keterangan jika diperlukan.</small>
                            </div>

                            <div class="col-md-12 mb-3" id="fieldKeterangan" style="display:none;">
                                <label class="form-label">Keterangan Tambahan</label>
                                <textarea name="keterangan_tambahan" class="form-control" rows="2" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan_tambahan') }}</textarea>
                            </div>

                            <!-- UPLOAD / LAMPIRAN -->
                            <div class="col-md-6 mb-3" id="fieldUploadKTP" style="display:none;">
                                <label class="form-label">Upload KTP <span class="text-danger">*</span></label>
                                <input type="file" name="lampiran_ktp" class="form-control @error('lampiran_ktp') is-invalid @enderror">
                                @error('lampiran_ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3" id="fieldUploadKK" style="display:none;">
                                <label class="form-label">Upload KK <span class="text-danger">*</span></label>
                                <input type="file" name="lampiran_kk" class="form-control @error('lampiran_kk') is-invalid @enderror">
                                @error('lampiran_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3" id="fieldBuktiUsaha" style="display:none;">
                                <label class="form-label">Bukti Usaha / Surat Dukungan</label>
                                <input type="file" name="bukti_usaha" class="form-control @error('bukti_usaha') is-invalid @enderror">
                                @error('bukti_usaha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3" id="fieldLampiranUmum" style="display:none;">
                                <label class="form-label">Lampiran Pendukung (opsional)</label>
                                <input type="file" name="lampiran_pendukung[]" class="form-control" multiple>
                            </div>

                            <!-- JIKA SURAT LAINNYA -->
                            <div class="col-md-12 mb-3" id="fieldJenisLainnya" style="display:none;">
                                <label class="form-label">Sebutkan Jenis Surat Lainnya <span class="text-danger">*</span></label>
                                <input type="text" name="jenis_lainnya" class="form-control" value="{{ old('jenis_lainnya') }}" placeholder="Nama jenis surat...">
                            </div>
                        </div>

                        <div class="mt-4" id="buttonSection" style="display:none;">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const jenisSurat = document.getElementById('jenisSurat');
    const deskripsiSurat = document.getElementById('deskripsiSurat');
    const deskripsiText = document.getElementById('deskripsiText');
    const keperluanInput = document.getElementById('keperluanInput');
    
    // Deskripsi untuk setiap jenis surat - SESUAIKAN DENGAN OPTION VALUE
    const deskripsiMap = {
        'Surat Keterangan Domisili': 'Surat yang menyatakan bahwa seseorang berdomisili di wilayah tertentu. Biasa digunakan untuk syarat administrasi sekolah, kuliah, melamar pekerjaan, atau pembuatan KTP.',
        'Surat Keterangan Tidak Mampu': 'Surat yang menyatakan kondisi ekonomi keluarga yang kurang mampu. Digunakan untuk mengajukan bantuan, beasiswa, keringanan biaya, atau keperluan sosial lainnya.',
        'Surat Keterangan Usaha': 'Surat yang menyatakan bahwa seseorang memiliki dan menjalankan usaha di wilayah desa. Digunakan untuk mengajukan kredit usaha, izin usaha, atau keperluan bisnis lainnya.',
        'Surat Pengantar KTP': 'Surat pengantar untuk mengurus pembuatan atau perpanjangan KTP di Dukcapil. Wajib dibawa saat mengurus KTP baru atau yang hilang.',
        'Surat Pengantar KK': 'Surat pengantar untuk mengurus Kartu Keluarga (KK) di Dukcapil. Diperlukan untuk penambahan anggota keluarga, perubahan data, atau KK hilang.', // VALUE SESUAI DENGAN OPTION
        'Surat Keterangan Kelahiran': 'Surat keterangan kelahiran bayi yang akan digunakan untuk mengurus Akta Kelahiran di Dukcapil. Harus diurus maksimal 60 hari setelah kelahiran.',
        'Surat Keterangan Kematian': 'Surat keterangan kematian seseorang yang diperlukan untuk pengurusan Akta Kematian dan keperluan administrasi lainnya.',
        'Surat Keterangan Pindah': 'Surat yang menyatakan seseorang pindah dari satu wilayah ke wilayah lain. Diperlukan untuk pengurusan administrasi kependudukan di tempat tujuan.',
        'Surat Keterangan Catatan Kepolisian': 'Surat pengantar dari desa untuk mengurus SKCK di Polsek/Polres. Biasa digunakan untuk melamar pekerjaan atau keperluan administrasi tertentu.',
        'Surat Lainnya': 'Jenis surat lainnya yang tidak termasuk dalam kategori di atas. Silakan jelaskan keperluan surat Anda pada bagian keterangan.'
    };

    // Keperluan otomatis untuk setiap jenis surat
    const keperluanMap = {
        'Surat Keterangan Domisili': 'Untuk keperluan administrasi sekolah, kuliah, melamar pekerjaan, atau pembuatan/perpanjangan KTP.',
        'Surat Keterangan Tidak Mampu': 'Untuk mengajukan bantuan, beasiswa, keringanan biaya, atau keperluan sosial lainnya.',
        'Surat Keterangan Usaha': 'Untuk mengajukan kredit usaha, izin usaha, atau keperluan bisnis lainnya.',
        'Surat Pengantar KTP': 'Untuk mengurus pembuatan atau perpanjangan KTP di Dukcapil.',
        'Surat Pengantar KK': 'Untuk mengurus Kartu Keluarga (KK) di Dukcapil.',
        'Surat Keterangan Kelahiran': 'Untuk mengurus Akta Kelahiran bayi di Dukcapil.',
        'Surat Keterangan Kematian': 'Untuk pengurusan Akta Kematian dan keperluan administrasi lainnya.',
        'Surat Keterangan Pindah': 'Untuk pengurusan administrasi kependudukan di tempat tujuan.',
        'Surat Keterangan Catatan Kepolisian': 'Untuk mengurus SKCK di Polsek/Polres atau keperluan pekerjaan.',
        'Surat Lainnya': 'Sesuai dengan keperluan yang dijelaskan di bagian keterangan.'
    };
    
    // Field yang wajib untuk setiap jenis surat - SESUAIKAN DENGAN OPTION VALUE
    const fieldMap = {
        'Surat Keterangan Domisili': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'keperluanSection', 'fieldKeperluan', 'fieldKeterangan', 'fieldUploadKTP', 'fieldUploadKK', 'buttonSection'],
        'Surat Keterangan Tidak Mampu': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'keperluanSection', 'fieldKeperluan', 'fieldKeterangan', 'fieldUploadKTP', 'fieldUploadKK', 'fieldLampiranUmum', 'buttonSection'],
        'Surat Keterangan Usaha': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'fieldNamaUsaha', 'fieldJenisUsaha', 'fieldAlamatUsaha', 'keperluanSection', 'fieldKeperluan', 'fieldBuktiUsaha', 'fieldLampiranUmum', 'buttonSection'],
        'Surat Pengantar KTP': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'fieldUploadKTP', 'keperluanSection', 'fieldKeperluan', 'fieldKeterangan', 'buttonSection'],
        'Surat Pengantar KK': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'fieldUploadKK', 'keperluanSection', 'fieldKeperluan', 'fieldKeterangan', 'buttonSection'],
        'Surat Keterangan Kelahiran': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'fieldNamaAnak', 'fieldJenisKelaminAnak', 'fieldTempatLahir', 'fieldTanggalLahir', 'fieldNamaAyah', 'fieldNamaIbu', 'keperluanSection', 'fieldKeperluan', 'fieldUploadKTP', 'fieldUploadKK', 'fieldLampiranUmum', 'fieldKeterangan', 'buttonSection'],
        'Surat Keterangan Kematian': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'fieldNamaAlmarhum', 'fieldTanggalMeninggal', 'fieldTempatMeninggal', 'fieldSebabMeninggal', 'fieldUploadKTP', 'fieldUploadKK', 'fieldLampiranUmum', 'keperluanSection', 'fieldKeperluan', 'fieldKeterangan', 'buttonSection'],
        'Surat Keterangan Pindah': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'fieldAlamatTujuan', 'fieldAlasanPindah', 'fieldUploadKTP', 'fieldUploadKK', 'keperluanSection', 'fieldKeperluan', 'fieldKeterangan', 'buttonSection'],
        'Surat Keterangan Catatan Kepolisian': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'fieldUploadKTP', 'keperluanSection', 'fieldKeperluan', 'fieldKeterangan', 'buttonSection'],
        'Surat Lainnya': ['dataPemohonSection', 'fieldNamaLengkap', 'fieldNIK', 'fieldAlamat', 'fieldRT', 'fieldRW', 'fieldTelepon', 'fieldJenisLainnya', 'fieldLampiranUmum', 'keperluanSection', 'fieldKeperluan', 'fieldKeterangan', 'buttonSection']
    };
    
    // Debug function untuk mengecek field
    function showAllFieldIds() {
        const allFields = document.querySelectorAll('[id]');
        console.log('Semua ID yang ada:');
        allFields.forEach(field => {
            if (field.id.includes('field') || field.id.includes('Section')) {
                console.log('- ' + field.id);
            }
        });
    }
    
    // Panggil debug function
    showAllFieldIds();
    
    jenisSurat.addEventListener('change', function() {
        console.log('Jenis surat dipilih:', this.value);
        
        // Sembunyikan semua field
        const allFields = document.querySelectorAll('[id^="field"], [id$="Section"], #buttonSection');
        allFields.forEach(field => {
            field.style.display = 'none';
            // Reset required attribute
            const inputs = field.querySelectorAll('input, select, textarea');
            inputs.forEach(input => input.removeAttribute('required'));
        });
        
        const selectedValue = this.value;
        
        if (selectedValue && deskripsiMap[selectedValue]) {
            // Tampilkan deskripsi
            deskripsiText.textContent = deskripsiMap[selectedValue];
            deskripsiSurat.style.display = 'block';
            
            // Auto-fill keperluan
            if (keperluanMap[selectedValue] && !document.querySelector('form').classList.contains('has-validation-error')) {
                keperluanInput.value = keperluanMap[selectedValue];
            }
            
            // Tampilkan field yang sesuai
            if (fieldMap[selectedValue]) {
                console.log('Field yang harus ditampilkan:', fieldMap[selectedValue]);
                
                fieldMap[selectedValue].forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field) {
                        console.log('Menampilkan field:', fieldId);
                        field.style.display = 'block';
                        
                        // Set required attribute untuk input fields (kecuali keterangan tambahan)
                        const inputs = field.querySelectorAll('input, select, textarea');
                        inputs.forEach(input => {
                            if (input.name !== 'keterangan_tambahan' && input.name !== 'sebab_meninggal') {
                                input.setAttribute('required', 'required');
                            }
                        });
                    } else {
                        console.log('Field tidak ditemukan:', fieldId);
                    }
                });
            }
        } else {
            deskripsiSurat.style.display = 'none';
            console.log('Jenis surat tidak valid atau tidak dipilih');
        }
    });
    
    // Trigger change event untuk menampilkan field jika sudah ada value (setelah form validation error)
    if (jenisSurat.value) {
        jenisSurat.dispatchEvent(new Event('change'));
    }
});
</script>

<style>
.form-label {
    font-weight: 500;
}
.alert-light {
    background-color: #f8f9fa;
}
</style>
@endsection