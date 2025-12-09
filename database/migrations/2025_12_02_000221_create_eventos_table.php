<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
{
    Schema::create('eventos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
        $table->string('nombre');    
        $table->date('fecha');
        $table->time('hora');
        $table->text('descripcion')->nullable();
        $table->timestamps();
    });
}
};
