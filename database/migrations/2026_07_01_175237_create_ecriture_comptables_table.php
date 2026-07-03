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
        Schema::create('ecriture_comptables', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->date('date');
            $table->unsignedBigInteger('operation_id');
            $table->string('devise');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecriture_comptables');
    }
};
