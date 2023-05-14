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
        Schema::create('egresados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',45);
            $table->string('carrera',20);
            $table->string('matricula',8);
            $table->foreignId('generacion_id')
            ->constrained('generacions')
            ->onUpdate('cascade')->onDelete('restrict');
            $table->string('clave',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('egresados');
    }
};
