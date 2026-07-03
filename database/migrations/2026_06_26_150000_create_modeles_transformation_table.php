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
        Schema::create('modeles_transformation', function (Blueprint $table) {
            $table->id();
            $table->string('schema');
            $table->boolean('flag_piece')->default(false);
            $table->string('mask_piece')->nullable();
            $table->boolean('flag_compte')->default(false);
            $table->string('mask_compte')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modeles_transformation');
    }
};
