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
    Schema::create('events', function (Blueprint $table) {
        $table->id(); // ID del evento
        $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Usuario que lo creó
        $table->string('name'); // Nombre del evento
        $table->text('description')->nullable(); // Descripción opcional
        $table->date('date'); // Fecha del evento
        $table->time('time'); // Hora del evento
        $table->string('location')->nullable(); // Lugar del evento (opcional)
        $table->timestamps(); // Fechas de creación y actualización
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
