@extends('layouts.auth')

@section('title', 'Verifikasi Email OTP')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-75 py-5">
    <div class="card shadow-sm" style="max-width:420px; width:100%;">
        <div class="card-body p-4">
            <div class="text-center mb-3">
                <h4 class="mb-1">Verifikasi Email</h4>
                <p class="text-muted small mb-0">Masukkan kode OTP yang telah dikirim ke email Anda.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success small">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger small">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('verify.otp') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="code" class="form-label small">Kode OTP (6 Digit)</label>
                    <input id="code" type="text" name="code" maxlength="6" placeholder="000000" 
                           class="form-control text-center font-monospace fs-4 @error('code') is-invalid @enderror" 
                           required autofocus />
                    @error('code')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                </div>

                <div class="text-center mt-3">
                    <p class="small text-muted mb-2">Tidak menerima kode?</p>
                    <form method="POST" action="{{ route('send.otp') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link btn-sm">Kirim Ulang Kode</button>
                    </form>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none small">Kembali ke Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
