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
        // If the table already exists (duplicate migration scenario), add missing columns instead
        if (Schema::hasTable('beritas')) {
            Schema::table('beritas', function (Blueprint $table) {
                if (!Schema::hasColumn('beritas', 'judul')) {
                    $table->string('judul')->after('id');
                }
                if (!Schema::hasColumn('beritas', 'konten')) {
                    $table->text('konten')->nullable()->after('judul');
                }
                if (!Schema::hasColumn('beritas', 'gambar')) {
                    $table->string('gambar')->nullable()->after('konten');
                }
                if (!Schema::hasColumn('beritas', 'user_id')) {
                    $table->unsignedBigInteger('user_id')->nullable()->after('gambar');
                }
                if (!Schema::hasColumn('beritas', 'published_at')) {
                    $table->dateTime('published_at')->nullable()->after('user_id');
                }

                // Add foreign key if not present (best-effort — may fail on some DB setups)
                try {
                    $sm = Schema::getConnection()->getDoctrineSchemaManager();
                    $indexes = $sm->listTableForeignKeys('beritas');
                    $hasFk = false;
                    foreach ($indexes as $fk) {
                        if (in_array('user_id', $fk->getLocalColumns())) {
                            $hasFk = true;
                            break;
                        }
                    }
                    if (!$hasFk) {
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
                    }
                } catch (\Exception $e) {
                    // ignore — adding FK is best-effort
                }
            });
        } else {
            Schema::create('beritas', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->text('konten');
                $table->string('gambar')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->dateTime('published_at')->nullable();
                $table->timestamps();
                
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
