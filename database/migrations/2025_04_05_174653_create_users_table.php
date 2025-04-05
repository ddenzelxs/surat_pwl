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
        Schema::create('users', function (Blueprint $table) {
            $table->string('nrp_nip', 20)->primary();
            $table->string('password');
            $table->string('nama_lengkap', 100);
            $table->string('email', 100)->nullable();
            $table->integer('status')->nullable();
            $table->integer('role_id')->index('fk_users_role1_idx');
            $table->integer('prodi_id')->index('fk_users_prodi1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
