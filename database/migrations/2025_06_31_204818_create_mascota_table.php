<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mascota', function (Blueprint $table) {
            $table->id('id_mascota');
            $table->string('nombre_mascota', 50);
            $table->string('cuit_duenio', 11);
            $table->unsignedBigInteger('id_tipo_animal');
            $table->unsignedBigInteger('id_raza');
            $table->integer('peso_kg');
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->timestamps();

            $table->foreign('id_tipo_animal')->references('id_tipo_animal')->on('tipo_animal');
            $table->foreign('id_raza')->references('id_raza')->on('raza');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('mascota');
    }
};
