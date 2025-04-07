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
        Schema::table('lhs', function (Blueprint $table) {
            $table->foreign(['nrp_nip'], 'lhs_ibfk_1')->references(['nrp_nip'])->on('users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lhs', function (Blueprint $table) {
            $table->dropForeign('lhs_ibfk_1');
        });
    }
};
