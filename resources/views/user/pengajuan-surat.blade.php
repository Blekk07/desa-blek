@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Form Pengajuan Surat</h2>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('user.pengajuan-surat.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Jenis Surat</label>
                    <select class="form-control" name="jenis_surat" required>
                        <option value="">-- Pilih Surat --</option>
                        <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                        <option value="Surat Keterangan Tidak Mampu (SKTM)">Surat Keterangan Tidak Mampu (SKTM)</option>
                        <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                        <option value="Surat Keterangan Kehilangan">Surat Keterangan Kehilangan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tujuan Pengajuan</label>
                    <textarea name="tujuan" class="form-control" rows="3" placeholder="Contoh: Untuk syarat sekolah" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload KTP</label>
                    <input type="file" name="ktp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload KK</label>
                    <input type="file" name="kk" class="form-control" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Ajukan Surat</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
