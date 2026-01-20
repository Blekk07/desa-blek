@extends('layouts.dashboard')
@section('title', 'Buat Berita Baru')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Manajemen Berita</a></li>
                        <li class="breadcrumb-item" aria-current="page">Buat Berita Baru</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Buat Berita Baru</h5>
                </div>
                <div class="card-body">
                    @include('admin.berita._form', ['action' => route('admin.berita.store')])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
