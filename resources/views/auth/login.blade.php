@extends('layouts.auth')

@section('title', 'Login Page')

@section('content')
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="mb-0" style="color: var(--text);"><b>Login</b></h3>
            <a href="/register" class="link-primary">Don't have an account?</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- =======================
             NIK INPUT (FIXED)
        ======================== --}}
        <div class="form-group mb-3">
            <label class="form-label">NIK</label>
            <input 
                type="text"
                class="form-control @error('nik') is-invalid @enderror"
                name="nik" 
                id="nik"
                placeholder="NIK"
                value="{{ old('nik') }}" 
                autocomplete="off" 
                required
                maxlength="16"
                inputmode="numeric"
            >
            @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- =======================
             PASSWORD
        ======================== --}}
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input 
                id="password" 
                type="password" 
                class="form-control" 
                name="password" 
                placeholder="Password" 
                required
            >
        </div>

        <div class="d-flex mt-1 justify-content-between">
            <div>
                <label class="switch-label-inline">
                    <span class="switch">
                        <input type="checkbox" id="customCheckc1" name="remember">
                        <span class="switch-slider"></span>
                    </span>
                    <span class="form-check-label text-muted">Keep me signed in</span>
                </label>
            </div>
            <a href="{{ route('forgot_password.email_form') }}" class="text-secondary f-w-400">Forgot Password?</a>
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <div class="saprator mt-3">
            <span>Login with</span>
        </div>
        
        @include('auth.sso')

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nikInput = document.getElementById('nik');
            if (nikInput) {
                nikInput.addEventListener('input', function () {
                    // Hanya angka
                    this.value = this.value.replace(/[^0-9]/g, '');
                    // Maksimal 16 digit
                    if (this.value.length > 16) {
                        this.value = this.value.slice(0, 16);
                    }
                });
            }

            // Form submission handler
            const form = document.querySelector('form[method="post"]');
            if (form) {
                form.addEventListener('submit', function() {
                    const submitButton = this.querySelector('button[type="submit"]');
                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.classList.add('btn-loading');
                        submitButton.innerHTML = 'Processing...';
                    }
                });
            }
        });
    </script>
@endsection