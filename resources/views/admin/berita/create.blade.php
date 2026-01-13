@extends('layouts.app')

@section('title', 'Buat Berita')

@section('content')
<div class="container">
    <h2 class="mb-4">Buat Berita Baru</h2>
    @include('admin.berita._form', ['action' => route('admin.berita.store')])
</div>
@endsection
