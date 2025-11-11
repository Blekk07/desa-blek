@extends('layouts.app')

@section('title', 'Registrasi Akun')

@section('content')
<div class="container mx-auto max-w-md p-6 bg-white shadow-md rounded-md mt-10">
    <h2 class="text-2xl font-semibold text-center mb-6">Registrasi Akun</h2>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <label for="nik" class="block mt-2">NIK *</label>
        <input type="text" name="nik" value="{{ old('nik') }}" class="w-full border p-2 rounded" required>

        <label for="no_kk" class="block mt-2">No. KK</label>
        <input type="text" name="no_kk" value="{{ old('no_kk') }}" class="w-full border p-2 rounded">

        <label for="nama_lengkap" class="block mt-2">Nama Lengkap *</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="w-full border p-2 rounded" required>

        <label for="tempat_lahir" class="block mt-2">Tempat Lahir *</label>
        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="w-full border p-2 rounded" required>

        <label for="tanggal_lahir" class="block mt-2">Tanggal Lahir *</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full border p-2 rounded" required>

        <label for="jenis_kelamin" class="block mt-2">Jenis Kelamin *</label>
        <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <label for="agama" class="block mt-2">Agama *</label>
        <input type="text" name="agama" value="{{ old('agama') }}" class="w-full border p-2 rounded" required>

        <label for="alamat_lengkap" class="block mt-2">Alamat *</label>
        <textarea name="alamat_lengkap" class="w-full border p-2 rounded" required>{{ old('alamat_lengkap') }}</textarea>

        <label for="rt" class="block mt-2">RT *</label>
        <input type="text" name="rt" value="{{ old('rt') }}" class="w-full border p-2 rounded" required>

        <label for="rw" class="block mt-2">RW *</label>
        <input type="text" name="rw" value="{{ old('rw') }}" class="w-full border p-2 rounded" required>

        <label for="status_perkawinan" class="block mt-2">Status Perkawinan *</label>
        <select name="status_perkawinan" class="w-full border p-2 rounded" required>
            <option value="">-- Pilih Status --</option>
            <option value="Belum Kawin">Belum Kawin</option>
            <option value="Kawin">Kawin</option>
            <option value="Cerai Hidup">Cerai Hidup</option>
            <option value="Cerai Mati">Cerai Mati</option>
        </select>

        <label for="pendidikan_terakhir" class="block mt-2">Pendidikan Terakhir</label>
        <input type="text" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}" class="w-full border p-2 rounded">

        <label for="pekerjaan" class="block mt-2">Pekerjaan *</label>
        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" class="w-full border p-2 rounded" required>

        <label for="status_kependudukan" class="block mt-2">Status Kependudukan *</label>
        <select name="status_kependudukan" class="w-full border p-2 rounded" required>
            <option value="">-- Pilih Status --</option>
            <option value="Tetap" selected>Tetap</option>
            <option value="Pendatang">Pendatang</option>
            <option value="Pindah">Pindah</option>
        </select>

        <label for="nama_ayah" class="block mt-2">Nama Ayah</label>
        <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="w-full border p-2 rounded">

        <label for="nama_ibu" class="block mt-2">Nama Ibu</label>
        <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="w-full border p-2 rounded">

        <label for="no_telepon" class="block mt-2">No. Telepon</label>
        <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" class="w-full border p-2 rounded">

        <label for="email" class="block mt-2">Email *</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2 rounded" required>

        <label for="password" class="block mt-2">Password *</label>
        <input type="password" name="password" class="w-full border p-2 rounded" required>

        <label for="password_confirmation" class="block mt-2">Konfirmasi Password *</label>
        <input type="password" name="password_confirmation" class="w-full border p-2 rounded" required>

        <button type="submit" class="w-full mt-4 bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Daftar</button>

        <p class="mt-4 text-center text-sm">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600">Login di sini</a>
        </p>
    </form>
</div>
@endsection
