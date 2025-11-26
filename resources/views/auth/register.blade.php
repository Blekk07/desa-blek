@extends('layouts.auth')

@section('title', 'Registrasi Akun')

@section('content')
<div class="card mt-4">
    <div class="card-body">
        <h4 class="mb-4 f-w-500 text-center">Registrasi Akun</h4>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="ti ti-alert-circle me-2"></i>
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- STEP INDICATOR -->
        <div class="d-flex justify-content-between mb-4">
            <div class="step-item text-center" id="step-1-btn">
                <div class="step-circle active">1</div>
                <small>Data Pribadi</small>
            </div>
            <div class="step-item text-center" id="step-2-btn">
                <div class="step-circle">2</div>
                <small>Alamat & Status</small>
            </div>
            <div class="step-item text-center" id="step-3-btn">
                <div class="step-circle">3</div>
                <small>Akun Login</small>
            </div>
        </div>

        <form id="register-form" action="{{ route('register.post') }}" method="POST">
            @csrf

            <!-- ================= STEP 1 ================= -->
            <div class="step-content" id="step-1">
                <div class="row">
                    <div class="col-md-6">
                        <!-- NIK -->
                        <div class="mb-3">
                            <label class="form-label">NIK <span class="text-danger">*</span></label>
                            <input type="text" name="nik" id="nik"
                                class="form-control @error('nik') is-invalid @enderror"
                                value="{{ old('nik') }}" required maxlength="16"
                                inputmode="numeric"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,16)">
                            @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- No KK -->
                        <div class="mb-3">
                            <label class="form-label">No. KK</label>
                            <input type="text" name="no_kk"
                                class="form-control @error('no_kk') is-invalid @enderror"
                                value="{{ old('no_kk') }}"
                                inputmode="numeric"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,16)">
                            @error('no_kk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Nama -->
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                value="{{ old('nama_lengkap') }}" required>
                            @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                value="{{ old('tempat_lahir') }}" required>
                            @error('tempat_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                value="{{ old('tanggal_lahir') }}" required>
                            @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                <option value="L" {{ old('jenis_kelamin')=='L'?'selected':'' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin')=='P'?'selected':'' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Agama <span class="text-danger">*</span></label>
                            <select name="agama" id="agama"
                                class="form-select @error('agama') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agm)
                                    <option value="{{ $agm }}" {{ old('agama')==$agm?'selected':'' }}>{{ $agm }}</option>
                                @endforeach
                            </select>
                            @error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary w-100 mt-3" onclick="validateStep1()">
                    Lanjut ke Step 2 →
                </button>
            </div>

            <!-- ================= STEP 2 ================= -->
            <div class="step-content d-none" id="step-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="alamat_lengkap" id="alamat_lengkap"
                                class="form-control @error('alamat_lengkap') is-invalid @enderror"
                                value="{{ old('alamat_lengkap') }}" required>
                            @error('alamat_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">RT <span class="text-danger">*</span></label>
                                <input type="number" name="rt" id="rt"
                                    class="form-control @error('rt') is-invalid @enderror"
                                    value="{{ old('rt') }}" required>
                                @error('rt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">RW <span class="text-danger">*</span></label>
                                <input type="number" name="rw" id="rw"
                                    class="form-control @error('rw') is-invalid @enderror"
                                    value="{{ old('rw') }}" required>
                                @error('rw') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                            <select name="status_perkawinan" id="status_perkawinan"
                                class="form-select @error('status_perkawinan') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                @foreach(['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $sp)
                                    <option value="{{ $sp }}" {{ old('status_perkawinan')==$sp?'selected':'' }}>{{ $sp }}</option>
                                @endforeach
                            </select>
                            @error('status_perkawinan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir"
                                class="form-control @error('pendidikan_terakhir') is-invalid @enderror"
                                value="{{ old('pendidikan_terakhir') }}">
                            @error('pendidikan_terakhir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" id="pekerjaan"
                                class="form-control @error('pekerjaan') is-invalid @enderror"
                                value="{{ old('pekerjaan') }}">
                            @error('pekerjaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Kependudukan <span class="text-danger">*</span></label>
                            <select name="status_kependudukan" id="status_kependudukan"
                                class="form-select @error('status_kependudukan') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                <option value="Tetap" {{ old('status_kependudukan')=='Tetap'?'selected':'' }}>Tetap</option>
                                <option value="Tidak Tetap" {{ old('status_kependudukan')=='Tidak Tetap'?'selected':'' }}>Tidak Tetap</option>
                            </select>
                            @error('status_kependudukan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon"
                                class="form-control @error('no_telepon') is-invalid @enderror"
                                value="{{ old('no_telepon') }}">
                            @error('no_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-secondary w-100 mt-3 mb-2" onclick="nextStep(1)">← Kembali</button>
                <button type="button" class="btn btn-primary w-100" onclick="validateStep2()">Lanjut ke Step 3 →</button>
            </div>

            <!-- ================= STEP 3 ================= -->
            <div class="step-content d-none" id="step-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" id="confirm"
                        class="form-control" required>
                </div>

                <button type="button" class="btn btn-secondary w-100 mb-2" onclick="nextStep(2)">← Kembali</button>

                <button type="submit" class="btn btn-primary w-100 mb-4">
                    <i class="ti ti-user-plus me-2"></i>Daftar Akun
                </button>

                <div class="text-center">
                    <p class="mb-0">Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-primary">Login di sini</a>
                    </p>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- SCRIPT STEPPER & VALIDATION -->
<script>
    function nextStep(step) {
        document.querySelectorAll('.step-content').forEach(e => e.classList.add('d-none'));
        document.getElementById("step-" + step).classList.remove('d-none');

        document.querySelectorAll('.step-circle').forEach(e => e.classList.remove('active'));
        document.querySelector("#step-" + step + "-btn .step-circle").classList.add('active');
    }

    function validateStep1() {
        let requiredFields = [
            "nik", "nama_lengkap", "tempat_lahir",
            "tanggal_lahir", "jenis_kelamin", "agama"
        ];

        for (let id of requiredFields) {
            if (document.getElementById(id).value.trim() === "") {
                alert("Harap lengkapi semua data pada Step 1.");
                return;
            }
        }

        nextStep(2);
    }

    function validateStep2() {
        let requiredFields = [
            "alamat_lengkap", "rt", "rw",
            "status_perkawinan", "status_kependudukan"
        ];

        for (let id of requiredFields) {
            if (document.getElementById(id).value.trim() === "") {
                alert("Harap lengkapi semua data pada Step 2.");
                return;
            }
        }

        nextStep(3);
    }
</script>

<style>
    .step-circle {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #e5e5e5;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        font-weight: bold;
    }

    .step-circle.active {
        background: #0d6efd;
        color: white;
    }
</style>
@endsection
