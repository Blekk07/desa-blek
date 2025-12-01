@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-75 py-5">
    <div class="card shadow-sm" style="max-width:420px; width:100%;">
        <div class="card-body p-4">
            <div class="text-center mb-3">
                <h4 class="mb-1">Reset Password</h4>
                <p class="text-muted small mb-0">Masukkan password baru Anda untuk mereset akun.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" novalidate>
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label small">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required class="form-control" placeholder="email@contoh.com" />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small">Password Baru</label>
                    <input id="password" type="password" name="password" required class="form-control" placeholder="Masukkan password baru" />
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label small">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required class="form-control" placeholder="Konfirmasi password baru" />
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none">Kembali ke Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
