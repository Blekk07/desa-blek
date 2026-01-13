<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have some users to assign as authors
        if (\App\Models\User::count() === 0) {
            \App\Models\User::factory(5)->create();
        }

        // Create a mix of published and draft berita
        Berita::factory()->count(12)->create();

        // Also add a small set of clear sample berita entries with a local sample image
        $sampleImage = 'assets/images/berita-sample.svg';
        $author = \App\Models\User::first();
        for ($i = 1; $i <= 5; $i++) {
            Berita::create([
                'judul' => "Berita Contoh $i",
                'konten' => '<p>Ini adalah isi berita contoh nomor ' . $i . '. Anda bisa mengganti judul, isi, dan gambar ini kapan saja melalui panel admin atau database.</p>' .
                            '<p>Paragraf tambahan untuk memberi contoh tampilan konten yang lebih panjang dan rapi di halaman berita.</p>',
                'gambar' => $sampleImage,
                'caption' => "Foto kegiatan warga dan dokumentasi - Berita Contoh $i",
                'user_id' => $author->id,
                'published_at' => now()->subDays(6 - $i),
            ]);
        }
    }
}
