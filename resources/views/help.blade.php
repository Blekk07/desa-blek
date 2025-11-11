@extends('layouts.dashboard')

@section('title', 'Help / Bantuan Sistem Informasi Desa')

@section('content')
<div class="pc-container content">
    <h1>Help / Bantuan Sistem Informasi Desa</h1>

    <div class="card">
        <h3>1. Apa itu Sistem Informasi Desa?</h3>
        <p>
            Sistem Informasi Desa adalah aplikasi berbasis web untuk mempermudah administrasi desa,
            mulai dari data penduduk, pengajuan surat, hingga informasi perkembangan desa.
        </p>
    </div>

    <div class="card">
        <h3>2. Cara Login</h3>
        <ol>
            <li>Buka halaman login sistem.</li>
            <li>Masukkan username/email dan password.</li>
            <li>Tekan tombol "Login".</li>
            <li>Jika berhasil, Anda akan diarahkan ke dashboard sesuai peran Anda (Admin/User).</li>
        </ol>
    </div>

    <div class="card">
        <h3>3. Dashboard</h3>
        <p>
            Dashboard menampilkan ringkasan informasi penting, seperti total penduduk, jumlah KK,
            dan pengajuan surat yang menunggu.
        </p>
    </div>

    <div class="card">
        <h3>4. Pengajuan Surat</h3>
        <ol>
            <li>Pilih menu "Pengajuan Surat" di sidebar.</li>
            <li>Isi formulir dengan lengkap: nama, NIK, jenis surat, dan keterangan.</li>
            <li>Klik tombol "Kirim Pengajuan".</li>
            <li>Admin akan memproses pengajuan sesuai prosedur.</li>
        </ol>
    </div>

    <div class="card">
        <h3>5. Informasi Desa</h3>
        <p>
            Menu ini menampilkan profil desa, termasuk nama desa, kecamatan, kabupaten,
            kepala desa, dan potensi desa.
        </p>
    </div>

    <div class="card">
        <h3>6. FAQ</h3>
        <ul>
            <li><b>Apa yang harus dilakukan jika lupa password?</b>  
            Klik "Lupa Password" di halaman login dan ikuti petunjuk reset.</li>

            <li><b>Bagaimana cara mengubah profil saya?</b>  
            Pergi ke menu <b>My Profile</b> di header, lalu edit informasi Anda.</li>

            <li><b>Siapa yang bisa mengakses dashboard Admin?</b>  
            Hanya user dengan role "Admin" yang bisa mengakses seluruh fitur.</li>
        </ul>
    </div>

    <div class="card">
        <h3>7. Kontak Bantuan</h3>
        <p>
            Jika ada masalah atau pertanyaan lebih lanjut, silakan hubungi:  
            <b>Email:</b> support@desajayamakmur.id <br>
            <b>Telepon:</b> 0812-3456-7890
        </p>
    </div>
</div>
@endsection
