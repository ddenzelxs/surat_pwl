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
        Schema::create('lhs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nrp_nip', 20)->index('nrp');
            $table->string('nama_lengkap', 100);
            $table->text('keperluan_pembuatan_laporan')->nullable();
            $table->string('pdf_file')->nullable();
            $table->integer('status')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lhs');
    }
};
