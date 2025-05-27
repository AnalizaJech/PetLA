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
            $table->foreignId('mascota_id')->constrained()->onDelete('cascade');
            $table->foreignId('veterinario_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->enum('estado', [
                'pendiente_pago', 'en_validacion', 'aceptada',
                'atendida', 'cancelada', 'expirada',
                'rechazada', 'no_asistio'
            ])->default('pendiente_pago');
            $table->binary('comprobante_blob')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
