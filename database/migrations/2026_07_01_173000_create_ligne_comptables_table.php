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
        Schema::create('ligne_comptables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ecriture_id')->index();
            $table->string('compte');
            $table->string('type_op'); // 'C' ou 'D'
            $table->integer('montant');
            $table->string('ref')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_comptables');
    }
};
