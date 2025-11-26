@extends('layouts.auth')

@section('title', 'Registrasi Akun')

@section('content')
    <form id="register-form" action="{{ route('register.post') }}" method="POST">
        @csrf
        
        <div class="text-center mb-4">
            <h3 class="mb-2" style="color: var(--text);">Registrasi Akun</h3>
            <p class="text-muted">Silakan lengkapi data diri Anda untuk membuat akun baru</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Stepper -->
        <div class="stepper-wrapper mb-5">
            <div class="stepper-item active">
                <div class="step-counter">1</div>
                <div class="step-name">Data Diri</div>
            </div>
            <div class="stepper-item">
                <div class="step-counter">2</div>
                <div class="step-name">Data Alamat</div>
            </div>
            <div class="stepper-item">
                <div class="step-counter">3</div>
                <div class="step-name">Akun Login</div>
            </div>
        </div>

        <!-- Step 1: Data Diri -->
        <div class="step-content active" id="step1">
            <h5 class="mb-4" style="color: var(--text);">Data Diri</h5>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">NIK <span class="text-danger">*</span></label>
                        <input type="text" name="nik" id="nik"
                            class="form-control @error('nik') is-invalid @enderror"
                            value="{{ old('nik') }}" placeholder="Masukkan 16 digit NIK" required
                            maxlength="16">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">No. KK</label>
                        <input type="text" name="no_kk"
                            class="form-control @error('no_kk') is-invalid @enderror"
                            value="{{ old('no_kk') }}" placeholder="Masukkan No. KK" maxlength="16">
                        @error('no_kk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                            value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap" required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                            value="{{ old('tempat_lahir') }}" placeholder="Masukkan tempat lahir" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L" {{ old('jenis_kelamin')=='L'?'selected':'' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin')=='P'?'selected':'' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Agama <span class="text-danger">*</span></label>
                        <select name="agama" id="agama"
                            class="form-control @error('agama') is-invalid @enderror" required>
                            <option value="">-- Pilih Agama --</option>
                            @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agm)
                                <option value="{{ $agm }}" {{ old('agama')==$agm?'selected':'' }}>{{ $agm }}</option>
                            @endforeach
                        </select>
                        @error('agama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <div></div> <!-- Spacer -->
                <button type="button" class="btn btn-primary next-step" data-next="step2">
                    Selanjutnya <i class="ti ti-arrow-right ms-1"></i>
                </button>
            </div>
        </div>

        <!-- Step 2: Data Alamat & Status -->
        <div class="step-content" id="step2">
            <h5 class="mb-4" style="color: var(--text);">Data Alamat & Status</h5>
            
            <div class="form-group mb-3">
                <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="alamat_lengkap" id="alamat_lengkap"
                    class="form-control @error('alamat_lengkap') is-invalid @enderror"
                    value="{{ old('alamat_lengkap') }}" placeholder="Masukkan alamat lengkap" required>
                @error('alamat_lengkap')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">RT <span class="text-danger">*</span></label>
                        <input type="number" name="rt" id="rt"
                            class="form-control @error('rt') is-invalid @enderror"
                            value="{{ old('rt') }}" placeholder="RT" required min="1">
                        @error('rt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">RW <span class="text-danger">*</span></label>
                        <input type="number" name="rw" id="rw"
                            class="form-control @error('rw') is-invalid @enderror"
                            value="{{ old('rw') }}" placeholder="RW" required min="1">
                        @error('rw')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                        <select name="status_perkawinan" id="status_perkawinan"
                            class="form-control @error('status_perkawinan') is-invalid @enderror" required>
                            <option value="">-- Pilih Status Perkawinan --</option>
                            @foreach(['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $sp)
                                <option value="{{ $sp }}" {{ old('status_perkawinan')==$sp?'selected':'' }}>{{ $sp }}</option>
                            @endforeach
                        </select>
                        @error('status_perkawinan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Status Kependudukan <span class="text-danger">*</span></label>
                        <select name="status_kependudukan" id="status_kependudukan"
                            class="form-control @error('status_kependudukan') is-invalid @enderror" required>
                            <option value="">-- Pilih Status Kependudukan --</option>
                            <option value="Tetap" {{ old('status_kependudukan')=='Tetap'?'selected':'' }}>Tetap</option>
                            <option value="Tidak Tetap" {{ old('status_kependudukan')=='Tidak Tetap'?'selected':'' }}>Tidak Tetap</option>
                        </select>
                        @error('status_kependudukan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir"
                            class="form-control @error('pendidikan_terakhir') is-invalid @enderror"
                            value="{{ old('pendidikan_terakhir') }}" placeholder="Masukkan pendidikan terakhir">
                        @error('pendidikan_terakhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan"
                            class="form-control @error('pekerjaan') is-invalid @enderror"
                            value="{{ old('pekerjaan') }}" placeholder="Masukkan pekerjaan">
                        @error('pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon"
                    class="form-control @error('no_telepon') is-invalid @enderror"
                    value="{{ old('no_telepon') }}" placeholder="Masukkan nomor telepon">
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-secondary prev-step" data-prev="step1">
                    <i class="ti ti-arrow-left me-1"></i> Sebelumnya
                </button>
                <button type="button" class="btn btn-primary next-step" data-next="step3">
                    Selanjutnya <i class="ti ti-arrow-right ms-1"></i>
                </button>
            </div>
        </div>

        <!-- Step 3: Akun Login -->
        <div class="step-content" id="step3">
            <h5 class="mb-4" style="color: var(--text);">Akun Login</h5>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="Masukkan email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="Masukkan password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                <input type="password" name="password_confirmation" id="confirm"
                    class="form-control" placeholder="Konfirmasi password" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-secondary prev-step" data-prev="step2">
                    <i class="ti ti-arrow-left me-1"></i> Sebelumnya
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-user-plus me-1"></i> Daftar Akun
                </button>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted">Sudah punya akun?
                    <a href="{{ route('login') }}" class="link-primary">Login di sini</a>
                </p>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Stepper functionality
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            const stepContents = document.querySelectorAll('.step-content');
            const stepperItems = document.querySelectorAll('.stepper-item');

            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nextStep = this.getAttribute('data-next');
                    if (validateCurrentStep(nextStep)) {
                        showStep(nextStep);
                        updateStepper(nextStep);
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const prevStep = this.getAttribute('data-prev');
                    showStep(prevStep);
                    updateStepper(prevStep);
                });
            });

            function showStep(stepId) {
                stepContents.forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(stepId).classList.add('active');
            }

            function updateStepper(stepId) {
                const stepNumber = parseInt(stepId.replace('step', ''));
                stepperItems.forEach((item, index) => {
                    item.classList.remove('active', 'completed');
                    if (index + 1 < stepNumber) {
                        item.classList.add('completed');
                    } else if (index + 1 === stepNumber) {
                        item.classList.add('active');
                    }
                });
            }

            function validateCurrentStep(nextStep) {
                const currentStep = document.querySelector('.step-content.active').id;
                
                if (currentStep === 'step1') {
                    const requiredFields = ['nik', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama'];
                    for (let id of requiredFields) {
                        const field = document.getElementById(id);
                        if (!field.value.trim()) {
                            alert(`Harap lengkapi field: ${field.previousElementSibling.textContent.trim()}`);
                            field.focus();
                            return false;
                        }
                    }
                    
                    // Validate NIK length
                    const nik = document.getElementById('nik').value;
                    if (nik.length !== 16) {
                        alert('NIK harus 16 digit');
                        document.getElementById('nik').focus();
                        return false;
                    }
                }
                
                if (currentStep === 'step2') {
                    const requiredFields = ['alamat_lengkap', 'rt', 'rw', 'status_perkawinan', 'status_kependudukan'];
                    for (let id of requiredFields) {
                        const field = document.getElementById(id);
                        if (!field.value.trim()) {
                            alert(`Harap lengkapi field: ${field.previousElementSibling.textContent.trim()}`);
                            field.focus();
                            return false;
                        }
                    }
                }
                
                return true;
            }

            // NIK validation
            const nikInput = document.getElementById('nik');
            if (nikInput) {
                nikInput.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                    if (this.value.length > 16) {
                        this.value = this.value.slice(0, 16);
                    }
                });
            }

            // No. KK validation
            const noKkInput = document.querySelector('input[name="no_kk"]');
            if (noKkInput) {
                noKkInput.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                    if (this.value.length > 16) {
                        this.value = this.value.slice(0, 16);
                    }
                });
            }

            // Form submission handler
            const form = document.getElementById('register-form');
            if (form) {
                form.addEventListener('submit', function() {
                    const submitButton = this.querySelector('button[type="submit"]');
                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.classList.add('btn-loading');
                        submitButton.innerHTML = 'Memproses...';
                    }
                });
            }
        });
    </script>

    <style>
        .stepper-wrapper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .stepper-item {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }
        .stepper-item::before {
            position: absolute;
            content: "";
            border-bottom: 2px solid #e5e7eb;
            width: 100%;
            top: 15px;
            left: -50%;
            z-index: 2;
        }
        .stepper-item::after {
            position: absolute;
            content: "";
            border-bottom: 2px solid #e5e7eb;
            width: 100%;
            top: 15px;
            left: 50%;
            z-index: 2;
        }
        .stepper-item:first-child::before {
            content: none;
        }
        .stepper-item:last-child::after {
            content: none;
        }
        .step-counter {
            position: relative;
            z-index: 5;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #e5e7eb;
            color: #6b7280;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 6px;
        }
        .stepper-item.completed .step-counter {
            background-color: #10b981;
            color: white;
        }
        .stepper-item.active .step-counter {
            background-color: #2563eb;
            color: white;
        }
        .step-name {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
        }
        .stepper-item.completed .step-name {
            color: #10b981;
        }
        .stepper-item.active .step-name {
            color: #2563eb;
            font-weight: 600;
        }
        .step-content {
            display: none;
        }
        .step-content.active {
            display: block;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px;
        }
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0 8px;
        }
        @media (max-width: 768px) {
            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .stepper-wrapper {
                flex-direction: column;
                gap: 15px;
            }
            .stepper-item::before,
            .stepper-item::after {
                display: none;
            }
        }
    </style>
@endsection