<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfileDesa;

class ProfileDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileDesa::create([
            'nama_desa' => 'Bangah',
            'kecamatan' => 'Gedangan',
            'kabupaten' => 'Sidoarjo',
            'provinsi' => 'Jawa Timur',
            'kode_pos' => '61254',
            'alamat_kantor' => 'Jl. Bangah Jaya Indah Kav. Polda No 447-448',
            'kepala_desa' => 'Bambang Handoko',
            'masa_jabatan_kepala' => '2024 - 2030',
            'sekretaris_desa' => 'Agus Pratama',
            'bendahara_desa' => 'Siti Aminah',
            'poskesdes' => '(0321) 456789',
            'pos_kamling' => '(0321) 456790',
            'kebakaran' => '113',
            'visi' => 'Terwujudnya Desa Bangah yang Mandiri, Sejahtera, dan Berbudaya',
            'visi_deskripsi' => 'Menjadi desa yang unggul dalam pembangunan berkelanjutan dengan melibatkan partisipasi aktif seluruh masyarakat.',
            'luas_wilayah' => 126.36, // Changed from '126,355' to proper decimal format
            'sejarah_desa' => ' Bukan cerita asal-usul nama, tetapi lebih ke perkembangan modern sebagai destinasi wisata baru yang fokus pada ruang publik terpadu, menunjukkan kemajuan desa dari sisi fasilitas dan manfaat bagi warga.',
            'geografis' => 'Desa Bangah terletak di wilayah Sidoarjo yang strategis, sering kali dikaitkan dengan area di ujung selatan atau sekitar pusat pengembangan ekonomi di Kecamatan Gedangan.',
        ]);
    }
}
