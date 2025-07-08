<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('raza', function (Blueprint $table) {
            $table->id('id_raza');
            $table->string('nombre_raza', 50);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('raza');
    }
};

