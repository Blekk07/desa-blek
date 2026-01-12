@extends('layouts.landing')

@section('title', 'Hubungi Kami')

@section('content')

<header id="home">
    <div class="header-bg-container"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="hero-title fw-bold mb-1">Hubungi Kami</h1>
                <p class="hero-subtitle mb-0">Kirim pertanyaan atau laporan, kami akan membalas secepatnya.</p>
            </div>
        </div>
    </div>
</header> 

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
                    <h5 class="mb-3">Kontak & Lokasi</h5>

                    <div class="row gx-2 gy-2 align-items-center">
                        <div class="col-2 text-center">
                            <i class="ti ti-map-pin fs-4 text-primary"></i>
                        </div>
                        <div class="col-10">
                            <div class="fw-semibold small mb-0">Alamat</div>
                            <div class="text-muted small">Jl. Desa Maju No. 123, Kecamatan Harapan</div>
                        </div>

                        <div class="col-2 text-center">
                            <i class="ti ti-mail fs-4 text-primary"></i>
                        </div>
                        <div class="col-10">
                            <div class="fw-semibold small mb-0">Email</div>
                            <div class="text-muted small"><a href="mailto:desa@desa-maju.go.id">desa@desa-maju.go.id</a></div>
                        </div>

                        <div class="col-2 text-center">
                            <i class="ti ti-phone fs-4 text-primary"></i>
                        </div>
                        <div class="col-10">
                            <div class="fw-semibold small mb-0">Telepon</div>
                            <div class="text-muted small">(021) 9876-5432</div>
                        </div>

                        <div class="col-2 text-center">
                            <i class="ti ti-clock fs-4 text-primary"></i>
                        </div>
                        <div class="col-10">
                            <div class="fw-semibold small mb-0">Jam Operasional</div>
                            <div class="text-muted small">Senin - Jumat: 08:00 - 16:00</div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="ratio ratio-16x9 rounded overflow-hidden">
                            <iframe src="https://www.google.com/maps?q=Jl.+Desa+Maju+No.+123,+Kecamatan+Harapan&output=embed" style="border:0;width:100%;height:100%;" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <small class="text-muted d-block mt-2">Lokasi perkiraan. <a href="https://www.google.com/maps/search/Jl.+Desa+Maju+No.+123,+Kecamatan+Harapan" target="_blank" rel="noopener">Buka di peta</a></small>
                    </div>
                </div>

                <!-- Berita Terbaru removed as requested -->
            </aside>
        </div>
    </div>
</section>

@endsection
