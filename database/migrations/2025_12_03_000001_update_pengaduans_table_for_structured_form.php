<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Add new columns for structured form
            $table->string('kategori')->nullable()->after('judul');
            $table->dateTime('tanggal_waktu_kejadian')->nullable()->after('kategori');
            $table->string('lokasi_kejadian')->nullable()->after('tanggal_waktu_kejadian');
            $table->string('kecamatan')->nullable()->after('lokasi_kejadian');
            $table->string('desa')->nullable()->after('kecamatan');
            $table->longText('uraian_kejadian')->nullable()->after('desa');
            $table->json('lampiran')->nullable()->after('uraian_kejadian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropColumn([
                'kategori',
                'tanggal_waktu_kejadian',
                'lokasi_kejadian',
                'kecamatan',
                'desa',
                'uraian_kejadian',
                'lampiran'
            ]);
        });
    }
};
