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
            $table->foreign(['prodi_id'], 'fk_users_prodi1')->references(['id'])->on('prodi')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['role_id'], 'fk_users_role1')->references(['id'])->on('role')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_prodi1');
            $table->dropForeign('fk_users_role1');
        });
    }
};
