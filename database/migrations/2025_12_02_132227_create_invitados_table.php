<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up(): void
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade');
            $table->string('nombre');
            $table->string('telefono')->nullable();
            $table->string('grupo')->nullable();
            $table->string('mesa')->nullable();
            $table->string('menu')->nullable();
            $table->text('nota')->nullable();
            $table->enum('genero', ['Hombre', 'Mujer'])->default('Hombre');
            $table->enum('tipo', ['Adulto', 'Niño', 'Bebé'])->default('Adulto');
            $table->enum('estatus', ['En espera', 'Confirmado', 'Rechazado'])->default('En espera');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitados');
    }
};