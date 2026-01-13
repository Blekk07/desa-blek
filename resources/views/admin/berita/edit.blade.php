@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Berita</h2>
    @include('admin.berita._form', ['action' => route('admin.berita.update', $berita), 'method' => 'PUT'])
</div>
@endsection
