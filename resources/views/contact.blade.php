@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')

<!-- Hero -->
<section class="page-header py-6 text-white" style="background: linear-gradient(135deg,#4361ee 0%, #3a0ca3 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold">Hubungi Kami</h1>
                <p class="lead opacity-85">Ada pertanyaan atau masukan? Kirim pesan kepada kami dan tim desa akan segera merespons.</p>
            </div>
            <div class="col-md-4 text-md-end mt-4 mt-md-0">
                <a href="/" class="btn btn-outline-light">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="bg-white rounded shadow-sm p-4">

                    @if(session('success'))
                        <!-- Show as modal via JS, but keep a fallback alert -->
                        <div class="alert alert-success d-none" id="contact-success">{{ session('success') }}</div>
                    @endif

                    <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input name="name" id="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap">
                                    <label for="name">Nama Lengkap</label>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input name="email" id="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com">
                                    <label for="email">Alamat Email</label>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input name="subject" id="subject" value="{{ old('subject') }}" type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subjek">
                                    <label for="subject">Subjek</label>
                                    @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" placeholder="Pesan Anda" style="height:140px">{{ old('message') }}</textarea>
                                    <label for="message">Tuliskan pesan Anda...</label>
                                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">Dengan mengirim pesan Anda setuju pada <a href="#">Kebijakan Privasi</a>.</small>
                                </div>
                                <div>
                                    <button id="sendBtn" type="submit" class="btn btn-primary d-inline-flex align-items-center">
                                        <span id="sendSpinner" class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                        <span>Kirim Pesan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-4 text-center text-muted small">Atau hubungi kami melalui telepon: <strong>(021) 9876-5432</strong> atau email <strong>desa@desa-maju.go.id</strong></div>
            </div>

            <aside class="col-lg-5">
                <div class="bg-white rounded shadow-sm p-4 mb-4">
                    <h5 class="mb-3">Kontak & Lokasi</h5>
                    <div class="mb-3 d-flex align-items-start">
                        <i class="ti ti-map-pin fs-4 me-3 text-primary"></i>
                        <div>
                            <div class="fw-bold">Alamat</div>
                            <div class="text-muted">Jl. Desa Maju No.123, Kecamatan Harapan</div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-start">
                        <i class="ti ti-mail fs-4 me-3 text-primary"></i>
                        <div>
                            <div class="fw-bold">Email</div>
                            <div class="text-muted">desa@desa-maju.go.id</div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-start">
                        <i class="ti ti-phone fs-4 me-3 text-primary"></i>
                        <div>
                            <div class="fw-bold">Telepon</div>
                            <div class="text-muted">(021) 9876-5432</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="mb-2">Lokasi</h6>
                        <div class="ratio ratio-16x9 rounded overflow-hidden">
                            <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=106.816666%2C-6.200000%2C106.826666%2C-6.190000&amp;layer=mapnik" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded shadow-sm p-4">
                    <h5 class="mb-3">Berita Terbaru</h5>
                    <ul class="list-unstyled">
                        @foreach($recentBeritas ?? [] as $r)
                            <li class="mb-2"><a href="{{ route('berita.show', $r) }}" class="text-decoration-none">{{ Str::limit($r->judul, 80) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Success modal -->
<div class="modal fade" id="contactSuccessModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center p-4">
        <div class="fs-1 text-success mb-2">✓</div>
        <h5 class="mb-2">Pesan Terkirim</h5>
        <p class="text-muted">Terima kasih, pesan Anda telah kami terima. Kami akan menghubungi Anda sesegera mungkin.</p>
        <div class="mt-3">
            <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
    // Show success modal if session success exists
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            var modal = new bootstrap.Modal(document.getElementById('contactSuccessModal'));
            modal.show();
        @endif

        // Form submit UX
        var form = document.getElementById('contactForm');
        var sendBtn = document.getElementById('sendBtn');
        var spinner = document.getElementById('sendSpinner');
        if (form && sendBtn) {
            form.addEventListener('submit', function() {
                sendBtn.setAttribute('disabled', '');
                spinner.classList.remove('d-none');
            });
        }
    });
</script>
@endpush
