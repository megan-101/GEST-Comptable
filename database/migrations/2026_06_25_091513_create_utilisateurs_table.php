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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->string('login')->unique();
            $table->string('nom');
            $table->string('mdp');
<<<<<<< HEAD
=======
            $table->string('email')->unique();
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
>>>>>>> origin/dev
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
