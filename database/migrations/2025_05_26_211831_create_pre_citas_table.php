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
            $table->foreignId('mascota_id')->constrained("mascotas")->onDelete('cascade');
            $table->text('motivo');
            $table->date('fecha_solicitada');
            $table->string('rango_hora');
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pre_citas');
    }
};
