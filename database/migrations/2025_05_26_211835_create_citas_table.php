<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mascota_id')->constrained("mascotas")->onDelete('cascade');
            $table->foreignId('veterinario_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('fecha_hora');
            $table->text('motivo');
            $table->enum('estado', ['pendiente', 'confirmado', 'cancelado'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
