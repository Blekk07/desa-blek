@if($errors->any())
    <div class="alert alert-danger">
        <h6 class="alert-heading">Terjadi kesalahan:</h6>
        <ul class="mb-0">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($method) && $method === 'PUT')
        @method('PUT')
    @endif

    <div class="row">
        <!-- Judul Berita -->
        <div class="col-12 mb-3">
            <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                   value="{{ old('judul', $berita->judul ?? '') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Konten Berita -->
        <div class="col-12 mb-3">
            <label class="form-label">Konten Berita <span class="text-danger">*</span></label>
            <textarea name="konten" class="form-control @error('konten') is-invalid @enderror"
                      rows="10" required>{{ old('konten', $berita->konten ?? '') }}</textarea>
            @error('konten')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gambar -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Gambar Berita</label>
            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 5MB</small>
            @if(!empty($berita->gambar))
                <div class="mt-2">
                    <img src="{{ str_starts_with($berita->gambar, 'assets/') ? asset($berita->gambar) : asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="img-thumbnail" style="max-width: 200px;">
                    <small class="text-muted d-block">Gambar saat ini</small>
                </div>
            @endif
        </div>

        <!-- Tanggal Publish -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Tanggal Publish</label>
            <input type="datetime-local" name="published_at" class="form-control @error('published_at') is-invalid @enderror"
                   value="{{ old('published_at', isset($berita->published_at) ? $berita->published_at->format('Y-m-d\TH:i') : '') }}">
            @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Kosongkan jika belum ingin dipublikasikan</small>
        </div>
    </div>

    <div class="mt-4 pt-3 border-top">
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-device-floppy"></i> Simpan Perubahan
            </button>
            @if(isset($berita))
                <a href="{{ route('admin.berita.show', $berita) }}" class="btn btn-info">
                    <i class="ti ti-eye"></i> Lihat Berita
                </a>
            @endif
            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                <i class="ti ti-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</form>
