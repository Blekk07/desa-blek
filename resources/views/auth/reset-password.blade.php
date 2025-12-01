@extends('layouts.auth')

@section('title', 'Reset Password')

@push('styles')
<style>
    .reset-password-container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .reset-password-card {
        max-width: 480px;
        width: 100%;
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }

    .reset-password-card .card-body {
        padding: 2rem;
    }

    .reset-password-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .reset-password-header h4 {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #1e293b;
    }

    .reset-password-header p {
        font-size: 0.95rem;
        color: #64748b;
        line-height: 1.6;
        margin: 0;
    }

    .alert {
        border-radius: 8px;
        border: none;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .alert-success {
        background-color: #dcfce7;
        color: #166534;
    }

    .alert-danger {
        background-color: #fee2e2;
        color: #991b1b;
    }

    .alert ul {
        padding-left: 1.25rem;
        margin: 0;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.75rem;
        font-size: 0.95rem;
        display: block;
    }

    .form-control {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        width: 100%;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #dc2626;
    }

    .form-control.is-invalid:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
    }

    .invalid-feedback {
        display: block;
        color: #dc2626;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .reset-password-footer {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e2e8f0;
    }

    .reset-password-footer a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .reset-password-footer a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    .password-strength-info {
        font-size: 0.85rem;
        color: #64748b;
        margin-top: 0.5rem;
    }

    @media (max-width: 576px) {
        .reset-password-container {
            padding: 1rem;
        }

        .reset-password-card .card-body {
            padding: 1.5rem 1rem;
        }

        .reset-password-header h4 {
            font-size: 1.5rem;
        }

        .reset-password-header p {
            font-size: 0.9rem;
        }

        .form-control {
            font-size: 16px;
        }
    }
</style>
@endpush

@section('content')
<div class="reset-password-container">
    <div class="card reset-password-card">
        <div class="card-body">
            <div class="reset-password-header">
                <h4>Reset Password</h4>
                <p>Masukkan password baru untuk akun Anda. Pastikan password kuat dan mudah diingat.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="ti ti-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="ti ti-alert-circle me-2"></i>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" novalidate>
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="ti ti-mail me-1"></i>Email
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $email) }}" 
                        required 
                        readonly
                        class="form-control" 
                        placeholder="nama@email.com"
                    />
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="ti ti-lock me-1"></i>Password Baru
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        class="form-control @error('password') is-invalid @enderror" 
                        placeholder="Masukkan password baru"
                    />
                    <div class="password-strength-info">
                        <i class="ti ti-info-circle me-1"></i>Minimal 8 karakter, kombinasi huruf, angka, dan simbol
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            <i class="ti ti-alert-triangle me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="ti ti-lock-check me-1"></i>Konfirmasi Password
                    </label>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        placeholder="Ulangi password baru"
                    />
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            <i class="ti ti-alert-triangle me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="ti ti-check me-2"></i>Reset Password
                    </button>
                </div>

                <div class="reset-password-footer">
                    <a href="{{ route('login') }}">
                        <i class="ti ti-arrow-left me-1"></i>Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
