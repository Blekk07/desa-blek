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
        Schema::create('profile_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->text('alamat_kantor');
            $table->string('kepala_desa');
            $table->string('masa_jabatan_kepala');
            $table->string('sekretaris_desa')->nullable();
            $table->string('bendahara_desa')->nullable();
            $table->string('poskesdes')->nullable();
            $table->string('pos_kamling')->nullable();
            $table->string('kebakaran')->nullable();
            $table->text('visi');
            $table->text('visi_deskripsi');
            $table->decimal('luas_wilayah', 8, 2)->nullable(); // dalam hectare
            $table->text('sejarah_desa')->nullable();
            $table->text('geografis')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_desas');
    }
};
