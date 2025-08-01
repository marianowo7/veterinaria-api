<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tipo_animal', function (Blueprint $table) {
            $table->id('id_tipo_animal');
            $table->string('descrip_tipo_animal', 50);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tipo_animal');
    }
};
