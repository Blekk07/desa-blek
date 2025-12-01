@extends('layouts.auth')

@section('content')
    <div class="text-center mb-3">
        <h4 class="mb-0">Verifikasi Email</h4>
        <p class="text-muted mt-2">Masukkan kode yang dikirim ke alamat email Anda untuk menyelesaikan registrasi.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('verify.otp') }}">
        @csrf

        <div class="form-group">
            <label for="code" class="form-label">Kode OTP</label>
            <input id="code" name="code" type="text" class="form-control @error('code') is-invalid @enderror" required maxlength="8" autofocus>
            @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-primary">Verifikasi</button>
        </div>
    </form>

    <div class="saprator"></div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <form id="resend-form" method="POST" action="{{ route('send.otp') }}">
            @csrf
            <button type="submit" class="btn btn-link link-primary p-0">Kirim ulang kode</button>
        </form>

        <a href="{{ route('login') }}" class="link-primary">Kembali ke Login</a>
    </div>

@endsection
