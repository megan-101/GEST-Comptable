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
       schema::create('logs', function(Bluesprint $table){
            $table-> id();
            $table-> String('action');
            $table-> String('message');
            $table-> String('ip_address');
            $table-> timestamp();


    });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist('logs');
    }
};
