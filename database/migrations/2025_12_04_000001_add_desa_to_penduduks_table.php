<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penduduks', function (Blueprint $table) {
            // Tambahkan kolom desa jika belum ada
            if (!Schema::hasColumn('penduduks', 'desa')) {
                $table->string('desa')->nullable()->after('rw');
            }
        });
    }

    public function down(): void
    {
        Schema::table('penduduks', function (Blueprint $table) {
            if (Schema::hasColumn('penduduks', 'desa')) {
                $table->dropColumn('desa');
            }
        });
    }
};
