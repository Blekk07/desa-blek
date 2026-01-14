@extends('layouts.app')

@section('title', 'Verifikasi Pengajuan #' . str_pad($pengajuan->id,5,'0',STR_PAD_LEFT))

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height:60vh;">
    <div class="card shadow-sm" style="max-width:900px; width:100%;">
        <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light me-3" style="width:56px;height:56px;">
                    <i class="ti ti-file-check text-primary" style="font-size:22px;"></i>
                </div>
                <div>
                    <div class="h6 mb-0 fw-bold">Verifikasi Pengajuan</div>
                    <div class="small text-muted">ID: <strong>#{{ str_pad($pengajuan->id,5,'0',STR_PAD_LEFT) }}</strong></div>
                </div>
            </div>

            @php
                $status = strtolower($pengajuan->status ?? 'unknown');
                $statusMap = [
                    'pending' => ['label' => 'Pending', 'class' => 'bg-warning text-dark', 'icon' => 'ti-alert-circle'],
                    'diproses' => ['label' => 'Diproses', 'class' => 'bg-info text-white', 'icon' => 'ti-clock'],
                    'selesai' => ['label' => 'Selesai', 'class' => 'bg-success text-white', 'icon' => 'ti-check'],
                    'ditolak' => ['label' => 'Ditolak', 'class' => 'bg-danger text-white', 'icon' => 'ti-x']
                ];
                $badge = $statusMap[$status] ?? ['label' => ucfirst($status), 'class' => 'bg-secondary text-white', 'icon' => 'ti-info'];
            @endphp

            <div class="text-end">
                <span class="badge {{ $badge['class'] }} p-2 rounded-3" style="font-size:0.9rem;"><i class="{{ $badge['icon'] }} me-1"></i> {{ $badge['label'] }}</span>
                @if(!empty($verifyUrl))
                    <div class="mt-1 small text-muted">Tautan terautentikasi</div>
                @else
                    <div class="mt-1 small text-muted">Verifikasi internal</div>
                @endif
            </div>
        </div>

        <div class="card-body">
            <div class="row g-4">
                <div class="col-lg-7">
                    <h6 class="mb-3 fw-semibold">Detail Pengajuan</h6>
                    <dl class="row">
                        <dt class="col-sm-4 small text-muted">Jenis Surat</dt>
                        <dd class="col-sm-8 fw-semibold">{{ $pengajuan->jenis_surat ?? '-' }}</dd>

                        <dt class="col-sm-4 small text-muted">Nama Pengaju</dt>
                        <dd class="col-sm-8">{{ $pengajuan->nama_lengkap ?? $pengajuan->getValue('nama_lengkap') ?? '-' }}</dd>

                        <dt class="col-sm-4 small text-muted">NIK</dt>
                        <dd class="col-sm-8">{{ $pengajuan->nik ?? '-' }}</dd>

                        <dt class="col-sm-4 small text-muted">Tanggal</dt>
                        <dd class="col-sm-8">{{ optional($pengajuan->created_at)->format('d F Y H:i') ?? '-' }}</dd>

                        <dt class="col-sm-4 small text-muted">Keperluan</dt>
                        <dd class="col-sm-8">{{ $pengajuan->keperluan ?? '-' }}</dd>

                        <dt class="col-sm-4 small text-muted">Alamat</dt>
                        <dd class="col-sm-8">{{ $pengajuan->alamat ?? '-' }}</dd>

                        <dt class="col-sm-4 small text-muted">Catatan Admin</dt>
                        <dd class="col-sm-8">{{ $pengajuan->catatan_admin ?? '-' }}</dd>
                    </dl>

                    @if(!empty($pengajuan->lampiran))
                        <div class="mt-3">
                            <h6 class="mb-2 fw-semibold">Lampiran</h6>
                            <ul class="list-unstyled small">
                                @foreach((array) $pengajuan->lampiran as $file)
                                    <li><a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-decoration-none">{{ basename($file) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-lg-5">
                    <div class="border rounded p-3 text-center" style="background:#f8fbff;">
                        @if(!empty($verifyUrl))
                            <?php $qrImg = 'https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=' . urlencode($verifyUrl) . '&color=' . config('app.qr.fg', '0052d4') . '&bgcolor=' . config('app.qr.bg', 'FFFFFF') . '&qzone=2'; ?>
                            <img src="{{ $qrImg }}" alt="QR" class="img-fluid mb-2" style="max-width:200px;border-radius:8px;">
                            <div class="small fw-semibold mb-2" style="color:#{{ config('app.qr.fg', '0052d4') }};">Sistem Informasi Desa</div>
                            <div class="small text-muted mb-3">Scan untuk memeriksa keaslian dokumen</div>

                            <label class="form-label small text-muted">Link Verifikasi</label>
                            <div class="input-group mb-3">
                                <input id="verifyLink" type="text" readonly class="form-control form-control-sm" value="{{ $verifyUrl }}" aria-label="Link Verifikasi">
                                <button class="btn btn-sm btn-outline-secondary" type="button" id="copyBtn" aria-live="polite">Salin</button>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="{{ $verifyUrl }}" target="_blank" class="btn btn-sm btn-primary">Buka Link</a>
                                @if(auth()->check() && auth()->user()->id === $pengajuan->user_id)
                                    <a href="{{ route('user.pengajuan-surat.print', $pengajuan->id) }}" class="btn btn-sm btn-success">Unduh PDF</a>
                                @endif
                            </div>
                        @else
                            <div class="mb-2"><i class="ti ti-lock text-muted" style="font-size:26px;"></i></div>
                            <div class="fw-semibold">Verifikasi Internal</div>
                            <div class="small text-muted">Dokumen diverifikasi oleh sistem internal.</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">Kembali ke Beranda</a>
                <div class="small text-muted">Diperiksa pada <strong>{{ now()->format('d F Y H:i') }}</strong></div>
            </div>
        </div>
    </div>
</div>

@if(!empty($verifyUrl))
<script>
    document.addEventListener('DOMContentLoaded', function(){
        var copyBtn = document.getElementById('copyBtn');
        var input = document.getElementById('verifyLink');
        if(copyBtn && input){
            copyBtn.addEventListener('click', function(){
                var val = input.value;
                if(navigator.clipboard && navigator.clipboard.writeText){
                    navigator.clipboard.writeText(val).then(function(){
                        copyBtn.innerText = 'Tersalin';
                        setTimeout(function(){ copyBtn.innerText = 'Salin'; }, 1500);
                    }).catch(function(){
                        promptFallback(val);
                    });
                } else {
                    promptFallback(val);
                }
            });
        }

        function promptFallback(text){
            try{
                window.prompt('Salin link verifikasi ini:', text);
            }catch(e){
                // ignore
            }
        }
    });
</script>
@endif
@endsection