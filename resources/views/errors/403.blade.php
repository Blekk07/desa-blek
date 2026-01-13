@extends('layouts.app')

@section('title', 'Tautan Verifikasi Tidak Valid')

@section('content')
    <div class="text-center">
        <h1 class="text-2xl font-semibold text-red-600 mb-2">Tautan Verifikasi Tidak Valid</h1>
        <p class="text-gray-600 mb-6">Maaf, tautan verifikasi yang Anda akses tidak valid atau sudah kedaluwarsa.</p>

        <div class="max-w-md mx-auto bg-white rounded-lg shadow-sm p-6">
            <p class="text-gray-700">Kemungkinan penyebab:</p>
            <ul class="text-gray-600 list-disc list-inside mb-4">
                <li>Tautan telah kedaluwarsa (signature sudah kadaluarsa).</li>
                <li>Tautan telah dimodifikasi dan signature tidak cocok.</li>
                <li>Tautan bukan berasal dari dokumen resmi.</li>
            </ul>

            <p class="text-gray-700">Jika Anda merasa ini kesalahan, silakan hubungi pihak desa atau admin untuk meminta verifikasi ulang.</p>

            <div class="mt-6 flex justify-center gap-3">
                <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
                <a href="/contact-us" class="btn btn-primary">Hubungi Admin</a>
            </div>
        </div>
    </div>
@endsection