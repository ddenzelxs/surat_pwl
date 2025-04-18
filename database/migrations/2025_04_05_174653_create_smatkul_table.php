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
        Schema::create('smatkul', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nrp_nip', 20)->index();
            $table->string('surat_tujuan');
            $table->string('nama_mata_kuliah', 100);
            $table->string('kode_mata_kuliah', 20);
            $table->string('semester', 20);
            $table->text('mahasiswa_data')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('topik')->nullable();
            $table->string('pdf_file')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->text('keterangan_penolakan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smatkul');
    }
};
