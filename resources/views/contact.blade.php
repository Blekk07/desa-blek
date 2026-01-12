@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')

<section class="page-header py-5 bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="h2 fw-bold mb-1">Hubungi Kami</h1>
                <p class="text-muted mb-0">Kirim pertanyaan atau laporan, kami akan membalas secepatnya.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-white rounded shadow-sm p-4">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Subjek</label>
                                <input name="subject" value="{{ old('subject') }}" type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subjek Pesan">
                                @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Pesan</label>
                                <textarea name="message" class="form-control form-control-lg @error('message') is-invalid @enderror" rows="6" placeholder="Tuliskan pesan Anda di sini...">{{ old('message') }}</textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>

            <aside class="col-lg-4">
                <div class="bg-white rounded shadow-sm p-4 mb-4">
                    <h5 class="mb-2">Kontak & Lokasi</h5>
                    <p class="mb-1"><i class="ti ti-map-pin me-2"></i>Jl. Desa Maju No. 123, Kecamatan Harapan</p>
                    <p class="mb-1"><i class="ti ti-mail me-2"></i>desa@desa-maju.go.id</p>
                    <p class="mb-1"><i class="ti ti-phone me-2"></i>(021) 9876-5432</p>
                    <p class="mb-0"><i class="ti ti-clock me-2"></i>Senin - Jumat: 08:00 - 16:00</p>
                </div>

                <div class="bg-white rounded shadow-sm p-4">
                    <h5 class="mb-3">Berita Terbaru</h5>
                    <ul class="list-unstyled">
                        @foreach($recentBeritas ?? [] as $r)
                            <li class="mb-2"><a href="{{ route('berita.show', $r) }}" class="text-decoration-none">{{ Str::limit($r->judul, 70) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
