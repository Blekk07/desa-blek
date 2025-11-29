<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\PengajuanSurat;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total statistics
        $totalPenduduk = Penduduk::count();
        $totalSurat = PengajuanSurat::count();
        $totalPengaduan = Pengaduan::count();
        $totalUser = User::count();
        
        // Pengajuan Surat breakdown
        $suratPending = PengajuanSurat::where('status', 'pending')->count();
        $suratDiproses = PengajuanSurat::where('status', 'diproses')->count();
        $suratSelesai = PengajuanSurat::where('status', 'selesai')->count();
        $suratDitolak = PengajuanSurat::where('status', 'ditolak')->count();
        
        // Pengaduan breakdown
        $pengaduanMenunggu = Pengaduan::where('status', 'menunggu')->count();
        $pengaduanDiproses = Pengaduan::where('status', 'diproses')->count();
        $pengaduanSelesai = Pengaduan::where('status', 'selesai')->count();
        
        // Recent data untuk display
        $pengaduanTerbaru = Pengaduan::with('user')
                            ->latest()
                            ->limit(5)
                            ->get();
        
        $suratTerbaru = PengajuanSurat::with('user')
                        ->latest()
                        ->limit(5)
                        ->get();
        
        return view('admin.dashboard', compact(
            'totalPenduduk',
            'totalSurat',
            'totalPengaduan',
            'totalUser',
            'suratPending',
            'suratDiproses',
            'suratSelesai',
            'suratDitolak',
            'pengaduanMenunggu',
            'pengaduanDiproses',
            'pengaduanSelesai',
            'pengaduanTerbaru',
            'suratTerbaru'
        ));
    }
}
