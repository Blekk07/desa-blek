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
            if (!Schema::hasColumn('pengaduans', 'prioritas')) {
                $table->string('prioritas')->nullable()->default('Sedang')->after('lampiran');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            if (Schema::hasColumn('pengaduans', 'prioritas')) {
                $table->dropColumn('prioritas');
            }
        });
    }
};
