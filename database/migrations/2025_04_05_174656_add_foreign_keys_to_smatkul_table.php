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
        Schema::table('smatkul', function (Blueprint $table) {
            $table->foreign(['nrp_nip'], 'fk_smatkul_users1')->references(['nrp_nip'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('smatkul', function (Blueprint $table) {
            $table->dropForeign('fk_smatkul_users1');
        });
    }
};
