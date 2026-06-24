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
        Schema::table('ordinateurs', function (Blueprint $table) {
            $table->foreignId('fabricant_id')->constrained('fabricants')->cascadeOneDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ordinateurs', function (Blueprint $table) {
            //
        });
    }
};
