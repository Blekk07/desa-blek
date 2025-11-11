@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h3 class="fw-bold mb-3">Profil Desa</h3>
            <p class="text-muted">Informasi lengkap mengenai desa dan pemerintahan desa.</p>
        </div>
    </div>

    <div class="row">

        <!-- Informasi Desa -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white fw-bold">
                    Informasi Desa
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Desa</th>
                            <td>Desa Maju Jaya</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>Gunung Sari</td>
                        </tr>
                        <tr>
                            <th>Kabupaten</th>
                            <td>Lamongan</td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td>Jawa Timur</td>
                        </tr>
                        <tr>
                            <th>Kode Pos</th>
                            <td>62251</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kepala Desa -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-bold">
                    Kepala Desa & Perangkat
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kepala Desa</th>
                            <td>Budi Santoso</td>
                        </tr>
                        <tr>
                            <th>Masa Jabatan</th>
                            <td>2024 - 2030</td>
                        </tr>
                        <tr>
                            <th>Sekretaris Desa</th>
                            <td>Agus Pratama</td>
                        </tr>
                        <tr>
                            <th>Bendahara Desa</th>
                            <td>Siti Aminah</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
