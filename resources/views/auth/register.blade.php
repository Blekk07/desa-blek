@extends('layouts.app')

@section('title', 'Registrasi Akun')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Registrasi Akun</h2>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <div class="grid grid-cols-2 gap-4">

            <!-- Kiri -->
            <div>
                <label>NIK *</label>
                <input type="text" name="nik" class="w-full border p-2 rounded" required>

                <label>No. KK</label>
                <input type="text" name="no_kk" class="w-full border p-2 rounded">

                <label>Nama Lengkap *</label>
                <input type="text" name="nama_lengkap" class="w-full border p-2 rounded" required>

                <label>Tempat Lahir *</label>
                <input type="text" name="tempat_lahir" class="w-full border p-2 rounded" required>

                <label>Tanggal Lahir *</label>
                <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded" required>

                <label>Jenis Kelamin *</label>
                <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>

                <label>Agama *</label>
                <select name="agama" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih --</option>
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Katolik</option>
                    <option>Hindu</option>
                    <option>Buddha</option>
                    <option>Konghucu</option>
                </select>
            </div>

            <!-- Kanan -->
            <div>
                <label>Alamat *</label>
                <input type="text" name="alamat_lengkap" class="w-full border p-2 rounded" required>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label>RT *</label>
                        <input type="number" name="rt" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label>RW *</label>
                        <input type="number" name="rw" class="w-full border p-2 rounded" required>
                    </div>
                </div>

                <label>Status Perkawinan *</label>
                <select name="status_perkawinan" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih --</option>
                    <option>Belum Kawin</option>
                    <option>Kawin</option>
                    <option>Cerai Hidup</option>
                    <option>Cerai Mati</option>
                </select>

                <label>Pendidikan Terakhir</label>
                <input type="text" name="pendidikan_terakhir" class="w-full border p-2 rounded">

                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="w-full border p-2 rounded">

                <label>Status Kependudukan *</label>
                <select name="status_kependudukan" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih --</option>
                    <option>Tetap</option>
                    <option>Tidak Tetap</option>
                </select>

                <label>No. Telepon</label>
                <input type="text" name="no_telepon" class="w-full border p-2 rounded">
            </div>

        </div>

        <hr class="my-4">

        <label>Email *</label>
        <input type="email" name="email" class="w-full border p-2 rounded mb-2" required>

        <label>Password *</label>
        <input type="password" name="password" class="w-full border p-2 rounded mb-2" required>

        <label>Konfirmasi Password *</label>
        <input type="password" name="password_confirmation" class="w-full border p-2 rounded mb-4" required>

        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
            Daftar
        </button>

        <p class="mt-4 text-center">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600">Login di sini</a>
        </p>
    </form>
</div>
@endsection
