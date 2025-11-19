@extends('layouts.dashboard')
@section('title', 'Detail Pengaduan')

@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h5>Detail Pengaduan</h5>
            </div>
            <div class="card-body">

                <p><strong>Nama Pelapor:</strong> {{ $pengaduan->user->name }}</p>
                <p><strong>Judul Pengaduan:</strong> {{ $pengaduan->judul }}</p>
                <p><strong>Isi Laporan:</strong></p>
                <p>{{ $pengaduan->isi }}</p>

                @if ($pengaduan->foto)
                <div class="mt-3">
                    <p><strong>Bukti Foto:</strong></p>
                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" width="300" class="rounded shadow">
                </div>
                @endif

                <hr>
                <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST">
                    @csrf
                    <label>Status Laporan:</label>
                    <select name="status" class="form-control mb-3">
                        <option value="pending" {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>

                    <button class="btn btn-primary">Update Status</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
