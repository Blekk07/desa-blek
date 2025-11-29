<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surat - {{ $pengajuan->jenis_surat }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 0 24px; }
        .meta { margin-bottom: 12px; }
        .table { width: 100%; border-collapse: collapse; }
        .table td { padding: 6px 0; vertical-align: top; }
        .title { font-weight: 700; }
        .separator { border-top: 1px solid #000; margin: 8px 0 16px; }
    </style>
</head>
<body>
    <div class="header">
        <h3>PEMERINTAH DESA</h3>
        <h4>SURAT {{ strtoupper($pengajuan->jenis_surat) }}</h4>
        <p>No: {{ str_pad($pengajuan->id, 5, '0', STR_PAD_LEFT) }}</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

        <table class="table">
            <tr>
                <td width="30%">Nama</td>
                <td>: <strong>{{ $pengajuan->nama_lengkap }}</strong></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $pengajuan->nik }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $pengajuan->alamat }}</td>
            </tr>
            <tr>
                <td>RT / RW</td>
                <td>: {{ $pengajuan->rt }} / {{ $pengajuan->rw }}</td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>: {{ $pengajuan->no_telepon }}</td>
            </tr>
        </table>

        <div class="separator"></div>

        <p>Keperluan:</p>
        <p>{{ $pengajuan->keperluan }}</p>

        @if($pengajuan->keterangan_tambahan)
            <p>Keterangan Tambahan:</p>
            <p>{{ $pengajuan->keterangan_tambahan }}</p>
        @endif

        <div style="height:40px;"></div>

        <p>Demikian surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.</p>

        <div style="height:60px"></div>

        <table class="table">
            <tr>
                <td width="60%"></td>
                <td style="text-align:center">
                    <p>Desa, {{ now()->format('d F Y') }}</p>
                    <p style="margin-top:60px">( Kepala Desa )</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
