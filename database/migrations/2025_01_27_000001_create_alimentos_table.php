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
        Schema::create('alimentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->unique();
            $table->decimal('calorias', 10, 2)->default(0);
            $table->decimal('carboidratos', 10, 2)->default(0);
            $table->decimal('proteinas', 10, 2)->default(0);
            $table->decimal('gorduras_totais', 10, 2)->default(0);
            $table->decimal('gorduras_saturadas', 10, 2)->default(0);
            $table->decimal('gorduras_trans', 10, 2)->default(0);
            $table->decimal('fibra', 10, 2)->default(0);
            $table->decimal('acucares', 10, 2)->default(0);
            $table->decimal('sodio', 10, 2)->default(0);
            $table->decimal('calcio', 10, 2)->default(0);
            $table->decimal('ferro', 10, 2)->default(0);
            $table->decimal('potassio', 10, 2)->default(0);
            $table->decimal('vitamina_c', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentos');
    }
};