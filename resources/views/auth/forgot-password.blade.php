@extends('layouts.auth')

@section('title', 'Lupa Password')

@push('styles')
<style>
    .forgot-password-container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .forgot-password-card {
        max-width: 420px;
        width: 100%;
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }

    .forgot-password-card .card-body {
        padding: 2rem;
    }

    .forgot-password-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .forgot-password-header h4 {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #1e293b;
    }

    .forgot-password-header p {
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

    .form-label {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.75rem;
        font-size: 0.95rem;
    }

    .form-control {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .input-group-text {
        background-color: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #64748b;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .forgot-password-footer {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e2e8f0;
    }

    .forgot-password-footer a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .forgot-password-footer a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    @media (max-width: 576px) {
        .forgot-password-container {
            padding: 1rem;
        }

        .forgot-password-card .card-body {
            padding: 1.5rem 1rem;
        }

        .forgot-password-header h4 {
            font-size: 1.5rem;
        }

        .forgot-password-header p {
            font-size: 0.9rem;
        }

        .form-control {
            font-size: 16px;
        }
    }
</style>
@endpush

@section('content')
<div class="forgot-password-container">
    <div class="card forgot-password-card">
        <div class="card-body">
            <div class="forgot-password-header">
                <h4>Lupa Password?</h4>
                <p>Masukkan alamat email yang terdaftar. Kami akan mengirimkan tautan untuk mereset password Anda.</p>
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
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('forgot_password.send_link') }}" novalidate>
                @csrf

                <div class="mb-4">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="ti ti-mail"></i>
                        </span>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            class="form-control @error('email') is-invalid @enderror" 
                            placeholder="nama@email.com"
                        />
                    </div>
                    @error('email')
                        <small class="text-danger d-block mt-2">
                            <i class="ti ti-alert-triangle me-1"></i>{{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="ti ti-send me-2"></i>Kirim Tautan Reset
                    </button>
                </div>

                <div class="forgot-password-footer">
                    <span class="text-muted">Ingat password Anda?</span>
                    <a href="{{ route('login') }}" class="ms-2">
                        <i class="ti ti-arrow-left me-1"></i>Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
