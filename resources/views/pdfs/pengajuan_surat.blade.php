<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surat - {{ $pengajuan->jenis_surat }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111; }
        .header { display: flex; align-items: center; gap: 16px; margin-bottom: 6px; }
        .logo { width: 80px; }
        .logo img { width: 80px; }
        .header-text { flex: 1; text-align: center; }
        .gov { font-weight: 700; }
        .area { font-size: 12px; }
        .surat { margin: 6px 0; font-size: 16px; font-weight: 700; }
        .no { font-size: 12px; }
        .double-line { border-top: 2px solid #000; border-bottom: 1px solid #000; margin: 6px 0 18px; }
        .content { margin: 0 36px; }
        .meta { margin-bottom: 12px; }
        .table { width: 100%; border-collapse: collapse; }
        .table td { padding: 6px 0; vertical-align: top; }
        .title { font-weight: 700; }
        .separator { border-top: 1px solid #000; margin: 8px 0 16px; }
        h4 { margin-bottom: 6px; }
        .title-table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        .title-table td { vertical-align: middle; padding: 0; }
        .title-logo-cell { width: 80px; text-align: left; }
        .title-text-cell { text-align: center; font-size: 18px; font-weight: bold; }
        .surat-title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 10px; }
    </style>
</head>
<body>
    @php
        $logoPath = public_path('assets/images/my/logo-tp.png');
    @endphp

    <div class="header">
        <div class="logo">
            @if(file_exists($logoPath))
                <img src="{{ $logoPath }}" alt="logo">
            @else
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==" alt="Logo Placeholder">
            @endif
        </div>
        <div class="header-text">
            <div class="surat">PEMERINTAH DESA BANGAH</div>
            <div class="area">Kecamatan Gedangan Kabupaten Sidoarjo</div>
            <div class="no">No: {{ str_pad($pengajuan->id, 5, '0', STR_PAD_LEFT) }}</div>
        </div>
    </div>

    <div class="double-line"></div>

    <div class="surat-title">Surat Keterangan {{ ucfirst(strtolower($pengajuan->jenis_surat)) }}</div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

        <table class="table">
            <tr>
                <td width="30%">Nama Lengkap</td>
                <td>: <strong>{{ $pengajuan->getValue('nama_lengkap') ?? '-' }}</strong></td>
            </tr>
            <tr>
                <td>Tempat, Tgl Lahir</td>
                <td>: {{ $pengajuan->getValue('tempat_lahir') ?? '-' }}, {{ $pengajuan->getValue('tanggal_lahir') ? \Carbon\Carbon::parse($pengajuan->getValue('tanggal_lahir'))->format('d F Y') : '-' }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $pengajuan->getValue('jenis_kelamin') ?? '-' }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $pengajuan->getValue('pekerjaan') ?? '-' }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{ $pengajuan->getValue('agama') ?? '-' }}</td>
            </tr>
            <tr>
                <td>Status Perkawinan</td>
                <td>: {{ $pengajuan->getValue('status_perkawinan') ?? '-' }}</td>
            </tr>
            <tr>
                <td>Warga Negara</td>
                <td>: {{ $pengajuan->getValue('kewarganegaraan') ?? $pengajuan->getValue('warga_negara') ?? 'Indonesia' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $pengajuan->getValue('alamat') ?? $pengajuan->getValue('alamat_lengkap') ?? '-' }}</td>
            </tr>
            <tr>
                <td>RT / RW</td>
                <td>: {{ $pengajuan->getValue('rt') ?? '-' }} / {{ $pengajuan->getValue('rw') ?? '-' }}</td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>: {{ $pengajuan->getValue('no_telepon') ?? '-' }}</td>
            </tr>
        </table>

        {{-- tampilkan field khusus berdasarkan jenis surat --}}
        <div class="separator"></div>

        @if($pengajuan->jenis_surat == 'Surat Keterangan Usaha')
            <h4>Informasi Usaha</h4>
            <table class="table">
                <tr>
                    <td width="30%">Nama Usaha</td>
                    <td>: {{ $pengajuan->getValue('nama_usaha') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jenis Usaha</td>
                    <td>: {{ $pengajuan->getValue('jenis_usaha') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat Usaha</td>
                    <td>: {{ $pengajuan->getValue('alamat_usaha') ?? '-' }}</td>
                </tr>
            </table>

        @elseif($pengajuan->jenis_surat == 'Surat Keterangan Kelahiran')
            <h4>Detail Kelahiran</h4>
            <table class="table">
                <tr>
                    <td width="30%">Nama Anak</td>
                    <td>: {{ $pengajuan->getValue('nama_anak') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $pengajuan->getValue('jenis_kelamin_anak') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $pengajuan->getValue('tempat_lahir_anak') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ $pengajuan->getValue('tanggal_lahir_anak') ? \Carbon\Carbon::parse($pengajuan->getValue('tanggal_lahir_anak'))->format('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Ayah</td>
                    <td>: {{ $pengajuan->getValue('nama_ayah') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>: {{ $pengajuan->getValue('nama_ibu') ?? '-' }}</td>
                </tr>
            </table>

        @elseif($pengajuan->jenis_surat == 'Surat Keterangan Kematian')
            <h4>Detail Kematian</h4>
            <table class="table">
                <tr>
                    <td width="30%">Nama Almarhum</td>
                    <td>: {{ $pengajuan->getValue('nama_almarhum') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Meninggal</td>
                    <td>: {{ $pengajuan->getValue('tanggal_meninggal') ? \Carbon\Carbon::parse($pengajuan->getValue('tanggal_meninggal'))->format('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <td>Tempat Meninggal</td>
                    <td>: {{ $pengajuan->getValue('tempat_meninggal') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Sebab Meninggal</td>
                    <td>: {{ $pengajuan->getValue('sebab_meninggal') ?? '-' }}</td>
                </tr>
            </table>

        @elseif($pengajuan->jenis_surat == 'Surat Keterangan Pindah')
            <h4>Detail Pindah</h4>
            <table class="table">
                <tr>
                    <td width="30%">Alamat Tujuan</td>
                    <td>: {{ $pengajuan->getValue('alamat_tujuan') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alasan Pindah</td>
                    <td>: {{ $pengajuan->getValue('alasan_pindah') ?? '-' }}</td>
                </tr>
            </table>

        @elseif(in_array($pengajuan->jenis_surat, ['Surat Pengantar KTP', 'Surat Pengantar KK']))
            <h4>Keperluan Administrasi</h4>
            <p>Surat ini dibuat untuk keperluan pengurusan {{ strtolower($pengajuan->jenis_surat) }}.</p>

        @elseif($pengajuan->jenis_surat == 'Surat Lainnya')
            <h4>Jenis Surat</h4>
            <p>{{ $pengajuan->getValue('jenis_lainnya') ?? '-' }}</p>
        @endif

        {{-- tampilkan field lain yang mungkin diisi (generic) --}}
        @php
            $extras = [
                'Nama Usaha' => $pengajuan->getValue('nama_usaha') ?? null,
                'Jenis Usaha' => $pengajuan->getValue('jenis_usaha') ?? null,
                'Alamat Usaha' => $pengajuan->getValue('alamat_usaha') ?? null,
                'Nama Anak' => $pengajuan->getValue('nama_anak') ?? null,
                'Jenis Kelamin Anak' => $pengajuan->getValue('jenis_kelamin_anak') ?? null,
                'Tempat Lahir Anak' => $pengajuan->getValue('tempat_lahir_anak') ?? null,
                'Tanggal Lahir Anak' => $pengajuan->getValue('tanggal_lahir_anak') ? \Carbon\Carbon::parse($pengajuan->getValue('tanggal_lahir_anak'))->format('d F Y') : null,
                'Nama Ayah' => $pengajuan->getValue('nama_ayah') ?? null,
                'Nama Ibu' => $pengajuan->getValue('nama_ibu') ?? null,
                'Nama Almarhum' => $pengajuan->getValue('nama_almarhum') ?? null,
                'Tanggal Meninggal' => $pengajuan->getValue('tanggal_meninggal') ? \Carbon\Carbon::parse($pengajuan->getValue('tanggal_meninggal'))->format('d F Y') : null,
                'Tempat Meninggal' => $pengajuan->getValue('tempat_meninggal') ?? null,
                'Sebab Meninggal' => $pengajuan->getValue('sebab_meninggal') ?? null,
                'Alamat Tujuan' => $pengajuan->getValue('alamat_tujuan') ?? null,
                'Alasan Pindah' => $pengajuan->getValue('alasan_pindah') ?? null,
                'Jenis Surat (Lainnya)' => $pengajuan->getValue('jenis_lainnya') ?? null,
            ];
            $hasExtras = collect($extras)->filter()->isNotEmpty();
        @endphp

        @if($hasExtras)
            <div class="separator"></div>
            <h4>Detail Tambahan</h4>
            <table class="table">
                @foreach($extras as $label => $value)
                    @if($value)
                        <tr>
                            <td width="30%">{{ $label }}</td>
                            <td>: {{ $value }}</td>
                        </tr>
                    @endif
                @endforeach
            </table>
        @endif

        <div class="separator"></div>

        <p>Keperluan:</p>
        <p>{{ $pengajuan->getValue('keperluan') ?? '-' }}</p>

        @if($pengajuan->getValue('keterangan_tambahan'))
            <p>Keterangan Tambahan:</p>
            <p>{{ $pengajuan->getValue('keterangan_tambahan') }}</p>
        @endif

        <div style="height:18px"></div>

        <p>Demikian surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.</p>

        <div style="height:12px"></div>

        <table class="table">
            <tr>
                <td width="55%"></td>
            <td style="text-align:center">
                <div style="display:flex; flex-direction:column; align-items:center;">
                    <p style="margin:0">Desa Bangah, {{ now()->format('d F Y') }}</p>

                    <div style="display:flex; align-items:center; gap:12px; margin-top:8px;">
                        @if(!empty($qrSrc))
                            <div style="display:inline-block; text-align:center; border:1px solid #e9f5ff; padding:8px; border-radius:8px;">
                                <img src="{{ $qrSrc }}" alt="QR Code" style="width:90px;height:90px; display:block;">
                                <div style="font-size:10px;margin-top:6px;color:#{{ config('app.qr.fg', '0052d4') }};">Sistem Informasi Desa Bangah</div>
                                <div style="font-size:9px;margin-top:4px;color:#777;">Scan untuk verifikasi</div>
                            </div>
                        @endif

                        <div style="text-align:center;">
                            <p style="margin:0 0 8px 0">&nbsp;</p>
                            <p style="margin:0">( Kepala Desa )</p>
                        </div>

                        @if(!empty($qrSrc))
                            <div style="font-size:10px;margin-top:6px;">&nbsp;</div>
                        @endif
                    </div>
                </div>
            </td>
            </tr>
        </table>
    </div>
</body>
</html>
