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
        
        // Relación: Evento tiene Invitado (1:N)
        // Esto cumple la relación del rombo azul "tiene"
        $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade');
        $table->string('nombre');
        $table->string('grupo')->nullable();  
        $table->string('mesa')->nullable();   
        $table->string('telefono')->nullable();
        $table->string('menu')->nullable();   
        $table->text('nota')->nullable();
        $table->enum('genero', ['Hombre', 'Mujer'])->default('Hombre');
        $table->enum('tipo', ['Adulto', 'Niño', 'Bebé'])->default('Adulto');
        $table->enum('estatus', ['Confirmada', 'En espera', 'Rechazada'])->default('En espera');

        $table->timestamps();
    });
}
};