<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Ubah kolom deskripsi menjadi nullable
            $table->text('deskripsi')->nullable()->change();
            
            // Ubah kolom isi menjadi nullable
            $table->text('isi')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Kembalikan ke NOT NULL (perlu default value)
            $table->text('deskripsi')->nullable(false)->default('')->change();
            $table->text('isi')->nullable(false)->default('')->change();
        });
    }
};