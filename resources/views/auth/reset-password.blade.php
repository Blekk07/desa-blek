@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="auth-container">
    <h2>Reset Password</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required class="form-control" />
        </div>

        <div class="form-group">
            <label for="password">Password Baru</label>
            <input id="password" type="password" name="password" required class="form-control" />
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="form-control" />
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Reset Password</button>
            <a href="{{ route('login') }}" class="btn btn-link">Kembali ke Login</a>
        </div>
    </form>
</div>
@endsection
