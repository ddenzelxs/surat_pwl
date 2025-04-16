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
        Schema::create('smahaktif', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nrp_nip', 20)->index();
            $table->string('nama_lengkap', 100);
            $table->integer('semester');
            $table->text('alamat')->nullable();
            $table->text('keperluan_pengajuan')->nullable();
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
        Schema::dropIfExists('smahaktif');
    }
};
