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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'nik')) {
                $table->string('nik', 20)->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'alamat')) {
                $table->text('alamat')->nullable()->after('nik');
            }
            if (!Schema::hasColumn('users', 'rt')) {
                $table->string('rt', 5)->nullable()->after('alamat');
            }
            if (!Schema::hasColumn('users', 'rw')) {
                $table->string('rw', 5)->nullable()->after('rt');
            }
            if (!Schema::hasColumn('users', 'no_telepon')) {
                $table->string('no_telepon', 20)->nullable()->after('rw');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'no_telepon')) {
                $table->dropColumn('no_telepon');
            }
            if (Schema::hasColumn('users', 'rw')) {
                $table->dropColumn('rw');
            }
            if (Schema::hasColumn('users', 'rt')) {
                $table->dropColumn('rt');
            }
            if (Schema::hasColumn('users', 'alamat')) {
                $table->dropColumn('alamat');
            }
            if (Schema::hasColumn('users', 'nik')) {
                // don't drop if other migrations added it already, but safe to attempt
                $table->dropColumn('nik');
            }
        });
    }
};
