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
            'keperluan' => 'required|string',
            'keterangan_tambahan' => 'nullable|string'
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        PengajuanSurat::create($validated);

        return redirect()->route('user.pengajuan-surat.index')
                        ->with('success', 'Pengajuan surat berhasil dikirim! Mohon tunggu proses verifikasi.');
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