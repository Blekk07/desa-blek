@if($errors->any())
    <div class="mb-3 text-red-600">
        <ul>
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

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Konten</label>
        <textarea name="konten" class="form-control" rows="8">{{ old('konten', $berita->konten ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar (opsional)</label>
        <input type="file" name="gambar" class="form-control">
        @if(!empty($berita->gambar))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="gambar" style="max-width:180px;">
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Publish At (opsional)</label>
        <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', isset($berita->published_at) ? $berita->published_at->format('Y-m-d\TH:i') : '') }}">
    </div>

    <div class="mt-3">
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
