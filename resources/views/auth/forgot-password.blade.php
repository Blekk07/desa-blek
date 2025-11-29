@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-75 py-5">
    <div class="card shadow-sm" style="max-width:420px; width:100%;">
        <div class="card-body p-4">
            <div class="text-center mb-3">
                <h4 class="mb-1">Lupa Password</h4>
                <p class="text-muted small mb-0">Masukkan alamat email yang terdaftar. Kami akan mengirimkan tautan untuk mereset password Anda.</p>
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

            <form method="POST" action="{{ route('forgot_password.send_link') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label small">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control" placeholder="email@contoh.com" />
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Kirim tautan reset</button>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none">Kembali ke Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
