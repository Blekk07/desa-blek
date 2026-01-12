<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class ProfileDesaController extends Controller
{
    /**
     * Display village profile with data from database
     */
    public function show()
    {
        // Hitung jumlah penduduk unik berdasarkan NIK
        $totalPenduduk = Penduduk::distinct('nik')->count();

        // Hitung jumlah kepala keluarga (ambil jumlah unik no_kk, jika kosong estimasi)
        $keluargaWithKK = Penduduk::whereNotNull('no_kk')
                                  ->where('no_kk', '!=', '')
                                  ->distinct('no_kk')
                                  ->count();

        // Jika ada no_kk, gunakan itu. Jika tidak, estimasi berdasarkan rata-rata keluarga
        $totalKeluarga = $keluargaWithKK > 0 ? $keluargaWithKK : ceil($totalPenduduk / 4);

        // Hitung dusun/desa unik dari field desa atau alamat
        $dusunList = Penduduk::distinct('desa')
                             ->whereNotNull('desa')
                             ->where('desa', '!=', '')
                             ->count();

        $totalDusun = $dusunList > 0 ? $dusunList : 8; // Default 8 jika tidak ada data

        // Data profil desa (bisa dari config, database, atau hardcoded)
        $profileData = [
            'nama_desa' => 'Desa Maju Jaya',
            'kecamatan' => 'Gunung Sari',
            'kabupaten' => 'Lamongan',
            'provinsi' => 'Jawa Timur',
            'kode_pos' => '62251',
            'alamat_kantor' => 'Jl. Desa Maju No. 123',
            'kepala_desa' => 'Budi Santoso',
            'masa_jabatan_kepala' => '2024 - 2030',
            'sekretaris_desa' => 'Agus Pratama',
            'bendahara_desa' => 'Siti Aminah',
            'poskesdes' => '(0321) 456789',
            'pos_kamling' => '(0321) 456790',
            'kebakaran' => '113',
            'visi' => 'Terwujudnya Desa Maju Jaya yang Mandiri, Sejahtera, dan Berbudaya',
            'visi_deskripsi' => 'Menjadi desa yang unggul dalam pembangunan berkelanjutan dengan melibatkan partisipasi aktif seluruh masyarakat.',
            'luas_wilayah' => 550, // dalam hectare
        ];

        return view('user.profile-desa', [
            'totalPenduduk' => $totalPenduduk,
            'totalKeluarga' => $totalKeluarga,
            'totalDusun' => $totalDusun,
            'profileData' => $profileData,
        ]);
    }

    /**
     * Public-facing profile page styled like the contact page
     */
    public function publicShow()
    {
        // reuse same calculations as show()
        $totalPenduduk = Penduduk::distinct('nik')->count();

        $keluargaWithKK = Penduduk::whereNotNull('no_kk')
                                  ->where('no_kk', '!=', '')
                                  ->distinct('no_kk')
                                  ->count();

        $totalKeluarga = $keluargaWithKK > 0 ? $keluargaWithKK : ceil($totalPenduduk / 4);

        $dusunList = Penduduk::distinct('desa')
                             ->whereNotNull('desa')
                             ->where('desa', '!=', '')
                             ->count();

        $totalDusun = $dusunList > 0 ? $dusunList : 8;

        $profileData = [
            'nama_desa' => 'Desa Maju Jaya',
            'kecamatan' => 'Gunung Sari',
            'kabupaten' => 'Lamongan',
            'provinsi' => 'Jawa Timur',
            'kode_pos' => '62251',
            'alamat_kantor' => 'Jl. Desa Maju No. 123',
            'kepala_desa' => 'Budi Santoso',
            'masa_jabatan_kepala' => '2024 - 2030',
            'sekretaris_desa' => 'Agus Pratama',
            'bendahara_desa' => 'Siti Aminah',
            'poskesdes' => '(0321) 456789',
            'pos_kamling' => '(0321) 456790',
            'kebakaran' => '113',
            'visi' => 'Terwujudnya Desa Maju Jaya yang Mandiri, Sejahtera, dan Berbudaya',
            'visi_deskripsi' => 'Menjadi desa yang unggul dalam pembangunan berkelanjutan dengan melibatkan partisipasi aktif seluruh masyarakat.',
            'luas_wilayah' => 550,
        ];

        return view('profile-desa', [
            'totalPenduduk' => $totalPenduduk,
            'totalKeluarga' => $totalKeluarga,
            'totalDusun' => $totalDusun,
            'profileData' => $profileData,
        ]);
    }
}
