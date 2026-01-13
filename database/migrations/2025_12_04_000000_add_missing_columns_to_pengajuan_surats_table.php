<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            // Kolom untuk Surat Keterangan Usaha
            if (!Schema::hasColumn('pengajuan_surats', 'nama_usaha')) {
                $table->string('nama_usaha')->nullable()->after('keterangan_tambahan');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'jenis_usaha')) {
                $table->string('jenis_usaha')->nullable()->after('nama_usaha');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'alamat_usaha')) {
                $table->text('alamat_usaha')->nullable()->after('jenis_usaha');
            }

            // Kolom untuk Surat Lahir
            if (!Schema::hasColumn('pengajuan_surats', 'nama_anak')) {
                $table->string('nama_anak')->nullable()->after('alamat_usaha');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'jenis_kelamin_anak')) {
                $table->enum('jenis_kelamin_anak', ['L', 'P'])->nullable()->after('nama_anak');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'tempat_lahir_anak')) {
                $table->string('tempat_lahir_anak')->nullable()->after('jenis_kelamin_anak');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'tanggal_lahir_anak')) {
                $table->date('tanggal_lahir_anak')->nullable()->after('tempat_lahir_anak');
            }

            // Kolom untuk Surat Keterangan Orang Tua / Keluarga
            if (!Schema::hasColumn('pengajuan_surats', 'nama_ayah')) {
                $table->string('nama_ayah')->nullable()->after('tanggal_lahir_anak');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'nama_ibu')) {
                $table->string('nama_ibu')->nullable()->after('nama_ayah');
            }

            // Kolom untuk Surat Kematian
            if (!Schema::hasColumn('pengajuan_surats', 'nama_almarhum')) {
                $table->string('nama_almarhum')->nullable()->after('nama_ibu');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'tanggal_meninggal')) {
                $table->date('tanggal_meninggal')->nullable()->after('nama_almarhum');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'tempat_meninggal')) {
                $table->string('tempat_meninggal')->nullable()->after('tanggal_meninggal');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'sebab_meninggal')) {
                $table->text('sebab_meninggal')->nullable()->after('tempat_meninggal');
            }

            // Kolom untuk Surat Pindah
            if (!Schema::hasColumn('pengajuan_surats', 'alamat_tujuan')) {
                $table->text('alamat_tujuan')->nullable()->after('sebab_meninggal');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'alasan_pindah')) {
                $table->text('alasan_pindah')->nullable()->after('alamat_tujuan');
            }

            // Kolom untuk Surat Lainnya
            if (!Schema::hasColumn('pengajuan_surats', 'jenis_lainnya')) {
                $table->string('jenis_lainnya')->nullable()->after('alasan_pindah');
            }

            // Kolom untuk file lampiran
            if (!Schema::hasColumn('pengajuan_surats', 'lampiran_ktp')) {
                $table->json('lampiran_ktp')->nullable()->after('jenis_lainnya');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'lampiran_kk')) {
                $table->json('lampiran_kk')->nullable()->after('lampiran_ktp');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'lampiran_pendukung')) {
                $table->json('lampiran_pendukung')->nullable()->after('lampiran_kk');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            $columns = [
                'nama_usaha', 'jenis_usaha', 'alamat_usaha',
                'nama_anak', 'jenis_kelamin_anak', 'tempat_lahir_anak', 'tanggal_lahir_anak',
                'nama_ayah', 'nama_ibu',
                'nama_almarhum', 'tanggal_meninggal', 'tempat_meninggal', 'sebab_meninggal',
                'alamat_tujuan', 'alasan_pindah',
                'jenis_lainnya',
                'lampiran_ktp', 'lampiran_kk', 'lampiran_pendukung'
            ];
            foreach ($columns as $column) {
                if (Schema::hasColumn('pengajuan_surats', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
