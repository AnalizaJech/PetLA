<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pre_citas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->string('telefono');
            $table->string('email');
            $table->dateTime('fecha_solicitada');
            $table->enum('estado', ['pendiente', 'rechazada', 'convertida'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pre_citas');
    }
};
