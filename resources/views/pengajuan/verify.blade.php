@extends('layouts.app')

@section('title', 'Verifikasi Pengajuan #' . str_pad($pengajuan->id,5,'0',STR_PAD_LEFT))

@section('content')
    <div class="text-center mb-6">
        <h1 class="text-2xl font-semibold">Verifikasi Pengajuan</h1>
        <div class="text-sm text-gray-500 mt-1">ID Pengajuan: <strong>#{{ str_pad($pengajuan->id,5,'0',STR_PAD_LEFT) }}</strong></div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
            <div>
                <div class="mb-3 text-gray-600"><span class="font-semibold">Jenis Surat:</span> {{ $pengajuan->jenis_surat }}</div>
                <div class="mb-3 text-gray-600"><span class="font-semibold">Nama Pengaju:</span> {{ $pengajuan->getValue('nama_lengkap') ?? '-' }}</div>
                <div class="mb-3 text-gray-600"><span class="font-semibold">Tanggal Pengajuan:</span> {{ $pengajuan->created_at->format('d F Y H:i') }}</div>
            </div>

            <div class="text-right">
                @php
                    $status = $pengajuan->status;
                    $badge = 'bg-gray-100 text-gray-800';
                    if ($status === 'pending') { $badge = 'bg-yellow-100 text-yellow-800'; }
                    if ($status === 'diproses') { $badge = 'bg-blue-100 text-blue-800'; }
                    if ($status === 'selesai') { $badge = 'bg-green-100 text-green-800'; }
                    if ($status === 'ditolak') { $badge = 'bg-red-100 text-red-800'; }
                @endphp

                <div class="inline-block px-3 py-2 rounded-full {{ $badge }} font-semibold">{{ ucfirst($status) }}</div>

                @if(!empty($verifyUrl))
                    <div class="mt-4">
                        <a href="{{ $verifyUrl }}" class="inline-block text-sm text-indigo-600">Link verifikasi</a>
                    </div>
                @endif
            </div>
        </div>

        <hr class="my-6">

        <p class="text-gray-700">Halaman ini menampilkan bukti bahwa pengajuan dengan ID di atas terdaftar dalam sistem. QR yang dipindai pada dokumen berisi link verifikasi bertanda tangan yang memastikan keaslian.</p>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
            @if(auth()->check() && auth()->user()->id === $pengajuan->user_id)
                <a href="{{ route('user.pengajuan-surat.print', $pengajuan->id) }}" class="btn btn-primary">Unduh PDF</a>
            @endif
        </div>
    </div>
@endsection