<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade');
            $table->string('nombre');
            $table->string('especie');
            $table->string('peso')->nullable();
            $table->enum('sexo', ['macho', 'hembra']);
            $table->string('raza');
            $table->date('fecha_nacimiento');
            $table->string('foto_blob')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
