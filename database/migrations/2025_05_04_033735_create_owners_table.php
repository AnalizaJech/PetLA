<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('owners', function (Blueprint $table) {
        $table->id();
        $table->string('dni')->unique();
        $table->string('name');
        $table->string('lastname');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('address');
        $table->binary('image')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
