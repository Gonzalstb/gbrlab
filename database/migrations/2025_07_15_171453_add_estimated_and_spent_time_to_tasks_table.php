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
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger('estimated_time')->nullable()->after('priority')->comment('Tiempo estimado en horas');
            $table->unsignedInteger('spent_time')->nullable()->after('estimated_time')->comment('Tiempo gastado en horas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['estimated_time', 'spent_time']);
        });
    }
};
