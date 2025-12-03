<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    // Untuk User - Menampilkan daftar pengajuan surat
    public function index()
    {
        $pengajuanSurat = PengajuanSurat::where('user_id', auth()->id())
                                      ->orderBy('created_at', 'desc')
                                      ->get();
        
        return view('user.pengajuan_surat.index', compact('pengajuanSurat'));
    }

    // Untuk User - Menampilkan form pengajuan surat
    public function create()
    {
        $jenisSurat = [
            'Surat Keterangan Domisili',
            'Surat Keterangan Tidak Mampu',
            'Surat Keterangan Usaha',
            'Surat Pengantar KTP',
            'Surat Pengantar KK',
            'Surat Keterangan Kelahiran',
            'Surat Keterangan Kematian',
            'Surat Keterangan Pindah',
            'Surat Keterangan Catatan Kepolisian',
            'Surat Lainnya'
        ];
        
        $user = auth()->user();
        $penduduk = null;
        if ($user && $user->nik) {
            $penduduk = Penduduk::where('nik', $user->nik)->first();
        }

        return view('user.pengajuan_surat.create', compact('jenisSurat', 'user', 'penduduk'));
    }

    // Untuk User - Menyimpan pengajuan surat
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_surat' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'no_telepon' => 'required|string|max:15',
            'keperluan' => 'nullable|string',
            'keterangan_tambahan' => 'nullable|string',
            // Fields untuk Surat Usaha
            'nama_usaha' => 'nullable|string|max:255',
            'jenis_usaha' => 'nullable|string|max:255',
            'alamat_usaha' => 'nullable|string',
            // Fields untuk Surat Kelahiran
            'nama_anak' => 'nullable|string|max:255',
            'jenis_kelamin_anak' => 'nullable|string',
            'tempat_lahir_anak' => 'nullable|string|max:255',
            'tanggal_lahir_anak' => 'nullable|date',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            // Fields untuk Surat Kematian
            'nama_almarhum' => 'nullable|string|max:255',
            'tanggal_meninggal' => 'nullable|date',
            'tempat_meninggal' => 'nullable|string|max:255',
            'sebab_meninggal' => 'nullable|string',
            // Fields untuk Surat Pindah
            'alamat_tujuan' => 'nullable|string',
            'alasan_pindah' => 'nullable|string|max:255',
            // Jenis Surat Lainnya
            'jenis_lainnya' => 'nullable|string|max:255',
            // File uploads
            'lampiran_ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'lampiran_kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'bukti_usaha' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'lampiran_pendukung' => 'nullable|array',
            'lampiran_pendukung.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120'
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        // Generate keperluan otomatis jika kosong
        if (empty($validated['keperluan'])) {
            $validated['keperluan'] = $this->generateKeperluan($validated['jenis_surat']);
        }

        PengajuanSurat::create($validated);

        return redirect()->route('user.pengajuan-surat.index')
                        ->with('success', 'Pengajuan surat berhasil dikirim! Mohon tunggu proses verifikasi.');
    }

    // Helper function untuk generate keperluan otomatis
    private function generateKeperluan($jenisSurat)
    {
        $keperluanMap = [
            'Surat Keterangan Domisili' => 'Untuk keperluan administrasi sekolah, kuliah, melamar pekerjaan, atau pembuatan/perpanjangan KTP.',
            'Surat Keterangan Tidak Mampu' => 'Untuk mengajukan bantuan, beasiswa, keringanan biaya, atau keperluan sosial lainnya.',
            'Surat Keterangan Usaha' => 'Untuk mengajukan kredit usaha, izin usaha, atau keperluan bisnis lainnya.',
            'Surat Pengantar KTP' => 'Untuk mengurus pembuatan atau perpanjangan KTP di Dukcapil.',
            'Surat Pengantar KK' => 'Untuk mengurus Kartu Keluarga (KK) di Dukcapil.',
            'Surat Keterangan Kelahiran' => 'Untuk mengurus Akta Kelahiran bayi di Dukcapil.',
            'Surat Keterangan Kematian' => 'Untuk pengurusan Akta Kematian dan keperluan administrasi lainnya.',
            'Surat Keterangan Pindah' => 'Untuk pengurusan administrasi kependudukan di tempat tujuan.',
            'Surat Keterangan Catatan Kepolisian' => 'Untuk mengurus SKCK di Polsek/Polres atau keperluan pekerjaan.',
            'Surat Lainnya' => 'Sesuai dengan keperluan yang dijelaskan di bagian keterangan.'
        ];

        return $keperluanMap[$jenisSurat] ?? 'Sesuai dengan keperluan yang dimohonkan.';
    }

    // Untuk User - Menampilkan detail pengajuan surat
    public function show($id)
    {
        $pengajuan = PengajuanSurat::where('user_id', auth()->id())
                                  ->where('id', $id)
                                  ->firstOrFail();
        
        return view('user.pengajuan_surat.show', compact('pengajuan'));
    }

    // Untuk Admin - Menampilkan semua pengajuan surat
    public function adminIndex(Request $request)
    {
        $query = PengajuanSurat::with('user')->orderBy('created_at', 'desc');

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan jenis surat
        if ($request->has('jenis_surat') && $request->jenis_surat != '') {
            $query->where('jenis_surat', $request->jenis_surat);
        }

        $pengajuanSurat = $query->paginate(10);

        // Statistik
        $totalPengajuan = PengajuanSurat::count();
        $pending = PengajuanSurat::where('status', 'pending')->count();
        $diproses = PengajuanSurat::where('status', 'diproses')->count();
        $selesai = PengajuanSurat::where('status', 'selesai')->count();

        return view('admin.pengajuan_surat.index', compact(
            'pengajuanSurat',
            'totalPengajuan',
            'pending',
            'diproses',
            'selesai'
        ));
    }

    // Untuk Admin - Menampilkan detail pengajuan
    public function adminShow($id)
    {
        $pengajuan = PengajuanSurat::with('user')->findOrFail($id);
        return view('admin.pengajuan_surat.show', compact('pengajuan'));
    }

    // Untuk Admin - Update status pengajuan
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,diproses,selesai,ditolak',
            'catatan_admin' => 'nullable|string'
        ]);

        $pengajuan = PengajuanSurat::findOrFail($id);
        
        $pengajuan->status = $validated['status'];
        $pengajuan->catatan_admin = $validated['catatan_admin'];
        
        if ($validated['status'] == 'selesai') {
            $pengajuan->tanggal_selesai = now();
        }
        
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }

    // Untuk Admin - Delete pengajuan
    public function destroy($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('admin.pengajuan-surat.index')
                        ->with('success', 'Pengajuan surat berhasil dihapus!');
    }

    // Cetak / Export ke PDF untuk user (jika ingin download PDF)
    public function print($id)
    {
        $pengajuan = PengajuanSurat::where('user_id', auth()->id())
                                   ->where('id', $id)
                                   ->firstOrFail();

        try {
            $pdf = null;
            // Attempt to use the PDF facade (barryvdh/laravel-dompdf)
            if (class_exists(\Barryvdh\DomPDF\Facade\Pdf::class) || class_exists(\Barryvdh\DomPDF\PDF::class) || class_exists('PDF')) {
                $pdf = \PDF::loadView('pdfs.pengajuan_surat', compact('pengajuan'));
                return $pdf->download('surat-' . str_pad($pengajuan->id, 5, '0', STR_PAD_LEFT) . '.pdf');
            }

            throw new \Exception('dompdf_not_installed');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Fitur cetak PDF belum tersedia. Jalankan: composer require barryvdh/laravel-dompdf lalu publish config jika perlu.');
        }
    }
}