<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('budget_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->constrained('budgets')->cascadeOnDelete();
            $table->string('descripcion');
            $table->string('categoria')->nullable();
            $table->decimal('monto', 12, 2)->default(0);
            $table->enum('estado',['pagado','pendiente'])->default('pendiente');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('budget_items');
    }
};
