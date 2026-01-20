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
            'sejarah_desa' => 'Desa Maju Jaya didirikan pada tahun 1950 dan telah berkembang menjadi desa yang maju di bidang pertanian dan perdagangan.',
            'geografis' => 'Desa Maju Jaya terletak di dataran rendah dengan iklim tropis. Wilayah desa didominasi oleh lahan pertanian dan permukiman penduduk.',
        ]);
    }
}
