<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('operations_comptables', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('libelle');
            $table->date('date_operation');
            $table->decimal('montant_debit', 15, 2)->default(0);
            $table->decimal('montant_credit', 15, 2)->default(0);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('post_comptable_id')->nullable();
            $table->unsignedBigInteger('lieu_id')->nullable();
            $table->foreign('post_comptable_id')->references('id')->on('post_comptables')->onDelete('set null');
            $table->foreign('lieu_id')->references('id')->on('lieux')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('operations_comptables');
    }
};
