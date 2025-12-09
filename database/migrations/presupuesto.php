<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->unique()->constrained('eventos')->onDelete('cascade');
            $table->string('titulo');
            $table->decimal('cantidad', 10, 2);
            $table->decimal('gastado', 10, 2)->default(0.00);
            $table->decimal('faltante', 10, 2);
            $table->text('nota')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};