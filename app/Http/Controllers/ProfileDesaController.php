<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\ProfileDesa;
use Illuminate\Http\Request;

class ProfileDesaController extends Controller
{
    /**
     * Display village profile with data from database
     */
    public function show()
    {
        // Get profile data from database, or create default if not exists
        $profile = ProfileDesa::first();
        if (!$profile) {
            $profile = $this->createDefaultProfile();
        }

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

        return view('user.profile-desa', [
            'totalPenduduk' => $totalPenduduk,
            'totalKeluarga' => $totalKeluarga,
            'totalDusun' => $totalDusun,
            'profileData' => $profile->toArray(),
        ]);
    }

    /**
     * Public-facing profile page styled like the contact page
     */
    public function publicShow()
    {
        // Get profile data from database, or create default if not exists
        $profile = ProfileDesa::first();
        if (!$profile) {
            $profile = $this->createDefaultProfile();
        }

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

        return view('public.profile', [
            'totalPenduduk' => $totalPenduduk,
            'totalKeluarga' => $totalKeluarga,
            'totalDusun' => $totalDusun,
            'profileData' => $profile->toArray(),
        ]);
    }

    /**
     * Admin: Show edit form for village profile
     */
    public function adminEdit()
    {
        $profile = ProfileDesa::first();
        if (!$profile) {
            $profile = $this->createDefaultProfile();
        }

        return view('admin.profile-desa.edit', compact('profile'));
    }

    /**
     * Admin: Update village profile
     */
    public function adminUpdate(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'alamat_kantor' => 'required|string|max:500',
            'kepala_desa' => 'required|string|max:255',
            'masa_jabatan_kepala' => 'required|string|max:255',
            'sekretaris_desa' => 'nullable|string|max:255',
            'bendahara_desa' => 'nullable|string|max:255',
            'poskesdes' => 'nullable|string|max:20',
            'pos_kamling' => 'nullable|string|max:20',
            'kebakaran' => 'nullable|string|max:20',
            'visi' => 'required|string|max:1000',
            'visi_deskripsi' => 'required|string|max:2000',
            'luas_wilayah' => 'nullable|numeric|min:0',
            'sejarah_desa' => 'nullable|string|max:5000',
            'geografis' => 'nullable|string|max:2000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile = ProfileDesa::first();
        if (!$profile) {
            $profile = new ProfileDesa();
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($profile->logo && file_exists(public_path('assets/images/logo/' . $profile->logo))) {
                unlink(public_path('assets/images/logo/' . $profile->logo));
            }

            $logo = $request->file('logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            
            // Create directory if not exists
            $logo->move(public_path('assets/images/logo'), $logoName);
            $validated['logo'] = $logoName;
        }

        $profile->fill($validated);
        $profile->save();

        return redirect()->route('admin.profile-desa.edit')
                        ->with('success', 'Profil desa berhasil diperbarui!');
    }

    /**
     * Create default profile data
     */
    private function createDefaultProfile()
    {
        return ProfileDesa::create([
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
        ]);
    }
}
