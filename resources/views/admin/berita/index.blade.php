@extends('layouts.app')

@section('title', 'Admin - Berita')

@section('content')
<div class="container">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Manajemen Berita</h2>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">Buat Berita</a>
    </div>

    @if(session('success'))
        <div class="mb-3 text-green-700">{{ session('success') }}</div>
    @endif

    <div class="bg-white p-4 rounded shadow">
        <table class="w-full table-auto">
            <thead>
                <tr class="text-left">
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Penulis</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $b)
                <tr class="border-t">
                    <td class="py-2">{{ $b->judul }}</td>
                    <td class="py-2">{{ $b->published_at ? $b->published_at->format('d M Y H:i') : 'Draft' }}</td>
                    <td class="py-2">{{ $b->user?->name ?? '-' }}</td>
                    <td class="py-2 text-right">
                        <a href="{{ route('admin.berita.edit', $b) }}" class="btn btn-sm btn-outline">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $b) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus berita ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                        <form action="{{ route('admin.berita.publish', $b) }}" method="POST" class="inline-block">
                            @csrf
                            <button class="btn btn-sm btn-{{ is_null($b->published_at) ? 'success' : 'secondary' }}" type="submit">
                                {{ is_null($b->published_at) ? 'Publish' : 'Unpublish' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $beritas->links() }}
        </div>
    </div>
</div>
@endsection
